<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datavendor extends CI_Controller 
{

	public function index()
	{
		$data['data_vendor']=$this->model_datavendor->getdata()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/datavendor/index',$data);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'vendorid'=>$this->input->post('vendorid'),
			'vendorname'=>$this->input->post('vendorname'),
			'emailvendor'=>$this->input->post('vendoremail'),
		);
		$this->model_datavendor->insertdata('data_vendor',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Datavendor');
	}
	public function delete($vendorid)
	{
		$id=['vendorid' => $vendorid] ;
		$this->db->delete('data_vendor',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Datavendor');
	}


}