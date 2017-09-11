<?php
	/*	Author: Akhilesh Kumar
		Controller for Communication platform
	*/
use google\appengine\api\cloud_storage\CloudStorageTools;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class communication extends CI_Controller
{
	public function index()
	{
		$this->Home_Page();
	}
	/* Function to get Upvotes of a Question
	   Parameters: Question Id
	*/
	public function getUpvotes($qid=-1)
	{
		$this->load->model("Comms_model");
		$this->Comms_model->updateUpvotes($qid);
		$this->Comms_model->updateDownvotes($qid);
		$query=$this->Comms_model->getUpvotes($qid);
		foreach($query->result() as $row)
		{
			$votes=$row->upvotes;
		}
		echo $votes;
	}
	/* Function to get Downvotes of a Question
	   Parameters: Question Id
	*/
	public function getDownvotes($qid=-1)
	{
		$this->load->model("Comms_model");
		$this->Comms_model->updateUpvotes($qid);
		$this->Comms_model->updateDownvotes($qid);
		$query=$this->Comms_model->getDownvotes($qid);
		foreach($query->result() as $row)
		{
			$votes=$row->downvotes;
		}
		echo $votes;
	}
	/* Function to get Upvotes of a Answer
	   Parameters: Answer Id
	*/
	public function getUpvotesAnswer($aid=-1)
	{
		$this->load->model("Comms_model");
		$this->Comms_model->updateUpvotesAnswer($aid);
		$this->Comms_model->updateDownvotesAnswer($aid);
		$query=$this->Comms_model->getUpvotesAnswer($aid);
		foreach($query->result() as $row)
		{
			$votes=$row->upvotes;
		}
		echo $votes;
	}
	/* Function to get Downvotes of a Answer
	   Parameters: Answer Id
	*/
	public function getDownvotesAnswer($aid=-1)
	{
		$this->load->model("Comms_model");
		$this->Comms_model->updateUpvotesAnswer($aid);
		$this->Comms_model->updateDownvotesAnswer($aid);
		$query=$this->Comms_model->getDownvotesAnswer($aid);
		foreach($query->result() as $row)
		{
			$votes=$row->downvotes;
		}
		echo $votes;
	}
	public function getNotifications()
	{
		$this->load->model("Comms_model");
		$this->load->library('session');
		if($this->session->is_logged_in!=0)
		{
			$cid=$this->session->cid;
		}
		else
		{
			$cid=-1;
		}
		$query=$this->Comms_model->getNotifications($cid);
		$notifications=array();
		foreach ($query->result() as $row) {
			array_push($notifications, $row);
		}
		echo json_encode($notifications);
	}

	/*
	Function to rank Questions according to a sorting algorithm based on upvotes,
	downvotes and date of creation.
	Parameter: All questions in an array format 
	Output: Returns all questions in sorted format according to their rank.
	*/
	public function rankQuestions($query)
	{
		$this->load->model("Comms_model");
		$score=0;
		$currenttime=date("2000-01-01 00:00:00");
		
		foreach($query as $row)				// For every Question
		{
			$diff=strtotime($currenttime) - strtotime($row->up_dt) ; //Difference of current datetime and question timestamp
			$score=($row->upvotes-$row->downvotes);
			$order=log10(max(abs($score),1));
			if($score>=0)
				$sign=1;
			else
				$sign=-1;
			$rank=round($sign*$order + $diff/45000,7); //Calculating Rank of a question
			$row->rank=$rank;				// Storing the rank of the question with the rest of the Question Data
		}

		uasort($query, array("Communication","cmp"));	//User defined function to sort assocative array based on rank
		return $query;
	}
	/*
	User Defined cmp function to sort two values based on their ranks
	*/
	public function cmp($a, $b)
	{
		if($a->rank < $b->rank)
			return -1;
		else if($a->rank==$b->rank)
			return 0;
		else
			return 1;
	}
	/*
	Function to get all the relevant questions for the user based on user profile tags
	Input: An array of tags
	Output: Returns an array of Questions already sorted on the basis of their ranks
	*/
	public function getRelevantQuestions($cid,$source = 0,$tags="")
	{
		$this->load->model("Comms_model");
		$this->load->model("College_model");
		$this->load->library("session");
		if(!empty($this->session->email) || ($this->session->is_logged_in!=0))
		{
			$mail=$this->session->email;
			$data['userData']=$this->Comms_model->getUserData($mail);
			foreach($data['userData']->result() as $row)
			{
				$user_id=$row->id;
			}
		}
		else
		{
			$user_id=-1;
		}
		if($cid!=$user_id)
		{
			return "You are not allowed to view this page";
		}
		else
		{
			if(empty($tags))
				$tags=$this->College_model->getUserRelatedNodes($cid);
			$count=count($tags);
			$relevantQuestions=array();
			$copyArray=array();				//To check for redundant Questions
			for($i=$count; $i>0; $i--)		//Variable Length Tags: If 5 tags are there, first questions with all the
											//5 tags will come, then 4 tags(in every combination) will come, then 3 and so on.	
			{
				$arr=array();
				$query=$this->Comms_model->getRelevantQuestions($tags,$i);	//Getting all the relevant Questions.
				foreach ($query->result() as $key) {						// For every Question
						if(!in_array($key->qid, $copyArray))	//Checking if already exist
						{
							$data=$this->Comms_model->getQuestionData($key->qid);//Getting all Question Data
							foreach ($data->result() as $row) {
								array_push($arr,$row);
							}
							array_push($copyArray, $key->qid);	
							$arr=$this->rankQuestions($arr);	//Calling rankQuestions to rank Questions and sort them
						}
				}																																												
				$relevantQuestions=array_merge($relevantQuestions,$arr);
				unset($arr);
			}
			if($source == 1)
				echo json_encode($relevantQuestions);

			return $relevantQuestions;
		}
	}

	public function getFollowedQuestionUsers($qid)
	{
		$this->load->model('Comms_model');
		return $this->Comms_model->getFollowedQuestionUsers($qid)->num_rows();
	}																	

	/*
	Home_Page(): Main function which is called when Communication Platform is loaded.
	This Function gets Trending Questions, Relevent Questions and Notifications and pass the data onto the homepage 
	view.
	*/
	public function Home_Page($profiler=0)
	{
		$this->load->model('Comms_model');
		$this->load->model('College_model');
		$this->load->helper('url');
		$this->load->library('session');
		$mail=$this->session->email;
		//echo 'beginning';
		if(!empty($mail) || ($this->session->is_logged_in!=0))
		{
			$data['userData']=$this->Comms_model->getUserData($mail);
			foreach($data['userData']->result() as $row)
			{
				$user_id=$row->id;
				$name=$row->Display_Name;
			}
			$this->session->set_userdata('userid',$user_id);
			$this->session->set_userdata('name',$name);
			$cid=$this->session->cid;
		}
		else
		{
			redirect(site_url('Main/login'));
		}


		$data['relevantQuestions']=$this->getRelevantQuestions($cid);
		foreach($data['relevantQuestions'] as $row)
		{
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
			
				$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
				if($query->num_rows()==0)
				{
					$row->answer->upvoted=2;
				}
				else
				{
					foreach ($query->result() as $key) 
					{
						$flag=$key->upvoted;
					}
					$row->answer->upvoted=$flag;//answer upvoting part 0=>downvoted 1=>upvoted 2=>nothing homepage
				}
			}
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;//+1 question 1=>following 0=>not following homepage
				}
			}
			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;//Question flag 0=>flagged 1=>followed 2=>nothing homepage
				}
			}
			
		}

		$data['trendingQuestions']=$this->Comms_model->getTrendingQuestions($cid);
		$data['trendingQuestions']=$this->rankQuestions($data['trendingQuestions']);
		foreach($data['trendingQuestions'] as $row)
		{
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
				
				$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
				if($query->num_rows()==0)
				{
					$row->answer->upvoted=2;
				}
				else
				{
					foreach ($query->result() as $key) 
					{
						$flag=$key->upvoted;
					}
					$row->answer->upvoted=$flag;
				}
			}
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;
				}
			}

			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;
				}
			}
			
		}

		$data['followingQuestions']=$this->Comms_model->getFollowingQuestions($cid);
		foreach($data['followingQuestions'] as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
				$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
				if($query->num_rows()==0)
				{
					$row->answer->upvoted=2;
				}
				else
				{
					foreach ($query->result() as $key) 
					{
						$flag=$key->upvoted;
					}
					$row->answer->upvoted=$flag;
				}
			}
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;
				}
			}
			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;
				}
			}
			
		}

		$tags=$this->College_model->getUserRelatedNodes($cid);
		$data['unansweredQuestions']=$this->Comms_model->getUnansweredQuestions($cid,$tags);
		foreach($data['unansweredQuestions'] as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;
				}
			}
			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;
				}
			}
		}

		$data['userQuestions']=$this->Comms_model->getUserQuestions($cid);
		foreach($data['userQuestions']->result() as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
				$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
				if($query->num_rows()==0)
				{
					$row->answer->upvoted=2;
				}
				else
				{
					foreach ($query->result() as $key) 
					{
						$flag=$key->upvoted;
					}
					$row->answer->upvoted=$flag;
				}

			}
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;
				}
			}
			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;
				}
			}
			
		}


		$data['userAnswers']=$this->Comms_model->getUserAnswers($cid);
		foreach($data['userAnswers']->result() as $row)
		{
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsAnswer($row->ansid);
			}
			$row->answer_images=$this->Comms_model->getImage(-1,$row->ansid);
			$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
			$query=$this->Comms_model->getVotedUserAnswer($cid,$row->ansid);
			if($query->num_rows()==0)
			{
				$row->upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$flag=$key->upvoted;
				}
				$row->upvoted=$flag;
			}
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;
				}
			}
			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;
				}
			}

		}

		$data['votedQuestions']=$this->Comms_model->getUserVotedQuestions($cid);
		foreach($data['votedQuestions']->result() as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
				$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
				if($query->num_rows()==0)
				{
					$row->answer->upvoted=2;
				}
				else
				{
					foreach ($query->result() as $key) 
					{
						$flag=$key->upvoted;
					}
					$row->answer->upvoted=$flag;
				}

			}
			$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->followed=0;
			}
			else
			{
				foreach($query->result() as $pref)
				{
					$row->followed=$pref->follow;
				}
			}
			$query=$this->Comms_model->getVotedUser($cid,$row->qid);
			if($query->num_rows()==0)
			{
				$row->question_upvoted=2;
			}
			else
			{
				foreach ($query->result() as $key) 
				{
					$row->question_upvoted=$key->upvoted;
				}
			}
			
		}


		$data['votedAnswers']=$this->Comms_model->getUserVotedAnswers($cid);
		foreach($data['votedAnswers']->result() as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;	
			$row->number_of_following_users=$this->getFollowedQuestionUsers($row->qid);
		}

		if($profiler==1)
		{
			$this->output->enable_profiler(TRUE);
			$sections = array(
			    'config'  => TRUE,
			    'queries' => TRUE
			    );

			$this->output->set_profiler_sections($sections);
		}
		//echo 'end';
		//print_r($data);
		$this->load->view('comms_platform/converse_homepage',$data);
	}

	/*
	Function to load ask Question view
	*/
	public function addquestion()
	{
		$this->load->model('Comms_model');
		$this->load->library('session');
		$this->load->helper('url');
		if(!empty($this->session->email) || $this->session->is_logged_in!=0)
		{
			$data['userData']=$this->Comms_model->getUserData($this->session->email);
			$mail=$this->session->email;
			foreach($data['userData']->result() as $row)
			{
				$user_id=$row->id;
			}
			$this->session->set_userdata('userid',$user_id);
			$data['Notifications']=$this->Comms_model->getNotifications($this->session->userid);	
		}
		else
		{
			redirect(site_url("Main/login"));	
		}
		$this->load->view('comms_platform/addquestion',$data);
	}
	/*
	Function to get All the tags from the database to be used as tags
	returns all the tags in json format.
	*/
	public function getTags()
	{
		$tags=array();
		$this->load->model('Comms_model');
		$data['query']=$this->Comms_model->getTags();
		foreach($data['query']->result() as $row)
		{
				array_push($tags,strtolower($row->tags));
		}
		echo json_encode($tags);
	}
	/*
	Function to upload image from question to google cloud storage
	*/
    public function doupload_server($qid)
    {
    	$this->load->helper('url');
    	if(empty($_FILES['userfile']['name'][0]))
		{
			redirect(site_url("Communication/showQuestion?qid=".$qid));
		}
		else
		{
			$files=$_FILES['userfile'];
	        foreach($files['name'] as $key=>$image)
	        {
	            $_FILES['images[]']['name']=$files['name'][$key];
	            $_FILES['images[]']['type']    = $files['type'][$key];
	            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
	            $_FILES['images[]']['error']       = $files['error'][$key];
	            $_FILES['images[]']['size']    = $files['size'][$key];   
	            move_uploaded_file($files['tmp_name'][$key], BUCKET_QUESTIONS.$files['name'][$key]);
	            $this->Comms_model->saveImage($qid,-1,$files['name'][$key]);
	        }
		}
    }
    /*
    Function to save all the Question data. (Question text, tags and image name)
    Input: Question text, tags and image
    */
	public function saveQuestion()
	{
		$this->load->model('Comms_model');
		$this->load->model('Log_model');
		$this->load->helper('url');
		
		$question=$this->input->post('question');
		$tags=$this->input->post('tags');

		$data['query']=$this->Comms_model->saveQuestion($question);

		$this->db->select_max('qid');
		$qid_query = $this->db->get('forum_questions')->row();
		
		$qid=$qid_query->qid;

		$this->load->library('session');
		$cid=$this->session->userid;
		$data['userQuery']=$this->Comms_model->saveUserQuestions($this->session->userid,$qid);
		$this->incrementView($qid);
		//$this->Log_model->addToLogStatic($qid,QUESTION_ASKED,TYPE_QUESTION);
		$pieces = explode(",", $tags);
		foreach($pieces as $tag)
		{
			if($tag!="")
			{
				$data['tagQuery']=$this->Comms_model->saveTags($qid,$tag);
				$users=$this->Comms_model->getUserCollege($tag);
				$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>A new Question has been posted regarding your college.</h5></a>";
				if($users->num_rows()!=0)
				{
					foreach ($users->result() as $row ) {
						if($cid!=$row->cid)
						{
							$this->saveNotification($row->cid,$notification,$qid,-1,$cid,'ASKED');
						}
					}
				}
			}
		}
		$this->doupload_server($qid);
		echo '<script> window.location = "'.site_url('Communication/showQuestion').'?qid='.$qid.'"; </script>';
	}
	/*
	Function to logout
	*/
	public function logOut()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect(site_url('main/login'),'refresh');
	}
	/*
	Function to increment view every time a question is opened
	Input: Question id.
	*/
	public function incrementView($qid)
	{
		$this->load->model('Comms_model');
		$data['query']=$this->Comms_model->incrementView($qid);
	}
	/*
	Function to show a Question along with all it's question data(upvotes,views, answers, comments) 
	*/
	public function showQuestion($answerclicked=-1)
	{
		$this->load->model('Log_model');
		$this->load->model('College_model');
		$qid=$this->input->get('qid');
		$this->load->model("Comms_model");
		
		$this->load->library('session');
		//print_r($this->session);
		/*if(!isset($this->session->visitedQuestions))
		{
			$questions=array();
			$this->session->set_userdata('visitedQuestions',$questions);
		}*/	
		$this->load->helper('url');
		if(!empty($this->session->email) || $this->session->is_logged_in!=0)
		{
			//print_r($this->session);
			//echo $this->session->email;
			$data['userData']=$this->Comms_model->getUserData($this->session->email);
			foreach($data['userData']->result() as $row)
			{
				//print_r($row);
				$user_id=$row->id;
				$name=$row->Display_Name;
			}
			$this->session->set_userdata('userid',$user_id);
			$this->session->set_userdata('name',$name);
			$cid=$this->session->cid;
		}
		else
		{
			$cid=-1;	
		}
		$data['question']=$this->Comms_model->getQuestionData($qid);	//Gets all the Questions data
		$date=date("Y-m-d H:i:s",time());
		$totaltags=array();
		foreach($data['question']->result() as $row)
		{
			if($row->id!=$cid && !in_array($qid, $this->session->visitedQuestions)) 
			{
				$questions=$this->session->userdata('visitedQuestions');
				array_push($questions, $qid);
				$this->session->set_userdata('visitedQuestions',$questions);

				$this->incrementView($qid);
				//$this->Log_model->addToLogStatic($qid,QUESTION_VIEWED,TYPE_QUESTION);
			}
			$data['questiontitle']=strip_tags($row->question);
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsQuestion($row->qid);	//Gets all the comments for that Question
			}
			$tags=$this->Comms_model->getTagsQuestion($row->qid);	//Gets all the tags for the questions
			$row->tags=$tags;	
			foreach ($tags->result() as $key) {
				array_push($totaltags, $key->tags);
			}
			$row->images=$this->Comms_model->getImage($row->qid,-1); 	//Load image/images associated with question. If any.
			$date=$row->cr_dt;
		}

		$data['relatedQuestions']=$this->getRelevantQuestions($cid,0,$totaltags);
		if($this->session->is_logged_in!=0)
		{
			$data['trendingQuestions']=$this->Comms_model->getTrendingQuestions($cid);
			$data['trendingQuestions']=$this->rankQuestions($data['trendingQuestions']);
			foreach($data['trendingQuestions'] as $row)
			{
				$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
				if(!empty($row->answer))
				{
					if($row->answer->comments==1)
					{
						$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
					}
					$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				}
			}
		}

		//$data['system_answer']=$this->College_model->getCollegeNodeAttributeData($totaltags); //Gets answer from our database based on the tags of the question
		
		$answerids=array();
		if(isset($this->session->answers))
		{
			$this->session->unset_userdata('answers');
		}
		$this->session->set_userdata('answers',$answerids);

		$data['answers']=$this->Comms_model->getAnswerDataNew($cid,$qid); //Gets all the  answers for the questions
		
		foreach($data['answers'] as $row)
		{
			if(isset($row->rank))
			{
				$this->session->set_userdata('answerrank',$row->rank);
			}
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsAnswer($row->ansid);
			}
			$row->images=$this->Comms_model->getImage(-1,$row->ansid);
		}
		$data['answerclicked']=$answerclicked;
		$this->load->view('comms_platform/questionpage',$data);
	}
	/*
	When clicked on show more in the page, this function will be invoked and rest of the answers will be displayed
	wherein they will be sorted according to confidence sort.
	*/
	public function ShowMoreAnswers()
	{
		$this->load->model("Comms_model");
		$rank=$this->input->get('rank');
		$qid=$this->input->get('qid');
		$this->load->library('session');
		$results=array();
		if($this->session->is_logged_in!=0)
			$cid=$this->session->userid;
		else
			$cid=-1;
		$answers=$this->Comms_model->getAnswerDataNew($cid,$qid,$rank);
		foreach($answers as $row)
		{
			$comments=array();
			$images=array();
			if(isset($row->rank))
			{
				$this->session->set_userdata('answerrank',$row->rank);
			}
			
			$row->qid=$qid;
			if($row->comments==1)
			{
				$query=$this->Comms_model->getCommentsAnswer($row->ansid);
				foreach ($query->result() as $key) 
				{
					array_push($comments,$key);
				}
			}

			$query=$this->Comms_model->getImage(-1,$row->ansid);
			foreach ($query->result() as $key) 
			{
				$options = ['size' => 500, 'crop' => false];
			    $image_file = BUCKET_ANSWERS.$key->imagename;
			    $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);
			    $key->imageurl=$image_url;
				array_push($images,$key);
			}
			array_push($results,array($row,$images,$comments));
		}
		echo json_encode($results);
	}


	public function saveNotification($cid,$notification,$qid,$aid,$doer,$activty)
	{
		$this->load->model('Comms_model');
		$query=$this->Comms_model->saveNotification($cid,$notification,$qid,$aid,$doer,$activty);
	}
	/*
	Function to upload answer associates with an answer to google cloud storage
	Input: Ques id and Ans Id.
	*/
	public function doupload_answer_server($qid,$aid) 
	{
		$this->load->helper('url');
        if(empty($_FILES['userfile']['name'][0]))
        {
        	redirect(site_url("Communication/showQuestion?qid=".$qid));
        }
        else
        {
	        $files=$_FILES['userfile'];
	        foreach($files['name'] as $key=>$image)
	        {
	            $_FILES['images[]']['name']=$files['name'][$key];
	            $_FILES['images[]']['type']    = $files['type'][$key];
	            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
	            $_FILES['images[]']['error']       = $files['error'][$key];
	            $_FILES['images[]']['size']    = $files['size'][$key];   
	           
	                move_uploaded_file($files['tmp_name'][$key], BUCKET_ANSWERS.$files['name'][$key]);
	                $this->Comms_model->saveImage(-1,$aid,$files['name'][$key]);
	        }
	    }
    }
    /*
    Function to save Answer for a question
    */
	public function saveAnswer()
	{
		$this->load->model('Comms_model');
		$this->load->model('Log_model');
		
		$answer=$this->input->post('answer');
		$qid=$this->input->post('quesid');
		
		$data['userQuery']=$this->Comms_model->saveUserAnswer($this->session->userid,$qid);

		$this->db->select_max('ansid');
		$ansid_query = $this->db->get('forum_questions_answers')->row();

		$aid=$ansid_query->ansid;
		$data['query']=$this->Comms_model->saveAnswer($answer,$aid);
		$cid=$this->session->userid;
		//$this->Log_model->addToLogStatic($qid,QUESTION_ANSWERED,TYPE_QUESTION);
		$users=$this->Comms_model->getUsers($qid);
		$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>The question you are following has a new answer.</h5></a>";
		foreach ($users->result() as $row ) {
			if($cid!=$row->cid)
			{
				$this->saveNotification($row->cid,$notification,$qid,$aid,$cid,'ANSWERED');
			}
		}

		$user=$this->Comms_model->getUserByQuestion($qid);
		$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>The question you posted has a new answer.</h5></a>";
		foreach ($user->result() as $row ) {
			if($cid!=$row->cid)
			{
				$this->saveNotification($row->cid,$notification,$qid,$aid,$cid,'ANSWERED');
			}
		}
		$this->doupload_answer_server($qid,$aid);
		echo '<script>
		 window.location = "'.site_url('Communication/showQuestion').'?qid='.$qid.'";
		</script>';
	}

	public function saveUpvotes()
	{
		$this->load->model("Comms_model");
		$this->load->model("Log_model");
		$qid=$this->input->post("qid");
		$this->load->library('session');
		$cid=$this->session->userid;
		$answer=$this->Comms_model->getUserVoted($cid,$qid);
		$flag=-1;
		foreach ($answer->result() as $key) 
		{
				$flag=$key->upvoted;
		}
		if(($answer->num_rows()==0) || $flag==0)
		{
			
			if($flag==0)
			{
				$query=$this->Comms_model->unvoteQuestion($cid,$qid);
			}
			//$this->Log_model->addToLogStatic($qid,QUESTION_UPVOTED,TYPE_QUESTION);
			$query=$this->Comms_model->saveUpvotes($qid);
			$this->Comms_model->saveUserVoted($cid,$qid,1);
			$user=$this->Comms_model->getQuestionData($qid);
			$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>Somebody Upvoted your Question</h5></a>";
			foreach ($user->result() as $row ) 
			{
				if($cid!=$row->CID)
				{
					$this->saveNotification($row->CID,$notification,$qid,-1,$cid,'UPVOTED');
				}
			}
			$this->getUpvotes($qid);
		}
		else
		{
			$query=$this->Comms_model->unvoteQuestion($cid,$qid);
			$user=$this->Comms_model->getQuestionData($qid);
			foreach ($user->result() as $row ) 
			{
				if($cid!=$row->CID)
				{
					$this->Comms_model->rollbackNotification($row->CID,$qid,-1,$cid);
				}
			}

			$this->getUpvotes($qid);
		}
	}

	public function saveDownvotes()
	{
		$this->load->model("Comms_model");
		$this->load->model("Log_model");
		$qid=$this->input->post("qid");
		$this->load->library('session');
		$cid=$this->session->userid;
		$answer=$this->Comms_model->getUserVoted($cid,$qid);
		$flag=-1;
		foreach ($answer->result() as $key) 
		{
			$flag=$key->upvoted;
		}
		if($flag==1 || ($answer->num_rows==0) )
		{
			if($flag==1)
			{
				$this->Comms_model->unvoteQuestion($cid,$qid);
				$user=$this->Comms_model->getQuestionData($qid);
				foreach ($user->result() as $row ) 
				{
					if($cid!=$row->CID)
					{
						$this->Comms_model->rollbackNotification($row->CID,$qid,-1,$cid);
					}
				}
			}
			//$this->Log_model->addToLogStatic($qid,QUESTION_DOWNVOTED,TYPE_QUESTION);
			$query=$this->Comms_model->saveDownvotes($qid);
			$this->Comms_model->saveUserVoted($cid,$qid,0);
			//$this->getDownvotes($qid);
		}
		else
		{
			$query=$this->Comms_model->unvoteQuestion($cid,$qid);
			//$this->getDownvotes($qid);
		}
		$answer=$this->Comms_model->getUserVoted($cid,$qid);
		$flag=-1;
		foreach ($answer->result() as $key) 
		{
			$flag=$key->upvoted;
		}
		echo $flag;
	}

	public function saveUpvotesAnswer()
	{
		$this->load->model("Comms_model");
		$aid=$this->input->get("ansid");
		$cid=$this->input->get("cid");
		$this->load->library('session');
		//$cid=$this->session->userid;
		$answer=$this->Comms_model->getUserVotedAnswer($cid,$aid);
		$flag=-1;
		foreach ($answer->result() as $key) 
		{
			$flag=$key->upvoted;
		}
		if($flag==0 || ($answer->num_rows==0))
		{
			if($flag==0)
			{
				$this->Comms_model->unvoteAnswer($cid,$aid);
			}
			$query=$this->Comms_model->saveUpvotesAnswer($aid);
			$this->Comms_model->saveUserVotedAnswer($cid,$aid,1);
			$user=$this->Comms_model->getAnswerDataUser($aid);
			
			foreach ($user->result() as $row ) {
					$notification="<a href='".site_url('Communication/showQuestion?qid='.$row->qid)."'><h5>Somebody Upvoted your Answer</h5></a>";
					$this->saveNotification($row->cid,$notification,-1,$aid,$cid,'UPVOTED');
			}
			$votes=$this->getUpvotesAnswer($aid);
			echo $votes;
		}
		else
		{
			$query=$this->Comms_model->unvoteAnswer($cid,$aid);
			$user=$this->Comms_model->getAnswerDataUser($aid);
			foreach ($user->result() as $row ) {
				$this->Comms_model->rollbackNotification($row->cid,-1,$aid,$cid);
			}
			$votes=$this->getUpvotesAnswer($aid);
			echo $votes;
		}
	}

	public function saveDownvotesAnswer()
	{
		$this->load->model("Comms_model");
		$aid=$this->input->get("ansid");
		$cid=$this->input->get("cid");
		$this->load->library('session');
		//$cid=$this->session->userid;
		$answer=$this->Comms_model->getUserVotedAnswer($cid,$aid);
		$flag=-1;
		foreach ($answer->result() as $key) 
		{
			$flag=$key->upvoted;
		}
		if($flag==1 || ($answer->num_rows==0) )
		{
			if($flag==1)
			{
				$this->Comms_model->unvoteAnswer($cid,$aid);
				$user=$this->Comms_model->getAnswerDataUser($aid);
				foreach ($user->result() as $row ) {
					$this->Comms_model->rollbackNotification($row->cid,-1,$aid,$cid);
				}
			}
			$query=$this->Comms_model->saveDownvotesAnswer($aid);
			$this->Comms_model->saveUserVotedAnswer($cid,$aid,0);
			$votes=$this->getDownvotesAnswer($aid);
			echo $votes;
		}
		else
		{
			$query=$this->Comms_model->unvoteAnswer($cid,$aid);
			$votes=$this->getDownvotesAnswer($aid);
			echo $votes;
		}
	}

	

	public function unvoteAnswer()
	{
		$this->load->model("Comms_model");
		$aid=$this->input->post("ansid");
		$this->load->library('session');
		$cid=$this->session->userid;
		$query=$this->Comms_model->unvoteAnswer($cid,$aid);
		if($query==0)	
		{
			echo "not voted";
		}
		else
		{
			$votes=$this->getTotalVotesAnswer($aid);
			echo $votes;
		}
	}

	public function getTotalVotes($qid)
	{
		$this->load->model("Comms_model");
		$this->Comms_model->updateUpvotes($qid);
		$this->Comms_model->updateDownvotes($qid);
		$query=$this->Comms_model->getTotalVotes($qid);
		foreach($query->result() as $row)
		{
			$total=$row->total_votes;
		}
		return $total;
	}

	public function getTotalVotesAnswer($aid)
	{
		$this->load->model("Comms_model");
		$this->Comms_model->updateUpvotesAnswer($aid);
		$this->Comms_model->updateDownvotesAnswer($aid);
		$query=$this->Comms_model->getTotalVotesAnswer($aid);
		foreach($query->result() as $row)
		{
			$total=$row->total_votes;
		}
		return $total;
	}

	/*
	Function to toggle between toggle prefrences of the user and save it.
	*/
	public function updateFollowPreference()
	{
		$this->load->model('Comms_model');
		$this->load->library('session');
		$qid=$this->input->post('qid');
		$flag=$this->input->post('flag');
		$cid=$this->session->userid;
		$query=$this->Comms_model->updateFollowPreference($qid,$cid);
	}
	/*
	Function to get whether the question is being followed by the user or not.
	*/
	public function getFollowPreference()
	{
		$this->load->model('Comms_model');
		$this->load->library('session');
		$qid=$this->input->post('qid');
		$cid=$this->session->userid;
		$query=$this->Comms_model->getFollowPreference($cid,$qid);
		if($query->num_rows()==0)
		{
			echo 0;
		}
		else
		{
			foreach($query->result() as $pref)
			{
				$flag=$pref->follow;
			}
			echo $flag;
		}			
	}

	/*
	Function to load all the questions of particular tag. If the tag is a college, college page will open
	else normal page will be loaded with all the questions.
	*/
	public function showTagPage()
	{
		$this->load->model('Comms_model');
		$tid=$this->input->get('tid');
		$data['tag']=$tid;
		$this->load->library('session');
		$this->load->helper('url');
		$cid=$this->session->cid;
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$data['userData']=$this->Comms_model->getUserData($mail);
			$data['userData']=$this->Comms_model->getUserData($mail);
			foreach($data['userData']->result() as $row)
			{
				$user_id=$row->id;
			}
			$this->session->set_userdata('userid',$user_id);
			$data['Notifications']=$this->Comms_model->getNotifications($this->session->userid);	
		}
		else
		{
			redirect(site_url("Main/login"));	
		}
		$query=$this->Comms_model->ifTagisCollege($tid);
		if($query->num_rows()==0)
		{
			$data['Questions']=$this->Comms_model->getTagQuestion($tid);
			foreach($data['Questions']->result() as $row)
			{
				$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
				if(!empty($row->answer))
				{
					if($row->answer->comments==1)
					{
						$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
					}
					$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
				}
			}
			$data['isCollege']=0;
			$this->load->view('comms_platform/tagpage',$data);
		}
		else
		{
			$data['Questions']=$this->Comms_model->getTagQuestion($tid);
			foreach($data['Questions']->result() as $row)
			{
				$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
				if(!empty($row->answer))
				{
					if($row->answer->comments==1)
					{
						$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
					}
					$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
					$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
					if($query->num_rows()==0)
					{
						$row->answer->upvoted=2;
					}
					else
					{
						foreach ($query->result() as $key) 
						{
							$flag=$key->upvoted;
						}
						$row->answer->upvoted=$flag;
					}
				}
				$query=$this->Comms_model->getFollowPreference($cid,$row->qid);
				if($query->num_rows()==0)
				{
					$row->followed=0;
				}
				else
				{
					foreach($query->result() as $pref)
					{
						$row->followed=$pref->follow;
					}
				}

				$query=$this->Comms_model->getVotedUser($cid,$row->qid);
				if($query->num_rows()==0)
				{
					$row->question_upvoted=2;
				}
				else
				{
					foreach ($query->result() as $key) 
					{
						$row->question_upvoted=$key->upvoted;
					}
				}
			}
			$data['isCollege']=1;
			foreach ($query->result() as $key) {
				$data['collegeID']=$key->COLL_ID;
			}
			$this->load->view('comms_platform/tagpage',$data);
		}
			
	}

	public function makeAllNotificationRead()
	{
		$this->load->model('Comms_model');
		$this->load->library('session');
		$cid=$this->session->userid;
		$this->Comms_model->makeNotificationRead($cid);
	}

	/*
	Function to get whether the user have already upvoted/downvoted this question or have not voted at all.
	*/
	public function getVotedUser()
	{
		$this->load->model("Comms_model");
		$qid=$this->input->post("qid");
		$this->load->library('session');
		if($this->session->is_logged_in!=0)
		{
			$cid=$this->session->userid;
		}
		else
		{
			$cid=-1;
		}
		$query=$this->Comms_model->getVotedUser($cid,$qid);
		if($query->num_rows()==0)
		{
			echo 2;
		}
		else
		{
			foreach ($query->result() as $row) {
				$flag=$row->upvoted;
			}
			echo $flag;
		}
	}

	/*
	Function to get whether the user have already upvoted/downvoted this answer or have not voted at all.
	*/
	public function getVotedUserAnswer($aid)
	{
		$this->load->model("Comms_model");
		//$aid=$this->input->post("aid");
		$this->load->library('session');
		$cid=$this->session->userid;
		if($this->session->is_logged_in!=0)
		{
			$cid=$this->session->userid;
		}
		else
		{
			$cid=-1;
		}
		$query=$this->Comms_model->getVotedUserAnswer($cid,$aid);
		if($query->num_rows()==0)
		{
			echo 2;
		}
		else
		{
			foreach ($query->result() as $row) {
				$flag=$row->upvoted;
			}
			echo $flag;
		}
	}

	public function saveCommentsQuestion($qid=-1,$comment="")
	{
		$this->load->model("Comms_model");
		$this->load->library("session");
		$cid=$this->session->userid;
		$user=$this->Comms_model->getcommentQA($qid,-1);
		$comment=urldecode($comment);
		foreach ($user->result() as $row ) {
				if($row->cid!=$cid)
				{
					$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>Somebody Commented on your Question</h5></a>";
					$this->saveNotification($row->cid,$notification,$qid,-1,$cid,'COMMENTED');
				}
			}
		$this->Comms_model->saveCommentsQuestion($cid,$qid,$comment);
		$var = mysql_error();
		if(empty($var))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	public function saveCommentsAnswer($aid=-1,$comment="")
	{
		$this->load->model("Comms_model");
		$this->load->library("session");

		$comment=mysql_real_escape_string(urldecode($comment));
		$cid=$this->session->userid;
		$user=$this->Comms_model->getcommentQA(-1,$aid);
		foreach ($user->result() as $row ) {
				if($row->cid!=$cid)
				{
					$notification="<a href='".site_url('Communication/showQuestion?qid='.$row->qid)."'><h5>Somebody Commented on your Answer</h5></a>";
					$this->saveNotification($row->cid,$notification,-1,$aid,$cid,'COMMENTED');
				}
			}
		$this->Comms_model->saveCommentsAnswer($cid,$aid,$comment);
		$var = mysql_error();
		if(empty($var))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}

	/*
	Function to get all the atgs which can be associated to the question based on the question.
	*/
	public function getRecommendedTags()
	{
		$question = strtolower($_POST['question']);
		$this->load->model("Comms_model");
		$recomtags=array();
		$tags=$this->Comms_model->getTags();

		foreach($tags->result() as $tag)			//This foreach loop checks for all tags that are present in the databse as it 												  is.
		{
			$pos=strpos($question,strtolower($tag->tags));
			if($pos!==false)
			{
				array_push($recomtags, $tag->tags);
			}
		}

		$synonyms=$this->Comms_model->getAllSynonyms();	//Gets all synonyms for the tags.
		foreach($synonyms->result() as $key)
		{
			$pos=strpos($question,strtolower($key->synonym));	//Checks for synonyms of the tags present
			if($pos!==false)
			{
				array_push($recomtags, $key->tag);
			}
		}
		$recomtags = array_map('strtolower', $recomtags);
		$recomtags=array_unique($recomtags);
		echo json_encode($recomtags);
	}
	
	/*
	Function to retrive info and show details about a particular question and answer
	*/
	public function showQuestionAnswer($qid,$aid)
	{
		$this->load->model("Comms_model");
		$this->load->library('session');
		if($this->session->is_logged_in!=0)
		{
			$cid=$this->session->userid;
		}
		else
		{
			$cid=-1;
		}
		$totaltags=array();
		$data['question']=$this->Comms_model->getQuestionData($qid);
		foreach($data['question']->result() as $row)
		{
			$data['questiontitle']=strip_tags($row->question);
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsQuestion($row->qid);	//Gets all the comments for that Question
			}
			$tags=$this->Comms_model->getTagsQuestion($row->qid);	//Gets all the tags for the questions
			$row->tags=$tags;	
			foreach ($tags->result() as $key) {
				array_push($totaltags, $key->tags);
			}
			$row->images=$this->Comms_model->getImage($row->qid,-1); 	//Load image/images associated with question. If any.
		}

		$data['relatedQuestions']=$this->getRelevantQuestions($cid,0,$totaltags);

		$data['answer']=$this->Comms_model->getAnswerData($aid);
		foreach($data['answer']->result() as $row)
		{
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsAnswer($aid);
			}
			$row->images=$this->Comms_model->getImage(-1,$aid);
		}
		$this->load->view("comms_platform/questionanswer",$data);
	}
	public function getCommentsQuestion($qid)
	{
		$this->load->model("Comms_model");
		$comments=array();
		$query=$this->Comms_model->getCommentsQuestion($qid);
		foreach ($query->result() as $key) {
			array_push($comments, $key);
		}
		echo json_encode($comments);
	}
	public function getCommentsAnswer($aid)
	{
		$this->load->model("Comms_model");
		$comments=array();
		$query=$this->Comms_model->getCommentsAnswer($aid);
		foreach ($query->result() as $key) {
			array_push($comments, $key);
		}
		echo json_encode($comments);
	}
	
}