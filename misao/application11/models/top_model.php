<?php

class Top_model extends CI_MODEL
{

// Sign up form -> Database
    public function insert_user_info($fname,$lname,$gender,$email,$phone,$pass)
    {
        $this->load->database();
        $insert_user_info = array(
            'u_id' => '',
            'u_fname' => $fname,
            'u_lname' => $lname,
            'u_gender' => $gender,
            'u_email' => $email,
            'u_phone' => $phone,
            'u_pass' => $pass,
            'u_type' => ''
        );
        $result = $this->db->insert('misao_user',$insert_user_info);
        return $result;
    }

// Log in form -> take info from database
    public function check_user_login($email,$pass)
    {
        $this->load->database();
		$where = "u_email='".$email."'OR u_phone='".$email."'";
        $this->db->where($where);
        $this->db->where('u_pass',$pass);
        $query = $this->db->get('misao_user');
        $user_info = $query->row();
        if($user_info){ return $user_info; } else { return '0'; }
    }
	public function change_pass($user_id,$new_pass)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE misao_user SET u_pass = '".$new_pass."' WHERE u_id = '".$user_id."'");
		if($query){return true;}else{return false;}
    }
	public function update_change_personal_info($user_id,$c_uf_name,$c_ul_name,$c_u_email,$c_u_phone)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE misao_user SET u_fname = '".$c_uf_name."', u_lname = '".$c_ul_name."', u_email = '".$c_u_email."', u_phone = '".$c_u_phone."' WHERE u_id = '".$user_id."'");
		//$results = $query->num_rows();
		if($query){return true;}else{return false;}
    }
    public function insert_profile_image($u_id,$image_name)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE misao_user SET u_image = '".$image_name."' WHERE u_id = '".$u_id."'");
		//$results = $query->num_rows();
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
    }

}

?>
