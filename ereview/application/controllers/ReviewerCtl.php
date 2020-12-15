<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReviewerCtl extends CI_Controller {

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
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup'] != 'reviewer')
		{
			redirect("welcome/redirecting");
		}
		$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap']));
		$this->load->view('common/topmenu_reviewer');
		$this->load->view('common/content_reviewer');
		$this->load->view('common/footer');
	}
	public function viewtask()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'reviewer')
		{
			redirect("welcome/redirecting");
		}
		$this->load->model(array("task"));
		$this->load->helper(array('url','form'));
		$tasks = $this->task->getReviewTask($session_data['id_user']);
		//$taskStatus = $this->task->getStatus($session_data['id_user']);
		//$status = $this->task->getStatus($session_data['id_user']);
		
		$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('reviewer/accepttask',array("tasks"=>$tasks));
		$this->load->view('reviewer/submitreview', array('error'=> ""));
		$this->load->view('common/footer');
	}
	public function taskAction()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'reviewer')
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
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect(base_url().'index.php/welcome/createAccount', array('pesan' => $msg ));
			return FALSE;
		}
		$tindakan= $this->reviewer->accept();
		redirect(base_url().'index.php/reviewerctl/viewtask');
	}
	public function profile()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->load->helper(array('url','form'));
		$this->load->model('account');
		$user = $this->account->getUser($session_data['id_user']);
		$roles = $this->account->getRoles($session_data['id_user']);
		$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		//$this->load->view('common/header_editor');
		$this->load->view('common/topmenu_reviewer');
		$this->load->view('profile',array("error"=>"","user" =>$user[0],
														"roles"=>$roles));
		$this->load->view('common/footer');
	}
	public function account()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->load->helper(array('url','form'));
		$this->load->model(array('account','reviewer'));
		$user = $this->account->getUser($session_data['id_user']);
		$roles = $this->account->getRoles($session_data['id_user']);
		$information = $this->reviewer->getInformation($session_data['id_user']);
		$balance = $this->reviewer->getBalance($session_data['id_user']);
		$balance1 = $this->reviewer->getBalance1($session_data['id_user']);
		$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		//$this->load->view('common/header_editor');
		//$this->load->view('common/topmenu');
		$this->load->view('reviewer/akunreviewer',array('info'=>$information[0],"balance"=>$balance,"balance1"=>$balance1));
		$this->load->view('common/content_reviewer');
		$this->load->view('common/footer');
	}
	public function dataUpdate()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'reviewer')
		{
			redirect("welcome/redirecting");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->load->helper(array('url','security','form'));
		$this->load->model(array('reviewer'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('rek','rek','trim|min_length[1]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('kompetensi','kompetensi','trim|min_length[1]|max_length[1128]|xss_clean');
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
		$tindakan= $this->reviewer->update($session_data['id_user']);
		redirect(base_url().'index.php/reviewerctl/account');
	}
	public function submitReview()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'reviewer')
		{
			redirecting("welcome/redirecting");
		}
		$this->load->helper(array('url','form'));
		$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('common/topmenu');
		$this->load->view('reviewer/submitreview', array('error'=> ""));
		$this->load->view('common/footer');
	}




	public function submittingReview()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'reviewer')
		{
			redirecting("welcome/redirecting");
		}
		$this->load->helper(array('url','security','form'));
		$this->load->model('reviewer');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('judul','Judul','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('katakunci','Kata kunci','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('authors','Authors','trim|min_length[2]|max_length[256]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
			$this->load->view('common/topmenu');
			$this->load->view('reviewer/submitreview', array('error'=> $msg));
			$this->load->view('common/footer');
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect(base_url().'index.php/welcome/createAccount', array('pesan' => $msg ));
			return FALSE;
		}

		$config['upload_path']          = '../../ereview/Berkas';
        $config['allowed_types']        = 'doc|docx|pdf';
        $config['max_size']             = 10000;
    	// $config['max_width']            = 150;
        // $config['max_height']           = 200;
		$new_name = time() . '_' . $_FILES["userfile"]['name'];
		$config['file_name'] = $new_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
			$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
			$this->load->view('common/topmenu');
			$this->load->view('reviewer/submitreview', array('error'=> ""));
			$this->load->view('common/footer');
			return;
		}
	    else
       {
			$id_task= $this->reviewer->insertNewReview($session_data['id_user'],$new_name);
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
			$this->load->view('common/topmenu');
			$this->load->view('reviewer/add_success', array('error'=> ""));
			$this->load->view('common/footer'); 
			return;
        }
		
	}

	public function deductfund()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		if($session_data['nama_grup']!= 'reviewer')
		{
			redirect("welcome/redirecting");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->load->helper(array('url','security','form'));
		$this->load->model(array('reviewer'));
		$tindakan= $this->reviewer->penarikan($session_data['id_user']);
		redirect(base_url().'index.php/reviewerctl/');
	}
	public function Updateprofile()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->load->helper(array('url','form'));
		$this->load->model('account');
		$user = $this->account->getUser($session_data['id_user']);
		$roles = $this->account->getRoles($session_data['id_user']);
		$this->load->view('common/header_reviewer', array("nama_user" => $session_data['namalengkap'],"current_role"=> $session_data['nama_grup']));
		$this->load->view('update',array("error"=>"","user" =>$user[0],
														"roles"=>$roles));
		$this->load->view('common/footer');
	}

}
?>
