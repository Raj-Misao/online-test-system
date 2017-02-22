<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Top_con extends CI_Controller 
{
	public function index()
	{
		$this->load->view('head');
		$this->load->view('top');
	}

	public function user_signup()
	{
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$gender = $this->input->post('gender');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$pass = $this->input->post('pass');
		$this->load->model('top_model');
		$check = $this->top_model->insert_user_info($fname,$lname,$gender,$email,$phone,$pass);
		if($check){ echo '1'; } else { echo '0'; }
	}

	public function user_login()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		$this->load->model('top_model');
		$user_info = $this->top_model->check_user_login($email,$pass);
		if($user_info == '0'){ echo '0'; exit; } // e-mail or pass is wrong
		$u_id = $user_info->u_id;
		$this->db->where('u_id',$u_id);
		$check_app = $this->db->get('misao_user_add');
		if($check_app->num_rows() == 0){ echo '1'; exit; } // nothing on "misao_user_add" table
		$u_type = $check_app->row()->u_authority;
		if($u_type == 'normal')
		{
			$this->session->set_userdata('u_id',$user_info->u_id);
			$this->session->set_userdata('u_fname',$user_info->u_fname);
			$this->session->set_userdata('u_lname',$user_info->u_lname);
			$this->session->set_userdata('u_type',$u_type);
			echo '2'; exit; // student
		}
		if($u_type == 'admin')
		{
			$this->session->set_userdata('u_id',$user_info->u_id);
			$this->session->set_userdata('u_fname',$user_info->u_fname);
			$this->session->set_userdata('u_lname',$user_info->u_lname);
			$this->session->set_userdata('u_type',$u_type);
			echo '3'; exit; // admin
		}
	}
}