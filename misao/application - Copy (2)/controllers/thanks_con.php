<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Thanks_con extends CI_Controller 
{
	public function index()
	{
		$this->load->view('head');
		$this->load->view('thanks');
	}
}
?>