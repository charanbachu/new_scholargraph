<?php
	/*	Author: Akhilesh Kumar
		Controller for Communication platform
	*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class test extends CI_Controller
{
	public function insertusers()
	{
		$firstRow = true;
		if (($handle = fopen(asset_url()."testdata/users.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
	        	$num = count($data);
	        	if($firstRow)
	        	{
	        		$firstRow=false;
	        	}
	        	else
	        	{
	        		$row++;
	        		$password=md5($data[1]);
	        		$query="INSERT INTO users (email,password,phone,ref_email) VALUES ('$data[0]','$password','$data[2]','$data[3]')";
	        		$this->db->query($query);	
	    		}
    		}
    		fclose($handle);
    		echo "all done!";
		}
		else
		{
			echo "File error";
		}
	}
	public function saveNotification($cid,$notification,$qid,$aid,$doer,$activty)
	{
		$this->load->model('Comms_model');
		$query=$this->Comms_model->saveNotification($cid,$notification,$qid,$aid,$doer,$activty);
	}
	public function saveQuestion($cid=-1,$question="",$tags="",$imagename="")
	{
		$this->load->model('Comms_model');
		$this->load->model('Log_model');
		$this->load->helper('url');
		$question=mysql_real_escape_string($question);
		$data['query']=$this->Comms_model->saveQuestion($question);
		$qid=mysql_insert_id();
		$this->load->library('session');
		$data['userQuery']=$this->Comms_model->saveUserQuestions($cid,$qid);
		//$this->Log_model->addToLogStatic($qid,QUESTION_ASKED,TYPE_QUESTION);
		$pieces = explode(",", $tags);
		foreach($pieces as $tag)
		{
			if($tag!="")
			{
				$data['tagQuery']=$this->Comms_model->saveTags($qid,$tag);
				$users=$this->Comms_model->getUserCollege($tag);
				$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>A new Question has been posted regarding your college.</h5></a>";
				if(!empty($users->result()))
				{
					foreach ($users->result() as $row ) {
						if($cid!=$row->cid)
						{
							$this->saveNotification($row->cid,$notification,$qid,-1,$cid,'ASKED');
						}
					}
				}
			}
		}
		$this->Comms_model->saveImage($qid,-1,$imagename);
	}

	public function insertquestions()
	{
		$firstRow = true;
		if (($handle = fopen(asset_url()."testdata/questions.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
	        	$num = count($data);
	        	if($firstRow)
	        	{
	        		$firstRow=false;
	        	}
	        	else
	        	{
	        		$cid=rand(7,57);
	        		$row++;
	        		$this->saveQuestion($cid,$data[1],$data[2],$data[3]);	
	    		}
    		}
    		fclose($handle);
    		echo "all done!";
		}
		else
		{
			echo "File error";
		}
	}


	public function saveAnswer($cid=-1,$qid,$answer="",$imagename="")
	{
		$this->load->model('Comms_model');
		$this->load->model('Log_model');
		$answer=mysql_real_escape_string($answer);
		$data['userQuery']=$this->Comms_model->saveUserAnswer($cid,$qid);
		$aid=mysql_insert_id();
		$data['query']=$this->Comms_model->saveAnswer($answer,$aid);
		//$this->Log_model->addToLogStatic($qid,QUESTION_ANSWERED,TYPE_QUESTION);
		$users=$this->Comms_model->getUsers($qid);
		$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>The question you are following has a new answer.</h5></a>";
		foreach ($users->result() as $row ) {
			if($cid!=$row->cid)
			{
				$this->saveNotification($row->cid,$notification,$qid,$aid,$cid,'ANSWERED');
			}
		}

		$user=$this->Comms_model->getUserByQuestion($qid);
		$notification="<a href='".site_url('Communication/showQuestion?qid='.$qid)."'><h5>The question you posted has a new answer.</h5></a>";
		foreach ($user->result() as $row ) {
			if($cid!=$row->cid)
			{
				$this->saveNotification($row->cid,$notification,$qid,$aid,$cid,'ANSWERED');
			}
		}
		$this->Comms_model->saveImage(-1,$aid,$imagename);
	}

	public function insertanswers()
	{
		$firstRow = true;
		if (($handle = fopen(asset_url()."testdata/answers.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
	        	$num = count($data);
	        	if($firstRow)
	        	{
	        		$firstRow=false;
	        	}
	        	else
	        	{
	        		$cid=rand(7,57);
	        		$row++;
	        		$this->saveAnswer($cid,$data[1],$data[2],$data[3]);	
	    		}
    		}
    		fclose($handle);
    		echo "all done!";
		}
		else
		{
			echo "File error";
		}
	}

	public function savequestionvotes()
	{
		$firstRow=true;
		if (($handle = fopen(asset_url()."testdata/questionvotes.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
				$this->load->model("Comms_model");
				$this->load->model("Log_model");
				if($firstRow)
	        	{
	        		$firstRow=false;
	        	}
	        	else
	        	{
	        		$cid=rand(7,57);
	        		$qid=rand(6,27);
					if($data[2]==1)
					{
						$query=$this->Comms_model->saveUpvotes($qid);
						$this->Comms_model->saveUserVoted($cid,$qid,1);
					}
					else
					{
						$query=$this->Comms_model->saveDownvotes($qid);
						$this->Comms_model->saveUserVoted($cid,$qid,0);
					}
				}
			}
			fclose($handle);
    		echo "all done!";
		}
		else
		{
			echo "File error";
		}
	}
	public function saveanswervotes()
	{
		$firstRow=true;
		if (($handle = fopen(asset_url()."testdata/answervotes.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
				$this->load->model("Comms_model");
				if($firstRow)
	        	{
	        		$firstRow=false;
	        	}
	        	else
	        	{
	        		$cid=rand(160,210);
	        		$aid=rand(1,15);
					if($data[2]==1)
					{
						$query=$this->Comms_model->saveUpvotesAnswer($aid);
						$this->Comms_model->saveUserVotedAnswer($cid,$aid,1);
					}
					else
					{
						$query=$this->Comms_model->saveDownvotesAnswer($aid);
						$this->Comms_model->saveUserVotedAnswer($cid,$aid,0);
					}
				}
			}
			fclose($handle);
    		echo "all done!";
		}
		else
		{
			echo "File error";
		}
	}



}