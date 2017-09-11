<?php
/*
Initial signin 		   -->add_temp_user($key)
key validation 		   -->is_key_valid($key)
userdetails    		   -->add_user()
loginvalidation 	   -->can_log_in()
collegeid       	   -->getcollid()
collegedetails  	   -->add_college_user()
get collegeID for CID  -->getcollid($college,$id)
To enter new collegeID -->maxcollid()
Table1 insertion       -->add_table1_user()
collge sample size     -->samplesize($collid, $param_type)
mucalculation          -->mucal($collid, $param_type, $numval)
sigmacalculation       -->sigcal($collid, $param_type, $numval)
Table2 insertion       -->add_table2_user()
Table3 insertion       -->add_table3_user()
Table4 insertion       -->add_table4_user()
To update table3       -->update_table3_user($id)
previousschool answeredget -->preschool()
to get customer ID 	   -->getcid()
To view user details   -->viewdetails()
To get college name and id for suggestion --> getschool()
Check if mail exists --> check_email_exists()
add temprary key for forgotten password  --> update_forget_password()
add facebook college  --> check_fb_college()
 */
class User_model extends CI_Model {


	/*
	Input : search term
	Output : College name and id
	*/
	public function getschool($search){
        $this->db->distinct();
		$this->db->select("primary_college");
		$this->db->select("colg_id");
        $this->db->like('synonym', $search);
        $query = $this->db->get('synonyms');
		return $query->result();

    }


    /*
		Get the user page visit data
    */
	public function getPageVisit()
	{
		$cid = $this->session->cid;
		$query = $this->db->get_where('users',array('id =' => $cid));
		foreach ($query->result() as $row)
		{
			$page_visit = $row->page_visit;
		}
		return $page_visit;
	}

	/*
		Make the user page visit bit to 0
	*/
	public function getDisablePagebit($pos)
	{
		$cid = $this->session->cid;
		$query = $this->db->get_where('users',array('id =' => $cid));
		foreach ($query->result() as $row)
		{
			$page_visit = $row->page_visit;
		}
		$page_visit[$pos-1] = 0;
		$data['page_visit'] = $page_visit;
		$data1['id'] = $cid;
		$this->db->update('users',$data,$data1);
		$data3 = $this->session->set_userdata;
		$data3['page_visit'] = $data['page_visit'] ;
		$this->session->set_userdata($data3);
		return ;

	}

    /*
	Check if email given as input is already used or not
    */
    public function check_email_exist($email)
 	{
 		$this->db->select('id');
 		$query = $this->db->get_where('users',array("email" => $email));
 		if($query->num_rows())
 			return $query->result();
 		else
 			return false;
 	}

 	/*
		For users that have clicked forget password add temporary key to match to the forget_password column of 'users' table
 	*/
 	public function update_forget_password($id,$key)
 	{
 		$this->db->where('id', $id);
		$this->db->update('users', array("forget_password" => $key));
 	}

 	/*
		Input : key term
		Output : User id with matching key or false
 	*/
 	public function check_key($key)
 	{
 		$this->db->select('id');
 		$query = $this->db->get_where('users',array("forget_password" => $key));
 		if($query->num_rows())
 			return $query->result();
 		else
 			return false;
 	}

 	/*
	Input : Json array data from facebook
	Output: None
	Logic : Insert data into college table and synonyms table if not exists
 	*/
 	public function check_fb_college($data)
	{

	//other synonyms present
	if(isset($data["best_page"])) 
	{
		$id = $data["best_page"]["id"];
		$name = $data["best_page"]["name"];
		$ref = 1;
	}
	else
	{
		$id = $data["id"];
		$name = $data["name"];
		$ref = 0;
	}
	$query = $this->db->get_where('college',array('fb_colg_id' => $id));

	if(!$query->num_rows())
	{
		$country_code = $this->GetCountryCode($data["location"]["country"]);
		$college_data = array(
				"fb_colg_id" => $id,
				"COLL_NAME" => $name,
				"CountryCode" => $country_code,
				"latitude" => $data['location']['latitude'],
				"longitude" => $data['location']['longitude'],
				"city" => $data['location']['city']
			);
		$this->db->insert('college',$college_data);
		$this->db->select("COLL_ID");
		$query1 = $this->db->get_where('college',array('fb_colg_id' => $id));
		$result = $query1->row_array();
		$this->add_synonym(array("colg_id" => $result['COLL_ID'],"synonym" => $name,"primary_name" => 1,"primary_college" =>$name,'country' =>$data["location"]["country"],'city' => $data['location']['city']));
		if($ref)
		{
			$this->add_synonym(array("colg_id" => $result['COLL_ID'],"synonym" => $data["name"],"primary_name" => 0,"primary_college" =>$name,'country' =>$data["location"]["country"],'city' => $data['location']['city']));
		}
		$suggest_id = $result['COLL_ID'];
	}
	else{
		foreach($query->result() as $row)
		{
			$suggest_id = $row->COLL_ID;
		}
		
	}
	return $suggest_id;
}

/*
	Insert data into synonyms table
*/
public function add_synonym($data)
{
	$this->db->insert('synonyms',$data);
}
/*
	Returns country based on search term
*/
    public function getcountry($search){
        $this->db->select('Country_Name');
        $this->db->like('Country_Name',$search);
        $query = $this->db->get('Country');
		return $query->result();

    }
/*
	Returns country code based on country name
*/
    public function GetCountryCode($country)
    {
    	$this->db->like('Country_Name',$country);
    	$query = $this->db->get('Country');
    	foreach ($query->result() as $row)
    	{
    		$country_code = $row->Country_Code;
    		$country_name = $row->Country_Name;
    		if($country == $country_name)
    		{
    			$countrycode = $country_code;
    		}
    	}
    	return $countrycode;
    }
	public function getadmission($search,$college,$paramid){
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
        $this->db->select('VAL_DATA');
        $this->db->like('VAL_DATA', $search);
		$query = $this->db->get_where('table2', array('PARAM_ID =' => $paramid,
													   'COLL_ID =' => $collid));
		return $query->result();
	}
	public function can_log_in() {
		$this->load->database();
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');

		if($query->num_rows() == 1){
			return true;
		}
		else {
			return false;
		}
	}
	public function check_email() {
		$this->load->database();
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('users');

		if($query->num_rows() >= 1){
			return false;
		}
		else {
			return true;
		}
	}
	public function check_ref_limit($email){
		$this->db->select('ref_email');
		$query = $this->db->get_where('users', array('ref_email =' => $email));
		$this->db->select('ref_email');
		$query1 = $this->db->get_where('temp_users', array('ref_email ='=> $email));
		$rows = $query->num_rows() + $query1->num_rows();
		if($rows > 3){
			return 0;
		}
		else if ($rows == 0){
			$this->db->select('email');
			$query2 = $this->db->get_where('users', array('email =' => $email));
			if($query2->num_rows()==0)
			return -1;
			else
			return 1;
		}
		else{
			return 1;
		}
	}
	public function get_refamount($email){
		$this->db->select('ref_email');
		$query = $this->db->get_where('users', array('email =' =>$email));
		foreach ($query->result() as $row)
				$mail = $row->ref_email;
		if($mail=="" or $mail == " "){
		}
		else{
			$this->db->select('INCEN');
			$query1 = $this->db->get_where('table3', array('CID_NAME =' =>$mail));
			foreach ($query1->result() as $row)
					$incen = $row->INCEN;
			if($incen >= 150) $incen = 200;
			else $incen = $incen + 50;
			$data = array(
				'INCEN' =>$incen
				);
			$query2 = $this->db->update('table3', $data, array('CID_NAME =' => $mail));
		}
		return TRUE;
	}
	public function inc_refamount(){
		$email = $this->session->email;
		$this->db->select('ref_email');
		$query = $this->db->get_where('users', array('email =' =>$email));
		foreach ($query->result() as $row)
				$mail = $row->ref_email;
		if($mail=="" or $mail == " "){
		}
		else{
			$this->db->select('INCEN');
			$query1 = $this->db->get_where('table3', array('CID_NAME =' =>$mail));
			foreach ($query1->result() as $row)
					$incen = $row->INCEN;
			if($incen >= 160) $incen = 200;
			else $incen = $incen + 40;
			$data = array(
				'INCEN' =>$incen
				);
			$query2 = $this->db->update('table3', $data, array('CID_NAME =' => $mail));
		}
		return TRUE;
	}
	public function check_phonenumber($number){
		$this->db->select('phone');
		$query = $this->db->get_where('users', array('phone =' =>$number));
		if($query->num_rows() >=1){
			return false;
		}
		else
		{
			return True;
		}

	}
	public function add_temp_user($key,$otp){
		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'key' => $key,
			'otp' => $otp,
		//	'phone' => $this->input->post('phone'),
			'ref_email'=>$this->input->post('ref_email'),
			);
		$query = $this->db->insert('temp_users', $data);
		if($query){

			return true;
		}else{
			return false;
		}
	}

	/*
	Input : data from facebook
	Output: None
	Logic : Add the user from facebook login to database
	*/
	public function add_fbuser($data)
	{
		$id = $data['id'];
		$name = $data['name'];
		$email = $data['email'];
		if($email == "") $email = $name;
		$data['is_logged_in'] = 1;
		$query = $this->db->get_where('users',array('fb_id =' =>$id));
		if($query->num_rows() == 0)
		{
			$user['fb_id'] = $id;
			//temporary have to change the algo for fb login
			$user['password'] = '!IIIT123';
			$user['email'] = $email;
			$user['ref_email'] = "";
			$user['Display_Name'] = $name;
			$this->db->insert('users',$user);
			$data['is_logged_in'] = 2;
		}

		$cid = $this->user_model->getcid($email);

		if($this->user_model->set_collegesession($cid)==-1)
		{
			$data['is_logged_in'] = 2;
		}

		$data['email'] 	= $email;
		$data['cid']	= $cid;
		$data['prev_node'] = 0;
		$data['ans_count'] = 0;
		$data['coll_anscount'] = 0;
		$data['prev_node'] = 0;
		$data['q_id'] = 0;
		$data['ans_qid'] = 0;
		$this->session->set_userdata($data);

		return;
	}
	/*
	Check if college with given name and country exists or not
	*/
	public function check_collname($college,$countrycode){
		$this->db->select('COLL_ID');
		$query = $this->db->get_where('college', array('COLL_NAME ='   => $college,
													   'CountryCode =' => $countrycode));
		if($query->num_rows()){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
	/*
	Returns college id of college with given name and country
	*/
	public function get_collid($college,$country_code){
		$this->db->select('COLL_ID');
		$query = $this->db->get_where('college', array('COLL_NAME ='   => $college,
													   'CountryCode =' => $country_code));
		$collid = -1;
		foreach ($query->result() as $row)
		{
				$collid = $row->COLL_ID;
		}

		return $collid;
	}
	/*public function maxcollid(){
				$this->db->select_max('COLL_ID1');
				$query = $this->db->get('college_users');
				if($query->num_rows()==0) $cid1=0;
				foreach ($query->result() as $row)
				   	$cid1= $row->COLL_ID1;
				$this->db->select_max('COLL_ID2');
				$query = $this->db->get('college_users');
				if($query->num_rows()==0) $cid1=0;
				foreach ($query->result() as $row)
				   	$cid2= $row->COLL_ID2;
				   	if($cid1 = $cid2) $collid = $cid1 +1;
				   	else if($cid1 > $cid2) $collid = $cid1 +1;
				   	else $collid = $cid2 +1;
				return $collid;
	}*/
	public function get_valtype(){
		$this->db->select('VAL_TYPE');
		$query=$this->db->get('question');
		$i=0;
		foreach($query->result() as $row){
			$value[$i] = $row->VAL_TYPE;
			$i++;
		}
		return $value;
	}
	public function get_samplesize($collid,$paramid,$paramtype,$datavalue,$snode){
			$this->db->select('SSIZE_N');
			if($paramtype==0 && $datavalue == -1){
				$query = $this->db->get_where('table2', array('P_Node ='  => $paramid,
															  'S_Node ='  => $snode,
															  'COLL_ID =' => $collid ));

			}
			else if($paramtype==0){
				$query = $this->db->get_where('table2', array('D_Node ='  => $paramid,
															  'S_Node ='  => $snode,
															  'COLL_ID =' => $collid ));

			}
			else{
				$query = $this->db->get_where('table2', array('D_Node ='  => $paramid,
															  'S_Node ='  => $snode,
															  'COLL_ID =' => $collid,
															  'VAL_DATA =' =>$datavalue));
			}
			$size = 0;
			if($query->num_rows()==0) {
				return $size;
			}
			else if($datavalue == -1){
				foreach ($query->result() as $row)
			   		$size =$size + $row->SSIZE_N;
				return $size;
			}
			else if($datavalue == 0)
			{
				foreach ($query->result() as $row)
			   		$size= $row->SSIZE_N;
			   	return $size;
			}
			else if($datavalue == -2)
			{
				foreach ($query->result() as $row)
			   		$size= $row->SSIZE_A;
			   	return $size;

			}
	}
	public function get_paramdisplay($collid,$paramid,$paramtype,$datavalue){
		$this->db->select('VAL_PARAM_DISP');
		if($paramtype==0){
				$query = $this->db->get_where('table2', array('PARAM_ID =' => $paramid,
															  'COLL_ID =' => $collid ));
			}
			else{
				$query = $this->db->get_where('table2', array('PARAM_ID =' => $paramid,
															  'COLL_ID =' => $collid,
															  'VAL_DATA =' =>$datavalue));
			}
			if($query->num_rows()==0)return 0;
			else{
				foreach ($query->result() as $row)
			   		$display= $row->VAL_PARAM_DISP;
			   	return $display;
			}
	}
	public function add_college_user($college,$country_code)
	{
		$cid = $this->session->cid;
		if($this->user_model->check_collname($college,$country_code))
		{
			$data = array(
				'COLL_NAME'  => $college,
				'CountryCode'=> $country_code,
				);
			$query = $this->db->insert('college', $data);
			$this->user_model->add_collegebitstring_user($college,$country_code);
			$collid = $this->user_model->get_collid($college,$country_code);
		}
		else
		{
			$collid = $this->user_model->get_collid($college,$country_code);
			$view_query = $this->db->get_where('college',array('COLL_ID ='=>$collid));
			foreach($view_query->result() as $row)
			{
				$views = $row->Views;
			}
			$coll_query = $this->db->get_where('UserCollegestring',array('CID ='     => $cid,
									   								     'COLL_ID =' => $collid));
			if($coll_query->num_rows == 0)
			{
				$query1 = $this->db->get_where('college',array('COLL_ID =' => $collid));
				foreach($query1->result() as $row)
				{
					$college_string = $row->College_String;
				}
				$data = array(
					'CID'     		=> $cid,
					'COLL_ID' 		=> $collid,
					'Bit_String' 	=> $college_string,
					'record_views'	=> $views
					);
				$query = $this->db->insert('UserCollegestring',$data);
			}
			else
			{
				return False;

			}

		}
		//Insert the code for the native or alien part
		//Temporarly disabled
		/*if(condition to be entered)
		{
			$native = 1;
			$sample = $this->user_model->get_samplesize($collid,0,0,0,0);
		}
		else
		{
			$native = 0;
			$sample = $this->user_model->get_samplesize($collid,0,0,-2,0);
		}*/

		$native = 1;
		$sample = $this->user_model->get_samplesize($collid,0,0,0,0);
		$data = array(
		'CID'          => $cid,
		'NA'           => $native,
		'S_Node'       => 0,
		'P_Node'       => 0,
		'COLL_ID'      => $collid,
		'VAL_TYPE'     => 0,
		'NUM_VAL'      => 0,
		'TEXT_VAL'     => 0,
		'NUM_VAL_UNIT' => 0,
		'YEAR_START'   => 0,
		'YEAR_END'     => 0
		);
		$query = $this->db->insert('table1', $data);

		$data= array(
		'COLL_ID'        => $collid,
		'D_Node'        => 0,
		'S_Node'        => 0,
		'P_Node'        => 0,
		'Node_Type'     => 0,
		'VAL_MU'	 	 => 0,
		'VAL_SIGMA'  	 => 0,
		'VAL_PARAM_DISP' => 0,
		'CRED_PARAM_DISP'=> 0,
		'NA'             => 1,
		'PARAM_CRED'     => 0,
		'YEAR_DEPENDENT' => 0,
		'flags'			 => 0,
		);

		/*if(condition to be entered) $data['SSIZE_N'] = $sample + 1;
		else $data['SSIZE_A'] = $sample + 1;*/

		$data['SSIZE_N'] = $sample + 1;
		$query = $this->db->get_where('table2', array('COLL_ID =' => $collid,
													  'S_Node  =' => 0,
													  'D_Node  =' => 0,
													  'P_Node  =' => 0));
		if($query->num_rows() != 0)
		{
			$this->db->update('table2', $data, array('COLL_ID =' => $collid,
													  'S_Node  =' => 0,
													  'D_Node  =' => 0,
													  'P_Node  =' => 0));
		}
		else
		{
			$this->db->insert('table2', $data);
		}
		$this->user_model->set_collegesession($cid);
		return True;
	}


	public function addAnsweredQues()
	{
		/*
			When user logouts add total Questions
			Answered in this session
		*/

		$ans = $this->session->ans_count;
		$cid = $this->session->cid;
		$query = $this->db->get_where('users',array('id =' => $cid));
		foreach($query->result() as $row)
		{
			$data['Q_Answered'] = $row->num_ques + $ans;
		}
		//$this->db->update('users',$data, array('id =' => $cid));

	}

	public function getAnsweredQues()
	{
		$cid = $this->session->cid;
		$query = $this->db->get_where('users',array('id =' => $cid));
		foreach($query->result() as $row)
		{
			$Q_Answered = $row->num_ques ;
		}

		return $Q_Answered;

	}
	public function deletedata(){
		$this->db->empty_table('table1');
		$this->db->empty_table('table2');
		$this->db->empty_table('table3');
		$this->db->empty_table('UserCollegestring');
		$this->db->empty_table('AttributeTable');



		$this->db->empty_table('users');
		$this->db->empty_table('temp_users');
		return TRUE;

	}
	public function getquestion(){
		$this->db->select('PARAM_NAME');
		$query=$this->db->get('question');
		$i=0;
		foreach($query->result() as $row){
			$question[$i] = $row->PARAM_NAME;
			$i++;
		}
		return $question;
	}
	public function noquestion(){
		$this->db->select_max('PARAM_ID');
		$query = $this->db->get('question');
		foreach ($query->result() as $row)
			   	$paramno  = $row->PARAM_ID;
		return $paramno;
	}
	public function getcolldetails(){
		$college = $this->input->post('search');
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$paramno =$this->user_model->noquestion();
		$sample=0;
		for($i=0;$i<$paramno;$i++)
		{
			$flag=0;
			$this->db->select('VAL_MU');
			$this->db->select('VAL_PARAM_DISP');
			$this->db->select('VAL_DATA');
			$query = $this->db->get_where('table2', array('COLL_ID =' => $collid,'PARAM_ID =' => $i+1));
			if($query->num_rows()==0)
				{
					$data[$i]=-1;
					$sample++;
				}
			foreach ($query->result() as $row){
			 	$mu=$row->VAL_MU;
			 	$disp=$row->VAL_PARAM_DISP;
			 	$val =$row->VAL_DATA;
			 	if($disp == 1&&($val==""or $val==" ")){
			 		$data[$i] = $mu;
			 	}
			 	else if($disp==1){
			 		$flag=1;
			 		$data[$i] = $val;
			 	}
			 	else if($flag==0){
			 		$data[$i]=-1;
			 	}
			 }
		}
		if($sample==$paramno) return 0;
		else return $data;
	}
	public function getanswerdetails(){
		$cid = $this->session->cid;
		$this->db->select('ANSWER');
		$query = $this->db->get_where('table3', array('CID =' => $cid));
		foreach ($query->result() as $row)
			   	$value = $row->ANSWER;
		return $value;
	}
	public function get_globaldisp(){
		$this->db->select('GLOB_DISP');
		$query = $this->db->get('question');
		$i=0;
		foreach ($query->result() as $row){
			   	$disp[$i] = $row->GLOB_DISP;
			   	$i++;
			   }
		return $disp;
	}
	public function get_muvalve($collid,$paramid){
		$this->db->select('VAL_MU');
		$query = $this->db->get_where('table2', array('COLL_ID  =' => $collid,
													  'PARAM_ID =' => $paramid));
		foreach ($query->result() as $row)
			   	$muvalue = $row->VAL_MU;

		return $muvalue;
	}
	public function get_sigmavalve($collid,$paramid){
		$this->db->select('VAL_SIGMA');
		$query = $this->db->get_where('table2', array('COLL_ID  =' => $collid,
													  'PARAM_ID =' => $paramid));
		foreach ($query->result() as $row)
			   	$sigmavalue = $row->VAL_SIGMA;

		return $sigmavalue;
	}
	public function get_valcred($collid,$numval,$paramid){
		$sample  = $this->user_model->get_samplesize($collid, $paramid, 0,0,0);
		if($sample==0) return 0.5;
		else{
			$mu = $this->user_model->get_muvalve($collid,$paramid);
			$si = $this->user_model->get_sigmavalve($collid,$paramid);
			if ($si ==0 ) return 0.5;
			$z[0] = 3.090232;
			$z[1] = 2.878162;
			$z[2] = 2.575829;
			$z[3] = 2.326348;
			$z[4] = 2.053749;
			$z[5] = 1.644854;
			$z[6] = 1.281552;
 			$z[7] = 0.841621;
			$z[8] = 0.000000;
			$a[0] = 0.001 ;
			$a[1] = 0.002;
			$a[2] = 0.005;
			$a[3] = 0.01;
			$a[4] = 0.02;
			$a[5] = 0.05;
			$a[6] = 0.10;
			$a[7] = 0.20;
			$a[8] = 0.50;
			$k = ($numval-$mu)/$si;
			if($k < 0 ) $k = -1 * $k;
			for($i=0;$i<9;$i++){
				if($k >= $z[$i]){
						$norm = $a[$i];
						break;
					}
				}
			//if($cred!=1) $cred =$k;
			if($sample<=5)
			{
				$cred = 0.5 + (0.5 - 2*ABS(0.5 -$norm))/(6-$sample);

			}
			else
			{
				$cred = 0.5 + (0.5 - 2*ABS(0.5 - $norm));
			}
		}
		return $cred;
	}
	public function get_collname($collid){
		$this->db->select('COLL_NAME');
		$query1 = $this->db->get_where('college' , array('COLL_ID =' => $collid));
		foreach ($query1->result() as $row){
			$college1 = $row->COLL_NAME;
		}
		return $college1;
	}

	public function set_collegesession($id){
		$this->db->select('COLL_ID');
		$query = $this->db->get_where('table1',array('CID =' =>$id,
													 'P_Node' => 0,
													 'S_Node' => 0));
		$i=0;
		foreach ($query->result() as $row){
			$collid = $row->COLL_ID;
			$coll_query = $this->db->get_where('college',array('COLL_ID =' =>$collid));
			foreach($coll_query->result() as $coll_row)
			{
				$college[$i] = $coll_row->COLL_NAME;
				$country[$i] = $coll_row->CountryCode;
			}
			$i++;
		}
		if($query->num_rows() == 0)
		{
			return -1;
		}
		else
		{
			$data1['CountryCode'] = 'psych';
			$query_psycho = $this->db->get_where('STRING',$data1);
			foreach($query_psycho->result() as $row)
			{
				$psycho_string = $row->Country_String;
			}
			$data = $this->session->userdata;
			$data['psycho_string'] = $psycho_string;
			$data['club_id'] = 0;
			$rand = mt_rand(0,$i-1);
			$data['college1'] = $college[$rand];
			$data['country_code'] = $country[$rand];
			$data['user_college'] = $college;
			$data['user_country'] = $country;
			$data['coll_anscount'] = 0;
			$this->session->set_userdata($data);

			return 0;

		}


	}

	public function getUserName()
	{
		/*
			Input: 	Nothing;
			Output: logged in user's Name;
		*/

		$cid = $this->session->cid;
		$query = $this->db->get_where('users',array('id =' => $cid));
		foreach ($query->result() as $row)
		{
			$name = $row->Display_Name;
		}
		return $name;
	}

	public function auto_insertusers(){
			$query = $this->db->get('autoupdate');
			foreach ($query->result() as $row){
				$email 		= $row->email;
				$password 	= $row->password;
				$password   = md5($password);
				$phone      = $row->phone;
				$ref_email  = $row->ref_email;
				$data = array(
					'email' 	=> $email,
					'password' 	=> $password,
					'ref_email' => $ref_email,
					'phone'     => $phone,
					);
				$query = $this->db->insert('users', $data);
				if($query){
					$paramno    = $this->user_model->noquestion();
					$college1 	= $row->college1;
					$college2 	= $row->college2;
					$colldata   = $row->data_collname;
					$start      = $row->year_start;
					$end        = $row->year_end;
					$valtype    = $this->get_valtype();
					$value[0]   = $row->college_url;
					$value[1]   = $row->admission;
					$value[2]   = $row->cutoff;
					$value[3]   = $row->fee;
					$value[4]   = $row->college_type;
					for($i=0;$i<$paramno;$i++)
					{
						if($valtype[$i]==1){
							$numval[$i] = 0;
							$txtval[$i] = $value[$i];
						}
						else{
							$txtval[$i] = "";
							$numval[$i] = $value[$i];
						}
					}
					$id = $this->user_model->getcid($email);
					$data = array(
					'email'		   => $email,
					'is_logged_in' => 2,
					'cid'		   => $id,
					'college1'     => $college1,
					'college2'     => $college2,
 					);
					$this->session->set_userdata($data);
					$this->user_model->add_college_user($college1,$college2);
					$this->user_model->add_table3_user();
					$this->user_model->get_refamount($email);
					$suggest = $this->user_model->get_leastdata_college();
					for($i=0;$i<sizeof($suggest);$i++){
						if(($suggest[$i] == $college1) or ($suggest[$i] == $college2)){
							$this->user_model->inc_refamount();
						}
					}
					$this->user_model->add_table1_user($txtval,$numval,$colldata,$start,$end);
					$this->user_model->add_table2_user($txtval,$numval,$colldata);
					$this->user_model->update_table3_user();
				}
				else{

				}


			}
			return TRUE;
	}
	/*public function autoupdate(){
		$college = $this->session->college1;
		$collid = $this->user_model->get_collid($college);
		$query = $this->db->get_where('autoupdate','COLL_ID =' =>$collid);
		return $query;

	}*/

	public function get_leastdata_college(){
		$this->db->select('COLL_NAME');
		$this->db->select('COLL_ID');
		$query = $this->db->get('college');
		$i=0;
		foreach($query->result() as $row){
			$college = $row->COLL_NAME;
			$collid  = $row->COLL_ID;
			$this->db->select('SSIZE_N');
			$query1 = $this->db->get_where('table2',array('COLL_ID =' =>$collid,'PARAM_ID =' => '0'));
			foreach($query1->result() as $row){
				if($row->SSIZE_N < 3){
					$suggest[$i] = $college;
					$i++;
				}
			}
		}
		return $suggest;
	}
	public function add_table1_user($txtval,$numval,$college,$start,$end){
		$cid = $this->session->cid;
		if($college == $this->session->college1) $collvalue=1;
		else if($college == $this->session->college2) $collvalue=2;
		$valtype = $this->user_model->get_valtype();
		$value   = $this->user_model->getanswerdetails();
		$country_code = $this->session->country_code;
		$collid  = $this->user_model->get_collid($college,$country_code);
		$paramno =$this->user_model->noquestion();
		$query=$this->db->get('question');
		$i=0;
		foreach ($query->result() as $row){
			$valunit[$i]=$row->VAL_UNIT;
			$i++;
		}

		/*$college = $this->input->post('collegelist');
		$array = $this->input->post('type');
			for($i=0;$i<5;$i++)
			{
				$txtval[$i] = "";
				$numval[$i] = 0;
				$valtype[$i] = 1;
			}
			for($i=0;$i<sizeof($array);$i++)
			{
				$txtval[4].=$array[$i];
				$txtval[4].=",";
				$numval[4] = 0;
			}
			$valtype[2] = 0;
			$valtype[3] = 0;
			$txtval[0]  = $this->input->post('college_url');
			$txtval[1]  = $this->input->post('admission');
			$numval[2]  = $this->input->post('cutoff');
			$numval[3]  = $this->input->post('fee');

			$valunit[0] = 'collegeurl';
			$valunit[1] = 'exam';
			$valunit[2] = 'marks';
			$valunit[3] = 'fees per annum';
			$valunit[4] =  'degree';*/

		for($i=0;$i<$paramno;$i++)
		{
			if($valtype[$i]==0){
			$cred = $this->user_model->get_valcred($collid,$numval[$i],$i+1);
			}
			else{
				$cred = 0.5;
			}
		$data[$i] = array(
			'CID'          => $cid,
			'NA'           => 1,
			'PARAM_ID'     => $i+1,
			'COLL_ID'      => $collid,
			'VAL_TYPE'     => $valtype[$i],
			'NUM_VAL'      => $numval[$i],
			'TEXT_VAL'     => $txtval[$i],
			'NUM_VAL_UNIT' => $valunit[$i],
			'YEAR_START'   => $start,
			'YEAR_END'     => $end,
			'VAL_CRED'     => $cred
			);
		}
		$val=0;
		$x=0;
		for($i=0;$i<$paramno;$i++)
		{
			if($collvalue==1)$k=$i;
			else $k=$i+$paramno;
			if(($txtval[$i]=="" or $txtval[$i]==" ")&&$numval[$i]==0){

			}
			else{
				$query = $this->db->insert('table1', $data[$i]);
				$value[$k]=1;
			}
		}
		$data = array(
			'ANSWER' => $value
		 );
		$query = $this->db->update('table3', $data, array('CID =' => $cid));
		if($query) return TRUE;
		else return FALSE;
	}
	public function nonmucal($collid,$snode,$pnode){

			$this->db->select('VAL_DATA');
			$this->db->select('SSIZE_N');
			$this->db->get_where('table2', array( 'COLL_ID =' => $collid,
												  'S_Node  =' => $snode,
												  'P_Node  =' => $pnode));
			$i=0;
			$flag=0;
			$totalsample=0;
			foreach($query->result() as $row)
			{
				$data[$i]    = $row->VAL_DATA;
				$sample[$i]  = $row->Frequency;
				$totalsample = $totalsample + $sample[$i];
				$i++;
			}
			for($i=0;$i<$query->num_rows();$i++){
				$sov[$i] = ($sample[$i]/$totalsample)*100;
			}
			for($i=0;$i<$query->num_rows();$i++){
				if($sov[$i] < 10){
					$this->db->delete('table2',array('S_Node  =' => $snode,
													 'P_Node  =' => $pnode,
													 'COLL_ID  =' =>$collid,
													 'VAL_DATA =' =>$data[$i]));

					$flag=1;
				}
			}
			if($flag==1){
				$this->user_model->nonmucal($collid,$paramid);
			}
			else
			{
				$max = 0;
				for($i=0;$i<$query->num_rows();$i++)
				{
					if($max < $sov[$i])
					{
						$val_data = $data[$i];
					}
					//$display = $this->user_model->nondisplaycal($sample[$i],$sov[$i]);
					$data1 = array(
						'VAL_MU' => $sov[$i],
						);
						  $this->db->update('table2', $data1, array('S_Node  =' => $snode,
																	 'P_Node  =' => $pnode,
																	 'COLL_ID  =' =>$collid,
																	 'VAL_DATA =' =>$data[$i]));

				}
			}
			return $data[$i];
	}
	public function mucal($collid,$numval,$paramtype,$paramid){
		$sn = $this->user_model->get_samplesize($collid, $paramid, 0,0,0);
		if($sn!=0&&$paramtype==0){
			$this->db->select('VAL_MU');
			$query=$this->db->get_where('table2', array('PARAM_ID =' => $paramid, 'COLL_ID =' => $collid));
				foreach ($query->result() as $row)
						$mu = $row->VAL_MU;
				$mu = ((($mu * $sn) + $numval) / ($sn+1));
			}
		elseif($sn==0 && $paramtype==0	) $mu = $numval;
		else $mu=0;
		return $mu;
	}

	public function sigmacal($collid,$mu,$paramid){
			$this->db->select('NUM_VAL');
			$query=$this->db->get_where('table1',array('PARAM_ID =' =>$paramid,
													   'COLL_ID  =' =>$collid));
			$v=0;
			$n=$query->num_rows();
			if($n!=0){
			foreach ($query->result() as $row){
						$x = $row->NUM_VAL;
						$v = $v+(($x-$mu)*($x-$mu));
				}
			$x=sqrt($v/$n);
		}
		else $x=-50;
			return $x;
	}
	public function get_sovvalue($collid,$snode,$pnode){
		$this->db->select_max('VAL_MU');
		$query=$this->db->get_where('table2',array( 'COLL_ID =' => $collid,
												  	'S_Node  =' => $snode,
												  	'P_Node  =' => $pnode));

		foreach ($query->result() as $row)
						$mu = $row->VAL_MU;
		return $mu;
	}

	public function cal_ysns($collid,$node_id,$yes,$no,$flag,$adj_factor)
	{
		if($yes == 0 & $no == 0)
		{
			return 0;

		}
		else
		{
			$z_alpha_by2  = 1.96;
			$n = $yes + $no;
			if($flag==1){
				$n=$n*(1-$adj_factor); //this is leading to the increase in Cu and Cl. To be checked
			}
			$pcap = $yes/$n;
			$z_sq_alpha = ($z_alpha_by2)*($z_alpha_by2);
			$sq_value =$z_alpha_by2*sqrt(($pcap*(1-$pcap) + $z_sq_alpha/(4*$n))/$n);
			$data['min'] = ($pcap + $z_sq_alpha/(2*$n) - $sq_value)/(1+ $z_sq_alpha/$n);
			$data['max'] = ($pcap + $z_sq_alpha/(2*$n) + $sq_value)/(1+ $z_sq_alpha/$n);
			// $data1= array(
			// 	'Cu'        => $data['max'],
			// 	'Cl'       => $data['min']
			// 	);
			// if ($flag==0) {

			// 	$this->db->update('table2', $data1,array(
			// 	'COLL_ID' => $collid,
			// 	'D_Node' => $node_id,));
			// }

			if($data['min'] > 0.5 && $pcap > 0.75) $data['answer'] = 0;
			else if($data['max'] <=0.5 && $pcap < 0.25) $data['answer'] = 1;
			else $data['answer'] = -1;
			//print_r($data);
			//echo '<br>';
			return $data;

		}

	}

	/*
		To adjust the value of Cu and Cl by decreasing the sample size
		Input : collegeId,nodeId
		Output : 1 if successful
	*/		

	public function adjust_cu_cl($collegeId,$nodeId)
	{	
		/* 
			Owner: Saleel
		*/

		$query = $this->db->get_where('table2',array('D_Node'  => $nodeId,
													'COLL_ID' => $collegeId));
		foreach ($query->result() as $row) {

			// calculate Cu and Cl after changing the sample size
			$data = $this->user_model->cal_ysns($collegeId,$nodeId,$row->YES,$row->NO,1,0.1); //to be checked with Charan if the function called is correct.
			$cu = $data['max'];
			$cl = $data['min'];
			$data2=array('Cu_adjusted'=>$cu,
						'Cl_adjusted'=>$cl);
		
			//update table 2 with the adjusted values
			$this->db->update('table2',$data2,array('COLL_ID'=>$collegeId, 
													'D_Node'=>$nodeId));
		}
		return 1;
	}

	/*
		To calculate the concurrence value for every 
		user based for every node based on users answer
		Input : cu,cl,constant(k),normalization exponent
		Optput: Concurrency value 
	*/
	public function cal_concurrence($cu,$cl,$value,$k,$n,$sample){
		/*
			Owner: Charan Batchu
		*/
		//For the "yes" condition
		if($value == 1){
			$x1 = 1;
			$y1 = 1;
		}
		// for the "No" Condition
		else if($value == 2)
		{
			$x1 = 0;
			$y1 = 0;
		}

		$val = (($cu-$x1)*($cu-$x1)) + (($cl-$y1)*($cl-$y1));
		$con = $k/pow($val,1/$n);	
		
		return $con;
	}

	/*
		To calculate the concurrence value for every 
		user based for every node based on users answer
		Input : samplesize,Value,deviation,mean
		Optput: Concurrency value 
	*/
	public function cal_value_concurrence($sz,$mu,$sigma,$value)
	{
		/*
			Owner: Charan Batchu
		*/
		$k = 1; // Value may change later

		$d = 1;
		if($sz == 1)
		{	
			// d = 0 + pow(2,1) - 1
			$d = 1;
		}
		else if($sz == 2)
		{
			// d = 0+pow(2,1/2) - 1
			$d = pow(2,1/$sz) -1;
		}
		else if($sigma == 0 && $sz>=3)
		{
			$d = 1 + pow(2,1/$sz) - 1;
		}
		else
		{
			$val = ($value-$mu)/$sigma;
			$d = $val + pow(2,1/$sz) - 1;
		}

		$con = $k/$d;
		return $con;

	}

	public function cal_user_cred_val($mu,$sigma,$value,$sample,$collegeId){

		$cid = $this->session->cid;

		$query = $this->db->get_where('UserCollegestring',array('COLL_ID ='=>$collegeId,
													   			'CID ='    =>$cid));

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
		$con = $this->user_model->cal_value_concurrence($sample,$mu,$sigma,$value);

		// Calculation of user credibility for a particular college 

		$data['user_coll_cred'] = (($user_coll_cred*$answered) + ($con*1))/($answered+1);
		$data['answered'] = $answered + 1;
		$data['total_attempted'] = $total_attempted + 1;
		$data['num_ques'] =  $num_ques + 1;

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

	}

	public function cal_user_cred_mul($cred,$value,$collegeId){
		/*
			Owner: Charan Batchu
		*/
		// $value is which option is selected
		$k = 1; //Value can be changed later
		$n = 2; //normalization exponent lower n is low pass filter, higher n is high pass filter
		$opt_num = $this->session->opt_num; //TO know Num of options are there for the MUL Type Ques
		$avg_con = 0; // Intial avg conccurence score 
		$cid = $this->session->cid;
		
		$query = $this->db->get_where('UserCollegestring',array('COLL_ID ='=>$collegeId,
													   			'CID ='    =>$cid));

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

		for($i=1;$i<=$opt_num;$i++)
		{
			$cu = $cred[$i]['max'];
			$cl = $cred[$i]['min'];
			if($value == $i) $opt = 1;
			else $opt = 2;
			$con[$i] = $this->user_model->cal_concurrence($cu,$cl,$opt,$k,$n,$answered);
		}

		for($i=1;$i<=$opt_num;$i++)
		{
			$avg_con +=$con[$i]; 
		}

		$avg_con = $avg_con/$opt_num;

		// Calculation of user credibility for a particular college 

		$data['user_coll_cred'] = (($user_coll_cred*$answered) + ($avg_con*1))/($answered+1);
		$data['answered'] = $answered + 1;
		$data['total_attempted'] = $total_attempted + 1;
		$data['num_ques'] =  $num_ques + 1;

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

	}


	/*
		To calculate the user credibility based on 
		user answer for every node 
		Input: cu, cl,x1,y1,sample
		value = 1 if user answers "Yes"
		value = 2 if user answers "No"
		
		Ouput: user credibility
	*/

	public function cal_user_cred($cu,$cl,$value,$collegeId){

		/*
			Owner: Charan Batchu
		*/

		$k = 1; //Value can be changed later
		$n = 2; //normalization exponent lower n is low pass filter, higher n is high pass filter
		
		$cid = $this->session->cid;
		$query = $this->db->get_where('UserCollegestring',array('COLL_ID ='=>$collegeId,
													   			'CID ='    =>$cid));

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

		$data['user_coll_cred'] = (($user_coll_cred*$answered) + ($con*1))/($answered+1);
		$data['answered'] = $answered + 1;
		$data['total_attempted'] = $total_attempted + 1;
		$data['num_ques'] =  $num_ques + 1;

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

	}


	/*
		To apply bias based on native and alien differentiation
		Input : collegeId,nodeId
		Output : 1 if successful
	*/	

	public function apply_n_a_bias($collegeId,$nodeId)
	{	
		/* 
			Owner: Saleel
		*/

		$query = $this->db->get_where('flags',array('COLL_ID'=>$collegeId,
											'NODE_ID'=>$nodeId));
		$native = 0;
		$alien = 0;
		foreach ($query->result() as $row) {
			
			if ($row->N_A==0) {
				//the flag is native
				$native++;
			}
			else{
				// the flag is alien
				$alien++;
			}
		}
			$priority=0; //to check which category the flag belongs to. 
							//1 for a combination of native and alien, 2 for alien alone, and 3 for native alone.

		if($alien!=0&&$native!=0){
			$priority=1;
			
		}
		elseif ($alien!=0) {
			$priority=3;

		}
		elseif($native!=0){
			$priority=2;
		}
		//formula_or_function($nodeId,$native,$alien) to be called as per bias provided-> mentioned in guidance 1
		//formula($priority) to be implemented and called here->mentioned in guidance 2
		return 1;
	}


	public function nonparamcredcal($collid,$snode,$pnode){
		$c0 = 0;
		$c1 = 0.5;
		$t  = 4.5;
		$a0 = 0.5;
		$b0 = 0.5;
		$b1 = 1;
		$sov = $this->user_model->get_sovvalue($collid,$snode,$pnode);
		$sov = $sov/100;
		$s = $this->user_model->get_samplesize($collid,$pnode,0,-1,$snode);
		$s = $s - 1;
		$cmax = $c0 + 1 - ($c1*exp(-$s/$t));
		$cred = $a0 + ($cmax - $b0)*sin((M_PI_2)*((2*$sov)-$b1));
		$display=$this->user_model->nondisplaycal($cred);
		//$paramcred = 0.5;
		$data1 = array(
						'PARAM_CRED' => $cred,
						'CRED_PARAM_DISP' => $display
						);
		$this->db->update('table2', $data1, array( 'COLL_ID =' => $collid,
												  	'S_Node  =' => $snode,
												  	'P_Node  =' => $pnode));
		return $data1;
	}
	public function paramcredcal($collid,$snode,$pnode){
		$this->db->select('CID');
		$this->db->select('VAL_CRED');
		$query=$this->db->get_where('table1',array('COLL_ID =' => $collid,
												  	'S_Node  =' => $snode,
												  	'P_Node  =' => $pnode));
		$paramcred = 0;
		$i=0;
		foreach ($query->result() as $row)
		{
			$cid = $row->CID;
			$valcred = $row->VAL_CRED;
			$cidcred = $this->user_model->get_cidcred($cid);
			$val = $valcred * $cidcred ;
			$paramcred = $paramcred + $val;
			$i++;
		}
		$paramcred = $paramcred/(0.5*$i);
		if($query->num_rows()==1) $paramcred = 0.5;
		$data1 = array(
						'PARAM_CRED' => $paramcred
						);
		$this->db->update('table2', $data1, array( 'COLL_ID =' => $collid,
												  	'S_Node  =' => $snode,
												  	'P_Node  =' => $pnode));
		return TRUE;

	}


	public function displaycal($sample,$mu,$si){
		if($sample>=3 && $sample<=5 && $si<=(($mu*10)/100)) return 1;
		else if($sample>=5 && $sample<=10 && $si<=(($mu*25)/100)) return 1;
		else if($sample>=10 && $si<=(($mu*15)/100)) return 1;
		else return 0;
	}
	public function nondisplaycal($cred){
		if($cred >= 0.7) return 1;
		else return 0;

	}
	public function add_table2_user($txtval,$numval,$college){
		$cid = $this->session->cid;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$param_type = $this->get_valtype();
		$paramno    = $this->user_model->noquestion();
		/*for($i=0;$i<5;$i++)
			{
				$txtval[$i] = "";
				$numval[$i] = 0;
				$param_type[$i] =1;
			}
			$array = $this->input->post('type');
			for($i=0;$i<sizeof($array);$i++)
			{
				$txtval[4].=$array[$i];
				$txtval[4].=",";
				$numval[4] = 0;
			}
			$param_type[2] = 0;
			$param_type[3] = 0;
			$college = $this->input->post('collegelist');
			$txtval[0]  = $this->input->post('college_url');
			$txtval[1]  = $this->input->post('admission');
			$numval[2]  = $this->input->post('cutoff');
			$numval[3]  = $this->input->post('fee');*/

	for($i=0;$i<$paramno;$i++)
	{
		if(($txtval[$i]=="" or $txtval[$i] == " ") && $numval[$i]==0){

		}
		else
		{
			$sn = $this->user_model->get_samplesize($collid,$i+1,$param_type[$i],$txtval[$i],0);
			//$display = $this->user_model->get_paramdisplay($collid,$i+1,$param_type[$i],$txtval[$i]);
			if($param_type[$i]==1){
				$mu = 0;
				$si = 0;
			}
			else{
				$mu = $this->user_model->mucal($collid,$numval[$i],$param_type[$i],$i+1);
				$si = $this->user_model->sigmacal($collid,$mu,$i+1);
				//$display = $this->user_model->displaycal($sn+1,$mu,$si);
			}
			$data= array(
				'COLL_ID'        => $collid,
				'PARAM_ID'       => $i+1,
				'PARAM_TYPE'     => $param_type[$i],
				'SSIZE_N'      	 => $sn+1,
				'SSIZE_A'     	 => 0,
				'VAL_MU'	 	 => $mu,
				'VAL_SIGMA'  	 => $si,
				'VAL_DATA'	     => $txtval[$i],
				'VAL_PARAM_DISP' => 0,
				'CRED_PARAM_DISP'=> 1,
				'NA'             => 1,
				'YEAR_DEPENDENT' => 0,
				);
			if($sn==0) {
				$query = $this->db->insert('table2', $data);
			}
			else{
				if($param_type[$i]==0){
				$query = $this->db->update('table2', $data, array('COLL_ID =' => $collid,'PARAM_ID =' => $i+1 ));
				}
				else{
				$query = $this->db->update('table2', $data, array('COLL_ID   =' => $collid,
																  'PARAM_ID  =' => $i+1,
																   'VAL_DATA =' => $txtval[$i]));
				}
			}
			if($param_type[$i]==1){
				$this->user_model->nonmucal($collid,$i+1,$numval[$i]);
				$this->user_model->nonparamcredcal($collid,$i+1);
			}
			else{
				$this->user_model->paramcredcal($collid,$i+1);
			}
		}

	}
	return TRUE;
	}
	public function get_questionweight(){
		$this->db->select('PARAM_WEIGH');
		$query=$this->db->get('question');
		$i=0;
		foreach ($query->result() as $row){
			$weight[$i]=$row->PARAM_WEIGH;
			$i++;
		}
		return $weight;
	}
	public function get_cidcred($cid){
		$this->db->select('CID_CRED');
		$query = $this->db->get_where('table3', array('CID =' => $cid));
		foreach ($query->result() as $row)
				$cidcred = $row->CID_CRED;
		if($query->num_rows())
			return $cidcred;
		else
			return 0;

	}
	public function get_paramcred($paramid,$coll) {
		$paramno = $this->user_model->noquestion();
		if ($coll<$paramno) {
			$collname = $this->session->college1;
			}
		else{
			$collname = $this->session->college2;
		}
			$country_code = $this->session->country_code;
			$collid = $this->get_collid($collname,$country_code);
			$this->db->select('PARAM_CRED');
			$query = $this->db->get_where('table2',array('PARAM_ID =' =>$paramid,
													     'COLL_ID  =' =>$collid));
			foreach($query->result() as $row)
				$paramcred = $row->PARAM_CRED;
			return $paramcred;
	}
	public function get_incen(){
		$value = $this->user_model->getanswerdetails();
		$paramno = $this->user_model->noquestion();
		$weight =$this->user_model->get_questionweight();
		$incen = 0;
		for($i=0;$i<2*$paramno;$i++){
			$j = $i%$paramno;
			if($value[$i]!=0) {
				$paramcred=$this->user_model->get_paramcred($j+1,$i);
				$incen = $incen + $value[$i]*($weight[$j]/100)*(1-$paramcred)*2;
			}
		}
		$incen = 50*$incen;
		return $incen;
	}
	public function get_cred($incen){
		$cred = $incen/(100*2);
		return $cred;
	}
	public function update_table3_user(){
		$cid = $this->session->cid;
		$incen = $this->get_incen();
		$cred  = $this->user_model->get_cred($incen);
		if($incen >=200) $incen = 200;
		$data = array(
				'INCEN' => $incen,
				'CID_CRED' => $cred,
				'INCEN_FROZEN' => 1,
				);
		$query = $this->db->update('table3', $data, array('CID =' => $cid));
		return TRUE;
	}
	public function add_table3_user(){
		$cid = $this->session->cid;
		$email = $this->session->email;
		//$incen = $this->get_incen();
		//$cred  = $this->user_model->get_cred($incen);
		$incen=0;
		//$cred=0;
		$data = array(
			'CID'          => $cid,
			'NA'  	       => 1,
			'INCEN'    	   => $incen,
			'CID_NAME' 	   => $email,
			'INCEN_FROZEN' => 0,

		 );
		$query = $this->db->insert('table3', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function is_key_valid($key){

		$this->db->where('key', $key);
		$query = $this->db->get('temp_users');
		if($query->num_rows() == 1){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function is_otp_valid($otp){
		$this->db->where('otp', $otp);
		$query = $this->db->get('temp_users');
		if($query->num_rows() == 1){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	public function add_users($key){
		$this->db->where('key',$key);
		$query = $this->db->get('temp_users');
		if($query){
			$row = $query->row();

			$data = array(
				 'email'	 => $row->email,
				 'password'  => $row->password,
				 'phone'     => $row->phone,
				 'ref_email' => $row->ref_email,
				);
			$query1 = $this->db->insert('users', $data);
			if($query1){
			$this->db->where('key',$key);
			$this->db->delete('temp_users');
			}
			return $data['email'];
		}else{
			return false;
		}
	}
	public function add_email_users($email,$name)
	{
		$this->db->where('email',$email);
		$query = $this->db->get('temp_users');
		if($query){
			$row = $query->row();

			$data = array(
				 'email'	 => $row->email,
				 'password'  => $row->password,
			//	 'phone'     => $row->phone,
				 'ref_email' => $row->ref_email,
				 'Display_Name' => $name
				);
			$query1 = $this->db->insert('users', $data);
			if($query1){
			$this->db->where('email',$email);
			$this->db->delete('temp_users');
			}
			return $data['email'];
		}else{
			return false;
		}
	}
	public function add_otp_users($otp){
		$this->db->where('otp',$otp);
		$query = $this->db->get('temp_users');
		if($query){
			$row = $query->row();

			$data = array(
				 'email'    => $row->email,
				 'password' => $row->password,
				 'phone'    => $row->phone,
				 'ref_email'=> $row->ref_email
				);

			$query1 = $this->db->insert('users', $data);
			if($query1){
			$this->db->where('otp',$otp);
			$this->db->delete('temp_users');
			}
			return $data['email'];
		}else{
			return false;
		}
	}
	public function viewdetails(){
		$mail = $this->session->email;
		$this->db->select('INCEN');
		$query = $this->db->get_where('table3', array('CID_NAME =' => $mail));
		foreach ($query->result() as $row)
				$incen = $row->INCEN;
		if($query->num_rows())
			return $incen;
		else
			return 0;
	}
	public function getcid($email){
		$this->db->select('id');
		$query = $this->db->get_where('users', array('email =' => $email));
		foreach ($query->result() as $row)
			   	$cid= $row->id;
	    if($query) return $cid;
	    else return FALSE;
	}
	public function getpreschool(){
		$cid = $this->session->cid;
		$this->db->select('SCHOOL');
		$query = $this->db->get_where('table4', array('CID =' => $cid));

		foreach ($query->result() as $row)
			   	$school= $row->SCHOOL;
		if($query->num_rows())
			{
				$this->db->select('VIEW_OR_INPUT');
				$query1 = $this->db->get_where('table4', array('CID =' => $cid));
				foreach ($query1->result() as $row)
			   		$view= $row->VIEW_OR_INPUT;
			   $school = $school * $view;
				return $school;
			}
		else{
			//$college = $this->session->college1;
			//$collid = $this->user_model->get_collid($college);
			return 0;
		}
	}
	public function add_table4_user($college){
		$preschool = $this->user_model->getpreschool();
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		//$school = 0;
		if($preschool<0){
		$preview = -1;
		$preschool = -1 * $preschool;
		}
		$preview = -1;
		$view = -1;
		$data = array(
			'CID' 				 => $this->session->cid,
			'CID_SESSION_ID' 	 => $this->session->__ci_last_regenerate,
			'PRE_SCHOOL' 		 => $preschool,
			'SCHOOL'			 => $collid,
			'PRE_VIEW_OR_INPUT'  => $preview,
			'VIEW_OR_INPUT'      => $view
			);
		$query = $this->db->insert('table4', $data);
		if($query) return TRUE;
		else return FALSE;
	}

  // To get country  from country table
	public function get_country($country_code)
	{
    	$query = $this->db->get_where('Country',array('Country_Code =' => $country_code ));
    	foreach ($query->result() as $row)
    	{
    		$country_name = $row->Country_Name;
    	}
    	return $country_name;
	}

 // TO get bit string using country and global from STRING table
	public function get_finalstring($countrycode)
	{
		$query1 = $this->db->get_where('STRING', array('CountryCode =' => 'Int'));
		foreach ($query1->result() as $row)
		{
			$global_string = $row->Country_String;
		}

		$query = $this->db->get_where('STRING', array('CountryCode =' => $countrycode));
		foreach ($query->result() as $row)
		{
			$country_string = $row->Country_String;
  		}

  		if($query->num_rows() == 0)
  		{
			$data['CountryCode']    = $countrycode;
			$data['Country_String'] = $global_string;
			$country_string = $global_string;
			$this->db->insert('STRING',$data);
  		}
  		else
  		{
  			$size = strlen($country_string);
	  		for($i=0;$i<$size;$i++)
			{
	  			$country_string[$i] = $country_string[$i] & $global_string[$i];
			}
  		}
		return $country_string;
	}

	public function get_nodeanswer()
	{
		$cid = $this->session->cid;
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$query = $this->db->get_where('UserCollegestring', array('CID ='  => $cid,
																 'COLL_ID'=> $collid));
		foreach ($query->result() as $row){
			$node_answer = $row->Bit_String;
		}
		return $node_answer;
	}

	public function get_question($question_id)
	{
		$query_question = $this->db->get_where('QUESTIONTABALE', array('Q_ID =' => $question_id));
		foreach ($query_question->result() as $row){
			$question = $row->Q_Text;
			$opt_num  = $row->Option_Num;
			$unit_flag = $row->unit_flag;
			for($j=0;$j<$opt_num;$j++){
				if($j==0) $option[$j] = $row->Op1;
				else if($j==1) $option[$j] = $row->Op2;
				else if($j==2) $option[$j] = $row->Op3;
				else if($j==3) $option[$j] = $row->Op4;
				else if($j==4) $option[$j] = $row->Op5;
				else if($j==5) $option[$j] = $row->Op6;
				else if($j==6) $option[$j] = $row->Op7;
				else if($j==7) $option[$j] = $row->Op8;
				else if($j==8) $option[$j] = $row->Op9;
				else if($j==9) $option[$j] = $row->Op10;
			}
			$user_tags = $row->User_Tags;
			$coll_tags = $row->Coll_Tags;
			$user_content = $row->User_Content;
			$coll_content = $row->Coll_Content;
			
		}
		if($query_question->num_rows()==0)
		{
			return array('opt_num' => -1);
		}
		if($opt_num == 0)
		{
			return array('question' => $question,
			       	     'opt_num'  => $opt_num,
						 'unit_flag' => $unit_flag);
		}
		else
		{
			return array('question' 	=> $question,
			       	 	'option'   		=> $option,
			       	 	'opt_num'  		=> $opt_num,
						'unit_flag'     => $unit_flag,
			       	 	'user_tags'		=> $user_tags,
			       	 	'coll_tags'		=> $coll_tags,
			       	 	'user_content'	=> $user_content,
			       	 	'coll_content'	=> $coll_content);
			
		}
	}
	public function get_options($option,$opt_num)
	{
		for($i=0;$i<$opt_num;$i++){
			$query_options = $this->db->get_where('OPTIONTABLE', array('OP_ID =' => $option[$i]));
			foreach ($query_options->result() as $row){
				$option_content[$i] = $row->OP_Text;
			}
		}
		return $option_content;
	}

	public function get_validstring()
	{
		$cid = $this->session->cid;
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		//echo $cid.'<br>'.$college.'<br>'.$country_code.'<br>';
		$collid = $this->user_model->get_collid($college,$country_code);
		$query = $this->db->get_where('UserCollegestring', array('CID ='  => $cid,
																 'COLL_ID'=> $collid));
		foreach ($query->result() as $row){
			$valid_string = $row->Valid_String;
		}
		return $valid_string;

	}
	public function check_biasnode($node_id,$pos)
	{
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$query =$this->db->get_where('table2',array('D_Node ='  => $node_id,
													'COLL_ID =' => $collid));
		//echo $node_id;
		//echo $collid;
		if($query->num_rows() == 0)
		{
			return 0;
		}
		else
		{
			foreach($query->result() as $row)
			{
				$cred = $row->PARAM_CRED;
				$type = $row->Node_Type;
				$val = 0;
				if($type == 'MUL_VAL')
				{
				 	$data2['0'] = $row->Op1;
					$data2['1'] = $row->Op2;
					$data2['2'] = $row->Op3;
					$data2['3'] = $row->Op4;
					$data2['4'] = $row->Op5;
					$data2['5'] = $row->Op6;
					$data2['6'] = $row->Op7;
					$data2['7'] = $row->Op8;
					$data2['8'] = $row->Op9;
					$data2['9'] = $row->Op10;
					$sample = 0;
					for($i=0;$i<10;$i++)
					{
						$sample = $sample + $data2[$i];
						if($val < $data2[$i])
						{
							$childnum = $i+1;
							$val = $data2[$i];
						}
					}
				}
				else if($type == 'YNNS')
				{
					$data2['0'] = $row->YES;
					$data2['1'] = $row->NO;
					$data2['2'] = $row->NS;
					$cred_yn = $this->user_model->cal_ysns($collid,$node_id,$data2[0],$data2[1],0,0);
					$sample = 0;

					for($i=0;$i<3;$i++)
					{
						if($val < $data2[$i])
						{
							$childnum = $i+1;
							$val = $data2[$i];
						}
						if($i!=2) $sample = $sample + $data2[$i];

					}
				}
				//echo $childnum.'<br>';
			}
			if($cred_yn['answer'] != -1)
			//if($cred > 0.9) // depends on the algorithm
			{
				if($cred_yn['answer'] == 0)
				{
					if($cred_yn['min'] > 0.5 && $cred_yn['min'] <= 0.6)
					{
						$cred_per = 75;
					}
					else if($cred_yn['min'] > 0.6 && $cred_yn['min'] <= 0.75)
					{
						$cred_per = 85;
					}
					else if($cred_yn['min'] > 0.75)
					{
						$cred_per = 95;
					}
				}
				else
				{
					if($cred_yn['max'] < 0.5 && $cred_yn['max'] >= 0.4)
					{
						$cred_per = 75;
					}
					else if($cred_yn['max'] < 0.4 && $cred_yn['max'] >= 0.25)
					{
						$cred_per = 85;
					}
					else if($cred_yn['max'] < 0.25)
					{
						$cred_per = 95;
					}

				}
			}
			else
			{
				//$sample = $data2[0] + $data2[1];
				if( $sample >= 50 && $sample < 80)
				{
					$cred_per = 90;
				}
				else if($sample >=80)
				{
					$cred_per = 98;
				}
				else
				{
					$cred_per = 0;
				}
			}

				$rand = mt_rand(1,100);
				//echo $cred_per;
				if($rand >= $cred_per)
				{
					//echo 'charan';
					return 0;
				}
				else
				{
					$answer_node = $this->user_model->get_nodeanswer();
					$valid_string = $this->user_model->get_validstring();
					$answer_node[$pos] = 0;
					$data['CID'] = $this->session->cid;
					$data['NA']  = 1;
					$data['S_Node'] = $node_id;
					$data['COLL_ID']= $collid;
					$cid = $data['CID'];
					$this->db->insert('Bias_Table1',$data);
					$data = $this->user_model->get_childnode($node_id);
					$child_options = $data['child_options'];
					$child_node    = $data['child_node'];
					$child_tier    = $data['child_tier'];
					//echo
					for($i=0;$i<sizeof($child_options);$i++)
					{


						$childnode = $child_node[$i];
						$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $childnode));
						foreach ($node_query->result() as $row)
						{
							$childnode = $row->Node_Pos;
						}
						if($childnum == $child_options[$i])
						{
							$valid_string[$childnode] = 1;
							$answer_node[$childnode] = 0;

						}
						else if($answer_node[$childnode] == 1 )
						{
							$answer_node[$childnode] = 0;
							$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $childnode));
							foreach ($node_query->result() as $row)
							{
								$childnode1 = $row->Node_ID;
							}
							$answer_node = $this->user_model->changebit($childnode1,$answer_node);
						}
					}
					$data4 = array(
							'Bit_String'   => $answer_node,
							'Valid_String' => $valid_string
							);
					//echo $cid;
					//echo $collid;
					$query = $this->db->update('UserCollegestring', $data4, array('CID ='     => $cid,
																				 'COLL_ID =' => $collid));
					//echo $answer_node;
					//echo '<br>';
					//echo $valid_string;
					$data = $this->session->set_userdata;
					$data['answer_string'] = $answer_node;
					$this->session->set_userdata($data);
					return 1;
				}

		}


	}
	public function get_parentnodes($nodeid,$value)
	{
		$query = $this->db->get_where('NODETABLE',array('Node_ID ='=> $nodeid));
		foreach($query->result() as $row)
		{
			$node_id = $row->Prev_Node;
			$node_name = $row->Node_Name;
			$node_name = str_replace('Yes_', "", $node_name);
			if($node_id == 0)
			{
				$parent_name[$value] = $node_name;
 				return $parent_name;
			}
			else
			{
				$parent_name = $this->user_model->get_parentnodes($node_id,$value+1);
				$parent_name[$value] = $node_name;
				return $parent_name;
			}
			return $parent_name;
		}
	}
	public function get_nodequestion()
	{
		$final_string = $this->session->answer_string;
		$psycho_string = $this->session->psycho_string;
		$size = strlen($final_string);
		$y = 0;

		for($i=0;$i<$size;$i++)
		{
			$final_string = $this->session->answer_string;
			

			if($final_string[$i] == 1 && $psycho_string[$i] == 0 )
			{
				$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $i));
				foreach ($node_query->result() as $row)
				{
					$id = $row->Node_ID;
				}
				/*
					temporarly disabling the throttling and use it later 
					Change the value of -100 to 1 to activate the function
				*/
				if($this->user_model->check_biasnode($id,$i) == -100)
				{

				}
				else
				{
					$query = $this->db->get_where('NODETABLE', array('Node_ID =' => $id));
					foreach ($query->result() as $row)
					{
						$prev_node = $row->Prev_Node;
						$node_type = $row->Node_Type;
						$question_id = $row->Trigger_Ques;
						$club_id = $row->Club_ID;
					}
					if($club_id != 0)
					{
						// club questions
					
						$ques_id = $question_id ;
						$this->db->select('*');
						$this->db->from('NODETABLE');
						$this->db->join('Node_Position','NODETABLE.Node_ID = Node_Position.Node_ID');
						$this->db->join('Club_Questions','NODETABLE.Club_ID = Club_Questions.Club_ID');
						$this->db->where('NODETABLE.Club_ID =', $club_id);
						$this->db->where('Node_Pos >=', $i);
						$club_query = $this->db->get();
						$i=1;
						$num_rows = $club_query->num_rows();
						/*if($num_rows < 3)
						{
							$data = $this->get_question($question_id);
							$question = $data['question'];
							$opt_num  = $data['opt_num'];
							if($node_type == "Decision")
							{
								$option   = $data['option'];
								$option_content = $this->user_model->get_options($option,$opt_num);
							}
							else if($node_type = "Structural")
							{
								$option_content[0] = 0;
							}
							$parent = $this->user_model->get_parentnodes($id,0);
							$data = $this->session->set_userdata;
							$data['opt_num'] = $opt_num;
							$data['option_content'] = $option_content;
							$data['parent'] = $parent;
							$this->session->set_userdata($data);
							return array('question' => $question,
								 		 'option_content' => $option_content,
								 		 'opt_num' => $opt_num);


						}
						else
						{*/
							//if($num_rows >= 5) $opt_num = 6;
							//else $opt_num = $num_rows + 1;
							$option_content[0] = 'checkbox';

							$limit=10; //set the limit here. limit 10 means a maximum of 9 questions per page
							$page=1; //initialize the total no of pages to 1

							// $curr_page=1;
							// $branchicons=array();
							foreach ($club_query->result() as $row)
							{
								$question_id = $row->Club_QID;
								$node =  $row->Node_ID;
								$position = $row->Node_Pos;
								$prv = $row->Prev_Node;
								// print_r($limit);
								$page_query = $this->db->get_where('NODETABLE',array('Prev_Node =' 	=> $prv,
													  'Club_ID ='		=> $club_id));
								$pageq=$page_query->num_rows();

								if (($pageq/9)>1)
								{
									$page=ceil($pageq/9); //calculate the total no of pages
								}
								if($this->user_model->check_biasnode($node,$position) != 1 && $i<$limit)
								{
									$this->db->select('*');
									$child_query = $this->db->get_where('NODETABLE',array('Prev_Node =' 	=> $node,
																		   				  'Trigger_AnsOp =' => 1));
									$this->db->select('Node_Name');
									$limit_query = $this->db->get_where('NODETABLE',array('Prev_Node =' 	=> $prv,
																						  'Club_ID ='		=> $club_id));
									$limit=$limit_query->num_rows();
									$limit++;
									if($limit>10){
										$limit=10;//if there are more questions than limit reset limit. Else limit can be less than that if there are less questions
									}

									foreach ($child_query->result() as $child_row)
									{
										$node_name = $child_row->Node_Name;
										$icon_id = $child_row->Icon_ID;
										if($icon_id!=NULL)
										{
											$branchicons[$i] = strval($icon_id); //fetch branch icons
											// $option_content[$i] = $branchicons[$i];
										}

										$option_content[$i] = ucwords(str_replace('Yes_', "", $node_name)); //set option content 

										$i++;
									}

								}

							}
							$data = $this->session->set_userdata;
							if($this->session->club_id == $club_id)
							{
								//if the previous club id and the current club id are the same
								$curr_page_no= $this->session->page_no;
							}
							else
							{
								//reset the page no
								$data['page_no'] = 1;
								$curr_page_no = 1;
							}

							//make the page number in the format "1 of 2"
							$page_display = strval($curr_page_no)." of ".strval($page);
				
						//TO show the parent node in the questions
						$parent = $this->user_model->get_parentnodes($id,0);
						$prev_ques = $this->session->ans_qid;
						if($prev_ques != $question_id && $i < $limit)
						{
							$data = $this->get_question($ques_id);
							$question = $data['question'];
							$opt_num  = $data['opt_num'];
							$unit_flag = $data['unit_flag'];
							if($node_type == "Decision")
							{
								$option   = $data['option'];
								$option_content = $this->user_model->get_options($option,$opt_num);
							}
							else if($node_type = "Structural")
							{
								$option_content[0] = 0;
							}
							$parent = $this->user_model->get_parentnodes($id,0);
							$parent_node = $this->session->prev_node;
							$data['q_id'] = $ques_id;
							$data['opt_num'] = $opt_num;
							$data['option_content'] = $option_content;
							$data['branchicons'] = $branchicons;
							// echo $branchicons;
							$data['page_num'] = $page_display;
							$data['parent'] = $parent;
							$data['temp_prevnode'] = $prev_node;
							$data['club_id'] = $club_id;
							$this->session->set_userdata($data);

							if($parent_node != $prev_node)
							{
								$data['ques_flag'] = 1;
							}
							else
							{
								$data['ques_flag'] = 0;
							}
							$this->session->set_userdata($data);
							return array('question' => $question,
								 		 'option_content' => $option_content,
								 		 'opt_num' => $opt_num,
										 'unit_flag' => $unit_flag,
								 		 'branchicons' => $branchicons,
								 		 'page_num' =>  $page_display);


						}
						else
						{
							$data2 = $this->get_question($question_id);
							$question = $data2['question'];
							$unit_flag = $data['unit_flag'];
							$parent_node = $this->session->prev_node;
							if($parent_node != $prev_node)
							{
								$data['ques_flag'] = 1;

							}
							else
							{
								$data['ques_flag'] = 0;
							}
							if($i==6) $opt_num = $i;
							else $opt_num = $i;
							$data['q_id'] = $question_id;
							$data['prev_node'] = $parent_node;
							$data['club_id'] = $club_id;
							$data['opt_num'] = $i + 1;
							$data['option_content'] = $option_content;
							$data['branchicons'] = $branchicons;
							$data['parent'] = $parent;
							$data['temp_prevnode'] = $prev_node;
							$this->session->set_userdata($data);
							//return $data;
							return array('question' => $question,
								 		 'option_content' => $option_content,
								 		 'branchicons' => $branchicons,
								 		 'opt_num' => $opt_num,
										 'unit_flag' => $unit_flag,
								 		 'page_num' =>  $page_display);

						}

					}
					else
					{
						$data2 = $this->get_question($question_id);
						$question = $data2['question'];
						$opt_num  = $data2['opt_num'];
						$unit_flag = $data['unit_flag'];

						if($node_type == "Decision")
						{
							$option   = $data['option'];
							$option_content = $this->user_model->get_options($option,$opt_num);
						}
						else if($node_type = "Structural")
						{
							$option_content[0] = 0;
						}
						$data = $this->session->set_userdata;
						$parent_node = $this->session->prev_node;
						if($parent_node != $prev_node)
						{
							$data['ques_flag'] = 1;

						}
						else
						{
							$data['ques_flag'] = 0;
						}
						$parent = $this->user_model->get_parentnodes($id,0);
						$data['prev_node'] = $parent_node;
						$data['q_id'] = $question_id;
						$data['opt_num'] = $opt_num;
						$data['option_content'] = $option_content;
						$data['parent'] = $parent;
						$data['temp_prevnode'] = $prev_node;
						$this->session->set_userdata($data);
						return array('question' => $question,
							 		 'option_content' => $option_content,
							 		 'branchicons' => $branchicons,
							 		 'opt_num' => $opt_num,
									 'unit_flag' => $unit_flag,
								 	 'page_num' =>  $page_display);
					}
				}
			}
		}
		return array('question' => -1);
	}

	public function get_childnode($node_id)
	{
		$query = $this->db->get_where('NODETABLE', array('Prev_Node =' => $node_id));
		$i=0;
		$rows = $query->num_rows();
		if($rows == 0 )
		{
			$child_options[$i] 	= 0;
			$child_node[$i] 	= 0;
			$child_tier 		= 0;
			$child_name[$i]		= 0;
			$child_ques[$i] 	= 0;
			$child_ansop[$i] 	= 0;
			$child_nodetype[$i] = 0;
		}
		else{
			foreach ($query->result() as $row){
				$child_options[$i] 	= $row->Trigger_AnsOp;
				$child_node[$i]		= $row->Node_ID;
				$child_tier 		= $row->Node_Tier;
				$child_name[$i] 	= $row->Node_Name;
				$child_ques[$i] 	= $row->Trigger_Ques;
				$child_ansop[$i]	= $row->Trigger_AnsOp;
				$child_nodetype[$i] = $row->Node_Type;
				$i++;
			}
		}
		return array('child_options' => $child_options,
					  'child_node'   => $child_node,
					  'child_tier'   => $child_tier,
					  'child_name'   => $child_name,
					  'child_ques'   => $child_ques,
					  'child_ansop'  => $child_ansop,
					  'child_nodetype'=>$child_nodetype);

	}

	public function get_attrchildnode($node_id)
	{
		$query = $this->db->get_where('AttributeNodeTable', array('Prev_Node =' => $node_id));
		$i=0;
		$rows = $query->num_rows();
		if($rows == 0 )
		{
			$child_options[$i] 	= 0;
			$child_node[$i] 	= 0;
			$child_tier 		= 0;
			$child_name[$i]		= 0;
			$child_ques[$i] 	= 0;
			$child_ansop[$i] 	= 0;
			$child_nodetype[$i] = 0;
		}
		else{
			foreach ($query->result() as $row){
				$child_options[$i] 	= $row->Trigger_AnsOp;
				$child_node[$i]		= $row->Node_ID;
				$child_tier 		= $row->Node_Tier;
				$child_name[$i] 	= $row->Node_Name;
				$child_ques[$i] 	= $row->Trigger_Ques;
				$child_ansop[$i]	= $row->Trigger_AnsOp;
				$child_nodetype[$i] = $row->Node_Type;
				$i++;
			}
		}
		return array('child_options' => $child_options,
					  'child_node'   => $child_node,
					  'child_tier'   => $child_tier,
					  'child_name'   => $child_name,
					  'child_ques'   => $child_ques,
					  'child_ansop'  => $child_ansop,
					  'child_nodetype'=>$child_nodetype);

	}

	public function update_nodevalue($answer_node)
	{
		/*
		to update the answernode in userbitstring Table
		Input  : answerbitstring
		Output : NULL
		*/
		$cid = $this->session->cid;
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$data = array('Bit_String' => $answer_node);
		$query = $this->db->update('UserCollegestring',$data, array('CID ='  => $cid,
																    'COLL_ID'=> $collid));
		return ;
	}

	public function get_tiernode($node_tier)
	{
		$query_node = $this->db->get_where('NODETABLE', array('Node_Tier =' => $node_tier));
		$i=0;
		foreach ($query_node->result() as $row)
		{
			$tier_node[$i] = $row->Node_ID;
			$i++;
		}
		return $tier_node;
	}



	public function changebit($node_id,$answernode){
		/*
		To change the bitstring values to '0' recursively
		input: node_id
		output: Nothing
		*/
		$query = $this->db->get_where('NODETABLE', array('Prev_Node =' => $node_id));
		$i = $query->num_rows();
		$j=0;
		foreach ($query->result() as $row){
			$child_node[$j] = $row->Node_ID;
			$j++;
		}
		if($i==0)
		{
			$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $node_id));
			foreach ($node_query->result() as $row)
			{
				$id = $row->Node_Pos;
			}
			$answernode[$id] = 0;
			return $answernode;
		}
		else
		{
			for($j=0;$j<sizeof($child_node);$j++){
					$answernode = $this->user_model->changebit($child_node[$j],$answernode);
					$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $node_id));
					foreach ($node_query->result() as $row)
					{
						$id = $row->Node_Pos;
					}
					$answernode[$id] = 0;

			}
			return $answernode;
		}
		return $answernode;
	}

	public function get_nodecred($sample,$mu,$si,$numval)
	{
		if ($si ==0 ) return 0.5;
		$z[0] = 3.090232;
		$z[1] = 2.878162;
		$z[2] = 2.575829;
		$z[3] = 2.326348;
		$z[4] = 2.053749;
		$z[5] = 1.644854;
		$z[6] = 1.281552;
		$z[7] = 0.841621;
		$z[8] = 0.000000;
		$a[0] = 0.001 ;
		$a[1] = 0.002;
		$a[2] = 0.005;
		$a[3] = 0.01;
		$a[4] = 0.02;
		$a[5] = 0.05;
		$a[6] = 0.10;
		$a[7] = 0.20;
		$a[8] = 0.50;
		$k = ($numval-$mu)/$si;
		if($k < 0 ) $k = -1 * $k;
		for($i=0;$i<9;$i++){
			if($k >= $z[$i]){
					$norm = $a[$i];
					break;
				}
			}
		//if($cred!=1) $cred =$k;
		if($sample<=5)
		{
			$cred = 0.5 + (0.5 - 2*ABS(0.5 -$norm))/(6-$sample);

		}
		else
		{
			$cred = 0.5 + (0.5 - 2*ABS(0.5 - $norm));
		}
		return $cred;
	}


	public function update_nodeanswer($option)
	{
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$num_value = 0;
		if($option == -1)
		{
			$ans = $this->input->get('ans');
			//echo $ans;
			$num_value = $option;  // TO insert value for decision nodes
			$option = $option + 1;

		}

		$value  = $option + 1; //As option0 is option1 in options table
		$answer_node = $this->user_model->get_nodeanswer();
	//	echo 'answer_string: '.$answer_node.'<br>';
		$valid_string = $this->user_model->get_validstring();
		$psycho_string = $this->session->psycho_string;
	//	echo 'valid_string: '.$valid_string.'<br>';
		for($i=0;$i<strlen($answer_node);$i++)
		{
			if($answer_node[$i] == 1 && $psycho_string[$i] == 0 )
			{
				$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $i));
				foreach ($node_query->result() as $row)
				{
					$id = $row->Node_ID;
				}
				$node_id = $id;
				break;
			}
		}
		$answer_node[$i] = 0;
		$data = $this->user_model->get_childnode($node_id);
		$node_name = $this->session->parent;
		//print_r($node_name);
		//print_r($data);
		//echo '<br>';
		$child_options = $data['child_options'];
		$child_node    = $data['child_node'];
		$child_tier    = $data['child_tier'];
		$child_name    = $data['child_name'];
		for($i=0;$i<sizeof($child_options);$i++)
		{
				$childnode = $child_node[$i];
				$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $childnode));
				foreach ($node_query->result() as $row)
				{
					$childnode = $row->Node_Pos;
				}
				if($value == $child_options[$i])
				{
					$answer_node[$childnode] = 0;
					$valid_string[$childnode] = 1;
					$data = array(
					'CID' 	  => $this->session->cid,
					'NA'      => 0,
					'S_Node'  => $child_node[$i],
					'P_Node'  => 1,
					'COLL_ID' => $collid,

					);
					if($num_value == -1)
					{
						if (preg_match("/^-?[1-9][0-9]*$/D", $ans))
						{
    						$data['VAL_TYPE'] = 1;
    						$data['NUM_VAL']  = $ans;
    						$data['TEXT_VAL'] = 0;

						}
						else
						{
							$data['VAL_TYPE'] = 0;
							$data['NUM_VAL']  = 0;
    						$data['TEXT_VAL'] = $ans;

						}
					}
					else
					{
						$data['VAL_TYPE'] = 0;
						$data['NUM_VAL']  = 0;
						$data['TEXT_VAL'] = 0;
						$query = $this->db->get_where('table2', array('COLL_ID =' => $collid,
															 		  'D_Node  =' => $node_id));
						$no_rows = $query->num_rows();
						foreach ($query->result() as $row)
						{
							$node_type = $row->Node_Type;
							$j = 0 ;

							if($node_type == 'MUL_VAL')
							{
								if($value == 1)      $data2['Op1'] = $row->Op1 + 1;
								else if($value == 2) $data2['Op2'] = $row->Op2 + 1;
								else if($value == 3) $data2['Op3'] = $row->Op3 + 1;
								else if($value == 4) $data2['Op4'] = $row->Op4 + 1;
								else if($value == 5) $data2['Op5'] = $row->Op5 + 1;
								else if($value == 6) $data2['Op6'] = $row->Op6 + 1;
								else if($value == 7) $data2['Op7'] = $row->Op7 + 1;
								else if($value == 8) $data2['Op8'] = $row->Op8 + 1;
								else if($value == 9) $data2['Op9'] = $row->Op9 + 1;
								else if($value == 10) $data2['Op10'] = $row->Op10 + 1;
							}
							else if($node_type == 'YNNS')
							{
								$yes = $row->YES;
								$no = $row->NO;
								//To update the user credibilty for yes and no type answers
								$cu = $row->Cu;
								$cl = $row->Cl;
								

								if($value == 1)
								{
								 	$data2['YES'] = $yes + 1;
								 	$yes ++;
								}
								else if($value == 2)
								{
									$data2['NO'] = $no + 1;
									$no ++;
								}
								else if($value == 3) $data2['NS'] = $row->NS + 1;
								if($value == 1 or $value == 2)
								{
									$cred_yn = $this->user_model->cal_ysns($collid,$node_id,$yes,$no,0,0);
									
									//Update the user credibiltiy using the below function
									$this->user_model->cal_user_cred($cu,$cl,$value,$collid);

									$data2['Cu'] = $cred_yn['max'];
									$data2['Cl'] = $cred_yn['min'];
									$data2['PARAM_CRED'] = ($cred_yn['max'] + $cred_yn['min'] )/2;
									//print_r($cred_yn);
									if($cred_yn['answer'] != -1)
									{
										if($cred_yn['answer'] == 0)
										{
											//echo 'char';
											$data2['NODE_VALUE'] = ucwords(str_replace('Yes_', "", $child_name[0]));
											$data2['Answer_Node'] = $child_node[$i];
										}
										else if($cred_yn['answer'] == 1)
										{
											//echo 'vara';
											$data2['NODE_VALUE'] = NULL;
											$data2['Answer_Node'] = $child_node[$i];

										}
									}
									else
									{
										$data2['NODE_VALUE'] = NULL;
										$data2['Answer_Node'] = NULL;

									}

								}
							}

							$this->db->update('table2',$data2,array('COLL_ID =' => $collid,
															 	    'D_Node  =' => $node_id));
						}

						if($no_rows == 0)
						{

							$flag_option = 0;
							$data1 = array(
							'COLL_ID'    => $collid,
							'D_Node'     => $node_id,
							);
							$data1['NODE_NAME'] = $node_name[0];
							//$data1['NODE_VALUE'] =  ucfirst(strtolower(str_replace('Yes_', "", $child_name[0])));
							//echo $data1['NODE_VALUE'].'<br>';
	    					$opt_num =$this->session->opt_num;
							$option_content = $this->session->option_content;
							if($option_content['0'] == 'Yes' && $option_content['1'] == 'No' && $option_content['2'] == 'Not Sure')
							{
								$flag_option = 1;
								$data1['Node_Type'] = 'YNNS';
								$yes = 0;
								$no = 0;
								if($value == 1)
								{
									$data1['YES']= 1;
									$yes++;
								}
								else if($value == 2)
								{
									$data1['NO'] = 1;
									$no++;
								}
								else if($value == 3) $data1['NS'] = 1;

								if($value == 1 or $value == 2)
								{
									$cred_yn = $this->user_model->cal_ysns($collid,$node_id,$yes,$no,0,0);
									$data1['PARAM_CRED'] = ($cred_yn['max'] + $cred_yn['min'] )/2;
									$this->user_model->cal_user_cred(0,1,$value,$collid);
									$data1['Cu'] = $cred_yn['max'];
									$data1['Cl'] = $cred_yn['min'];
								}

							}
							else
							{
								$data1['Node_Type'] = 'MUL_VAL';
								if($value == 1)      $data1['Op1'] = 1;
								else if($value == 2) $data1['Op2'] = 1;
								else if($value == 3) $data1['Op3'] = 1;
								else if($value == 4) $data1['Op4'] = 1;
								else if($value == 5) $data1['Op5'] = 1;
								else if($value == 6) $data1['Op6'] = 1;
								else if($value == 7) $data1['Op7'] = 1;
								else if($value == 8) $data1['Op8'] = 1;
								else if($value == 9) $data1['Op9'] = 1;
								else if($value == 10) $data1['Op10'] = 1;

							}
			    			$data1['flags'] = 0;
							$this->db->insert('table2',$data1);


						}


					}

					$query = $this->db->insert('table1', $data);






				}

				elseif($answer_node[$childnode] == 1)
				{
					$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $childnode));
					foreach ($node_query->result() as $row)
					{
						$childnode1 = $row->Node_ID;
					}

					$answer_node = $this->user_model->changebit($childnode1,$answer_node);
				}
		}
		$cid = $this->session->cid;
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$coll_id = $this->user_model->get_collid($college,$country_code);
		$data = array(
				'Bit_String'   => $answer_node,
				'Valid_String' => $valid_string
				);
		$query = $this->db->update('UserCollegestring', $data, array('CID ='     => $cid,
																	 'COLL_ID =' => $coll_id));
		$data = $this->session->set_userdata;
		$data['answer_string'] = $answer_node;
		$data['ans_qid'] = $this->session->q_id;
		$data['prev_node'] = $this->session->temp_prevnode;
		$data['ques_count'] = $this->session->ques_count + 1;


		$this->session->set_userdata($data);
		return ;

	}



	public function add_collegebitstring_user($college,$country_code)
	{
		/*
		TO insert the user-college specific bit string
		input  --> NULL
		output --> user_collegebitstring

		*/
		$cid = $this->session->cid;
		$coll_id = $this->user_model->get_collid($college,$country_code);
		$final_string = $this->user_model->get_finalstring($country_code); //get final string using global and country bit strings
		$final_string[0] = 0;

		$data = array(
				'CID'     => $cid,
				'COLL_ID' => $coll_id,
				'Bit_String' => $final_string,
				);
		$data1 = array(
				'College_String' => $final_string);
		$query1 = $this->db->update('college',$data1,array( 'COLL_ID =' => $coll_id));
		$query = $this->db->insert('UserCollegestring',$data);
		return $final_string;


	}
	public function get_attributeanswer()
	{

		$cid = $this->session->cid;
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$query = $this->db->get_where('UserCollegestring', array('CID ='  => $cid,
																 'COLL_ID'=> $collid));
		foreach ($query->result() as $row){
			$attribute_string = $row->Attribute_String;
		}
		return $attribute_string;

	}


/*	public function check_attributes($node){
		/*
			To check whether the attribute questions asked or not
			Input: $main_node_Id
			Ouput: not_asked attribute or 0(if all attributes are completed)


		$query = $this->db->get_where('AttributeTable', array('Node_ID =' => $node));
		foreach ($query->result() as $row){

			$attr_num  = $row->Attr_Num;
			for($j=0;$j<$attr_num;$j++){
				if($j==0) $attribute[$j] = $row->Attr1;
				else if($j==1) $attribute[$j] = $row->Attr2;
				else if($j==2) $attribute[$j] = $row->Attr3;
				else if($j==3) $attribute[$j] = $row->Attr4;
				else if($j==4) $attribute[$j] = $row->Attr5;
				else if($j==5) $attribute[$j] = $row->Attr6;
				else if($j==6) $attribute[$j] = $row->Attr7;
				else if($j==7) $attribute[$j] = $row->Attr8;
				else if($j==8) $attribute[$j] = $row->Attr9;
			}
			$answer = $this->user_model->get_attributeanswer();
			for($j=0;$j<$attr_num;$j++){
				$id = $attribute[$j];
				if($answer[$id] == 1) return $id;
			}
		}
			for($j=0;$j<$attr_num;$j++){
				$query_child = $this->db->get_where('AttributeNodeTable', array('Prev_Node = ' => $attribute[$j]));
					$num = $query_child->num_rows();
					$i=0;
					foreach($query_child->result() as $row){
						$child_attribute = $row->Node_ID;
						if($answer[$child_attribute] == 1) return $child_attribute;
					}
			}
			return 0;

	}*/

	public function make_attributestring($node_id,$ques_attr){
		/*
		TO make structural attribute string and insert in attribute table
		Input : structural attr nodeID
		Output : attribute string

		*/

		$query = $this->db->get_where('AttributeNodeTable', array('Prev_Node =' => $node_id));
		$i = $query->num_rows();

		//$i=0;
		$j=0;
		foreach ($query->result() as $row){
			$child_node[$j] = $row->Node_ID;
			$j++;
		}
		//$answer_node[$node_id] = 0;
		if($i==0) {
			$ques_attr[$node_id] = 1;
			return $ques_attr;
		}
		else {
			for($j=0;$j<sizeof($child_node);$j++){

					$ques_attr = $this->user_model->make_attributestring($child_node[$j],$ques_attr);
					$ques_attr[$node_id] = 1;
					//return $answernode;

			}
			return $ques_attr;
		}
		return $ques_attr;



	}
	public function change_attributestring($node_id,$ans_attr){
		/*
		TO make structural attribute string and update in attribute table
		Input : structural attr nodeID
		Output : attribute string

		*/

		$query = $this->db->get_where('AttributeNodeTable', array('Prev_Node =' => $node_id));
		$i = $query->num_rows();

		//$i=0;
		$j=0;
		foreach ($query->result() as $row){
			$child_node[$j] = $row->Node_ID;
			//echo $child_node[$j];
			$j++;
		}
		//$answer_node[$node_id] = 0;
		if($i==0) {
			$node_query = $this->db->get_where('Attr_Position',array('Node_ID =' => $node_id));
			foreach ($node_query->result() as $row)
			{
				$node = $row->Node_Pos;
			}
			$ans_attr[$node] = 0;
			return $ans_attr;
		}
		else {
			for($j=0;$j<sizeof($child_node);$j++){

					//echo $child_node[$j];
					$ans_attr = $this->user_model->change_attributestring($child_node[$j],$ans_attr);
					$node_query = $this->db->get_where('Attr_Position',array('Node_ID =' => $node_id));
					foreach ($node_query->result() as $row)
					{
						$node = $row->Node_Pos;
					}
					$ans_attr[$node] = 0;
					//$ans_attr[$node_id] = 0;
					//return $answernode;

			}
			return $ans_attr;
		}
		return $ans_attr;



	}

	/*
		To make the valid nodes attributes 1 and invalid node attributes 0
		Input : NULL
		Output : -1 (if there is no attributes for valid string)
				  0  if there are valid attributes
	*/

	public function insert_attributes()
	{	
		/*
			Owner: Charan, Saleel

		*/
		
		$cid = $this->session->cid;
		$college1 = $this->session->college1;
		$country_code = $this->session->country_code;
		$coll_id = $this->user_model->get_collid($college1,$country_code);
		$valid_string = $this->user_model->get_validstring();
		//$country_code = $this->user_model->get_countrycode();
		$countrycode = $this->session->country_code;
		//echo $countrycode;
		//echo '<br>';
		$ques_attr = $valid_string;
		$flag = 0;
		for($i=0;$i<strlen($valid_string);$i++)
		{
			if($i==0){
				//make the first bit as 1 so that the root node is valid
				$valid_string[$i]=1;
			}
			if($valid_string[$i] == 1)
			{
				/*for($j=0;$j<strlen($ques_attr);$j++)
				{
					$ques_attr[$j] = 0;
				}*/
				$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $i));
				foreach ($node_query->result() as $row)
				{
					$id = $row->Node_ID;
				}

				$query = $this->db->get_where('StructureAttribute', array('Node_ID ='      => $id,
																		  'CountryCode =' => $countrycode));
				$no_rows = $query->num_rows();
				if($query->num_rows() == 0)
				{
					$query1 = $this->db->get_where('StructureAttribute', array('Node_ID ='=> $id));
					if($query1->num_rows() != 0)
					{
						$query2 = $this->db->get_where('StructureAttribute', array('Node_ID ='		=> $id,
																		  			'CountryCode =' => 'Int'));
						foreach($query2->result() as $row)
						{
							$flag = 1;
							$data2['Node_ID']         = $row->Node_ID;
							$data2['Attr_Bit_String'] = $row->Attr_Bit_String;
							$data2['CountryCode']     = $countrycode;
						}
						$this->db->insert('StructureAttribute',$data2);
						$data = array(
						'CID'          => $cid,
						'COLL_ID'      => $coll_id,
						'Node_ID'      => $id,
						//'Attr_String'  => $ques_attr,
						'Attr_String'  => $data2['Attr_Bit_String'],

						);

						$this->db->insert('AttributeTable',$data);

					}
				}

				foreach ($query->result() as $row)
				{
					$attr_bs = $row->Attr_Bit_String;
					$flag = 1;
					/*for($j=0,$k=0;$j<strlen($attr_bs);$j++)
					{
						$flag = 1;
						if($attr_bs[$j] == 1)
						{
							$attribute[$k] = $j;
							$k++;
						}
					}
					for ($j=0;$j<sizeof($attribute);$j++)
					{
						$attr = $attribute[$j];
						$ques_attr[$attr] = 1;
						$ques_attr = $this->user_model->make_attributestring($attribute[$j],$ques_attr);
					}
					if(sizeof($attribute) != 0)
					{*/
						$data = array(
						'CID'          => $cid,
						'COLL_ID'      => $coll_id,
						'Node_ID'      => $id,
						//'Attr_String'  => $ques_attr,
						'Attr_String'  => $attr_bs,

						);
						$this->db->insert('AttributeTable',$data);

					//}
				}

			}
		}
		// print_r($valid_string);
		// die;
		if($flag == 0) return -1;

		return 0;
	}

	public function get_attrstring()
	{
		$cid = $this->session->cid;
		$college1 = $this->session->college1;
		$country_code = $this->session->country_code;
		$coll_id = $this->user_model->get_collid($college1,$country_code);
				
		$query = $this->db->get_where('AttributeTable',array('CID ='   => $cid,
															 'COLL_ID' => $coll_id));
		$i = 0;

		foreach($query->result() as $row){
			$node[$i] = $row->Node_ID;
			$attrstring[$i] = $row->Attr_String;
			$i++;
		}
		if($query->num_rows() == 0) return 0;
		else return array('attrstring' => $attrstring,
						  'node'      => $node);

	}


	public function check_attr_biasnode($node_id,$position,$struct_node,$string)
	{
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$cid = $this->session->cid;
		$collid = $this->user_model->get_collid($college,$country_code);
		$query =$this->db->get_where('table2',array('S_Node ='  => $struct_node,
													'COLL_ID =' => $collid,
													'P_Node ='  => $node_id));
		//echo $node_id;
		//echo $collid;
		if($query->num_rows() == 0)
		{
			//echo "charan";
			return 0;
		}
		else
		{
			foreach($query->result() as $row)
			{
				$cred = $row->PARAM_CRED;
				$type = $row->Node_Type;
			}
			if($cred > 0.9) // depends on the algorithm
			{
				$cred = $cred * 100;
				$rand = mt_rand(1,100);
				if($rand >= $cred)
				{
					return 0;
				}
				else
				{
					//echo 'charn';

					$val = 0;
					$flag = 0;
					if($type == 'MUL_VAL')
					{
						$flag = 1;
					 	$data2['0'] = $row->Op1;
						$data2['1'] = $row->Op2;
						$data2['2'] = $row->Op3;
						$data2['3'] = $row->Op4;
						$data2['4'] = $row->Op5;
						$data2['5'] = $row->Op6;
						$data2['6'] = $row->Op7;
						$data2['7'] = $row->Op8;
						$data2['8'] = $row->Op9;
						$data2['9'] = $row->Op10;
						for($i=0;$i<10;$i++)
						{
							if($val < $data2[$i])
							{
								$childnum = $i+1;
								$val = $data2[$i];
							}
						}
					}
					else if($type == 'YNNS')
					{
						$flag = 1;
						$data2['0'] = $row->YES;
						$data2['1'] = $row->NO;
						$data2['2'] = $row->NS;
						for($i=0;$i<3;$i++)
						{
							if($val < $data2[$i])
							{
								$childnum = $i+1;
								$val = $data2[$i];
							}
						}
					}
					$string[$position] = 0;
					if($flag ==1)
					{
						$child_query = $this->db->get_where('AttributeNodeTable', array('Prev_Node =' => $node));
						foreach ($child_query->result() as $row)
						{
							$child_option  = $row->Trigger_AnsOp;
							$child_node    = $row->Node_ID;
							$node_query = $this->db->get_where('Attr_Position',array('Node_ID =' => $child_node));
							foreach ($node_query->result() as $row)
							{
								$child_pos = $row->Node_Pos;
							}
							$string[$child_pos] = 0;
							if($val != $child_option)
							{
								$string = $this->user_model->change_attributestring($child_node,$string);
							}
						}
					}
					$data3['Attr_String'] = $string;
					$data4['CID'] = $cid;
					$data4['COLL_ID'] = $collid;
					$data4['Node_ID'] = $struct_node;
					$this->db->update('AttributeTable',$data3,$data4);
					$data5['CID'] = $cid;
					$data5['NA'] = 0;
					$data5['S_Node'] = $struct_node;
					$data5['P_Node'] = $node_id;
					$data5['COLL_ID'] = $collid;
					//echo '<br>'.$string;
					$this->db->insert('Bias_Table1',$data5);
					return 1;
				}
			}
			else
			{
				//echo 'charan';
				return 0;
			}

		}


	}

	public function get_attributeques($var=0){
		/*
		To get the attribute question
		Input 	--> NULL
		Output 	--> question,options

		*/
		//echo 'charan';
		$data = $this->user_model->get_attrstring();
		$attrstring = $data['attrstring'];
		$attr_node  = $data['node'];
		$flag  = 0;
		for($i=0;$i<sizeof($attrstring);$i++)
		{
			$string = $attrstring[$i];
			for($j=0;$j<strlen($string);$j++)
			{
				if($string[$j] == 1)
				{
					$struct_node = $attr_node[$i];
					$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $j));
					foreach ($node_query->result() as $row)
					{
						$node = $row->Node_ID;
					}
					if($this->user_model->check_attr_biasnode($node,$j,$struct_node,$string) == 1 && $var==0)
					{
						//echo 'charna';

					}
					else
					{

						$query = $this->db->get_where('AttributeNodeTable', array('Node_ID =' => $node));
						foreach ($query->result() as $row)
						{
							$node_type = $row->Node_Type;
							$question_id = $row->Trigger_Ques;
							$club_id = $row->Club_ID;
						}
						$data = $this->user_model->get_question($question_id);
						$question = $data['question'];
						$opt_num  = $data['opt_num'];
						$unit_flag = $data['unit_flag'];
						if($club_id !=0 && $var==0) 
						{

							$ques_id = $question_id ;
							$this->db->select('*');
							$this->db->from('AttributeNodeTable');
							$this->db->join('Attr_Position','AttributeNodeTable.Node_ID = Attr_Position.Node_ID');
							$this->db->join('Club_Questions','AttributeNodeTable.Club_ID = Club_Questions.Club_ID');
							$this->db->where('AttributeNodeTable.Club_ID =', $club_id);
							$this->db->where('Node_Pos >=', $j);
							$club_query = $this->db->get();
							$i=1;
							$num_rows = $club_query->num_rows();
							$option_content[0] = 'checkbox';

							$limit=10; //set the limit here. limit 10 means a maximum of 9 questions per page
							$page=1; //initialize the total no of pages to 1

							// $curr_page=1;
							// $branchicons=array();
							foreach ($club_query->result() as $row)
							{

								$question_id = $row->Club_QID;
								$node =  $row->Node_ID;
								$position = $row->Node_Pos;
								$prv = $row->Prev_Node;
								// print_r($limit);
								$page_query = $this->db->get_where('AttributeNodeTable',array('Prev_Node =' 	=> $prv,
													  								  		  'Club_ID   ='	=> $club_id));
								$pageq=$page_query->num_rows();

								if (($pageq/9)>1)
								{
									$page=ceil($pageq/9); //calculate the total no of pages
								}
								if($this->user_model->check_attr_biasnode($node,$j,$struct_node,$string) != 1 )
								{
									$this->db->select('*');
									$child_query = $this->db->get_where('AttributeNodeTable',array('Prev_Node =' 	=> $node,
																		   				  		   'Trigger_AnsOp =' => 3));
									$this->db->select('Node_Name');
									$limit_query = $this->db->get_where('AttributeNodeTable',array('Prev_Node =' 	=> $prv,
																						  		   'Club_ID  ='		=> $club_id));
									$limit=$limit_query->num_rows();
									$limit++;
									if($limit>10){
										$limit=10;//if there are more questions than limit reset limit. Else limit can be less than that if there are less questions
									}

									foreach ($child_query->result() as $child_row)
									{
										$node_name = $child_row->Node_Name;
										$icon_id = $child_row->Icon_ID;
										if($icon_id!=NULL)
										{
											$branchicons[$i] = strval($icon_id); //fetch branch icons
											// $option_content[$i] = $branchicons[$i];
										}

										$option_content[$i] = ucwords(str_replace('NotSure_', "", $node_name)); //set option content 

										$i++;
									}

								}

							}
							$data = $this->session->set_userdata;
							if($this->session->club_id == $club_id)
							{
								//if the previous club id and the current club id are the same
								$curr_page_no= $this->session->page_no;
							}
							else
							{
								//reset the page no
								$data['page_no'] = 1;
								$curr_page_no = 1;
							}

							//make the page number in the format "1 of 2"
							$page_display = strval($curr_page_no)." of ".strval($page);
					
							//TO show the parent node in the questions
							$parent = $this->user_model->get_parentnodes($id,0);
							$prev_ques = $this->session->ans_qid;
							if($prev_ques != $question_id && $i < $limit)
							{
								$data = $this->get_question($ques_id);
								$question = $data['question'];
								$opt_num  = $data['opt_num'];
								$unit_flag = $data['unit_flag'];
								if($node_type == "Decision")
								{
									$option   = $data['option'];
									$option_content = $this->user_model->get_options($option,$opt_num);
								}
								else if($node_type = "Structural")
								{
									$option_content[0] = 0;
								}
								$parent = $this->user_model->get_parentnodes($id,0);
								$parent_node = $this->session->prev_node;
								$data['q_id'] = $ques_id;
								$data['opt_num'] = $opt_num;
								$data['option_content'] = $option_content;
								$data['branchicons'] = $branchicons;
								// echo $branchicons;
								$data['page_num'] = $page_display;
								$data['parent'] = $parent;
								$data['temp_prevnode'] = $prev_node;
								$data['club_id'] = $club_id;
								$this->session->set_userdata($data);

								if($parent_node != $prev_node)
								{
									$data['ques_flag'] = 1;
								}
								else
								{
									$data['ques_flag'] = 0;
								}
								$this->session->set_userdata($data);
								return array('question' => $question,
									 		 'option_content' => $option_content,
									 		 'opt_num' => $opt_num,
											 'unit_flag' => $unit_flag,
									 		 'branchicons' => $branchicons,
									 		 'page_num' =>  $page_display);


							}
							else
							{
								$data2 = $this->get_question($question_id);
								$question = $data2['question'];
								$unit_flag = $data['unit_flag'];
								$parent_node = $this->session->prev_node;
								if($parent_node != $prev_node)
								{
									$data['ques_flag'] = 1;

								}
								else
								{
									$data['ques_flag'] = 0;
								}
								if($i==6) $opt_num = $i;
								else $opt_num = $i;
								$data['q_id'] = $question_id;
								$data['prev_node'] = $parent_node;
								$data['club_id'] = $club_id;
								$data['opt_num'] = $i + 1;
								$data['option_content'] = $option_content;
								$data['branchicons'] = $branchicons;
								$data['parent'] = $parent;
								$data['temp_prevnode'] = $prev_node;
								$this->session->set_userdata($data);
								//return $data;
								return array('question' => $question,
									 		 'option_content' => $option_content,
									 		 'branchicons' => $branchicons,
									 		 'opt_num' => $opt_num,
											 'unit_flag' => $unit_flag,
									 		 'page_num' =>  $page_display);

							}

						}
						else if($node_type == "Decision")
						{
							$option   = $data['option'];
							$option_content = $this->user_model->get_options($option,$opt_num);
						}
						else if($node_type == "Structural")
						{
							$option_content[0] = 0;
						}
						$data = $this->session->set_userdata;
						$parent = $this->user_model->get_parentnodes($attr_node[$i],0);
						$data['opt_num'] = $opt_num;
						$data['option_content'] = $option_content;
						$data['parent'] = $parent;
						$data['temp_prevnode'] = $attr_node[$i];
						$parent_node = $this->session->prev_node;
						if($attr_node[$i] != $parent_node)
						{
							$data['ques_flag'] = 1;
						}
						else
						{
							$data['ques_flag'] = 0;
						}
						$this->session->set_userdata($data);
						return array('question' => $question,
						 			 'option_content' => $option_content,
									 'unit_flag' => $unit_flag,
						 			 'opt_num' => $opt_num,
						 			 'branchicons' => '',
									 'page_num' =>  '');

					}
					$data = $this->user_model->get_attrstring();
					$attrstring = $data['attrstring'];
					$attr_node  = $data['node'];
					$string = $attrstring[$i];
				}
			}
		}
		return array('question' => -1);
	}

	public function Mu_Cal($data,$ans){
		$data['VAL_MU'] = ((($data['VAL_MU'] * $data['SSIZE_N']) + $ans) / ($data['SSIZE_N']+1));
		return $data['VAL_MU'];
	}

	public function Sigma_Cal($data,$ans){
		$mu = $data['VAL_MU'];
		$this->db->select('NUM_VAL');
		$query=$this->db->get_where('table1',array('S_Node  =' =>$data['S_Node'],
												   'P_Node  =' =>$data['P_Node'],
												   'COLL_ID =' =>$data['COLL_ID'],
												   'NUM_VAL !=' => 0));
		$v=($ans-$mu)*($ans-$mu);
		$n=$query->num_rows();
		if($n!=0)
		{
			foreach ($query->result() as $row)
			{
				$x = $row->NUM_VAL;
				$v = $v+(($x-$mu)*($x-$mu));
			}
			$x=sqrt($v/$n);
		}
		else $x=0;
			return $x;
	}


	public function update_attr_count($coll_id,$cid)
	{

		$query = $this->db->get_where('UserCollegestring',array('COLL_ID ='=>$coll_id,
													   			'CID ='    =>$cid));

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

		$data['answered'] = $answered + 1;
		$data['total_attempted'] = $total_attempted + 1;
		$data['num_ques'] =  $num_ques + 1;

		if($query->num_rows() == 0)
		{
			$data['COLL_ID'] = $coll_id;
			$data['CID'] = $cid;
			$this->db->insert('UserCollegestring',$data);
		} 
		else
		{
			$this->db->update('UserCollegestring',$data,array('COLL_ID ='=>$coll_id,
													   			'CID ='    =>$cid));
		}
	}

	public function mul_node_cred($data)
	{
		$opt_num = $this->session->opt_num;
		for($i=1;$i<=$opt_num;$i++)
		{
			$op = 'Op'.$i;
			if(($data[$op] >= ($data['Frequency']*7/10)) && $data['SSIZE_N'] >=5)
			{
				return $i;
			} 
		}
		return 0;
	}


	public function update_attrnodeanswer($value)
	{
		$num_value = 0;
		if($value == -1)
		{
			$ans = $this->input->get('ans');
			$num_value = $value;
			$value = $value + 1;
			//echo $ans;
		}
		/*
		For bulk upload 
		for the insert values
		*/
		//echo 'Value:'.$value.'<br>';
		if($value == -2)
		{
			$ans = $this->session->attr_value;
			$num_value = -1;
			$value = 0;
		}
		$option_value = $value + 1;
		$cid = $this->session->cid;
		$college1 = $this->session->college1;
		$country_code = $this->session->country_code;
		$coll_id = $this->user_model->get_collid($college1,$country_code);
		$data_string = $this->user_model->get_attrstring();
		$attrstring = $data_string['attrstring'];
		$attrstr = $data_string['node'];
		$opt_num = $this->session->opt_num;
		$flag = 0;
		for($i=0;$i<sizeof($attrstring);$i++)
		{
			$string = $attrstring[$i];
			$k = $attrstr[$i];
			for($j=0;$j<strlen($string);$j++)
			{
				if($string[$j] == 1)
				{
					if($opt_num != 0)
					{
						$string[$j]  = 0;
						$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $j));
						foreach ($node_query->result() as $row)
						{
							$node = $row->Node_ID;
						}
						//echo 'Node-Id:'.$node.'<br>';
						$m=0;
						$name_query = $this->db->get_where('AttributeNodeTable',array('Node_ID =' => $node));
						foreach($name_query->result() as $row)
						{
							$name_node = $row->Node_Name;
						}
						$child_query = $this->db->get_where('AttributeNodeTable', array('Prev_Node =' => $node));
						foreach ($child_query->result() as $row)
						{
							$child_option  = $row->Trigger_AnsOp;
							$child_node    = $row->Node_ID;
							$child_name[$m]    = $row->Node_Name;
							$string[$child_node] = 0;
							$m++;
							if($num_value == -1 && $option_value == $child_option)
							{
								$c_node = $child_node;
							}
							if($option_value == $child_option)
							{
								$c_node = $child_node;	
							}
							if($option_value != $child_option)
							{
								$string = $this->user_model->change_attributestring($child_node,$string);
							}
							else
							{
								$pnode = $node;
							}
						}
					}
					else
					{
						$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $j));
						foreach ($node_query->result() as $row)
						{
							$node = $row->Node_ID;
						}
						$pnode = $node;
						$string[$j] = 0;

					}
					$flag = 1;
					break;
				}
			}
			if($flag == 1) break;
		}
					$valid_string = $this->user_model->get_validstring();
					$count = 0;
					//echo $string;
					$data1 = array('Attr_String'   => $string);
					$data['S_Node'] = $k;
					$data['CID'] = $cid;
					$data['COLL_ID'] = $coll_id;
					$data['P_Node'] = $pnode;
					$data['NA'] = 0;

					$query = $this->db->update('AttributeTable', $data1, array('CID =' => $cid,
																			  'COLL_ID =' => $coll_id,
																			  'Node_ID =' => $k));

					$data2['S_Node'] = $k;
					$data2['COLL_ID'] = $coll_id;
					$data2['P_Node'] = $pnode;
					if($num_value == -1)
					{
						if (preg_match("/^-?[1-9][0-9]*$/D", $ans))
						{
			    			$data['VAL_TYPE'] = 1;
			    			$data['NUM_VAL']  = $ans;
			    			$data2['Node_Type'] = 'NUMVAL';
			    			$query2 = $this->db->get_where('table2', array( 'COLL_ID =' => $data['COLL_ID'],
																			'S_Node  =' => $data['S_Node'],
																			'P_Node  =' => $data['P_Node']));
			    			foreach ($query2->result() as $row)
			    			{
			    				$data2['VAL_SIGMA'] = $row->VAL_SIGMA;
			    				$data2['VAL_MU']    = $row->VAL_MU;
			    				$data2['SSIZE_N']   = $row->SSIZE_N;

			    				$data['VAL_CRED'] = $this->user_model->get_nodecred($data2['SSIZE_N'],$data2['VAL_MU'],$data2['VAL_SIGMA'],$ans);
			    				$this->db->insert('table1', $data);
			    				if($data2['VAL_SIGMA']==0 && $data2['VAL_MU'] == 0)
			    				{
			    					$data2['VAL_SIGMA'] = 0;
			    					$data2['VAL_MU']    = $ans;
			    				}
			    				else
			    				{
			    					$data2['VAL_SIGMA'] = $this->user_model->Sigma_Cal($data2,$ans);
			    					$data2['VAL_MU']    = $this->user_model->Mu_Cal($data2,$ans);
			    				}

			    				$data2['SSIZE_N']   = $data2['SSIZE_N'] + 1;

								$data2['CRED_PARAM_DISP'] = $this->user_model->displaycal($data2['SSIZE_N'],$data2['VAL_MU'],$data2['VAL_SIGMA']);
								$data2['NODE_NAME'] = $name_node;
								if($data2['CRED_PARAM_DISP'] == 1)
								{
									$data2['VAL_PARAM_DISP'] = $data2['VAL_MU'];
									$data2['NODE_VALUE'] = round($data2['VAL_MU']);
									$data2['Answer_Node'] = $c_node;
								}
								else
								{
									$data2['VAL_PARAM_DISP'] = 0;
									$data2['NODE_VALUE'] = NULL;
									$data2['Answer_Node'] = NULL;
								}
								$this->user_model->cal_user_cred_val($data2['VAL_MU'],$data2['VAL_SIGMA'],$ans,$data2['SSIZE_N'],$data['COLL_ID']);
								
			    				$this->db->update('table2',$data2, array( 'COLL_ID =' => $data['COLL_ID'],
																		  'S_Node  =' => $data['S_Node'],
																		  'P_Node  =' => $data['P_Node']));
			    			}
			    			if($query2->num_rows() == 0)
			    			{
			    				$data2['VAL_MU']    = $ans;
			    				$data2['SSIZE_N']   = 1;
			    				$data2['VAL_SIGMA'] = 0;
			    				$data2['flags'] = 0;
			    				$data2['NODE_NAME'] = $name_node;
			    				$data2['CRED_PARAM_DISP'] = $this->user_model->displaycal($data2['SSIZE_N'],$data2['VAL_MU'],$data2['VAL_SIGMA']);
			    				$this->user_model->cal_user_cred_val($data2['VAL_MU'],$data2['VAL_SIGMA'],$ans,$data2['SSIZE_N'],$data['COLL_ID']);
			    				$this->db->insert('table1', $data);
			    				
			    				$this->db->insert('table2',$data2);

			    			}
			    			$this->user_model->paramcredcal($data['COLL_ID'],$data['S_Node'],$data['P_Node']);

										    			
			    			//$this->user_model->update_attr_count($coll_id,$cid);
			    			//Started

			    			


			    			
							//end






						}
						else
						{
			    			$data2['NODE_NAME'] = $name_node;


							$data['VAL_TYPE'] = 0;
			   				$data['TEXT_VAL'] = $ans;
			   				$query2 = $this->db->get_where('table2', array( 'COLL_ID =' => $data['COLL_ID'],
																			'S_Node  =' => $data['S_Node'],
																			'P_Node  =' => $data['P_Node'],
																			'VAL_DATA =' => $ans));
			   				$this->db->insert('table1', $data);


			   				foreach ($query2->result() as $row)
			   				{
			   					$freq['Frequency'] = $row->Frequency + 1;
			   					$this->db->update('table2',$freq,array( 'COLL_ID =' => $data['COLL_ID'],
																		'S_Node  =' => $data['S_Node'],
																		'P_Node  =' => $data['P_Node'],
																		'VAL_DATA =' => $ans));
			   				}
			   				if($query2->num_rows() == 0)
			   				{

								$data2['Node_Type'] = 'STR_VAL';
								$data2['VAL_DATA']  = $ans;
								$data2['Frequency'] = 1;
			    				$data2['flags'] = 0;
			    				
								$this->db->insert('table2',$data2);
			   				}

			   				$mu_value = $this->user_model->nonmucal($data['COLL_ID'],$data['S_Node'],$data['P_Node']);
			   				$data_non = $this->user_model->nonparamcredcal($data['COLL_ID'],$data['S_Node'],$data['P_Node']);
							if($data_non['CRED_PARAM_DISP'] == 1)
							{
								$data_display['NODE_VALUE'] = $mu_value;
								$data_display['Answer_Node'] = $c_node;
							}
							else
							{
								$data_display['NODE_VALUE'] = NULL;
								$data_display['Answer_Node'] = NULL;
							}
							//$this->user_model->update_attr_count($coll_id,$cid);
						}
					}
					else
					{
			    		$data2['NODE_NAME'] = $name_node;

						$data['VAL_TYPE'] = 0;

						$query = $this->db->get_where('table2', array( 'COLL_ID =' => $data['COLL_ID'],
																	   'S_Node  =' => $data['S_Node'],
																	   'P_Node  =' => $data['P_Node']));
						$this->db->insert('table1', $data);
						$no_rows = $query->num_rows();
						$value = $option_value;
						foreach ($query->result() as $row)
						{
							$node_type = $row->Node_Type;
							$j = 0;
							$option_content = $this->session->option_content;
							$option = $option_content[$option_value];
							//print_r($option_content);

							if($option_content[0] == 'insert')
							{
								//$data['NS'] = -10;
								//echo $option;
								$data2['Node_Type'] = 'NUMVAL';
								if($option == 'Not Sure')
								{
									//echo $row->NS;
									//echo 'charan';

									$data2['NS'] = $row->NS + 1;
								}
								else if($option == 'Varies')
								{
									//echo 'charan';

									$data2['Varies'] = $row->Varies + 1;
								}
								//echo $data2['NS'];
								//	echo 'charan';

							}
							else if($node_type == 'MUL_VAL')
							{
								
								for($mul_i = 1;$mul_i<=10;$mul_i++)
								{
									$mul_opt = 'Op'.$mul_i;
									$data2[$mul_opt] = $row->$mul_opt;
									if($value == $mul_i)
									{
										$data2[$mul_opt]++;
									}
									
								}
								


								$data2['Frequency'] = $row->Frequency+1;
								$data2['SSIZE_N'] = $row->SSIZE_N + 1;
								$mul_opt_sz = $this->session->opt_num;
								for($mul_i=1;$mul_i<=$mul_opt_sz;$mul_i++)
								{
									$mul_opt = 'Op'.$mul_i;
									$mul_sz = $data2['Frequency'] - $data2[$mul_opt];
									$mul_cred[$mul_i] = $this->user_model->cal_ysns($coll_id,$k,$data2[$mul_opt],$mul_sz,0,0);	
								}
								
								$this->user_model->cal_user_cred_mul($mul_cred,$value,$coll_id);
								

								$mul_opt = $this->user_model->mul_node_cred($data2);
								if($mul_opt>0)
								{
									$mul_optcontent = $this->session->option_content;
									$data2['NODE_VALUE'] = $mul_optcontent[$mul_opt-1];
									$data2['Answer_Node'] = $c_node;
								}
								else
								{
									$data2['NODE_VALUE'] = NULL;
									$data2['Answer_Node'] = NULL;

								}
								//$this->user_model->update_attr_count($coll_id,$cid);
							}
							else if($node_type == 'YNNS')
							{
								$cu 				= $row->Cu;
			    				$cl                 = $row->Cl;
								$data2['NODE_NAME'] = $name_node;
								if($value == 1)      $data2['YES'] = $row->YES + 1;
								else if($value == 2)
								{
									$data2['NO'] = $row->NO + 1;
									
								} 
								else if($value == 3) $data2['NS'] = $row->NS + 1;
								if($value == 1 or $value == 2)
								{
									//NewCode
									$cred_yn = $this->user_model->cal_ysns($coll_id,$k,$data2['YES'],$data2['NO'],0,0);
									
									//Update the user credibiltiy using the below function


									$data2['Cu'] = $cred_yn['max'];
									$data2['Cl'] = $cred_yn['min'];
									$data2['PARAM_CRED'] = ($cred_yn['max'] + $cred_yn['min'] )/2;
									//print_r($cred_yn);
									if($cred_yn['answer'] != -1)
									{
										if($cred_yn['answer'] == 0)
										{
											//echo 'char';
											$data2['NODE_VALUE'] = ucwords(str_replace('Yes_', "", $child_name[0]));
											$data2['Answer_Node'] = $c_node;
										}
										else if($cred_yn['answer'] == 1)
										{
											//echo 'vara';
											$data2['NODE_VALUE'] = NULL;
											$data2['Answer_Node'] = $c_node;

										}
									}
									else
									{
										$data2['NODE_VALUE'] = NULL;
										$data2['Answer_Node'] = NULL;

									}

								}
								//$this->user_model->update_attr_count($coll_id,$cid);
							}
							
							
							$this->db->update('table2',$data2,array('COLL_ID =' => $data['COLL_ID'],
																	'S_Node  =' => $data['S_Node'],
																	'P_Node  =' => $data['P_Node']));
						}

						if($no_rows == 0)
						{

	    					$opt_num =$this->session->opt_num;
							$option_content = $this->session->option_content;
							//print_r($option_content);
							//echo $option_content[0];
							//echo 'Option_first'.$option_content['0'].'<br>';
							$flag_opt = 1;
							if($option_content[0] == 'insert')
							{
								$flag_opt = 0;
								$data2['Node_Type'] = 'NUMVAL';
								$option = $option_content[$option_value];
								if($option == 'Not Sure')
								{
									$data2['NS'] = 1;
								}
								else if($option == 'Varies')
								{
									$data2['Varies'] = 1;
								}
							}
							if(($option_content['0'] == 'Yes' && $option_content['1'] == 'No' && $option_content['2'] == 'Not Sure') or $option_content['0'] == 'checkbox')
							{
								$data2['NODE_NAME'] = $name_node;
								$flag_option = 1;
								$data2['Node_Type'] = 'YNNS';
								if($value == 1)      $data2['YES']= 1;
								else if($value == 2) $data2['NO'] = 1;
								else if($value == 3) $data2['NS'] = 1;
								//$this->user_model->update_attr_count($coll_id,$cid);
							}
							else if($flag_opt == 1)
							{
								$data2['Node_Type'] = 'MUL_VAL';
								$data2['Frequency'] = 1;
								$data2['SSIZE_N'] = 1;
								for($mul_i = 1;$mul_i<=10;$mul_i++)
								{
									$mul_opt = 'Op'.$mul_i;
									$data2[$mul_opt] = 0;
									if($value == $mul_i)
									{
										$data2[$mul_opt]++;
									}
									
								}
								
								
								$mul_opt_sz = $this->session->opt_num;
								for($mul_i=1;$mul_i<=$mul_opt_sz;$mul_i++)
								{
									$mul_opt = 'Op'.$mul_i;
									$mul_sz = $data2['Frequency'] - $data2[$mul_opt];
									$mul_cred[$mul_i] = $this->user_model->cal_ysns($coll_id,$k,$data2[$mul_opt],$mul_sz,0,0);	
								}
								
								$this->user_model->cal_user_cred_mul($mul_cred,$value,$coll_id);

								//$this->user_model->update_attr_count($coll_id,$cid);

							}
			    			$data2['flags'] = 0;
			    				
							$this->db->insert('table2',$data2);

						}
					}

					$data = $this->session->set_userdata;
					$data['prev_node'] = $this->session->temp_prevnode;
					$this->session->set_userdata($data);


		return ;

	}

	public function get_nodetree()
	{
		$query = $this->db->get('NODETABLE');
		$i =-1;
		foreach ($query->result() as $row)
		{
			if($i == -1)
			{
				$row->Node_ID;
			}
			else
			{
				$node[$i] = $row->Node_ID;
				$node_name[$i] = $row->Node_Name;
				$node_ques[$i] = $row->Trigger_Ques;
				$node_ansop[$i] = $row->Trigger_AnsOp;
				$node_type[$i]  = $row->Node_Type;
				$child[$i] = $this->user_model->get_childnode($node[$i]);

			}
			$i++;
		}
		$data['node'] = $node;
		$data['node_name'] = $node_name;
		$data['node_ques'] = $node_ques;
		$data['node_ansop']= $node_ansop;
		$data['node_type'] = $node_type;
		$data['child'] = $child;
		return $data;
	}
	public function get_attrnodetree()
	{
		$query = $this->db->get('AttributeNodeTable');
		$i =0;
		foreach ($query->result() as $row)
		{
				$node[$i] = $row->Node_ID;
				$node_name[$i] = $row->Node_Name;
				$node_ques[$i] = $row->Trigger_Ques;
				$node_ansop[$i] = $row->Trigger_AnsOp;
				$node_type[$i]  = $row->Node_Type;
				$child[$i] = $this->user_model->get_attrchildnode($node[$i]);
				$i++;
		}
		$data['node'] = $node;
		$data['node_name'] = $node_name;
		$data['node_ques'] = $node_ques;
		$data['node_ansop']= $node_ansop;
		$data['node_type'] = $node_type;
		$data['child'] = $child;
		return $data;
	}

	public function insert_nodes($data)
	{
		$this->db->select_max('Node_ID');
		$query = $this->db->get('NODETABLE');
		foreach($query->result() as $row)
		{
			$data3['Node_ID'] = $row->Node_ID + 1;
		}
		$data3['Node_Name'] = $data['node_name'];
		$data3['Node_Type'] = $data['node_type'];
		$data3['Prev_Node'] = $data['prev_node'];
		$data3['Trigger_Ques'] =$data['trigger_ques'];
		if($data3['Node_Type'] == 'Decision')
		{
			$this->db->insert('NODETABLE',$data3);
			return $data3['Node_ID'];
		}
		else
		{

			$data3['Trigger_AnsOp'] = $data['option_value'];
			$this->db->insert('NODETABLE',$data3);
			$data2['Node_ID'] = $data3['Node_ID'];
			$data2['CountryCode'] = 'Int';
			$this->db->insert('StructureAttribute',$data2);
			return $data3['Prev_Node'];

		}




	/*	$data2 = $this->user_model->get_question($data['Trigger_Ques']);
		if($data2['opt_num'] == -1)
		{
			$data1['Q_ID'] = $data['Trigger_Ques'];
			$data1['Q_Text'] = $this->input->post('new_ques');
			$data1['Option_Num'] = $this->input->post('trigger_ans');
			for($i=1;$i<=$data1['Option_Num'];$i++)
			{
				$j = $i -1;
				$opt = 'Op'
				$opt = $opt.$i;
				$option = 'option';
				$option = $option.$i;
				$data1[$opt] = $this->input->post('option1');
				$opt_value[$j] = $data1[$opt];
			}
			$this->db->insert('QUESTIONTABALE',$data1);
			$data2['opt_num'] = $data1['Option_Num'];
			$data2['question'] = $data1['Q_Text'];
			$data2['option'] = $opt_value;
		}
		else
		{



		}
		$data2['q_id']      = $data['Trigger_Ques'];
		$data2['prev_node'] = $data['Node_ID'];

		if($data1 == 0 )
		{

		}
		else
		{
			$data['Trigger_AnsOp'] = $data1;
		}
		//$this->db->insert('NODETABLE',$data);
		$data2['Node_ID'] = $data['Node_ID'];
		$data2['CountryCode'] = 'int';
		print_r($data2);
		//$this->db->insert('StructureAttribute',$data2);*/
	}

	public function check_question($id)
	{
		$query = $this->db->get_where('QUESTIONTABALE',array('Q_ID =' => $id));
		if($query->num_rows() == 0) return 0;
		else return 1;
	}


	public function insert_attrnodes($Q_ID,$OP_Num)
	{
		$this->db->select_max('Node_ID');
		$query = $this->db->get('AttributeNodeTable');
		foreach($query->result() as $row)
		{
			$data['Node_ID'] = $row->Node_ID + 1;
			$node_id = $row->Node_ID + 1;
			
		}
		$data['Node_Name'] = $this->input->post('node_name');
		$data['Node_Type'] = $this->input->post('node_type');
		$data['Prev_Node'] = $this->input->post('prev_node');
		$data['Trigger_Ques'] =$Q_ID;
		$data1 =$this->input->post('trigger_ans');
		if($data['Node_Type'] == 'Decision'){
			$this->db->insert('AttributeNodeTable',$data);	
		}
		$i=1;
		if($data['Node_Type'] == 'Structural'){
			$i=0;
			$data1--;
			// For the type only structural type
			$data['Node_ID'] = $this->input->post('prev_node');
		}
		for(;$i<=$data1;$i++){
			
			$struct_data['Node_ID']   = $node_id+$i;
			$struct_data['Node_Name'] = $data['Node_Name'];
			$struct_data['Node_Type'] = 'Structural';
			$struct_data['Prev_Node'] = $data['Node_ID'];
			$struct_data['Trigger_Ques'] =$Q_ID;
			$struct_data['Trigger_AnsOp'] = $i+$OP_Num;	
			$this->db->insert('AttributeNodeTable',$struct_data);
		}

	}
	public function get_nodeposition()
	{
		$query = $this->db->get('Node_Position');
		foreach($query->result() as $row)
		{
			$node_id  = $row->Node_ID;
			$node_pos[$node_id] = $row->Node_Pos;


		}
		return $node_pos;
	}

	public function get_nodebyposition()
	{
		$query = $this->db->get('Node_Position');
		foreach($query->result() as $row)
		{
			$node_pos = $row->Node_Pos;
			$node_id[$node_pos]  = $row->Node_ID;
		}
		return $node_id;

	}
	public function get_attrnodeposition()
	{
		$query = $this->db->get('Attr_Position');
		foreach($query->result() as $row)
		{
			$node_id  = $row->Node_ID;
			$node_pos[$node_id] = $row->Node_Pos;


		}
		return $node_pos;
	}
	public function get_allquestions()
	{
		$query = $this->db->get('QUESTIONTABALE');
		$i=0;
		foreach ($query->result() as $row)
		{
			$question_id = $row->Q_ID;
			$data = $this->user_model->get_question($question_id);
			$question[$i] = $data['question'];
			$opt_num[$i]  = $data['opt_num'];
			if($opt_num[$i]!=0)
			{
				$option   = $data['option'];
				$option_content[$i] = $this->user_model->get_options($option,$opt_num[$i]);
			}
			else
			{
				$option_content[$i] = 0;

			}
			$i++;
		}
		$data1['option_content'] = $option_content;
		$data1['question'] = $question;
		$data1['opt_num'] = $opt_num;
		return $data1;
	}
	public function insert_position($position)
	{
		$this->db->select_max('Node_ID');
		$query = $this->db->get('NODETABLE');
		foreach($query->result() as $row)
		{
			$data['Node_ID'] = $row->Node_ID;
		}
		$data['Node_Pos'] = $position;
		$query = $this->db->get_where('Node_Position',array('Node_Pos =' => $data['Node_Pos']));
		$node_pos = $this->user_model->get_nodeposition();

		if($query->num_rows() == 0)
		{
			$this->db->insert('Node_Position',$data);
			return -1;
		}
		else
		{
			$this->db->insert('Node_Position',$data);
			$query1 = $this->db->get('Node_Position');
			$size = $query1->num_rows();
			foreach($query->result() as $row)
			{
				$node_id = $row->Node_ID;
			}
			for($i=1;$i<$size-1;$i++)
			{
				if($node_pos[$i] >= $data['Node_Pos'])
				{
					$node_pos[$i]++;
					$data1['Node_Pos'] = $node_pos[$i];
					$this->db->update('Node_Position',$data1,array('Node_ID =' => $i));
				}


			}

		}
	}
	public function insert_attrposition($num)
	{
		$this->db->select_max('Node_ID');
		$query = $this->db->get('AttributeNodeTable');
		foreach($query->result() as $row)
		{
			$data['Node_ID'] = $row->Node_ID-$num+1;
		}
		$data['Node_Pos'] = $this->input->post('node_position');
		$query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $data['Node_Pos']));
		$node_pos = $this->user_model->get_attrnodeposition();

		if($query->num_rows() == 0)
		{
			for($i=0;$i<$num;$i++)
			{
				$this->db->insert('Attr_Position',$data);
				$data['Node_ID']++;
				$data['Node_Pos']++;
			}
			return -1;
		}
		else
		{
			for($i=0;$i<$num;$i++)
			{
				$this->db->insert('Attr_Position',$data);
				$data['Node_ID']++;
				$data['Node_Pos']++;
			}
			//$this->db->insert('Attr_Position',$data);
			$query1 = $this->db->get('Attr_Position');
			$size = $query1->num_rows();
			foreach($query->result() as $row)
			{
				$node_id = $row->Node_ID;
			}
			$data['Node_Pos'] -= $num; 
			for($i=$node_id;$i<$size;$i++)
			{
				if($node_pos[$i] >= $data['Node_Pos'])
				{
					$node_pos[$i] = $node_pos[$i] + $num;
					$data1['Node_Pos'] = $node_pos[$i];
					$this->db->update('Attr_Position',$data1,array('Node_ID =' => $i));
				}


			}

		}
	}
	public function change_allbits($position)
	{
		//$position = $this->input->post('node_position');
		$query = $this->db->get('STRING');
		foreach($query->result() as $row)
		{
			$country_string      = $row->Country_String;
			$data1['CountryCode'] = $row->CountryCode;
			$data['Country_String'] = $this->user_model->shift_bitstring($country_string,$position);
			$this->db->update('STRING',$data,$data1);
		}
        $query = $this->db->get('college');
		foreach($query->result() as $row)
		{
			$coll_string      = $row->College_String;
			$data2['COLL_ID'] = $row->COLL_ID;
			$data3['College_String'] = $this->user_model->shift_bitstring($coll_string,$position);
			$this->db->update('college',$data3,$data2);
		}
		$query = $this->db->get('StructureAttribute');
		/*foreach($query->result() as $row)
		{
			$attr_string = $row->Attr_Bit_String;
			$data4['ID']   = $row->ID;
			$data5['Attr_Bit_String'] = $this->user_model->shift_bitstring($attr_string,$position);
			//$this->db->update('StructureAttribute',$data5,$data4);
		}*/
		$query = $this->db->get('UserCollegestring');
		foreach($query->result() as $row)
		{
			$user_string   = $row->Bit_String;
			$valid_string  = $row->Valid_String;
			$data6['ID']   = $row->ID;
			$data7['Bit_String'] = $this->user_model->shift_bitstring($user_string,$position);
			$data7['Valid_String'] = $this->user_model->shift_bitstring($valid_string,$position);
			$this->db->update('UserCollegestring',$data7,$data6);
		}

		return ;
	}

	public function change_allattrbits($num_pos)
	{
		
		$query = $this->db->get('StructureAttribute');
		foreach($query->result() as $row)
		{

			$attr_string = $row->Attr_Bit_String;
			$data4['ID']   = $row->ID;
			$position = $this->input->post('node_position');
			for($i=0;$i<$num_pos;$i++)
			{
				$data5['Attr_Bit_String'] = $this->user_model->shift_bitstring($attr_string,$position);
				$attr_string = $data5['Attr_Bit_String'];
				$position++;	
			}
			$this->db->update('StructureAttribute',$data5,$data4);
		}

		$query = $this->db->get('AttributeTable');
		foreach($query->result() as $row)
		{
			$position = $this->input->post('node_position');
			$Attr_String = $row->Attr_String;
			$data['CID'] = $row->CID;
			$data['COLL_ID'] = $row->COLL_ID;
			$data['Node_ID'] = $row->Node_ID;
			for($i=0;$i<$num_pos;$i++)
			{
				$data1['Attr_String'] = $this->user_model->shift_bitstring($Attr_String,$position);
				$Attr_String = $data1['Attr_String'];
				$position++;	
			}
			$this->db->update('AttributeTable',$data1,$data);
		}
		
		return;

	}

	public function shift_bitstring($string,$position)
	{
		$len = strlen($string);
		for ($i=0;$i<$len;$i++)
		{
			if($i > $position)
			{
				if($i != $len-1) $temp = $string[$i];
				$string[$i] = $prev;
				if($i != $len-1)$prev = $temp;
			}
			else if($i == $position)
			{
				if($i != $len -1) $prev = $string[$i];
				$string[$i] = 0;
			}
		}
		return $string;
	}

	public function enable_bit($position,$string)
	{
		for($i=0;$i<strlen($string);$i++)
		{
			$string[$position] = 1;
		}
		return $string;

	}

	public function disable_bit($position,$string)
	{
		for($i=0;$i<strlen($string);$i++)
		{
			$string[$position] = 0;
		}
		return $string;
	}

	public function child_bitchange($node_id,$string,$value){
		/*
		To change the child bitstring values to '0' or '1' depending on enable/disable recursively
		input: node_id
		output: Nothing
		*/
		//echo $value.'<br>';
		$query = $this->db->get_where('NODETABLE', array('Prev_Node =' => $node_id));
		$i = $query->num_rows();
		$j=0;
		foreach ($query->result() as $row){
			$child_node[$j] = $row->Node_ID;
			$j++;
		}
		if($i==0)
		{
			$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $node_id));
			foreach ($node_query->result() as $row)
			{
				$id = $row->Node_Pos;
			}
			if($value == 1) $string[$id] = 1;
			else $string[$id] = 0;
			return $string;
		}
		else
		{
			for($j=0;$j<sizeof($child_node);$j++)
			{
					$string = $this->user_model->child_bitchange($child_node[$j],$string,$value);
					$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $node_id));
					foreach ($node_query->result() as $row)
					{
						$id = $row->Node_Pos;
					}
					if($value == 1) $string[$id] = 1;
					else $string[$id] = 0;
			}
			return $string;
		}
		return $string;
	}

	/*public function parent_bitchange($node_id,$string,$value){
		/*
		To change the child bitstring values to '0' or '1' depending on enable/disable recursively
		input: node_id
		output: Nothing

		//echo $value.'<br>';
		$query_parent = $this->db->get_where('NODETABLE',array('Node_ID =' => $node_id));
		foreach ($query_parent as $row)
		{
			$node_id = $row->Prev_Node;
			$node_type = $row->Node_Type;
		}
		if($node_type == 'Structural')
		{
			$query1_parent = $this->db->get_where('NODETABLE',array('Node_ID =' => $node_id));
			foreach ($query1_parent as $row)
			{
				$node_id = $row->Prev_Node;
				$node_type = $row->Node_Type;
			}
		}
		$query = $this->db->get_where('NODETABLE', array('Prev_Node =' => $node_id));
		$i = $query->num_rows();
		$j=0;
		foreach ($query->result() as $row){
			$child_node[$j] = $row->Node_ID;
			$j++;
		}
		if($i==0)
		{
			$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $node_id));
			foreach ($node_query->result() as $row)
			{
				$id = $row->Node_Pos;
			}
			if($value == 1) $string[$id] = 1;
			else $string[$id] = 0;
			return $string;
		}
		else
		{
			for($j=0;$j<sizeof($child_node);$j++)
			{
					$string = $this->user_model->parent_bitchange($child_node[$j],$string,$value);
					$node_query = $this->db->get_where('Node_Position',array('Node_ID =' => $node_id));
					foreach ($node_query->result() as $row)
					{
						$id = $row->Node_Pos;
					}
					if($value == 1) $string[$id] = 1;
					else $string[$id] = 0;
			}
			return $string;
		}
		return $string;
	}*/

	public function enable_collegebit($position,$college,$country_code)
	{
		$college=str_ireplace("%20"," ",$college);
		$country_code = str_ireplace("%20"," ",$country_code);
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country_code));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $position));

		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}

		$query = $this->db->get_where('college',array('COLL_NAME ='   => $college,
											 		  'CountryCode =' => $country_code));
		foreach($query->result() as $row)
		{
			$coll_string = $row->College_String;
			$data['COLL_ID'] = $row->COLL_ID;
			$coll_string = $this->user_model->child_bitchange($id,$coll_string,1);
			$coll_string[$position] = 1;
			$data1['College_String']= $coll_string;
			$this->db->update('college',$data1,$data);


		}

		$query2 = $this->db->get_where('UserCollegestring',$data);
		foreach($query2->result() as $row)
		{
			$bit_string = $row->Bit_String;
			$bit_string = $this->user_model->child_bitchange($id,$bit_string,1);
			$bit_string[$position] = 1;
			$data2['Bit_String'] = $bit_string;
			$this->db->update('UserCollegestring',$data2,$data);
		}

		$query = $this->db->get_where('STRING',array('CountryCode =' => 'Int'));
		foreach($query->result() as $row)
		{
			$glob_string = $row->Country_String;
			$data3['CountryCode'] = $row->CountryCode;
			if($glob_string[$position] == 0)
			{
				$glob_string = $this->user_model->child_bitchange($id,$glob_string,1);
				$glob_string[$position] = 1;
				$data4['Country_String'] = $glob_string;
				$this->db->update('STRING',$data4,$data3);
			}

		}
		return ;

	}

	public function disable_collegebit($position,$college,$country_code)
	{
		$college=str_ireplace("%20"," ",$college);
		$country_code = str_ireplace("%20"," ",$country_code);
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country_code));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query = $this->db->get_where('college',array('COLL_NAME ='   => $college,
											 		  'CountryCode =' => $country_code));
		foreach($query->result() as $row)
		{
			$coll_string = $row->College_String;
			$data['COLL_ID'] = $row->COLL_ID;
			$coll_string = $this->user_model->child_bitchange($id,$coll_string,0);
			$coll_string[$position] = 0;
			$data1['College_String']= $coll_string;
			$this->db->update('college',$data1,$data);

		}
		$query2 = $this->db->get_where('UserCollegestring',$data);
		foreach($query2->result() as $row)
		{
			$bit_string = $row->Bit_String;
			$bit_string = $this->user_model->child_bitchange($id,$bit_string,0);
			$bit_string[$position] = 0;
			$data2['Bit_String'] = $bit_string;
			$this->db->update('UserCollegestring',$data2,$data);
		}
		return ;

	}

	public function enable_countrybit($position,$country_code)
	{
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country_code));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query = $this->db->get_where('STRING',array('CountryCode =' => $country_code));
		foreach($query->result() as $row)
		{
			$con_string = $row->Country_String;
			$data['CountryCode'] = $row->CountryCode;
			$con_string = $this->user_model->child_bitchange($id,$con_string,1);
			$con_string[$position] = 1;
			$data1['Country_String'] = $con_string;
			$this->db->update('STRING',$data1,$data);
		}
		$query = $this->db->get_where('college',array('CountryCode =' => $country_code));
		foreach($query->result() as $row)
		{
			$coll_string = $row->College_String;
				$data2['COLL_ID'] = $row->COLL_ID;
				$query_user = $this->db->get_where('UserCollegestring',$data2);
				foreach($query_user->result() as $user_row)
				{
					$bit_string = $user_row->Bit_String;
					$bit_string = $this->user_model->child_bitchange($id,$bit_string,1);
					$bit_string[$position] = 1;
					$data4['Bit_String'] = $bit_string;
					$this->db->update('UserCollegestring',$data4,$data2);
				}
				$coll_string = $this->user_model->child_bitchange($id,$coll_string,1);
				$coll_string[$position] = 1;
				$data3['College_String']= $coll_string;
				$this->db->update('college',$data3,$data2);

		}
		$query = $this->db->get_where('STRING',array('CountryCode =' => 'Int'));
		foreach($query->result() as $row)
		{
			$glob_string = $row->Country_String;
			$data5['CountryCode'] = $row->CountryCode;
			if($glob_string[$position] == 0)
			{
				$glob_string = $this->user_model->child_bitchange($id,$glob_string,1);
				$glob_string[$position] = 1;
				$data4['Country_String'] = $glob_string;
				$this->db->update('STRING',$data4,$data5);
			}

		}
		return ;

	}

	public function disable_countrybit($position,$country_code)
	{
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country_code));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query = $this->db->get_where('STRING',array('CountryCode =' => $country_code));
		foreach($query->result() as $row)
		{
			$con_string = $row->Country_String;
				$data['CountryCode'] = $row->CountryCode;
				$con_string = $this->user_model->child_bitchange($id,$con_string,0);
				$con_string[$position] = 0;
				$data1['Country_String'] = $con_string;
				$this->db->update('STRING',$data1,$data);
		}
		$query = $this->db->get_where('college',array('CountryCode =' => $country_code));
		foreach($query->result() as $row)
		{
			$coll_string = $row->College_String;
				$data2['COLL_ID'] = $row->COLL_ID;
				$query_user = $this->db->get_where('UserCollegestring',$data2);
				foreach($query_user->result() as $user_row)
				{
					$bit_string = $user_row->Bit_String;
					$bit_string = $this->user_model->child_bitchange($id,$bit_string,0);
					$bit_string[$position] = 0;
					$data4['Bit_String'] = $bit_string;
					$this->db->update('UserCollegestring',$data4,$data2);
				}
				$coll_string = $this->user_model->child_bitchange($id,$coll_string,0);
				$coll_string[$position] = 0;
				$data3['College_String']= $coll_string;
				$this->db->update('college',$data3,$data2);

		}
		return ;
	}

	public function enable_globcountrybit($position,$country_code)
	{
		$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query1 = $this->db->get('Country');
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
			$query = $this->db->get_where('STRING',array('CountryCode =' => $country_code));
			foreach($query->result() as $row)
			{
				$con_string = $row->Country_String;
				$data['CountryCode'] = $row->CountryCode;
				$con_string = $this->user_model->child_bitchange($id,$con_string,1);
				$con_string[$position] = 1;
				$data1['Country_String'] = $con_string;
				$this->db->update('STRING',$data1,$data);
			}
			$query = $this->db->get_where('college',array('CountryCode =' => $country_code));
			foreach($query->result() as $row)
			{
				$coll_string = $row->College_String;
				$data2['COLL_ID'] = $row->COLL_ID;
				$query_user = $this->db->get_where('UserCollegestring',$data2);
				foreach($query_user->result() as $user_row)
				{
					$bit_string = $user_row->Bit_String;
					$bit_string = $this->user_model->child_bitchange($id,$bit_string,1);
					$bit_string[$position] = 1;
					$data4['Bit_String'] = $bit_string;
					$this->db->update('UserCollegestring',$data4,$data2);
				}
				$coll_string = $this->user_model->child_bitchange($id,$coll_string,1);
				$coll_string[$position] = 1;
				$data3['College_String']= $coll_string;
				$this->db->update('college',$data3,$data2);

			}
		}
		return ;

	}

	public function disable_globcountrybit($position,$country_code)
	{
		$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query1 = $this->db->get('Country');
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
			$query = $this->db->get_where('STRING',array('CountryCode =' => $country_code));
			foreach($query->result() as $row)
			{
				$con_string = $row->Country_String;
				$data['CountryCode'] = $row->CountryCode;
				$con_string = $this->user_model->child_bitchange($id,$con_string,0);
				$con_string[$position] = 0;
				$data1['Country_String'] = $con_string;
				$this->db->update('STRING',$data1,$data);
			}
			$query = $this->db->get_where('college',array('CountryCode =' => $country_code));
			foreach($query->result() as $row)
			{
				$coll_string = $row->College_String;
				$data2['COLL_ID'] = $row->COLL_ID;
				$query_user = $this->db->get_where('UserCollegestring',$data2);
				foreach($query_user->result() as $user_row)
				{
					$bit_string = $user_row->Bit_String;
					$bit_string = $this->user_model->child_bitchange($id,$bit_string,0);
					$bit_string[$position] = 0;
					$data4['Bit_String'] = $bit_string;
					$this->db->update('UserCollegestring',$data4,$data2);
				}
				$coll_string = $this->user_model->child_bitchange($id,$coll_string,0);
				$coll_string[$position] = 0;
				$data3['College_String']= $coll_string;
				$this->db->update('college',$data3,$data2);

			}
		}
		return ;

	}



	public function get_collegestring($college,$country_code)
	{
		$college=str_ireplace("%20"," ",$college);
		$country_code = str_ireplace("%20"," ",$country_code);
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country_code));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$query = $this->db->get_where('college',array('COLL_NAME ='   => $college,
											 		  'CountryCode =' => $country_code));
		if($query->num_rows() == 0)
		{
			$coll_string[0] = 1;
			return $coll_string;
		}
		else
		{
			foreach($query->result() as $row)
			{
				$coll_string = $row->College_String;
			}
			return $coll_string;
		}
	}

	public function get_countrystring($country_code)
	{
		$country_code = str_ireplace("%20"," ",$country_code);
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country_code));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
			$flag = 1;
		}
		$query = $this->db->get_where('STRING',array('CountryCode =' => $country_code));
		if($query->num_rows() == 0)
		{
			if($flag == 1)
			{
				$query_con = $this->db->get_where('STRING',array('CountryCode =' => 'Int'));
				$data['CountryCode'] = $country_code;
				foreach($query_con->result() as $con_row)
				{
					//echo $con_row->Country_String;
					$data['Country_String']	= $con_row->Country_String;
					$this->db->insert('STRING',$data);
				}
				return $data['Country_String'];
			}
			else
			{
				$country_string[0] = -1;
				return $country_string;
			}

		}
		else
		{
			foreach($query->result() as $row)
			{
				$country_string = $row->Country_String;
			}
			return $country_string;
		}
	}
	public function get_alloptions()
	{
		$query = $this->db->get('OPTIONTABLE');
		$i = 0;
		foreach($query->result() as $row)
		{
			//echo 'charan';
			$options[$i] = $row->OP_Text;
			$i++;
		}
		return $options;
	}
	public function insert_question($id,$node_type)
	{

		$data2 = $this->user_model->get_question($id);
		if($data2['opt_num'] == -1)
		{
			$data1['Q_ID'] = $id;
			$data1['Q_Text'] = $this->input->post('new_ques');
			$data1['Option_Num'] = $this->input->post('trigger_ans');
			for($i=1;$i<=$data1['Option_Num'];$i++)
			{
				$opt = 'Op';
				$opt = $opt.$i;
				$option = 'option';
				$option = $option.$i;
				$data1[$opt] = $this->input->post($option);
			}
			$this->db->insert('QUESTIONTABALE',$data1);
			return $data1['Option_Num'];
		}
		else if($node_type == 'Structural')
		{
			$opt_num = $this->input->post('trigger_ans');
			$data3['Option_Num'] = $data2['opt_num'] + $opt_num;
			for($i=$data2['opt_num']+1;$i<=$data3['Option_Num'];$i++)
			{

				$opt = 'Op';
				$opt = $opt.$i;
				$option = 'option';
				$option = $option.($i-$data2['opt_num']);
				$data3[$opt] = $this->input->post($option);
			}
			$this->db->update('QUESTIONTABALE',$data3,$data4);
			return $data3['Option_Num'];
		}
		else
		{
			return $data2['opt_num'];
		}
	}



	public function get_node_attr($node_id,$country)
	{
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}

		$query = $this->db->get_where('StructureAttribute',array('Node_ID ='  => $node_id,
																 'CountryCode'=> $country_code));

		if($query->num_rows() == 0)
		{
			$query_glob = $this->db->get_where('StructureAttribute',array('Node_ID ='  => $node_id,
																 		  'CountryCode'=> 'Int'));
			if($query_glob->num_rows() == 0)
			{
				$data['Node_ID'] = $node_id;
				$data['CountryCode'] = $country_code;
				$this->db->insert('StructureAttribute',$data);
				$data1['Node_ID'] = $node_id;
				$data1['CountryCode'] = 'Int';
				$this->db->insert('StructureAttribute',$data1);
				$query_coll = $this->db->get_where('StructureAttribute',array('Node_ID ='  => $node_id,
																 	'CountryCode'=> $country_code));
				foreach ($query_coll->result() as $row)
				{
					$string = $row->Attr_Bit_String;
				}
				return $string;
			}

			foreach($query_glob->result() as $row)
			{
				$string = $row->Attr_Bit_String;
				$data['Node_ID'] = $node_id;
				$data['Attr_Bit_String'] = $string;
				$data['CountryCode'] = $country_code;
				$this->db->insert('StructureAttribute',$data);
				return $string;
			}

		}
		foreach($query->result() as $row)
		{
			$string = $row->Attr_Bit_String;
		}
		return $string;
	}

	public function enable_country_attrbit($position,$country,$node_id)
	{
		$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$data['Node_ID'] = $node_id;
		$data['CountryCode'] = $country_code;
		$query = $this->db->get_where('StructureAttribute',$data);
		foreach($query->result() as $row)
		{
			$con_string = $row->Attr_Bit_String;
			$con_string[$position] = 1;
			$con_string = $this->user_model->child_attr_bitchange($id,$con_string,1);
			$data2['Attr_Bit_String']= $con_string;
			$this->db->update('StructureAttribute',$data2,$data);
		}

		$query = $this->db->get_where('AttributeTable',array('Node_ID =' => $node_id));
		foreach($query->result() as $row)
		{
			$data4['ID'] = $row->ID;
			$coll_id = $row->COLL_ID;
			$query_college = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
			foreach($query_college->result() as $college_row)
			{
				$coll_country = $college_row->CountryCode;
				if($coll_country == $country_code)
				{
					$string = $row->Attr_String;
					$string = $this->user_model->child_attr_bitchange($id,$string,1);
					$string[$position] = 1;
					$data3['Attr_String'] = $string;
					$this->db->update('AttributeTable',$data3,$data4);
				}
			}
		}
		return ;
	}
	public function disable_country_attrbit($position,$country,$node_id)
	{
		$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query1 = $this->db->get_where('Country',array('Country_Name =' => $country));
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
		}
		$data['Node_ID'] = $node_id;
		$data['CountryCode'] = $country_code;
		$query = $this->db->get_where('StructureAttribute',$data);
		foreach($query->result() as $row)
		{
			$con_string = $row->Attr_Bit_String;
			$con_string[$position] = 0;
			$con_string = $this->user_model->child_attr_bitchange($id,$con_string,0);
			$data2['Attr_Bit_String']= $con_string;
			$this->db->update('StructureAttribute',$data2,$data);
		}

		$query = $this->db->get_where('AttributeTable',array('Node_ID =' => $node_id));
		foreach($query->result() as $row)
		{
			$data4['ID'] = $row->ID;
			$coll_id = $row->COLL_ID;
			$query_college = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
			foreach($query_college->result() as $college_row)
			{
				$coll_country = $college_row->CountryCode;
				if($coll_country == $country_code)
				{
					$string = $row->Attr_String;
					$string = $this->user_model->child_attr_bitchange($id,$string,0);
					$string[$position] = 0;
					$data3['Attr_String'] = $string;
					$this->db->update('AttributeTable',$data3,$data4);
				}
			}
		}
		return ;
	}

	public function child_attr_bitchange($node_id,$string,$value){
		/*
		To change the child bitstring values to '0' or '1' depending on enable/disable recursively
		input: node_id
		output: Nothing
		*/
		//echo $value.'<br>';
		$query = $this->db->get_where('AttributeNodeTable', array('Prev_Node =' => $node_id));
		$i = $query->num_rows();
		$j=0;
		foreach ($query->result() as $row){
			$child_node[$j] = $row->Node_ID;
			$j++;
		}
		if($i==0)
		{
			$node_query = $this->db->get_where('Attr_Position',array('Node_ID =' => $node_id));
			foreach ($node_query->result() as $row)
			{
				$id = $row->Node_Pos;
			}
			if($value == 1) $string[$id] = 1;
			else $string[$id] = 0;
			return $string;
		}
		else
		{
			for($j=0;$j<sizeof($child_node);$j++)
			{
				$string = $this->user_model->child_attr_bitchange($child_node[$j],$string,$value);
				$node_query = $this->db->get_where('Attr_Position',array('Node_ID =' => $node_id));
				foreach ($node_query->result() as $row)
				{
					$id = $row->Node_Pos;
				}
				if($value == 1) $string[$id] = 1;
				else $string[$id] = 0;
			}
			return $string;
		}
		return $string;
	}

	public function enable_glob_attrbit($position,$country,$node_id)
	{
		$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query1 = $this->db->get('Country');
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
			$data['Node_ID'] = $node_id;
			$data['CountryCode'] = $country_code;
			$query = $this->db->get_where('StructureAttribute',$data);
			if($query->num_rows() == 0)
			{
				$query_glob = $this->db->get_where('StructureAttribute',array('CountryCode =' => 'Int',
																			  'Node_ID =' => $node_id));
				foreach($query_glob->result() as $row)
				{
					$data_glob['CountryCode'] = $country_code;
					$data_glob['Node_ID'] = $node_id;
					$con_string = $row->Attr_Bit_String;
					$con_string = $this->user_model->child_attr_bitchange($id,$con_string,1);
					$con_string[$position] = 1;
					$data_glob['Attr_Bit_String'] = $con_string;
					$this->db->insert('StructureAttribute',$data_glob);
				}
			}
			foreach($query->result() as $row)
			{
				$con_string = $row->Attr_Bit_String;
				$data1['ID'] = $row->ID;
				$con_string[$position] = 1;
				$con_string = $this->user_model->child_attr_bitchange($id,$con_string,1);
				$data2['Attr_Bit_String']= $con_string;
				$this->db->update('StructureAttribute',$data2,$data1);
			}

			$query = $this->db->get_where('AttributeTable',array('Node_ID =' => $node_id));
			foreach($query->result() as $row)
			{
				$data4['ID'] = $row->ID;
				$coll_id = $row->COLL_ID;
				$query_college = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
				foreach($query_college->result() as $college_row)
				{
					$coll_country = $college_row->CountryCode;
					if($coll_country == $country_code)
					{
						$string = $row->Attr_String;
						$string = $this->user_model->child_attr_bitchange($id,$string,1);
						$string[$position] = 1;
						$data3['Attr_String'] = $string;
						$this->db->update('AttributeTable',$data3,$data4);
					}
				}
			}
		}
		return ;
	}
	public function disable_glob_attrbit($position,$country,$node_id)
	{
		$node_query = $this->db->get_where('Attr_Position',array('Node_Pos =' => $position));
		foreach ($node_query->result() as $row)
		{
			$id = $row->Node_ID;
		}
		$query1 = $this->db->get('Country');
		foreach($query1->result() as $row)
		{
			$country_code = $row->Country_Code;
			$data['Node_ID'] = $node_id;
			$data['CountryCode'] = $country_code;
			$query = $this->db->get_where('StructureAttribute',$data);
			if($query->num_rows() == 0)
			{
				$query_glob = $this->db->get_where('StructureAttribute',array('CountryCode =' => 'Int'));
				foreach($query_glob->result() as $row)
				{
					$data_glob['CountryCode'] = $country_code;
					$data_glob['Node_ID'] = $node_id;
					$con_string = $row->Attr_Bit_String;
					$con_string = $this->user_model->child_attr_bitchange($id,$con_string,0);
					$con_string[$position] = 0;
					$data_glob['Attr_Bit_String'] = $con_string;
					$this->db->insert('StructureAttribute',$data_glob);
				}
			}
			foreach($query->result() as $row)
			{
				$con_string = $row->Attr_Bit_String;
				$data1['ID'] = $row->ID;
				$con_string = $this->user_model->child_attr_bitchange($id,$con_string,0);
				$con_string[$position] = 0;
				$data2['Attr_Bit_String']= $con_string;
				$this->db->update('StructureAttribute',$data2,$data1);
			}

			$query = $this->db->get_where('AttributeTable',array('Node_ID =' => $node_id));
			foreach($query->result() as $row)
			{
				$data4['ID'] = $row->ID;
				$coll_id = $row->COLL_ID;
				$query_college = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
				foreach($query_college->result() as $college_row)
				{
					$coll_country = $college_row->CountryCode;
					if($coll_country == $country_code)
					{
						$string = $row->Attr_String;
						$string = $this->user_model->child_attr_bitchange($id,$string,0);
						$string[$position] = 0;
						$data3['Attr_String'] = $string;
						$this->db->update('AttributeTable',$data3,$data4);
					}
				}
			}
		}
		return ;
	}

	public function addoptions($option)
	{
		$data['OP_Text'] = $option;
		//echo $data['OP_Text'];
		$this->db->insert('OPTIONTABLE',$data);
		return;
	}

	public function changenode_name($id,$name)
	{
		$data['Node_ID'] = $id;
		$data1['Node_Name'] = $name;
		$this->db->update('NODETABLE',$data1,$data);
		return;
	}

	public function change_attrnode_name($id,$name)
	{
		$data['Node_ID'] = $id;
		$data1['Node_Name'] = $name;
		$this->db->update('AttributeNodeTable',$data1,$data);
		return;
	}

	public function temp_structureattr()
	{
		$data['NODE_ID'] = 0;
		$data['CountryCode'] = 'Int';
		$this->db->insert('StructureAttribute',$data);
		for($i=2;$i<=1022;$i = $i+4)
		{
			$data['NODE_ID'] = $i;
			$this->db->insert('StructureAttribute',$data);
		}
		return ;
	}

	/*public function add_tempnodes()
	{
		$this->db->select_max('Node_ID');
		$query = $this->db->get('NODETABLE');
		foreach($query->result() as $row)
		{
			$node = $row->Node_ID - 12;

		}


		$query1 = $this->db->get_where('NODETABLE',array('Node_ID >' => $node));
		$i=0;
		foreach ($query1->result() as $row)
		{
			$data[$i]['Node_ID'] = $row->Node_ID + 12;
			$data[$i]['Node_Tier'] = $row->Node_Tier;
			$data[$i]['Node_Name'] = $row->Node_Name;
			$data[$i]['Node_Type'] = $row->Node_Type;
			$data[$i]['Trigger_Ques'] = $row->Trigger_Ques + 3;
			if($data[$i]['Node_Type'] == 'Decision')
			{
				$data[$i]['Prev_Node'] = $row->Prev_Node + 4;
			}
			else
			{
				$data[$i]['Prev_Node'] = $row->Prev_Node + 12;
				$data[$i]['Trigger_AnsOp'] = $row->Trigger_AnsOp;
			}
			$i++;
		}
		for($i=0;$i<12;$i++)
		{
			//$this->db->insert('NODETABLE',$data[$i]);
		}
		print_r($data['0']);
		echo '<br>';
		print_r($data['1']);
		echo '<br>';
		print_r($data['2']);
		echo '<br>';
		print_r($data['3']);

		echo '<br>';
		print_r($data['4']);
		echo '<br>';
		print_r($data['5']);
		echo '<br>';
		print_r($data['6']);
		echo '<br>';
		print_r($data['7']);

		echo '<br>';
		print_r($data['8']);
		echo '<br>';
		print_r($data['9']);
		echo '<br>';
		print_r($data['10']);
		echo '<br>';
		print_r($data['11']);

		echo '<br>';
	return;

	}

	public function add_majornodes($node_data)
	{
		for($j=0;$j<121;$j++)
		{
			$nodename = $node_data[$j]['major'];
			$nodename = ucfirst(strtolower($nodename));
			$nodename =str_ireplace("%20"," ",$nodename);
			$this->db->select_max('Node_ID');
			$query = $this->db->get('NODETABLE');
			foreach($query->result() as $row)
			{
				$node = $row->Node_ID - 4;

			}
			$query1 = $this->db->get_where('NODETABLE',array('Node_ID >' => $node));
			$i=0;
			foreach ($query1->result() as $row)
			{
				$data[$i]['Node_ID'] = $row->Node_ID + 4;
				$data[$i]['Node_Tier'] = $row->Node_Tier;
				if($i == 0)
				{
					$data[$i]['Node_Name'] = $row->Node_Name;
				}
				else
				{
					if($i == 1) $val = 'Yes_';
					else if($i == 2) $val = 'No_';
					else if($i == 3) $val = 'NotSure_';
					$data[$i]['Node_Name'] = $val.$nodename;
				}
				$data[$i]['Node_Type'] = $row->Node_Type;
				$data[$i]['Trigger_Ques'] = $row->Trigger_Ques + 1;
				if($data[$i]['Node_Type'] == 'Decision')
				{
					//$data[$i]['Prev_Node'] = $row->Prev_Node+12;
					$data[$i]['Prev_Node'] = $node_data[$j]['Prev_Node'];

				}
				else
				{
					$data[$i]['Prev_Node'] = $row->Prev_Node + 4;
					$data[$i]['Trigger_AnsOp'] = $row->Trigger_AnsOp;
				}
				$i++;
			}
			for($k=0;$k<4;$k++)
			{
				//$this->db->insert('NODETABLE',$data[$k]);
			}

			print_r($data['0']);
			echo '<br>';
			print_r($data['1']);
			echo '<br>';
			print_r($data['2']);
			echo '<br>';
			print_r($data['3']);

			echo '<br>';
			echo '<br>';
			echo '<br>';


		}


	}
	public function temp_getdec()
	{
		$query = $this->db->get_where('NODETABLE',array('Trigger_Ques >=' =>65,
											   	'Node_Type =' => 'Structural',
											   	'Trigger_AnsOp =' => 1));
		$i=0;
		foreach($query->result() as $row)
		{
			$node_id[$i] = $row->Node_ID;
			$i++;
		}
		for($i=0;$i<sizeof($node_id);$i++)
		{
			//echo $node_id[$i].'<br>';
		}
		return $node_id;

	}
	public function temp_addstree($node)
	{
		for($i=0;$i<sizeof($node);$i++)
		{
			$data['Node_ID'] = $node[$i];
			$data['CountryCode'] = 'Int';
			//$this->db->insert('StructureAttribute',$data);
			print_r($data);
			echo '<br>';
		}
		return;
	}
	public function add_tempnodeposition()
	{
		for($i=600;$i<1025;$i++)
		{
			$data['Node_ID'] = $i;
			$data['Node_Pos'] = $i;
			$this->db->insert('Node_Position',$data);
		}
	}

	public function add_tempquestions($content)
	{
		$this->db->select_max('Q_ID');
		$query = $this->db->get('QUESTIONTABALE');
		foreach ($query->result() as $row)
		{
			$id = $row->Q_ID;
		}
		echo $id;
		for($i=$id+1,$j=0;$i<$id+122;$i++,$j++)
		{
			$data['Q_ID'] = $i;
			$data['Q_Text'] = $content[$j];
			$data['Option_Num'] = 3;
			$data['Op1'] = 1;
			$data['Op2'] = 2;
			$data['Op3'] = 3;
			$this->db->insert('QUESTIONTABALE',$data);
			print_r($data);
			echo '<br>';
		}


	}
	public function get_pgdegrees()
	{
		$query = $this->db->get('Pg_Degrees');
		$i=0;
		foreach($query->result() as $row)
		{
			$data[$i]['Prev_Node'] = $row->PG_Stream;
			$data[$i]['major'] = $row->PG_Major;
			$i++;
		}
		return $data;
	}*/

	public function temp_insertclub()
	{
		/*for($i=1;$i<=64;$i++)
		{
			if($i%4 !=1)
			{
			$data['Node_ID'] = $i;
			$data1['Club_ID'] = 0;
			$this->db->update('NODETABLE',$data1,$data);
			}
		}*/
		$i = 5;
		$club_id = 1;
		$this->db->select('*');
		$this->db->from('NODETABLE');
		$this->db->join('Node_Position','NODETABLE.Node_ID = Node_Position.Node_ID');
		$this->db->join('Club_Questions','NODETABLE.Club_ID = Club_Questions.Club_ID');
		$this->db->where('NODETABLE.Club_ID =', $club_id);
		$this->db->where('Node_Pos >=', $i);
		$club_query = $this->db->get();
		$i=1;
		$num_rows = $club_query->num_rows();
		if($num_rows >= 5) $opt_num = 6;
		else $opt_num = $num_rows + 1;
		$option_content[0] = 'checkbox';
		foreach ($club_query->result() as $row)
		{
			$question_id = $row->Club_QID;
			$node =  $row->Node_ID;
			$position = $row->Node_Pos;
			if($i<6)
			{
				$this->db->select('Node_Name');
				$child_query = $this->db->get_where('NODETABLE',array('Prev_Node =' 	=> $node,
													   				  'Trigger_AnsOp =' => 1));
				foreach ($child_query->result() as $child_row)
				{
					$node_name = $child_row->Node_Name;
					$option_content[$i] = str_replace('Yes_', "", $node_name);
					$i++;
				}
			}
		}
		$data = $this->user_model->get_question($question_id);
		$question = $data['question'];
		echo $question;
		print_r($option_content);
	}



	/*
		$type = 1 => Structural
		$type = 2 => Attributes
	*/
	public function add_checkboxdata($answer_option,$type)
	{
		$ques_data = $this->user_model->get_question(1);
		$option   = $ques_data['option'];
		$option_content = $this->user_model->get_options($option,3);
		$session_data['option_content'] = $option_content;
		$this->session->set_userdata($session_data);
		for($i=0;$i<sizeof($answer_option);$i++)
		{

			if($type == 1)
			{
				if($answer_option[$i] == 0) $this->user_model->update_nodeanswer(1);
				else $this->user_model->update_nodeanswer(0);	
			}
			else
			{
				if($answer_option[$i] == 0) $this->user_model->update_attrnodeanswer(1);
				else $this->user_model->update_attrnodeanswer(0);
			}
			
		}

	}

	public function add_clubnode()
	{
		/*for($i=70,$j=14;$i<=250;$i=$i+12)
		{
			$query = $this->db->get_where('NODETABLE',array('Prev_Node =' => $i));
			if($query->num_rows() != 0)
			{
				$j++;
			}
			foreach($query->result() as $row)
			{
				$data['Node_ID'] = $row->Node_ID;
				$data1['Club_ID'] = $j;
				echo $row->Node_Name;
				echo $i;
				print_r($data);
				$this->db->update('NODETABLE',$data1,$data);


			}
				echo '<br>';

		}*/
		/*for($i=2;$i<=30;$i++)
		{
			$data['Club_ID'] = $i;
			$data['Club_QID'] = 259+$i;
			$this->db->insert('Club_Questions',$data);
		}*/
		$data['Q_Text'] = "Which of the following are majors in the above programme?";
		for($i=261;$i<=290;$i++)
		{
			$data['Q_ID'] = $i;
			$data['Option_Num'] = 0;
			$this->db->insert('QUESTIONTABALE',$data);
		}
		return;
	}
	public function check_collid($coll_id)
	{
		$query = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
		if($query->num_rows() == 0) return 0;
		else return 1;

	}

	public function check_userid($cid)
	{
		$query = $this->db->get_where('users',array('id =' => $cid));
		if($query->num_rows() == 0) return 0;
		else return 1;

	}

	public function add_bulkdata()
	{
		$bulk_num = 0;
		$data1['CountryCode'] = 'psych';
		$query_psycho = $this->db->get_where('STRING',$data1);
		foreach($query_psycho->result() as $row)
		{
			$psycho_string = $row->Country_String;
		}
		$query = $this->db->get('Bulk_Upload');
		foreach ($query->result() as $row)
		{
			if($bulk_num <=20)
			{
				$cid = $row->CID;
				$coll_id = $row->Coll_ID;
				$string = $row->Answer_String;
				$data['CID'] = $cid;
				$data['NA'] = 0;
				$data['S_Node'] = 0;
				$data['P_Node'] = 0;
				$data['COLL_ID'] = $coll_id;
				$data['VAL_TYPE'] = 0;
				$data['TEXT_VAL'] = 0;
				$data['NUM_VAL_UNIT'] = 0;
				$data['YEAR_START'] = 0;
				$data['YEAR_END'] = 0;
				if($this->user_model->check_userid($cid) == 0){
					$email = $cid.'@scholargraph.com';
					$data_user = array(
						'id' 		=> $cid,
						'email'  	=> $email,
						'password'	=> '0af96f7279c1db4bed95dad7fb72fba2',
						'ref_email' => '',
						);
					$this->db->insert('users',$data_user);
				}
				if($this->user_model->check_collid($coll_id) == 0){
					$final_string = $this->user_model->get_finalstring('in'); //get final string using global and country bit strings

					$final_string[0] = 0;
					$data_college = array(
						'COLL_ID'		=> $coll_id,
						'COLL_NAME'  	=> 'College'.$coll_id,
						'CountryCode'	=> 'in',
						'College_String'	=> $final_string
						);
					$this->db->insert('college',$data_college);

				}
				$query1 = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
				foreach($query1->result() as $row)
				{
					$college1 = $row->COLL_NAME;
					$countrycode = $row->CountryCode;
					$college_string = $row->College_String;
				}
				$data1 = array(
					'CID'     => $cid,
					'COLL_ID' => $coll_id,
					'Bit_String' => $college_string,
					);
				$session_data['cid'] = $cid;
				$session_data['college1'] = $college1;
				$session_data['country_code'] = $countrycode;
				$session_data['answer_string'] = $college_string;
				$session_data['psycho_string'] = $psycho_string;



				//Assuming only yes,no,notsure options
				$ques_data = $this->get_question(1);
				$option   = $ques_data['option'];
				$option_content = $this->user_model->get_options($option,3);
				$session_data['option_content'] = $option_content;
				$this->session->set_userdata($session_data);

				$this->db->insert('UserCollegestring',$data1);
				$this->db->insert('table1',$data);
				$nodeid = $this->user_model->get_nodebyposition();
				$length = strlen($college_string);
				for($i=1;$i<$length;$i++)
				{
					$answer_string = $this->session->answer_string;
					if($answer_string[$i] == 1 && $psycho_string[$i] == 0)
					{
						$node_id = $nodeid[$i];
						$ques_query = $this->db->get_where('NODETABLE',array('Node_ID =' => $node_id));
						foreach($ques_query->result() as $ques_row)
						{
							$q_id = $ques_row->Trigger_Ques;
							$node_name[0] = $ques_row->Node_Name;
						}
						$sess_data = $this->session->set_userdata;
						$sess_data['parent'] = $node_name;
						$this->session->set_userdata($sess_data);
						if($string[$q_id] == 0 ) $this->user_model->update_nodeanswer(1);
						else $this->user_model->update_nodeanswer(0);

					}
					
				}
				$this->db->delete('Bulk_Upload',array('CID ='	=> $cid,
													  'Coll_ID =' => $coll_id));

			}
			else
			{


			}
			$bulk_num++;

		}
	}



	public function add_attr_bulkdata()
	{
		$value_attr = ["2","6"];
		$bulk_num = 0;
		
		$query = $this->db->get('Attr_Bulk_Upload');
		foreach ($query->result() as $row)
		{
			if($bulk_num <=20)
			{
				$cid 		= $row->CID;
				$coll_id 	= $row->COLL_ID;
				$ans_string = $row->Attr_String;
				$snode_id 	= $row->Node_ID;
				$value_attr = $row->value_attr;
				$value_attr = explode(",",$value_attr);
				$val_inc =0;
				if($this->user_model->check_userid($cid) == 0){
					$email = $cid.'@scholargraph.com';
					$data_user = array(
						'id' 		=> $cid,
						'email'  	=> $email,
						'password'	=> '0af96f7279c1db4bed95dad7fb72fba2',
						'ref_email' => '',
						);
					$this->db->insert('users',$data_user);
				}
				if($this->user_model->check_collid($coll_id) == 0){
					$final_string = $this->user_model->get_finalstring('in'); //get final string using global and country bit strings

					$final_string[0] = 0;
					$data_college = array(
						'COLL_ID'		=> $coll_id,
						'COLL_NAME'  	=> 'College'.$coll_id,
						'CountryCode'	=> 'in',
						'College_String'	=> $final_string
						);
					$this->db->insert('college',$data_college);
				}

				$query1 = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
				
				foreach($query1->result() as $row)
				{
					$college1 = $row->COLL_NAME;
					$countrycode = $row->CountryCode;
					$college_string = $row->College_String;
				}
				$data1 = array(
					'CID'     => $cid,
					'COLL_ID' => $coll_id,
					'Bit_String' => $college_string,
					);
				$session_data['cid'] = $cid;
				$session_data['college1'] = $college1;
				$session_data['country_code'] = $countrycode;
				$this->session->set_userdata($session_data);

				//$session_data['answer_string'] = $college_string;
				//$session_data['psycho_string'] = $psycho_string;
				//$this->db->insert('UserCollegestring',$data1);
				//$this->db->insert('table1',$data);
				$data_string = $this->user_model->get_attrstring();
				$attrstring = $data_string['attrstring'];
				$attrstr = $data_string['node'];
				$nodeid = $this->user_model->get_attrnodeposition();
				//$length = strlen($string);

				$flag = 0;
				for($i=0;$i<sizeof($attrstring);$i++)
				{
					$string = $attrstring[$i];
					$m = $attrstr[$i];
					//echo 'string val:'.$string.'<br>';
					//echo 'string size: '.strlen($string).'<br>';
					//echo 'S_Node:'.$snode_id.'<br>';
					for($j=0;$j<strlen($string);$j++)
					{
						
						if(($string[$j] == 1) && ($m == $snode_id) && ($ans_string[$j] == 1) )
						{
							//echo $snode_id;
							//echo 'J Value:'.$j.'<br>';
							$flag = 1;
							$ques = $this->user_model->get_attributeques(1);
							$opt_content = $ques['option_content'];
							if($opt_content[0] == 'insert')
							{
								//echo 'j value before'.$j.'<br>';
								
								//echo 'j value after'.$j.'<br>';
								
								if($value_attr[$val_inc] == 0)
								{
									
									for($k=$j+1;$k<$j+1+$ques['opt_num'];$k++)
									{
										if($ans_string[$k] == 1)
										{
											$this->user_model->update_attrnodeanswer($k-$j-1);
											break;
										}
										else if($k == $j+$ques['opt_num'])
										{
											$this->user_model->update_attrnodeanswer($k-$j-1);
											
											
										}
									}
								}
								else
								{
									$sess_data = $this->session->set_userdata;
									$sess_data['attr_value'] = $value_attr[$val_inc];
									$this->session->set_userdata($sess_data);
									$this->user_model->update_attrnodeanswer(-2);
								}
								$j=$j+$ques['opt_num'];
								//array_splice($value_attr,0,0);
								$val_inc++;
							}
							else
							{
								//echo 'option_num:'.$ques['opt_num'].'<br>';
								//echo 'j value before'.$j.'<br>';
								for($k=$j+1;$k<$j+1+$ques['opt_num'];$k++)
								{
									if($ans_string[$k] == 1)
									{
										$va = $k-$j-1;
										
										$this->user_model->update_attrnodeanswer($k-$j-1);
										break;
									}
									else if($k == $j+$ques['opt_num'])
									{
										$this->user_model->update_attrnodeanswer($k-$j-1);
									}
								}
								$j=$j+$ques['opt_num'];
								//echo 'j value after'.$j.'<br>';
							}
						}
					}
					if($flag == 1) break;
					//_ysecho 'next line <br>';
					
				}
				$this->db->delete('Attr_Bulk_Upload',array('CID     ='	=> $cid,
											 			   'COLL_ID ='  => $coll_id,
											 			   'Node_ID ='  => $snode_id));
			}
			else
			{


			}
			$bulk_num++;
		}
	}


	public function insert_attrbulkdata($data)
	{
		$value_attr = ["2","6","22","61","65","69","73","77","81","105","109","113","117","131","140","144","148","152","200","325","337","373","381","419","423","427","431"];
		$country_code = 'Int';
		for($i=1;$i<=sizeof($data);$i++)
		{
			$cid = $data[$i]['USER_ID'];
			$cid = str_replace('user', "", $cid);
			$bulk_data = array(
				'CID' => $cid
				);
			$bulk_data['COLL_ID'] = $data[$i]['COLLEGE_ID'];
			$bulk_data['COLL_ID'] = str_replace('college', "", $bulk_data['COLL_ID']);
			$bulk_data['Node_ID'] = $data[$i]['S_NODE'];

			//$bulk_data['value_attr']="";
			$val_attr = "";
			$answer_string = 0;
			
				for($j=1;$j<=480;$j++)
				{
					$var = $j;
					if(in_array($j, $value_attr))
					{
						if($data[$i][$var] == 0)
						{
							$val = 0;
							$answer_string = $answer_string.$val;	
						}
						else
						{
							$val = 1;
							$answer_string = $answer_string.$val;	
						}
						if($data[$i][$var-1] !=0)
						{
							$val_attr = $val_attr.$data[$i][$var].',';	
						}
						
						
					}
					else $answer_string = $answer_string.$data[$i][$var];
				}

			
			
			$query = $this->db->get_where('StructureAttribute',array('Node_ID  ='    => $data[$i]['S_NODE'],
							  										 'CountryCode =' => $country_code));

			foreach($query->result() as $row)
			{
				$bulk_data['Attr_String'] = $answer_string;
			}
			$this->db->insert('AttributeTable',$bulk_data);
			$bulk_data['Attr_String'] = $answer_string;
			$bulk_data['value_attr']  = $val_attr;
			
			$this->db->insert('Attr_Bulk_Upload',$bulk_data);
		}

		//$this->user_model->add_bulkdata();
		return;
	}


	public function insert_bulkdata($data)
	{
		//print_r($data);

		for($i=1;$i<=sizeof($data);$i++)
		{
			$bulk_data['CID'] = $data[$i]['USER_ID'];
			$bulk_data['CID'] = str_replace('user', "", $bulk_data['CID']);
			$bulk_data['Coll_ID'] = $data[$i]['COLLEGE_ID'];
			$bulk_data['Coll_ID'] = str_replace('college', "", $bulk_data['Coll_ID']);
			$answer_string = 0;
			for($j=1;$j<257;$j++)
			{
				$var = $j;
				$answer_string = $answer_string.$data[$i][$var];
			}
			$bulk_data['Answer_String'] = $answer_string;
			$this->db->insert('Bulk_Upload',$bulk_data);
		}

		//$this->user_model->add_bulkdata();
		return;
	}

	public function insert_collAddress($data){
		print_r($data);
		for($i=1;$i<=sizeof($data);$i++)
		{
			$coll['COLL_ID'] = $data[$i]['COLL_ID'];
			$bulk_data['latitude'] = $data[$i]['latitude'];
			$bulk_data['longitude'] = $data[$i]['longitude'];
			$bulk_data['city']      = $data[$i]['city'];
			$bulk_data['COLL_NAME'] = $data[$i]['COLL_NAME'];
			$this->db->update('college',$bulk_data,$coll);
			$syn_data['colg_id'] = $data[$i]['COLL_ID'];
			$syn_data['synonym'] = $data[$i]['COLL_NAME'];
			$syn_data['primary_name'] = 1;
			$syn_data['primary_college'] = $data[$i]['COLL_NAME'];
			$syn_data['country']  = $data[$i]['country'];
			$syn_data['city']  = $data[$i]['city'];
			//$this->db->insert('synonyms',$syn_data);
			if($data[$i]['Synonym'] != '0')
			{
				$syn_data['synonym'] = $data[$i]['Synonym'];
				$syn_data['primary_name'] = 2;
			}
			if($data[$i]['Synonym1'] != '0')
			{
				$syn_data['synonym'] = $data[$i]['Synonym1'];
				$syn_data['primary_name'] = 2;
			}
			if($data[$i]['Synonym2'] != '0')
			{
				$syn_data['synonym'] = $data[$i]['Synonym2'];
				$syn_data['primary_name'] = 2;
			}
		}
		return;
	}

	public function get_usercolleges()
	{
		$cid = $this->session->cid;
		$query =$this->db->get_where('UserCollegestring',array('CID =' => $cid));
		$i=0;
		foreach($query->result() as $row)
		{
			$coll_id = $row->COLL_ID;
			$coll_query = $this->db->get_where('college',array('COLL_ID =' => $coll_id));
			foreach ($coll_query->result() as $row)
			{
				$data['college'][$i] = $row->COLL_NAME;
				$country = $this->user_model->get_country($row->CountryCode);
				$data['country'][$i] = $country;
			}
			$i++;
		}
		return $data;
	}

	public function get_psycho_nodeques()
	{
		$final_string = $this->session->answer_string;
		$psycho_string = $this->session->psycho_string;
		$prev_clubid  = $this->session->club_id;
		$size = strlen($final_string);
		//	echo $this->session->psycho_string;
		$y = 0;
		for($i=0;$i<$size;$i++)
		{

			if(($final_string[$i] & $psycho_string[$i]) ==	1 )
			{
				$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $i));
				foreach ($node_query->result() as $row)
				{
					$id = $row->Node_ID;
				}
				$query = $this->db->get_where('NODETABLE', array('Node_ID =' => $id));
				foreach ($query->result() as $row)
				{
					$question_id = $row->Trigger_Ques;
					$club_id = $row->Club_ID;
					$node_type = $row->Node_Type;
					$node_name = $row->Node_Name;
				}
				/*if ($prev_clubid != $club_id && $prev_clubid != 0 )
				{
					$data = $this->session->set_userdata;
					$data['club_id'] = 0;
					$this->session->set_userdata($data);
					return array('question' => -1);
				}*/

					$query_set = $this->db->get_where('NODETABLE',array('Club_ID =' => $club_id));
					$set_ques = $query_set->num_rows();
					$query_num = $this->db->get_where('NODETABLE',array('Club_ID =' => $club_id,
																	    'Node_ID >' => $id));
					$value    = $query_num->num_rows();
					$value    = $set_ques - $value;
					$data = $this->get_question($question_id);
					$question = $data['question'];
					$opt_num  = $data['opt_num'];
					$unit_flag = $data['unit_flag'];
					$ques_flag = 0;
					if($value == 1)
					{
						$ques_flag = 1;
					}
					if($node_type == "Decision")
					{
						$option   = $data['option'];
						$option_content = $this->user_model->get_options($option,$opt_num);
						$percentage = $this->user_model->get_option_scores($id,$opt_num);
					}
					else if($node_type = "Structural")
					{
						$option_content[0] = 0;
					}
					$data = $this->session->set_userdata;
					$data['q_id'] = $question_id;
					$data['opt_num'] = $opt_num;
					$data['option_content'] = $option_content;
					$data['club_id'] = $club_id;
					$this->session->set_userdata($data);

					return array('question' 		=> $question,
						 		 'option_content'	=> $option_content,
						 		 'opt_num' 			=> $opt_num,
						 		 'percentage' 		=> $percentage,
						 		 'set_ques'			=> $set_ques,
						 		 'value'			=> $value,
						 		 'node_name'		=> $node_name,
								 'unit_flag'        => $unit_flag,
						 		 'ques_flag'		=> $ques_flag);

			}

		}
		return array('question' => -1);
	}

	public function update_psycho_nodeans($value)
	{
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$psycho_string = $this->session->psycho_string;
		$cid = $this->session->cid;
		$collid = $this->user_model->get_collid($college,$country_code);
		$value  = $value + 1; //As option0 is option1 in options table
		$answer_node = $this->user_model->get_nodeanswer();
		//$global = "Global";
		for($i=0;$i<strlen($answer_node);$i++)
		{
			if(($answer_node[$i] & $psycho_string[$i]) == 1 )
			{
				$node_query = $this->db->get_where('Node_Position',array('Node_Pos =' => $i));
				foreach ($node_query->result() as $row)
				{
					$id = $row->Node_ID;
				}
				$node_id = $id;
				break;
			}
		}

		$query = $this->db->get_where('NODETABLE', array('Node_ID =' => $node_id));
		foreach ($query->result() as $row)
		{
			$node_name = $row->Node_Name;
			$prev_qid = $row->Trigger_Ques;
		}
		$answer_node[$i] = 0;
		$data['CID'] = $cid;
		$data['NA']  = 0;
		$data['NUM_VAL'] = $value;
 		$data['S_Node'] = $node_id;
		$data['COLL_ID'] = $collid;
		$data['TEXT_VAL'] = $node_name;
		$this->db->insert('table1',$data);

		//Inserting the data in table1_ques
		$table1_ques['CID'] = $cid;
		$table1_ques['COLL_ID'] = $collid;
		$table1_ques['Q_ID'] = $prev_qid;
		$table1_ques['Answer'] = $value;
		$this->db->insert('Table1_Ques',$table1_ques);


		// Inserting or updating the data in table2_ques

		$query = $this->db->get_where('Table2_Ques',array('COLL_ID =' => $collid,
														  'Q_ID    =' => $prev_qid));
		if($query->num_rows() == 0){
			$table2_ques['COLL_ID'] = $collid;
			$table2_ques['Q_ID'] = $prev_qid;
			$ans = 'A'.$value;
			$table2_ques[$ans] = 1;
			$table2_ques['MU'] = $value;
			$table2_ques['Sample_SZ'] = 1;
			$this->db->insert('Table2_Ques',$table2_ques);
		}
		else{

			foreach($query->result() as $row){
				$mu = $row->MU;
				$sz = $row->Sample_SZ;
				$ans = 'A'.$value;
				$table2_ques['Sample_SZ'] = $row->Sample_SZ + 1;
				$table2_ques['MU'] = ((($mu*$sz)+$value)/($sz+1));
				$table2_ques['A1'] = $row->A1;
				$table2_ques['A2'] = $row->A2;
				$table2_ques['A3'] = $row->A3;
				$table2_ques['A4'] = $row->A4;
				$table2_ques['A5'] = $row->A5;
				//Sigma calulation
				$table2_ques['SIGMA'] = 0;
				for($i=1;$i<=5;$i++){
					$ans = 'A'.$value;
					if($value == $i){
						$table2_ques[$ans]++; 
					}
					
					$table2_ques['SIGMA'] += ($table2_ques[$ans]*(($i-$table2_ques['MU'])*($i-$table2_ques['MU'])));
				}

				$table2_ques['SIGMA'] = sqrt($table2_ques['SIGMA']/($sz+1));
				$this->db->update('Table2_Ques',$table2_ques,array('COLL_ID =' => $collid,
														  		   'Q_ID    =' => $prev_qid));

			}
		}

		
		// Inserting or updating in Table1_Tags and Table2_Tags

		$query = $this->db->get_where('Tag_Table',array('Q_ID =' => $prev_qid));
		foreach($query->result() as $row){
			$table1_tag['TAG_ID'] = $row->TAG_ID;
			$table1_tag['CID'] = $cid;
			$table1_tag['COLL_ID'] = $collid;
			
			//Inserting or updating the data in table1_tags

			$tag_query = $this->db->get_where('Table1_Tags',$table1_tag);
			if($tag_query->num_rows()==0){
				$table1_ins_tag['TAG_ID'] = $row->TAG_ID;
				$table1_ins_tag['CID'] = $cid;
				$table1_ins_tag['COLL_ID'] = $collid;
				$table1_ins_tag['Sample_SZ'] = 1;
				$table1_ins_tag['MU'] = $value;
				$table1_ins_tag['SIGMA'] = 0;
				for($i=1;$i<=5;$i++){
					$ans = 'A'.$i;
					if($value == $i){
						$table1_ins_tag[$ans] = 1;
					}
					else{
						$table1_ins_tag[$ans] = 0;	
					}
				}
				$this->db->insert('Table1_Tags',$table1_ins_tag);
			}
			else{
				foreach($tag_query->result() as $tag_rows){
					$table1_upd_tags['Sample_SZ'] = $tag_rows->Sample_SZ+1;
					$table1_upd_tags['MU'] = ((($tag_rows->Sample_SZ)*$tag_rows->MU)+$value)/$table1_upd_tags['Sample_SZ'];

					$table1_upd_tags['A1'] = $tag_rows->A1;
					$table1_upd_tags['A2'] = $tag_rows->A2;
					$table1_upd_tags['A3'] = $tag_rows->A3;
					$table1_upd_tags['A4'] = $tag_rows->A4;
					$table1_upd_tags['A5'] = $tag_rows->A5;
					//Sigma calulation
					$table1_upd_tags['SIGMA'] = 0;
					for($i=1;$i<=5;$i++){
						$ans = 'A'.$i;

						if($value == $i){
							
							$table1_upd_tags[$ans]++; 
						}
						
						$table1_upd_tags['SIGMA'] += ($table1_upd_tags[$ans]*(($i-$table1_upd_tags['MU'])*($i-$table1_upd_tags['MU'])));
					}
					$table1_upd_tags['SIGMA'] = sqrt($table1_upd_tags['SIGMA']/($table1_upd_tags['Sample_SZ']));
					
					$this->db->update('Table1_Tags',$table1_upd_tags,$table1_tag);
				}
			}

			//Inserting or updating the data in table2_tags

			$table2_tag = $this->db->get_where('Table2_Tags',array('COLL_ID =' => $collid,
														  		   'TAG_ID    =' => $table1_tag['TAG_ID']));

			if($table2_tag->num_rows() == 0){
				$table2_tags['COLL_ID'] = $collid;
				$table2_tags['TAG_ID'] = $table1_tag['TAG_ID'];
				$ans = 'A'.$value;
				$table2_tags[$ans] = 1;
				$table2_tags['MU'] = $value;
				$table2_tags['Sample_SZ'] = 1;
				$this->db->insert('Table2_Tags',$table2_tags);

			}
			else{
				foreach($table2_tag->result() as $tag_rows){

					$mu = $tag_rows->MU;
					$sz = $tag_rows->Sample_SZ;
					$ans = 'A'.$i;
					$table2_newtags['Sample_SZ'] = $tag_rows->Sample_SZ + 1;
					$table2_newtags['MU'] = ((($mu*$sz)+$value)/($sz+1));
					$table2_newtags['A1'] = $tag_rows->A1;
					$table2_newtags['A2'] = $tag_rows->A2;
					$table2_newtags['A3'] = $tag_rows->A3;
					$table2_newtags['A4'] = $tag_rows->A4;
					$table2_newtags['A5'] = $tag_rows->A5;
					//Sigma calulation
					$table2_newtags['SIGMA'] = 0;
					for($i=1;$i<=5;$i++){
						$ans = 'A'.$i;

						if($value == $i){
							
							$table2_newtags[$ans]++; 
						}
						
						$table2_newtags['SIGMA'] += ($table2_newtags[$ans]*(($i-$table2_newtags['MU'])*($i-$table2_newtags['MU'])));
					}

					$table2_newtags['SIGMA'] = sqrt($table2_newtags['SIGMA']/($sz+1));
					$this->db->update('Table2_Tags',$table2_newtags,array('COLL_ID =' => $collid,
															  		      'TAG_ID  =' => $table1_tag['TAG_ID']));


				}
			}
		}
		



		$query = $this->db->get_where('userprofiledata',array('COLL_ID ='	=> $collid,
															  'CID     ='	=> $cid));
		foreach($query->result() as $row)
		{
			$node_value[0] = $row->stream;
			$node_value[1] = $row->degree;
			$node_value[2]  = $row->major;
			for($i=0;$i<6;$i++)
			{
				$stream[$i] = $row->stream;
				$degree[$i] = $row->degree;
				$major[$i]  = $row->major;
				if($i == 5)
				{
					$stream[$i] = 'All';
					$degree[$i] = 'All';
					$major[$i]  = 'All';
				}
				if($i == 4)
				{
					$stream[$i] = 'All';
					$major[$i]  = 'All';
				}
				if($i == 3)
				{
					$degree[$i] = 'All';
					$major[$i]  = 'All';
				}
				if($i == 2)
				{
					$degree[$i] = 'All';
				}
				if($i == 1)
				{
					$major[$i]  = 'All';
				}

			}
		}

		//Inserting Psyco graphic data based on college in psycho_table2

		$query = $this->db->get_where('psycho_table2', array('COLL_ID =' => $collid,
													  		 'D_Node  =' => $node_id,
													  		 'Country =' => $country_code,
													  		 'Stream  =' => $node_value[0],
													  		 'Degree  =' => $node_value[1],
													  		 'Major   =' => $node_value[2]));
		$no_rows = $query->num_rows();
		foreach ($query->result() as $row)
		{
			$node_type = $row->Node_Type;
			if($node_type == 'MUL_VAL')
			{
				if($value == 1)      $data2['Op1'] = $row->Op1 + 1;
				else if($value == 2) $data2['Op2'] = $row->Op2 + 1;
				else if($value == 3) $data2['Op3'] = $row->Op3 + 1;
				else if($value == 4) $data2['Op4'] = $row->Op4 + 1;
				else if($value == 5) $data2['Op5'] = $row->Op5 + 1;
				else if($value == 6) $data2['Op6'] = $row->Op6 + 1;
				else if($value == 7) $data2['Op7'] = $row->Op7 + 1;
				else if($value == 8) $data2['Op8'] = $row->Op8 + 1;
				else if($value == 9) $data2['Op9'] = $row->Op9 + 1;
				else if($value == 10) $data2['Op10'] = $row->Op10 + 1;
			}
			$data2['MU'] = (($row->MU*$row->Sample_SZ)+$value)/($row->Sample_SZ+1);
			$data2['Sample_SZ'] = $row->Sample_SZ + 1;

			$this->db->update('psycho_table2',$data2,array('COLL_ID =' => $collid,
													  		 'D_Node  =' => $node_id,
													  		 'Country =' => $country_code,
													  		 'Stream  =' => $node_value[0],
													  		 'Degree  =' => $node_value[1],
													  		 'Major   =' => $node_value[2]));
		}

		if($no_rows == 0)
		{

			$data1 = array(
			'COLL_ID'    => $collid,
			'D_Node'     => $node_id,
			);
			$data1['NODE_NAME'] = $node_name;
			$data1['Node_Type'] = 'MUL_VAL';
			$data1['Stream'] 	= $node_value[0];
			$data1['Degree'] 	= $node_value[1];
			$data1['Major'] 	= $node_value[2];
			$data1['Country']   = $country_code;
			if($value == 1)      $data1['Op1'] = 1;
			else if($value == 2) $data1['Op2'] = 1;
			else if($value == 3) $data1['Op3'] = 1;
			else if($value == 4) $data1['Op4'] = 1;
			else if($value == 5) $data1['Op5'] = 1;
			else if($value == 6) $data1['Op6'] = 1;
			else if($value == 7) $data1['Op7'] = 1;
			else if($value == 8) $data1['Op8'] = 1;
			else if($value == 9) $data1['Op9'] = 1;
			else if($value == 10) $data1['Op10'] = 1;
			$data1['MU'] = $value;
			$data1['Sample_SZ'] = 1;
			$this->db->insert('psycho_table2',$data1);
		}

		//Inserting Psycho graphic data based on college in psycho_table2 for stream => all, Degree => all and Major => all

		$query = $this->db->get_where('psycho_table2', array('COLL_ID =' => $collid,
													  		 'D_Node  =' => $node_id,
													  		 'Country =' => $country_code,
													  		 'Stream  =' => 'All',
													  		 'Degree  =' => 'All',
													  		 'Major   =' => 'All'));
		$no_rows = $query->num_rows();
		foreach ($query->result() as $row)
		{
			$node_type = $row->Node_Type;
			if($node_type == 'MUL_VAL')
			{
				if($value == 1)      $data2['Op1'] = $row->Op1 + 1;
				else if($value == 2) $data2['Op2'] = $row->Op2 + 1;
				else if($value == 3) $data2['Op3'] = $row->Op3 + 1;
				else if($value == 4) $data2['Op4'] = $row->Op4 + 1;
				else if($value == 5) $data2['Op5'] = $row->Op5 + 1;
				else if($value == 6) $data2['Op6'] = $row->Op6 + 1;
				else if($value == 7) $data2['Op7'] = $row->Op7 + 1;
				else if($value == 8) $data2['Op8'] = $row->Op8 + 1;
				else if($value == 9) $data2['Op9'] = $row->Op9 + 1;
				else if($value == 10) $data2['Op10'] = $row->Op10 + 1;
			}
			$data2['MU'] = (($row->MU*$row->Sample_SZ)+$value)/($row->Sample_SZ+1);
			$data2['Sample_SZ'] = $row->Sample_SZ + 1;

			$this->db->update('psycho_table2',$data2,array('COLL_ID =' => $collid,
													  		 'D_Node  =' => $node_id,
													  		 'Country =' => $country_code,
													  		 'Stream  =' => 'All',
													  		 'Degree  =' => 'All',
													  		 'Major   =' => 'All'));
		}

		if($no_rows == 0)
		{

			$data1 = array(
			'COLL_ID'    => $collid,
			'D_Node'     => $node_id,
			);
			$data1['NODE_NAME'] = $node_name;
			$data1['Node_Type'] = 'MUL_VAL';
			$data1['Stream'] 	= 'All';
			$data1['Degree'] 	= 'All';
			$data1['Major'] 	= 'All';
			$data1['Country']   = $country_code;
			if($value == 1)      $data1['Op1'] = 1;
			else if($value == 2) $data1['Op2'] = 1;
			else if($value == 3) $data1['Op3'] = 1;
			else if($value == 4) $data1['Op4'] = 1;
			else if($value == 5) $data1['Op5'] = 1;
			else if($value == 6) $data1['Op6'] = 1;
			else if($value == 7) $data1['Op7'] = 1;
			else if($value == 8) $data1['Op8'] = 1;
			else if($value == 9) $data1['Op9'] = 1;
			else if($value == 10) $data1['Op10'] = 1;
			$data1['MU'] = $value;
			$data1['Sample_SZ'] = 1;
			$this->db->insert('psycho_table2',$data1);
		}

		//Inserting Psyco graphic data based on country,Global in psycho_table2

		$con_collid = -1;

		for($i=0;$i<12;$i++)
		{
			$data1['NODE_NAME'] = $node_name;
			$data1['Node_Type'] = 'MUL_VAL';
			if($i>=6)
			{
				$j = $i%6;
				$country_code = 'Int';
				$data1['Country'] = 'Int';
			}
			else
			{
				$j= $i;
				$data1['Country']  = $country_code;

			}

			$query = $this->db->get_where('psycho_table2', array('COLL_ID =' => $con_collid,
													  		 'D_Node  =' => $node_id,
													  		 'Country =' => $country_code,
													  		 'Stream  =' => $stream[$j],
													  		 'Degree  =' => $degree[$j],
													  		 'Major   =' => $major[$j]));

			$num_rows = $query->num_rows();
			if($num_rows == 0)
			{
				$data1['COLL_ID'] = -1;
				$data1['Stream'] 	= $stream[$j];
				$data1['Degree'] 	= $degree[$j];
				$data1['Major'] 	= $major[$j];
				$data1['D_Node']    = $node_id;
				if($value == 1)      $data1['Op1'] = 1;
				else if($value == 2) $data1['Op2'] = 1;
				else if($value == 3) $data1['Op3'] = 1;
				else if($value == 4) $data1['Op4'] = 1;
				else if($value == 5) $data1['Op5'] = 1;
				else if($value == 6) $data1['Op6'] = 1;
				else if($value == 7) $data1['Op7'] = 1;
				else if($value == 8) $data1['Op8'] = 1;
				else if($value == 9) $data1['Op9'] = 1;
				else if($value == 10) $data1['Op10'] = 1;
				$data1['MU'] = $value;
				$data1['Sample_SZ'] = 1;
				$this->db->insert('psycho_table2',$data1);
			}
			else
			{
				foreach ($query->result() as $row)
				{
					$node_type = $row->Node_Type;
					if($node_type == 'MUL_VAL')
					{
						if($value == 1)      $data2['Op1'] = $row->Op1 + 1;
						else if($value == 2) $data2['Op2'] = $row->Op2 + 1;
						else if($value == 3) $data2['Op3'] = $row->Op3 + 1;
						else if($value == 4) $data2['Op4'] = $row->Op4 + 1;
						else if($value == 5) $data2['Op5'] = $row->Op5 + 1;
						else if($value == 6) $data2['Op6'] = $row->Op6 + 1;
						else if($value == 7) $data2['Op7'] = $row->Op7 + 1;
						else if($value == 8) $data2['Op8'] = $row->Op8 + 1;
						else if($value == 9) $data2['Op9'] = $row->Op9 + 1;
						else if($value == 10) $data2['Op10'] = $row->Op10 + 1;
					}
					
					$data2['MU'] = (($row->MU*$row->Sample_SZ)+$value)/($row->Sample_SZ+1);
					$data2['Sample_SZ'] = $row->Sample_SZ + 1;
					$this->db->update('psycho_table2',$data2, array('COLL_ID =' => $con_collid,
															  		 'D_Node  =' => $node_id,
															  		 'Country =' => $country_code,
															  		 'Stream  =' => $stream[$j],
															  		 'Degree  =' => $degree[$j],
															  		 'Major   =' => $major[$j]));

				}
			}
		}

		$data = array(
				'Bit_String'   => $answer_node,
				);
		$query = $this->db->update('UserCollegestring', $data, array('CID ='     => $cid,
																	 'COLL_ID =' => $collid));
		$data = $this->session->set_userdata;
		$data['answer_string'] = $answer_node;
		$data['ques_count'] = $this->session->ques_count + 1;
		$this->session->set_userdata($data);
		return ;
	}



	public function get_option_scores($node_id,$opt_num)
	{
		$college = $this->session->college1;
		$country_code = $this->session->country_code;
		$collid = $this->user_model->get_collid($college,$country_code);
		$cid = $this->session->cid;
		$data['COLL_ID'] = -1;
		$data['D_Node']  = $node_id;
		$data['Country'] = $country_code;
		$query = $this->db->get_where('userprofiledata',array('COLL_ID ='	=> $collid,
															  'CID     ='	=> $cid));
		foreach($query->result() as $row)
		{
			$data['Stream'] = $row->stream;
			$data['Degree'] = 'All';
			$data['Major']  = 'All';
		}
		$query = $this->db->get_where('psycho_table2',$data);
		if($query->num_rows() == 0)
		{
			for($j=0;$j<$opt_num;$j++)
			{
				$option[$j] = 0;
			}
			return $option;
		}
		else
		{
			foreach($query->result() as $row)
			{
				for($j=0;$j<$opt_num;$j++)
				{
					if($j==0) $option[$j] = $row->Op1;
					else if($j==1) $option[$j] = $row->Op2;
					else if($j==2) $option[$j] = $row->Op3;
					else if($j==3) $option[$j] = $row->Op4;
					else if($j==4) $option[$j] = $row->Op5;
					else if($j==5) $option[$j] = $row->Op6;
					else if($j==6) $option[$j] = $row->Op7;
					else if($j==7) $option[$j] = $row->Op8;
					else if($j==8) $option[$j] = $row->Op9;
					else if($j==9) $option[$j] = $row->Op10;
				}
			}
			return $option;
		}
	}


	/*
	Input : Club id which is the id for each set of psychographic questions
	Output: stats from table2 based on user profile

	*/

	public function getUserStats($name,$coll_id,$stream,$degree,$major,$country_code)
	{
		$i=0;
		$query = $this->db->get_where('NODETABLE',array('Node_Name =' => $name));
		foreach($query->result() as $row)
		{
			$data['dNode'][$i] 	  = $row->Node_ID;
			$data['opt_num'][$i]  = $row->Trigger_AnsOp;
			$data['q_id'][$i]	  = $row->Trigger_Ques;
			$option_data 		  = $this->getDnodeStats($data['dNode'][$i],$coll_id,$stream,$degree,$major,$country_code,$data['opt_num'][$i]);
			$data['percentage'][$i] = $option_data['percentage'];
			$data['opt_value'][$i]  = $option_data['opt_value']; 
			$data['mu'][$i]			= $option_data['mu']; 
			$data['sample'][$i]		= $option_data['sample'];
			$i++;
		}

		return $data;

	}

	/*
		Input:
		Output: get the final mu values 
	*/
	public function getMuVal($name,$coll_id,$stream,$degree,$major,$country_code)
	{
		$query = $this->db->get_where('NODETABLE',array('Node_Name =' => $name));
		$i = 0;
		$final_mu = array();
		foreach($query->result() as $row)
		{
			$dnode 	    = $row->Node_ID;
			$coll_query = $this->db->get_where('psycho_table2',array('D_Node   =' => $dnode,
																     'COLL_ID !=' => -1,
																     'Country  =' => $country_code,
																  	 'Stream   =' => $stream,
																  	 'Degree   =' => $degree,
																  	 'Major    =' => $major));
			
			$mu = 0;
			$sigma = 0;
			$sample = 0;
			$temp_mu = array();
			$temp_sample  = array();

			$coll_mu[$i] = 0;
			$j=0;
			if($coll_query->num_rows() == 0)
			{
				$final_mu[$i]    = 0;
				$final_sigma[$i] = 0;
				$i++;
			}
			else
			{
				foreach($coll_query->result() as $coll_row)
				{
					if($coll_id == $coll_row->COLL_ID)
					{
						$coll_mu[$i] = $coll_row->MU;
					}
					$temp_mu[$j] = $coll_row->MU;
					$temp_sample[$j]  = $coll_row->Sample_SZ;
					$mu = (($mu*$sample) + ($temp_mu[$j]*$temp_sample[$j]))/($sample+$temp_sample[$j]);
					$sample += $temp_sample[$j];
					$j++;
				}
				for($j=0;$j<sizeof($temp_mu);$j++)
				{
					$sigma += (($temp_mu[$j]-$mu)*($temp_mu[$j]-$mu));
				}
				//echo 'I value:'.$i.'<br>';
				//echo 'sample:' .$sample. '<br>';
				$sigma = sqrt($sigma/sizeof($temp_mu));
				$final_mu[$i]    = $mu;
				$final_sigma[$i] = $sigma;
				$i++;

			}
			
		}
		$data['mu'] = $final_mu;
		$data['sigma'] = $final_sigma;
		$data['coll_mu'] = $coll_mu;
		return $data;

	}

	/*
	Input : Club id which is the id for each set of psychographic questions
	Output: questions that belonging to one set

	*/

	public function getPsychoSetQues($node_name)
	{
		$i=0;
		$query = $this->db->get_where('NODETABLE',array('Node_Name =' => $node_name));
		foreach($query->result() as $row)
		{
			$data['dNode'][$i] = $row->Node_ID;
			$data['opt_num'][$i]  = $row->Trigger_AnsOp;
			$data['q_id'][$i]	= $row->Trigger_Ques;
			$data_ques = $this->get_question($data['q_id'][$i]);
			$Q_data['question'][$i] = $data_ques['question'];
			$Q_data['coll_tags'][$i]  = $data_ques['coll_tags'];
			$Q_data['user_tags'][$i]  = $data_ques['user_tags'];
			$Q_data['coll_content'][$i]  = $data_ques['coll_content'];
			$Q_data['user_content'][$i]  = $data_ques['user_content'];
			$opt_num  = $data_ques['opt_num'];
			$option   = $data_ques['option'];
			$Q_data['option_content'][$i] = $this->user_model->get_options($option,$opt_num);
			$i++;
		}
		return $Q_data;
	}

	public function getUserPsychoAns($node_name,$college,$country_code)
	{
		$data = $this->user_model->getPsychoSetQues($node_name);
		$i=0;
		//$college = $this->session->user_college;
		//$country_code = $this->session->user_country;
		$cid = $this->session->cid;
		$collid = $this->user_model->get_collid($college,$country_code);
		$query = $this->db->get_where('NODETABLE',array('Node_Name =' => $node_name));
		foreach($query->result() as $row)
		{
			$snode = $row->Node_ID;
			$ans_query = $this->db->get_where('table1',array('TEXT_VAL =' => $node_name,
														 	 'CID 	   =' => $cid,
														     'COLL_ID  =' => $collid,
														     'S_Node   =' => $snode));	
			foreach($ans_query->result() as $ans_row)
			{
				$ans_data['dNode'][$i] = $snode;
				$ans_data['answernode'][$i] = $ans_row->NUM_VAL;
			}
			if($ans_query->num_rows() == 0)
			{
				$ans_data['dNode'][$i] = $snode;
				$ans_data['answernode'][$i] = 0;
			}
			$i++;

		}
		
		

		/*for($j=0;$j<sizeof($data['dNode']);$j++)
		{
			if($j >= sizeof($ans_data['dNode']))
			{
				$ans_data['dNode'][$j] = $data['dNode'][$j];
				$ans_data['answernode'][$j] = 0;
			}
		}*/

		//print_r($ans_data);
		return $ans_data;


	}


	public function getDnodeStats($dNode,$coll_id,$stream,$degree,$major,$country_code,$opt_num)
	{
		$table2_query = $this->db->get_where('psycho_table2',array('D_Node =' 	 => $dNode,
																	'Coll_ID ='  =>	$coll_id,
																	'Country ='  => $country_code,
															  		 'Stream  =' => $stream,
															  		 'Degree  =' => $degree,
															  		 'Major   =' => $major));


		$total = 0;
		foreach($table2_query->result() as $row)
		{
			for($j=0;$j<$opt_num;$j++)
			{
				if($j==0) $option[$j] = $row->Op1;
				else if($j==1) $option[$j] = $row->Op2;
				else if($j==2) $option[$j] = $row->Op3;
				else if($j==3) $option[$j] = $row->Op4;
				else if($j==4) $option[$j] = $row->Op5;
				else if($j==5) $option[$j] = $row->Op6;
				else if($j==6) $option[$j] = $row->Op7;
				else if($j==7) $option[$j] = $row->Op8;
				else if($j==8) $option[$j] = $row->Op9;
				else if($j==9) $option[$j] = $row->Op10;
				$total = $total + $option[$j];
			}
			$mu = $row->MU;
			for($i=0;$i<$opt_num;$i++)
			{
				$percentage[$i] = ($option[$i]*100)/$total;
				$percentage[$i] = round($percentage[$i], 0);
			}

		}
		if($table2_query->num_rows() == 0)
		{

			for($i=0;$i<$opt_num;$i++)
			{
				$option[$i] = 0;
				$percentage[$i] = 0;
			}
		}
		$option_data['percentage'] = $percentage;
		$option_data['opt_value']  = $option;
		$option_data['mu'] 		   = $mu; 
		$option_data['sample']	   = $total;
		return $option_data;
	}


	public function getPsychoNames()
	{
				$this->db->distinct();
				$this->db->select('Node_Name');
		$query = $this->db->get_where('NODETABLE',array('Club_ID <' => 0));
		$i=0;
		foreach($query->result() as $row)
		{
			$data[$i] = $row->Node_Name;
			$i++;
		}
		if($query->num_rows() == 0)
		{
			$data[0] = 0;
		}
		return $data;
	}

	public function getPsychoCountry()
	{
		$this->db->distinct();
		$this->db->select('Country');
		$query = $this->db->get('psycho_table2');
		$i=0;
		foreach($query->result() as $row)
		{
			$country_code = $row->Country;
			if($country_code != NULL)
			{
				$country[$i]  = $this->get_country($country_code);
				$i++;
			}

		}
		if($query->num_rows() == 0)
		{
			$country[0] = 0;
		}
		return $country;
	}




	public function getPsychoStream()
	{
		$i=0;
		$j=0;
		$k=0;
		$this->db->distinct();
		$this->db->select('Stream');
		$query = $this->db->get('psycho_table2');
		foreach($query->result() as $row)
		{
			$node_value = $row->Stream;
			$data['stream'][$i] = $node_value;
			$i++;
		}


		$this->db->distinct();
		$this->db->select('Degree');
		$query = $this->db->get('psycho_table2');
		foreach($query->result() as $row)
		{
			$node_value = $row->Degree;
			$data['degree'][$j] = $node_value;
			$j++;
		}

		$this->db->distinct();
		$this->db->select('Major');
		$query = $this->db->get('psycho_table2');
		foreach($query->result() as $row)
		{
			$node_value = $row->Major;
			$data['major'][$k] = $node_value;
			$k++;
		}

		if($query->num_rows() == 0)
		{
			$data[0] = 0;
		}

		return $data;
	}


	/*

		To check whether the tags have to assign 
		to the user or not
		Input: tagid, avg tag value, college id
		Output: 0	=> Tag not assigned
				1 	=> pos tag assigned
				-1 	=> neg tag assigned

		*** Algo may be changed in the future ***
	*/

	public function Check_Tags($tagid, $value, $cid)
	{
		// below assigned value can be changed later
		$samp_limit = 2; 	// sample limit for the algo 
		$deviation  = 20; 	// Deviation of all answers 
		$query = $this->db->query("select * from Table2_Tags where TAG_ID = ".$tagid." AND COLL_ID IN (select COLL_ID from UserCollegestring where CID = ".$cid." )");
		
		//$query = $this->db->get_where('Table2_Tags',array('COLL_ID 	='	=> $collid,
		//												  'TAG_ID 	='	=> $tagid));
		for($i=1;$i<=5;$i++)
		{
			$val[$i] =0;
		}
		$sample = 0;
		$mu =0;
		$sigma = 0;
		foreach($query->result() as $row){

			$val[1] += $row->A1;
			$val[2] += $row->A2;
			$val[3] += $row->A3;
			$val[4] += $row->A4;
			$val[5] += $row->A5;
			$mu 	= (($mu*$sample)+($row->MU*$row->Sample_SZ))/($sample+$row->Sample_SZ);
			$sample +=$row->Sample_SZ;

		}

		for($i=1;$i<=5;$i++){
			$sigma += ($val[$i]*(($i-$mu)*($i-$mu)));
		}
		$sigma = sqrt($sigma/$sample);

		if($samp_limit >= $sample){
			return 0;
		}
		else if(abs(($mu-$sigma)*20) > $deviation){
				return 0;
		}
		else if(abs(($value-$sigma)*20) < 20){
				return 0;
		}
		else{
			if(($value-$sigma)>0){
				return 1;
			}
			else{
				return -1;
			}
		}
	}



	/*
		To get the tags for the user college
		Input : college_id
		Ouput : tag array

	*/

	public function Show_User_Tags($cid){
		

		//$cid = $this->session->cid;
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
				$tag_assg = $this->user_model->Check_Tags($prev_tag,$avg,$cid);
				if($tag_assg == 1 or $tag_assg == -1)
				{
					$tag_query = $this->db->get_where('Tag_Table',array('TAG_ID =' => $prev_tag));
					foreach($tag_query->result() as $tag_row){
						$tag_name = $tag_row->TAG_NAME;
						$tag_pos  = $tag_row->TAG_Pos_Direction;
						$tag_neg  = $tag_row->TAG_Neg_Direction;
					}
					$tag[$i][0] = $tag_name;
					$tag[$i][1] = $tag_assg;
					if($tag_assg == 1){
						$tag[$i][2] = $tag_pos;	
					}
					else{
						$tag[$i][2] = $tag_neg;	

						//$tag[] =  array($tag_name,$tag_assg,$tag_neg));	
					}
					$i++;
				}
				$prev_tag = $tagid;
				$avg = $mu;
				$prev_samp = $sample;

			}		
		}
		//For the last tag 
		if($query->num_rows() !=0)
		{
			$tag_assg = $this->user_model->Check_Tags($prev_tag,$avg,$cid);
			if($tag_assg == 1 or $tag_assg == -1)
			{
				$tag_query = $this->db->get_where('Tag_Table',array('TAG_ID =' => $prev_tag));
				foreach($tag_query->result() as $tag_row){
					$tag_name = $tag_row->TAG_NAME;
					$tag_pos  = $tag_row->TAG_Pos_Direction;
					$tag_neg  = $tag_row->TAG_Neg_Direction;
				}
				$tag[$i][0] = $tag_name;
				$tag[$i][1] = $tag_assg;
				if($tag_assg == 1){
					$tag[$i][2] = $tag_pos;	
				}
				else{
					$tag[$i][2] = $tag_neg;	

					//$tag[] =  array($tag_name,$tag_assg,$tag_neg));	
				}
			}
		} 
		return $tag;

	}

	/*
		Input : cid(userID)
		Ouput : array(key,value) => (coll_name,quesanswered)
	*/
	public function getUserQues($cid){
		$query = $this->db->get_where('UserCollegestring',array('CID =' => $cid));
		$college = array();
		foreach($query->result() as $row){
			$this->db->select('COLL_NAME');
			$coll_query = $this->db->get_where('college',array('COLL_ID =' => $row->COLL_ID));
			foreach($coll_query->result() as $coll_row)
			{
				$college[$coll_row->COLL_NAME] = $row->answered; 
			}
		}
		return $college;
	}

	/*
		Function to get the user credibilty for his colleges
		Input:cid(userID)
		Output:array(key,value) => (coll_name,usercredibilty)
	*/
	public function getUserCred($cid){

		$query = $this->db->get_where('UserCollegestring',array('CID =' => $cid));
		$UserCred = array();

		foreach ($query->result() as $row){
			$coll_query = $this->db->get_where('college',array('COLL_ID =' =>$row->COLL_ID));
			foreach($coll_query->result() as $coll_row)
			{
				$UserCred[$coll_row->COLL_NAME] = $row->user_coll_cred;
			}
		}
		return $UserCred;

	}

	/*
		*** Algo will be changed in the future ***
		Input: collid,cid,total_num_ques,$answered,$cred
		Output: user college rank 
	*/
	public function GetUserCollRank($collid,$cid,$answered,$total_ques,$cred)
	{
		
            	$this->db->order_by('answered', 'desc');
        $query= $this->db->get_where('UserCollegestring',array('COLL_ID =' => $collid));
		
		$i=0;
		$hike_answered = $answered + 20; 
		$hike_flag 	   = 0;
		foreach($query->result() as $row)
		{
			$i++;
			if($cid == $row->CID)
			{
				$user[0] = $i;  
			}
			if( ($hike_answered >= $row->answered) && $hike_flag == 0)
			{
				$hike_flag = 1;
				$user[1] = $i;
			}
		}
		
		return $user;

	}

	public function GetGlobalRank($cid)
	{
		$query = $this->db
              ->select('CID, SUM(total_attempted) AS score')
              ->group_by('CID')
              ->order_by('score', 'desc')
              ->get('UserCollegestring');
        
        $i=0;
        foreach($query->result() as $row)
        {
        	$i++;
        	if($cid == $row->CID)
        	{
        		$user = $i;
        	}

        }
        return $user;
	}

	/*
		Input: cid
		Output: get the rank array for the user for his colleges
		rank['collname'][0] => user rank for that college
		rank['collname'][1] => user rank after answering x number of questions
	*/

	public function GetUserCollDetails($cid){
		$query = $this->db->get_where('UserCollegestring',array('CID =' => $cid));
		$rank = array();
		foreach($query->result() as $row){
			$collid 	= $row->COLL_ID;
			$total_ques = $row->total_attempted;
			$answered 	= $row->answered;
			$cred 		= $row->user_coll_cred;

			$coll_query = $this->db->get_where('college',array('COLL_ID =' =>$row->COLL_ID));
			foreach($coll_query->result() as $coll_row)
			{

				$rank[$coll_row->COLL_NAME] = $this->user_model->GetUserCollRank($collid,$cid,$answered,$total_ques,$cred); 
			}
		}
		$rank['total'] = $this->user_model->GetGlobalRank($cid);
		return $rank;
	}

	/*
		Input: cid
		Output: data of college views after user start contributing

	*/
	public function Show_User_CollViews($cid){
		$query = $this->db->get_where('UserCollegestring',array('CID =' => $cid));
		$views = array(); 
		foreach ($query->result() as $row){
			$coll_query = $this->db->get_where('college',array('COLL_ID =' =>$row->COLL_ID));
			foreach($coll_query->result() as $coll_row)
			{
				$views[$coll_row->COLL_NAME] = $coll_row->Views - $row->record_views;
			}
		}
		return $views;


	}

 // function to get currency code
	public function get_currency($val)
	{
		$query = $this->db->query("SELECT currency_code FROM Country WHERE Country_Code = '$val' ");
		$query = $query->result();
		return $query[0]->currency_code;
	}

}