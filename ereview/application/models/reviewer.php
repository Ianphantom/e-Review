<?php
class reviewer extends CI_Model
{

    // function getAllreviewers()
    // {
    //     $thequery= "SELECT * FROM reviewer" ; 
    //     $res = $this->db->query($thequery);
    //     return $res->result_array();
    // }
    function getAllreviewers()
    {
        $thequery="SELECT reviewer.id_reviewer, users.nama, reviewer.kompetensi, reviewer.biaya  FROM users INNER JOIN reviewer ON users.id_user=reviewer.id_user";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function accept()
    {
        $thequery="UPDATE assignment SET status ='".$this->input->post('tindakan')."' WHERE
        id_assignment='".$this->input->post('pilih')."'";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
    }
    function getInformation($id_user=-1)
    {
        $thequery="SELECT * FROM reviewer WHERE id_user=$id_user";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function update($id_user=-1)
    {
        $thequery="UPDATE reviewer SET kompetensi = '".$this->input->post('kompetensi')."', no_rek = '".$this->input->post('rek')."', biaya = '".$this->input->post('biaya')."' WHERE
        id_user=$id_user";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
    }
    function insertNewReview($id_editor=0,$filename = "")
    {
        $this->db->set("judul",$this->input->post('judul'));
        $this->db->set("katakunci",$this->input->post('katakunci'));
        $this->db->set("authors",$this->input->post('authors'));
        $this->db->set("rfilelocation",$filename);
        $this->db->set("id_user",$id_editor);
        $this->db->set("id_assignment",$this->input->post('nomor'));
        $this->db->insert('review');
        return $this->db->insert_id();
    }
    function getBalance($id_user=-1)
    {
        $thequery="SELECT * FROM reviewer INNER JOIN assignment ON reviewer.id_user=$id_user and assignment.id_reviewer=reviewer.id_reviewer 
        INNER JOIN pembayaran ON assignment.id_assignment=pembayaran.id_assignment 
        INNER JOIN task ON assignment.id_task=task.id_task WHERE statusPembayaran=1";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function getBalanceDownload($id_task=-1)
    {
        $thequery="SELECT * FROM pembayaran WHERE id_assignment=$id_task";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function penarikan($id_user=-1)
    {
        $thequery= "INSERT INTO penarikan (id_user,jumlah,pno_rek) VALUES ($id_user,'".$this->input->post('jumlah')."'
        ,'".$this->input->post('rek')."')";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
    }
    function getBalance1($id_user=-1)
    {
        $thequery="SELECT * FROM penarikan where id_user=$id_user";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }

}

?>