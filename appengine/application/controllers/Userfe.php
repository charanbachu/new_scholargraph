<?php
/*
Controller for User Module
FUNCTIONS
1. profile() - To display the user profile
2. edit() - Edit Profile controller
3. password - Saves password change - Called from edit profile
4. complete - Complete Profile - Initial
5. addCollege - Adds college for a given user (from Complete profile or edit profile)
6. addName - Saves Name and Description data
7. getFollowedQuestions
8. getAnsweredQuestions
9. getAskedQuestions
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userfe extends CI_Controller {

	/*
	Load forget password view
	*/
	public function forget_password()
	{
		$this->load->view('forget_password');
	}


	/*
	Mail the unique key link to reset password
	*/
	public function forget_password_mail()
	{
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if($this->form_validation->run())
		{
			$user = $this->user_model->check_email_exist($email);
			if($user)
			{
				$key = 	md5(uniqid());
				$this->load->library('email');
				$this->email->from('charanbatchu@gmail.com',"Charan");
				$this->email->to($email);
				$this->email->subject("Change Password");
				$message = "<p> Click on this link to change password</p>";
				$message .= "<p> <a href='".base_url()."user/forget_password_check/$key'>CickHere</a> to change password</p>";
				$this->email->message($message);
				if($this->email->send())
				{
					$this->user_model->update_forget_password($user['id'],$key);
				}
			}

		}
	}


	public function forget_password_check($key)
	{
		$this->load->model('user_model');
		$id = $this->user_model->check_key();
		if($id)
		{

		}
	}

	public function profile($watched = 0)
	{
		$this->load->library('session');
		$this->load->model("college_model");
		$mail=$this->session->email;
		if(!empty($mail))
			$watcher = $this->session->userdata["cid"];	//Checking Which User Is Logged In
		else
			$watcher = 0;
			$watched = $this->college_model->id_decode($watched);

		if($watched == 0)
			$watched = $watcher;

		if($watcher == 0 && $watched == 0)
			redirect('/main/login');

		if($watched != $watcher)	//Will Test Later
		{
			$userAnswers = array();
			$this->load->model('comms_model');
			$answers = $this->comms_model->getUserAnswersOrdered($watched);
			foreach($answers->result() as $answer)
				array_push($userAnswers,$answer);
		}

		$this->db->where('id',$watched);
		$userData = $this->db->get('users')->result();
		if(count($userData)>0)
			$userData = (array)$userData[0];

		$this->load->model('college_model');
		$this->db->where('CID',$watched);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE)->result();
		foreach($userColleges as $college)
		{
			$college->name = $this->college_model->getCollegeName($college->COLL_ID);
			$college->name = $college->name['college'];
		}

		$this->load->view('user_profilefe',array('userData'=>$userData,'userColleges'=>$userColleges,'watched'=>$watched,'watcher'=>$watcher));

	}

	public function profilepublic($watched = 0)
	{
		$this->load->library('session');
		$this->load->model("college_model");
		$mail=$this->session->email;
		if(!empty($mail))
			$watcher = $this->session->userdata["cid"];	//Checking Which User Is Logged In
		else
			$watcher = 0;
			$watched = $this->college_model->id_decode($watched);

		if($watched == 0)
			$watched = $watcher;

		if($watcher == 0 && $watched == 0)
			redirect('/main/login');

		if($watched != $watcher)	//Will Test Later
		{
			$userAnswers = array();
			$this->load->model('comms_model');
			$answers = $this->comms_model->getUserAnswersOrdered($watched);
			foreach($answers->result() as $answer)
				array_push($userAnswers,$answer);
		}

		$this->db->where('id',$watched);
		$userData = $this->db->get('users')->result();
		if(count($userData)>0)
			$userData = (array)$userData[0];

		$this->load->model('college_model');
		$this->db->where('CID',$watched);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE)->result();
		foreach($userColleges as $college)
		{
			$college->name = $this->college_model->getCollegeName($college->COLL_ID);
			$college->name = $college->name['college'];
		}

		$this->load->view('user_profilefe_public',array('userData'=>$userData,'userColleges'=>$userColleges,'watched'=>$watched,'watcher'=>$watcher));

	}

	public function profileprivate($watched = 0)
	{
		$this->load->library('session');
		$this->load->model("college_model");
		$mail=$this->session->email;
		if(!empty($mail))
			$watcher = $this->session->userdata["cid"];	//Checking Which User Is Logged In
		else
			$watcher = 0;
			$watched = $this->college_model->id_decode($watched);

		if($watched == 0)
			$watched = $watcher;

		if($watcher == 0 && $watched == 0)
			redirect('/main/login');

		if($watched != $watcher)	//Will Test Later
		{
			$userAnswers = array();
			$this->load->model('comms_model');
			$answers = $this->comms_model->getUserAnswersOrdered($watched);
			foreach($answers->result() as $answer)
				array_push($userAnswers,$answer);
		}

		$this->db->where('id',$watched);
		$userData = $this->db->get('users')->result();
		if(count($userData)>0)
			$userData = (array)$userData[0];

		$this->load->model('college_model');
		$this->db->where('CID',$watched);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE)->result();
		foreach($userColleges as $college)
		{
			$college->name = $this->college_model->getCollegeName($college->COLL_ID);
			$college->name = $college->name['college'];
		}

		$this->load->view('user_profilefe_private',array('userData'=>$userData,'userColleges'=>$userColleges,'watched'=>$watched,'watcher'=>$watcher));

	}

	/*
	Input : NONE
	Output : Profile Details of the User Currently Logged in
	*/
	public function edit()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))
			$loggedInUser = $this->session->userdata["cid"];
		else
			redirect("/main/login");

		$this->load->model('college_model');
		$this->db->where('CID',$loggedInUser);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE)->result();
		foreach($userColleges as $college)
		{
			$college->name = $this->college_model->getCollegeName($college->COLL_ID);
		}

		$this->db->where('id',$loggedInUser);
		$userData = $this->db->get('users')->result();
		if(count($userData)>0)
			$userData = (array)$userData[0];
		$this->load->view('user_profile_edit',array('userColleges'=>$userColleges,'userData'=>$userData,'userId'=>$id));
	}

	public function password()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$loggedInUser = $this->session->userdata["cid"];
			$oldPassword = htmlspecialchars($this->input->post('currentPassword'));
			$newPassword = htmlspecialchars($this->input->post('newPassword'));
			$newPasswordConfirm = htmlspecialchars($this->input->post('newPasswordConfirm'));
			if($newPassword == $newPasswordConfirm)
			{
				$this->db->where('id',$loggedInUser);
				$data = $this->db->get('users')->result();
				if(isset($data[0]))
				{
					if($data[0]->password == md5($oldPassword))
					{
						$this->db->where('id',$loggedInUser);
						$this->db->set('password',md5($newPassword));
						$this->db->update('users');
					}
					else
					{
						$message = "Incorrect password, please try again";
					}
				}
				else
				{
					$message = "Some Error Occured. Please Try Again Later";
				}
			}
			else
			{
				$message = "New Password and New Password Confirm Don't Match";
			}
		}
		else
		{
			$message = "Don't mess around";
		}
		echo $message;
	}

	public function complete()
	{

		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$loggedInUser = $this->session->userdata["cid"];
			$this->db->where('CID',$loggedInUser);
			$num = $this->db->count_all_results(USERS_COLLEGE_DATA_TABLE);
			if($num > 0)
				redirect('/user/profile');
			else
			{
				$college = "";
				//$college[0] = 'bits pilani';
				//$id[0] = '34';
				//$college[1] = 'IIIT Hyderabad';
				//$id[1] = '2';
				$data['college'] = $college;
				$data['id'] = $id;
				if(isset($_SESSION['college_suggest']))
				{
					$data['college'] = $_SESSION['college_suggest'];
				}
				else
					//$data['college'] = "";	
			 		// $this->load->view('complete_signupfe',$data);
			 		$this->load->view('complete_signupfe',$data);
			}
		}
		else
		{
			redirect('/main/login');
		}
	}
	public function complete2()
	{

		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$loggedInUser = $this->session->userdata["cid"];
			$this->db->where('CID',$loggedInUser);
			$num = $this->db->count_all_results(USERS_COLLEGE_DATA_TABLE);
			if($num > 0)
				redirect('/user/profile');
			else
			{
				if(isset($_SESSION['college_suggest']))
				{
					$data['college'] = $_SESSION['college_suggest'];
				}
				else
					$data['college'] = "";	
			 		// $this->load->view('complete_signupfe',$data);
			 		$this->load->view('getStartedfe',$data);
			}
		}
		else
		{
			redirect('/main/login');
		}
	}

	/*
	Input : POST Variable college,member,stream,degree,major,batch
	Output : Response Message (If successful, then no message) and Data
	*/
	public function addcollege()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		$message = "";
		$college = htmlspecialchars($this->input->post('college'));
		$member = htmlspecialchars($this->input->post('member'));
		$stream = htmlspecialchars($this->input->post('stream'));
		$degree = htmlspecialchars($this->input->post('degree'));
		$major = htmlspecialchars($this->input->post('major'));
		$batch = htmlspecialchars($this->input->post('batch'));
		if($batch == 0)
			$batch = NULL;
		$collegeData = array(
			'COLL_ID'=>$college,
			'member'=>$member,
			'stream'=>$stream,
			'degree'=>$degree,
			'major'=>$major,
			'batch'=>$batch
			);
		if(!empty($mail))
		{
			$loggedInUser = $this->session->userdata["cid"];

			$this->load->model('college_model');
			$collegeName = $this->college_model->getCollegeName($college);
			if($collegeName != NULL)
			{
				if($member!=NULL && $stream!=NULL && $degree!=NULL && $major!= NULL)
				{
					$this->db->where(array('CID'=>$loggedInUser,'COLL_ID'=>$college));
					$num = $this->db->count_all_results(USERS_COLLEGE_DATA_TABLE);
					if($num > 0)
					{
						$message = "You have already added this college";
					}
					else
					{
						$this->load->model('user_model');
						$collegeData['CID'] = $loggedInUser;
						$this->db->insert(USERS_COLLEGE_DATA_TABLE,$collegeData);
						$collegeData['name'] = $collegeName;

						if($this->session->is_logged_in == 2)
						{
							/*
								Only when a users add his first college
							*/
							$name = $this->user_model->getUserName();
							$data = $this->session->set_userdata;
							$data['college1'] = $data[0]->COLL_NAME;
							$data['country_code'] =$data[0]->CountryCode;
							$data['user_name'] = $name;
							$data['prev_node'] =0;
							$data['q_id'] = 0;
							$data['ans_qid'] = 0;
							$data['ans_count'] = 1;
							$data['coll_anscount'] = 0;
							$data['ques_count'] = 1;
							$data['ques_ans'] = 1;
							$data['total_answer'] = 0;
							$data['ques_redirect'] = 1;
							$data['toggle'] = 0;
							$data['structural'] = 1;
							$data['psychographic']=1;
							$data['transition'] = 0;
							$this->session->set_userdata($data);
							$this->user_model->add_table3_user();
							$this->db->where('COLL_ID',$college);
							$data = $this->db->get('college')->result();
							$this->user_model->add_college_user($data[0]->COLL_NAME,$data[0]->CountryCode);
							$node_answer = $this->user_model->get_nodeanswer();
							$data = $this->session->set_userdata;
							$data['is_logged_in'] = 1;
							$data['answer_string'] = $node_answer;
							$this->session->set_userdata($data);
						}
						else
						{
							$this->db->where('COLL_ID',$college);
							$data = $this->db->get('college')->result();
							$this->user_model->add_college_user($data[0]->COLL_NAME,$data[0]->CountryCode);

						}
					}
				}
				else
				{
					$message = "Please Complete The Form";
				}
			}
			else
			{
				$message = "Please Select a College From the Given List";
			}
		}
		else
		{
			$message = "Please Log In";
		}

		$response = array();
		$collegeData["name"] = $collegeData["name"]["college"];
		$response['message']= $message;
		$response['data'] = $collegeData;
		echo json_encode($response);
	}

	/*
	Add display name to user
	*/
	public function addName()
	{
		$message = "";
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$loggedInUser = $this->session->userdata["cid"];
			$name = htmlspecialchars($this->input->post('name'));
			$description = htmlspecialchars($this->input->post('about'));
			if($name == "")
				$message = "Please provide your name";
			else
			{
				$data = $this->session->set_userdata;
				$data['user_name'] = $name;
				$this->session->set_userdata($data);
				$this->db->where('id',$loggedInUser);
				$data = $this->db->get('users')->result();
				if(count($data)>0)
				{
					//updating -> allowed
					$data = array(
						'id'=>$loggedInUser,
						'Display_Name'=>$name,
						'About'=>$description
						);
					$this->db->where('if',$loggedInUser);
					$this->db->update('users',$data);
				}
				else
				{
					$data = array(
						'id'=>$loggedInUser,
						'Display_Name'=>$name,
						'About'=>$description
						);
					$this->db->insert('users',$data);
				}
			}
		}
		else
		{
			$message = "Please Log In";
		}
		echo $message;
	}

	public function getFollowedQuestions($watched = -1)
	{
		$this->load->model('Comms_model');
		$this->load->model('College_model');
		$watched = $this->college_model->id_decode($watched);
		$questions=$this->Comms_model->getFollowingQuestions($watched);
		foreach($questions as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$watched);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
			}
			$row->number_of_following_users=$this->Comms_model->getFollowedQuestionUsers($row->qid)->num_rows();;
		}
		$message = "Start exploring your interests";
		$this->load->view('ajax/questions',array('questions'=>$questions,'message'=>$message));
	}

	public function getAnsweredQuestions($watched = -1)
	{
		//check if self or public
		$this->load->model('Comms_model');
		$this->load->model('College_model');
		$watched = $this->college_model->id_decode($watched);
		$questions=$this->Comms_model->getUserAnswers($watched)->result();
		foreach($questions as $row)
		{
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsAnswer($row->ansid);
			}
			$row->answer_images=$this->Comms_model->getImage(-1,$row->ansid);
			$row->number_of_following_users=$this->Comms_model->getFollowedQuestionUsers($row->qid)->num_rows();;
		}
		$message = "Start answering questions. Share your knowledge.";
		$this->load->view('ajax/questions_answered',array('questions'=>$questions,'message'=>$message));
	}

	public function getAskedQuestions($watched = -1)
	{
		$this->load->model('Comms_model');
		$this->load->model('College_model');
		$watched = $this->college_model->id_decode($watched);
		$questions=$this->Comms_model->getUserQuestions($watched)->result();
		foreach($questions as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$watched);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
			}
			$row->number_of_following_users=$this->Comms_model->getFollowedQuestionUsers($row->qid)->num_rows();;
		}
		$message = "Start asking questions. You'll learn if you ask";
		$this->load->view('ajax/questions',array('questions'=>$questions,'message'=>$message));
	}

	public function getLeaderboard(){
		//select CID,SUM(total_attempted) as sorted from coll_specific_leaderboard group by CID order by sorted
		$query = $this->db
              ->select('CID, SUM(total_attempted) AS score')
              ->group_by('CID')
              ->order_by('score', 'desc')
              ->get('coll_specific_leaderboard');
        $leaderboard = array();
        foreach($query->result() as $row){
        	$rank = array();
        	$rank["cid"] = $row->CID;
        	$rank["score"] = $row->score;
        	array_push($leaderboard, $rank);
        }

        echo json_encode($leaderboard);

	}

}