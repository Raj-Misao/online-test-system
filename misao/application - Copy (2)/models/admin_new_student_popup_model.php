<?php

class Admin_new_student_popup_model extends CI_MODEL
{
    // English student registration
    public function en_student_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type,$u_course,$u_level)
    {
        $this->load->database();
        $this->db->query("UPDATE misao_user SET u_type='$u_type' WHERE u_id='$u_id'");
        $this->db->query("INSERT INTO misao_user_add VALUES ('$u_id','$u_sdate','$u_edate','$u_auth')");
        $this->db->query("INSERT INTO misao_student VALUES ('','$u_id','$u_course','$u_level','')");
    }

    public function it_student_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type,$u_course)
    {
        $this->load->database();
        $this->db->query("UPDATE misao_user SET u_type='$u_type' WHERE u_id='$u_id'");
        $this->db->query("INSERT INTO misao_user_add VALUES ('$u_id','$u_sdate','$u_edate','$u_auth')");
        $this->db->query("INSERT INTO misao_student VALUES ('$u_id','$u_course','')");
    }

    public function teacher_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type,$u_course)
    {
        $this->load->database();
        $this->db->query("UPDATE misao_user SET u_type='$u_type' WHERE u_id='$u_id'");
        $this->db->query("INSERT INTO misao_user_add VALUES ('$u_id','$u_sdate','$u_edate','$u_auth')");
        $this->db->query("INSERT INTO misao_teacher VALUES ('$u_id','$u_course')");
    }

    public function staff_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type)
    {
        $this->load->database();
        $this->db->query("UPDATE misao_user SET u_type='$u_type' WHERE u_id='$u_id'");
        $this->db->query("INSERT INTO misao_user_add VALUES ('$u_id','$u_sdate','$u_edate','$u_auth')");
    }
}
?>