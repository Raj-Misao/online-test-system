<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_new_student_popup_con extends CI_Controller {

	public function en_student_data()
	{
        $u_id = $this->input->post('u_id');
        $u_sdate = $this->input->post('u_sdate');
        $u_edate = $this->input->post('u_edate');
        $u_auth = $this->input->post('u_auth');
        $u_type = $this->input->post('u_type');
        $u_course = $this->input->post('u_course');
        $u_level = $this->input->post('u_level');
        $this->load->model('admin_new_student_popup_model');
        $this->admin_new_student_popup_model->en_student_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type,$u_course,$u_level);
	}

    public function it_student_data()
	{
        $u_id = $this->input->post('u_id');
        $u_sdate = $this->input->post('u_sdate');
        $u_edate = $this->input->post('u_edate');
        $u_auth = $this->input->post('u_auth');
        $u_type = $this->input->post('u_type');
        $u_course = $this->input->post('u_course');
        $this->load->model('admin_new_student_popup_model');
        $this->admin_new_student_popup_model->it_student_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type,$u_course);
	}

    public function teacher_data()
    {
        $u_id = $this->input->post('u_id');
        $u_sdate = $this->input->post('u_sdate');
        $u_edate = $this->input->post('u_edate');
        $u_auth = $this->input->post('u_auth');
        $u_type = $this->input->post('u_type');
        $u_course = $this->input->post('u_course');
        $this->load->model('admin_new_student_popup_model');
        $this->admin_new_student_popup_model->teacher_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type,$u_course);
    }

    public function staff_data()
    {
        $u_id = $this->input->post('u_id');
        $u_sdate = $this->input->post('u_sdate');
        $u_edate = $this->input->post('u_edate');
        $u_auth = $this->input->post('u_auth');
        $u_type = $this->input->post('u_type');
        $this->load->model('admin_new_student_popup_model');
        $this->admin_new_student_popup_model->staff_insert($u_id,$u_sdate,$u_edate,$u_auth,$u_type);
    }

}

?>
