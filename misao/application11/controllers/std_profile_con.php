<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Std_profile_con extends CI_Controller {

	public function index()
	{
		$userId = $this->session->userdata('u_id');
		$this->load->model('adminStudentsInfoModel');
		$data['profile_Info'] = $this->adminStudentsInfoModel->get_profile_info($userId);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
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
		//$this->load->view('upload_profile_image_v',$data);
	}
	public function change_pass()
	{
		$user_id = $this->input->post('user_id');
		$new_pass = $this->input->post('new_pass');
		$this->load->model('top_model');
		$update_status = $this->top_model->change_pass($user_id,$new_pass);
		if($update_status){echo "Change Successfully";}else{echo "Try Again to Change";}
		//$this->load->view('upload_profile_image_v',$data);
	}
	public function upload_profile_image()
	{
		$u_id = $this->session->userdata('u_id');
		$user_fname = $this->session->userdata('u_fname');
		$user_lname = $this->session->userdata('u_lname');
		$image_name = $u_id.$user_fname.$user_lname.'.jpg';
		//echo'rrrrr';exit;
		$userId = $this->session->userdata('u_id');
		$this->load->model('top_model');
		$data['upload_status'] = $this->top_model->insert_profile_image($userId,$image_name);
		$this->load->view('upload_profile_image_v',$data);
	}
	// public function search()
	// {
		// $userType = $this->input->post('userType');
		// $userName = $this->input->post('userName');
		// $userDOJ = $this->input->post('userDOJ');
		// $userDOE = $this->input->post('userDOE');
		// $userAuth = $this->input->post('userAuth');
		// $userCourse = $this->input->post('userCourse');
		// $userLevel = $this->input->post('userLevel');
		// $this->load->model('adminStudentsInfoModel');
		// $data['searchInfo'] = $this->adminStudentsInfoModel->searchInfo($userType,$userName,$userDOJ,$userDOE,$userAuth,$userCourse,$userLevel);
		// $this->load->view('adminSearchResult',$data);
	// }

	// public function delete()
	// {
		// $userId = $this->input->post('userId');
		// $this->load->model('adminStudentsInfoModel');
		// $this->adminStudentsInfoModel->delete($userId);
		// $this->load->view('admin_students_info');
	// }

	// public function detail()
	// {
		// $userId = $this->input->post('userId');
		// $this->load->model('adminStudentsInfoModel');
		// $data['detailInfo'] = $this->adminStudentsInfoModel->detail($userId);
		// $this->load->view('adminSearchDetail',$data);
	// }

	// public function getInfo()
	// {
		// $userId = $this->input->post('userId');
		// $this->load->model('adminStudentsInfoModel');
		// $data['detailInfo'] = $this->adminStudentsInfoModel->detail($userId);
		// $this->load->view('adminUpdate',$data);
	// }

	// public function updateStaff()
	// {
		// $updateId = $this->input->post('updateId');
		// $updateAuth = $this->input->post('updateAuth');
		// $updateDOJ = $this->input->post('updateDOJ');
		// $updateDOE = $this->input->post('updateDOE');
		// $this->load->model('adminStudentsInfoModel');
		// $data['detailInfo'] = $this->adminStudentsInfoModel->updateStaff($updateId,$updateAuth,$updateDOJ,$updateDOE);
		// $this->load->view('adminSearchDetail',$data);
	// }

	// public function updateTeacher()
	// {
		// $updateId = $this->input->post('updateId');
		// $updateAuth = $this->input->post('updateAuth');
		// $updateDOJ = $this->input->post('updateDOJ');
		// $updateDOE = $this->input->post('updateDOE');
		// $updateCourse = $this->input->post('updateCourse');
		// $this->load->model('adminStudentsInfoModel');
		// $data['detailInfo'] = $this->adminStudentsInfoModel->updateTeacher($updateId,$updateAuth,$updateDOJ,$updateDOE,$updateCourse);
		// $this->load->view('adminSearchDetail',$data);
	// }

	// public function updateStudent()
	// {
		// $updateId = $this->input->post('updateId');
		// $updateAuth = $this->input->post('updateAuth');
		// $updateDOJ = $this->input->post('updateDOJ');
		// $updateDOE = $this->input->post('updateDOE');
		// $updateCourse = $this->input->post('updateCourse');
		// $updateLevel = $this->input->post('updateLevel');
		// $this->load->model('adminStudentsInfoModel');
		// $data['detailInfo'] = $this->adminStudentsInfoModel->updateStudent($updateId,$updateAuth,$updateDOJ,$updateDOE,$updateCourse,$updateLevel);
		// $this->load->view('adminSearchDetail',$data);
	// }

}

?>
