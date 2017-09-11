<?php

/*
Controllers paths:
		->login  ->login.php  -> login_validation -> home.php
		SignUP:
		->signup ->signup.php -> signup_validation
		->confirmation email --- register_user ->update table3
		->college()->college.php->college_validation()
		->members()->members.php()->question_validation()->userdetails()


*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once (dirname(__FILE__) . "/user.php");
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		$this->load->library('facebook');
		$this->load->helper('url');
	}

	public function index()
	{
		redirect('home');

	}
	public function home()
	{
		$this->load->view('');
	}
	public function delete_data()
	{
        $this->load->model('user_model');
		$this->user_model->deletedata();
		redirect(site_url('main/logout'));
	}


	/*
		Redirects if already logged in else loads new login view
	*/
	public function login()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))
		{
			if(isset($_SERVER['HTTP_REFERER']))
			{
				if(strpos($_SERVER['HTTP_REFERER'],'signup') !== false || strpos($_SERVER['HTTP_REFERER'],'login') !== false)
				{
					redirect('/home');
				}
				else
					redirect($_SERVER['HTTP_REFERER']);
			}
			redirect(site_url('/user/profile'));
		}
		else
		{
			// if($this->session->flag_college&&$this->session->flag_node){
			// 	redirect() ->redirect to the college profile page->to the correct node if possible 
			// }
			if(isset($_SERVER['HTTP_REFERER']))
			{
				$this->load->library('session');
				if(strpos($_SERVER['HTTP_REFERER'],'signup') !== false || strpos($_SERVER['HTTP_REFERER'],'login') !== false)
					$this->session->set_userdata('redirect',urlencode('/home'));
				else
					$this->session->set_userdata('redirect',urlencode($_SERVER['HTTP_REFERER']));
			}
			$this->load->helper('form');
			$data['tab'] = 1;

			$data['login_emailerror'] = "";
            $data['login_password'] =  "";
			$data['email_error'] ="";
			$data['name_error'] = "";
			$this->load->view('new_login',$data);
		}
	}
	public function country_tree($country)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$string = $this->user_model->get_countrystring($country);
		if($string[0] != -1)
		{
			$data = $this->user_model->get_nodetree();
			$country=str_ireplace("%20"," ",$country);
			$data['country'] = $country;
			$data['node_pos'] =$this->user_model->get_nodeposition();
			$data_questions = $this->user_model->get_allquestions();
			$opt = $this->user_model->get_alloptions();
			$data['opt']  = $opt;
			$data['question'] = $data_questions['question'];
			$data['opt_num']  = $data_questions['opt_num'];
			$data['option_content'] = $data_questions['option_content'];
			$data['string'] = $string;
			$this->load->view('country_tree',$data);

		}
		else
		{
			redirect('main/country');
		}

	}

	public function show_bulk()
	{
		$query = $this->db->get('Bulk_Upload');
		foreach($query->result() as $row)
		{
			echo 'CID: '.$row->CID.'<br>';
			echo 'answer_string: '.$row->Answer_String.'<br>';
			echo 'Coll_ID: '.$row->Coll_ID.'<br>';
		}
	}
	public function country()
	{
		$string[0] = -1;
		$data['string'] = $string;
		$this->load->view('country_tree',$data);
	}
	public function college()
	{
		$string[0] = 1;
		$data['string'] = $string;
		$this->load->view('college_tree',$data);
	}
	public function college_tree($college,$country)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$string = $this->user_model->get_collegestring($college,$country);
		if($string[0] != 1)
		{

			$data = $this->user_model->get_nodetree();
			$college=str_ireplace("%20"," ",$college);
			$country=str_ireplace("%20"," ",$country);
			$data['college'] = $college;
			$data['country'] = $country;
			$opt = $this->user_model->get_alloptions();
			$data['opt']  = $opt;
			$data['node_pos'] =$this->user_model->get_nodeposition();
			$data_questions = $this->user_model->get_allquestions();
			$data['question'] = $data_questions['question'];
			$data['opt_num']  = $data_questions['opt_num'];
			$data['option_content'] = $data_questions['option_content'];
			$data['string'] = $string;
			$this->load->view('college_tree',$data);
		}
		else
		{
			redirect('main/college');
		}

	}
	public function enable_coll_bit($position,$college,$country_code)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->user_model->enable_collegebit($position,$college,$country_code);
		redirect('main/college_tree/'.$college.'/'.$country_code);
	}
	public function disable_coll_bit($position,$college,$country_code)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->user_model->disable_collegebit($position,$college,$country_code);
		redirect('main/college_tree/'.$college.'/'.$country_code);
	}
	public function enable_glob_bit($position,$country_code)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->user_model->enable_globcountrybit($position,$country_code);
		redirect('main/node_tree');

	}
	public function disable_glob_bit($position,$country_code)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->user_model->disable_globcountrybit($position,$country_code);
		redirect('main/node_tree');
	}
	public function enable_coun_bit($position,$country_code)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->user_model->enable_countrybit($position,$country_code);
		redirect('main/country_tree/'.$country_code);

	}
	public function disable_coun_bit($position,$country_code)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->user_model->disable_countrybit($position,$country_code);
		redirect('main/country_tree/'.$country_code);
	}
	public function enable_coun_attrbit($position,$country_code,$nodeid)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		if($country_code == 'Global')
		{
			$this->user_model->enable_glob_attrbit($position,$country_code,$nodeid);
		}
		else
		{
			$this->user_model->enable_country_attrbit($position,$country_code,$nodeid);
		}
		redirect('main/show_attrtree/'.$nodeid.'/'.$country_code);
	}
	public function disable_coun_attrbit($position,$country_code,$nodeid)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		if($country_code == 'Global')
		{
			$this->user_model->disable_glob_attrbit($position,$country_code,$nodeid);
		}
		else
		{
		$this->user_model->disable_country_attrbit($position,$country_code,$nodeid);
		}
		redirect('main/show_attrtree/'.$nodeid.'/'.$country_code);
	}
	public function show_attrtree($node_id,$country)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$string = $this->user_model->get_node_attr($node_id,$country);
		$data = $this->user_model->get_attrnodetree();
		$data['node_pos'] =$this->user_model->get_attrnodeposition();
		$data_questions = $this->user_model->get_allquestions();
		$opt = $this->user_model->get_alloptions();
		$data['country']  = $country;
		$data['attrnode_id'] = $node_id;
		$data['opt']  = $opt;
		$data['question'] = $data_questions['question'];
		$data['opt_num']  = $data_questions['opt_num'];
		$data['option_content'] = $data_questions['option_content'];
		$data['string'] = $string;
		$this->load->view('con_attrtree',$data);

	}
	public function change_conbit()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$country = $this->input->post('country_code');
		redirect('main/country_tree/'.$country);
	}
	public function change_bit()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$college = $this->input->post('college');
		$country = $this->input->post('country_code');
		redirect('main/college_tree/'.$college.'/'.$country);
		$string = $this->user_model->get_collegestring($college,$country);
		if($string[0] != 1)
		{
			$data = $this->user_model->get_nodetree();
			$data['node_pos'] =$this->user_model->get_nodeposition();
			$data_questions = $this->user_model->get_allquestions();
			$data['question'] = $data_questions['question'];
			$data['opt_num']  = $data_questions['opt_num'];
			$data['option_content'] = $data_questions['option_content'];
			$data['string'] = $string;
			$this->load->view('college_tree',$data);

		}
		else
		{
			redirect('main/coll_bitchange');
		}


	}
	public function change_nodename()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$node_id = $this->input->post('node_id');
		$node_name = $this->input->post('node_name');
		$this->user_model->changenode_name($node_id,$node_name);
		redirect('main/node_tree');
	}

	public function change_attrnodename(){
		$this->load->helper('form');
		$this->load->model('user_model');
		$node_id = $this->input->post('node_id');
		$node_name = $this->input->post('node_name');
		$this->user_model->change_attrnode_name($node_id,$node_name);
		redirect('main/attr_tree');
	}
	public function admin_insertnode()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$data['node_position'] = $this->input->post('node_position');
		$data['node_name'] =$this->input->post('node_name');
		$data['node_type'] =$this->input->post('node_type');
		$data['prev_node'] =$this->input->post('prev_node');
		$data['trigger_ques'] =$this->input->post('trigger_ques');
		$opt_num = $this->user_model->insert_question($data['trigger_ques'],$data['node_type']);
		if($data['node_type'] == 'Structural')
		{
			$data['option_value']=$opt_num;
			$opt_num = 0;
		}
		$data['prev_node'] = $this->user_model->insert_nodes($data);
		$value = $this->user_model->insert_position($data['node_position']);
		if($value != -1)
		{
			$this->user_model->change_allbits($data['node_position']);
		}
		for($i=0;$i<$opt_num;$i++)
		{
			$position = $i + 1 + $data['node_position'];
			$data['node_type'] = 'Structural';
			$data['option_value']=$i+1;
			$this->user_model->insert_nodes($data);
			$this->user_model->insert_position($position);
			if($value != -1)
			{
				$this->user_model->change_allbits($position);
			}

		}

		redirect('main/node_tree');

	}

	public function admin_insertattrnode($profiler=1)
	{
		$this->load->helper('form');
		$this->load->model('user_model');

		$data['Node_Name'] = $this->input->post('node_name');
		$data['Node_Type'] = $this->input->post('node_type');
		$data['Prev_Node'] = $this->input->post('prev_node');
		$data['new_Ques'] =$this->input->post('new_ques');
		$tot_ans =$this->input->post('trigger_ans');
		$prev_node = $this->input->post('prev_node');
		$node_type = $this->input->post('node_type');
		if($node_type == 'Structural'){
			$query = $this->db->get_where('AttributeNodeTable',array('Node_ID =' => $prev_node));
			foreach($query->result() as $row){
				$q_id = $row->Trigger_Ques;
			}
		}
		else if($node_type == 'Decision'){
			$this->db->select_max('Q_ID');
			$query = $this->db->get('QUESTIONTABALE');
			foreach($query->result() as $row){
				$q_id = $row->Q_ID+1;
			}
		}
		$opt_num = $this->user_model->insert_question($q_id,$node_type);
		$opt_num = $opt_num - $tot_ans + 1;
		
		if($node_type == 'Structural'){
			$this->user_model->insert_attrnodes($q_id,$opt_num);
			$value = $this->user_model->insert_attrposition($tot_ans);
			if($value!=-1)
			{
				$this->user_model->change_allattrbits($tot_ans);	
			}
		}
		else if($node_type == 'Decision'){
			$this->user_model->insert_attrnodes($q_id,0);
			$value = $this->user_model->insert_attrposition($tot_ans+1);
			if($value!=-1)
			{
				$this->user_model->change_allattrbits($tot_ans+1);
			}
		}
		redirect('main/attr_tree');
		/*$this->user_model->insert_attrnodes();
		$this->user_model->insert_question();
		$value = $this->user_model->insert_attrposition();
		if($value != -1)
		{
			$this->user_model->change_allattrbits();
		}

		if($profiler==1)
		{
			$this->output->enable_profiler(TRUE);
			$sections = array(
			    'config'  => TRUE,
			    'queries' => TRUE
			    );

			$this->output->set_profiler_sections($sections);
		}*/
		// redirect('main/attr_tree');

	}
	public function temp_shiftbits(){
		$this->load->helper('form');
		$this->load->model('user_model');

		$query = $this->db->get('StructureAttribute');
		foreach($query->result() as $row)
		{
			$attr_string = $row->Attr_Bit_String;
			//$data4['ID']   = $row->ID;
			//$data5['Attr_Bit_String'] = $this->user_model->shift_bitstring($attr_string,$position);
		}
		echo $attr_string.'<br>';

		
		return ;
	}

	public function attr_tree($profiler=1)
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$data = $this->user_model->get_attrnodetree();
		$data['node_pos'] =$this->user_model->get_attrnodeposition();
		$data_questions = $this->user_model->get_allquestions();
		$opt = $this->user_model->get_alloptions();
		$data['opt']  = $opt;
		$data['question'] = $data_questions['question'];
		$data['opt_num']  = $data_questions['opt_num'];
		$data['option_content'] = $data_questions['option_content'];
		if($profiler==1)
		{
			$this->output->enable_profiler(TRUE);
			$sections = array(
			    'config'  => TRUE,
			    'queries' => TRUE
			    );

			$this->output->set_profiler_sections($sections);
		}
		$this->load->view('attrtree',$data);
	}

	public function node_tree()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$data = $this->user_model->get_nodetree();
		$data['node_pos'] =$this->user_model->get_nodeposition();
		$data_questions = $this->user_model->get_allquestions();
		$opt = $this->user_model->get_alloptions();
		$string = $this->user_model->get_countrystring('Global');
		//print_r($options);
		$data['string'] = $string;
		//echo $string;
		$data['opt']  = $opt;
		$data['question'] = $data_questions['question'];
		$data['opt_num']  = $data_questions['opt_num'];
		$data['option_content'] = $data_questions['option_content'];
		$this->load->view('nodetree',$data);

	}

	/*
		Direct_dataupload => Agents to upload the data directly
	*/

	public function direct_dataupload()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$data = $this->user_model->get_nodetree();
		$data['node_pos'] =$this->user_model->get_nodeposition();
		$data_questions = $this->user_model->get_allquestions();
		$opt = $this->user_model->get_alloptions();
		$string = $this->user_model->get_countrystring('Global');
		//print_r($options);
		$data['string'] = $string;
		//echo $string;
		$data['opt']  = $opt;
		$data['question'] = $data_questions['question'];
		$data['opt_num']  = $data_questions['opt_num'];
		$data['option_content'] = $data_questions['option_content'];
		$this->load->view('nodetree',$data);
	}



	public function add_options()
	{
		$this->load->helper('form');
		$this->load->model('user_model');
		$option = $this->input->post('option_content');
		//echo $option;
		$this->user_model->addoptions($option);

	}

	public function disable_visit_bit()
	{
		$this->load->model('user_model');
		$pos = $this->input->post('pos');
		$this->user_model->getDisablePagebit($pos);
		return;
	}

	/*
		Redirects to signup view
	*/

	public function signup(){
		$this->load->helper('form');
		$this->load->view('signup');
	}
	public function restricted()
	{
		$this->load->view('restricted');
	}

	/*
	Validate the login credentials given
	*/

	public function login_validation(){
		//$this->session->sess_destroy();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$this->load->model('user_model');
			if($id = $this->user_model->getcid($email))
			{
				//echo $id;

				if($this->user_model->set_collegesession($id)==-1)
				{
					$data = array(
					'email' 		=> $this->input->post('email'),
					'is_logged_in' 	=> 2,
					'cid' 			=> $id,
					 );
					$this->session->set_userdata($data);
					$this->load->helper('form');
					redirect('user/complete');
				}
				else
				{

					$data = $this->session->set_userdata;
					//print_r($data);
					//echo $this->session->college1;
					//echo $this->session->ans_count;
					$data['email'] = $this->input->post('email');
					$data['ans_count'] = 1;  //Count of total answers till the user logouts
					$data['coll_anscount'] = 0;
					$data['is_logged_in'] = 1;
					$data['cid'] = $id;
					$data['prev_node'] = 0;
					$data['q_id'] = 0;
					$data['ans_qid'] = 0;
					$data['ques_count'] = 1;
					$data['ques_redirect'] = 1;
					$data['ques_ans'] = 1;  //Count for total questions asked in one stretch
					$data['toggle'] = 0;
					$data['structural'] = 1;
					$data['psychographic']=1;
					$data['transition'] = 0;
					$this->session->set_userdata($data);
					$this->setColors();
					//$sess_data = $this->session->set_userdata;
					//int_r($sess_data);
					//$data['country_code'] = $this->user_model->get_countrycode();
					//$this->session->set_userdata($data);
					$name = $this->user_model->getUserName();
					$page_visit = $this->user_model->getPageVisit();
					$data['user_name'] = $name;
					$data['page_visit'] = $page_visit;
					$data['total_answer']  = $this->user_model->getAnsweredQues();
					$data['answer_string'] = $this->user_model->get_nodeanswer();
					$this->session->set_userdata($data);
					$mailid= $this->input->post('email');
					$this->load->model('user_model');
					$this->load->library('session');
					$redirect = $this->session->redirect;
					if(isset($redirect))
					{
						redirect(urldecode($redirect));
					}
					else
					{
						redirect('home');
					}
					//redirect('home');
					/*$answer_string = $this->session->answer_string;
					for($i=0;$i<strlen($answer_string);$i++)
					{

						if($answer_string[$i] == 1)
						{
							$url = 'main/structure_nodes';
							echo'
							<script>
							window.location.href = "'.base_url().'index.php/'.$url.'";
							</script>
							';
						}
					}
					$data = $this->user_model->get_attributeques();
					if($data['question'] == -1)
					{
						$url = 'home';
						echo'<script>
						window.location.href = "'.base_url().$url.'";
						</script>
						';
					}
					else
					{
						$url = 'main/structure_nodes';
						echo'
						<script>
						window.location.href = "'.base_url().'index.php?/'.$url.'";
						</script>
						';
					}*/


				}
			}
			else
			{
				echo "cannot get customerID";
			}
		}
		else
		{
			$data['tab'] = 1;
            $data['login_emailerror'] = form_error('email');
            $data['login_password'] =  form_error('password');
			$data['name_error'] = "";
			$data['email_error'] = "";
			$this->load->view('new_login',$data);
			//echo 'Username or password is incorrect '; //Temporary
		}

	}
	public function setColors()
	{
		$data = $this->session->set_userdata;
		$data['color'][0] = 1;
		$data['color'][1] = '#0F9D58';
		$data['color'][2] = '#689F38';
		$data['color'][3] = '#795548';
		$data['color'][4] = '#9E9D24';
		$data['color'][5] ='#673AB7';
		$data['color'][6] ='#00ACC1';
		$data['color'][7] ='#039BE5';
		$data['color'][8] ='#F57F17';
		$data['color'][9] ='#DB4437';
		$data['color'][10] ='#EF6C00';
		$data['color'][11] ='#9C27B0';
		$data['color'][12] ='#3B78E7';
		$data['color'][13] ='#009688';
		$data['color'][14] ='#E91E63';
		$this->session->set_userdata($data);


	}
	public function auto_update()
	{
		$this->load->model('user_model');
		$this->user_model->auto_insertusers();
		redirect(site_url('main/logout'));
	}
	public function college_validation()
	{
		if($this->session->is_logged_in == 2)
		{
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->form_validation->set_rules('college1', 'College1', 'required');
			if($this->form_validation->run())
			{
				$college1 = $this->input->post('college1');
				$country = $this->input->post('country_code');
				$country_code = $this->user_model->GetCountryCode($country);
				$data = $this->session->set_userdata;
				$data['college1'] = $college1;
				$data['country_code'] = $country_code;
				$data['prev_node'] =0;
				$data['q_id'] = 0;
				$data['ans_qid'] = 0;
				$data['ans_count'] = 1;
				$data['coll_anscount'] = 0;
				$data['ques_count'] = 1;
				$data['ques_redirect'] = 1;
				$data['toggle'] = 0;
				$data['structural'] = 1;
				$data['psychographic']=1;
				$this->session->set_userdata($data);
				$this->user_model->add_college_user($college1,$country_code);
				$this->user_model->add_table3_user();
				$node_answer = $this->user_model->get_nodeanswer();
				$data = $this->session->set_userdata;
				$data['is_logged_in'] = 1;
				$data['answer_string'] = $node_answer;
				$this->session->set_userdata($data);
				$url = 'home';
				echo'
				<script>
				window.location.href = "'.base_url().'index.php?/'.$url.'";
				</script>
				';
			}
			else
			{
				echo "college input  is required";
				$this->load->view('new_college');
			}
		}
		else if($this->session->is_logged_in == 1)
		{
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->form_validation->set_rules('college1', 'College1', 'required');
			if($this->form_validation->run())
			{
				$college1 = $this->input->post('college1');
				$country = $this->input->post('country_code');
				$country_code = $this->user_model->GetCountryCode($country);
				$add_coll = $this->user_model->add_college_user($college1,$country_code);
				if($add_coll == False)
				{
					echo 'Please add a new college';
					$this->load->view('new_college');

				}
				else
				{

					$url = 'home';
					echo'
					<script>
					window.location.href = "'.base_url().'index.php?/'.$url.'";
					</script>
					';
				}

			}
			else
			{
				echo "college input  is required";
				$this->load->view('new_college');
			}
		}
		else
		{
			redirect('home');
		}
	}


	public function structure_nodes(){
		if($this->session->is_logged_in == 1)
		{
			$this->load->model('user_model');
			$this->load->helper('form');
			$data = $this->session->set_userdata;
			$data['toggle'] = 1;
			$this->session->set_userdata($data);
			//$this->load->view('struct_questions');
			redirect('psychographic/answers');
		}
		else
		{
			redirect('main/login');
		}





	}

	public function contribute()
   {
	   	if($this->session->is_logged_in == 1)
		{
			$this->load->model('user_model');
			$this->load->helper('form');
			$this->load->view('struct_questions');
		}
		else
		{
			redirect('main/login');
		}

   }

   public function get_user_ques($val,$cid)
	{
		$this->load->library('session');
		$this->load->model("college_model");
		$this->db->where('CID',$cid);
		$userColleges = $this->db->get(USERS_COLLEGE_DATA_TABLE)->result();
		$coll_details= $this->college_model->getCollegeName($userColleges[$val]->COLL_ID);
		$coll_name = $coll_details['college'];
		$coll_country = $coll_details['country_code'];
		$this->Ask_College_Ques($coll_name,$coll_country);
		
		echo 
		'
		<link rel="import" href="'.base_url().'assets/polymer_dependency/psycho-structfe.html">

		<psycho-struct heading="'.$this->session->college1.'" url="'.base_url().'main/psycho_structural/1" exit="'.base_url().'home">
		</psycho-struct>

		';
		
		//echo 'charan';
	}
   

   /*
		function to ask the questions for a specific college
		Input : coll_id
		Output : NULL
		varaibles changing: college details of session changed and college flag enabled for coll_session
   */

	public function Ask_College_Ques($college,$country)
	{
		$this->load->model('user_model');
		$college1 = $college;
		$country1 = $country;
		$data = $this->session->set_userdata;
	    $data['coll_flag'] = 0;
		$data['college1'] = $college;
		$data['country_code'] = $country;
		$data['coll_anscount'] = 0;
		$data['ans_count'] = 1;
		$this->session->set_userdata($data);
		$data = $this->session->set_userdata;
		$data['answer_string'] = $this->user_model->get_nodeanswer();
		$this->session->set_userdata($data);
		//echo $this->session->college1;
		/*$data = $this->user_model->get_nodequestion();
		if($data['question'] == -1)
		{
			$data = $this->user_model->get_psycho_nodeques();
			if($data['question'] == -1)
			{
				$data = $this->user_model->get_attributeques();
			}
		}*/
	}

	public function get_quescollege($flag,$type)
	{
		/*
		$type = 1 for strucutral questions
		$type = 2 for psychographic questions
		$flag = 1 for nodequestion
		$flag = 2 for attribute question
		To get the college that the system have some questions to ask the user
		*/
		//echo '<br>'.$this->session->college1;
    	//echo '<br>'.$this->session->country_code;
    	//echo '<br>'.$this->session->answer_string.'<br>';
		$college = $this->session->user_college;
    	$country = $this->session->user_country;
    	$college1 = $this->session->college1;
    	$country1 = $this->session->country_code;

    	for($i=0,$k=0;$k<=sizeof($college);$i++)
    	{
    		//echo $k;
    		if($college1 == $college[$i] && $country1 == $country[$i])
    		{
    			//echo '<br>'.$college[$i];

    			if($i == sizeof($college) - 1)
    			{
    				$i = -1;
    				$j = 0;
    			}
    			else
    			{
    				$j = $i+1;
    			}
    			$college1 = $college[$j];
    			$country1 = $country[$j];
    			$data = $this->session->set_userdata;
    			$data['coll_flag'] = 0;
    			$data['college1'] = $college[$j];
    			$data['country_code'] = $country[$j];
    			$data['coll_anscount'] = 0;
    			$this->session->set_userdata($data);
    			$data['answer_string'] = $this->user_model->get_nodeanswer();
    			$this->session->set_userdata($data);
    			if($flag == 1)
    			{
    				if($type == 1)
    				{
    					$data = $this->user_model->get_nodequestion();
    				}

    				else
    				{
    					$data = $this->user_model->get_psycho_nodeques();
    				}

    			}

    			else
    			{
    				if($type == 1)
    				{
    					$data = $this->user_model->get_attributeques();
    				}

    				else
    				{
    					// When psychographic attributes added then add the questions part
    				}
    			}

    			if($data['question'] != -1)
	        	{

	        		return 0;
	        	}
	        	$k++;

    		}

    	}
    	if($k >= sizeof($college))
    	{
    		// All questions completed for all colleges
    		//echo '1';
    		return 1;
    	}
	}


	public function get_college()
    {
    	$ans_count = $this->session->ans_count;
		$college = $this->session->user_college;
    	$country = $this->session->user_country;
    	$college1 = $this->session->college1;
    	$country1 = $this->session->country_code;
    	for($i=0;$i<sizeof($college);$i++)
    	{
    		if($college1 == $college[$i] && $country1 == $country[$i])
    		{
    			if($i == sizeof($college) - 1) $j = 0;
    			else $j = $i+1;
    			$data = $this->session->set_userdata;
    			$data['college1'] = $college[$j];
    			$data['country_code'] = $country[$j];
    			$data['coll_anscount'] = 0;
    			$this->session->set_userdata($data);
    			$data['answer_string'] = $this->user_model->get_nodeanswer();
    			$this->session->set_userdata($data);
    			//echo '<br>'.$this->session->college1;
    			//echo '<br>'.$this->session->country_code;
    			//echo '<br>'.$this->session->answer_string.'<br>';
    		}
    	}

    	return 0;

    }

    /*
	Input : NIL
	Output : echos the details necessary for the QnA card
	*/
	public function psycho_structural($coll_flag=0)
	{
		/*
			Owner: Charan, Saleel
		*/

		if($this->session->is_logged_in == 1)
		{
			$first_ques = 'false';
			$trans_ques = $this->session->transition;
			$psychographic = $this->session->psychographic; //To know whether psyhograph questions completed or not
			$structural = $this->session->structural;		//To know whether Structural questions completed or not
			$ans_count = $this->session->ans_count;			//To know how many questions the user has answered
			$ques_ans = $this->session->ques_ans;
			$this->load->model('user_model');
			//echo $this->session->ques_count;
			/*
				If and else condition for the when the user clicks on specific college
				when a user clicks on Q&A other than college_specific $session['coll_flag']=0
			*/
			if($coll_flag == 0)
			{
				$session = $this->session->set_userdata;
	            $session['coll_flag'] = 0;
	            $this->session->set_userdata($session);
	            if($ans_count%20 == 1)
	            {
	            	$session = $this->session->set_userdata;
                	$session['ques_ans'] = 1;
                	$session['ques_count'] = 1;
                	$this->session->set_userdata($session);
                	$ques_ans = 1;
	            }
			}
			else{
				
				if($ans_count == 20)
				{
					redirect('user/profile');
				}
				$session = $this->session->set_userdata;
	            $session['coll_flag'] = $session['coll_flag']+1;
	            if(($this->session->ques_count)%20 <=6)
	            {

	            	$session['ques_count'] = 7;	
	            }
	            
	            $this->session->set_userdata($session);
			}
			if($trans_ques == 1)
			{
				//When all structural questions completed then coming to psychograph questions
				$session = $this->session->set_userdata;
	            $session['transition'] = 0;

	            $this->session->set_userdata($session);

			}

			if($this->input->get('firstQuestion') != "true")
            {
                $value = $this->input->get('type');
                if($value == -5)
                {
                	$psychographic = $this->session->psychographic;
                	if($psychographic == 0)
                	{
                		$session = $this->session->set_userdata;
			            $session['ques_count'] = 7;
	    		        $this->session->set_userdata($session);
                	}
                	else
                	{
                		$session = $this->session->set_userdata;
			            $session['ques_count'] = 1;
	    		        $this->session->set_userdata($session);
                	}
                }
            }




			if($this->session->ques_count%20 <= 6 && $coll_flag ==0)
			{

				/*
					Asking the PsychoGraph Questions
				*/
		

				$start = microtime(true);
		    	$color = $this->session->color;
		    	$num_color = $color[0];  //To know the color number which has to be given to the question

		    	$header_color = $color[$num_color]; // Assigning color for the question

		    	$node_flag = 0; 		//node_flag to check whether all psychograph questions completed or not

		    	$ques_count = $this->session->ques_count; //check for asking psychograph or structural questions





			    $data = $this->user_model->get_psycho_nodeques();

		        if($data['question'] == -1)
		        {
		        	$node_flag = $this->get_quescollege(1,2);
		        }
		        if($node_flag == 0)
		        {

		            if($this->input->get('firstQuestion') != "true" and $trans_ques == 0)
		            {

		                $value = $this->input->get('type');
		                if($value == -5)
		                {
		                	$session = $this->session->set_userdata;
		                	$session['ques_ans'] = 1;
		                	$this->session->set_userdata($session);
		                	$ques_ans = 1;

		                }
		                else if($value == -2)
		                {
		                	$session = $this->session->set_userdata;
		                	$session['ques_ans'] = 1;
		                	$this->session->set_userdata($session);
		                	$ques_ans = -2;
		                }
		                else
		                {
		               		$this->user_model->update_psycho_nodeans($value);
		               		$ques_ans = $this->session->ques_ans;
			                $session = $this->session->set_userdata;

			                if($ques_ans == 20)
			                {
			                	$ques_ans = -2;
			                }
			                $session['ques_ans'] = $ques_ans + 1;
			                $ques_ans = $session['ques_ans'];
			                $session['ans_count'] = $this->session->ans_count + 1; //Incrementing the users answer count
			                $this->session->set_userdata($session);
		                }


		            }

		            if($this->session->ques_count > 6)
		            {
		            	$node_flag = 1;   //To ask structural questions after answering 6 psychograph questions
		            }

		            if($structural == 0)
		            {
		            	// If all structural questions completed then ask the psycho graph questions

		            	$session = $this->session->set_userdata;
			            $session['ques_count'] = 1;
			            $this->session->set_userdata($session);
			            $node_flag = 0;
		            }

	                $data = $this->user_model->get_psycho_nodeques();
	                if($data['question'] == -1)
	                {
	                	$node_flag = $this->get_quescollege(1,2);   //To change the college
	                	if($node_flag == 1)
	                	{
	                		//All psychograph questions completed so make psychoflag as '0'
	                		$session = $this->session->set_userdata;
			           		$session['psychographic'] = 0;
				            $this->session->set_userdata($session);
	                	}
		            	$psychographic = 0;
	                	$data = $this->user_model->get_psycho_nodeques();

	                }
	                if($node_flag == 0)
	                {
	                    $question 		= $data['question'];
	                   	$opt_num  		= $data['opt_num'];
	                   	$opt_content 	= $data['option_content'];
	                   	$percentage     = $data['percentage'];
	                   	$set_ques  		= $data['set_ques'];
	                   	$value  		= $transition;
	                   	$ques_flag 		= $data['ques_flag'];
	                   	$node_name 		= $data['node_name'];
	                   	$ques_count 	= $this->session->ques_count;
	                   	$ans_count		= ($this->session->ans_count % 20);
					    if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
	    				if($ans_count == 0) $ans_count = 20;

	                   	$total_answer 		= $this->session->total_answer + $this->session->ans_count - 1;

	                   	for($i=0;$i<$opt_num;$i++)
	                   	{
	                   		//To display percentages after answering each psychograph questions
	                   		$options[$i]['percentage'] = $percentage[$i];
	                   		$options[$i]['value'] = $opt_content[$i];
	                   		$options[$i]['color'] = '#b9c9d6';
	                   	}

	                    $this->load->helper('form');
	                    echo '
	                    {
	                        "question" 	: "'.$question.'",
							"unit_currency_code" :   "'.$unit_currency_code.'",
	                        "options" 	: '.json_encode($options).',
	                        "opt_num" 	: "'.$opt_num.'",
	                        "value" 	: "'.$value.'",
	                        "heading"	: "'.$this->session->college1.'",
	                    	"max_ques"	: "'.$set_ques.'",
	                    	"ques_flag"	: "'.$ques_flag.'",
	                    	"node_name"	: "'.$node_name.'",
	                    	"header"	: "'.$header_color.'",
	                    	"ques_count": "'.$ques_count.'",
	                    	"ans_count" : "'.$ans_count.'",
	                    	"ques_ans"	: "'.$ques_ans.'",
	                    	"total_answer" : "'.$total_answer.'"
		                }';
	                }
		        }
		        if($node_flag == 1)
		        {

		        	//Add these code after inserting attributes

		           /* if($this->input->get('firstQuestion') != "true")
		            {
	                    $value = $this->input->get('type');
	                    $this->user_model->update_attrnodeanswer($value);
		            }
		            $data = $this->user_model->get_psycho_attrques();
		            $attr_flag = 0;
		            if($data['question'] == -1)
		            {
		            	$attr_flag = $this->get_quescollege(2);
		            	if($attr_flag == 1)
		            	{
		            		$question = "";
		            		$value    = 0;
		            		$set_ques = 0;
		            		$opt_num  = 0;
		            		$ques_flag = 0;
			                //redirecting to home
			                echo '{
			                    "question" 	: "'.$question.'",
			                    "options" 	: ["redirect","'.base_url().'home"],
			                    "opt_num" 	: "'.$opt_num.'",
			                    "value" 	: "'.$value.'",
	                    		"max_ques"	: "'.$set_ques.'",
			                    "heading"	: "'.$this->session->college1.'",
			                    "ques_flag"	: "'.$ques_flag.'"
			                }';
		            	}

		            }
		            if($attr_flag == 0)
		            {
		                $question 		= $data['question'];
	                   	$opt_num  		= $data['opt_num'];
	                   	$opt_content 	= $data['option_content'];
	                   	$percentage     = $data['percentage'];
	                   	$set_ques  		= $data['set_ques'];
	                   	$ques_flag 		= 0;
	                   	for($i=0;$i<$opt_num;$i++)
	                   	{
	                   		$options[$i]['percentage'] = $percentage[$i];
	                   		$options[$i]['value'] = $opt_content[$i];
	                   		$options[$i]['color'] = '#b9c9d6';
	                   	}
	                    $this->load->helper('form');
	                    echo '
	                    {

	                        "question" 	: "'.$question.'",
	                        "options" 	: '.json_encode($options).',
	                        "opt_num" 	: "'.$opt_num.'",
	                        "value" 	: "'.$value.'",
	                        "heading"	: "'.$this->session->college1.'",
	                    	"max_ques"	: "'.$set_ques.'",
	                    	"ques_flag"	: "'.$ques_flag.'"
	                    }';
		            }*/




		          /*  $question = "";
		    		$value    = 0;
		    		$set_ques = 0;
		    		$opt_num  = 0;
		    		$ques_flag = 0;
		    		$node_name = 0;
		    		$ques_count = 6;
		            //redirecting to home
		            echo '{
		                "question" 	: "'.$question.'",
		                "options" 	: ["redirect","'.base_url().'home"],
		                "opt_num" 	: "'.$opt_num.'",
		                "value" 	: "'.$value.'",
		        		"max_ques"	: "'.$set_ques.'",
		                "heading"	: "'.$this->session->college1.'",
		                "ques_flag"	: "'.$ques_flag.'",
		                "node_name"	: "'.$node_name.'",
		                "header"	: "'.$header_color.'",
		                "ques_count": "'.$ques_count.'"

		            }';
		            */
		            // All psychograph questions are completed or psychograph questions answered is more than '6'

		            $session = $this->session->set_userdata;
		            $session['ques_count'] = 7;
		            $first_ques = 'true';
		            $this->session->set_userdata($session);

		        }

				//Time taken to diplay a calculate the psychograph question

				$time_elapsed_secs = microtime(true) - $start;
				$session = $this->session->set_userdata;
				$session['time'] = $this->session->time;
				$session['time']['psychoans_validation']= $time_elapsed_secs;
				$session['updated_controller'] = 'psychoans_validation';
				$session['color'] = $this->session->color;
				if($num_color == 14)
				{
					$session['color'][0] = 1;
				}
				else
				{
					$session['color'][0] = $num_color + 1;
				}
				$this->session->set_userdata($session);


			}

			if($this->session->ques_count > 6 or $coll_flag !=0)
			{

				$start = microtime(true);
		    	$color = $this->session->color;
		    	$num_color = $color[0];
		    	$header_color = $color[$num_color];
		    	$node_flag = 0;
		        $flag = 0;

		        $data = $this->user_model->get_nodequestion();  //To check all structural questions completed or not

		        if($data['question'] == -1)
		        {
		        	$college = $this->session->college1;
		        	$country = $this->session->country_code;
		        	if($coll_flag !=0)
		        	{
		        		$node_flag = 1;
		        	}
		        	else
		        	{	
		        		//If node_flag = 1 then ask attribute questions
		        		$node_flag = $this->get_quescollege(1,1);
		        	}
		        	

		        	if($node_flag == 1)
		        	{
		        		$sess_data = $this->session->set_userdata;
		        		$sess_data['college1'] = $college;
		        		$sess_data['country_code'] = $country;
		        		$this->session->set_userdata($sess_data);
		        		$sess_data['answer_string'] = $this->user_model->get_nodeanswer();
		        		$this->session->set_userdata($sess_data);
		        	}
		        }

		        if($node_flag == 0)
		        {

		        	//if the question is first question or coming from psychograph questions skip validation

		            if(($this->input->get('firstQuestion') != "true") && $first_ques == 'false')
		            {

		                $opt_num =$this->session->opt_num;
		                $option_content = $this->session->option_content;
						$input_value = $this->input->get('type');

		                if($input_value == -5)
		                {

		                	$session = $this->session->set_userdata;
		                	$session['ques_ans'] = 1;
		                	$this->session->set_userdata($session);
		                	$ques_ans = 1;
		                }

		                else if($input_value == -2)
		                {

		                	$session = $this->session->set_userdata;
		                	$session['ques_ans'] = 1;
		                	$this->session->set_userdata($session);
		                	$ques_ans = -2;

		                }
		                else
		                {


		                	if($opt_num == 0)
			                {
			                    $array = $this->input->get('ans');
			                    if($array == "" or $array == " ")
			                    {
			                        //echo "Answer that question";
			                    }
			                    else
			                    {
			                        $this->user_model->update_nodeanswer(-1);
			                    }

			                }

			                //check boxes answer updates
			                else if($option_content[0] == "checkbox")
			                {
			                	$array = json_decode($this->input->get('checkboxes'));
			                	$array = explode(",", $array);

			                	$this->user_model->add_checkboxdata($array,1);
			                }

			                else if($option_content[0] == "insert")
			                {
			                    $array = $this->input->get('ans');
			                    $input_array = $this->input->get('type'); //from the radio buttons
			                   // echo 
			                    if(($array == "" or $array == " ") && $input_array == "")
			                    {
			                        //echo "Answer that question";
			                    }
			                    if($array == "" or $array == " ")
			                    {
			                        $value=$input_array;
			                        $this->user_model->update_nodeanswer($value);
			                    }
			                    elseif($input_array == "")
			                    {
			                        $this->user_model->update_nodeanswer(-1);
			                    }
			                    else
			                    {
			                        //echo "Only one option has to be entered";
			                    }
			                }
			                else if($this->input->get('type') != "")
			                {
			                    $array = $this->input->get('type');
			                    $value = $array;
			                    $this->user_model->update_nodeanswer($value);
			                }
			                else
			                {
			                	//echo 's';
			                   // echo "Enter Atlest one option";
			                }

			                $ques_ans = $this->session->ques_ans;
			                $session = $this->session->set_userdata;

			                if($ques_ans == 20)
			                {
			                	$ques_ans = -2;
			                }
			                $session['ques_ans'] = $ques_ans + 1;
			                $session['ans_count'] = $this->session->ans_count + 1; //To update the answered question in users answer's
			                $session['page_no'] = $this->session->page_no + 1; //Update the page number once the user has answered
			                $this->session->set_userdata($session);
			                $ques_ans = $ques_ans + 1;



			                $data = $this->user_model->get_nodequestion();
			                if($data['question'] == -1)
			                {
			                	/*Get the valid strucutural bits from strucutural string
			                	  and get the related attribute bit strings
			                	  for every valid strucutral bit.
			                	  Insert it in attribute table
								*/
			                	$this->user_model->insert_attributes();
			                }

		                }
		                //Every time if we want any options and insert value then keep the insert value first


		            }

	            	$flag_nodeans = 0;
	            	$node_flag = 0;
	            	$flag = 1;
	            	$count = $this->session->ans_count - 1;

	            	if( ($count % 5) == 0 && $coll_flag ==0)
	            	{
	            		// For every 5 questions change the college
	            		$node_flag = $this->get_quescollege(1,1);
	            	}

	                $data = $this->user_model->get_nodequestion();
	                if($data['question'] == -1 && $coll_flag ==0)
	                {
	                	// If all questions of one college completed then change the college
	                	$node_flag = $this->get_quescollege(1,1);
	                }
	                if($coll_flag !=0 && $data['question'] == -1)
	                {
	                	$node_flag = 1;
	                }

	                if($node_flag == 0)
	                {
	                    $data = $this->user_model->get_nodequestion();
	                	$question 	  = $data['question'];
	                    $opt_content  = $data['option_content'];
	                    $branchicon  = $data['branchicons'];
	                    $opt_num      = $data['opt_num'];
	                    $page_display = $data['page_num'];
	    				$ques_flag    = $this->session->ques_flag;
	    				$ques_count   = $this->session->ques_count;
	    				$ans_count    = ($this->session->ans_count % 20);
	    				if($ans_count == 0) $ans_count = 20;
	    				//$ques_ans 	  = $this->session->ques_ans;
	                   	$total_answer 		= $this->session->total_answer + $this->session->ans_count - 1;
						if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}

	    				for($i=0;$i<$opt_num;$i++)
	                   	{
	                   		$options[$i]['value'] = $opt_content[$i];
	                   		$options[$i]['color'] = '#b9c9d6';
	                   	}
	                   	$ic=array();
	                   	for ($j=0;$j<count($branchicon);$j++)
	                   	{
	                   		$branchicons[$j]['id'] = $branchicon[$j+1];
	                   		// $ic=array_merge($ic,array("id"=>$branchicon[$j]));
	                   	}
	                    $this->load->helper('form');

	                    echo '
	                    {
	                        "question" 	: 	"'.$question.'",
							"unit_currency_code" :   "'.$unit_currency_code.'",
	                        "options" 	: 	'.json_encode($options).',
	                        "branchicons":  '.json_encode($branchicons).',
	                        "opt_num" 	: 	"'.$opt_num.'",
	                        "page_num"	:	"'.$page_display.'",
	                        "parent" 	: 	'.json_encode($this->session->parent).',
	                        "heading"	: 	"'.$this->session->college1.'",
	                        "header"	:	"'.$header_color.'",
	                        "ques_flag" : 	"'.$ques_flag.'",
	                        "ques_count":   "'.$ques_count.'",
	                        "ans_count" :	"'.$ans_count.'",
	                        "ques_ans"  :	"'.$ques_ans.'",
	                        "total_answer" : "'.$total_answer.'"
	                    }';
	                }
		        }
		        if($node_flag == 1)
		        {

		        	//if the question is first question or coming from psychograph questions skip validation
		            if(($this->input->get('firstQuestion') != "true") && $first_ques == 'false')
		            {

		                $opt_num =$this->session->opt_num;
		                $option_content = $this->session->option_content;
		                $input_value = $this->input->get('type');
		                if($input_value == -5)
		                {
		                	$session = $this->session->set_userdata;
		                	$session['ques_ans'] = 1;
		                	$this->session->set_userdata($session);
		                	$ques_ans = 1;
		                }
		                else if($input_value == -2)
		                {
		                	$session = $this->session->set_userdata;
		                	$session['ques_ans'] = 1;
		                	$this->session->set_userdata($session);
		                	$ques_ans = -2;
		                }
		                else
		                {

		                	//Every time if we want any options and insert value then keep the insert value first

			                if($opt_num == 0)
			                {

			                    $array = $this->input->get('ans');  //if the option is insert
			                    if($array == "" or $array == " ")
			                    {
			                       // echo "Answer that question";
			                    }
			                    else
			                    {
			                        $this->user_model->update_attrnodeanswer(-1);
			                    }

			                }
			                else if($option_content[0] == "checkbox")
			                {
			                	$array = json_decode($this->input->get('checkboxes'));
			                	$array = explode(",", $array);

			                	$this->user_model->add_checkboxdata($array,2);
			                }

			                else if($option_content[0] == "insert")
			                {

			                    $array = $this->input->get('ans');   //if the option is insert
			                    $input_array = $this->input->get('type'); // option number the user entered

			                    if(($array == "" or $array == " ") && $input_array == "")
			                    {
			                        //echo "Answer that question";
			                    }

			                    else if($array == "" or $array == " ")
			                    {
			                        $value = $input_array;
			                        //$value = $value + 1;

			                        $this->user_model->update_attrnodeanswer($value);

			                    }

			                    else if($input_array == "")
			                    {
			                        $value = $array;
			                        $this->user_model->update_attrnodeanswer(-1);
			                    }

			                    else
			                    {
			                        //echo "Only one option has to be entered";
			                    }

			                }

			                else if($this->input->get('type') != "")
			                {
			                    $value = $this->input->get('type');
			                    $this->user_model->update_attrnodeanswer($value);

			                }

			                else
			                {
			                    //echo "Enter Atlest one option";

			                }

			                //To update the count answered question in users answer's
			                $ques_ans = $this->session->ques_ans;
			                $session = $this->session->set_userdata;

			                if($ques_ans == 20)
			                {
			                	$ques_ans = -2;
			                }
			                $session['ques_ans'] = $ques_ans + 1;
			                $session['ans_count'] = $this->session->ans_count + 1;
			                $session['ques_count'] = $this->session->ques_count + 1;
			                $this->session->set_userdata($session);
			                $ques_ans = $ques_ans + 1;

		                }
		            }

		            $count = $this->session->ans_count - 1;

	            	if( ($count % 5) == 0 && $coll_flag == 0)
	            	{
	            		// For every 5 questions change the college
	            		$node_flag = $this->get_quescollege(2,1);
	            	}

		            $data = $this->user_model->get_attributeques();
		            $attr_flag = 0;
					if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
		            if($data['question'] == -1)
		            {
		            	if($coll_flag ==0)
		            	{
		            		$attr_flag = $this->get_quescollege(2,1);	
		            	}
		            	else{
		            		$attr_flag = 1;
		            	}
		            	

		            	/*$attr_flag = 1 means all structural and attribute
						questions completed.
						*/

		            	if($attr_flag == 1)
		            	{

		            		$session = $this->session->set_userdata;
							$session['structural'] = 0;
							$this->session->set_userdata($session);

							$ques_count = $this->session->ques_count;
							$ques_flag = $this->session->ques_flag;

							$ans_count  = ($this->session->ans_count % 20);
	    					if($ans_count == 0) $ans_count = 20;

							//$ques_ans   = $this->session->ques_ans;
							$psychographic == $this->session->psychographic;

							if($structural == 0 && $psychographic == 0)
			                {
			                	//All psychograph ,structural,and attribute questions completed
			                	$ques_count = -1;  //To tell in the front end that all questions completed
			                	$question = "";
			                	$options[0]['value'] = "redirect";
			                	$options[1]['value'] = base_url().'home';
			                	$options[1]['color'] = '#b9c9d6';
			                	$options[0]['color'] = '#b9c9d6';
	                   			$total_answer = $this->session->total_answer + $this->session->ans_count - 1;
	                   			

				                echo '
				                {
				                    "question" 	: "'.$question.'",
									"unit_currency_code" :   "'.$unit_currency_code.'",
				                    "options" 	: "'.$options.'",
				                    "opt_num" 	: "'.$opt_num.'",
				                    "parent" 	: '.json_encode($this->session->parent).',
				                    "heading"	: "'.$this->session->college1.'",
				                    "header"	: "'.$header_color.'",
				                    "ques_flag" : "'.$ques_flag.'",
				                    "ques_count": "'.$ques_count.'",
				                    "ans_count" : "'.$ans_count.'",
				                    "ques_ans"  : "'.$ques_ans.'",
				                    "total_answer" : "'.$total_answer.'"

				                }';
			                }
			                else if($psychographic == 1 && $coll_flag==0)
			                {
			                	//PsychoGraph questions are remaining ask psychograph questions
			                	$session = $this->session->set_userdata;
			                	$session['ques_count'] = 1;
								$session['transition'] = 1;
								$this->session->set_userdata($session);
			                	$this->psycho_structural();
			                }
			                else
			                {
			                	//All psychograph ,structural,and attribute questions completed
			                	$ques_count = -1;  //To tell in the front end that all questions completed
			                	$question = "";
			                	$options[0]['value'] = "redirect";
			                	$options[1]['value'] = base_url().'home';
			                	$options[1]['color'] = '#b9c9d6';
			                	$options[0]['color'] = '#b9c9d6';
	                   			$total_answer = $this->session->total_answer + $this->session->ans_count - 1;


				                echo '
				                {
				                    "question" 	: "'.$question.'",
									"unit_currency_code" :   "'.$unit_currency_code.'",
									"branchicons":  '.json_encode($branchicons).',
 									"page_num"	:	"'.$page_display.'",
				                    "options" 	: "'.$options.'",
				                    "opt_num" 	: "'.$opt_num.'",
				                    "parent" 	: '.json_encode($this->session->parent).',
				                    "heading"	: "'.$this->session->college1.'",
				                    "header"	: "'.$header_color.'",
				                    "ques_flag" : "'.$ques_flag.'",
				                    "ques_count": "'.$ques_count.'",
				                    "ans_count" : "'.$ans_count.'",
				                    "ques_ans"  : "'.$ques_ans.'",
				                    "total_answer" : "'.$total_answer.'"

				                }';
			                }


		            	}

		            }

		            if($attr_flag == 0 )
		            {

		           		$data 			= $this->user_model->get_attributeques();
						if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
						$ques_flag      = $this->session->ques_flag;
		                $ques_count 	= $this->session->ques_count;
		           		$ans_count  	= ($this->session->ans_count % 20);
	    				if($ans_count == 0) $ans_count = 20;
	                   	$total_answer 		= $this->session->total_answer + $this->session->ans_count - 1;

						//$ques_ans       = $this->session->ques_ans;
		                $question 		= $data['question'];
		                $opt_content  	= $data['option_content'];
		                $opt_num  		= $data['opt_num'];
		                $branchicon     = $data['branchicons'];
						$page_display   = $data['page_num'];
		                for($i=0;$i<$opt_num;$i++)
	                   	{
	                   		$options[$i]['value'] = $opt_content[$i];
	                   		$options[$i]['color'] = '#b9c9d6';
	                   	}
	                   	
		                $this->load->helper('form');
		                // print_r($question);
		                // die;
		                echo '{
		                    "question" 	: "'.$question.'",
							"unit_currency_code" :   "'.$unit_currency_code.'",
		                    "options" 	: '.json_encode($options).',
		                    "branchicons":  '.json_encode($branchicons).',
 							"page_num"	:	"'.$page_display.'",
		                    "opt_num"   : "'.$opt_num.'",
		                    "parent" 	: '.json_encode($this->session->parent).',
		                    "heading"	: "'.$this->session->college1.'",
		                    "header"	: "'.$header_color.'",
		                    "ques_flag" : "'.$ques_flag.'",
		                    "ques_count": "'.$ques_count.'",
		                    "ans_count" : "'.$ans_count.'",
		                    "ques_ans"  : "'.$ques_ans.'",
		                    "total_answer" : "'.$total_answer.'"

		                }';
		            }

		        }

		        //Time taken to display the strucutral questions
				$time_elapsed_secs = microtime(true) - $start;
				$session = $this->session->set_userdata;
				$session['time'] = $this->session->time;
				$session['color'] = $this->session->color;
				$session['time']['answer_validation']= $time_elapsed_secs;
				$session['updated_controller'] = 'answer_validation';
				if($num_color == 14)
				{
					$session['color'][0] = 1;
				}
				else
				{
					$session['color'][0] = $num_color + 1;
				}
				$this->session->set_userdata($session);

			}


		}
		else
		{
			redirect('main/login');

		}
	}


	//To validate the user answers
	public function answer_validation()
    {
    	$start = microtime(true);
    	$color = $this->session->color;
    	$num_color = $color[0];
    	$header_color = $color[$num_color];
    	$redirect = $this->session->ques_redirect;
    	if($this->session->is_logged_in == 1)
		{
	        $this->load->model('user_model');
	        $data = $this->user_model->get_nodequestion();
	        $node_flag = 0;
	        $flag = 0;
	        $ans_count = $this->session->ans_count;
	        $coll_anscount = $this->session->coll_anscount;
	        if($data['question'] == -1)
	        {
	        	$node_flag = $this->get_quescollege(1,1);
	        	//echo 'node_flag'.$node_flag;
	        }
	        if($node_flag == 0)
	        {
	            if($this->input->get('firstQuestion') != "true")
	            {
	                //if the question is first question then skip the validation
	                $opt_num =$this->session->opt_num;
	                $option_content = $this->session->option_content;
	                //Every time if we want any options and insert value then keep the insert value first
	                if($opt_num == 0)
	                {
	                    $array = $this->input->get('ans');
	                    if($array == "" or $array == " ")
	                    {
	                        //echo "Answer that question";
	                    }
	                    else
	                    {
	                        $this->user_model->update_nodeanswer(-1);
	                    }

	                }
	                else if($option_content[0] == "checkbox")
	                {
	                	$array = json_decode($this->input->get('checkboxes'));
	                	$array = explode(",", $array);
	                	$this->user_model->add_checkboxdata($array,1);
	                }
	                else if($option_content[0] == "insert")
	                {
	                    $array = $this->input->get('ans');
	                    $input_array = $this->input->get('type'); //from the radio buttons
	                    if(($array == "" or $array == " ") && $input_array == "")
	                    {
	                        //echo "Answer that question";
	                    }
	                    if($array == "" or $array == " ")
	                    {
	                        $value=$input_array;
	                        $this->user_model->update_nodeanswer($value);
	                    }
	                    elseif($input_array == "")
	                    {
	                        $this->user_model->update_nodeanswer(-1);
	                    }
	                    else
	                    {
	                        //echo "Only one option has to be entered";
	                    }
	                }
	                else if($this->input->get('type') != "")
	                {
	                    $array = $this->input->get('type');
	                    $value = $array;
	                    $this->user_model->update_nodeanswer($value);
	                }
	                else
	                {
	                   // echo "Enter Atlest one option";
	                }

	                $data = $this->user_model->get_nodequestion();
	                if($data['question'] == -1)
	                {
	                	$this->user_model->insert_attributes();
	                }
	            }
            	$falg_nodeans = 0;
            	$node_flag = 0;
            	$flag = 1;
            	if($coll_anscount == 5)
            	{
            		$falg_nodeans = $this->get_college();

            	}
            	else
            	{
            		$ans_count ++;
            		$session =$this->session->set_userdata;
            		$session['ans_count'] = $ans_count;
            		if($coll_anscount != 5)
            		{
            			$coll_anscount ++;
            			$session['coll_anscount'] = $coll_anscount;
					}
					$this->session->set_userdata($session);
            	}

                $data = $this->user_model->get_nodequestion();
                if($data['question'] == -1)
                {
                	$node_flag = $this->get_quescollege(1,1);
                }
                if($falg_nodeans == 0 && $node_flag == 0)
                {
                    $data = $this->user_model->get_nodequestion();
					if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
                	$question = $data['question'];
                    $options  = $data['option_content'];
                    $opt_num  = $data['opt_num'];
    				$ques_flag = $this->session->ques_flag;
                    $this->load->helper('form');

                    echo '
                    {
                        "question" 	: 	"'.$question.'",
						"unit_currency_code" :   "'.$unit_currency_code.'",
                        "options" 	: 	'.json_encode($options).',
                        "opt_num" 	: 	"'.$opt_num.'",
                        "parent" 	: 	'.json_encode($this->session->parent).',
                        "heading"	: 	"'.$this->session->college1.'",
                        "header"	:	"'.$header_color.'",
                        "ques_flag" : 	"'.$ques_flag.'"
                    }';
                }
               // echo 'Node_flag'.$node_flag;
	        }
	        if($node_flag == 1)
	        {
	            if($this->input->get('firstQuestion') != "true")
	            {

	                $opt_num =$this->session->opt_num;
	                $option_content = $this->session->option_content;
	                //Every time if we want any options and insert value then keep the insert value first
	                if($opt_num == 0)
	                {
	                    $array = $this->input->get('ans');
	                    if($array == "" or $array == " ")
	                    {
	                       // echo "Answer that question";
	                    }
	                    else
	                    {
	                        $this->user_model->update_attrnodeanswer(-1);
	                    }

	                }
	                else if($option_content[0] == "checkbox")
	                {
	                	$array = json_decode($this->input->get('checkboxes'));
	                	$array = explode(",", $array);
	                	$this->user_model->add_checkboxdata($array,2);
	                }
	                else if($option_content[0] == "insert")
	                {
	                    $array = $this->input->get('ans');
	                    $input_array = $this->input->get('type');
	                    if(($array == "" or $array == " ") && $input_array == "")
	                    {
	                        //echo "Answer that question";
	                    }
	                    else if($array == "" or $array == " ")
	                    {
	                        $value=$input_array;
	                        $value = $value + 1;
	                        $this->user_model->update_attrnodeanswer($value);
	                    }
	                    else if($input_array == "")
	                    {
	                        $value = $array;
	                        $this->user_model->update_attrnodeanswer(-1);
	                    }
	                    else
	                    {
	                        //echo "Only one option has to be entered";
	                    }
	                }
	                else if($this->input->get('type') != "")
	                {
	                    $value = $this->input->get('type');
	                    $this->user_model->update_attrnodeanswer($value);

	                }
	                else
	                {
	                    //echo "Enter Atlest one option";

	                }
	            }
	            $ans_flag = 0;
	            if($coll_anscount == 5)
            	{
            		$ans_flag = $this->get_college();
            	}
	        	else
	        	{
	        		$ans_count ++;
	        		$session =$this->session->set_userdata;
					$session['ans_count'] = $ans_count;
					if($coll_anscount != 5)
					{
						$coll_anscount++;
						$session['coll_anscount'] = $coll_anscount;
					}
					$this->session->set_userdata($session);
	        	}
	            $data = $this->user_model->get_attributeques();
				if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
	            $attr_flag = 0;
	            if($data['question'] == -1)
	            {
	            	$attr_flag = $this->get_quescollege(2,1);
	            	if($attr_flag == 1 && $redirect == 1)
	            	{
	            		$session = $this->session->set_userdata;
						$session['ques_redirect'] = 0;
						$this->session->set_userdata($session);


	            		$question = "";
		                //redirecting to userdetails
		                echo '{
		                    "question" 	: "'.$question.'",
							"unit_currency_code" :   "'.$unit_currency_code.'",
		                    "options" 	: ["redirect","'.base_url().'home"],
		                    "opt_num" 	: "'.$opt_num.'",
		                    "parent" 	: '.json_encode($this->session->parent).',
		                    "heading"	: "'.$this->session->college1.'",
		                    "header"	: "'.$header_color.'",
		                     "ques_flag" : 	"'.$ques_flag.'"

		                }';

	            	}
	            	else if($attr_flag == 1)
	            	{
	            		$question = "";
		                //redirecting to userdetails
		                echo '{
		                    "question" 	: "'.$question.'",
							"unit_currency_code" :   "'.$unit_currency_code.'",
		                    "options" 	: ["completed","'.base_url().'home"],
		                    "opt_num" 	: "'.$opt_num.'",
		                    "parent" 	: '.json_encode($this->session->parent).',
		                    "heading"	: "'.$this->session->college1.'",
		                    "header"	: "'.$header_color.'",
		                     "ques_flag" : 	"'.$ques_flag.'"


		                }';
	            	}
	            }

	            if($ans_flag == 0 && $attr_flag == 0 )
	            {
	           		$data = $this->user_model->get_attributeques();
					if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
	                $question = $data['question'];
	                $options  = $data['option_content'];
	                $opt_num  = $data['opt_num'];
	                $this->load->helper('form');
	                echo '{
	                    "question" 	: "'.$question.'",
						"unit_currency_code" :   "'.$unit_currency_code.'",
	                    "options" 	: '.json_encode($options).',
	                    "opt_num"   : "'.$opt_num.'",
	                    "parent" 	: '.json_encode($this->session->parent).',
	                    "heading"	: "'.$this->session->college1.'",
	                    "header"	: "'.$header_color.'",
	                     "ques_flag" : 	"'.$ques_flag.'"

	                }';
	            }

	        }
    	}
    	else
		{
			redirect('main/login');
		}

		$time_elapsed_secs = microtime(true) - $start;
		$session = $this->session->set_userdata;
		$session['time'] = $this->session->time;
		$session['color'] = $this->session->color;
		$session['time']['answer_validation']= $time_elapsed_secs;
		$session['updated_controller'] = 'answer_validation';
		if($num_color == 14)
		{
			$session['color'][0] = 1;
		}
		else
		{
			$session['color'][0] = $num_color + 1;
		}
		$this->session->set_userdata($session);

    }

    public function psychoans_validation()
    {
    	$start = microtime(true);
		    	$color = $this->session->color;
		    	$num_color = $color[0];
		    	$header_color = $color[$num_color];
		    	$ques_count = $this->session->ques_count;
		    	if($this->session->is_logged_in == 1)
				{
			        $this->load->model('user_model');
			        $data = $this->user_model->get_psycho_nodeques();
			        $node_flag = 0;
			        if($data['question'] == -1)
			        {
			        	//$node_flag = $this->get_quescollege(1);
			        	//echo $node_flag;
			        	$node_flag = 1;
			        	$psychographic = 0;
			        }
			        if($node_flag == 0)
			        {
			           /* if($this->input->get('firstQuestion') != "true")
			            {
			                $value = $this->input->get('type');
			                $this->user_model->update_psycho_nodeans($value);

			            }*/
			            if($this->session->ques_count > 5)
			            {
			            	$node_flag = 1;
			            }
			            if($structural == 0)
			            {
			            	$session = $this->session->set_userdata;
				            $session['ques_count'] = 1;
				            $this->session->set_userdata($session);
				            $node_flag = 0;
			            }
		                $data = $this->user_model->get_psycho_nodeques();
						if($data['unit_flag']==1)
						{
							$unit_currency_code = $this->user_model->get_currency($this->session->country_code);
						}
		                if($data['question'] == -1)
		                {
		                	//$node_flag = $this->get_quescollege(1);
		                	//echo 'charan';
		                	$node_flag = 1;
		                	$session = $this->session->set_userdata;
			           		$session['psychographic'] = 0;
				            $this->session->set_userdata($session);
			            	$psychographic = 0;

		                }
		                if($node_flag == 0)
		                {
		                    $question 		= $data['question'];
		                   	$opt_num  		= $data['opt_num'];
		                   	$opt_content 	= $data['option_content'];
		                   	$percentage     = $data['percentage'];
		                   	$set_ques  		= $data['set_ques'];
		                   	$value  		= $data['value'];
		                   	$ques_flag 		= $data['ques_flag'];
		                   	$node_name 		= $data['node_name'];
		                   	$ques_count 	= $this->session->ques_count;

		                   	for($i=0;$i<$opt_num;$i++)
		                   	{
		                   		$options[$i]['percentage'] = $percentage[$i];
		                   		$options[$i]['value'] = $opt_content[$i];
		                   		$options[$i]['color'] = '#b9c9d6';
		                   	}

		                    $this->load->helper('form');
		                    echo '
		                    {
		                        "question" 	: "'.$question.'",
								"unit_currency_code" :   "'.$unit_currency_code.'",
		                        "options" 	: '.json_encode($options).',
		                        "opt_num" 	: "'.$opt_num.'",
		                        "value" 	: "'.$value.'",
		                        "heading"	: "'.$this->session->college1.'",
		                    	"max_ques"	: "'.$set_ques.'",
		                    	"ques_flag"	: "'.$ques_flag.'",
		                    	"node_name"	: "'.$node_name.'",
		                    	"header"	: "'.$header_color.'",
		                    	"ques_count": "'.$ques_count.'"
			                    }';
		                }
			        }
			        if($node_flag == 1)
			        {

			        	//Add these code after inserting attributes

			           /* if($this->input->get('firstQuestion') != "true")
			            {
		                    $value = $this->input->get('type');
		                    $this->user_model->update_attrnodeanswer($value);
			            }
			            $data = $this->user_model->get_psycho_attrques();
			            $attr_flag = 0;
			            if($data['question'] == -1)
			            {
			            	$attr_flag = $this->get_quescollege(2);
			            	if($attr_flag == 1)
			            	{
			            		$question = "";
			            		$value    = 0;
			            		$set_ques = 0;
			            		$opt_num  = 0;
			            		$ques_flag = 0;
				                //redirecting to home
				                echo '{
				                    "question" 	: "'.$question.'",
				                    "options" 	: ["redirect","'.base_url().'home"],
				                    "opt_num" 	: "'.$opt_num.'",
				                    "value" 	: "'.$value.'",
		                    		"max_ques"	: "'.$set_ques.'",
				                    "heading"	: "'.$this->session->college1.'",
				                    "ques_flag"	: "'.$ques_flag.'"
				                }';
			            	}

			            }
			            if($attr_flag == 0)
			            {
			                $question 		= $data['question'];
		                   	$opt_num  		= $data['opt_num'];
		                   	$opt_content 	= $data['option_content'];
		                   	$percentage     = $data['percentage'];
		                   	$set_ques  		= $data['set_ques'];
		                   	$ques_flag 		= 0;
		                   	for($i=0;$i<$opt_num;$i++)
		                   	{
		                   		$options[$i]['percentage'] = $percentage[$i];
		                   		$options[$i]['value'] = $opt_content[$i];
		                   		$options[$i]['color'] = '#b9c9d6';
		                   	}
		                    $this->load->helper('form');
		                    echo '
		                    {

		                        "question" 	: "'.$question.'",
		                        "options" 	: '.json_encode($options).',
		                        "opt_num" 	: "'.$opt_num.'",
		                        "value" 	: "'.$value.'",
		                        "heading"	: "'.$this->session->college1.'",
		                    	"max_ques"	: "'.$set_ques.'",
		                    	"ques_flag"	: "'.$ques_flag.'"
		                    }';
			            }*/
			            $session = $this->session->set_userdata;
			            $session['ques_count'] = 6;
			            $first_ques = 'true';
			            $this->session->set_userdata($session);


			          /*  $question = "";
			    		$value    = 0;
			    		$set_ques = 0;
			    		$opt_num  = 0;
			    		$ques_flag = 0;
			    		$node_name = 0;
			    		$ques_count = 6;
			            //redirecting to home
			            echo '{
			                "question" 	: "'.$question.'",
			                "options" 	: ["redirect","'.base_url().'home"],
			                "opt_num" 	: "'.$opt_num.'",
			                "value" 	: "'.$value.'",
			        		"max_ques"	: "'.$set_ques.'",
			                "heading"	: "'.$this->session->college1.'",
			                "ques_flag"	: "'.$ques_flag.'",
			                "node_name"	: "'.$node_name.'",
			                "header"	: "'.$header_color.'",
			                "ques_count": "'.$ques_count.'"

			            }';
			            */

			        }
		    	}
		    	else
				{
					redirect('main/login');
				}

				$time_elapsed_secs = microtime(true) - $start;
				$session = $this->session->set_userdata;
				$session['time'] = $this->session->time;
				$session['time']['psychoans_validation']= $time_elapsed_secs;
				$session['updated_controller'] = 'psychoans_validation';
				$session['color'] = $this->session->color;
				if($num_color == 14)
				{
					$session['color'][0] = 1;
				}
				else
				{
					$session['color'][0] = $num_color + 1;
				}
				$this->session->set_userdata($session);



    }





    public function psycho_questions()
    {
    	$this->load->model('user_model');
    	$this->load->view('psycho-ques');
    }




    public function questions()
    {
    	$this->load->view('ques_home');
    }

    public function newcolleges()
    {
    	$this->load->model('user_model');
    	$data = $this->user_model->get_usercolleges();
    	print_r($data);
    	$this->load->view('new_college');
    }

	public function send_email(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		if($this->form_validation->run()){
		$this->load->library('email');
		$this->email->from('charanbatchu@gmail.com',"Charan");
		$this->email->to($this->input->post('email'));
		$this->email->subject("Confirm Account.");
		$message = "<p> Your friend refeerd you </p>";
		$message .= "<p> <a href='".base_url()."main/signup to register</p>";
		$this->email->message($message);
		if($this->email->send()){
					redirect(site_url('main/userdetails'));
				}else{
					show_error($this->email->print_debugger());
					redirect(site_url('main/userdetails'));
				}
			}
			else{
				echo "email is required";
				$this->load->view('suggestions');
			}
	}
	public function collegedetails(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search', 'Search', 'required');
		if($this->form_validation->run()){
			$this->load->model('user_model');
			if($data = $this->user_model->getcolldetails()){
				$question = $this->user_model->getquestion();
				$paramno =$this->user_model->noquestion();
				$disp = $this->user_model->get_globaldisp();
				if($this->session->userdata('is_logged_in')==1){
				$value= $this->user_model->getanswerdetails();
				$this->user_model->add_table4_user($this->input->post('search'));
				}
				else{
					for($i=0;$i<2*$paramno;$i++){
						$value[$i]=2;
					}
				}
				//$this->user_model->add_table4_user($this->input->post('search'));
				$this->load->view('collegedata',array(
				'data'     =>$data,
				'value'    =>$value,
				'question' =>$question,
				'college'  =>$this->input->post('search'),
				'paramno'  =>$paramno,
				'disp'     =>$disp,
				));
			}
			else{
				$this->load->view('suggestions');
			}
		}
		else{
			redirect('main/userdetails');
		}
		//$this->load->model('user_model');
		//$data = $this->user_model->getcolldetails($college);
		//var_dump($data['textval']['0']);
		//$this->load->view('collegedata',$data);
		//foreach ($data['textval']->result() as $row)
		//	var_dump($row);

	}

	/*
		Redirects to new_login  if error is there else add user to users table
	*/

	public function signup_validation()
	{
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$email = $this->input->post('email');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_validate_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_message('is_unique','Email Already Exists');
		//$this->form_validation->set_message('is_unique','Phone Number Already Exists');

		if($this->form_validation->run()){
			$key = 	md5(uniqid());
			$otp =  mt_rand(100200, 999999);

			//Code for sending main
			//Temporarly Disabled
		/*	$this->load->library('email');
			$this->email->from('charanbatchu@gmail.com',"Charan");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Confirm Account.");
			$message = "<p> Thank you for signing up </p>";
			$message .= "<p> <a href='".base_url()."main/register_user/$key'>CickHere</a> to confirm password</p>";
			$this->email->message($message);



			//	code for otp



			$ref_email = $this->input->post('ref_email');
			$val = $this->user_model->check_ref_limit($ref_email);
			if($val ==1 || $ref_email==" " || $ref_email==""){
				if($this->user_model->add_temp_user($key,$otp)){
					if($this->email->send()){
						//echo "email sent sucessfully";
						$this->load->view('verification');
					}else{
						//show_error($this->email->print_debugger());
						//echo "email not sent successfully";
						$this->load->view('verification');
					}
				}
			}
			else if($val == -1){
				echo "refeeral ID is incorrect";
				$this->load->view('signup');

			}

			else{
				echo "max refeeral reached";
				$this->load->view('signup');
			}
		*/

		//Temporary code withouth email verification
		$this->user_model->add_temp_user($key,$otp);
		$email = $this->input->post('email');
		$this->user_model->add_email_users($email,$this->input->post('name'));
		$cid = $this->user_model->getcid($email);
		$data = array(
				'email' => $email,
				'is_logged_in' => 2,
				'cid' => $cid,
				'prev_node' => 0,
				'name' => $this->input->post('name')
			);
		//insert a column into new_user_profile as well..
		$this->session->set_userdata($data);
		//$this->load->library('../controllers/user');
		//$this->user->addName();
		$this->setColors();
		//insert into nikhil_user_profile
		//$data = $this->user_model->get_usercolleges();
		redirect('user/complete');

		}
		else
		{
			//echo "password not matches";
			//echo validation_errors();
			$data['tab'] = 0;
			$data['login_emailerror'] = "";
            $data['login_password'] =  "";
			$data['email_error'] = form_error('email');
			$data['name_error'] = form_error('name');
			$this->load->view('new_login',$data);
		}
	}

	


	public function validate_email(){
		$this->load->model('user_model');
		if($this->user_model->check_email()){
			return True;
		}
		else{
			$this->form_validation->set_message('validate_email', 'Email Already registered');
			return false;
		}
	}

	public function validate_phonenumber(){

		$this->load->model('user_model');
		$number = $this->input->post('phone');
		if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $number))
		{
			$val = $this->user_model->check_phonenumber($number);
			if($val){
					return True;
				}
			else{
				$this->form_validation->set_message('validate_phonenumber', 'Phone NUmber Already registered');
				return false;
			}
		}
		else
		{
			$this->form_validation->set_message('validate_phonenumber', 'Phone number is not valid');
			return false;
		}
	}
	public function otp_verification(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('otp', 'Otp', 'required');
		$otp = $this->input->post('otp');
		if($this->form_validation->run()){
			$this->load->model('user_model');
			if($this->user_model->is_otp_valid($otp)){
				$email = $this->user_model->add_otp_users($otp);
				$this->user_model->get_refamount($email);
				$cid = $this->user_model->getcid($email);


				$data = array(
					'email' => $email,
					'is_logged_in' => 2,
					'cid' => $cid,
				);
				$this->session->set_userdata($data);
				$this->load->helper('form');
				$this->load->view('new_college');
			}else{

			echo "otp is incorrect";
			$this->load->view('verification');

			}
		}
		else{
			echo "OTP is requrired";
			$this->load->view('verification');
		}
	}
	public function validate_credentials(){
		$this->load->model('user_model');

		if ($this->user_model->can_log_in()) {
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}

	public function register_user($key){
		$this->load->model('user_model');
		if( $this->user_model->is_key_valid($key)){
			$email = $this->user_model->add_users($key);
			$cid = $this->user_model->getcid($email);
			//$this->user_model->insertbitstring($cid);   // To insert user-college bitstring
			$data = array(
					'email' => $email,
					'is_logged_in' => 2,
					'cid' => $cid,
				);
			$this->session->set_userdata($data);

		    //$this->user_model->add_table3_user();
			echo $this->session->cid;
			$this->load->helper('form');
			$this->load->view('new_college');
		}else{

			echo "invalid";
		}

	}
	public function userdetails(){
		if($this->session->userdata('is_logged_in'))
		{
		$this->load->model('user_model');
		$college = $this->session->college1;
		$this->user_model->add_table4_user($college);
		if($incen = $this->user_model->viewdetails()){
			$suggest = $this->user_model->get_leastdata_college();
			for($i=0;$i<sizeof($suggest);$i++){
					if(($suggest[$i] == $this->session->college1) or ($suggest[$i] == $this->session->college2)){
						$this->user_model->inc_refamount();

					}
				}
			$data = array(
					'email'   => $this->session->email,
					'incen'   => $incen,
					'suggest' => $suggest
				);
			$this->load->helper('form');
			$this->load->view('home', $data);
		}
		else{
			$this->load->helper('form');
			$this->load->view('home');
		}
	}
	else{
		$this->load->helper('form');
			$data['tab'] = 1;

		$data['login_emailerror'] = "";
        $data['login_password'] =  "";
		$data['email_error'] ="";
		$data['name_error'] = "";
		$this->load->view('new_login',$data);
	}
}


	public function logout()
	{
		$this->load->model('user_model');
		$this->user_model->addAnsweredQues();  //To add the questions the user has answered
		$this->session->sess_destroy();
		redirect(site_url('main/login'));
	}

	/*
		Search for schools to suggest to the user
	*/
	public function auto_search() {
        $search=  $this->input->post('search');
        $this->load->model('user_model');
		$query = $this->user_model->getschool($search);
		echo json_encode ($query);

    }
    public function country_search()
    {
    	$country_code = $this->input->post('search');
    	//echo $country_code;
    	$this->load->model('user_model');
    	$query = $this->user_model->getcountry($country_code);
		echo json_encode ($query);
    }
	public function printstring()
	{
		for($i=0;$i<257;$i++)
		{
			if($i==0) echo '0';
			else echo '1';
		}
	}

	public function debug()
	{
		echo '<center><h2>updated-controller: '.$this->session->updated_controller.'</h2></center><br>';
		$session = $this->session->set_userdata;
		print_r($session);
		$time = $this->session->time;
		$keys = array_keys($time);
		for($i=0,$j=0;$j<sizeof($keys);$i++)
		{
			$time_key = $keys[$i];
			if($keys[$i] == $this->session->updated_controller)
			{
				echo '<center><h3>'.$keys[$i].'=>'.$time[$time_key].'sec</h3></center>';
				$j++;
			}
			else if($j>0)
			{
				echo '<center><h3>'.$keys[$i].'=>'.$time[$time_key].'sec</h3></center>';
				$j++;
			}
			if($i == sizeof($keys) - 1)
			{
				$i=-1;
			}

		}
	}
	/*public function temp_getdecision()
	{
		$this->load->model('user_model');
		$node = $this->user_model->temp_getdec();
		$this->user_model->temp_addstree($node);


	}
	*/
	/*
	public function temp_addquestion()
	{

		$this->load->model('user_model');

		$ques_data1[0] = "GRE-Score";
		$ques_data1[1] = "GMAT-Score";
		$ques_data1[2] = "CAT-Score";
		$ques_data1[3] = "JEE-Score";
		$ques_data1[4] = "NEET-Score";
		$ques_data1[5] = "BITSAT-Score";

		$data['Node_Tier'] = 1;
		$data['Node_Type'] = 'Decision';
		$data1['Node_Tier'] = 2;
		$data1['Node_Type'] = 'Structural';
		$data1['Trigger_AnsOp'] = 1;
		$data2['Node_Tier'] = 2;
		$data2['Node_Type'] = 'Structural';
		$data2['Trigger_AnsOp'] = 2;
		$data3['Node_Tier'] = 2;
		$data3['Node_Type'] = 'Structural';
		$data3['Trigger_AnsOp'] = 3;

		$data1['Prev_Node'] = 76; 
		$data2['Prev_Node'] = 76; 
		$data3['Prev_Node'] = 76;
		$data['Prev_Node']  = 53;


		
		for($i=0;$i<6;$i++)
		{
			
			$data['Node_Name'] = $ques_data1[$i];
			$data1['Node_Name'] = 'Value_'.$ques_data1[$i];
			$data2['Node_Name'] = 'Varies_'.$ques_data1[$i];
			$data3['Node_Name'] = 'NotSure_'.$ques_data1[$i];
			
			$data['Trigger_Ques'] = 357+$i;
			$data1['Trigger_Ques'] = 357+$i;
			$data2['Trigger_Ques'] = 357+$i;
			$data3['Trigger_Ques'] = 357+$i;
			
			$data['Prev_Node'] += 4; 

			$data1['Prev_Node'] += 4; 
			$data2['Prev_Node'] += 4; 
			$data3['Prev_Node'] += 4; 

			$this->db->insert('AttributeNodeTable',$data);
			$this->db->insert('AttributeNodeTable',$data1);
			$this->db->insert('AttributeNodeTable',$data2);
			$this->db->insert('AttributeNodeTable',$data3);
		}




	}
	*/
	public function add_attrques()
	{
		
		$ques[0] = 'Till when are students awake and active?';
		$ques[1] = 'How ofter are parties organized on campus?';
		$ques[2] = 'Is there a time curfew for males to return back to hostels?';
		$ques[3] = 'What is the curfew time limit?';
		$ques[4] = 'Is there a time curfew for females to return back to hostels?';
		$ques[5] = 'What is the curfew time limit?';
		$ques[6] = 'Does it organize a social / cultural fest?';
		$ques[7] = 'How often does it organize the social / cultiural fest?';
		$ques[8] = 'Does it organize an academic fest?';
		$ques[9] = 'How often does it organize the academic fest?';
		$ques[10] = 'How many criminal offences would be reported every year?';
		$ques[11] = 'How many sexual assaults would be reported every year?';
		$ques[12] = 'How many hate crimes would be reported every year?';
		$ques[13] = 'What is the percentage of females among students?';
		$ques[14] = 'What percentage of students come from teh same country where college is located?';
		$ques[15] = 'What percentage of students come from teh same state where college is located?';
		$ques[16] = 'What is the percentage of students are residents on campus?';
		$ques[17] = 'How many different student organizations are there on campus (e.g. drama club, etc)?';
		$ques[18] = 'Does it have student elections?';
		$ques[19] = 'Does it have a student government?';
		$data['Op1']  = 1;
		$data['Op2']  = 2;
		$data['Op3']  = 3;

		for($i=0;$i<20;$i++)
		{
			$data['Option_Num'] = 3;
			$data['Q_Text'] = $ques[$i];
			$this->db->insert('QUESTIONTABALE',$data);
		}
		/*
		for($i=0;$i<18;$i++)
		{
			$data['Op1'] = 1;
			$data['Op2'] = 2;
			$data1['Q_ID'] = 381+$i;
			$this->db->update('QUESTIONTABALE',$data,$data1);
		}
		*/

	}
	public function temp_addquestion()
	{

		$this->load->model('user_model');

		//$ques_data1[0] = "Available";
		//$ques_data1[1] = "Compulsory";
		//$ques_data1[2] = "Air Conditioned";
		$ques_data1[0] = "Elections";
		$ques_data1[1] = "Student Government";
		$ques_data1[2] = "Native State";
		$ques_data1[3] = "Resident";
		$ques_data1[4] = "Social/Cultural";
		$ques_data1[5] = "Year_Social/Cultural";
		$ques_data1[6] = "Academic";
		$ques_data1[7] = "Year_Academic";
		$ques_data1[8] = "Seating_Auditorium";
		$ques_data1[9] = "Internet / Wifi";
		$ques_data1[10] = "Salon";
		$ques_data1[11] = "Supermarket";
		$ques_data1[12] = "Bank / ATM";
		$ques_data1[13] = "Squash";
		$ques_data1[14] = "Softball";
		$ques_data1[15] = "Water Polo";
		$ques_data1[16] = "Wrestling";
		$ques_data1[17] = "Field Hockey";
		$ques_data1[18] = "Skiing";
		$ques_data1[19] = "Fencing";
		$ques_data1[20] = "Sailing";



		$data['Node_Tier'] = 1;
		$data['Node_Type'] = 'Decision';
		
		$data1['Node_Tier'] = 2;
		$data1['Node_Type'] = 'Structural';
		$data1['Trigger_AnsOp'] = 1;
		
		$data2['Node_Tier'] = 2;
		$data2['Node_Type'] = 'Structural';
		$data2['Trigger_AnsOp'] = 2;
		
		$data3['Node_Tier'] = 2;
		$data3['Node_Type'] = 'Structural';
		$data3['Trigger_AnsOp'] = 3;
		
		$data4['Node_Tier'] = 2;
		$data4['Node_Type'] = 'Structural';
		$data4['Trigger_AnsOp'] = 4;
		
		$data5['Node_Tier'] = 2;
		$data5['Node_Type'] = 'Structural';
		$data5['Trigger_AnsOp'] = 5;
		
		$data1['Prev_Node'] = 436; 
		$data2['Prev_Node'] = 436; 
		$data3['Prev_Node'] = 436;
		$data4['Prev_Node'] = 436;
		$data5['Prev_Node'] = 434;
		$data['Prev_Node']  = 0;


		
		for($i=0;$i<2;$i++)
		{
			
			$data['Node_Name'] = $ques_data1[$i];
			
			$data['Node_ID']   =  440 + $i*4;
			$data1['Node_ID']   = 441 + $i*4;
			$data2['Node_ID']   = 442 + $i*4;
			$data3['Node_ID']   = 443 + $i*4;
			$data4['Node_ID']   = 442 +$i*6;
			$data5['Node_ID']   = 443 +$i*6;
			
			/*
			$data1['Node_Name'] = $ques_data1[$i];
			$data2['Node_Name'] = $ques_data1[$i];
			$data3['Node_Name'] = $ques_data1[$i];
			$data4['Node_Name'] = $ques_data1[$i];
			$data5['Node_Name'] = $ques_data1[$i];
			*/
			
			$data1['Node_Name'] = 'Yes_'.$ques_data1[$i];
			$data2['Node_Name'] = 'No_'.$ques_data1[$i];
			$data3['Node_Name'] = 'NotSure_'.$ques_data1[$i];
			
			$data['Trigger_Ques'] = 442+$i;
			$data1['Trigger_Ques'] = 442+$i;
			$data2['Trigger_Ques'] = 442+$i;
			$data3['Trigger_Ques'] = 442+$i;
			$data4['Trigger_Ques'] = 442+$i;
			$data5['Trigger_Ques'] = 441+$i;
			
			//$data['Prev_Node'] += 4; 

			$data1['Prev_Node'] += 4; 
			$data2['Prev_Node'] += 4; 
			$data3['Prev_Node'] += 4; 
			$data4['Prev_Node'] += 4; 
			$data5['Prev_Node'] += 4; 

			$this->db->insert('AttributeNodeTable',$data);
			$this->db->insert('AttributeNodeTable',$data1);
			$this->db->insert('AttributeNodeTable',$data2);
			$this->db->insert('AttributeNodeTable',$data3);
		//	$this->db->insert('AttributeNodeTable',$data4);
		//	$this->db->insert('AttributeNodeTable',$data5);
		}




	}
	public function prev_nodeupdate()
	{
		$query = $this->db->get_where('AttributeNodeTable',array('Node_ID >='=>105));
		foreach($query->result() as $row)
		{
			$data['Node_ID'] = $row->Node_ID;
			$data1['Prev_Node'] = $row->Prev_Node - 1;
			$this->db->update('AttributeNodeTable',$data1,$data);
		}
	}
	/*
	public function temp_insertposition()
	{
        $this->load->model('user_model');
		$this->user_model->add_tempnodeposition();

	}
	public function temp_insertnodes()
	{
        $this->load->model('user_model');

		$this->user_model->add_tempnodes();

	}
	public function temp_majornodes()
	{
        $this->load->model('user_model');
        $data = $this->user_model->get_pgdegrees();
		$this->user_model->add_majornodes($data);

	}*/


	public function addtemp_structureattr()
	{
		$this->load->model('user_model');
		$this->user_model->temp_structureattr();
	}

	public function temp_printcred()
	{
        $this->load->model('user_model');
		$this->user_model->cal_ysns(1,0);
	}

	public function add_clubid()
	{
		$this->load->model('user_model');
		$this->user_model->temp_insertclub();
	}

	public function clubid()
	{
		$this->load->model('user_model');
		$this->user_model->add_clubnode();

	}

	public function parentnode()
	{
		$this->load->model('user_model');
		$array = $this->user_model->get_parentnodes(349,0);
		print_r($array);
	}

	public function bulkdata()
	{
		$this->load->model('user_model');
		$this->user_model->add_bulkdata();
	}

	/*public function uploadfiles()
	{
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model');
		$this->load->view('bulkupload');
	}*/
	public function updatecoll()
	{
		$this->load->view('coll_update', array('error' => ' ' ));
	}
	/*
		Function to update the data of college Address, Latitude and Longitude
	*/
	public function collAddress(){
		$this->load->model('user_model');
		$config = array(
		//'upload_path' => "gs://hyrize/uploads/",
		'upload_path' => BUCKET_UPLOAD,
		//'upload_path' => "./uploads/",
		'allowed_types' => "csv",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->library('Csvreader');
			//print_r($data['upload_data']['file_name']);
	    	//$result =   $this->csvreader->parse_file('gs://hyrize/uploads/'.$data['upload_data']['file_name']);//path to csv file
	    	$result =   $this->csvreader->parse_file(BUCKET_UPLOAD.$data['upload_data']['file_name']);//path to csv file
	    	//$result =   $this->csvreader->parse_file('./uploads/'.$data['upload_data']['file_name']);//path to csv file
	   		$data['csvData'] =  $result;
	   		$this->user_model->insert_collAddress($result);
			echo 'College Data Updated successfully';
		}
		else
		{
			echo 'Error in Updating the college details';
		}
	}

	public function uploadfiles()
	{
		$this->load->view('bulkupload', array('error' => ' ' ));
	}
	public function do_upload()
	{
		$start = microtime(true);
		$this->load->model('user_model');
		$config = array(
		//'upload_path' => "gs://hyrize/uploads/",
		'upload_path' => BUCKET_UPLOAD,
		//'upload_path' => "./uploads/",
		'allowed_types' => "csv",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->library('Csvreader');
	    	//$result =   $this->csvreader->parse_file('gs://hyrize/uploads/'.$data['upload_data']['file_name']);//path to csv file
	    	$result =   $this->csvreader->parse_file(BUCKET_UPLOAD.$data['upload_data']['file_name']);//path to csv file
	    	//$result =   $this->csvreader->parse_file('./uploads/'.$data['upload_data']['file_name']);//path to csv file
	   		$data['csvData'] =  $result;
	   		$this->user_model->insert_bulkdata($result);
			//print_r($data);
			$this->load->view('upload_success',$data);
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('bulkupload', $error);
		}
		$time_elapsed_secs = microtime(true) - $start;
		echo $time_elapsed_secs;
	}

	public function uploadattrfiles()
	{
		$this->load->view('bulk_attrupload', array('error' => ' ' ));
	} 

	public function do_attrupload()
	{
		$start = microtime(true);
		$this->load->model('user_model');
		$config = array(
		//'upload_path' => "gs://hyrize/uploads/",
		'upload_path' => BUCKET_UPLOAD,
		//'upload_path' => "./uploads/",
		'allowed_types' => "csv",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->library('Csvreader');
	    	//$result =   $this->csvreader->parse_file('gs://hyrize/uploads/'.$data['upload_data']['file_name']);//path to csv file
	    	$result =   $this->csvreader->parse_file(BUCKET_UPLOAD.$data['upload_data']['file_name']);//path to csv file
	    	//$result =   $this->csvreader->parse_file('./uploads/'.$data['upload_data']['file_name']);//path to csv file
	   		$data['csvData'] =  $result;
	   		$this->user_model->insert_attrbulkdata($result);
			//print_r($data);
			$this->load->view('upload_attr_success',$data);
		}
		else
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('bulkupload', $error);
		}
		$time_elapsed_secs = microtime(true) - $start;
		echo $time_elapsed_secs;	
	}

	public function addbulk()
	{
		$this->load->model('user_model');
		echo 'added successfully';

		for($i=0;$i<10;$i++)
		{
			ini_set('max_execution_time', 300);
			ini_set('memory_limit', -1);
			$this->user_model->add_bulkdata();
		}
		


	}

	public function addattrbulk()
	{
		$start = microtime(true);
		$this->load->model('user_model');
		for($i=0;$i<20;$i++)
		{
			ini_set('max_execution_time', 300);
			ini_set('memory_limit', -1);
			$this->user_model->add_attr_bulkdata();
		}
		$time_elapsed_secs = microtime(true) - $start;
		echo $time_elapsed_secs;

	}


	function privacypolicy()
	{
		$this->load->view('privacy_policy');
	}

	function infopage(){
		$this->load->view('info_page');
	}


	//Temporary functions for adding data or testing the controllers

	/*
		Function to get the streams from the node table

	*/

	public function temp_streams(){
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		$txt = "\n";
		$name = "";
		for($i=2;$i<=62;$i=$i+4)
		{

			$query = $this->db->get_where('NODETABLE',array('Node_ID ='	=> $i));
			foreach($query->result() as $row){
				$name = $name.ucfirst(strtolower(str_replace('Yes_', "", $row->Node_Name)))."\n";
			}


			$query1 = $this->db->get_where('NODETABLE', array('Prev_Node =' => $i));
			foreach($query1->result() as $row)
			{
				$nodeid1 = $row->Node_ID;
				
				$query2 = $this->db->get_where('NODETABLE', array('Prev_Node =' => $nodeid1));
				$k=0;
				foreach($query2->result() as $row1)
				{
					$nodeid2 = $row1->Node_ID;
					if($k==0)
					{
						$name = $name.ucfirst(strtolower(str_replace('Yes_', "", $row1->Node_Name)))."\n";
						$query3 = $this->db->get_where('NODETABLE', array('Prev_Node =' => $nodeid2));
						$k=1;
						
						foreach($query3->result() as $row2)
						{
							$nodeid3 = $row2->Node_ID;
							$j = 0;
							$query4 = $this->db->get_where('NODETABLE', array('Prev_Node =' => $nodeid3));
							foreach($query4->result() as $row3)
							{
								if($j==0)
								{
									$j = 1;
									$name = $name.ucfirst(strtolower(str_replace('Yes_', "", $row3->Node_Name)))."\n";
								}
							}

						}

					}
				}
			}
			//$nodeid = ($i-1).' ';	
			//$name = ' '.ucfirst(strtolower(str_replace('Yes_', "", $name)));
			/*
			$txt = $txt.'<g id="'.$name.'" viewBox="0 0 37 44"><path d="M24.089 14.644V2.2h1.778V.422H11.644V2.2h1.778v12.444S.978 32.422.978 37.756c0 5.333 5.333 5.333 5.333 5.333H31.2s5.333 0 5.333-5.333c0-5.334-12.444-23.112-12.444-23.112zM31.2 41.311H6.311c-.622 0-3.555-.178-3.555-3.555 0-3.467 7.466-15.378 12.088-22.045l.356-.444V2.289h7.111v12.978l.356.444c4.71 6.667 12.089 18.578 12.089 22.045 0 3.2-2.667 3.466-3.556 3.555z" fill="#3C61AC"/><path d="M13.511 34.556c0 .977-.8 1.777-1.778 1.777-.977 0-1.777-.8-1.777-1.777 0-.978.8-1.778 1.777-1.778.978.089 1.778.8 1.778 1.778zm8.267.177a2.39 2.39 0 0 0-2.4 2.4 2.39 2.39 0 0 0 2.4 2.4 2.39 2.39 0 0 0 2.4-2.4 2.39 2.39 0 0 0-2.4-2.4zm-4.09-3.11a2.2 2.2 0 0 0-2.221 2.221 2.2 2.2 0 0 0 2.222 2.223 2.2 2.2 0 0 0 2.222-2.223c0-1.155-.978-2.222-2.222-2.222zm2.845-3.912a3.281 3.281 0 0 0-3.289-3.289 3.281 3.281 0 0 0-3.288 3.29A3.281 3.281 0 0 0 17.244 31c1.867.089 3.29-1.422 3.29-3.289zM24 26.2c-.978 0-1.778.8-1.778 1.778s.8 1.778 1.778 1.778 1.778-.8 1.778-1.778S24.978 26.2 24 26.2zm-.978 4.8c-.622 0-1.155.533-1.155 1.156 0 .622.533 1.155 1.155 1.155s1.156-.533 1.156-1.155c0-.623-.534-1.156-1.156-1.156z" fill="#22B1BC"/></g>';
			*/
			//$txt = $txt.$nodeid.$name."\n";
		}
		$txt = $name;
		fwrite($myfile, $txt);
		fclose($myfile);
		
	}


	/*
		Function to add the data from college table to synonyms table
	*/
	public function temp_synonumschool(){
    	$query = $this->db->get('college');
    	foreach($query->result() as $row){
    		$data['colg_id'] = $row->COLL_ID;
    		$data['synonym'] = $row->COLL_NAME;
    		$data['primary_college'] = $row->COLL_NAME;
    		$data['country'] = $row->CountryCode;
    		$data['primary_name']= 1;
    		$this->db->insert('synonyms',$data);
    	}
    	
    }

    public function test_qa(){
    	$cid = 183;
    	$tagid = 1;
    	$this->db->order_by("TAG_ID","asc");
		$query = $this->db->get_where('Table1_Tags',array('CID 	=' => $cid));
		$i=0; 
		$tag = array();
		$prev_tag = -1;
		$avg = 0;
		$prev_samp =0;
		foreach($query->result() as $row)
		{

			$tagid = $row->TAG_ID;
			$mu = $row->MU;
			$sample = $row->Sample_SZ;
			
			if($prev_tag == $tagid or $prev_tag == -1)
			{
				$prev_tag = $tagid;
				$avg = (($avg*$prev_samp)+($mu*$sample))/($sample+$prev_samp);
				$prev_samp += $sample;

			}
			else
			{
				echo 'Final Avg ='.$avg.'<br>';
				echo 'Total Samp ='.$prev_samp.'<br>'; 
				
				$prev_tag = $tagid;
				$avg = $mu;
				$prev_samp = $sample;

			}	
			echo 'Tag ID ='.$tagid.'<br>';	
		}
		echo 'Final Avg ='.$avg.'<br>';
		echo 'Total Samp ='.$prev_samp.'<br>'; 
		//For the last tag 
		
	}
    public function test_table2ques($qid)
    {
    	$this->load->model('user_model');
    	$q_data = $this->user_model->get_question($qid);
    	print_r($q_data);
    	$user_tags	  = $q_data['user_tags'];
    	$user_content = $q_data['user_content'];
    	$coll_tags	  = $q_data['coll_tags'];
    	$coll_content = $q_data['coll_content'];
    	$coll_word	  = explode(",", $coll_tags); 	
    	$user_word    = explode(",", $user_tags);
    	$user_final   = "";
    	$coll_final   = "";
    	$user_flag    = 0;
    	$coll_flag    = 0;
    	for($i=0;$i<strlen($user_content);$i++)
    	{
    		// For the dyanamic word	
    		if($user_content[$i] == '%' && $user_flag == 0){
    			$user_final = $user_fin.$user_word[2];
    			$user_flag = 1;
    		}
    		//  For the percentage of users which are lower from his college
    		else if($user_content[$i] == '%' && $user_flag == 1){
    			$user_final = $user_fin.$user_word[2];	
    			$user_flag = 2;
    		}
    		else{
    			$user_final = $user_fin.$user_content[$i];
    		}
    	}
    	for($i=0;$i<strlen($coll_content);$i++)
    	{
    		// For the dyanamic word 
    		if($coll_content[$i] == '%' && $coll_flag == 0){
    			$coll_final = $coll_fin.$coll_word[2];
    			$coll_flag = 1;
    		}
    		//  For the percentage of college which are lower from the same country
    		else if($coll_content[$i] == '%' && $coll_flag == 1){
    			$coll_final = $coll_fin.$coll_word[2];
    			$coll_flag = 2;	
    		}
    		else{
    			$coll_final = $coll_fin.$coll_content[$i];
    		}
    	}
    }

    public function get_College_Ques()
   	{
   		$this->load->model('user_model');
   		$k = 1; //Value can be changed later
		$n = 2; //normalization exponent lower n is low pass filter, higher n is high pass filter
		$value = 1;
		$cu = 0.793457;
		$cl =0;
		$cid = $this->session->cid;
		$query = $this->db->get_where('UserCollegestring',array('COLL_ID ='=>2,
													   			'CID ='    =>194));

		foreach ($query->result() as $row){
			$answered = $row->answered;
			$user_coll_cred = $row->user_coll_cred;
			$total_attempted = $row->total_attempted;
			$num_ques = $row->num_ques;

		}
		if($query->num_rows()==0)
		{
			$answered = 0;
			$user_coll_cred = 1;
			$total_attempted = 0;
			$num_ques = 0;
		}
		$con = $this->user_model->cal_concurrence($cu,$cl,$value,$k,$n,$answered);

		// Calculation of user credibility for a particular college 
		echo 'concentration:'.$con.'<br>';
		$data['user_coll_cred'] = (($user_coll_cred*$answered) + ($con*1))/($answered+1);
		$data['answered'] = $answered + 1;
		$data['total_attempted'] = $total_attempted + 1;
		$data['num_ques'] =  $num_ques + 1;
		print_r($data);
		/*
		if($query->num_rows() == 0)
		{
			$data['COLL_ID'] = $collegeId;
			$data['CID'] = $cid;
			$this->db->insert('UserCollegestring',$data);
		} 
		else
		{
			$this->db->update('UserCollegestring',$data,array('COLL_ID ='=>$collegeId,
													   			'CID ='    =>$cid));
		}


		$query = $this->db->get_where('users',array('id =' => $cid));

		foreach($query->result() as $row)
		{
			$cred = $row->user_cred;
			$user_num_ques = $row->num_ques;
		}

		$user_data['user_cred'] = ($cred*$user_num_ques + $data['user_coll_cred']*1)/($user_num_ques+1);
		$user_data['num_ques'] = $user_num_ques + 1;

		$this->db->update('users',$user_data,array('id =' => $cid));
		return ;
   		/*$k = 1;
   		$val = 2;
   		$n = 2;
   		//echo pow($val,1/$n);
   		$x = ((1-0.93851)*(1-0.93851)) + ((1-0.207655)*(1-0.207655));
   		$con = $k/pow($x,1/$n);
   		echo $con;
   		for($i=1;$i<=43;$i++)
   		{
   			$name[0] = 'Culture';
   			$name[1] = 'Development';
   			$name[2] = 'Staff(teaching)';
   			$name[3] = 'Scores';
   			for($j=0;$j<4;$j++)
   			{
   				$ques_query = $this->db->get_where('NODETABLE',array('Node_Name =' => $name[$j]));
				foreach($ques_query->result() as $ques_row)
				{
					$dnode = $ques_row->Node_ID;
	   				$query = $this->db->get_where('psycho_table2',array('COLL_ID ='=>$i,
	   																	'D_Node  ='=>$dnode));
		   			if($query->num_rows()==0)
		   			{
		   				echo 'cha';
		   			}
		   			else
		   			{
		   				$var = 'Op';
		   				$data2['Sample_SZ'] = 0;
		   				$data2['COLL_ID'] = $i;
		   				$data2['Country'] = 'in';
		   				$data2['Stream']  = 'All';
		   				$data2['Degree']  = 'All';
		   				$data2['Major']   = 'All';
		   				$data2['D_Node']  = $dnode; 
		   				$mu = 0;
		   				for($k=1;$k<=10;$k++)
		   				{
		   					$val = $var.$k;
		   					$data2[$val] = 0;
		   				}
		   				foreach($query->result() as $row)
			   			{
			   				$data2['Op1']+= $row->Op1;
							$data2['Op2']+= $row->Op2;
							$data2['Op3']+= $row->Op3;
							$data2['Op4']+= $row->Op4;
							$data2['Op5']+= $row->Op5;
							$data2['Op6']+= $row->Op6;
							$data2['Op7']+= $row->Op7;
							$data2['Op8']+= $row->Op8;
							$data2['Op9']+= $row->Op9;
							$data2['Op10']+= $row->Op10;
							$data2['Sample_SZ']+=$row->Sample_SZ;
			   			}
			   			for($k=1;$k<=10;$k++)
		   				{
		   					$val = $var.$k;
		   					$mu  +=$data2[$val]*$k;
		   				}	
		   				$data2['MU'] = $mu/$data2['Sample_SZ'];
		   				$this->db->insert('psycho_table2',$data2);

		   			}
		   		}

   			}
   			
   			

   		}
   		

   		/*$query = $this->db->get_where('psycho_table2');
   		foreach($query->result() as $row)
   		{
   			
   			$data2[1]= $row->Op1;
			$data2[2]= $row->Op2;
			$data2[3]= $row->Op3;
			$data2[4]= $row->Op4;
			$data2[5]= $row->Op5;
			$data2[6]= $row->Op6;
			$data2[7]= $row->Op7;
			$data2[8]= $row->Op8;
			$data2[9]= $row->Op9;
			$data2[10]= $row->Op10;
			$mu = 0;
			$sample = 0;
			for($i=1;$i<=10;$i++)
			{
				$mu += $data2[$i]*$i;
				$sample +=$data2[$i];
			}
			$data['Sample_SZ'] = $sample;
			$data['MU'] = $mu/$sample;
			$data1['TABLE2_ID'] = $row->TABLE2_ID;
			$this->db->update('psycho_table2',$data,$data1);
		}*/

   	}

   	public function check_database_time()
   	{
		$session = $this->session->set_userdata;
		
		
   		
   		$query = $this->db->get_where('table2',array('COLL_ID =' => 140,
   						 							 'S_Node  =' => 770,
   													 'P_Node  =' => 16));
   		foreach($query->result() as $row)
   		{
   			echo $row->NODE_NAME;
   		}
   		$time_elapsed_secs = microtime(true) - $start;
		$session = $this->session->set_userdata;
		$session['time'] = $this->session->time;
		$session['updated_controller'] = 'database_search';
		$session['time']['database_search']= $time_elapsed_secs;
		$this->session->set_userdata($session);

		/*
			***** Array fo the Attribute Node table *****
		*/
		$query = $this->db->get_where('AttributeNodeTable');
		$attr  = array();
		$i=0;
		foreach($query->result() as $row)
		{
			$attr[$i]['Node_ID']   			= $row->Node_ID;
			$attr[$i]['Prev_Node'] 			= $row->Prev_Node;
			$attr[$i]['Node_Name'] 			= $row->Node_Name;
			$attr[$i]['Node_Type'] 			= $row->Node_Type;
			$attr[$i]['Trigger_Ques'] 		= $row->Trigger_Ques;
			$attr[$i]['Trigger_AnsOp']		= $row->Trigger_AnsOp;
			$attr[$i]['footer_value_flag'] 	= $row->footer_value_flag;
			$attr[$i]['Footer_comment']  	= $row->Footer_comment;
			$attr[$i]['Footer_value']    	= $row->Footer_value;
			$i++;
		}

		/*
			***** Array for Structural Node Table ******
		*/
		
					$this->db->order_by('Prev_Node','ASC');
			$query = $this->db->get_where('NODETABLE');
			$struct = array();
			$struct_pos = array();
			$temp = -1;
			$i=0;
			foreach($query->result() as $row)
			{
				$struct[$i]['Node_ID']   			= $row->Node_ID;
				$struct[$i]['Prev_Node'] 			= $row->Prev_Node;
				$struct[$i]['Node_Name'] 			= $row->Node_Name;
				$struct[$i]['Node_Type'] 			= $row->Node_Type;
				$struct[$i]['Public']				= $row->Public;
				$struct[$i]['Trigger_Ques'] 		= $row->Trigger_Ques;
				$struct[$i]['Trigger_AnsOp']		= $row->Trigger_AnsOp;
				if($temp == -1 or $temp != $struct[$i]['Prev_Node'])
				{
					$temp = $row->Prev_Node;
					$struct_pos[$struct[$i]['Prev_Node']] = $i;
				}
				$i++;
			}				

		/*
			***** Table2 Data Extraction *****
		*/
		$start = microtime(true);

   		$query = $this->db->get_where('table2',array('COLL_ID =' => 140));
   		$data = array();
   		$i=0;
   		foreach($query->result() as $row)
   		{
   			$data[$i]['D_Node'] 		= $row->D_Node;
   			$data[$i]['S_Node'] 		= $row->S_Node;
   			$data[$i]['P_Node'] 		= $row->P_Node;
   			$data[$i]['NODE_VALUE'] 	= $row->NODE_VALUE; 
   			$data[$i]['NODE_NAME']  	= $row->NODE_NAME;
   			$data[$i]['Answer_Node'] 	= $row->Answer_Node;
   			$data[$i]['footer_value_flag'] = $row->footer_value_flag;
   			$data[$i]['Footer_comment']    = $row->Footer_comment;
   			$data[$i]['footer_value_flag'] = $row->footer_value_flag;
   			$data[$i]['Op1'] 			   = $row->Op1;
   			$data[$i]['Footer_value']	   = $row->Footer_value;
   			$data[$i]['unit']			   = $row->unit; 
    		$i++;
   		}
   		$session['data']   = $data;
   		$session['attr']   = $attr;
   		$session['struct'] = $struct; 
		$this->session->set_userdata($session);
		$temp = -1;
		for($i=0;$i<sizeof($struct);$i++)
		{
			echo $struct[$i]['Prev_Node'].' '.$struct_pos[$struct[$i]['Prev_Node']].'<br>';
		}
   		

   	}

   	public function test_time()
   	{
   		$nodeid = 1;
   		$attribute = 2;
   		$start = microtime(true);
		$time_elapsed_secs = microtime(true) - $start;
		$session = $this->session->set_userdata;
		$session['time'] = $this->session->time;
		$time_node = $nodeid*1000+$attribute;
		$session['updated_controller'] = $time_node;
		$session['time'][$time_node]= $time_elapsed_secs;
		$this->session->set_userdata($session);
   	}


	public function test_ques()
	{
		$this->load->model('user_model');
		echo $this->session->ans_count;
		/*
		$prev_id = 0;
		$query = $this->db->get_where('AttributeNodeTable',array('Node_Type =' => 'Decision'));
		foreach($query->result() as $row)
		{
			//$data1['Node_ID'] = $row->Node_ID;
			//$val = $row->Node_ID*-1 + 48;
			$diff = $row->Node_ID - $prev_id-1;
			for($i=0;$i<$diff;$i++)
			{
				echo '<br>';
			}
			echo $row->Node_Name.'<br>';
			
			$prev_id = $row->Node_ID;
			
			
		}
		*/

		//$arr = $this->user_model->get_attributeques()	//print_r($arr);
		/*
		$cid = 1016;
		$query = $this->db->get_where('users',array('id =' => $cid));
		foreach ($query->result() as $row)
		{
			$page_visit = $row->page_visit;
		}
		echo $page_visit[0];
		/*for($i=111;$i<418;$i++)
		{
			echo "'".$i."'".',';
		}
		*/
		/*
		for($i=222;$i<=322;$i = $i+4)
		{
			$query = $this->db->get_where('AttributeNodeTable',array('Node_ID ='=>$i));
			foreach($query->result() as $row)
			{
				$data['Node_Name'] = 'No_No';
			}	
			$this->db->update('AttributeNodeTable',$data,array('Node_ID ='=>$i));
		}
		*/
		//$this->db->delete('AttributeTable',array('CID =' => 1011));
		/*
		$query= $this->db->get_where('Attr_Bulk_Upload',array('ID =' =>332));
		foreach($query->result() as $row)
		{
			$val =  $row->Attr_String;
		}
		for($i=0;$i<strlen($val);$i++)
		{
			echo 'pos-:'.$i.'=>'.$val[$i].'<br>';
		}
		*/
		//echo $data['Attr_Bit_String'];
		/*
		$query = $this->db->get_where('StructureAttribute',array('Node_ID <=' =>398));
		foreach($query->result() as $row)
		{
			$data1['ID'] = $row->ID;
			$this->db->update('StructureAttribute',$data,$data1);
		}*/
		
		/*
		for($i=183;$i<=447;$i++)
		{
			$data['Node_ID'] = $i;
			$data['Node_Pos'] = $i;
			$this->db->insert('Attr_Position',$data);
		}
		
		//$query = $this->db->delete('AttributeNodeTable',array('Node_ID >=' => 133));
		
		/*
		$query = $this->db->get_where('AttributeNodeTable',array('Node_ID <=' => 22));
		$val = 133;
		for($i=0;$i<13;$i++)
		{
			foreach($query->result() as $row)
			{
				$data['Node_Tier']      	= $row->Node_Tier;
				$data['Node_Type']      	= $row->Node_Type;
				$data['Node_Name']			= $row->Node_Name;
				$data['Trigger_Ques']   	= $row->Trigger_Ques;
				$data['Trigger_AnsOp']  	= $row->Trigger_AnsOp;
				$data['Footer_value']   	= $row->Footer_value;
				$data['Footer_comment'] 	= $row->Footer_comment;
				$data['footer_value_flag']	= $row->footer_value_flag; 
				$data['Prev_Node'] 			= $prev; 
				$data['Node_ID']			= $val;
				
				if($row->Node_Type == 'Decision')
				{
					$data['Prev_Node'] = $row->Prev_Node;
					$prev = $val;
				}
				$val++;
				$this->db->insert('AttributeNodeTable',$data);
			}

		}
		
		//$data = $this->user_model->cal_user_cred_val(58,0,58,1,6);
		/*for($i=2;$i<1024;$i=$i+4)
		{
			$query = $this->db->get_where('NODETABLE',array('Node_ID =' => $i));
			foreach($query->result() as $row)
			{
				echo ucfirst(strtolower(str_replace('Yes_', "", $row->Node_Name))).'<br>';
			}	
		}*/
		
		//echo $data;
		//print_r($data);
		//$session = $this->session->set_userdata;
		//print_r($session);
		//echo mt_rand(0,3);
		/*
		$this->load->model('user_model');
		$query = $this->db->get_where('table2',array('TABLE2_ID =' => 4656));
		foreach($query->result() as $row)
		{
			$val = 'Op3';
			echo $row->$val;

		}
		*/
		//$this->user_model->getUserPsychoAns('Culture');
		//echo $this->session->prev_node;
		//$name = $this->user_model->getUserName();
		//echo $name;
		//$this->user_model->get_attrstring();
		//echo $this->session->ques_count;
		//$this->load->model('user_model');
		/*echo '<br>'.$this->session->college1;
    	echo '<br>'.$this->session->country_code;
    	echo '<br>'.$this->session->answer_string.'<br>';
		echo $this->get_quescollege(2,1);
		echo '<br>'.$this->session->college1;
    	echo '<br>'.$this->session->country_code;
    	echo '<br>'.$this->session->answer_string.'<br>';*/
    	//echo $this->session->opt_num;
    	//$this->user_model->update_attrnodeanswer(0);

		//echo $this->session->psychographic;
		//echo $this->session->structural;
		//$this->user_model->get_nodequestion();
		//echo $this->session->ans_count;
		//echo $this->session->is_logged_in;
		//print_r($this->user_model->get_attributeques());
		//print_r($this->user_model->get_psycho_nodeques());
		//echo  $this->session->prev_node;
		//print_r($this->user_model->getPsychoSetQues(-1));
		//print_r($this->user_model->getUserStats(-1,-1,'in','Country','in'));
		//$this->load->view('psycho-answer');
		//echo $this->session->psycho_string;
		//print_r($this->user_model->get_psycho_nodeques());
		//$this->user_model->update_psycho_nodeans(0);
		//echo $this->session->club_id;
		//$answer_string =	$this->session->answer_string;
		//echo $answer_string[103].'<br>';

		//$psycho_string = $this->session->psycho_string;
		//echo $psycho_string[103];
		//echo '<br>'.strlen($this->session->psycho_string).'<br>';
		/*$data1['CountryCode'] = 'psych';
		$query = $this->db->get_where('STRING',$data1);
		foreach($query->result() as $row)
		{
			$answer_string = $row->Country_String;
			$psycho_string = $row->Country_String;
		}*/
		//echo $this->session->ques_count;
		/*$data = $this->session->userdata;
		$data['ques_ans'] = -1;
		$this->session->set_userdata($data);*/
		//echo $this->session->college1;
		//$this->answer_validation();
		//echo $this->session->redirect;
		//$this->load->view('psycho-ques');
		//print_r($this->session->time);
		//$this->user_model->add_bulkdata();
		//echo $this->session->is_logged_in;

		//$this->psycho_structural();
		//echo $this->get_college();
		//print_r($this->user_model->get_attributeques());
		//$this->user_model->insert_attributes();
		//echo $this->session->psycho_string;
		//$data = $this->user_model->get_option_scores(1026,2);
		//$data = $this->user_model->get_psycho_nodeques();
		//print_r($data);
		//$this->get_college();
		//echo $this->session->q_id.'<br>';
		//echo $this->session->ans_qid;
		//echo $this->session->college1;
		//echo $this->session->ans_count;
	    //echo $this->session->coll_anscount;
		//print_r($this->session->user_college);
	//	echo $this->get_quescollege(1);
//		echo '<br>'.$this->session->college1;
		//echo '<br>'.$this->session->
		//$data = $this->user_model->get_nodequestion();
		//echo '<br>';
		//print_r($data);
		/*for($i=0;$i<1100;$i++)
		{
			if($i=0) echo 30;
			else if($i<=1048) echo 31;
			//elseif($i<=1048) echo 1;
			else echo 30;
		}*/
		/*for($i=1027;$i<=1048;$i++)
		{
			$data2['Node_ID'] = $i;
			$data2['Node_Pos'] = $i;
			$this->db->insert('Node_Position',$data2);
		}
		/*for($i=0;$i<10;$i++)
		{

			$data['Node_ID'] = 1027+$i;
			$data['Node_Tier'] = 0;
			$data['Prev_Node'] = 0;
			$data['Node_Type'] = 'Decision';
			$data['Trigger_Ques'] = 293+$i;
			$data['Club_ID'] = -1;
			$this->db->insert('NODETABLE',$data);

		}*/

	}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
