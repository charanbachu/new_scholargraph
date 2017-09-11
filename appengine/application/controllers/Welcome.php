<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		$this->load->library('facebook');
		$this->load->helper('url');
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index()
	{
		$this->load->view('examples/start');
	}

	// ------------------------------------------------------------------------

	/*
		Function for Facebook login
	 */
	public function web_login()
	{
		$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{

			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email,education');
			$url = $user["education"][1]["school"]["id"]."?fields=name,location,best_page";
			$data = $this->facebook->request('get',$url);
			if (!isset($user['error']))
			{
				$data['user'] = $user;
				$this->load->model('user_model');
				//Add fb user to database
				$this->user_model->add_fbuser($user);
				if(!isset($data['error']))
				{
					$suggest_id = $this->user_model->check_fb_college($data);
				}
				$this->load->library('session');
				$login = $this->session->is_logged_in;
				$this->load->helper('url');
				if($login == 2)
				{
					//suggest college for user based on facebook college
					$_SESSION['college_suggest'] = $user["education"][1]["school"]["name"];
					$_SESSION['suggest_id'] = $suggest_id;
					redirect('user/complete');
				}
				else
				{
					redirect('home');
				}

				print_r($data);
			}
		}
		else
		{
			echo "Not Authenticated Correctly";
		}

		// display view
		$data['login_emailerror'] = "";
        $data['login_password'] =  "";
		$data['email_error'] ="";
		$data['name_error'] = "";
		$this->load->view('new_login',$data);
	}

	// ------------------------------------------------------------------------

	/**
	 * JS SDK login example
	 */
	public function js_login()
	{
		// Load view
		$this->load->view('examples/js');
	}

	// ------------------------------------------------------------------------

	/**
	 * AJAX request method for positing to facebook feed
	 */
	public function post()
	{
		header('Content-Type: application/json');

		$result = $this->facebook->request(
			'post',
			'/me/feed',
			['message' => $this->input->post('message')]
		);

		echo json_encode($result);
	}

	// ------------------------------------------------------------------------

	/**
	 * Logout for web redirect example
	 *
	 * @return  [type]  [description]
	 */
	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('welcome/web_login', redirect);
	}
}