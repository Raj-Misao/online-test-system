<?php

class Admin_menu_model extends CI_MODEL
{

    public function count_new()
    {
        $this->load->database();
        $user_data = $this->db->query("SELECT * FROM misao_user WHERE u_type = '';");
        return $user_data;
    }

}

?>
