<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_new_students_con extends CI_Controller {

	public function index()
	{	$u_type = $this->session->userdata('u_type');
		$u_id = $this->session->userdata('u_id');
		if($u_type == 'normal')
		{
			$this->load->model('students_test_model');
			$data['user_info'] = $this->students_test_model->check_today_test($u_id);
			$this->load->view('admin_new_students',$data);
		}
		else
		{
			$this->load->model('admin_new_students_model');
			$data['user_info'] = $this->admin_new_students_model->new_students_load();
			$this->load->view('admin_new_students',$data);
		}
		// $this->load->model('admin_new_students_model');
		// $data['user_info'] = $this->admin_new_students_model->new_students_load();
		// $this->load->view('admin_new_students',$data);
	}

	public function delete_user()
	{
		$delete_user_id = $this->input->post('delete_u_id');
		$this->load->model('admin_new_students_model');
		$this->admin_new_students_model->delete_new_student($delete_user_id);
	}

	public function take_regi_user()
	{
		$regi_user_id = $this->input->post('regi_id');
		$this->load->model('admin_new_students_model');
		$data['regi_info'] = $this->admin_new_students_model->take_regi_info($regi_user_id);
		$this->load->view('admin_new_students_popup',$data);
	}

	public function user_detail()
	{
		$user_id = $this->input->post('u_id');
		$this->load->model('admin_new_students_model');
		$data['user_info'] = $this->admin_new_students_model->take_regi_info($user_id);
		$this->load->view('admin_new_students_details',$data);
	}

}

?>
