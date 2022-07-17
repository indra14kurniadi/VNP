<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['datawonotdone']=$this->model_datacustomer->datawonotdone()->result_array();
		$data['datawodone']=$this->model_datacustomer->datawodone()->result_array();
		$data['datawo']=$this->model_datacustomer->data_all_wo()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/dashboard/index',$data);
		$this->load->view('admin/templates/footer');
	
	}
}