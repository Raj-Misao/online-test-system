<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu_con extends CI_Controller {

	public function index()
	{
		$this->load->view('head');
		$this->load->model('admin_menu_model');
		$data['new_count'] = $this->admin_menu_model->count_new();
		$this->load->view('admin_menu',$data);
	}

    public function click_logout()
    {
        $this->session->sess_destroy();
		$x = base_url();
        redirect($x );
    }

}

?>
