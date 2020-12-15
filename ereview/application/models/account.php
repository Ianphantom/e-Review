<?php
class account extends CI_Model
{
    function insertNewUser($filename="")
    {
        $thequery= "INSERT INTO users (nama,username,pwd,email,photo) VALUES ('".$this->input->post('nama')."','".$this->input->post('username')."'
                                                                ,'".$this->input->post('katasandi')."'
                                                                ,'".$this->input->post('email')."'
                                                                ,'".$filename."')";
        $this->db->query($thequery);
        // $this->db->set("photo",$filename);
        $id_user=$this->db->insert_id();
        //return $this->db->insert_id();
    
        $roles = $this->input->post('roles');
        foreach ($roles as $item){
            $peran = $item;
            if ($peran=="2"){
                $thequery2= "INSERT INTO reviewer (id_user,data_updated) VALUES (".$id_user.",now())";
                $this->db->query($thequery2);

                $thequery3= "INSERT INTO member (id_user,id_grup,data_updated) VALUES ('".$id_user."','".$peran."',now())";
                $this->db->query($thequery3);

            }   
            else if($peran=="1") {
            $thequery2= "INSERT INTO editor (id_user,data_updated) VALUES (".$id_user.",now())";
            $this->db->query($thequery2);

            $thequery3= "INSERT INTO member (id_user,id_grup,data_updated) VALUES ('".$id_user."','".$peran."',now())";
            $this->db->query($thequery3);
            }
            else {
                $thequery2= "INSERT INTO makelar (id_user,data_updated) VALUES (".$id_user.",now())";
                $this->db->query($thequery2);
    
                $thequery3= "INSERT INTO member (id_user,id_grup,data_updated) VALUES ('".$id_user."','".$peran."',now())";
                $this->db->query($thequery3);
                }
        }
        
        return $id_user;
    }

    function getIDUser()
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$q = "SELECT t1.*, t3.id_grup, t3.nama_grup FROM ( SELECT * FROM users t0 WHERE 
       t0.username='$username' AND t0.pwd='$password'
       AND t0.sts_user=1) t1
        INNER JOIN member t2 ON t1.id_user=t2.id_user AND t2.sts_member=1
        INNER JOIN grup t3 ON t2.id_grup=t3.id_grup AND t3.sts_grup=1";
        // $thequery= "SELECT * FROM users WHERE username='". $this->input->post('username') . "', "
        // . "pwd='" . $this->input->post('katasandi'). "'"; 
        $res = $this->db->query($q);
        $users=$res->result_array();
        if(count($users)>0 ) {
            return $users;
        }
        return [];
    }

    function getPeranUser($id_users=-1)
    {
        $thequery= "SELECT * FROM member WHERE id_user='$id_users'";
        // $thequery= "SELECT * FROM member WHERE id_user='". $this->input->post('username') . "', "
        // . "pwd='" . $this->post('katasandi'). "'"; 
        $res = $this->db->query($thequery);
    
        $peran=$res->result_array();
        return $peran[0]['id_grup'];
    }
    function getPeranUserChange($id_users=-1)
    {
        $thequery= "SELECT * FROM member WHERE id_user='$id_users'";
        // $thequery= "SELECT * FROM member WHERE id_user='". $this->input->post('username') . "', "
        // . "pwd='" . $this->post('katasandi'). "'"; 
        $res = $this->db->query($thequery);
    
        return $res->result_array();
        // return $peran['id_grup'];
    }
    function getUser($id_user=-1)
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$q = "SELECT t1.*, t3.id_grup, t3.nama_grup FROM ( SELECT * FROM users t0 WHERE 
        t0.id_user=".$id_user." 
        AND t0.sts_user=1) t1
        INNER JOIN member t2 ON t1.id_user=t2.id_user AND t2.sts_member=1
        INNER JOIN grup t3 ON t2.id_grup=t3.id_grup AND t3.sts_grup=1";
        // $thequery= "SELECT * FROM users WHERE username='". $this->input->post('username') . "', "
        // . "pwd='" . $this->input->post('katasandi'). "'"; 
        $res = $this->db->query($q);
        return $res->result_array();
    }

    function getRoles($id_user=-1)
    {
        $thequery= "SELECT t1.*, t2.nama_grup FROM ( SELECT t0.* FROM member t0
        WHERE t0.sts_member=1 AND id_user=".$id_user.")t1
        INNER JOIN GRUP t2 ON t1.id_grup=t2.id_grup AND t2.sts_grup=1";
        // $thequery= "SELECT * FROM member WHERE id_user='". $this->input->post('username') . "', "
        // . "pwd='" . $this->post('katasandi'). "'"; 
        $res = $this->db->query($thequery);
        return $res->result_array();
    } 
    function Role($id_user=-1)
    {
        $thequery="UPDATE member SET id_grup = 2 WHERE
        id_grup= 1 AND id_user='$id_user'";
        $res=$this->db->query($thequery);
    }   
    function updateuser($filename="",$id_user=-1)
    {
        // $this->db->set("nama",$this->input->post('nama'));
        // $this->db->set("username",$this->input->post('username'));
        // $this->db->set("pwd",$this->input->post('katasandi'));
        // $this->db->set("email",$this->input->post('email'));
        // $this->db->set("photo",$filename);
        // $this->db->where("id_user",$id_user);
        // $this->db->update('users');
        // return $this->db->insert_id();
        $thequery= "UPDATE users SET nama='".$this->input->post('nama')."', username='".$this->input->post('username')."',
                                    pwd='".$this->input->post('katasandi')."', email='".$this->input->post('email')."',
                                    photo='".$filename."' WHERE id_user=$id_user";
        $this->db->query($thequery);
        $id_user=$this->db->insert_id();
    }
  
}

?>