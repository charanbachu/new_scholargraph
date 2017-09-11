<?php

/*
FUNCTIONS
1. getFlagResponses - take the mcq responses for flagging from the flag_response table
*/



class Flag_model extends CI_Model {

	/*
	Input : None
	Output : Array of mcq responses to be displayed for selection by user
	Table : flag_response
	*/
	public function getFlagResponses()
	{
		/*
			Owner: Saleel

		*/
			
		$this->db->select('*');
		$q1 = $this->db->get('flag_response');
		$data1 = $q1->result_array();
		// $data1 = json_encode($data1);
		// echo $data1;
		return $data1;

	}

}