<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Student_menu_con extends CI_Controller 
{
	public function index()
	{	
		$u_id = $this->session->userdata('u_id');
		$this->load->view('head');
		$this->load->model('admin_menu_model');
		$data['new_count'] = $this->admin_menu_model->count_new();
		$this->load->model('students_test_model');
		$data['today_test'] = $this->students_test_model->check_today_test($u_id);
		$this->load->view('student_menu_v',$data);
	}
	public function today_test_screen()
	{	
		$u_id = $this->session->userdata('u_id');
		$this->load->model('students_test_model');
		$data['today_test_no'] = $this->students_test_model->check_today_test($u_id);
		$data['today_test_data'] = $this->students_test_model->get_today_test_data($data['today_test_no'][0]['test_aproved']);
		$this->load->view('student_test_screen_v',$data);
	}

    public function click_logout()
    {
        $this->session->sess_destroy();
		$x = base_url();
        redirect($x );
    }
}
?>