<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datadept extends CI_Controller 
{

	public function index()
	{
		$data['datadept']=$this->model_datacustomer->data_all_dept()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/datadept/index',$data);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'deptid'=>$this->input->post('deptid'),
			'deptname'=>$this->input->post('deptname'),
		);

		$this->model_datacustomer->insertdata('datadept',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Datadept');
	}
	public function delete($deptid)
	{
		$id=['deptid' => $deptid] ;
		$this->db->delete('datadept',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Datadept');
	}
}