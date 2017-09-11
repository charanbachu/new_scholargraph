<?php

/*
FUNCTIONS
1. process_user() - Process user related logs
2. process_batch() - Process college related logs
3. addToLogStatic() - Saves in the log table if valid data i.e. CID!=NULL and TEXT!=NULL
*/

class Log_model extends CI_Model {

	/*
	Input : Starting ID of LOG Table, End
	Output : Percentage of Log Processed
	Logic :
	There are 5 Steps
		1. Getting Distinct Users
		2. Getting Each Node and Its Frequency
		3. Getting Universe - Total No. of nodes
		4. For each User
			4.a Get Each Node's count in this user's sessions. (NormFreq)
			4.b Get Score of each node
			4.c Sort these score and get top $topResults
			4.d Get existing results.
			4.e Merge these two keeping in mind that only $topResults - $fixedResults can be replaced
			4.f Update These in the table
		5. Update Current Value in POSITION_TABLE
	*/
	public function process_user($start,$current,$end)
	{
		$topResults = 10;
		$fixedResults = 5;
		$nodeInOneCycle = 10;

		//Got Distinct Users
		$sql = 'SELECT DISTINCT(CID) AS CID FROM '.LOG_TABLE.' WHERE ID >= '.$start.' AND ID<= '.$end.' ORDER BY CID ASC';
		$users = $this->db->query($sql)->result();

		$distinctUsers = count($users);
		//Slicing Users to get current cycle's users
		$users = array_slice($users,$current,$nodeInOneCycle);

		//Got Total of Each Node
		$sql = 'SELECT TEXT,COUNT(TEXT) AS TOTAL FROM '.LOG_TABLE.' WHERE ID >= '.$start.' AND ID<= '.$end.' GROUP BY TEXT';
		$nodeCount = $this->db->query($sql)->result();
		foreach($nodeCount as $node)
		{
			$freq[$node->TEXT] = $node->TOTAL;
		}

		//Got Universe
		$sql = 'SELECT COUNT(ID) AS UNIVERSE FROM '.LOG_TABLE.' WHERE ID>= '.$start.' AND ID<= '.$end;
		$data = $this->db->query($sql)->result();
		if($data[0]->UNIVERSE == NULL)
			$universe = 0;
		else
			$universe = $data[0]->UNIVERSE;

		foreach($users as $user)
		{
			$CID = $user->CID;
			//need to get count of each
			//also count of each node in this range
			$sql = 'SELECT b.TEXT AS TEXT, COUNT(b.TEXT) AS NORMFREQ FROM (SELECT DISTINCT(CID_SESSION_ID) FROM '.LOG_TABLE.' WHERE CID = "'.$CID.'") a, '.LOG_TABLE.' b WHERE a.CID_SESSION_ID = b.CID_SESSION_ID GROUP BY b.TEXT';
			$data = $this->db->query($sql)->result();
			$total = 0;
			$normFreq = array();
			foreach($data as $row)
			{
				$normFreq[$row->TEXT] = $row->NORMFREQ;
				$total+=$row->NORMFREQ;
			}
			//find score for each
			$distinctNodes = array_keys($normFreq);
			$finalScore = array();
			foreach($distinctNodes as $childnode)
			{
				if($freq[$childnode]!=0)
				{
					$score = (((double)$normFreq[$childnode]/(double)$total))/(pow(((double)$freq[$childnode]/(double)$universe),0.7));
					$finalScore[$childnode] = $score;
				}
			}
			arsort($finalScore);	//Change it to only top 5 would improve a lot
			$finalRelated = array_slice(array_keys($finalScore),0,$topResults);	//Getting Top10

			$found = 0;
			$data = array();
			$this->db->where('CID',$CID);
			$queryResult = $this->db->get(USERS_SIMILAR_NODES_TABLE)->result_array();
			if(isset($queryResult[0]))
			{
				$found = 1;
				$data = $queryResult[0];
			}
			else
			{
				$found = 0;
				$data = array('CID'=>$CID);
			}

			$tempScore = array();
			if($found == 1)
				for($i=$fixedResults+1;$i<=$topResults;$i+=1)
					$tempScore[$data["SIMILAR".$i]] = $data["SCORE".$i];

			for($i=0;$i<$topResults;$i++)
				$tempScore[$finalRelated[$i]] = $finalScore[$finalRelated[$i]];

			if($found == 1)
				for($i=1;$i<=$fixedResults;$i++)
					$tempScore[$data["SIMILAR".$i]] = $data["SCORE".$i];

			arsort($tempScore);
			$tempScoreKeys = array_keys($tempScore);
			for($i=1;$i<=$topResults;$i++)
			{
				$data["SIMILAR".$i] = $tempScoreKeys[$i-1];
				$data["SCORE".$i] = $tempScore[$tempScoreKeys[$i-1]];
			}

			if($found == 1)
			{
				$this->db->where('CID',$CID);
				$this->db->update(USERS_SIMILAR_NODES_TABLE,$data);
			}
			else
			{
				$this->db->insert(USERS_SIMILAR_NODES_TABLE,$data);
			}
		}

		$current = $current + $nodeInOneCycle;

		if($current >= $distinctUsers)
		{
			//SET START TO END+1
			$this->db->set('NUM_DATA',$end+1);
			$this->db->where('LABEL','USER_S');
			$this->db->update(LOG_POSITION_TABLE);

			//SET END TO -1
			$this->db->set('NUM_DATA',-1);
			$this->db->where('LABEL','USER_E');
			$this->db->update(LOG_POSITION_TABLE);

			//SET CURRENT TO 0
			$this->db->set('NUM_DATA',0);
			$this->db->where('LABEL','USER_C');
			$this->db->update(LOG_POSITION_TABLE);
			return 100;
		}
		else
		{
			//SET CURRENT TO NEW CURRENT
			$this->db->set('NUM_DATA',$current);
			$this->db->where('LABEL','USER_C');
			$this->db->update(LOG_POSITION_TABLE);

			return 100*((double)($current)/(double)($distinctUsers));
		}
	}

	/*
	Input : Starting ID of LOG Table, End
	Output : Percentage of Log Processed
	Logic :
	There are 5 Steps
		1. Getting Universe - Only College Nodes
		2. Getting Each Node and Its Frequency
		3. For each College(node)
			4.a Get Each Node's Normalized Frequency i.e. Count of occurence of each node in same session as that of our processing node.
			4.b Get Score of each node
			4.c Sort these score and get top $topResults
			4.d Get existing results.
			4.e Merge these two keeping in mind that only $topResults - $fixedResults can be replaced
			4.f Update These in the table
		5. Update Current Value in POSITION_TABLE
	*/
	public function process_batch($start = 0,$end = -1,$current = 0)
	{
		$topResults = 5;
		$fixedResults = 2;
		$nodeInOneCycle = 10;

		//Got Universe - Only College Nodes
		$sql = 'SELECT COUNT(ID) AS UNIVERSE FROM '.LOG_TABLE.' WHERE ID>= '.$start.' AND ID<= '.$end.' AND TYPE = '.TYPE_COLLEGE;
		$data = $this->db->query($sql)->result();
		if($data[0]->UNIVERSE == NULL)
			$universe = 0;
		else
			$universe = $data[0]->UNIVERSE;

		//Got Total of Each Node
		$sql = 'SELECT TEXT,COUNT(TEXT) AS TOTAL FROM '.LOG_TABLE.' WHERE ID >= '.$start.' AND ID<= '.$end.' AND TYPE = '.TYPE_COLLEGE.' GROUP BY TEXT ORDER BY TEXT';
		$nodeCount = $this->db->query($sql)->result();
		foreach($nodeCount as $node)
		{
			$freq[$node->TEXT] = $node->TOTAL;
		}

		$distinctNodes = array_slice(array_keys($freq),$current,$nodeInOneCycle);
		foreach($distinctNodes as $node)
		{
			//these are all colleges, increase count of college views by this value
			$this->db->where('COLL_NAME',$node);
			$data = $this->db->get('college')->result();
			if(count($data)>0)
			{
				$data = $data[0];
				$data->Views = $data->Views+$freq[$node];
				$this->db->where('COLL_NAME',$node);
				$this->db->update('college',$data);
			}
			//Getting NORMFREQ AND TOTAL
			$sql = 'SELECT b.TEXT AS TEXT, COUNT(b.TEXT) AS NORMFREQ FROM (SELECT DISTINCT(CID_SESSION_ID) FROM '.LOG_TABLE.' WHERE TEXT = "'.$node.'" AND TYPE = '.TYPE_COLLEGE.') a, '.LOG_TABLE.' b WHERE a.CID_SESSION_ID = b.CID_SESSION_ID AND b.TYPE = '.TYPE_COLLEGE.' AND b.TEXT <> "'.$node.'" GROUP BY b.TEXT';
			$data = $this->db->query($sql)->result();
			$total = 0;
			$normFreq = array();
			foreach($data as $row)
			{
				$normFreq[$row->TEXT] = $row->NORMFREQ;
				$total+=$row->NORMFREQ;
			}

			//Getting SCORE OF EACH
			$childNodes = array_keys($normFreq);
			if($total!=0)
			{
				$finalScore = array();
				foreach($childNodes as $childnode)
				{
					if($freq[$childnode]!=0)
					{
							$score = (((double)$normFreq[$childnode]/(double)$total))/(pow(((double)$freq[$childnode]/(double)$universe),0.7));
							$finalScore[$childnode] = $score;
					}
				}

				arsort($finalScore);
				$finalRelated = array_slice(array_keys($finalScore),0,$topResults);
				$found = 0;
				$this->db->where('NODE_NAME',$node);
				$queryResult = $this->db->get(COLLEGE_SIMILAR_NODES_TABLE)->result_array();
				if(isset($queryResult[0]))
				{
					$found = 1;
					$data = $queryResult[0];
				}
				else
				{
					$found = 0;
					$data = array('NODE_NAME'=>$node);
				}

				$tempScore = array();
				if($found == 1)
					for($i=$fixedResults+1;$i<=$topResults;$i+=1)
						$tempScore[$data["SIMILAR".$i]] = $data["SCORE".$i];

				for($i=0;$i<min($topResults,count($finalRelated));$i++)
					$tempScore[$finalRelated[$i]] = $finalScore[$finalRelated[$i]];

				if($found == 1)
					for($i=1;$i<=$fixedResults;$i++)
						$tempScore[$data["SIMILAR".$i]] = $data["SCORE".$i];

				arsort($tempScore);
				$tempScoreKeys = array_keys($tempScore);
				for($i=1;$i<=min($topResults,count($tempScoreKeys));$i++)
				{
					$data["SIMILAR".$i] = $tempScoreKeys[$i-1];
					$data["SCORE".$i] = $tempScore[$tempScoreKeys[$i-1]];
				}

				if($found == 1)
				{
					$this->db->where('NODE_NAME',$node);
					$this->db->update(COLLEGE_SIMILAR_NODES_TABLE,$data);
				}
				else
				{
					$this->db->insert(COLLEGE_SIMILAR_NODES_TABLE,$data);
				}
			}
		}
		$current = $current + count($distinctNodes);

		if($current >= count($freq))
		{
			//SET START TO END+1
			$this->db->set('NUM_DATA',$end+1);
			$this->db->where('LABEL','BATCH_S');
			$this->db->update(LOG_POSITION_TABLE);

			//SET END TO -1
			$this->db->set('NUM_DATA',-1);
			$this->db->where('LABEL','BATCH_E');
			$this->db->update(LOG_POSITION_TABLE);

			//SET CURRENT TO 0
			$this->db->set('NUM_DATA',0);
			$this->db->where('LABEL','BATCH_C');
			$this->db->update(LOG_POSITION_TABLE);
			return 100;
		}
		else
		{
			//SET CURRENT TO NEW CURRENT
			$this->db->set('NUM_DATA',$current);
			$this->db->where('LABEL','BATCH_C');
			$this->db->update(LOG_POSITION_TABLE);

			return 100*((double)($current)/(double)count($freq));
		}
	}

	/*
	Input : text,action and type
	Output : None
	Inserts into Log table
	*/
	public function addToLogStatic($text,$action,$type)
	{
		$cid = $this->session->cid;
		$sessionid = $this->session->__ci_last_regenerate;
		if($cid == NULL || $sessionid == NULL || $action == NULL || $type == NULL || $text == NULL)
			return;

		$data = array(
			'CID' 				 => $cid,
			'CID_SESSION_ID' 	 => $sessionid,
			'ACTION'	=> $action,
			'TYPE'	=> $type,
			'TEXT'	=> $text['college']
			);
		$query = $this->db->insert(LOG_TABLE, $data);
	}

}