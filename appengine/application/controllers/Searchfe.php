<?php

/*
The Search Controller used for SERP
FUNCTIONS
1. index - Main Search URL takes the input query and calls the search result function
2. search_result() - Takes the query term and origin (Commn or Other) and generate initial result of All section
3. search_college_api() - API to search for colleges based on a given term
4. leastupvotes - @Akhilesh
5. maxupvotes
6. SearchPage
7. search_suggestions() - To generate suggestions while the user is typing
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchfe extends CI_Controller
{
	/*
	Main Search Url, calls search_result() function with origin set on the basis of HTTP_REFERRER to differentiate between call from communication and call from normal platform.
	*/
	public function index()
	{
	$queryTerm = htmlspecialchars($this->input->get('query'));
		$origin = $_SERVER['HTTP_REFERER'];
		if(strpos($origin,"Communication") === false)
			$origin = 1;	//Normal Search
		else
			$origin = 2;	//Communication First
		$this->search_resultfe($queryTerm,$origin);
	}

	/*
		Function adds a search term to the current search query which is saved via Session. search_result function is then called with new query string;
	*/
	public function add_filter($term)
	{
		$_SESSION['searchQuery'] = $_SESSION['searchQuery']." ".$term;
		$this->search_resultfe($_SESSION['searchQuery'],1);
	}

	/*
		Function removes a search term to the current search query which is saved via Session. search_result function is then called with new query string;
	*/
	public function remove_filter($term)
	{
		$_SESSION['searchQuery'] = str_replace($term," ",$_SESSION['searchQuery']);
		$this->search_resultfe($_SESSION['searchQuery'],1);
	}


	/*
	Input : Query Term which has to be searched
	Output : Json encoded array containing college order, college data, discussions order.
	Logic :	It calls function search_college() and search_discussion() of search_model
	*/
	public function search_resultfe($queryTerm,$origin = 1)
	{
		$this->load->model('search_model');
		$this->load->model('Comms_model');

		//Get college result
		$data = $this->search_model->search_college($queryTerm,0,6);


		//Discussion and question searches not working 
		$data['discussion'] = $this->search_model->search_discussion($queryTerm);
		$data['filters'] = $this->search_model->showFilters();
		$data['origin'] = $origin;
		$this->load->library('session');
		$_SESSION['searchQuery'] = $queryTerm;
		//print_r($this->session);
		if($this->session->is_logged_in!=0 || !isset($this->session->is_logged_in))
		{
			$cid=$this->session->cid;
		}
		else
		{
			$cid=-1;
		}
		foreach($data['discussion']['questions'] as $row)
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
				if(empty($query->result()))
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
			if(empty($query->result()))
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
			if(empty($query->result()))
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
		$this->load->view('search_resultfe',$data);
	}

	/*
	Input : POST variable Query, Page No. and Filters
	Output : Search results based on filters.
	Logic : Calls search_college() function in search_model
	*/
	public function search_college_api()
	{
		$queryTerm = htmlspecialchars($this->input->post('query'));
		$page = htmlspecialchars($this->input->post('page'));
		$filters = $this->input->post('filters');
		$filters = json_decode($filters);
		$this->load->model('search_model');
		$data = $this->search_model->search_college($queryTerm,$page,9,$filters);
		//If clicks on getMore Then Use Existing Filters, else get New Filters, reset page and then search.
		echo json_encode($data);
	}

	public function leastupvotes($a, $b)
	{
		if($a->upvotes < $b->upvotes)
			return -1;
		else if($a->upvotes==$b->upvotes)
			return 0;
		else
			return 1;
	}
	public function mostupvotes($a, $b)
	{
		if($a->upvotes > $b->upvotes)
			return -1;
		else if($a->upvotes==$b->upvotes)
			return 0;
		else
			return 1;
	}

	public function SearchPage($sort='default',$rank=-1)
	{
		$this->load->model('search_model');
		$this->load->model('Comms_model');
		$this->load->library('session');
		if($this->session->is_logged_in!=0)
		{
			$cid=$this->session->cid;
		}
		else
		{
			$cid=-1;
		}
		$searchQuery = strtolower(htmlspecialchars($this->input->get('query')));
		if($sort=='default')
			$data=$this->search_model->search_discussion($searchQuery,$sort,$rank);
		else
		{
			if($sort=='leastupvotes')
			{
				$data=$this->search_model->search_discussion($searchQuery,$sort,$rank);
				usort($data['questions'],array("Searchfe","leastupvotes"));
			}
			else if($sort=='mostupvotes')
			{
				$data=$this->search_model->search_discussion($searchQuery,$sort,$rank);
				usort($data['questions'],array("Searchfe","mostupvotes"));
			}
		}
		//print_r($data);
		$comments=array();
		foreach ($data['questions'] as $row)
		{
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$cid);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$query=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
					foreach ($query->result() as $key)
					{
						array_push($comments,$key);
					}
					$row->comments=$comments;
				}

				$query=$this->Comms_model->getVotedUserAnswer($cid,$row->answer->ansid);
				if(empty($query->result()))
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
			if(empty($query->result()))
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
			if(empty($query->result()))
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
		echo json_encode($data);
	}


	/*
	Function that takes the search query and returns the search results.
	Input : POST Variable search
	Output : Array of search suggestion of 2 colleges 
	*/
	public function search_suggestions()
	{
		$origin = 1;
		$expected = array(2,2);
		

		$this->load->model('Comms_model');
		$this->load->model('Search_model');
		$this->load->model('College_model');
		$data=strtolower($this->input->post('searchfe'));
		$searchfe=array();

		$corpus=array();
		$tags=$this->Comms_model->getAllTags("");
		foreach($tags->result() as $row)
		{
			array_push($corpus,strtolower($row->tags));
		}
	/*	$match_results=$this->Search_model->get_similar_documents($data,$corpus);
		$found = 0;
		$i=0;
		/*
		foreach ($match_results as $key => $value) {
			if($i<$expected[0])
			{
				$tagid=$this->Comms_model->ifTagisCollege($corpus[$key]);
				foreach ($tagid->result() as $row)
				{
					$id=$row->colg_id;
					
				}
				$this->load->model("college_model");
				array_push($search, array("profile",$corpus[$key],site_url('College/details/'.$this->college_model->id_encode($id))));
				$i++;
			}
		}*/
		

		$i=0;
		$query = $this->Search_model->search_suggestion_college($data);
		foreach($query->result() as $row)
		{
			if($i>1) // Condition to check for first two colleges matching
				break;
			array_push($searchfe, array("profile",$corpus[$row->colg_id],site_url('College/details/'.$this->College_model->id_encode($row->colg_id))));
			$i++;
		}



		/*$found+=$i;

		$i=0;
		foreach ($match_results as $key => $value) {
			if($i<$expected[1])
			{
				array_push($search, array("topic",$corpus[$key],site_url('Communication/showTagPage?tid='.$corpus[$key])));
				$i++;
			}
		}

		$found+=$i;

		$quesids=array();
		$corpus=array();

		$ques=$this->Comms_model->getAllQuestions("");
		foreach($ques->result() as $row)
		{
			array_push($corpus,strtolower($row->question));
			array_push($quesids,$row->qid);
		}

		$match_results=$this->Search_model->get_similar_documents($data,$corpus);
		$i=0;

		foreach ($match_results as $key => $value) {
			if($i<(5-$found))	//Maximum is 5
			{
				array_push($search, array("question",$corpus[$key],site_url('Communication/showQuestion?qid='.$quesids[$key])));
				$i++;
			}
		}
		*/
		//if origin is Communication then reverse the array
		if($origin == 2)
			$searchfe = array_reverse($searchfe);

		echo json_encode($searchfe);
	}

}