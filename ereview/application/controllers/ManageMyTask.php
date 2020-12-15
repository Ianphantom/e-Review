<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMyTask extends CI_Controller {

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
	public function addNewTask($pesan='')
	{
		$this->load->helper('form');
        $this->load->view('editor/AddNewTask', array('msg' => $pesan));
	}

	public function addingNewTask()
	{
		$this->load->helper(array('url','security'));
		$this->load->model('task');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('judul','Judul','trim|min_length[2]|max_length[250]|xss_clean');
		$this->form_validation->set_rules('katakunci','katakunci','trim|min_length[2]|max_length[50]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			$this->load->view('editor/addNewTask',array('msg' => $msg));
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect('addNewTask', array('pesan' ==> $msg ));
			return FALSE;
		}
		$id_task= $this->task->insertNewTask();
		redirect('managemytask/selectReviewer/'.$id_task);
	}
	public function selectReviewer($id_task=-1)
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'editor')
		{
			redirecting("welcome/redirecting");
		}
		$this->load->model(array('task','reviewer'));
		$thetask = $this->task->getTheTask($id_task);
		$reviewers = $this->reviewer->getAllReviewers();
		//$task = $this->task->getMyTask($session_data['id_user']);
		
		$this->load->view('common/header_editor', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('editor/SelectPotentialReviewer',array('reviewers'=>$reviewers,'task'=>$thetask[0]));
		$this->load->view('common/content_editor');
		$this->load->view('common/footer');
        //$this->load->view('editor/SelectPotentialReviewer', array('task' => $thetask[0], 'reviewers' => $reviewers));
	
	}
	public function assignment()
	{
		$this->load->helper(array('url','security','form'));
		$this->load->model(array('task','reviewer','account'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('pilih','pilih','trim|min_length[1]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('kode','kode','trim|min_length[1]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('deadline','deadline','trim|min_length[2]|max_length[256]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('editor/SessionFalse',array('msg' => $msg));
			$this->load->view('common/footer');
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect(base_url().'index.php/welcome/createAccount', array('pesan' => $msg ));
			return FALSE;
		}
		$task= $this->task->assigning();
		redirect(base_url().'index.php/editorctl/');
	
	}
	public function commitPayment()
	{
		$this->load->model('payment');
        $this->load->view('editor/CommitPayment');
	
	}
	public function confirmTask()
	{
		$this->load->model('Task');
        $this->load->view('editor/ConfirmTask');
	
	}
}
?>
