<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Psychographic extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		$this->load->helper('url');
		$this->load->library('session');
	}

	/*
	Input : NULL
	output : To show stats for psychographic questions
	*/
	public function showstats()
	{
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$this->load->model('user_model');
			$coll_val = $this->input->post('coll_val');
			$name = $this->input->post('name');
			$country = $this->input->post('country');
			$stream = $this->input->post('stream');
			$degree = $this->input->post('degree');
			$major = $this->input->post('major');
			$college = $this->session->user_college;
			$country_code = $this->session->user_country;
			$coll_id = $this->user_model->get_collid($college[$coll_val],$country_code[$coll_val]);
			$data_ans = $this->user_model->getUserPsychoAns($name,$college[$coll_val],$country_code[$coll_val]);
			$data = $this->user_model->getPsychoSetQues($name);
			$country_code = $this->user_model->GetCountryCode($country);
			//$coll_id = -1; //

			$stats_data = $this->user_model->getUserStats($name,-1,$stream,$degree,$major,$country_code);
			//$coll_id = 34;

			$data_content = $this->getcontent($name,$coll_id,$country_code[$coll_val]);
			$data['percentage'] = $stats_data['percentage'];
			$data['answer'] = $data_ans['answernode'];
			$data['user_content'] = $data_content['user_content'];
			$data['coll_content'] = $data_content['coll_content'];
			echo json_encode ($data);
			//$this->load->view('stats',$data);
		}
		else
		{
			redirect('main/login');
		}
	}

	

	/*
		Input: collegeid,type of question(like Culture,Development ...) 
		Output: User And College specific answer
	*/

	public function getcontent($name,$coll_id,$country_code)
	{
		//$name = 'Culture';
		//$coll_id = 2;
		//$country_code = 'in';
		$stream = 'All';
		$degree = 'All';
		$major = 'All';
		$this->load->model('user_model');
		$data_ans = $this->user_model->getUserPsychoAns($name);
		$data = $this->user_model->getPsychoSetQues($name);
		// For the user content
		$stats_data = $this->user_model->getUserStats($name,$coll_id,$stream,$degree,$major,$country_code);
		for($i=0;$i<sizeof($data['question']);$i++){

			$sigma = 0;
			$left_percentage = 0;
			$right_percentage = 0;
			
			$opt_size = sizeof($data['opt_num'][$i]);
			$mu = $stats_data['mu'][$i];
			$sample = $stats_data['sample'][$i];


			for($j=1;$j<=$opt_size;$j++){
				if($data_ans['answernode'][$i] < $j)
				{
					$left_percentage += $stats_data['percentage'][$i][$j-1]; 
				}
				else if($data_ans['answernode'][$i] > $j)
				{
					$right_percentage += $stats_data['percentage'][$i][$j-1]; 
				}
				//$mu += $j*$stats_data[$i][$j-1];
				$sigma += ($j-$mu)*($j-$mu);
			}

			$sigma = sqrt($sigma/$sample);
			

			// Formula can be mofied later 
			$score = (($data_ans['answernode'][$i] - $mu)/(1+$sigma));
			
			$val = -1;
			if($score >= 2) $val = 0;
			else if($score>=1 && $score<2) $val = 1;
			else if($score <=-1 && $score>-2) $val = 2;
			else if($score <=-2) $val = 3;

			// Formula ends here

			$user_final[$i]   = "";
		   	
			if($val!=-1)
			{
				$user_tags	  = $data['user_tags'][$i];
		    	$user_content = $data['user_content'][$i];	
		    	$user_word    = explode(",", $user_tags);
		    	$user_flag    = 0;
		    	
		    	for($z=0;$z<strlen($user_content);$z++)
		    	{
		    		// For the dyanamic word	
		    		if($user_content[$z] == '%' && $user_flag == 0){
		    			$user_final[$i] = $user_final[$i].$user_word[$val];
		    			$user_flag = 1;
		    		}
		    		//  For the percentage of users which are lower from his college
		    		else if($user_content[$z] == '%' && $user_flag == 1){
		    			$user_final[$i] = $user_final[$i].$left_percentage.'%';	
		    			$user_flag = 2;
		    		}
		    		else{
		    			$user_final[$i] = $user_final[$i].$user_content[$z];
		    		}
		    	}
			}

		}

		// For the college content
		$coll_data = $this->user_model->getMuVal($name,$coll_id,$stream,$degree,$major,$country_code);

		$coll_id = -1;

		$stats_data = $this->user_model->getUserStats($name,$coll_id,$stream,$degree,$major,$country_code);


		for($i=0;$i<sizeof($data['question']);$i++){

			$mu = 0;
			$sigma = 0;
			$opt_size = sizeof($data['opt_num'][$i]);
			$left_percentage = 0;
			$right_percentage = 0;
			for($j=1;$j<=$opt_size;$j++){
				if($data_ans['answernode'][$i] < $j)
				{
					$left_percentage += $stats_data['percentage'][$i][$j-1]; 
				}
				else if($data_ans['answernode'][$i] > $j)
				{
					$right_percentage += $stats_data['percentage'][$i][$j-1]; 
				}
				
			}


			// Formula can be mofied later 
			$score = (($data_ans['answernode'][$i] - $coll_data['coll_mu'][$i])/(1+$coll_data['sigma'][$i]));
			
			$val = -1;
			if($score >= 2) $val = 0;
			else if($score>=1 && $score<2) $val = 1;
			else if($score <=-1 && $score>-2) $val = 2;
			else if($score <=-2) $val = 3;

			// Formula ends here
			
			
		   	$coll_final[$i]   = "";
			if($val!=-1)
			{
				
		    	$coll_tags	  = $data['coll_tags'][$i];
		    	$coll_content = $data['coll_content'][$i];
		    	$coll_word	  = explode(",", $coll_tags); 	
		    	$coll_flag    = 0;
		    	
		    	
		    	for($z=0;$z<strlen($coll_content);$z++)
		    	{
		    		// For the dyanamic word 
		    		if($coll_content[$z] == '%' && $coll_flag == 0){
		    			$coll_final[$i] = $coll_final[$i].$coll_word[$val];
		    			$coll_flag = 1;
		    		}
		    		//  For the percentage of college which are lower from the same country
		    		else if($coll_content[$z] == '%' && $coll_flag == 1){
		    			$coll_final[$i] = $coll_final[$i].$left_percentage.'%';
		    			$coll_flag = 2;	
		    		}
		    		else{
		    			$coll_final[$i] = $coll_final[$i].$coll_content[$z];
		    		}
		    	}
			}

		}
		$data_con['user_content'] = $user_final;
		$data_con['coll_content'] = $coll_final;
		//print_r($data_con);
		return $data_con;


	}


	public function answers()
	{
		$mail=$this->session->email;
		if(!empty($mail))
		{
			$this->load->model('user_model');

			$college = $this->session->college1;
			$country_code = $this->session->country_code;
			$cid = $this->session->cid;
			
			$data['college'] = $this->session->user_college;
			$data['country_code'] = $this->session->user_country;
			$data['Node_Name']  = $this->user_model->getPsychoNames();
			$data['Country'] = $this->user_model->getPsychoCountry();
			$data['Filters'] = $this->user_model->getPsychoStream();
			$collid = $this->user_model->get_collid($data['college'][0],$data['country_code'][0]);
			$data_ans = $this->user_model->getUserPsychoAns('Culture',$data['college'][0],$data['country_code'][0]);
			$data['answer'] = $data_ans['answernode'];
			$query = $this->db->get_where('userprofiledata',array('COLL_ID ='	=> $collid,
															 	  'CID     ='	=> $cid));

			foreach($query->result() as $row)
			{
				$data['sel_stream'] = $row->stream;
				$data['sel_degree'] = 'All';
				$data['sel_major'] = 'All';
			}

			if($query->num_rows() == 0)
			{
				$data['sel_stream'] = 'All';
				$data['sel_degree'] = 'All';
				$data['sel_major'] = 'All';

			}
			$data['sel_country'] = $this->user_model->get_country($country_code);
			$data['sel_name'] = 'Culture';

			$data_ques = $this->user_model->getPsychoSetQues($data['sel_name']);
			$collid = -1;
			$stats_data = $this->user_model->getUserStats($data['sel_name'],$collid,$data['sel_stream'],$data['sel_degree'],$data['sel_major'],$country_code);

			$data_content = $this->getcontent($name,$data['college'][0],$data['country_code'][0]);
			$data['question'] 	 = $data_ques['question'];
			$data['opt_content'] = $data_ques['option_content'];
			$data['percentage']  = $stats_data['percentage'];
			
			$data['user_content'] = $data_content['user_content'];
			$data['coll_content'] = $data_content['coll_content'];

			$this->load->view('psycho-answer',$data);
		
		}
		else
		{
			redirect('main/login');
		}


	}



	public function answer_credibility(){
		/*$value = 'Engineering';
		$college_id = 1;
		$yes_count = 4;
		$no_count = 2;
		$ns_count = 1;*/
		$query = $this->db->query("SELECT YES, NO, NS from table2 where COLL_ID = '$college_id' Answer_Node <> 'NULL' AND NODE_VALUE = '$value'");
		foreach($query->result() as $info){
			$yes_count = $info->YES;
			$no_count = $info->NO;
			$ns_count = $info->NS;
		}
		$pcap = $yes_count / ($yes_count + $no_count);
		$alpha = 0.95;
		$n = $yes_count + $no_count;
		$arg1 = (pow(1.96 , 2))/(2 * $n);
		$a = $pcap * (1 - $pcap) + ($arg1 / 2);
		$b = 1.96 * sqrt($a / $n);
		$d = 1 + 2 * $arg1;
		$max = ($pcap + $arg1 + $b) / $d;
		$min = ($pcap + $arg1 - $b) / $d;
		$mean_cred = ($max + $min) / 2;
		if($min > 0.5 && $pcap < 0.25){
			return "Yes";
		}else{
			if($max <= 0.5 && $pcap < 0.25){
				return "No";
			}else{
				return "Not Sure";
			}
		}
	}

	
}