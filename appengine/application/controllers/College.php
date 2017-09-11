<?php
/*
Controller for functions related to a College
FUNCTIONS
1. flag() -> Flagging a particular node
2. getRecommendations() -> Get college recommendations for a specified college
3. details() -> College details for a given college ID
4. getQuestionsNew() -> Related Questions based on a tags array (Used in college details page)
5. compare() -> Compare 2 or multiple colleges
6. getDistinctSDMValue() -> Get distinct Streams,Degree and Majors value for a given college -> Used while suggesting Stream,Degree,Major in Complete Profile or Edit Profile - Add College
7. addCollege() -> Adds a new college given College Name and Country Code
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class College extends CI_Controller {
	/*
	This is a test function to test various functions
	*/
	public function test()
	{
		$this->load->model('college_model');
		$tree = $this->college_model->buildTreeWithNodeId(1,0,-1,0);
		$this->load->view('college_profile',array('jsons'=>json_encode($tree)));
	}
	public function psycho_test(){
		$this->load->model('college_model');
		$psycho = $this->college_model->getAcademics(2);
		print_r($psycho);
	}
	/*
	To Execute SQL Query. Only For testing. Remove when in production
	*/
	public function sql()
	{
		$this->load->view('sqlquery');
	}
	public function query()
	{
		$query = $this->input->post('query');
		$data = $this->db->query($query)->result_array();
		print_r($data);
		foreach($data as $row)
		{
			print_r($row);
		}
	}
	public function encode_check($id){
		$this->load->model("college_model");
		$id = $this->college_model->id_encode($id);
		redirect('/College/encode_id/'.$id);
		echo 'Encoded - ID:'.$id.'<br>';
		$id = $this->college_model->id_decode($id);
		echo 'Decode - ID:'.$id.'<br>';
	}
	/*return encoded college id*/
	public function encode_id($id){
		$this->load->model("college_model");
		$id = $this->college_model->id_encode($id);
		echo json_encode(array("id" => $id));
	}
	/*return decoded college id*/
	public function decode_id($id){
		$this->load->model("college_model");
		$id = $this->college_model->id_decode($id);
		echo json_encode(array("id" => $id));
	}
	public function update_collleaderboard($collegename = NULL){
		$this->load->model("college_model");
		$id = $this->college_model->getCollegeId($collegename);
		$this->coll_leaderboard($id["coll_id"]); // call coll_leaderboard 												function to update or insert 											records based on table2 records 										evaluation
	}
	public function flag_show()
	{
		/*
			Owner: Saleel
		*/
		$this->load->view("flag_view");
	}
	/*
	Input : POST Variable College, id and response_id. ID is of form "node-<node id>-attribute-<attribute id>"
	Output : A message if the flag has been added successfully.
	 @developer- Need to include implement formulaes for influence on table2.
	*/
	public function flag()
	{
		/*
			Owner: Saleel
		*/
		$this->load->library('session');
		$this->load->model("college_model");
		$this->load->model('user_model');
		$mail=$this->session->email;
		if(!empty($mail))	//If logged in or not
		{
			$loggedInUser = $this->session->userdata["cid"];
			$reductionFactor = 5;
			/*	uncomment once testing is done and flag is implemented in college profile page
				$collegeId = htmlspecialchars($this->college_model->id_decode($this->input->post('college')));
			*/
			$collegeId = $this->input->post('college'); //comment this once testing is over and flag is implemented in profile page
			$id = htmlspecialchars($this->input->post('id'));
		// 	// $response = htmlspecialchars($this->input->post('response'));
			$r_id = htmlspecialchars($this->input->post('resp_id'));
			$this->db->select('COLL_ID');
			$this->db->where('CID', $loggedInUser);
			$q1 = $this->db->get('userprofiledata');
			$data1 = $q1->result_array();
			//fetch user credibility
			$q2 = $this->db->get_where('users',array('id'=>$loggedInUser));
			$data2 = $q2->result_array();
			$cred = $data2[0]['user_cred'];
			$n_a=1; //native=>0 alien=>1
			for($k=0;$k<count($data1);$k++){
				//check if the user has the flagged college in his profile or not
				if ($data1[$k]['COLL_ID']==$collegeId){
					$n_a=0;
				}
			}
			$explodedId = explode('-',$id);	// split the id into nodeId and attributeId respectively
			$nodeId = NULL;
			$attributeId = NULL;
			if(isset($explodedId[1]))
				$nodeId = $explodedId[1];
			if(isset($explodedId[3]))
				$attributeId = $explodedId[3];
			if($nodeId != NULL)
			{
				$data = array(
					'CID'=>$loggedInUser,
					'COLL_ID'=>$collegeId,
					'NODE_ID'=>$nodeId,
					'ATTRIBUTENODE_ID'=>$attributeId,
					'R_ID'=>$r_id,
					'user_cred'=>$cred,
					'N_A'=>$n_a
					);
				$this->db->insert(FLAGS_TABLE,$data);
				$q3 = $this->db->get_where('flags',array('COLL_ID'=>$collegeId,
											'NODE_ID'=>$nodeId,
											'ATTRIBUTENODE_ID'=>$attributeId,));
				if(sizeof($q3->result_array())%5==0){
					//call the function for every 5 flags
					//adjust sample size for Cu and Cl
					$adjust_cu_cl=$this->user_model->adjust_cu_cl($collegeId,$nodeId);
				}
				//apply native-alien bias
				$apply_n_a_bias=$this->user_model->apply_n_a_bias($collegeId,$nodeId);
				echo "Thank You for your feedback. Necessary actions would be taken.";
			}
			/* to be ignored until testing is over
			else
			{
				// echo "Please select the node you want to flag.";
			}
			*/
		}
		else
		{
			redirect('main/login');
			//from login page redirect back to the corresponding college page once flag is implemented at the front end
		}
	}
	public function flagresponse()
	{
		/*
			Owner: Saleel
		*/
		$this->load->model('flag_model');
		$data = $this->flag_model->getFlagResponses();	//Array of College Names
		$data = json_encode($data);
		echo $data;
	}
	/*
	Input : College ID whose Recommendation (OR Related Colleges) we want to get
	Output : A json array with College Details (from College Table)
	Logic :
		generateRecommendation() returns the array of College Names
		Then We get the college details from College Table
		Return the json encoded array
		(Used in college profile through ajax request)
	*/
	public function getRecommendation()
	{

		$this->load->model('college_model');
		$college = htmlspecialchars($this->input->post('college'));
		$data = $this->college_model->generateRecommendation($college);	//Array of College Names
		$result = array();
		for($i=0;$i<count($data);$i++)
		{
			$this->db->where('COLL_NAME',$data[$i]);
			$query = $this->db->get('college')->result();
			if(isset($query[0]))
			{
				array_push($result,$query[0]);
			}
		}
		$result = json_encode($result);
		echo $result;
	}
	public function add_compare($collegeId)
	{
		$this->load->model("college_model");
		$collegeId = $this->college_model->id_decode($collegeId);
			$collegeName = $this->college_model->getCollegeName($collegeId);
			$this->load->view('college_compare',array('collegeName'=>$collegeName, 'collegeId' =>$collegeId));
	}
	/*
	Input - get all collegeids of all the colleges to be compared
	Output -
	*/
	public function compare($collegeid1 = NULL, $collegeid2 = NULL, $collegeid3 = NULL, $collegeid4 = NULL){
		$this->load->model("college_model");
		$total_array = array();
		$college_ids = array();
		$coll_id = array();
		$detail_array1 = array();
		$detail_array2 = array();
		$detail_array3 = array();
		$detail_array4 = array();
		$college_names = array();
		$tree1 = new Tree;
		$tree2 = new Tree;
		$tree3 = new Tree;
		$tree4 = new Tree;
		$count = 0;
		$final_tree = new Comparison_Tree;
		if($collegeid1 != NULL){
			//get mother array for the college whose id is passed as parameter to details array
			$detail_array1 = $this->details_array($collegeid1);
			// decode collegeid before dividing the mother array into 5 categories
			$collegeid1 = $this->college_model->id_decode($collegeid1);
			$college = $this->college_model->getCollegeName($collegeid1);
			array_push($college_names , $college);
			//divide mother array into 5 categories i.e. Academics, Fees, Placements, Scholarships
			$tree1 = $this->generate_categories($detail_array1, $collegeid1);
			
			//push the generated array of all colleges into one array for merging all the arrays
			array_push($total_array, $tree1);
			//final_tree - a single tree generated after merging all the colleges array.
 			array_push($final_tree->id, $collegeid1);
			array_push($coll_id, $collegeid1);
			//print_r($tree1);
			$academics[$count] = $this->college_model->getAcademics($collegeid1);
			$count++;
		}
		if($collegeid2 != NULL){
			$detail_array2 = $this->details_array($collegeid2);
			$collegeid2 = $this->college_model->id_decode($collegeid2);
			$college = $this->college_model->getCollegeName($collegeid2);
			array_push($college_names , $college);
			$tree2 = $this->generate_categories($detail_array2, $collegeid2);
			array_push($total_array, $tree2);
			array_push($final_tree->id, $collegeid2);
			array_push($coll_id, $collegeid2);
			//print_r($tree2);

			$academics[$count] = $this->college_model->getAcademics($collegeid2);
			$count++;
		}
		if($collegeid3 != NULL){
			$detail_array3 = $this->details_array($collegeid3);
			$collegeid3 = $this->college_model->id_decode($collegeid3);
			$college = $this->college_model->getCollegeName($collegeid3);
			array_push($college_names , $college);
			$tree3 = $this->generate_categories($detail_array3, $collegeid3);
			array_push($coll_id, $collegeid3);
			array_push($final_tree->id, $collegeid3);
			array_push($total_array, $tree3);
			$academics[$count] = $this->college_model->getAcademics($collegeid3);
			$count++;
		}
		if($collegeid4 != NULL){
			$detail_array4 = $this->details_array($collegeid4);
			$collegeid4 = $this->college_model->id_decode($collegeid4);
			$college = $this->college_model->getCollegeName($collegeid4);
			array_push($college_names , $college);
			$tree4 = $this->generate_categories($detail_array4,$collegeid4);
			array_push($coll_id, $collegeid4);
			array_push($final_tree->id, $collegeid4);
			array_push($total_array, $tree4);
			$academics[$count] = $this->college_model->getAcademics($collegeid4);
			$count++;
		}
		/* iteration  for 6 times in outer loop because only 6 categories available. So iterate one by one for Academics, Admissions, Expenses, Career, Infra, Students_culture and then merge the colleges array category wise. */
		if($count>0){

			for($i=0;$i<6;$i++){
				$result = new Comparison_Tree;
				$category_array = array();
				for($j=0;$j<$count;$j++){
					array_push($category_array, $total_array[$j]->children[$i]);
				}
				if($i==3)
				{
					//echo json_encode($category_array);
					$result = $this->comparison_array(1,$category_array, $count, $coll_id);
				}
				else
				{
					$result = $this->comparison_array(2,$category_array, $count, $coll_id);
				}
				
				array_push($final_tree->children, $result);
			}
			//echo json_encode($final_tree);
			
			$this->load->view('compare_result',array('final_tree'=>json_encode($final_tree),'college_names'=>$college_names,'academics'=>$academics));
		}else{
			$this->load->model('college_model');
			$college1Name = $this->college_model->getCollegeName($collegeId1);
			$this->load->view('college_compare',array('college1Name'=>$college1Name,'college1'=>$collegeId1));
		}
	}

	/*
	Input ->
		$tree - Input the  array containing mother array for all colleges to be compared, category wise.
		$college_no = signify college number to which the data in tree correspond to.
	*/
	public function comparison_array($flag1,$tree, $count, $coll_id,$college_no = array()){
		
		$this->load->model("college_model");
		$sub_tree = new Comparison_Tree;
		array_push($sub_tree->id, $tree[0]->id);
 		array_push($sub_tree->label, $tree[0]->label);
  		$flag = 1;
		for($i=0;$i<sizeof($tree);$i++){
 	 		array_unshift($sub_tree->value, $tree[$i]->value);
 			array_unshift($sub_tree->summary, $tree[$i]->summary);
 			array_unshift($sub_tree->college_no, $college_no[$i]);
 			array_unshift($sub_tree->footer_comment, $tree[$i]->footer_comment);
 			array_unshift($sub_tree->footer_value, $tree[$i]->footer_value);
			
			if($tree[$i]->coll_id == $coll_id[0])
			{

				$flag= 2;
			}	
			
		}
		while(sizeof($sub_tree->value) < $count){
			if($flag == 1)
			{
				array_push($sub_tree->value, "NA");
				array_push($sub_tree->footer_value, "");
			}
			else
			{
				array_unshift($sub_tree->value, "NA");
				array_unshift($sub_tree->footer_value, "");
			}
		}
	 	$subchild_array = array();
	 	$college_id = array();
	 	/* push all the children of all the trees in $trees belonging to one level into one array */
	 	$pos_label = array();
 		for($i = 0; $i<sizeof($tree); $i++){
 			$k = 0;
 			for($j=0;$j<sizeof($tree[$i]->children);$j++){
 				if(sizeof($tree[$i]->children)>0 && strpos($tree[$i]->children[$j]->id, "attribute") ==true){
 					array_push($college_id, $i);
 					array_push($subchild_array, $tree[$i]->children[$j]);
 				}
 				else if(sizeof($tree[$i]->children)>0)
 				{
 					$pos_label[$i][$k] = $j;
 					$k++;
 				}
 			}
		}

		for($i = 0; $i<sizeof($tree); $i++){
 			for($j=0;$j<sizeof($pos_label[$i]);$j++){
 				$k = $pos_label[$i][$j];
				array_push($college_id, $i);
				array_push($subchild_array, $tree[$i]->children[$k]);
 			}
		}
		
	 	$evaluated_array = array(); // flag array to check if a particular label 								has already been considerd for merging
	 	/* two loops to check if each label from one tree  has a match in another tree or not. If they match then record the college no, if there is no match then proceed with just single tree and a single college no.*/
		for($i=0;$i<sizeof($subchild_array);$i++){
	 		$child_array = array();
	 		$college_no = array();
	 		/* get all unique label names form all children belonging to one level*/
	 		if(!in_array($subchild_array[$i]->label, $evaluated_array)){
				array_push($child_array, $subchild_array[$i]);
				array_push($college_no, $college_id[$i]);
	 		}
	 		
			for($j=0;$j<sizeof($subchild_array);$j++){
				if($subchild_array[$i]->label == $subchild_array[$j]->label){
					if($i != $j){
						if (!in_array($subchild_array[$j]->label, $evaluated_array)){
							array_push($evaluated_array, $subchild_array[$j]->label);
							array_push($child_array, $subchild_array[$j]);
							array_push($college_no, $college_id[$j]);
						}else{
							array_push($college_no, $college_id[$j]);
						}
					}
				}
			}
			
			if(sizeof($child_array)>0){
				$child_tree = new Comparison_Tree;
				$child_tree = $this->comparison_array(2,$child_array, $count, $coll_id, $college_no);
				array_push($sub_tree->children, $child_tree);
			}

		}
		return $sub_tree;
	}
	/*
	Input : College ID of the college whose details we want to display
	Output : json array in a tree structure
	Logic :
		Tree Structure : id, label , children where children is an array of trees.
		It takes the predefined Display Labels (Currently from the array)
		Then For each of the label if its display type is
			1 -> List of All available like Degrees, Majors, etc.
			0 -> Tree based Structure
		According to the display type, it generates the corresponding data using buildTreeWithNodeId() function or getDistinctNodeValues() function
	*/
	public function details($collegeid = -1)
	{
		//$this->benchmark->mark('code_start');
		$this->load->model('college_model');		
	    $trees = array();
	    $session = $this->session->set_userdata;
		$session['total_attribute_time'] = 0;
		$this->session->set_userdata($session);
	    $start = microtime(true);
		$trees = $this->details_array($collegeid);
		$time_elapsed_secs = microtime(true) - $start;
		//echo 'Mother_Array: '.$time_elapsed_secs.'<br>';	
		//echo json_encode($trees);
		$collegeid = $this->college_model->id_decode($collegeid);
		$college = $this->college_model->getCollegeName($collegeid);
		$result = new Tree;
		
		$start = microtime(true);
		$result = $this->generate_categories($trees, $collegeid);
		//echo json_encode($result);
		$academics = $this->college_model->getAcademics($collegeid);
		//$expenses  = $this->college_model->getexpenses($collegeid);
		$time_elapsed_secs = microtime(true) - $start;
		//echo 'Academics Creation: '.$time_elapsed_secs.'<br>';
		
		//$time_elapsed_secs = microtime(true) - $start;
		
		
		//echo json_encode($result);
		$leader_tree = new Tree;
		$leader_tree = $this->generate_collleaderboard($collegeid);

		array_push($result->children, $leader_tree);
		$jsons = json_encode($result);
		if($public == 0)	//Adding To LOG if logged in
		{
			$this->load->model('log_model');
			$this->log_model->addToLogStatic($college,COLLEGE_NAME,TYPE_COLLEGE);
		}
		$this->load->model('flag_model');
		$flag = $this->flag_model->getFlagResponses();
		//Academics 
		
		//echo 'Total Attribute Time: '.$this->session->total_attribute_time.'<br>';
		//echo 'Mother_Array: '.$time_elapsed_secs.'<br>';
		
		$this->load->view('college_profile',array('jsons'=>$jsons,'collegeid'=>$collegeid,'college'=>$college,'flag'=>$flag,'academics'=>$academics));
		//$this->benchmark->mark('code_end');
		//echo $this->benchmark->elapsed_time('code_start', 'code_end');
		
		/*	
		$time_elapsed_secs = microtime(true) - $start;
		$session = $this->session->set_userdata;
		$session['time'] = $this->session->time;
		$session['updated_controller'] = 'coll_after_view_controller';
		$session['time']['coll_after_view_controller']= $time_elapsed_secs;
		$this->session->set_userdata($session);
		*/

		//echo $jsons;
		//print_r (json_encode($college));
		//$this->load->view('college_profile',array('collegeid'=>$collegeid));
	}
	/*
	Input - collegeid of college whose mother array has to be generated
	Output - mother array for a college
	*/
	public function details_array($collegeid){
		$this->load->model('college_model');
		$collegeid = $this->college_model->id_decode($collegeid);
		$this->college_model->update_counter($collegeid);
		$sections = $this->college_model->getDisplaySections();
		$display = $sections['display'];
		$type = $sections['type'];	//Type
		$label = $sections['label'];
		$this->load->library('session');
		$college = $this->college_model->getCollegeName($collegeid);

		if($college == NULL)
		{
			$this->load->view('pagenotfound.php');
		}
		else
		{
			//New Code Starts
			$start = microtime(true);
			$session = $this->session->set_userdata;
			/*
				***** Array fo the Attribute Node table *****
			*/
				 	 $this->db->order_by('Prev_Node','ASC');
			$query = $this->db->get_where('AttributeNodeTable');
			$attr  = array();
			$attr_pos = array();
			$temp = -1;
			$i=0;
			$attr_size = $query->num_rows();
			for($i=0;$i<sizeof($query->num_rows());$i++)
			{
				$attr_pos[$i] = NULL;
			}
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
				if($temp == -1 or $temp != $attr[$i]['Prev_Node'])
				{
					$temp = $row->Prev_Node;
					$attr_pos[$attr[$i]['Prev_Node']] = $i;
				}
				$i++;
			}
			$time_elapsed_secs = microtime(true) - $start;
			//echo 'Attribute array Creation: '.$time_elapsed_secs.'<br>';
			$start = microtime(true);

			/*
				***** Array for Structural Node Table ******
			*/
					 $this->db->order_by('Prev_Node','ASC');
			$query = $this->db->get_where('NODETABLE');
			$struct = array();
			$struct_pos = array();
			$struct_node_pos = array();
			$temp = -1;
			$i=0;
			$struct_size = $query->num_rows();

			for($i=0;$i<sizeof($query->num_rows());$i++)
			{
				$struct_pos[$i] = NULL;
			}
			foreach($query->result() as $row)
			{
				$struct[$i]['Node_ID']   			= $row->Node_ID;
				$struct[$i]['Prev_Node'] 			= $row->Prev_Node;
				$struct[$i]['Node_Name'] 			= $row->Node_Name;
				$struct[$i]['Node_Type'] 			= $row->Node_Type;
				$struct[$i]['Public']				= $row->Public;
				$struct[$i]['Trigger_Ques'] 		= $row->Trigger_Ques;
				$struct[$i]['Trigger_AnsOp']		= $row->Trigger_AnsOp;
				$struct_node_pos[$struct[$i]['Node_ID']] = $i;
 				if($temp == -1 or $temp != $struct[$i]['Prev_Node'])
				{
					$temp = $row->Prev_Node;
					$struct_pos[$struct[$i]['Prev_Node']] = $i;
				}
				$i++;
			}

			$time_elapsed_secs = microtime(true) - $start;
			//echo 'Structural array Creation: '.$time_elapsed_secs.'<br>';
			$start = microtime(true);


			/*
				Make the data null Initially
			*/
			$tb2_attr_pos	= array();
	   		$tb2_struct_pos = array();
			for($i=0;$i<$struct_size;$i++)
			{
				$tb2_struct_pos[$i] = NULL;
				for($j=1;$j<$attr_size;$j++)
				{
					$tb2_attr_pos[$i][$j] = NULL;
				}

			}
			$time_elapsed_secs = microtime(true) - $start;
			//echo 'Null pointer for table2 Creation: '.$time_elapsed_secs.'<br>';
			$start = microtime(true);


			/*
				***** Table2 Data Extraction *****
			*/
			
					 $this->db->order_by('Answer_Node','DESC');
	   		$query = $this->db->get_where('table2',array('COLL_ID =' => $collegeid,
	   													 'NODE_VALUE !=' => NULL));

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
	   			$tb2_attr_pos[$data[$i]['S_Node']][$data[$i]['P_Node']] = $i;
	   			
	   			$tb2_struct_pos[$data[$i]['D_Node']] = $i;
	    		$i++;
	   		}

	   		$coll_currencry  = $this->college_model->get_currency($college['country_code']);
	   		$session['currency'] = $coll_currencry['currency'];
	   		$session['converter'] = $coll_currencry['converter'];
	   		$session['ppp']		  = $coll_currencry['ppp'];

	   		$session['data']   = $data;
	   		$session['attr']   = $attr;
	   		$session['struct'] = $struct;
	   		$session['tb2_attr_pos'] = $tb2_attr_pos;
	   		$session['tb2_struct_pos'] = $tb2_struct_pos;
	   		$session['attr_pos'] = $attr_pos;
	   		$session['struct_pos'] = $struct_pos; 
	   		$session['struct_node_pos'] = $struct_node_pos;
			$this->session->set_userdata($session);
			$time_elapsed_secs = microtime(true) - $start;
			$session = $this->session->set_userdata;
			$session['time'] = $this->session->time;
			$session['updated_controller'] = 'dataretrieval';
			$session['time']['dataretrieval']= $time_elapsed_secs;
			//echo 'Table2 Session Creation: '.$time_elapsed_secs.'<br>';
			$this->session->set_userdata($session);
			//New Code Ends

			$mail=$this->session->email;
			if(!empty($mail))	//If logged in or not
				$public = 0;
			else
				$public = 1;
			 $trees = array();

			for($i = 0;$i<count($display);$i++)
			{
				$tree = new Tree;
				
				$tree->label = $label[$i];
				if($type[$i] == 1)	//List of Available NODE_VALUES with Their Tree
				{
					
					$start = microtime(true);
					$tree->id = "dump";
					$data = $this->college_model->getDistinctNodeValues($collegeid,$display[$i]);
					
					for($j=0;$j<count($data);$j++)
					{
						$child = new Tree;
						$child->label = $data[$j];
						$child->flags = 0;
						$child->id = "dump-".$j;
						$res = $this->college_model->getDumpData($collegeid,$data[$j],$public);
						if(count($res->children)>0)
						{
							foreach($res->children as $grandchild)
								array_push($child->children,$grandchild);
							array_push($tree->children,$child);
						}
					}
					$time_elapsed_secs = microtime(true) - $start;
					$session = $this->session->set_userdata;
					$session['time'] = $this->session->time;
					$session['updated_controller'] = $label[$i];
					$session['time'][$label[$i]]= $time_elapsed_secs;
					$this->session->set_userdata($session);
					//echo $label[$i].': '.$time_elapsed_secs.'<br>';
					
					
				}
				else //Tree Structure
				{
					$start = microtime(true);
					//If it is an attribute then get Attribute ID. For example if we later on add fees, then change it to include fees. Search for its id (AttributeNodeTable's node id - 1) and pass to buildTree function
					$tree = $this->college_model->buildTreeWithNodeId($collegeid,0,-1,$public);
					$tree->id = "tree";
						$tree->label = $label[$i];
						$time_elapsed_secs = microtime(true) - $start;
					$session = $this->session->set_userdata;
					$session['time'] = $this->session->time;
					$session['updated_controller'] = $label[$i];
					$session['time'][$label[$i]]= $time_elapsed_secs;

					$this->session->set_userdata($session);
					//echo $label[$i].': '.$time_elapsed_secs.'<br>';
				}
				
				array_push($trees,$tree);
			}
		}
		return $trees;
	}
	/*
	Input ->
		$trees- mother array of a particular college
		$collegeid - collegeid of college for which the new college array has to be generated
	Output - Tree with five categories which has been extracted for mother array.
	*/
	public function generate_categories($trees, $collegeid){
		$this->load->model('college_model');
		$domains = ["Academics","Admissions", "Expenses", "Career","Infrastructure","Students_Culture"];
			$attribute = [["2","6","10","11","12","13","14","16","17","18","19","20"],["57","58","59",'60',"84","85","86","87","88","89","90","91","92","93","94","95","96","97","98","99","100","101","102","103","22","25","26","29","30","33","34","37","38","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56"],["104","105","106","107","108","109","110",'111','112','113','114','115','116','117','118','119','120','121','122','123','124','130','131','132','133','134','135','136','137','138','139','140','141','142'],['143','144','145','146','147','148','149','150','151','152','153','154','155','156','157','158','159','160','161','162','163','164','165','166','167','168','169','170','171','172','173','174','175','176','177','178','179','180','181','182'],['183','184','185','186','187','188','189','190','191','192','193','194','195','196','197','198','199','200','201','202','203','204','205','206','207','208','209','210','211','212','213','214','215','216','217','218','219','220','221','222','223','224','225','226','227','228','229','230','231','232','233','234','235','236','237','238','239','240','241','242','243','244','245','246','247','248','249','250','251','252','253','254','255','256','257','258','259','260','261','262','263','264','265','266','267','268','269','270','271','272','273','274','275','276','277','278','279','280','281','282','283','284','285','286','287','288','289','290','291','292','293','294','295','296','297','298','299','300','301','302','303','304','305','306','307','308','309','310','311','312','313','314','315','316','317','318','319','320','321','322','323','328','329','330','331','332','333','334','335','340','341','342','343','344','345','346','347','348','349','350','351','352','353','354','355'],['356','357','358','359','360','361','362','363','364','365','366','367','368','369','370','371','372','373','374','375','376','377','378','379','380','382','383','384','385','390','391','392','393','394','395','401','402','403','404','405','406','407','408','409','410','411','412','413','414','415','416','417','418','419','420','421','422','423','424','425','426','427','428','429','430','431','432','433','434','435','436','437','438','439','440','441','442','443','444','445','446','447']]; //For academics attribute ids to be checked are 10 and 13, similarly for Fees attributes to be checked are 2, 28 and 31.
			$attr_count = 0;
			$result = new Tree;
			$result->label = $college;
			$result->id = 'college-'.$collegeid;
			
			//$attr = 0;
			foreach($domains as $domain){
				$sub_result = new Tree;
				$sub_result->label = $domain;
				$data['domain'] = $domain;
				$sub_result->id = 'college-'.$domain;
				foreach($trees as $tree)
				{
					$data['label'] = $tree->label;
					$this->session->set_userdata($data);
					if($domain == "Academics"){
						
						$sub_tree = new Tree;
						$sub_tree = $this->create_array($tree, $attribute[$attr_count]);
						//print_r($sub_tree);
						/*external check for attributes that are related to node 0 i.e.attribute for college level . Attributes with node id 0 are operated seperately to ensure that they are attached at college level not at Programs/Streams level.
						*/
						for($index=0;$index<sizeof($tree->children);$index++){
							$value = explode("-",$tree->children[$index]->id);
							if(in_array($value[3],$attribute[$attr_count]) && $value[1] == 0){
								$college_leveltree = new Tree;
								$college_leveltree = $this->create_array($tree->children[$index], $attribute[$attr_count], 1);
								array_push($sub_result->children, $college_leveltree);
							}
						}
						array_push($sub_result->children, $sub_tree);

					}else{
						// Dump is checked because only academics has Degrees and Majors sections rest of the categories only have Programs/Streams section.
						if($tree->id != "dump"){
							$sub_tree = new Tree;
							$sub_tree = $this->create_array($tree, $attribute[$attr_count]);
							for($index=0;$index<sizeof($tree->children);$index++){
							$value = explode("-",$tree->children[$index]->id);
								if(in_array("attribute",$value)){
									if(in_array($value[3],$attribute[$attr_count]) && $value[1] == 0){
										$college_leveltree = new Tree;
										//print_r($college_leveltree);
										$college_leveltree = $this->create_array($tree->children[$index], $attribute[$attr_count], 1);
										array_push($sub_result->children, $college_leveltree);
									}
								}
							}
							array_push($sub_result->children, $sub_tree);
						}
					}
				}
				$attr_count++;
				array_push($result->children, $sub_result);
			}
			
		return $result;
	}
	/*
	Input -->
		$tree - tree whose children have to be evaluated and divided according to the category whcih is identifiable from the $attr array.
		$attr - array contains all the attributes for a particular category.
	Output - a tree which conatins children along with attributes that correspond to attribute ids of a particular category.
	Example - if this function called for Academics, the tree will contain all children and those attributes which have ids 10(StudentsEnrolled) or 13(Faculty).
	*/
	public function create_array($tree, $attr, $flag = 0){
		//print_r ($tree);
		//print_r ($attr);
		//print_r(json_encode($tree)."<br>" . "<br>");
		$summary_array= array("Academics"=>array("PROGRAMS/STREAMS"=>array(2)),"Admissions"=>array(22),"Expenses"=>array(105),"Career"=>array(144),"Infrastructure"=>array(),"Students_Culture"=>array());
		$sub_tree = new Tree;
		$sub_tree->id = $tree->id;
		$sub_tree->label = $tree->label;
		$sub_tree->value = $tree->value;
		$sub_tree->coll_id = $tree->coll_id;
		$value = explode("-",$tree->id);
		if(in_array($value[3],$attr) && in_array("attribute",$value)){
			$sub_tree->footer_comment = $tree->footer_comment;
			$sub_tree->footer_value = $tree->footer_value;
		}
		for($i = 0; $i < sizeof($tree->children); $i++){
			/*explode use to explode the id so that the 4th element in the array $value after exploding can be checked if its in $attr array or not.
			i.e for Academics 10 and 13 attrribute id is checked.*/
			$value = explode("-",$tree->children[$i]->id);
			if(in_array("attribute",$value)){
				if($flag == 0){
					if(in_array($value[3],$attr) && $value[1] != 0){
						$child_tree = new Tree;
						$child_tree = $this->create_array($tree->children[$i], $attr);
						$child_tree->id = $tree->children[$i]->id;
						$child_tree->label = $tree->children[$i]->label;
						$child_tree->coll_id = $tree->children[$i]->coll_id;

						if(in_array($value[3],$summary_array[$this->session->domain][$this->session->label]) OR in_array($value[3],$summary_array[$this->session->domain]) )
						{
							//echo $value[3].'<br>';
						$child_tree->summary = 1;
						$child_tree->summary_comment = 'students';
						}
						$child_tree->footer_comment = $tree->children[$i]->footer_comment;
						$child_tree->footer_value = $tree->children[$i]->footer_value;
						array_push($sub_tree->children, $child_tree);
					}
				}else{
					if(in_array($value[3],$attr)){
						$child_tree = new Tree;
						$child_tree = $this->create_array($tree->children[$i], $attr);
						$child_tree->id = $tree->children[$i]->id;
						$child_tree->label = $tree->children[$i]->label;
						$child_tree->coll_id = $tree->children[$i]->coll_id;
						if(in_array($value[3],$summary_array[$this->session->domain][$this->session->label]) OR in_array($value[3],$summary_array[$this->session->domain])  )
						{
						$child_tree->summary = 1;
						}
						$child_tree->footer_comment = $tree->children[$i]->footer_comment;
						$child_tree->footer_value = $tree->children[$i]->footer_value;
						array_push($sub_tree->children, $child_tree);
					}
				}
			}else{
				$child_tree = new Tree;
				$child_tree = $this->create_array($tree->children[$i], $attr);
				$child_tree->id = $tree->children[$i]->id;
				$child_tree->label = $tree->children[$i]->label;
				$child->footer_comment = $tree->children[$i]->Footer_comment;
				$child->footer_value = $tree->children[$i]->Footer_value;
				$child_tree->coll_id = $tree->children[$i]->coll_id;
				$child_tree->summary = 0;
				array_push($sub_tree->children, $child_tree);
			}
		}
		return $sub_tree;
	}
	/*
	Input : POST array of tags
	Output : JSON array of relevant questions
	*/
	public function getQuestionsNew()
	{
		$tags = $this->input->post('tags');
		//$tags = "iiit hyderbad";
		$this->load->model('comms_model');
		$result = array();
		$questions = $this->comms_model->getTagQuestionNew($tags);	//Returns an array of Question ID's
		foreach($questions->result() as $row)
		{
			$this->db->where('qid',$row->qid);
			$data = $this->db->get('forum_questions')->result();
			if(isset($data[0]))
			{
				array_push($result,$data[0]);
			}
		}
		echo json_encode($result);
	}
	/*
	Input : One or more college id's to be compared. If no college id specified then render view asking for college id input else display data of specified colleges and also an option to add other colleges.
Output : Table comparison based on display blocks either a tree structure or a list.
	Logic :
	This function for each of the display criteria based on the type calls buildTreeWithNodeId() or getDistinctNodeValues() function. It then merges the data using mergeTreesGeneric() function
	*/
	// public function compare($collegeId1 = 0,$collegeId2 = 0,$collegeId3 = 0,$collegeId4 = 0)
	// {
	// 	$this->load->model('college_model');
	// 	$sections = $this->college_model->getDisplaySections();
	// 	$display = $sections['display'];
	// 	$type = $sections['type'];	//Type
	// 	$colleges = array();
	// 	if($collegeId1 != NULL){
	// 		$collegeId1 = $this->college_model->id_decode($collegeId1);
	// 		array_push($colleges,$collegeId1);
	// 	}
	// 	if($collegeId2 != NULL){
	// 		$collegeId2 = $this->college_model->id_decode($collegeId2);
	// 		array_push($colleges,$collegeId2);
	// 	}
	// 	if($collegeId3 != NULL){
	// 		$collegeId3 = $this->college_model->id_decode($collegeId3);
	// 		array_push($colleges,$collegeId3);
	// 	}
	// 	if($collegeId4 != NULL){
	// 		$collegeId4 = $this->college_model->id_decode($collegeId4);
	// 		array_push($colleges,$collegeId4);
	// 	}
	// 	if(count($colleges)>0)
	// 	{
	// 		$this->load->library('session');
	// 		$mail=$this->session->email;
	// 		if(!empty($mail))
	// 			$public = 0;
	// 		else
	// 			$public = 1;
	// 		//build tree for each and then build merge trees
	// 		$this->load->model('log_model');
	// 		$trees = array();
	// 		$college = array();
	// 		for($j = 0;$j<count($colleges);$j++)
	// 		{
	// 			$temp = new Tree;
	// 			$temp->id = $colleges[$j];
	// 			$temp->label = $this->college_model->getCollegeName($colleges[$j]);
	// 			array_push($college,$temp);
	// 		}
	// 		for($i = 0;$i<count($display);$i++)
	// 		{
	// 			if($type[$i] == 0)
	// 			{
	// 				$trees = array();
	// 				for($j = 0;$j<count($colleges);$j++)
	// 				{
	// 					$tree->id = "tree";
	// 					$tree->label = $display[$i];
	// 					$tree = $this->college_model->buildTreeWithNodeId($colleges[$j],0,-1,$public);
	// 					array_push($trees,$tree);
	// 				}
	// 				$which = str_repeat("1", count($colleges));
	// 				$resultTrees = $this->college_model->mergeTreesGeneric($trees,$which,$display[$i],"node-0");
	// 				for($j = 0;$j<count($colleges);$j++)
	// 				{
	// 					array_push($college[$j]->children,$resultTrees[$j]);
	// 				}
	// 			}
	// 			else
	// 			{
	// 				$trees = array();
	// 				for($j = 0;$j<count($colleges);$j++)
	// 				{
	// 					$tree = new Tree;
	// 					$tree->id = "dump";
	// 					$tree->label = $display[$i];
	// 					$data = $this->college_model->getDistinctNodeValues($colleges[$j],$display[$i]);
	// 					for($k=0;$k<count($data);$k++)
	// 					{
	// 						$child = new Tree;
	// 						$child->label = $data[$k];
	// 						$child->id = "dump-".$k;	//Each child should have unique id
	// 						$res = $this->college_model->getDumpData($colleges[$j],$data[$k],$public);
	// 						foreach($res->children as $grandchild)
	// 						{
	// 							array_push($child->children,$grandchild);
	// 						}
	// 						array_push($tree->children,$child);
	// 					}
	// 					array_push($trees,$tree);
	// 				}
	// 				$which = str_repeat("1", count($colleges));
	// 				$resultTrees = $this->college_model->mergeTreesListGeneric($trees,$which,$display[$i],"dump");
	// 				for($j =0;$j<count($colleges);$j++)
	// 				{
	// 					array_push($college[$j]->children,$resultTrees[$j]);
	// 				}
	// 			}
	// 		}
	// 		for($j = 0;$j<count($colleges);$j++)
	// 		{
	// 			$college[$j] = json_encode($college[$j]);
	// 		}
	// 		$this->load->view('compare_result',array('college'=>$college,'display'=>$display,'type'=>$type));
	// 		//echo json_encode($college);
	// 		//$jsons = $this->generate_categories($college, 2);
	// 		//echo json_encode($jsons);
	// 		//return $college;
	// 	}
	// 	else
	// 	{
	// 		//If colleges not specified gets the college input using the college_compare view
	// 		$this->load->model('college_model');
	// 		$college1Name = $this->college_model->getCollegeName($collegeId1);
	// 		$this->load->view('college_compare',array('college1Name'=>$college1Name,'college1'=>$collegeId1));
	// 		//return $college;
	// 	}
	// }
	/*
	Input : POST variable COLLEGE ID
	Output : Array containing Streams/Schools, Degrees and Majors - Suggestions -> In that college, All -> All that we have.
	Logic : Check table2 for NODE_VALUE. Find distinct node values. Then remove duplicates from All that is those already mentioned in the suggestions.
	*/
	public function getdistinctSDMvalues()
	{
		$college = htmlspecialchars($this->input->post('college'));
		$fields = ["Streams/Schools","Degrees","Majors"];
		$result = array();
		foreach($fields as $field)
		{
			$tempResult = array();
			$this->db->distinct();
			$this->db->select('NODE_VALUE');
			$this->db->where(array('COLL_ID'=>$college,'NODE_NAME'=>$field));
			$data = $this->db->get('table2')->result();
			$temp = array();
			foreach($data as $row)
			{
				if($row->NODE_VALUE != NULL)
					array_push($temp,$row->NODE_VALUE);
			}
			$tempResult['suggestions'] = $temp;
			$this->db->distinct();
			$this->db->select('NODE_VALUE');
			$this->db->where('NODE_NAME',$field);
			$data = $this->db->get('table2')->result();
			$temp = array();
			foreach($data as $row)
			{
				if($row->NODE_VALUE != NULL)
					array_push($temp,$row->NODE_VALUE);
			}
			$removingDuplicates = array();
			$checking = array();
			foreach($temp as $suggestion)
				$checking[$suggestion] = 1;
			foreach($tempResult['suggestions'] as $suggestion)	//Mark as 0
				$checking[$suggestion] = 0;
			$temp = array();
			foreach($checking as $key=>$value)
			{
				if($value == 1)
					array_push($temp,$key);
			}
			$tempResult['all'] = $temp;
			$result[$field] = $tempResult;
		}
		echo json_encode($result);
	}
	/*
		Input : Post input variables
		Output: Success or error message
		Logic : Adds a college to the college table and synonyms table if data does not alreadt exist
	*/
	public function addCollege()
	{
		$college = $this->input->post('newCollege');
		$country_code = $this->input->post('country_code');
		$country_syn = $country_code;
		$this->load->model('user_model');
		if($college!="")
		{
			$this->db->where('COLL_NAME',$college);
			$oldData = $this->db->get('college')->result();
			if(count($oldData)>0)
			{
				$message = "College Already Added";
			}
			else
			{
				$country_code = $this->user_model->GetCountryCode($country_code);
				$message = "";
				$data = array(
					'COLL_NAME'=>$college,
					'CountryCode'=>$country_code
					);
				if(isset($country_code))
				{
					$this->db->insert('college',$data);
					$id = $this->db->insert_id();
					$data_synonym = array(
						'colg_id' => $id,
						'synonym' => $college,
						'primary_name' => 1,
						'primary_college' =>$college,
						'country' => $country_syn
						);
					$this->db->insert('synonyms',$data_synonym);
					$data['COLL_ID'] = $id;
				}
				else
				{
					$message = "Please Select a Country";
				}
			}
		}
		else
		{
			$message = "Please Select a College";
		}
		$response = array();
		$response['message'] = $message;
		$response['college'] = $data;
		echo json_encode($response);
	}
	public function mergeSuggestionsAll($suggestions,$all)
	{
		$checking = array();
		foreach($all as $suggestion)
			$checking[$suggestion['Node_Name']] = $suggestion['Node_ID'];
		foreach($suggestions as $suggestion)
			$checking[$suggestion['Node_Name']] = -1;
		$result = array();
		foreach($checking as $key=>$value)
		{
			if($value != -1)
				array_push($result,array('Node_ID'=>$value,'Node_Name'=>$key));
		}
		return $result;
	}
	public function getAllStreams()
	{
		$this->load->model('college_model');
		$college = $this->input->post('college');
		$streams = $this->college_model->getAllChoices(0,'streams');	//0 is main root
		$streamsId = array();
		foreach($streams as $stream)
			array_push($streamsId,$stream['Node_ID']);
		$selectStreams = $this->college_model->getSelectedChoices($college,"Streams/Schools",$streamsId);
		$result = array();
		$result['suggestions'] = $selectStreams;
		$result['all'] = $this->mergeSuggestionsAll($selectStreams,$streams);
		echo json_encode($result);
	}
	public function getAllDegrees()
	{
		$this->load->model('college_model');
		$college = $this->input->post('college');
		$stream = $this->input->post('stream');
		$degrees = $this->college_model->getAllChoices($stream,'degrees');
		if($stream == -1)
		{
			$result['suggestions'] = array();
			$result['all'] = $degrees;
			echo json_encode($result);
		}
		else
		{
			$degreesId = array();
			foreach($degrees as $degree)
				array_push($degreesId,$degree['Node_ID']);
			if(count($degrees)>0)
			{
				$selectDegrees = $this->college_model->getSelectedChoices($college,"Degrees",$degreesId);
				$result = array();
				$result['suggestions'] = $selectDegrees;
				$result['all'] = $this->mergeSuggestionsAll($selectDegrees,$degrees);
				echo json_encode($result);
			}
			else
			{
				$result['suggestions'] = array();
				$result['all'] = array();
				echo json_encode($result);
			}
		}
	}
	public function getAllMajors()
	{
		$this->load->model('college_model');
		$college = $this->input->post('college');
		$degree = $this->input->post('degree');
		$majors = $this->college_model->getAllChoices($degree,'majors');
		if($degree == -1)
		{
			$result['suggestions'] = array();
			$result['all'] = $majors;
			echo json_encode($result);
		}
		else
		{
			$majorsId = array();
			foreach($majors as $major)
				array_push($majorsId,$major['Node_ID']);
			if(count($majors)>0)
			{
				$selectMajors = $this->college_model->getSelectedChoices($college,"Majors",$majorsId);
				$result = array();
				$result['suggestions'] = $selectMajors;
				$result['all'] = $this->mergeSuggestionsAll($selectMajors,$majors);
				echo json_encode($result);
			}
			else
			{
				$result['suggestions'] = array();
				$result['all'] = array();
				echo json_encode($result);
			}
		}
	}
	/*
	Input  - college id for which data from table2 has been extracted
	Function - this function checks if the logged in user has any entries in coll_specific leaderboard for a particular college or not.
	If yes, there is already a record present then just update the record  by calculating no of attempted answers, unanswered and total questions for the college that user has participated in (using table2 for all recrds greater than VAl ID i.e last evaluated record).
	If no record is not present then just insert the record by evaluating same parameters from table2.
	*/
	public function user_leaderboard($collegeid = -1){
		$this->load->model("college_model");
		if(isset($this->session->userdata["cid"])){
			$cid = $this->session->userdata["cid"];
			//$cid = 1;
			$this->db->where('CID', $cid);
			$this->db->where('COLL_ID', $collegeid);
			$collspecific_data = $this->db->get('coll_specific_leaderboard');
			$leaderbrd_count = count($collspecific_data->result());
			if($leaderbrd_count == 0){  //check if already records are present for a college and for the current user
				$this->db->where('CID', $cid);
				$this->db->where('COLL_ID', $collegeid);
				$data = $this->db->get('table1');
				$query = $this->db->query("select table1.VAL_ID from table1, NODETABLE where table1.S_Node = NODETABLE.Node_ID AND NODETABLE.Trigger_AnsOp = 2 AND table1.COLL_ID = '$collegeid' AND table1.CID = 1");
				$agg_data = $data->result_array();
				$total_count = count($data->result());
				$max_id = $agg_data[$total_count-1]["VAL_ID"]; // VAL id is the last id to be evaluated. Will help in reducing updation work when same user answers some questions for this college.
				$ns_count = count($query->result());
				$views = $this->college_model->get_views($collegeid);
				$ins_data = array("CID"=>$cid, "COLL_ID"=>$collegeid, "max_id"=>$max_id, "total_attempted" => $total_count, "answered"=>$total_count-$ns_count, "not_answered"=>$ns_count, "record_views" => $views);
				$this->db->insert('coll_specific_leaderboard', $ins_data);
			}else{
				$leaderbrd_data = $collspecific_data->result_array();
				$maximum_id = $leaderbrd_data[0]["max_id"];
				$already_attempted = $leaderbrd_data[0]["total_attempted"];
				$answered = $leaderbrd_data[0]["answered"];
				$unanswered = $leaderbrd_data[0]["not_answered"];
				$this->db->where('CID', $cid);
				$this->db->where('COLL_ID', $collegeid);
				$this->db->where('VAL_ID >', $maximum_id);//check for data whose id is greater than last already evaluated record id.
				$data = $this->db->get('table1');
				$query = $this->db->query("select table1.VAL_ID from table1, NODETABLE where table1.S_Node = NODETABLE.Node_ID AND NODETABLE.Trigger_AnsOp = 2 AND table1.COLL_ID = '$collegeid' AND table1.CID = 1 AND table1.VAL_ID > '$maximum_id' ");
				$agg_data = $data->result_array();
				$total_count = count($data->result());
				$max_id = $agg_data[$total_count-1]["VAL_ID"];
				$ns_count = count($query->result());
				$data=array('total_attempted'=>$already_attempted + $total_count,'answered'=>$answered + ($total_count - $ns_count), 'not_answered' =>$unanswered + $ns_count, 'max_id'=> $max_id);
				$this->db->where('COLL_ID',$collegeid);
				$this->db->where('CID',$cid);
				$this->db->update('coll_specific_leaderboard',$data);
			}
		}else{
			$this->load->view('pagenotfound.php');
		}
	}
	public function testi()
	{
		print_r($this->generate_collleaderboard(2));
	}
	/*
	Input - collegeid for generating leaderboard
	Output - generated leaderboard for a particular college
	*/
	public function generate_collleaderboard($collegeid = -1){
		$this->load->model("college_model");
		$leader_tree = new Tree;
		$leader_tree->label = "leaderboard";
		$leader_tree->id = "leaderboard".$collegeid;
		$result = $this->db->query('SELECT a.Display_Name,a.id,b.*  FROM users as a, UserCollegestring as b   WHERE b.CID = a.id AND b.COLL_ID ='. $collegeid. ' ORDER BY b.total_attempted desc LIMIT 5' );
		foreach($result->result() as $row ){
			//echo $row->Display_Name;
			$row->id = $this->college_model->id_encode($row->id);
			array_push($leader_tree->children, $row);
		}
		//print_r($leader_tree);
		return $leader_tree;

	}

}