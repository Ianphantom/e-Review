<?php
class payment extends CI_Model
{

    function getStatusPayment($id_user=-1)
    {
        $thequery="SELECT * FROM task INNER JOIN assignment ON task.id_user=$id_user AND assignment.id_task=task.id_task 
        INNER JOIN reviewer ON assignment.id_reviewer=reviewer.id_reviewer 
        INNER JOIN users ON reviewer.id_user=users.id_user WHERE status=1";
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function insertNewPayment($id_user=-1,$filename = "")
    {
        $this->db->set("kurs",$this->input->post('kurs'));
        $this->db->set("id_user",$id_user);
        $this->db->set("amount",$this->input->post('jumlah'));
        $this->db->set("id_assignment",$this->input->post('pilih'));
        $this->db->set("bukti_loc",$filename);
        $this->db->insert('pembayaran');
        return $this->db->insert_id();
    }
    function getBalance($id_user=-1)
    {
        $thequery="SELECT * FROM pembayaran INNER JOIN assignment ON pembayaran.id_assignment=assignment.id_assignment
        INNER JOIN reviewer ON assignment.id_reviewer=reviewer.id_reviewer 
        INNER JOIN users ON users.id_user=$id_user 
        INNER JOIN task ON task.id_task=assignment.id_task AND assignment.id_assignment=pembayaran.id_assignment  WHERE statuspembayaran=0";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
    function confirmpayment()
    {
        $thequery="UPDATE pembayaran SET statusPembayaran ='".$this->input->post('tindakan')."' WHERE
        id_assignment='".$this->input->post('pilih')."'";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
    }
    function getKonfirmasiPembayaran($id_user=-1)
    {
        $thequery="SELECT * FROM pembayaran INNER JOIN task ON task.id_user=$id_user 
        INNER JOIN assignment  ON assignment.id_assignment=pembayaran.id_assignment AND assignment.id_task=task.id_task where pembayaran.id_user=$id_user ";
        //$this->db->where("id_editor",$id_editor);
        //$this->db->where("sts_reviewer",0);
        $res= $this->db->query($thequery);
        return $res->result_array();
    }
}
?>