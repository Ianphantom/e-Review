<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('common/topmenu');
		//$this->load->view('common/content');
		$this->load->view('common/footer');
	}
	public function login($pesan='')
	{
		$this->load->view('common/header');
		$this->load->view('common/topmenu');
		$this->load->view('login',array('msg' => $pesan));
		$this->load->view('common/footer');
	}
	public function checkingLogin()
	{
		echo 'Username : '.$this->input->post('username');
		echo 'KataSandi : '.$this->input->post('password');
		echo 'welcome';
	}
	public function createAccount($pesan='')
	{
		$this->load->view('common/header');
		$this->load->view('common/topmenu');
		$this->load->view('create_account',array('msg' => $pesan));
		$this->load->view('common/footer');
	}
	
	public function redirecting()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
	
		if ($users[0]['id_grup']==1){
			redirect('editorctl');
		}else if($users[0]['id_grup']==2){
			redirect('reviewerctl');	
		}else if($users[0]['id_grup']==3){
			redirect('makelarctl');
		} else {
			redirect('welcome');
		}
	}

	public function signup()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->view('common/header');
		$this->load->view('common/topmenu');
		$this->load->view('signup',array("error"=>""));
		$this->load->view('common/footer');
	}

	public function signupSuccess($pesan='')
	{
		$this->load->view('common/header');
		$this->load->view('common/topmenu');
		$this->load->view('signup_success',array('msg' => $pesan));
		$this->load->view('common/footer');
	}


}
