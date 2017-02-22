<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Std_profile_con extends CI_Controller 
{
	public function index()
	{
		$userId = $this->session->userdata('u_id');
		$this->load->model('adminStudentsInfoModel');
		$data['profile_Info'] = $this->adminStudentsInfoModel->get_profile_info($userId);
		$this->load->view('std_profile_v',$data);
	}
	public function change_personal_info()
	{
		$user_id = $this->input->post('user_id');
		$c_uf_name = $this->input->post('c_uf_name');
		$c_ul_name = $this->input->post('c_ul_name');
		$c_u_email = $this->input->post('c_u_email');
		$c_u_phone = $this->input->post('c_u_phone');
		$this->load->model('top_model');
		$update_status = $this->top_model->update_change_personal_info($user_id,$c_uf_name,$c_ul_name,$c_u_email,$c_u_phone);
		if($update_status){echo "Change Successfully";}else{echo "Try Again to Change";}
	}
	public function change_pass()
	{
		$user_id = $this->input->post('user_id');
		$new_pass = $this->input->post('new_pass');
		$this->load->model('top_model');
		$update_status = $this->top_model->change_pass($user_id,$new_pass);
		if($update_status){echo "Change Successfully";}else{echo "Try Again to Change";}
	}
	public function upload_profile_image()
	{
		$u_id = $this->session->userdata('u_id');
		$user_fname = $this->session->userdata('u_fname');
		$user_lname = $this->session->userdata('u_lname');
		$image_name = $u_id.$user_fname.$user_lname.'.jpg';
		$userId = $this->session->userdata('u_id');
		$this->load->model('top_model');
		$data['upload_status'] = $this->top_model->insert_profile_image($userId,$image_name);
		$this->load->view('upload_profile_image_v',$data);
	}
}
?>
