<?php
class task extends CI_Model
{
    function insertNewTask_2()
    {
        $thequery= "INSERT INTO task (judul,katakunci) VALUES ('".$this->input->post('judul')."','".$this->input->post('katakunci')."')";
        $this->db->query($thequery);
        return $this->db->insert_id();
    }
    function insertNewTask($id_editor=0,$filename = "")
    {
        $this->db->set("judul",$this->input->post('judul'));
        $this->db->set("katakunci",$this->input->post('katakunci'));
        $this->db->set("authors",$this->input->post('authors'));
        $this->db->set("halaman",$this->input->post('halaman'));
        $this->db->set("filelocation",$filename);
        $this->db->set("id_user",$id_editor);
        $this->db->insert('task');
        return $this->db->insert_id();
    }

    function getTheTask($id_task=-1)
    {
        $thequery= "SELECT * FROM task WHERE id_task=". $id_task; 
        $res = $this->db->query($thequery);
        return $res->result_array();
    }
    function getTheReview($id_assignment=-1)
    {
        $thequery= "SELECT * FROM review WHERE id_assignment=". $id_assignment; 
        $res = $this->db->query($thequery);
        return $res->result_array();
    }
    function getMyTask($id_editor=-1)
    {
        $this->db->where("id_user",$id_editor);
        $this->db->where("sts_task",1);
        $res= $this->db->get("task");
        return $res->result_array();
    }
    function assigning()
    {
        $thequery= "INSERT INTO assignment (id_task,id_reviewer,tgl_deadline,halaman) VALUES ('".$this->input->post('kode')."','".$this->input->post('pilih')."'
                                                                        ,'".$this->input->post('deadline')."','".$this->input->post('halaman')."')";
        $this->db->query($thequery);
    }
    function getStatus($id_user=-1)
    {
        $thequery="SELECT * FROM task INNER JOIN assignment ON task.id_user=$id_user AND assignment.id_task=task.id_task 
        INNER JOIN reviewer ON assignment.id_reviewer=reviewer.id_reviewer 
        INNER JOIN users ON reviewer.id_user=users.id_user WHERE status!=7";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getReviewTask($id_user=-1)
    {
        $thequery="SELECT * FROM reviewer 
        INNER JOIN users ON users.id_user=$id_user AND reviewer.id_user=$id_user
        INNER JOIN assignment ON assignment.id_reviewer=reviewer.id_reviewer AND assignment.sts_assignment=1 
        INNER JOIN task ON assignment.id_task=task.id_task WHERE assignment.status!=7";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getAllTask($id_user=-1)
    {
        $thequery="SELECT * FROM task INNER JOIN assignment ON assignment.id_task=task.id_task 
        INNER JOIN reviewer ON assignment.id_reviewer=reviewer.id_reviewer 
        INNER JOIN users ON users.id_user=reviewer.id_user";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getReview($id_user=-1)
    {
        $thequery="SELECT review.judul,users.nama,review.katakunci,review.authors,review.rfilelocation,review.id_assignment,review.rfilelocation,assignment.status FROM review 
        INNER JOIN users ON review.id_user=users.id_user INNER JOIN assignment ON review.id_assignment=assignment.id_assignment WHERE status=4";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getFinishedTask($id_user=-1)
    {
        $thequery="SELECT * FROM task INNER JOIN assignment ON assignment.id_task=task.id_task
        INNER JOIN reviewer ON assignment.id_reviewer=reviewer.id_reviewer 
        INNER JOIN users ON users.id_user=reviewer.id_user where status=5";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getMyReview($id_user=-1)
    {
        $thequery="SELECT * FROM task INNER JOIN assignment ON task.id_user=$id_user AND task.id_task=assignment.id_task 
        INNER JOIN review ON review.id_assignment=assignment.id_assignment WHERE status=6 OR status=7";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getMyReview1($id_user=-1)
    {
        // $thequery="SELECT * FROM pembayaran INNER JOIN review ON pembayaran.id_assignment=review.id_assignment 
        // INNER JOIN task ON task.id_user=$id_user AND task.id_task=pembayaran.id_task 
        // INNER JOIN assignment ON pembayaran.id_task=assignment.id_task WHERE pembayaran.statusPembayaran=1 AND status!=7";
        $thequery="SELECT * FROM task INNER JOIN assignment ON task.id_user=$id_user AND task.id_task=assignment.id_task 
        INNER JOIN review ON review.id_assignment=assignment.id_assignment WHERE status=6";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function complete($id_user=-1)
    {
        $thequery="UPDATE assignment SET status ='".$this->input->post('tindakan')."' WHERE
        id_assignment='".$this->input->post('pilih')."'";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
    }
    function insertNewUser($filename="",$id_user=-1)
    {
        $thequery= "UPDATE users SET nama='".$this->input->post('nama')."', username='".$this->input->post('username')."',
                                    pwd='".$this->input->post('katasandi')."', email='".$this->input->post('email')."',
                                    photo='".$filename."'";
        $this->db->query($thequery);
        // $this->db->set("photo",$filename);
        $id_user=$this->db->insert_id();
    }
}
?>