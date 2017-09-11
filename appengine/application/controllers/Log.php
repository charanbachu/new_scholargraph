<?php

/*
Controller for Log part
FUNCTIONS
1. home() - The page for processing the logs
2. query() - To delete the logs already processed (called from Home of Processing part)
3. process_user_logs() - Processes the logs for Users
4. process_weekly_logs() - Processes the weekly logs
5. addToLog() - Adds to the log table
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {

	/*
	Test function to test log
	*/
	public function test()
	{
		$this->load->model('log_model');
		$start = 0;
		$end = 118340;
		$this->log_model->process_batch(0,118340,0);
	}

	/*
		Log processing Home Page - Gives option to process user logs and process college logs
	*/
	public function home()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))	//If logged in or not
		{
			$loggedInUser = $this->session->userdata["cid"];
			if($loggedInUser == 1)
			{
				$this->load->view('log/process');
			}
			else
			{
				echo "STRANGERS NOT ALLOWED HERE. GO AWAY OR ELSE YOUR ACCOUNT WOULD BE BLOCKED";
				//need to log?
			}
		}
		else
		{
			redirect('/main/login');
		}
	}


	/*
	Function to execute sql queries
	*/
	public function query()
	{
		$this->load->library('session');
		$mail = $this->session->email;
		if(!empty($mail))
		{
			$loggedInUser = $this->session->userdata["cid"];
			if($loggedInUser == 1)
			{
				$id = $this->input->post('id');
				$this->db->where('ID < ', $id);
				$this->db->delete(LOG_TABLE);
				if($this->db->affected_rows() > 0)
				{
					echo "Successfully Deleted ".$this->db->affected_rows()." rows";
				}
				else
				{
					echo "Error Deleting Rows - Maybe no Such rows or Error in statement";
				}
			}
		}
	}

	/*
	Input : NONE
	Output : Percentage of processing completed
	Logic : It checks the LOG_POSITION_TABLE to see the Start point, End Point and Current Index. It then calls process_user() function with these values. In case, end is not set i.e. it is called first time, it gets maximum ID from Log table and sets end to this id.
	*/
	public function process_user_logs()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))	//If logged in or not
		{
			$loggedInUser = $this->session->userdata["cid"];
			if($loggedInUser == 1)
			{
				$this->load->model('log_model');

				$this->db->where('LABEL',"USER_S");
				$data = $this->db->get(LOG_POSITION_TABLE)->result();
				$start = $data[0]->NUM_DATA;

				$this->db->where('LABEL',"USER_C");
				$data = $this->db->get(LOG_POSITION_TABLE)->result();
				$current = $data[0]->NUM_DATA;

				$this->db->where('LABEL',"USER_E");
				$data = $this->db->get(LOG_POSITION_TABLE)->result();
				$end = $data[0]->NUM_DATA;

				if($end == -1)
				{
					$this->db->select('MAX(ID) AS END');
					$data = $this->db->get(LOG_TABLE)->result();
					$end = $data[0]->END;

					//set end to startUser -1
					$this->db->set('NUM_DATA',$end);
					$this->db->where('LABEL','USER_E');
					$this->db->update(LOG_POSITION_TABLE);
				}

				echo $this->log_model->process_user($start,$current,$end);
			}
			else
			{
				echo "Why u do this?";
			}
		}
		else
		{
			echo "Login Please";
		}
	}

	/*
	Input : NONE
	Output : Percentage of Logs Processed
	Logic : This function takes the Starting ID, Ending ID and Current Index from LOG_POSiTION_TABLE table and calls the function process_batch(start,end,current). If END is -1, then END is taken be (START OF USER LOG) - 1 i.e. it processes logs upto the moment where user logs have been processed.
	*/
	public function process_weekly_logs()
	{
		$this->load->library('session');
		$mail=$this->session->email;
		if(!empty($mail))	//If logged in or not
		{
			$loggedInUser = $this->session->userdata["cid"];
			if($loggedInUser == 1)
			{
				$this->load->model('log_model');
				$this->db->where('LABEL',"BATCH_S");
				$data = $this->db->get(LOG_POSITION_TABLE)->result();
				$start = $data[0]->NUM_DATA;

				$this->db->where('LABEL',"BATCH_C");
				$data = $this->db->get(LOG_POSITION_TABLE)->result();
				$current = $data[0]->NUM_DATA;

				$this->db->where('LABEL',"BATCH_E");
				$data = $this->db->get(LOG_POSITION_TABLE)->result();
				$end = $data[0]->NUM_DATA;

				if($end == -1)
				{
					$this->db->where('LABEL',"USER_S");
					$data = $this->db->get(LOG_POSITION_TABLE)->result();
					$startUser = $data[0]->NUM_DATA;

					//set end to startUser -1
					$end = $startUser - 1;
					$this->db->set('NUM_DATA',$end);
					$this->db->where('LABEL','BATCH_E');
					$this->db->update(LOG_POSITION_TABLE);
				}
				echo $this->log_model->process_batch($start,$end,$current);
			}
			else
			{
				echo "Why u do this?";
			}
		}
		else
		{
			echo "Login Please";
		}
	}

	/*
	Input : POST Variables : TEXT,ACTION,TYPE
	Output : None
	Logic :
	This function takes the TEXT,ACTION and TYPE and adds an entry to the log table using
	addToLogStatic() function
	*/
	public function addToLog()
	{
		$this->load->model('log_model');
		$text = htmlspecialchars($this->input->post('text'));
		$action = htmlspecialchars($this->input->post('action'));
		$type = htmlspecialchars($this->input->post('type'));

		switch($action)
		{
			case 'QUESTION_VIEWED':
				$actionId = QUESTION_VIEWED;
				break;
			case 'QUESTION_UPVOTED':
				$actionId = QUESTION_UPVOTED;
				break;
			case 'QUESTION_DOWNVOTED':
				$actionId = QUESTION_DOWNVOTED;
				break;
			case 'QUESTION_ASKED':
				$actionId = QUESTION_ASKED;
				break;
			case 'SEARCH_QUERY':
				$actionId = SEARCH_QUERY;
				break;
			case 'COLLEGE_NAME':
				$actionId = COLLEGE_NAME;
				break;
			case 'COLLEGE_NODE':
				$actionId = COLLEGE_NODE;
				break;
			case 'COLLEGE_COMPARE':
				$actionId = COLLEGE_COMPARE;
				break;
			default :
				$actionId = 0;
		}

		switch ($type)
		{
			case 'TYPE_QUESTION':
				$typeId = TYPE_QUESTION;
				break;
			case 'TYPE_COLLEGE':
				$typeId = TYPE_COLLEGE;
				break;
			case 'TYPE_STRUCTURE':
				$typeId = TYPE_STRUCTURE;
				break;
			case 'TYPE_ATTRIBUTE':
				$typeId = TYPE_ATTRIBUTE;
				break;
			default:
				$typeId = 0;
		}

		$this->log_model->addToLogStatic($text,$actionId,$typeId);
	}

}