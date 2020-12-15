<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountCtl extends CI_Controller {

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
	public function login($pesan='')
	{
		$this->load->helper('form');
		$this->load->view('login', array('msg' => $pesan));

	}
	public function createAccount($pesan='')
	{
 		$this->load->helper('form');
		$this->load->view('create_account',array('msg' => $pesan));
	}

	public function creatingAccount()
	{
		$this->load->helper(array('url','security'));
		$this->load->model('account');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('nama','nama','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('username','username','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('pwd','katasandi','trim|min_length[2]|max_length[256]|xss_clean');
		$this->form_validation->set_rules('email','surel','trim|min_length[2]|max_length[256]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('create_account',array('msg' => $msg));
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect(base_url().'index.php/welcome/createAccount', array('pesan' => $msg ));
			return FALSE;
		}
		$id_user= $this->account->insertNewUser();
		redirect(base_url().'index.php/welcome/login');///.$id_user); <- ini di komentar
	}

	public function checkingLogin()
	{
		$this->load->helper(array('url','security'));
		$this->load->model('account');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('username','username','required|xss_clean');
		$this->form_validation->set_rules('password','password','required|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('login',array('msg' => $pesan));
			$this->load->view('common/footer');
			return FALSE;
		}
		
		$users= $this->account->getIDUser();
		if(sizeof($users)<=0){
			$msg = "Username/Password is incorrect";
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('login', array('msg' => $msg));
			$this->load->view('common/footer');
		}else {
			$session_data = array(
				'id_user' => $users[0]['id_user'],
				'namalengkap' => $users[0]['nama'],
				'username' => $users[0]['username'],
				'id_grup' => $users[0]['id_grup'],
				'nama_grup' => $users[0]['nama_grup'],
				'currentgrup' => $users[0]['id_grup']
			);
			$this->session->set_userdata('logged_in',$session_data);
			//$peran=$this->account->getPeranUser($id_user);
			if ($users[0]['id_grup']==1){
				redirect('editorctl');
			}else if($users[0]['id_grup']==2){
				redirect('reviewerctl');	
			}else{
				redirect('makelarctl');
			}

		}
		//redirect('accountctl/login/'.$id_user);
	}
	public function logout()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect("welcome");
	}

	public function signingUp()
	{
		$this->load->helper(array('url','security','form'));
		$this->load->model('account');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('nama','nama','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('username','username','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('pwd','katasandi','trim|min_length[2]|max_length[256]|xss_clean');
		$this->form_validation->set_rules('email','surel','trim|min_length[2]|max_length[256]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$msg = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('signupvalidation',array('msg' => $msg));
			$this->load->view('common/footer');
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect(base_url().'index.php/welcome/createAccount', array('pesan' => $msg ));
			return FALSE;
		}

		$config['upload_path']          = './photos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50;
    	$config['max_width']            = 150;
        $config['max_height']           = 200;
		$new_name = time().$_FILES["userfile"]['name'];
		$config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
			$this->load->view('common/header');
			$this->load->view('signup',$error);
			$this->load->view('common/footer');
			return;
		}
	    else
       {
			$id_user= $this->account->insertNewUser($new_name);
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('common/header');
			$this->load->view('signup_success');
			$this->load->view('common/footer');
			return;
        }
		
	}
	public function changerole()
 	{
  		if (!$this->session->userdata('logged_in')) {
   			redirect('welcome/login');
 		}
  		$session_data = $this->session->userdata('logged_in');

  		$this->load->helper(array('form', 'url'));

  		$this->load->model("account");
  		$user = $this->account->getUser($session_data['id_user']);
  		$roles = $this->account->getRoles($session_data['id_user']);

  		if ($session_data['id_grup'] == 1) {
   			$this->session->set_userdata('logged_in', $session_data);
  			//  ke halaman welcome page yang bersesuaian
			$peran= $this->account->getPeranUserChange($session_data['id_user']);
			  
			if ($peran[1]['id_grup']==1){
				redirect('editorctl');
			}else if($peran[1]['id_grup']==2){
				$session_data['nama_grup']='reviewer';
				$id_user = $session_data['id_user'];
				$switchidgrup = 2;
				$this->account->role($session_data['id_user']);
				//echo "succes";
				redirect('reviewerctl');	
			}else{
				redirect('#');
				//echo $peran[1]['id_grup'];
			}
   		}else if ($session_data['id_grup'] == 2) {
			$this->session->set_userdata('logged_in', $session_data);
		   //  ke halaman welcome page yang bersesuaian
		 $peran= $this->account->getPeranUserChange($id_user);
		   
		 if ($peran[1]['id_grup']==1){
			 redirect('editorctl');
		 }else if($peran[1]['id_grup']==2){
			$session_data['nama_grup']='reviewer';
			$id_user = $session_data['id_user'];
			$switchidgrup = 1;
			
			 redirect('editorctl');	
		 }else{
			 redirect('#');
		 }
		}
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
		$this->load->view('common/header');
		$this->load->view('profile',array("error"=>"","user" =>$user[0],
														"roles"=>$roles));
		$this->load->view('common/footer');
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
		$this->load->view('common/header');
		$this->load->view('update',array("error"=>"","user" =>$user[0],
														"roles"=>$roles));
		$this->load->view('common/footer');
	}
	public function updating()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/login");
		}
		$session_data=$this->session->userdata('logged_in');
		$this->load->helper(array('url','security','form'));
		$this->load->model('account');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('nama','nama','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('username','username','trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('pwd','katasandi','trim|min_length[2]|max_length[256]|xss_clean');
		$this->form_validation->set_rules('email','surel','trim|min_length[2]|max_length[256]|xss_clean');
		$res = $this->form_validation->run();
		if ($res == FALSE){
			$error = validation_errors();
			//redirect(base_url().'index.php/welcome/createAccount');
			$this->load->view('common/header');
			$this->load->view('common/topmenu');
			$this->load->view('update',array('error'=> $error));
			$this->load->view('common/footer');
			//redirect('managemytask/addNewTask/'. $msg );
			//redirect(base_url().'index.php/welcome/createAccount', array('pesan' => $msg ));
			return FALSE;
		}

		$config['upload_path']          = './photos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50;
    	$config['max_width']            = 150;
        $config['max_height']           = 200;
		$new_name = time().$_FILES["userfile"]['name'];
		$config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
			$this->load->view('common/header');
			$this->load->view('update', $error);
			$this->load->view('common/footer');
			return;
		}
	    else
       {
			$id_user= $this->account->updateuser($new_name,$session_data['id_user']);
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('common/header');
			$this->load->view('login', array('msg'=>""));
			$this->load->view('common/footer');
			return;
        }
		
	}

}

?>