<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_students_info_con extends CI_Controller {
	public function index()
	{
		$this->load->view('admin_students_info');
	}
	public function search()
	{
		$userType = $this->input->post('userType');
		$userName = $this->input->post('userName');
		$userDOJ = $this->input->post('userDOJ');
		$userDOE = $this->input->post('userDOE');
		$userAuth = $this->input->post('userAuth');
		$userCourse = $this->input->post('userCourse');
		$userLevel = $this->input->post('userLevel');
		$this->load->model('adminStudentsInfoModel');
		$data['searchInfo'] = $this->adminStudentsInfoModel->searchInfo($userType,$userName,$userDOJ,$userDOE,$userAuth,$userCourse,$userLevel);
		$this->load->view('adminSearchResult',$data);
	}

	public function delete()
	{
		$userId = $this->input->post('userId');
		$this->load->model('adminStudentsInfoModel');
		$this->adminStudentsInfoModel->delete($userId);
		$this->load->view('admin_students_info');
	}

	public function detail()
	{
		$userId = $this->input->post('userId');
		$this->load->model('adminStudentsInfoModel');
		$data['detailInfo'] = $this->adminStudentsInfoModel->detail($userId);
		$this->load->view('adminSearchDetail',$data);
	}

	public function getInfo()
	{
		$userId = $this->input->post('userId');
		$this->load->model('adminStudentsInfoModel');
		$data['detailInfo'] = $this->adminStudentsInfoModel->detail($userId);
		$this->load->view('adminUpdate',$data);
	}

	public function updateStaff()
	{
		$updateId = $this->input->post('updateId');
		$updateAuth = $this->input->post('updateAuth');
		$updateDOJ = $this->input->post('updateDOJ');
		$updateDOE = $this->input->post('updateDOE');
		$this->load->model('adminStudentsInfoModel');
		$data['detailInfo'] = $this->adminStudentsInfoModel->updateStaff($updateId,$updateAuth,$updateDOJ,$updateDOE);
		$this->load->view('adminSearchDetail',$data);
	}

	public function updateTeacher()
	{
		$updateId = $this->input->post('updateId');
		$updateAuth = $this->input->post('updateAuth');
		$updateDOJ = $this->input->post('updateDOJ');
		$updateDOE = $this->input->post('updateDOE');
		$updateCourse = $this->input->post('updateCourse');
		$this->load->model('adminStudentsInfoModel');
		$data['detailInfo'] = $this->adminStudentsInfoModel->updateTeacher($updateId,$updateAuth,$updateDOJ,$updateDOE,$updateCourse);
		$this->load->view('adminSearchDetail',$data);
	}

	public function updateStudent()
	{
		$updateId = $this->input->post('updateId');
		$updateAuth = $this->input->post('updateAuth');
		$updateDOJ = $this->input->post('updateDOJ');
		$updateDOE = $this->input->post('updateDOE');
		$updateCourse = $this->input->post('updateCourse');
		$updateLevel = $this->input->post('updateLevel');
		$this->load->model('adminStudentsInfoModel');
		$data['detailInfo'] = $this->adminStudentsInfoModel->updateStudent($updateId,$updateAuth,$updateDOJ,$updateDOE,$updateCourse,$updateLevel);
		$this->load->view('adminSearchDetail',$data);
	}
}
?>