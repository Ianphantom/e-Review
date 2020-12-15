<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicationctl extends CI_Controller {

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
	
	public function download($id_task=0)
	{
        if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/index");
        }
        $session_data=$this->session->userdata('logged_in');
        echo "$id_task";
        $this->load->model(array("task"));
        $this->load->helper('download');
        $task = $this->task->getTheTask($id_task);
        if(sizeof($task)<=0){
            echo "failed";
            return;
        }
        // ob_clean();
        force_download($task[0]["filelocation"], (base_url().'../../ereview/Berkas/' . $task[0]['filelocation']));
        echo "sukses";
        // $file_name = base_url().'../../ereview/Berkas/' . $task[0]['filelocation'];
        // $mime = 'application/force-download';
        // header('Pragma: public');    
        // header('Expires: 0');        
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // header('Cache-Control: private',false);
        // header('Content-Type: '.$mime);
        // header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
        // header('Content-Transfer-Encoding: binary');
        // header('Connection: close');
        // readfile($file_name);    
        // exit();
        return;
    }
    public function downloadReview($id_assignment=0)
	{
        if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/index");
        }
        $session_data=$this->session->userdata('logged_in');
        echo "$id_assignment";
        $this->load->model(array("task"));
        $this->load->helper('download');
        $task = $this->task->getTheReview($id_assignment);
        if(sizeof($task)<=0){
            echo "failed";
            return;
        }
        ob_clean();
        $content = file_get_contents(base_url().'../../ereview/Berkas/' . $task[0]['rfilelocation']);
        // force_download($task[0]["rfilelocation"], (base_url().'../../ereview/Berkas/' . $task[0]['rfilelocation']));
        // force_download((base_url().'../../ereview/Berkas/' . $task[0]['rfilelocation']), NULL);
        force_download($task[0]["rfilelocation"],$content );
        echo "sukses";
        return;
	}
	public function downloadBukti($id_task=0)
	{
        if(!$this->session->userdata('logged_in'))
		{
			redirect("welcome/index");
        }
        $session_data=$this->session->userdata('logged_in');
        echo "$id_task";
        $this->load->model(array("reviewer"));
        $this->load->helper('download');
        $bukti = $this->reviewer->getBalanceDownload($id_task);
        if(sizeof($bukti)<=0){
            echo "failed";
            return;
        }
        $content = file_get_contents((base_url().'../../ereview/Bukti/' . $bukti[0]['bukti_loc']));
        force_download($bukti[0]["bukti_loc"], $content );
        echo "sukses";
        return;
	}
}
?>