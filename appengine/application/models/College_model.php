<?php

/*
FUNCTIONS
1. getUserRelatedNodes($cid) - Tags/Nodes related to a user
2. getCountry($countryCode) - Country Name from code
3. generateRecommendation($college = NULL) - Related Colleges for a given college
4. getDistinctNodeValues($collegeid,$Node_Name) - Distinct Node values for a given node name
5. getCollegeName($collegeid) - Name of college given college id
6. getChildNodes($node = 0) - get Child Nodes for a given node of structural tree
7. getAttributeChildNodes($node = 0) - get Child Nodes for a given node of attribute tree
8. getNodeName - Name of the given node
9. getPrevNode - Get prev node
10. isPublicNode - Check if the given node is public or not
11. getDisplaySections - Get enabled display sections
12. buildTreeWithNodeId - Builds Tree Structure for a given college
13. buildAttributeTreeWithNodeId - Build Attribute Tree for a given college and given node
14. getCollegeNodeAttributeData - Get data related to an array of tags - System Generated Answers
15. getChainOfName - Chain of Name Ex : CSE << Undergraduate << Engineering
16. mergeTreesGeneric - Merges an array of trees and returns an array of trees with enabled bit set based on if data exists or not
17. mergeTreesListsGeneric - Merges an array of trees (actually Lists' trees - Those of Distinct node value)
18. getDumpData - Get data related to a given node value
19. getParentName - Get name of the parent node
20. checkNodeDisplay - Check if from node till parent if any node with node value NULL i.e. not to be displayed
*/

class Tree
{
	public $id;
	public $label;
	public $value;
	public $summary;
	public $footer_comment;
	public $footer_value;
	public $coll_id;
	
	//public $enabled;
	//public $locked = 0;	//Based On Login
	//public $flags = 0;	//Based On Count Of Flags from table2
	//public $attribute = 0;	//If It is a attribute then it is 1, else 0
	public $children = array();	//Array of children
}

class Comparison_Tree
{
	public $id = array();
	public $label = array();
	public $value = array();
	public $summary = array();
	public $college_no = array();
	public $footer_comment = array();
	public $footer_value = array();
	//public $enabled;
	//public $locked = 0;	//Based On Login
	//public $flags = 0;	//Based On Count Of Flags from table2
	//public $attribute = 0;	//If It is a attribute then it is 1, else 0
	public $children = array();	//Array of children
}

class College_model extends CI_Model {

	/*
	Input : User ID
	Output : Array of Node Names related to a given user
	Table : nikhil_users_similar_nodes
	*/
	public function getUserRelatedNodes($cid)
	{
		$topResults = 10;
		$this->db->where('CID',$cid);
		$result = array();
		$data = $this->db->get(USERS_SIMILAR_NODES_TABLE)->result_array();
		if(isset($data[0]))
		{
			for($i=1;$i<=$topResults;$i++)
			{
				if(isset($data[0]["SIMILAR".$i]))
					array_push($result,$data[0]["SIMILAR".$i]);
			}
			return $result;
		}
		else
			return $result;
	}

	/*
	Input : CountryCode
	Output : Country Name
	Table : Country
	*/
	public function getCountry($countryCode)
	{
		$this->db->where('Country_Code',$countryCode);
		$data = $this->db->get('Country')->result();
		if(isset($data[0]))
			return $data[0]->Country_Name;
		else
			return NULL;
	}
	/*
	Input : CollegeNmae
	Output : encoded id
	Table : college
	*/
	function college_encode_id($val)
	  {
		$query = $this->db->query("select DISTINCT COLL_ID  from college where COLL_NAME like '%$val%'");
		$t = $query->row(0);
		$encoded = $this->id_encode($t->COLL_ID);
		return $encoded;
	  }

	/*
	Input : college-id as stored in database.
	Output: encoded college-id which is used in views.

	*/
	public function id_encode($data){
		$data = base_convert($data, 10, 32);
		$base64_safe = true;
		$key = "my secret magic bytes";
		$minlen = 11;
	    $data = str_pad($data, $minlen, '0', STR_PAD_LEFT);
	    $data = @mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_CBC);
	    if ($base64_safe) $data = str_replace(array('+','/','='),array('-','_',''), base64_encode($data));
	   return $data;
	}

	/*
	Input : encoded college-id.
	Output: decoded college-id.

	*/

	public function id_decode($data){
		$t =$data;
		$base64_safe = true;
		$key = "my secret magic bytes";
		$data = str_replace(array('-','_'),array('+','/'),$data );
		if ($base64_safe) $data = base64_decode($data.'==');
        $data = @mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_CBC);
        $data = base_convert($data, 32, 10);
        return $data;
	  // return $t;
	}

	/*
	Input : College Name
	Ouput : Array of College Names
	Table : nikhil_similar_nodes
	*/
	public function generateRecommendation($college = NULL)
	{
		$topResults = 5;
		$this->db->where('NODE_NAME',$college);
		$data = $this->db->get(COLLEGE_SIMILAR_NODES_TABLE)->result_array();
		$result = array();
		if(isset($data[0]))
		{
			for($i=1;$i<=$topResults;$i++)
				array_push($result,$data[0]["SIMILAR".$i]);
			return $result;
		}
		else
			return $result;
	}

	/*
	Input : College ID and the Node Name
	Output : Array of NODE_VALUES
	Table : table2
	Logic : Get all distinct Node Values from table2 corresponding to given
	node name and college id
	*/
	public function getDistinctNodeValues($collegeid,$Node_Name)
	{
		$result = array();
		$this->db->distinct();
		$this->db->select('NODE_VALUE');
		$this->db->where(array('COLL_ID'=>$collegeid,'NODE_NAME'=>$Node_Name));
		$data = $this->db->get('table2')->result();
		foreach($data as $row)
		{
			if($row->NODE_VALUE != NULL)
				array_push($result,$row->NODE_VALUE);
		}
		sort($result);
		return $result;
	}

	/*
	Input : College ID
	Output : College Name
	Table : college
	*/
	public function getCollegeName($collegeid)
	{
		//$this->db->where('colg_')
		$this->db->where('COLL_ID',$collegeid);
		$data = $this->db->get('college')->result();
		if(isset($data[0]))
			return array("college" => $data[0]->COLL_NAME,"latitude" => $data[0]->latitude,"longitude" => $data[0]->longitude,"country_code" => $data[0]->CountryCode,"city" => $data[0]->city, "Address" => $data[0]->Address);
		else
			return NULL;
	}

	public function getCollegeId($collegename = NULL){
		$this->db->where('COLL_NAME',$collegename);
		$data = $this->db->get('college')->result();
		if(isset($data[0]))
			return array("coll_id" => $data[0]->COLL_ID);
		else
			return -1;
	}

	/*
	Input : College ID and Node ID
	Output : Array of Node ID which are children of given node
	Table : NODETABLE
	*/
	public function getChildNodes($node = 0)
	{
		//New Code Starts
		$struct = $this->session->struct;
		$struct_pos = $this->session->struct_pos;
		$ans = array();
		if($struct_pos[$node] == NULL) return $ans;
		for($i=$struct_pos[$node];$i<sizeof($struct);$i++)
		{
			if($struct[$i]['Prev_Node'] == $node)
			{
				array_push($ans,$struct[$i]['Node_ID']);	
			}
			else
			{
				break;
			}
			
		}
		return $ans;
		//New Code Ends
		/*
		$this->db->select('Node_ID');
		$this->db->where(array('Prev_Node'=>$node));
		$data = $this->db->get('NODETABLE')->result();
		$ans = array();
		foreach($data as $nodeObject)
			array_push($ans,$nodeObject->Node_ID);
		return $ans;
		*/
	}

	/*
	Input : College ID and Node ID
	Output : Array of Node ID which are children of given node
	Table : AttributeNodeTable
	*/
	public function getAttributeChildNodes($node = 0,$nodeid,$collegeId)
	{
		//New Code Starts
		$tree = new Tree;
		$attr = $this->session->attr;
		$attr_pos = $this->session->attr_pos;
		$tb2_attr_pos = $this->session->tb2_attr_pos;
		$data = $this->session->data;

		if($attr_pos[$node] == NULL) return $tree;
		for($i=$attr_pos[$node];$i<sizeof($attr);$i++)
		{
			
			if($attr[$i]['Prev_Node'] == $node && $tb2_attr_pos[$nodeid][$attr[$i]['Node_ID']] != NULL)
			{
				$DNodes = $attr[$i]['Node_ID'];
				$j = $tb2_attr_pos[$nodeid][$DNodes];
				if($data[$j]['NODE_VALUE'] != NULL && $data[$j]['S_Node'] == $nodeid && $data[$j]['P_Node'] == $DNodes)
				{
					$child = $this->buildAttributeTreeWithNodeId($collegeId,$nodeid,$data[$j]['Answer_Node'],0);
					$child->id = "node-".$nodeid."-attribute-".$data[$j]['Answer_Node'];
					$child->label = $data[$j]['NODE_NAME'];
					$child->coll_id  = $collegeId;
					$child->footer_comment = $data[$j]['Footer_comment'];

					/*
						 Hard coded Data Starts below and vary if 
						   the database of attribute node table changes 
					*/
					//echo $data[$j]['Answer_Node'].'<br>';
					// Temporary to show gre,neet,... score as a right content
					$flag = 0;
					if($DNodes > 0  && $DNodes < 5)
					{
						$child->footer_value = 'students';
						$child->footer_comment = 'yearly intake';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 4  && $DNodes < 9)
					{
						$child->footer_value = 'full time faculty';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 8  && $DNodes < 15)
					{
						$child->footer_value = 'years';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 35 && $DNodes < 60)
					{
						$temp_dnode = $DNodes + 24;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$child->footer_value = 'Avg Score';
							$flag = 1;
						}

					} 
					//Temporary to show the scholarship percentage as right side
					else if($DNodes > 119 && $DNodes < 123)
					{
						$temp_dnode = $DNodes + 8;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$child->footer_value = 'students get aid';
							$flag = 1;
						}


					}

					else if($DNodes > 367 && $DNodes < 372)
					{
						$temp_dnode = $DNodes + 4;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$flag = 1;
						}
					}
					else if($DNodes > 375 && $DNodes < 380)
					{
						$temp_dnode = $DNodes + 4;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$flag = 1;
						}
					}
					else if($DNodes > 383 && $DNodes < 388)
					{
						$temp_dnode = $DNodes + 4;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$flag = 1;
						}

					}
					else if($DNodes > 391 && $DNodes < 396)
					{
						$temp_dnode = $DNodes + 4;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$flag = 1;
						}

					}
					else if($DNodes > 331 && $DNodes < 336)
					{
						$temp_dnode = $DNodes + 4;
						$query = $this->db->get_where('table2',array('P_Node ='   =>$temp_dnode,
					 												 'NODE_VALUE !=' => NULL));
						
						foreach($query->result() as $row)
						{
							$child->value = $row->NODE_VALUE;
							$child->footer_value = 'Seating Capacity';
							$flag = 1;
						}

					}

					else if($DNodes > 103 && $DNodes < 119)
					{
						if($DNodes > 103 && $DNodes < 108)
							$child->footer_value = 'a year';
						$child->value = $this->session->currency.' '.$data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 417 && $DNodes < 422)
					{
						$val = 100 - (int)$data[$j]['NODE_VALUE'];
						$child->value = $val.':'.$data[$j]['NODE_VALUE'];
						$child->footer_value = 'M:F';
						$flag = 1;
					}
					else if($DNodes > 421 && $DNodes < 434)
					{
						$child->value = $data[$j]['NODE_VALUE'].'%';
						if($DNodes>421 && $DNodes < 426)
						{
							$child->footer_value = 'students';
						}
						else if($DNodes>429 && $DNodes < 434)
						{
							$child->footer_comment = 'on campus';
							$child->footer_value = 'students';
						}
						$flag = 1;
					}
					else if($DNodes > 20 && $DNodes < 24)
					{
						
						$child->value = '1 out of '.$data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 347 && $DNodes < 356)
					{
						$child->footer_value = 'inside campus';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 361 && $DNodes < 368)
					{
						$child->footer_value = 'students organized';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 399 && $DNodes < 418)
					{
						$child->footer_value = 'a year';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 129 && $DNodes < 134)
					{
						$child->footer_value = 'Avg Per Student';
						$child->value = $this->session->currency.' '.$data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 138 && $DNodes < 143)
					{
						$child->value = $this->session->currency.' '.$data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 138 && $DNodes < 143)
					{
						$child->value = $this->session->currency.' '.$data[$j]['NODE_VALUE'];
						$flag = 1;
					}	
					else if($DNodes > 142 && $DNodes < 155)
					{
						$child->value = $this->session->currency.' '.$data[$j]['NODE_VALUE'];
						$curr = (int)$this->session->converter;
                        $ppp  = (int)$this->session->ppp;
                        $val  = (int)$data[$j]['NODE_VALUE'];
                        $power = round($val/($ppp*1000));
                        $power = '('.$power.'k PPP)';
 
                        $val = round($val/($curr*1000));
                        $val = $val.'k';
                        $child->footer_value = 'USD '.$val.$power;
						$flag = 1;
						if($DNodes > 142 && $DNodes < 147)
							$child->footer_comment = 'Total earnings per year';  
						else if($DNodes > 146 && $DNodes < 151)
							$child->footer_comment = 'Av of top decile salaries';
						else if($DNodes > 150 && $DNodes < 155)
							$child->footer_comment = 'Av earnings per year';	  
							
					}		
					else if($DNodes > 150 && $DNodes < 155)
					{
						$child->footer_value = 'Average';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 154 && $DNodes < 161)
					{
						$child->footer_value = 'of class';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					else if($DNodes > 160 && $DNodes < 167)
					{
						$child->footer_value = 'of class';
						$child->value = $data[$j]['NODE_VALUE'];
						$flag = 1;
					}
					/*
							Hard Coded Data ends here
					*/ 
					if($flag == 0)
					{
						$child->value = $data[$j]['NODE_VALUE'];

					}
					
					if($child->value=='' OR $child->value == NULL )
					{
						$child->value = 'N/A';
					}
					
						
					
					if($data[$j]['footer_value_flag']==1)
					{
						$child->footer_value = $this->getFooterValue($DNodes,$data[$j]['NODE_NAME'],$child->value);
					}
					else if($flag != 1)
					{
						$child->footer_value = $data[$j]['Footer_value'];
					}
					$child->attribute = 1;
					if($data[$j]['unit']!=NULL)
						$child->value = $child->value." ".$data[$j]['unit'];



					array_push($tree->children,$child);
				}
				else if($data[$j]['S_Node'] == $nodeid && $data[$j]['P_Node'] == $DNodes)
				{
					$child = $this->buildAttributeTreeWithNodeId($collegeId,$nodeid,$data[$j]['Answer_Node'],0);
					foreach($child->children as $grandchild)
						array_push($tree->children,$grandchild);
				}
				//array_push($ans,$attr[$i]['Node_ID']);	
			}
			else if($attr[$i]['Prev_Node'] != $node)
			{
				break;
			}
			
		}
		return $tree;
		//New Code Ends
		/*
		$this->db->select('Node_ID');
		$this->db->where(array('Prev_Node'=>$node));
		$data = $this->db->get('AttributeNodeTable')->result();
		$ans = array();
		foreach($data as $nodeObject)
			array_push($ans,$nodeObject->Node_ID);
		return $ans;
		*/
	}

	/*
	Input : Node ID
	Output : Node Name of given Node or "Blank"
	Table : NODETABLE
	*/
	public function getNodeName($node)
	{
		//New Code Starts
		$struct = $this->session->struct;
		$struct_node_pos = $this->session->struct_node_pos;
		$i = $struct_node_pos[$node];
		if($struct[$i]['Node_ID'] == $node)
		{
			$node_name = $struct[$i]['Node_Name'];
			$node_name = str_replace('Yes_', "", $node_name);	//Add further conditions
			return $node_name;
		}
		else return "";
		//New Code Ends
		/*
		$this->db->where('Node_ID',$node);
		$data = $this->db->get('NODETABLE')->result();
		if(isset($data[0]))
		{
			$node_name = $data[0]->Node_Name;
			$node_name = str_replace('Yes_', "", $node_name);	//Add further conditions
			return $node_name;
		}
		else
			return "";
		*/
	}

	/*
	Input : Node ID
	Output : Prev (or Parent) Node ID or NULL
	Table : NODETABLE
	*/
	public function getPrevNode($node)
	{
		//New Code Starts
		$struct = $this->session->struct;
		$struct_node_pos = $this->session->struct_node_pos;
		$i = $struct_node_pos[$node];
		if($struct[$i]['Node_ID'] == $node)
		{
			return $struct[$i]['Prev_Node'];
		}
		else return NULL;
		//New Code Ends
		/*
		$this->db->where('Node_ID',$node);
		$data = $this->db->get('NODETABLE')->result();
		if(isset($data[0]))
			return $data[0]->Prev_Node;
		else
			return NULL;
		*/
	}

	/*
	Input : Node ID
	Output : 1 or 0 based on Public bit of given Node (default is 1 i.e. it is Public)
	Table : NODETABLE
	*/
	public function isPublicNode($node)
	{
		//New Code Starts
		$struct = $this->session->struct;
		$struct_node_pos = $this->session->struct_node_pos;
		$i = $struct_node_pos[$node];
		if($struct[$i]['Node_ID'] == $node)
		{
			return $struct[$i]['Public'];
		}
		else return 1;
		//New Code Ends
		/*
		$this->db->where('Node_ID',$node);
		$data = $this->db->get('NODETABLE')->result();
		if(isset($data[0]))
			return $data[0]->Public;
		else
			return 1;
		*/
	}

	public function getDisplaySections()
	{
		//$display = ["Streams/Schools","Degrees","Majors"];
		//$label = ["PROGRAMS/STREAMS","DEGREE PROGRAMS","MAJORS OF STUDY"];	//Columns to display
		//$type = [0,1,1];
		$display = ["Streams/Schools"];
		$label = ["PROGRAMS/STREAMS"];	//Columns to display
		$type = [0];
		$result = array();
		$result['display'] = $display;
		$result['type'] = $type;
		$result['label'] = $label;
		return $result;
	}

	public function update_counter($collegeid = -1){
		$this->db->where('COLL_ID',$collegeid);
		$query = $this->db->get('college')->result_array();
		$data = array("Views" => $query[0]["Views"] + 1);
		$this->db->where('COLL_ID',$collegeid);
		$this->db->update('college', $data);
	}

	public function get_views($collegeid = -1){
		$this->db->where('COLL_ID',$collegeid);
		$query = $this->db->get('college')->result_array();
		return $query[0]["Views"];
	}

	/*
	Input : College ID,NodeID (Structural Node),Attribute ID(-1 or Structural Node of Attribute Tree),Public bit
	Output :
	Logic : Recursively call buildTreeWithNodeId for All Child Decision Nodes of a Structural node. Push all these trees obtained in the child array of given Tree
	*/
	public function buildTreeWithNodeId($collegeId,$nodeId,$attribute = -1,$public = 1)
	{
		$tree = new Tree;
		$sNodes = $this->college_model->getChildNodes($nodeId);

		if($attribute == -1)	//All Attributes
		{
			$start = microtime(true);
			$attributeTree = $this->buildAttributeTreeWithNodeId($collegeId,$nodeId,0,0);
			foreach($attributeTree->children as $child)
				array_push($tree->children,$child);
   			
   			$time_elapsed_secs = microtime(true) - $start;
			$session = $this->session->set_userdata;
			$session['time'] = $this->session->time;
			$session['updated_controller'] = $nodeId;
			$session['time']['attribute_time'] += $time_elapsed_secs; 
			$session['time'][$nodeId]= $time_elapsed_secs;
			//echo 'Nodeid-'.$nodeId.' :'.$time_elapsed_secs.'<br>';
			$this->session->set_userdata($session);
		}
		else
		{
			$start = microtime(true);
			$attributeTree = $this->buildAttributeTreeWithNodeId($collegeId,$nodeId,$attribute,1);
			foreach($attributeTree->children as $child)
				array_push($tree->children,$child);

			$time_elapsed_secs = microtime(true) - $start;
			$session = $this->session->set_userdata;
			$session['time'] = $this->session->time;
			$session['updated_controller'] = $nodeId.'attr'.$attribute;
			$session['time'][$nodeId.'attr'.$attribute]= $time_elapsed_secs;
			$session['time']['attribute_time'] += $time_elapsed_secs;
			$this->session->set_userdata($session);
		}

		for($i=0;$i<count($sNodes);$i++)
		{
			// New code starts
			$data = $this->session->data;
			$tb2_struct_pos = $this->session->tb2_struct_pos;
			$j = $tb2_struct_pos[$sNodes[$i]];
			//for($j=0;$j<sizeof($data);$j++)
			//{
				if($data[$j]['NODE_VALUE'] != NULL && $data[$j]['D_Node'] == $sNodes[$i])
				{
					if($public == 1)
					{
						if($this->isPublicNode($sNodes[$i]))
						{
							$child = new Tree;
							$child->label = $data[$j]['NODE_VALUE'];
							$child->footer_comment = $data[$j]['Footer_comment'];
							if($data[$j]['Footer_comment']==1)
							{
								$child->footer_value = $this->getFooterValue($sNodes[$i],$data[$j]['NODE_NAME'],$child->label);
							}
							else
							{
								$child->footer_value = $data[$j]['Footer_value'];
							}
							if($data[$j]['NODE_VALUE'] == "Others")	//If More Nodes
							{
								$children = $this->getChildNodes($this->getChildNodes($sNodes[$i])[0]);
								for($k=0;$k<count($children);$k++)
									array_push($sNodes,$children[$k]);
							}
							else
							{
								$child = $this->buildTreeWithNodeId($collegeId,$data[$j]['Answer_Node'],$attribute,$public);
								$child->label = $data[$j]['NODE_VALUE'];
								$child->footer_comment = $data[$j]['Footer_comment'];
								if($data[$j]['footer_value_flag']==1)
								{
									$child->footer_value = $this->getFooterValue($sNodes[$i],$data[$j]['NODE_NAME'],$child->label);
								}
								else
								{
									$child->footer_value = $data[$j]['Footer_value'];
								}
								$child->id = "node-".$data[$j]['Answer_Node'];
								array_push($tree->children,$child);
							}

						}
						else //Setting Locked bit to 1. So, that can display Lock Icon and ask to signup
						{
							$child = new Tree;
							$child->label = $data[$j]['NODE_VALUE'];
							$child->id = "node-".$data[$j]['Answer_Node'];
							$child->footer_comment = $data[$j]['Footer_comment'];
							if($data[$j]['footer_value_flag']==1)
							{
								$child->footer_value = $this->getFooterValue($sNodes[$i],$data[$j]['NODE_NAME'],$child->label);
							}
							else
							{
								$child->footer_value = $data[$j]['Footer_value'];
							}
							array_push($tree->children,$child);
						}

					}
					else
					{
						$child = new Tree;
						$child->label = $data[$j]['NODE_VALUE'];
						$child->footer_comment = $data[$j]['Footer_comment'];
						if($data[$j]['footer_value_flag']==1)
						{
							$child->footer_value = $this->getFooterValue($sNodes[$i],$data[$j]['NODE_NAME'],$data[$j]['NODE_VALUE']);
						}
						else
						{
							$child->footer_value = $data[$j]['Footer_value'];
						}
						if($data[$j]['NODE_VALUE'] == "Others")	//further tree
						{
							$children = $this->getChildNodes($this->getChildNodes($SNodes[$i])[0]);
							for($k=0;$k<count($children);$k++)
								array_push($sNodes,$children[$k]);
						}
						else
						{
							$child = $this->buildTreeWithNodeId($collegeId,$data[$j]['Answer_Node'],$attribute,$public);
							$child->label = $data[$j]['NODE_VALUE'];
							$child->id = "node-".$data[$j]['Answer_Node'];
							$child->footer_comment = $data[$j]['Footer_comment'];
							$child->footer_value = $data[$j]['Footer_value'];
							array_push($tree->children,$child);
						}
					}

				}
			//}

				//New code Ends
				/*
				$this->db->select('NODE_VALUE,Answer_Node, Footer_comment, Footer_value, footer_value_flag');
				$this->db->where(array('COLL_ID'=>$collegeId,'D_Node'=>$sNodes[$i]));
				$this->db->order_by('Answer_Node','DESC');
				$data = $this->db->get('table2')->result();
				if(isset($data[0]))
				{
					if($data[0]->NODE_VALUE != NULL)
					{
						if($public == 1)
						{
							if($this->isPublicNode($sNodes[$i]))	//Check Whether Given Node is Public or Not
							{
								$child = new Tree;
								$child->label = $data[0]->NODE_VALUE;
								$child->footer_comment = $data[0]->Footer_comment;
								if($data[0]->footer_value_flag==1)
								{
									$child->footer_value = $this->getFooterValue($data[0]->NODE_NAME,$child->label);
								}
								else
								{
									$child->footer_value = $data[0]->Footer_value;
								}
								if($data[0]->NODE_VALUE == "Others")	//If More Nodes
								{
									$children = $this->getChildNodes($this->sgetChildNodes($sNodes[$i])[0]);
									for($j=0;$j<count($children);$j++)
										array_push($sNodes,$children[$j]);
								}
								else
								{
									$child = $this->buildTreeWithNodeId($collegeId,$data[0]->Answer_Node,$attribute,$public);
									$child->label = $data[0]->NODE_VALUE;
									$child->footer_comment = $data[0]->Footer_comment;
									if($data[0]->footer_value_flag==1)
									{
										$child->footer_value = $this->getFooterValue($data[0]->NODE_NAME,$child->label);
									}
									else
									{
										$child->footer_value = $data[0]->Footer_value;
									}
									$child->id = "node-".$data[0]->Answer_Node;
									array_push($tree->children,$child);
								}
							}
							else //Setting Locked bit to 1. So, that can display Lock Icon and ask to signup
							{
								$child = new Tree;
								$child->label = $data[0]->NODE_VALUE;
								$child->id = "node-".$data[0]->Answer_Node;
								$child->footer_comment = $data[0]->Footer_comment;
								if($data[0]->footer_value_flag==1)
								{
									$child->footer_value = $this->getFooterValue($data[0]->NODE_NAME,$child->label);
								}
								else
								{
									$child->footer_value = $data[0]->Footer_value;
								}
								array_push($tree->children,$child);
							}
						}
						else
						{
							$child = new Tree;
							$child->label = $data[0]->NODE_VALUE;
							$child->footer_comment = $data[0]->Footer_comment;
							if($data[0]->footer_value_flag==1)
							{
								$child->footer_value = $this->getFooterValue($data[0]->NODE_NAME,$data[0]->NODE_VALUE);
							}
							else
							{
								$child->footer_value = $data[0]->Footer_value;
							}
							if($data[0]->NODE_VALUE == "Others")	//further tree
							{
								$children = $this->getChildNodes($this->getChildNodes($SNodes[$i])[0]);
								for($j=0;$j<count($children);$j++)
									array_push($sNodes,$children[$j]);
							}
							else
							{
								$child = $this->buildTreeWithNodeId($collegeId,$data[0]->Answer_Node,$attribute,$public);
								$child->label = $data[0]->NODE_VALUE;
								$child->id = "node-".$data[0]->Answer_Node;
								$child->footer_comment = $data[0]->Footer_comment;
								$child->footer_value = $data[0]->Footer_value;
								array_push($tree->children,$child);
							}
						}
					}
				}
				*/
		}
		return $tree;
	}

	/*
	Input : CollegeID,NodeID,AttributeID, Decision Node or Not
	Output : Tree with Attribute Data
	Logic:
	Recursively call this function for child Nodes of given attribute node.
	In case decision is 1 i.e. DNode is passed as argument, then it directly uses that node as DNode and start building Tree from that node.
	*/
	public function buildAttributeTreeWithNodeId($collegeId,$nodeid,$attribute = 0,$decision = 0)
	{
		$tree = new Tree;
		if($attribute > 35 && $attribute < 60)
		{
			return $tree;
		}

		if($decision == 0)
		{
			
			$tree = $this->getAttributeChildNodes($attribute,$nodeid,$collegeId);
		}
		else
		{
			$DNodes = array();
			array_push($DNodes,$attribute);
			for($i=0;$i<count($DNodes);$i++)
			{
				//New Code Starts
				
				$data = $this->session->data;
				$tb2_attr_pos = $this->session->tb2_attr_pos;
				$j = $tb2_attr_pos[$nodeid][$DNodes[$i]];
				//for($j=0;$j<sizeof($data);$j++)
				//{
					if($data[$j]['NODE_VALUE'] != NULL && $data[$j]['S_Node'] == $nodeid && $data[$j]['P_Node'] == $DNodes[$i])
					{
						$child = $this->buildAttributeTreeWithNodeId($collegeId,$nodeid,$data[$j]['Answer_Node'],0);
						$child->id = "node-".$nodeid."-attribute-".$data[$j]['Answer_Node'];
						$child->label = $data[$j]['NODE_NAME'];
						$child->value = $data[$j]['NODE_VALUE'];
						if($child->value=='' OR $child->value == NULL )
						{
							$child->value = 'N/A';
						}
							
						$child->footer_comment = $data[$j]['Footer_comment'];
						if($data[$j]['footer_value_flag']==1)
						{
							$child->footer_value = $this->getFooterValue($sNodes[$i],$data[$j]['NODE_NAME'],$child->value);
						}
						else
						{
							$child->footer_value = $data[$j]['Footer_value'];
						}
						$child->attribute = 1;
						if($data[$j]['unit']!=NULL)
							$child->value = $child->value." ".$data[$j]['unit'];

						array_push($tree->children,$child);
					}
					else if($data[$j]['S_Node'] == $nodeid && $data[$j]['P_Node'] == $DNodes[$i])
					{
						$child = $this->buildAttributeTreeWithNodeId($collegeId,$nodeid,$data[$j]['Answer_Node'],0);
						foreach($child->children as $grandchild)
							array_push($tree->children,$grandchild);
					}

				//}
				//New Code Ends
				/*
				
				
				$this->db->select('NODE_NAME,NODE_VALUE,Answer_Node,Footer_comment,footer_value_flag,Op1,Footer_value,unit');
				$this->db->where(array('COLL_ID'=>$collegeId,'S_Node'=>$nodeid,'P_Node'=>$DNodes[$i]));
				$data = $this->db->get('table2')->result();
				if(isset($data[0]))
				{
					if($data[0]->NODE_VALUE != NULL)
					{
						$child = $this->buildAttributeTreeWithNodeId($collegeId,$nodeid,$data[0]->Answer_Node,0);
						$child->id = "node-".$nodeid."-attribute-".$data[0]->Answer_Node;
						$child->label = $data[0]->NODE_NAME;
						$child->value = $data[0]->NODE_VALUE;
						if($child->value=='' OR $child->value == NULL )
						{
							$child->value = 'N/A';
						}
							
						$child->footer_comment = $data[0]->Footer_comment;
						if($data[0]->footer_value_flag==1)
						{
							$child->footer_value = $this->getFooterValue($data[0]->NODE_NAME,$child->value);
						}
						else
						{
							$child->footer_value = $data[0]->Footer_value;
						}
						$child->attribute = 1;
						if(isset($data[0]->unit))
							$child->value = $child->value." ".$data[0]->unit;

						array_push($tree->children,$child);
					}
					else
					{
						$child = $this->buildAttributeTreeWithNodeId($collegeId,$nodeid,$data[0]->Answer_Node,0);
						foreach($child->children as $grandchild)
							array_push($tree->children,$grandchild);
					}
				}
				*/
			}				
		}	
		return $tree;
	}

	public function getFooterValue($DNodes,$node_name,$val)
	{
		/*
		Currently Available
		Streams/Schools
		Degrees
		Majors
		Fees
		Placements
		Studentsenroll
		Students Enrolled
		N
		Tution_Fees
		Faculty
		Avgplacements
		Precourseearnings
		Scholarship
		Hostelboarding
		Tution
		*/
		// Footer Values may change later
		if($DNodes > 129 && $DNodes < 134)
		{
			return 'Avg Per Student';
		}
		else if($DNodes > 142 && $DNodes < 147)
		{
			return 'Average';
		}
		else if($DNodes > 146 && $DNodes < 151)
		{
			return 'Top 10%';
		}
		else if($DNodes > 150 && $DNodes < 155)
		{
			return 'Avgerage';
		}
		$val = preg_replace("/[^0-9]/","",$val);
		// Acceptance limits
		$acceptance_verytough = 500;
		$acceptance_tough = 250;
		$acceptance_moderate = 100;

		$acceptance_easy = 10;
		// Duration
		$duration_veryshort = 1;
		$duration_short = 2;
		$duration_average = 3;
		$duration_long = 4;
		$duration_verylong = 5;

		switch ($node_name) {
			case "Studentsenroll":
			    if($val>=$acceptance_verytough) 
					return 'very tough';
				else if ($val<$acceptance_verytough && $val>=$acceptance_tough)
					return 'tough';
				else if ($val<$acceptance_tough && $val>=$acceptance_moderate)
					return 'fair';
				else if ($val<$acceptance_moderate && $val>=$acceptance_easy)
					return 'easy';
			case "Duration":
			    if($val>=$duration_verylong) 
					return 'Very Long';
				else if ($val<$duration_verylong && $val>=$duration_long)
					return 'Long';
				else if ($val<$duration_long && $val>=$duration_average)
					return 'Average';
				else if ($val<$duration_average && $val>=$duration_short)
					return 'Short';	
				else if ($val<$duration_short && $val>=$duration_veryshort)
					return 'Very Short';	
			default:
				return "NULL";
		}
	}

		// get Academics Data
	public function getAcademics($collegeid)
	{
		$query = $this->db->query("SELECT Trigger_Ques , Node_ID FROM NODETABLE WHERE Node_Name = 'Academics' ");
		$query = $query->result();
		$ques = array();
		for($i=0;$i<sizeof($query);$i++)
		{
			$ques[$i] =  $query[$i]->Trigger_Ques;
		}
		$question_query =  $this->db->query("SELECT Header_val FROM QUESTIONTABALE WHERE Q_ID IN(".implode(',',$ques).")");
		$question_query = $question_query->result();
		$header = array();
		for($i=0;$i<sizeof($question_query);$i++)
		{
			$header[$i] =  $question_query[$i]->Header_val;
		}
		$mu_query = $this->db->query("SELECT * FROM psycho_table2 WHERE D_Node IN (SELECT Node_ID FROM NODETABLE WHERE Node_Name = 'Academics') AND COLL_ID = '$collegeid' AND Stream = 'All' AND Degree = 'All' AND Major = 'All'");
		$mu_query  = $mu_query->result();
		$mu = array(); $stat = array(); $roundoff_mu = array(); $footer = array();
		if(sizeof($mu_query)==0)
		{
			for($i=0;$i<sizeof($question_query);$i++)
			{
				$stat[$i] ='N/A';
			}
			
		}
		for($i=0;$i<sizeof($mu_query );$i++)
		{
			$mu[$i] =  $mu_query[$i]->MU;
			$stat[$i] = round(20*$mu[$i]).'%';
			
			$roundoff_mu[$i] = round($mu[$i]);
			$option = 'Op'.$roundoff_mu[$i];
			$d_node =  $mu_query[$i]->D_Node;
			
			if($mu[$i] > 0 )
			{
			$Trigger_Ques = $this->db->query("SELECT Trigger_Ques FROM NODETABLE WHERE Node_ID = $d_node ");
			$Trigger_Ques = $Trigger_Ques->result();
			$Trigger_Ques = $Trigger_Ques[0]->Trigger_Ques;
			$ques = $this->db->query("SELECT * FROM QUESTIONTABALE WHERE Q_ID = $Trigger_Ques ");
			$ques = $ques->result();
			$flag = $ques[0]->Footer_Flag;
			$ques = $ques[0]->$option;
			
			$footer_query = $this->db->query("SELECT OP_Text FROM OPTIONTABLE WHERE OP_ID = $ques ");
			$footer_query = $footer_query->result();
			$footer[$i] = $footer_query[0]->OP_Text;
			if($flag == 0)
			{
				$stat[$i] = $footer[$i];
				$footer[$i] = '';
			}
			}
			if($mu[$i] == 0 )
			{
				$stat[$i] ='N/A';
			}
		}
		return array($header,$stat,$footer,$collegeid);
		 
	}


	/*
	Input : Array of tags
	Output : JSON encoded array of trees
	Logic : I'll update it when Chirag does frontend for Communication Platform - As it would change on the basis of how we are displaying System Generated Answers
	*/
	public function getCollegeNodeAttributeData($tags)
	{
		$colleges = array();
		$structureTreeNodes = array();
		$attributeTreeNodes = array();
		foreach($tags as $tag)
		{
			$this->db->where('COLL_NAME',$tag);
			$data = $this->db->get('college')->result();
			if(isset($data[0]))
				array_push($colleges,array('id'=>$data[0]->COLL_ID,'name'=>$data[0]->COLL_NAME));
			else
			{
				$this->db->like('Node_Name','_'.$tag,'before');
				$data = $this->db->get('NODETABLE')->result();
				if(isset($data[0]))
					array_push($structureTreeNodes,$tag);
				else
				{
					$this->db->like('Node_Name','_'.$tag,'before');
					$data = $this->db->get('AttributeNodeTable')->result();
					if(isset($data[0]))
						array_push($attributeTreeNodes,$tag);
				}
			}
		}

		$result = array();
		foreach($colleges as $college)
		{
			foreach($structureTreeNodes as $sNodeName)
			{
				//get From table2
				$sNodes = array();
				$this->db->select('Answer_Node');
				$this->db->where(array('COLL_ID'=>$college["id"],'NODE_NAME'=>$sNodeName));
				$data = $this->db->get('table2')->result();
				if(count($data)>0)
				{
					$sNodeName = $data[0]->NODE_NAME;
					foreach($data as $row)
						array_push($sNodes,$row->Answer_Node);
				}
				else
				{
					$this->db->where(array('COLL_ID'=>$college["id"],'NODE_VALUE'=>$sNodeName));
					$data = $this->db->get('table2')->result();
					if(count($data)>0)
					{
						$sNodeName = $data[0]->NODE_VALUE;
						foreach($data as $row)
							array_push($sNodes,$row->Answer_Node);
					}
				}

				foreach($sNodes as $sNode)
				{
					foreach($attributeTreeNodes as $aNodeName)
					{
						$this->db->where(array('COLL_ID'=>$college["id"],'S_Node'=>$sNode,'NODE_NAME'=>$aNodeName));
						$data = $this->db->get('table2')->result();
						if(count($data)>0)
						{
							foreach($data as $row)
							{
								$aNode = $row->P_Node;
								$grandchild = $this->buildAttributeTreeWithNodeId($college["id"],$sNode,$aNode,1);
								if(count($grandchild->children)>1)
								{
									$grandchild->label = $row->NODE_NAME." for ".$sNodeName."(".$this->getParentName($college["id"],$sNode).") at ".$college["name"];	//If multiple children
									array_push($result,$grandchild);
								}
								else
								{
									$grandchild->label = $row->NODE_NAME." for ".$sNodeName."(".$this->getParentName($college["id"],$sNode).") at ".$college["name"];
									$grandchild->value = $row->NODE_VALUE;
									if(isset($row->unit))
										$grandchild->value = $grandchild->value." ".$row->unit;
									$grandchild->children = array();
									array_push($result,$grandchild);
								}
							}
						}
					}
				}
			}
		}

		foreach($colleges as $college)
		{
			foreach($structureTreeNodes as $sNodeName)
			{
				$sNodes = array();
				$this->db->select('NODE_NAME,Answer_Node');
				$this->db->where(array('COLL_ID'=>$college["id"],'NODE_NAME'=>$sNodeName));
				$data = $this->db->get('table2')->result();
				if(count($data)>0)
				{
					$sNodeName = $data[0]->NODE_NAME;
					foreach($data as $row)
						array_push($sNodes,$row->Answer_Node);
				}
				else
				{
					$this->db->select('NODE_VALUE,Answer_Node');
					$this->db->where(array('COLL_ID'=>$college["id"],'NODE_VALUE'=>$sNodeName));
					$data = $this->db->get('table2')->result();
					if(count($data)>0)
					{
						$sNodeName = $data[0]->NODE_VALUE;
						foreach($data as $row)
							array_push($sNodes,$row->Answer_Node);
					}
				}

				$tree = new Tree;
				$tree->label = "Details about ".$sNodeName." at ".$college["name"];	//Degrees at IITR

				foreach($sNodes as $sNode)
				{
					$child = new Tree;
					$child = $this->buildAttributeTreeWithNodeId($college["id"],$sNode,0,0);
					$child->label = $this->getParentName($college["id"],$sNode);
					if(count($child->children)>0)
						array_push($tree->children,$child);
				}

				if(count($tree->children)>0)
					array_push($result,$tree);
			}
		}

		foreach($colleges as $college)
		{
			$tree = new Tree;
			$tree->label = "Details about ".$college["name"]." <a href='/college/details/".$this->id_encode($college["id"])."'>here</a>";
			array_push($result,$tree);
		}
		return $result;
	}

	/*
	Input : College and Node ID
	Output : A chain of name like Engg >> Masters >> CS etc.
	*/
	public function getChainOfName($college,$sNode)
	{
		$label = $this->getNodeName($sNode);
		$sNode = $this->getPrevNode($this->getPrevNode($sNode));
		do
		{
			$childlabel = $this->getNodeName($sNode);
			if($childlabel != "College_Name")
				$label = $childlabel." >> ".$label;
			$sNode = $this->getPrevNode($this->getPrevNode($sNode));
		} while ($sNode != 0);
		return $label;
	}

	/*
	Input :
	An array of Trees
	A bitsting 0,1 denoting that the root of tree is valid in which all trees
	A label for the root and id of the root
	Output :
	An array of Trees
	Logic :
	This function first finds the minimum node of all the TO BE ADDRESSED (a counter array is maintained for this) nodes of different trees	(On the basis of node-id's and attribute-id's extracted from the id of the tree's NODE it checks the minimum node)
	Then it checks which all colleges have the current node to be addressed equal to the minimum node.
	It sets newWhich bit 1 if it is the minimum node, else sets it to 0
	Then it calls the mergeTreesGeneric() with these new NODE's trees as the input.
	Then it increases the counter of each tree which had newWhich == 1
	And again finds the minimum node.
	The node's labels of trees with which == 1 are set to enabled(label) and those with which == 0 are set to disabled(label)
	*/
	public function mergeTreesGeneric($trees,$which,$label,$id)
	{
		$numberToCompare = strlen($which);
		$resultTrees = array();

		$counter = array();
		for($i=0;$i<$numberToCompare;$i++)	//Initializing Variables
		{
			$tree = new Tree;
			$tree->id = $id;
			$tree->value = $trees[$i]->value;
			$tree->attribute = $trees[$i]->attribute;
			if($which[$i] == "1")
			{
				$tree->enabled = 1;
				$tree->label = $label;
			}
			else
			{
				$tree->enabled = 0;
				$tree->label = $label;
			}

			array_push($resultTrees,$tree);
			$counter[$i] = 0;
		}

		$totalSum = 0;
		for($i=0;$i<$numberToCompare;$i++)
			if($which[$i] == "1" && isset($trees[$i]->children))
				$totalSum += count($trees[$i]->children);

		while($totalSum > 0)
		{
			$minNode = INF;
			$minAttribute = INF;
			for($i = 0;$i<$numberToCompare;$i++)	//Finding Minimum Node amongst WHICH = 1 NODES
			{
				if($which[$i] == "1" && $counter[$i]<count($trees[$i]->children))
				{
					$id = $trees[$i]->children[$counter[$i]]->id;
					$terms = explode('-',$id);	//id of form node-<NOdeID>-attribute-<AttributeID>
					$node = INF;
					$attribute = INF;
					if(isset($terms[1]))
						$node = $terms[1];
					if(isset($terms[3]))
						$attribute = $terms[3];
					if($node < $minNode)
					{
						$minNode = $node;
						$minAttribute = $attribute;
					}
					else if($node == $minNode)
					{
						if($attribute < $minAttribute)
						{
							$minAttribute = $attribute;
						}
					}
				}
			}

			$newWhich = $which;
			$count = 0;
			for($i = 0;$i<$numberToCompare;$i++)
			{
				if($which[$i] == "1" && $counter[$i]<count($trees[$i]->children))
				{
					$id = $trees[$i]->children[$counter[$i]]->id;
					$terms = explode('-',$id);
					$node = INF;
					$attribute = INF;
					if(isset($terms[1]))
						$node = $terms[1];
					if(isset($terms[3]))
						$attribute = $terms[3];

					if(!($node == $minNode && $attribute == $minAttribute))
						$newWhich[$i] = "0";
					else
						$count += 1;
				}
			}

			$newTrees = array();
			for($i = 0;$i<$numberToCompare;$i++)
			{
				if($newWhich[$i] == "1" && $counter[$i]<count($trees[$i]->children))
				{
					$newLabel = $trees[$i]->children[$counter[$i]]->label;
					$newId = $trees[$i]->children[$counter[$i]]->id;
					array_push($newTrees,$trees[$i]->children[$counter[$i]]);
					$counter[$i]++;
				}
				else
				{
					$newWhich[$i] = "0";
					array_push($newTrees,NULL);
				}
			}
			$totalSum-=$count;
			$tempTrees = $this->mergeTreesGeneric($newTrees,$newWhich,$newLabel,$newId);
			for($i = 0;$i<$numberToCompare;$i++)
				array_push($resultTrees[$i]->children,$tempTrees[$i]);
		}

		return $resultTrees;
	}

	/*
	For List kind of display, where the order is not determined on the basis of id but instead on the basis of alphabets/lexico -> This function would recursively mergethe trees (Similar to above, just minimum finding part changed)
	*/
	public function mergeTreesListGeneric($trees,$which,$label,$id)
	{
		$numberToCompare = strlen($which);
		$resultTrees = array();

		$counter = array();
		for($i=0;$i<$numberToCompare;$i++)	//Initializing Variables
		{
			$tree = new Tree;
			$tree->id = $id;
			$tree->value = $trees[$i]->value;
			$tree->attribute = $trees[$i]->attribute;
			if($which[$i] == "1")
			{
				$tree->enabled = 1;
				$tree->label = $label;
			}
			else
			{
				$tree->enabled = 0;
				$tree->label = $label;
			}

			array_push($resultTrees,$tree);
			$counter[$i] = 0;
		}

		$totalSum = 0;
		for($i=0;$i<$numberToCompare;$i++)
			if($which[$i] == "1" && isset($trees[$i]->children))
				$totalSum += count($trees[$i]->children);

		while($totalSum > 0)
		{
			$minNode = "";
			for($i = 0;$i<$numberToCompare;$i++)	//Finding Minimum Node amongst WHICH = 1 NODES
			{
				if($which[$i] == "1" && $counter[$i]<count($trees[$i]->children))
				{
					$minNode = $trees[$i]->children[$counter[$i]]->label;
					break;
				}
			}

			for(;$i<$numberToCompare;$i++)
			{
				if($which[$i]== "1" && $counter[$i]<count($trees[$i]->children))
				{
					$node = $trees[$i]->children[$counter[$i]]->label;
					if($node<$minNode)
						$minNode = $node;
				}
			}

			$newWhich = $which;
			$count = 0;
			for($i = 0;$i<$numberToCompare;$i++)
			{
				if($which[$i] == "1" && $counter[$i]<count($trees[$i]->children))
				{
					$node = $trees[$i]->children[$counter[$i]]->label;
					if(!($node == $minNode))
						$newWhich[$i] = "0";
					else
						$count += 1;
				}
			}

			$newTrees = array();
			for($i = 0;$i<$numberToCompare;$i++)
			{
				if($newWhich[$i] == "1" && $counter[$i]<count($trees[$i]->children))
				{
					$newLabel = $trees[$i]->children[$counter[$i]]->label;
					$newId = $trees[$i]->children[$counter[$i]]->id;
					array_push($newTrees,$trees[$i]->children[$counter[$i]]);
					$counter[$i]++;
				}
				else
				{
					$newWhich[$i] = "0";
					array_push($newTrees,NULL);
				}
			}
			$totalSum-=$count;
			$tempTrees = $this->mergeTreesGeneric($newTrees,$newWhich,$newLabel,$newId);
			for($i = 0;$i<$numberToCompare;$i++)
				array_push($resultTrees[$i]->children,$tempTrees[$i]);
		}

		return $resultTrees;
	}

	/*
	Input : College ID
			POST variable : Label -> The label whose data we want to display
			Example Computer Science, Bachelors, etc.
	Output : A json encoded Tree Structure
	Logic : For the given label, it build all the possible attribute trees and also gets the
	chain of name i.e. For example for Computer Science -> CS << Bachelors << Engg. (or) CS << Masters << Engg.
	*/
	public function getDumpData($collegeId,$label,$public = 1)
	{
		//Get Structural NodeID of Nodes with NODE_NAME = Label
		//OR Answer_Node of Decision Nodes with NODE_VALUE = Label
		//New Code Starts
		$data = $this->session->data;
		$sNodes = array();
		$dNodes = array();
		$result = array();
		for($i=0;$i<sizeof($data);$i++)
		{
			if($data[$i]['NODE_VALUE']==$label && $data[$i]['Answer_Node'] != NULL &&$data[$i]['D_Node'] !=NULL)
			{
				if($this->checkNodeDisplay($collegeId,$data[$i]['D_Node']) == 1)
				{
					array_push($dNodes,$data[$i]['D_Node']);
					array_push($sNodes,$data[$i]['Answer_Node']);
				}

			}
		}
		$tree = new Tree;
		$tree->label = "Details about ".$label;
		$tree->id = $label;
		foreach($sNodes as $index=>$sNode)
		{
			$child = new Tree;
			$dNode = $dNodes[$index];
			$node = $this->getPrevNode($dNode);
			$child = $this->buildTreeWithNodeId($collegeId,$sNode,-1,$public);
			$child->label = $this->getNodeName($node);
			$child->id = "node-".$sNode;
			array_push($tree->children,$child);
		}
		//New Code Ends
		/*
		$this->db->select('Answer_Node,D_Node');
		$this->db->where(array('COLL_ID'=>$collegeId,'NODE_VALUE'=>$label));
		$data = $this->db->get('table2')->result();
		$sNodes = array();
		$dNodes = array();
		$result = array();
		if(isset($data[0]))
		{
			foreach($data as $row)
			{
				if($row->D_Node != NULL && $row->Answer_Node != NULL)
				{
					if($this->checkNodeDisplay($collegeId,$row->D_Node) == 1)
					{
						array_push($dNodes,$row->D_Node);
						array_push($sNodes,$row->Answer_Node);
					}

				}
			}

			$tree = new Tree;
			$tree->label = "Details about ".$label;
			$tree->id = $label;
			foreach($sNodes as $index=>$sNode)
			{
				$child = new Tree;
				$dNode = $dNodes[$index];
				$node = $this->getPrevNode($dNode);
				$child = $this->buildTreeWithNodeId($collegeId,$sNode,-1,$public);
				$child->label = $this->getNodeName($node);
				$child->id = "node-".$sNode;
				array_push($tree->children,$child);
			}
		}
		*/
		return $tree;
	}

	/*
	Input : College and Node ID
	Output : The Name of The Parent Node. For example, if CSE -> Then May be Undergraduate or Masters
	*/
	public function getParentName($college,$sNode)
	{
		$label = $this->getNodeName($sNode);
		$sNode = $this->getPrevNode($this->getPrevNode($sNode));
		$newLabel = $this->getNodeName($sNode);
		if($newLabel != NULL)
			return $newLabel;
		else
			return $label;
	}

	public function checkNodeDisplay($college,$dNode)
	{
		if($dNode == 0)
		{
			return 1;
		}
		else
		{
			// Code Starts
			$data = $this->session->data;
			$tb2_struct_pos = $this->session->tb2_struct_pos;
			$i = $tb2_struct_pos[$dNode];
			if($data[$i]['D_Node'] == $dNode && $data[$i]['NODE_VALUE'] == NULL) return 0;
			else if($data[$i]['D_Node'] == $dNode ) 
			{
				$dNode = $this->getPrevNode($this->getPrevNode($dNode));
			}
			$value = $this->checkNodeDisplay($college,$dNode);
			// Code Ends
			/*
			$query = $this->db->get_where('table2',array('COLL_ID =' => $college,
							  					   	    'D_Node  =' => $dNode));
			foreach($query->result() as $row)
			{
				if($row->NODE_VALUE == NULL) return 0;

				$dNode = $this->getPrevNode($this->getPrevNode($dNode));

			}

			$value = $this->checkNodeDisplay($college,$dNode);
			*/

		}
		return $value;
	}

	public function getAllChoices($prev_node = 0,$source = 'streams')	//prev_node is an array
	{
		if($prev_node == -1)
		{
			if($source == 'streams')
			{
				$streams = $this->getAllChoices(0,'streams');
				return $streams;
			}
			if($source == 'degrees')
			{
				$streams = $this->getAllChoices(0,'streams');
				$temp = array();
				foreach($streams as $stream)
				{
					$id = $stream['Node_ID'];
					$degrees = $this->getAllChoices($id,'degrees');
					foreach($degrees as $degree)
						$temp[$degree['Node_Name']] = -1;
				}
				$result = array();
				foreach($temp as $name=>$id)
				{
					array_push($result,array('Node_ID'=>$id,'Node_Name'=>$name));
				}
				return $result;
			}
			else if($source == 'majors')
			{
				$temp = array();
				$streams = $this->getAllChoices(0,'streams');
				foreach($streams as $stream)
				{
					$id = $stream['Node_ID'];
					$degrees = $this->getAllChoices($id,'degrees');
					foreach($degrees as $degree)
					{
						$dId = $degree['Node_ID'];
						$majors  = $this->getAllChoices($dId,'majors');
						foreach($majors as $major)
						{
							$temp[$major['Node_Name']] = -1;
						}
					}
				}
				$result = array();
				foreach($temp as $name=>$id)
					array_push($result,array('Node_ID'=>$id,'Node_Name'=>$name));
				return $result;
			}
		}
		else
		{
			$result = array();
			$this->db->select('Node_ID');
			$this->db->where('Prev_Node',$prev_node);	//0 is root node i.e parent structural node of Streams
			$data = $this->db->get('NODETABLE')->result();
			if(count($data)>0)
			{
				$dNode = array();
				foreach($data as $row)
					array_push($dNode,$row->Node_ID);
				$this->db->select('Node_ID,Node_Name');
				$this->db->where_in('Prev_Node',$dNode);
				$this->db->like('Node_Name','Yes','after');
				$data = $this->db->get('NODETABLE')->result();
				if(count($data)>0)
				{
					foreach($data as $row)
					{
						array_push($result,array('Node_ID'=>$row->Node_ID,'Node_Name'=>ucfirst(strtolower(str_replace('Yes_', "",$row->Node_Name)))));
					}
				}
			}
			return $result;
		}
	}

	public function getSelectedChoices($collegeId,$node_name,$choices)
	{
		$result = array();
		$this->db->select('Answer_Node,NODE_VALUE');
		$this->db->where('COLL_ID',$collegeId);
		$this->db->where('NODE_NAME',$node_name);
		$this->db->where_in('Answer_Node',$choices);
		$data = $this->db->get('table2')->result();
		if(count($data)>0)
		{
			foreach($data as $row)
				array_push($result,array('Node_ID'=>$row->Answer_Node,'Node_Name'=>$row->NODE_VALUE));
		}
		return $result;
	}
	public function get_currency($val)
	{
		$query = $this->db->query("SELECT * FROM Country WHERE Country_Code = '$val' ");
		$query = $query->result();
		$data['currency'] 	= $query[0]->currency_code;
		$data['converter']  = $query[0]->Units_per_USD; 
		$data['ppp']		= $query[0]->purchasePowerParity; 
		return $data;
	}
  
}