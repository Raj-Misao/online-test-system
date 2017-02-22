<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_test_con extends CI_Controller 
{
	public function index()
	{
		$this->load->model('test_data_model');
		$data['last_test_info'] = $this->test_data_model->last_test_info();
		$this->load->view('admin_test',$data);
	}
	public function upload_test_image_c()
	{
		$this->load->view('upload_test_image_v');
	}
	public function update_test()
	{
		$this->load->model('test_data_model');
		$data['last_test_info'] = $this->test_data_model->last_test_info();
		$data['get_all_test_tbl_data'] = $this->test_data_model->get_all_test_tbl_data();
		$this->load->view('update_test',$data);
	}
	public function update_test_formet()
	{	
		$this->load->model('test_data_model');
		$data['get_all_test_tbl_data'] = $this->test_data_model->get_all_test_tbl_data();
		$this->load->view('update_test_formet_view',$data);
	}
	public function new_test_formet()
	{
		$this->load->view('new_test_formet_view');
	}
	public function new_test_formet_insert()
	{
		$this->load->view('new_test_formet_insert_view .php');
	}
	public function new_test_data_insert()
	{
		$test_no = $this->input->post('test_no');
		$tests_data = $this->input->post('test_fileds_values_array');
		$test_data =  json_decode($tests_data,true);
		array_pop($test_data);
		$test_data = json_encode($test_data);
		$this->load->model('test_data_model');
		$this->test_data_model->insert_new_test_data($test_no,$test_data);
	}
	public function updated_test_data_insert()
	{
		$test_no = $this->input->post('test_no');
		$tests_data = $this->input->post('test_fileds_values_array');
		$test_data =  json_decode($tests_data,true);
		array_pop($test_data);
		$test_data = json_encode($test_data);
		$this->load->model('test_data_model');
		$this->test_data_model->insert_updated_test_data($test_no,$test_data);
	}
	public function test_aprovel_formet()
	{
		$this->load->model('test_data_model');
		$data['user_info'] = $this->test_data_model->student_for_test_aprovel();
		$data['get_all_test_tbl_data'] = $this->test_data_model->get_all_test_tbl_data();
		$this->load->view('test_aprovel_formet_view',$data);
	}
	public function update_test_aprovel_id()
	{
		$test_aprove_uid = $this->input->post('test_aprove_uid');
		$test_aprove_id = $this->input->post('test_aprove_id');
		$this->load->model('test_data_model');
		$this->test_data_model->updated_aprovel_test_id($test_aprove_uid,$test_aprove_id);
	}
	//////student test checking portion start raj sharma
	public function std_test_checking()
	{
		$test_no = $this->input->post('test_number');
		$tests_data = $this->input->post('test_fileds_values_array');
		$test_Ans_data =  json_decode($tests_data,true);
		array_pop($test_Ans_data);
		$data['test_answer_data'] = $test_Ans_data;
		$this->load->model('students_test_model');
		$data['test_qustion_data'] = $this->students_test_model->get_today_test_data($test_no);
		$this->load->view('result_check',$data);
	}
	public function std_test_record_insert()
	{
		$u_id = $this->session->userdata('u_id');
		$test_no = $this->input->post('test_number');
		$t_result_data = $this->input->post('t_result_data');
		$this->load->model('students_test_model');
		$data['get_test_result_data'] =  $this->students_test_model->test_record_insert($u_id,$test_no,$t_result_data);
		$this->load->view('result_record_show',$data);		
	}
	public function std_test_record_show()
	{	$std_uid_by_admin = $this->input->post('std_uid_by_admin');
		if(isset($std_uid_by_admin))
		{
			$u_id = $std_uid_by_admin;
		}
		else
		{
			$u_id = $this->session->userdata('u_id');
		}
		$this->load->model('students_test_model');
		$data['get_test_result_data'] =  $this->students_test_model->test_record_show($u_id);
		$this->load->view('result_record_show',$data);		
	}
	public function std_result_analysis()
	{
		$this->load->model('test_data_model');
		$data['user_info'] = $this->test_data_model->student_for_test_aprovel();
		$data['get_all_test_tbl_data'] = $this->test_data_model->get_all_test_tbl_data();
		$this->load->view('result_analysis_v',$data);
	}
}
?>