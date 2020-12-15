<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MakelarCtl extends CI_Controller {

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
	{if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'makelar')
		{
			redirecting("welcome/redirecting");
		}
		$this->load->view('common/header_makelar', array("nama_user" => $session_data['namalengkap']));
		$this->load->view('common/topmenu');
		$this->load->view('common/content');
		$this->load->view('common/footer');
	}

	public function viewtask()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'makelar')
		{
			redirecting("welcome/redirecting");
		}
		$this->load->model(array("task"));
		$tasks = $this->task->getAllTask($session_data['id_user']);
		$review = $this->task->getReview($session_data['id_user']);
		//$status = $this->task->getStatus($session_data['id_user']);
		
		$this->load->view('common/header_makelar', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('makelar/viewtask',array("tasks"=>$tasks,"review"=>$review));
		$this->load->view('common/content');
		$this->load->view('common/footer');
	}
	public function confirmAction()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'makelar')
		{
			redirect("welcome/redirecting");
		}
		$this->load->helper(array('url','security','form'));
		$this->load->model(array('reviewer'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('pilih','pilih','trim|min_length[1]|max_length[128]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('editor/SessionFalse',array('msg' => $msg));
			$this->load->view('common/footer');
			return FALSE;
		}
		$tindakan= $this->reviewer->accept();
		redirect(base_url().'index.php/makelarctl/viewtask');
	}

	public function viewpembayaran()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'makelar')
		{
			redirect("welcome/redirecting");
		}
		$this->load->model(array("payment"));
		$balance = $this->payment->getBalance($session_data['id_user']);
		$this->load->view('common/header_makelar', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('makelar/viewpembayaran',array("balance"=>$balance));
		$this->load->view('common/content');
		$this->load->view('common/footer');
	}
	public function confirmPayment()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'makelar')
		{
			redirect("welcome/redirecting");
		}
		$this->load->helper(array('url','security','form'));
		$this->load->model(array('payment'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('pilih','pilih','trim|min_length[1]|max_length[128]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('editor/SessionFalse',array('msg' => $msg));
			$this->load->view('common/footer');
			return FALSE;
		}
		$tindakan= $this->payment->confirmpayment();
		redirect(base_url().'index.php/makelarctl/');
	}
	
	public function finishTask()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'makelar')
		{
			redirecting("welcome/redirecting");
		}
		$this->load->model(array("task"));
		$tasks = $this->task->getFinishedTask($session_data['id_user']);
		//$review = $this->task->getReview($session_data['id_user']);
		//$status = $this->task->getStatus($session_data['id_user']);
		
		$this->load->view('common/header_makelar', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('makelar/confirmtask',array("tasks"=>$tasks));
		$this->load->view('common/content');
		$this->load->view('common/footer');
	}
}
?>
