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

class Comparefe extends CI_Controller {

	/*
	This is a test function to test various functions
	*/
	public function test()
	{
		$this->load->model('college_model');
		$tree = $this->college_model->buildTreeWithNodeId(1,0,-1,0);
		$this->load->view('college_comparefe',array('jsons'=>json_encode($tree)));
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

	public function encode_id($id){
		$this->load->model("college_model");
		$id = $this->college_model->id_encode($id);
		echo json_encode(array("id" => $id));
	}

	public function decode_id($id){
		$this->load->model("college_model");
		$id = $this->college_model->id_decode($id);
		echo json_encode(array("id" => $id));
	}

	/*
	Input : POST Variable College, id and comment. ID is of form "node-<node id>-attribute-<attribute id>"
	Output : A message based on whether the flag has been added successfully or there is some error.
	@Charan - Need to include influence on table2
	*/
	public function flag()
	{
		$this->load->library('session');
		$this->load->model("college_model");
		$mail=$this->session->email;
		if(!empty($mail))	//If logged in or not
		{

			$loggedInUser = $this->session->userdata["cid"];
			$reductionFactor = 5;
			$collegeId = htmlspecialchars($this->college_model->id_decode($this->input->post('college')));
			$id = htmlspecialchars($this->input->post('id'));
			// $response = htmlspecialchars($this->input->post('response'));
			$r_id = htmlspecialchars($this->input->post('resp_id'));

			// $this->db->select('R_ID');
			// $this->db->where('Response', $response);
			// $q = $this->db->get('flag_response');
			// $data = $q->result_array();

			// $r_id=$data[0]['R_ID'];

			$this->db->select('COLL_ID');
			$this->db->where('CID', $loggedInUser);
			$q1 = $this->db->get('userprofiledata');
			$data1 = $q1->result_array();
			$n_a=1;
			for($k=0;$k<count($data1);$k++){
				if ($data1[$k]['COLL_ID']==$collegeId){
					$n_a=0;
				}
			}

			$explodedId = explode('-',$id);
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
					'N_A'=>$n_a
					);
				$this->db->insert(FLAGS_TABLE,$data);
				echo "Thank You for your feedback. Necessary actions would be taken.";
				//Do effect in table2 HERE
			}
			else
			{
				echo "Please select the node you want to flag.";
			}
		}
		else
		{
			echo "Please Log In To Submit Your Feedback";
		}
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

	public function flagresponse()
	{
		$this->load->model('flag_model');

		$data = $this->flag_model->getFlagResponses();	//Array of College Names
		$data = json_encode($data);
		echo $data;
	}

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
	public function get_comparison($collegeid1 = NULL, $collegeid2 = NULL, $collegeid3 = NULL, $collegeid4 = NULL){
		$this->load->model("college_model");
		$tree1 = new Tree;
		$tree_2 = new Tree;
		if($collegeid != NULL){

			$tree1 = $this->details($collegeid1);
		}
		if($collegeid != NULL){

			$tree2 = $this->details($collegeid2);
		}
		if($collegeid != NULL){

			$tree3 = $this->details($collegeid3);
		}
		if($collegeid != NULL){

			$tree4 = $this->details($collegeid4);
		}
		$result = new Tree;
		for($i = 0;$i<3; $i++){
			$sub_result = new Tree;
			$sub_result->id = json_decode($tree1)->children[$i]->id;
			$sub_result->label = json_decode($tree1)->children[$i]->label;
			array_push($sub_result->children, json_decode($tree1)->children[$i]);
			array_push($sub_result->children, json_decode($tree2)->children[$i]);
			array_push($result->children, $sub_result);
		}
		echo json_encode($result->children);
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
		// echo 'within college details function';

		$this->load->model('college_model');
		// echo $collegeid;
		$collegeid = $this->college_model->id_decode($collegeid);

		$collegeid=1;
		// echo '30';
		$sections = $this->college_model->getDisplaySections();
		// echo '40';
		$display = $sections['display'];
		// echo '50';
		$type = $sections['type'];	//Type
		// echo '60';
		$this->load->library('session');
		// echo '70';
		$this->load->model('college_model');
		// echo '80';
		//check if college exists
		$college = $this->college_model->getCollegeName($collegeid);
		if($college == NULL)
		{
			$this->load->view('pagenotfound.php');
		}
		else
		{
			$mail=$this->session->email;
			if(!empty($mail))	//If logged in or not
				$public = 0;
			else
				$public = 1;

			$trees = array();
			// echo '90';
			for($i = 0;$i<count($display);$i++)
			{
				$tree = new Tree;
				$tree->label = $display[$i];
				if($type[$i] == 1)	//List of Available NODE_VALUES with Their Tree
				{
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
				}
				else //Tree Structure
				{
					//If it is an attribute then get Attribute ID. For example if we later on add fees, then change it to include fees. Search for its id (AttributeNodeTable's node id - 1) and pass to buildTree function
					$tree = $this->college_model->buildTreeWithNodeId($collegeid,0,-1,$public);
					$tree->id = "tree";
					$tree->label = $display[$i];
				}
				array_push($trees,$tree);
			}
			$domains = ["Academics", "Fees", "Placements"];
			$attribute = [["10"],["2","14"],["6"]];
			$attr_count = 0;
			$result = new Tree;
			$result->label = $college;
			$result->id = 'college-'.$collegeid;
			foreach($domains as $domain){
				$sub_result = new Tree;
				$sub_result->label = $domain;
				$sub_result->id = 'college-'.$domain;
				foreach($trees as $tree)
				{
					if($domain == "Fees"){

						$sub_tree = new Tree;
						$sub_tree = $this->create_array($tree, $attribute[$attr_count]);
						array_push($sub_result->children, $sub_tree);
					}else{
						if($tree->id != "dump"){
							$sub_tree = new Tree;
							$sub_tree = $this->create_array($tree, $attribute[$attr_count]);
							array_push($sub_result->children, $sub_tree);
						}
					}
				}
				$attr_count++;
				array_push($result->children, $sub_result);
			}
			//echo json_encode($result);
			// echo '100';
			$jsons = json_encode($result);
			if($public == 0)	//Adding To LOG if logged in
			{
				$this->load->model('log_model');
				$this->log_model->addToLogStatic($college,COLLEGE_NAME,TYPE_COLLEGE);
			}
			$this->load->model('flag_model');
			$flag = $this->flag_model->getFlagResponses();
			// echo 'control shifted to view';
			$this->load->view('college_comparefe',array('jsons'=>$jsons,'collegeid'=>$collegeid,'college'=>$college,'flag'=>$flag));

			// echo $jsons;
		}
	}



	public function create_array($tree, $attr){
		//print_r ($tree);
		//print_r ($attr);
		//print_r(json_encode($tree)."<br>" . "<br>");
		$sub_tree = new Tree;
		$sub_tree->id = $tree->id;
		$sub_tree->label = $tree->label;
		$sub_tree->value = $tree->value;
		for($i = 0; $i < sizeof($tree->children); $i++){
			//echo "hello";
			$value = explode("-",$tree->children[$i]->id);
			if(in_array("attribute",$value)){
				if(in_array($value[3],$attr)){

					$child_tree = new Tree;
					$child_tree = $this->create_array($tree->children[$i], $attr);
					$child_tree->id = $tree->children[$i]->id;
					$child_tree->label = $tree->children[$i]->label;
					//$child_tree->value = $tree->children[$i]->value;
					//if($value)
					array_push($sub_tree->children, $child_tree);
				}
			}else{
				$child_tree = new Tree;
				$child_tree = $this->create_array($tree->children[$i], $attr);
				$child_tree->id = $tree->children[$i]->id;
				$child_tree->label = $tree->children[$i]->label;
					//$child_tree->value = $tree->children[$i]->value;
					//if($value)
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
	public function compare($collegeId1 = 0,$collegeId2 = 0,$collegeId3 = 0,$collegeId4 = 0)
	{
		$this->load->model('college_model');
		$sections = $this->college_model->getDisplaySections();
		$display = $sections['display'];
		$type = $sections['type'];	//Type

		$colleges = array();
		if($collegeId1 != NULL){

			$collegeId1 = $this->college_model->id_decode($collegeId1);
			array_push($colleges,$collegeId1);
		}
		if($collegeId2 != NULL){

			$collegeId2 = $this->college_model->id_decode($collegeId2);
			array_push($colleges,$collegeId2);
		}
		if($collegeId3 != NULL){

			$collegeId3 = $this->college_model->id_decode($collegeId3);
			array_push($colleges,$collegeId3);
		}
		if($collegeId4 != NULL){

			$collegeId4 = $this->college_model->id_decode($collegeId4);
			array_push($colleges,$collegeId4);
		}

		if(count($colleges)>0)
		{
			$this->load->library('session');
			$mail=$this->session->email;
			if(!empty($mail))
				$public = 0;
			else
				$public = 1;

			//build tree for each and then build merge trees
			$this->load->model('log_model');
			$trees = array();
			$college = array();
			for($j = 0;$j<count($colleges);$j++)
			{
				$temp = new Tree;
				$temp->id = $colleges[$j];
				$temp->label = $this->college_model->getCollegeName($colleges[$j]);
				array_push($college,$temp);
			}

			for($i = 0;$i<count($display);$i++)
			{
				if($type[$i] == 0)
				{
					$trees = array();
					for($j = 0;$j<count($colleges);$j++)
					{
						$tree->id = "tree";
						$tree->label = $display[$i];
						$tree = $this->college_model->buildTreeWithNodeId($colleges[$j],0,-1,$public);
						array_push($trees,$tree);
					}

					$which = str_repeat("1", count($colleges));
					$resultTrees = $this->college_model->mergeTreesGeneric($trees,$which,$display[$i],"node-0");
					for($j = 0;$j<count($colleges);$j++)
					{
						array_push($college[$j]->children,$resultTrees[$j]);
					}
				}
				else
				{
					$trees = array();
					for($j = 0;$j<count($colleges);$j++)
					{
						$tree = new Tree;
						$tree->id = "dump";
						$tree->label = $display[$i];
						$data = $this->college_model->getDistinctNodeValues($colleges[$j],$display[$i]);

						for($k=0;$k<count($data);$k++)
						{
							$child = new Tree;
							$child->label = $data[$k];
							$child->id = "dump-".$k;	//Each child should have unique id
							$res = $this->college_model->getDumpData($colleges[$j],$data[$k],$public);
							foreach($res->children as $grandchild)
							{
								array_push($child->children,$grandchild);
							}
							array_push($tree->children,$child);
						}
						array_push($trees,$tree);
					}
					$which = str_repeat("1", count($colleges));
					$resultTrees = $this->college_model->mergeTreesListGeneric($trees,$which,$display[$i],"dump");
					for($j =0;$j<count($colleges);$j++)
					{
						array_push($college[$j]->children,$resultTrees[$j]);
					}
				}
			}
			for($j = 0;$j<count($colleges);$j++)
			{
				$college[$j] = json_encode($college[$j]);
			}
			$this->load->view('compare_result',array('college'=>$college,'display'=>$display,'type'=>$type));
		}

		else
		{
			//If colleges not specified gets the college input using the college_compare view
			$this->load->model('college_model');
			$college1Name = $this->college_model->getCollegeName($collegeId1);
			$this->load->view('college_compare',array('college1Name'=>$college1Name,'college1'=>$collegeId1));
		}
	}

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

	public function collspecific_leader($collegeid = -1){
		//$cid = $this->session->userdata["cid"];
		$cid = 1;

		$this->db->where('CID', $cid);
		$this->db->where('COLL_ID', $collegeid);
		$collspecific_data = $this->db->get('coll_specific_leaderboard');
		$leaderbrd_count = count($collspecific_data->result());
		if($leaderbrd_count == 0){
			$this->db->where('CID', $cid);
			$this->db->where('COLL_ID', $collegeid);
			$data = $this->db->get('table1');

			$query = $this->db->query("select table1.VAL_ID from table1, NODETABLE where table1.S_Node = NODETABLE.Node_ID AND NODETABLE.Trigger_AnsOp = 2 AND table1.COLL_ID = '$collegeid' AND table1.CID = 1");
			$agg_data = $data->result_array();
			$total_count = count($data->result());
			$max_id = $agg_data[$total_count-1]["VAL_ID"];
			$ns_count = count($query->result());
			$ins_data = array("CID"=>$cid, "COLL_ID"=>$collegeid, "max_id"=>$max_id, "total_attempted" => $total_count, "answered"=>$total_count-$ns_count, "not_answered"=>$ns_count);
			$this->db->insert('coll_specific_leaderboard', $ins_data);

		}else{
			$leaderbrd_data = $collspecific_data->result_array();
			$maximum_id = $leaderbrd_data[0]["max_id"];
			$already_attempted = $leaderbrd_data[0]["total_attempted"];
			$answered = $leaderbrd_data[0]["answered"];
			$unanswered = $leaderbrd_data[0]["not_answered"];
			$this->db->where('CID', $cid);
			$this->db->where('COLL_ID', $collegeid);
			$this->db->where('VAL_ID >', $maximum_id);
			$data = $this->db->get('table1');

			$query = $this->db->query("select table1.VAL_ID from table1, NODETABLE where table1.S_Node = NODETABLE.Node_ID AND NODETABLE.Trigger_AnsOp = 2 AND table1.COLL_ID = '$collegeid' AND table1.CID = 1 AND table1.VAL_ID > '$maximum_id' ");
			$agg_data = $data->result_array();
			$total_count = count($data->result());
			$max_id = $agg_data[$total_count-1]["VAL_ID"];
			$ns_count = count($query->result());
			$data=array('total_attempted'=>$already_attempted + $total_count,'answered'=>$answered + ($total_count - $ns_count), 'not_answered' =>$unanswered + $ns_count, 'max_id'=>$maximum_id + $max_id);
			$this->db->where('COLL_ID',$collegeid);
			$this->db->where('CID',$cid);
			$this->db->update('coll_specific_leaderboard',$data);

		}


	}

}