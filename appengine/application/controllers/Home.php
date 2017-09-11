<?php
/*
Controller for HomePage of the Website
FUNCTIONS
1. index() -> Main Homepage
2. getTrendingQuestions() -> Trending Questions Ajax url for homepage
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/*
	It gets TopQuestions using Communication_model->getTopQuestions()
	It gets Trending Searches from table nikhil_trending_searches
	It gets Search feeds from table nikhil_search_feed
	*/
	public function index($profiler=-1)
	{
		$topContributor = array();	//To get from User Table
		$this->load->library('session');
		if($this->session->is_logged_in!=0)
		{
			$cid=$this->session->cid;
		}
		else
		{
			$cid=-1;
		}
	/*	$this->db->limit(5);	//Top 5 Contributors
		$data = $this->db->get('users')->result();
		$score = 5000;
		foreach($data as $row)
		{
			$result = array();
			$result['id'] = $row->id;
			$result['name'] = $row->Display_Name;
			$result['score'] = $score;
			$score -= 100;
			array_push($topContributor,$result);
		}

		$trendingSearches = array();	//From Table nikhil_trending_searches
		$this->db->limit(5);
		$this->db->order_by('Priority','DESC');
		$data = $this->db->get(TRENDING_SEARCHES_TABLE)->result();
		foreach($data as $row)
		{
			$sampleSearch['name'] = $row->Name;
			array_push($trendingSearches,$sampleSearch);
		}
*/
		$searchSuggestions = array();
		$this->db->limit(5);
		$this->db->order_by('Priority','DESC');
		$data = $this->db->get(SEARCH_BAR_FEED_TABLE)->result();
		foreach($data as $row)
		{
			array_push($searchSuggestions,$row->Name);
		}
		$searchSuggestions = json_encode($searchSuggestions);
		if($profiler==1)
		{
			$this->output->enable_profiler(TRUE);
			$sections = array(
			    'config'  => TRUE,
			    'queries' => TRUE
			    );

			$this->output->set_profiler_sections($sections);
		}

		$this->load->view('homepage',array('trendingSearches'=>$trendingSearches,'topContributor'=>$topContributor,'trendingQuestions'=>$trendingQuestions,'searchSuggestions'=>$searchSuggestions));
	}

	/*
	Input : None
	Output : Ajax Response Of Trending Questions
	It uses communication models' getTopQuestions() to get the top relevant questions and their answers.
	*/
	public function getTrendingQuestions()
	{
		$mail=$this->session->email;
		if(!empty($mail))	//If logged in or not
		{
			$loggedInUser = $this->session->userdata["cid"];
		}
		else
		{
			$loggedInUser = -1;
		}

		$this->load->model('Comms_model');
		$trendingQuestions=$this->Comms_model->getTopQuestions();
		foreach($trendingQuestions->result() as $row)
		{
			$tags=$this->Comms_model->getTagsQuestion($row->qid);
			$row->tags=$tags;
			$row->answer=$this->Comms_model->getTopRatedAnswer($row->qid,$loggedInUser);
			if(!empty($row->answer))
			{
				if($row->answer->comments==1)
				{
					$row->answer->comments=$this->Comms_model->getCommentsAnswer($row->answer->ansid);
				}
				$row->answer->images=$this->Comms_model->getImage(-1,$row->answer->ansid);
			}
		}
		$this->load->view('ajax/questions_with_upvotes',array('questions'=>$trendingQuestions));
	}

}