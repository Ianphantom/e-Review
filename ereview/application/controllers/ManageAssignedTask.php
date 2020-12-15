<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageAssignedTask extends CI_Controller {

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
        echo '<h1>hello </h1>';
		//$this->load->view('welcome_message');
	}
	public function rejectTask()
	{
        $this->load->model('Task');
        $this->load->view('reviewer/RejectTask');
	}
	public function acceptTask()
	{
		$this->load->model('Task');
        $this->load->view('reviewer/AcceptTask');
	
	}
	public function submitReview()
	{
		$this->load->model('Task');
        $this->load->view('reviewer/SubmitReview');
	}
	public function deductFunds()
	{
		$this->load->model('payment');
        $this->load->view('reviewer/DeductFunds');
	}
}
?>