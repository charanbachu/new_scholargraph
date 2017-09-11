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

class User extends CI_Controller {

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

	public function profilepublic($watched = 0)
	{
		//$this->load->library('session');
		$this->load->model("college_model");
		//echo $watched.'<br>';
		$watched = $this->college_model->id_decode($watched);

		$watcher = $watched;
		//echo 'ID:'.$watched.'<br>';
		//$temp_watched = $this->college_model->id_decode('YtPTojjrNz06wuYaOmLI3Q');
		//echo 'temp'.$temp_watched.'<br>';
		//$mail=$this->session->email;
		
		if(!empty($mail))
		{
			$watcher = $this->session->userdata["cid"];	//Checking Which User Is Logged In
		}
		else
		{
			$watcher = 0;
			//$watched = $this->college_model->id_decode($watched);
		}
			

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
		{
			$userData = (array)$userData[0];
		}

		$this->load->model('college_model');
		$this->db->where('CID',$watched);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE);
		$i=0;
		//print_r($userColleges);
		if($userColleges->num_rows() == 0)
		{
			/*
				This condition won't be there in public profile
			*/
			//redirect('user/complete');
		}
		else
		{
			foreach($userColleges->result() as $college)
			{
				$college->name = $this->college_model->getCollegeName($college->COLL_ID);
				$college->name = $college->name['college'];
				$college->country = $college->name['country_code'];
				$cid = $college->CID;
				$i++;
			}
			$volume  	= $this->getUserQues($cid);
			$accuracy 	= $this->getUserCred($cid);
			$community	= $this->getUserComms($cid);
			$views 		= $this->GetUserCollViews($cid);
			$rank 		= $this->getCollLeaderboard($cid);
			$total_data['volume'] = $volume['total'];
			$total_data['accuracy'] = $accuracy['total'];
			$total_data['community'] = $community['total'];
			$total_data['rank']		 = $rank['total'];

			/*
				Algo for the overall combination colleges
			*/
			//Algo starts here
			
			$size = sizeof($volume)-1;
			$total_ques = $volume['total'] + $community['total'];   
			if($total_ques >= 50*($size) && $total_data['accuracy'] == "Highly Trusted")
			{
				$total_data['impact'] = 'Highest';
			}
			else if($total_ques >= 50*($size) && $total_data['accuracy'] == "Trusted")
			{
				$total_data['impact'] = 'High';
			}

			else if($total_ques < 50*($size) && ($total_data['accuracy'] == "Highly Trusted" or $total_data['accuracy'] == "Trusted"))
			{
				$total_data['impact'] = 'High';
			}
			else if($total_ques > 25*($size) && $total_ques < 50 )
			{
				$total_data['impact'] = 'Moderate';
			}
			else
			{
				$total_data['impact'] = 'Low';	
			}


			if($total_data['rank'] < 10)
			{
				$total_data['contributor'] = 'Superstar contributor';
			}
			else if($total_data['rank'] > 10 && $total_data['rank'] < 50)
			{
				$total_data['contributor'] = 'Star contributor';	
			}
			else
			{
				$total_data['contributor'] = 'Good Contributor';
			}
			// Algo ends here



			foreach($userColleges->result() as $college)
			{
				$college->volume = $volume[$college->name];
				$college->accuracy = $accuracy[$college->name];
				$college->community = $community[$college->name];
				$college->views 	= $views[$college->name];
				$college->rank 		= $rank[$college->name];
				/*Algo has not implmented correctly 
				  It has to modified*/
				// Algo starts here
				$total_ques = $volume[$college->name] + $community[$college->name];   
				if($total_ques >= 50 && $accuracy[$college->name] == "Highly Trusted")
				{
					$college->impact = 'Highest';
				}
				else if($total_ques >= 50 && $accuracy[$college->name] == "Trusted")
				{
					$college->impact = 'High';
				}

				else if($total_ques < 50 && ($accuracy[$college->name] == "Highly Trusted" or $accuracy[$college->name] == "Trusted"))
				{
					$college->impact = 'High';
				}
				else if($total_ques > 25 && $total_ques < 50 )
				{
					$college->impact = 'Moderate';
				}
				else
				{
					$college->impact = 'Low';	
				}

				if($rank[$college->name][0] < 10)
				{
					$college->contributor = 'Superstar contributor';
				}
				else if($rank[$college->name][0] > 10 && $rank[$college->name][0] < 50)
				{
					$college->contributor = 'Star contributor';	
				}
				else
				{
					$college->contributor = 'Good Contributor';
				}
				// Algo ends here
				
			}
			//tags part
			$tags = $this->GetUserTags($cid);


				$this->load->view('user_profilefe_public',array('userData'=>$userData,'userColleges'=>$userColleges->result(),'watched'=>$watched,'watcher'=>$watcher,'total_data' => $total_data,'tags' => $tags));
		}

	}
	

	public function profile($watched = 0)
	{
		$this->load->library('session');
		$this->load->model("college_model");
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$watcher = $this->session->userdata["cid"];	//Checking Which User Is Logged In
		}
		else
		{

			$watcher = 0;
			$watched = $this->college_model->id_decode($watched);
		}
		
		if($watched == 0)
		{
			$watched = $watcher;
		}

		if($watcher == 0 && $watched == 0)
		{
			redirect('/main/login');
		}

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
		{
			$userData = (array)$userData[0];
		}

		$this->load->model('college_model');
		$this->db->where('CID',$watched);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE);
		$i=0;
		if($userColleges->num_rows() == 0)
		{
			redirect('user/complete');
		}
		else
		{
			foreach($userColleges->result() as $college)
			{
				$college->name = $this->college_model->getCollegeName($college->COLL_ID);
				$college->name = $college->name['college'];
				$college->country = $college->name['country_code'];
				$cid = $college->CID;
				$i++;
			}
			$volume  	= $this->getUserQues($cid);
			$accuracy 	= $this->getUserCred($cid);
			$community	= $this->getUserComms($cid);
			$views 		= $this->GetUserCollViews($cid);
			$rank 		= $this->getCollLeaderboard($cid);
			$total_data['volume'] = $volume['total'];
			$total_data['accuracy'] = $accuracy['total'];
			$total_data['community'] = $community['total'];
			$total_data['rank']		 = $rank['total'];

			/*
				Algo for the overall combination colleges
			*/
			//Algo starts here
			
			$size = sizeof($volume)-1;
			$total_ques = $volume['total'] + $community['total'];   
			if($total_ques >= 50*($size) && $total_data['accuracy'] == "Highly Trusted")
			{
				$total_data['impact'] = 'Highest';
			}
			else if($total_ques >= 50*($size) && $total_data['accuracy'] == "Trusted")
			{
				$total_data['impact'] = 'High';
			}

			else if($total_ques < 50*($size) && ($total_data['accuracy'] == "Highly Trusted" or $total_data['accuracy'] == "Trusted"))
			{
				$total_data['impact'] = 'High';
			}
			else if($total_ques > 25*($size) && $total_ques < 50 )
			{
				$total_data['impact'] = 'Moderate';
			}
			else
			{
				$total_data['impact'] = 'Low';	
			}


			if($total_data['rank'] < 10)
			{
				$total_data['contributor'] = 'Superstar contributor';
			}
			else if($total_data['rank'] > 10 && $total_data['rank'] < 50)
			{
				$total_data['contributor'] = 'Star contributor';	
			}
			else
			{
				$total_data['contributor'] = 'Good Contributor';
			}
			// Algo ends here



			foreach($userColleges->result() as $college)
			{
				$college->volume = $volume[$college->name];
				$college->accuracy = $accuracy[$college->name];
				$college->community = $community[$college->name];
				$college->views 	= $views[$college->name];
				$college->rank 		= $rank[$college->name];
				/*Algo has not implmented correctly 
				  It has to modified*/
				// Algo starts here
				$total_ques = $volume[$college->name] + $community[$college->name];   
				if($total_ques >= 50 && $accuracy[$college->name] == "Highly Trusted")
				{
					$college->impact = 'Highest';
				}
				else if($total_ques >= 50 && $accuracy[$college->name] == "Trusted")
				{
					$college->impact = 'High';
				}

				else if($total_ques < 50 && ($accuracy[$college->name] == "Highly Trusted" or $accuracy[$college->name] == "Trusted"))
				{
					$college->impact = 'High';
				}
				else if($total_ques > 25 && $total_ques < 50 )
				{
					$college->impact = 'Moderate';
				}
				else
				{
					$college->impact = 'Low';	
				}

				if($rank[$college->name][0] < 10)
				{
					$college->contributor = 'Superstar contributor';
				}
				else if($rank[$college->name][0] > 10 && $rank[$college->name][0] < 50)
				{
					$college->contributor = 'Star contributor';	
				}
				else
				{
					$college->contributor = 'Good Contributor';
				}
				// Algo ends here
				
			}
			//tags part
			$tags = $this->GetUserTags($cid);


			$this->load->view('user_profilefe_private',array('userData'=>$userData,'userColleges'=>$userColleges->result(),'watched'=>$watched,'watcher'=>$watcher,'total_data' => $total_data,'tags' => $tags));

		}
		
		//print_r($total_data);
		//print_r($userColleges);
		//$this->load->view('user_profile',array('userData'=>$userData,'userColleges'=>$userColleges,'watched'=>$watched,'watcher'=>$watcher));

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
			$this->load->model('college_model');
			$this->db->where('CID',$loggedInUser);
			$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE)->result();
			foreach($userColleges as $college)
			{
				$college->name = $this->college_model->getCollegeName($college->COLL_ID);
				$college->name = $college->name['college'];
			}
				//Temporary data for facebook login checking 
				//$data['college'] = 'bits pilani';
				//$data['id'] = '34';
				//ends here
				$i=0;
				$data['userColleges'] = $userColleges;
				//print_r($userColleges);
				
				if(isset($_SESSION['college_suggest']))
				{
					$college[0] = $_SESSION['college_suggest'];
					$id[0] = $_SESSION['suggest_id'];
					$data['college'] = $college;
					$data['id'] = $id;
				}
				else
				{
					//$college[0] = 'bits pilani';
					//$id[0] ='34';
					//$college[1] = 'iiit hyderabad';
					//$id[1] ='2';

					$college = "";
					$id = "";
					$data['college'] = $college;
					$data['id'] = $id;
				}	
			 		$this->load->view('complete_signup',$data);
					
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
			else{

				redirect('user/complete');
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
							$page_visit = $this->user_model->getPageVisit();
							$data = $this->session->set_userdata;
							$data['college1'] = $data[0]->COLL_NAME;
							$data['country_code'] =$data[0]->CountryCode;
							$data['user_name'] = $name;
							$data['page_visit'] = $page_visit;
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
		//$watched = $this->College_model->id_decode($watched);
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
		//$message = $watched;
		//$watched = $this->College_model->id_decode($watched);

		$questions=$this->Comms_model->getUserAnswers($watched)->result();
		foreach($questions as $row)
		{
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsAnswer($row->ansid);
			}
			$row->answer_images=$this->Comms_model->getImage(-1,$row->ansid);
			$row->number_of_following_users=$this->Comms_model->getFollowedQuestionUsers($row->qid)->num_rows();
		}
		
		$message = "Start answering questions. Share your knowledge.";
		$this->load->view('ajax/questions_answered',array('questions'=>$questions,'message'=>$message));
	}

	public function getPublicAnswered($watched = -1)
	{
		$this->load->model('Comms_model');
		$this->load->model('College_model');
		//$message = $watched;
		//$watched = $this->College_model->id_decode($watched);

		$questions=$this->Comms_model->getUserAnswers($watched)->result();
		foreach($questions as $row)
		{
			if($row->comments==1)
			{
				$row->comments=$this->Comms_model->getCommentsAnswer($row->ansid);
			}
			$row->answer_images=$this->Comms_model->getImage(-1,$row->ansid);
			$row->number_of_following_users=$this->Comms_model->getFollowedQuestionUsers($row->qid)->num_rows();
		}
		
		$message = "User has not answered any questions";
		$this->load->view('ajax/questions_public_answered',array('questions'=>$questions,'message'=>$message));
	}

	public function getAskedQuestions($watched = -1)
	{
		$this->load->model('Comms_model');
		$this->load->model('College_model');
		//$watched = $this->college_model->id_decode($watched);
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
		$this->load->model("college_model");
		//select CID,SUM(total_attempted) as sorted from coll_specific_leaderboard group by CID order by sorted
		$query = $this->db
              ->select('CID, SUM(total_attempted) AS score')
              ->group_by('CID')
              ->order_by('score', 'desc')
              ->get('UserCollegestring');
        $leaderboard = array();
        foreach($query->result() as $row){
        	$rank = array();
        	$rank["cid"] = $row->CID;
        	$name_query = $this->db
        	              ->select('Display_Name')
        	              ->get_where('users',array('id =' => $row->CID));
        	foreach($name_query->result()  as $name_row)
        	{
        		$rank['name'] = $name_row->Display_Name;
        	}
        	$rank["score"] = $row->score;
        	$rank["cid"]   = $this->college_model->id_encode($rank["cid"]);
        	array_push($leaderboard, $rank);
        }

       // $leaderboard =  json_encode($leaderboard);
       // print_r($leaderboard);
        $this->load->view('leaderboard',array('rank'=>$leaderboard));

	}

	/*
		Input: userid
		Output: User ranking for every college and star contributor
		rank['collname'][0] => user rank for that college
		rank['collname'][1] => user rank after answering x number of questions
	*/

	public function getCollLeaderboard($cid){
		$this->load->model('user_model');	
		$rank = $this->user_model->GetUserCollDetails($cid);
		//print_r($rank);
		return $rank;
	}

	/*
	Input: cid
	Output: Number of views for each college after the user start contributing. 
	*/
	public function GetUserCollViews($cid)
	{
		$this->load->model('user_model');
		$views = $this->user_model->Show_User_CollViews($cid);
		//print_r($views);
		return $views;

	}

	/*
	Input: cid
	Output: usertags for a given college
	tags array structure: 2d Array 
		0th position  => tag name
		1st position  => tag direction(1/-1)
		2nd position  => tag direction name
	*/
	public function GetUserTags($cid){
		$this->load->model('user_model');
		$tags = $this->user_model->Show_User_Tags($cid);
		return $tags;
		//print_r($tags);
	}

	/*
		Get the total number of questions answered for every college
		Input: CID
		Output: array of user answers for structural and attribute questions
	*/

	public function getUserQues($cid){
		$this->load->model('user_model');
		//$cid = $this->session->cid;
		$college_ques = $this->user_model->getUserQues($cid);
		$tot = array_sum($college_ques);
		$college_ques['total'] = $tot;
		return $college_ques;
		//print_r($college_ques);
	}


	/*
		Get the user credibilty for every college of the user
		Input: cid
		Output: array of user credibity for his colleges

	*/

	public function getUserCred($cid){
		$this->load->model('user_model');
		//$cid = $this->session->cid;
		//Names can be changed in later
		$types[0] = 'Highly Trusted';
		$types[1] = 'Trusted';
		$types[2] = 'Average';
		$types[3] = 'Normal';
		$userCollCred = $this->user_model->getUserCred($cid);
		$tot = array_sum($userCollCred)/sizeof($userCollCred);
		$userCollCred['total'] = $tot;
		foreach($userCollCred as $key=>$field){
			if($field >0.75)
			{
				$userCollCred[$key] = $types[0];
			}
			else if($field <=0.75 && $field > 0.5)
			{
				$userCollCred[$key] = $types[1];
			}

			else if($field <=0.50 && $field > 0.25)
			{
				$userCollCred[$key] = $types[2];
			}

			else if($field <= 0.25)
			{
				$userCollCred[$key] = $types[3];
			}
		}
		return $userCollCred;
		//print_r($userCollCred);
		
	}


	/*
		Get the total number of questions user asked and user answered
		for his college and total includes the all colleges he answered and asked
		Input: CID
		Output: array of user communications for every college
	*/
	public function getUserComms($cid){
		$this->load->model('comms_model');
		$this->load->model('user_model');
		//$cid = $this->session->cid;	
		$ques = $this->comms_model->getUserQuestions($cid);
		$tag_arr = array();
		foreach($ques->result() as $row)
		{
			$tags=$this->comms_model->getTagsQuestion($row->qid);
			foreach($tags->result() as $tag_row)
			{
				if(array_key_exists($tag_row->tags,$tag_arr))
				{
					$tag_arr[$tag_row->tags]++;
				}
				else{
					$tag_arr[$tag_row->tags] = 1;	
				}
			}
		}
		$val = $ques->num_rows();
		$ques = $this->comms_model->getQidAnswers($cid);
		foreach($ques->result() as $row)
		{
			$tags=$this->comms_model->getTagsQuestion($row->qid);
			foreach($tags->result() as $tag_row)
			{
				if(array_key_exists($tag_row->tags,$tag_arr))
				{
					$tag_arr[$tag_row->tags]++;
				}
				else{
					$tag_arr[$tag_row->tags] = 1;	
				}
			}
		}
		$coll_ques = array();
		$val += $ques->num_rows();
		foreach($tag_arr as $key => $value)
		{
			$query = $this->user_model->getschool($key);
        	foreach($query as $row)
        	{
        		if(array_key_exists($row->primary_college,$coll_ques))
        		{
        			$coll_ques[$row->primary_college] += $value;
        		}
        		else
        		{
        			$coll_ques[$row->primary_college] = $value;	
        		}
        	}
		}
		$flag = 0;
		if(sizeof($coll_ques) == 0){
			$flag = 1;
		}
		$query = $this->db->get_where('UserCollegestring',array('CID =' => $cid));
		$college = array();
		foreach ($query->result() as $row){
			$collid = $row->COLL_ID;
			$coll_query = $this->db->get_where('college',array('COLL_ID =' =>$collid));
			foreach($coll_query->result() as $coll_row)
			{
				if($flag == 1){
					$coll_ques[$coll_row->COLL_NAME] = 0;
				}
				$college[$coll_row->COLL_NAME] = 1;
			}
		
		}
		
		$result=array_intersect_key($coll_ques,$college);
		$tot = array_sum($result);
		
		if($tot > $val)
		{
			$result['total'] = $tot;
		}
		else{
			$result['total'] = $val;	
		}
		return $result;
	}

}