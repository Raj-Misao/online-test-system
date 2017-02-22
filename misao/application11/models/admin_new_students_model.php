<?php

class Admin_new_students_model extends CI_MODEL
{
    public function new_students_load()
    {
        $this->load->database();
        $user_data = $this->db->query("SELECT * FROM misao_user WHERE u_type = '';");
        return $user_data;
    }

    public function delete_new_student($delete_user_id)
    {
        $this->load->database();
        $delete = $this->db->query("DELETE FROM misao_user WHERE u_id = '$delete_user_id'");
    }

    public function take_regi_info($regi_user_id)
    {
        $this->load->database();
        $regi_info = $this->db->query("SELECT * FROM misao_user WHERE u_id = '$regi_user_id'");
        return $regi_info;
    }

}

?>
