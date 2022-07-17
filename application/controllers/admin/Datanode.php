<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datanode extends CI_Controller 
{

	public function index()
	{
        $data['datanode']=$this->model_datacustomer->data_node()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/datanode/index',$data);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'nodeid'=>$this->input->post('nodeid'),
			'node'=>$this->input->post('node'),
			
		);
		$this->model_datacustomer->insertdata('datanode',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Datanode');
	}
	public function delete($nodeid)
	{
		$id=['nodeid' => $nodeid] ;
		$this->db->delete('datanode',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Datanode');
	}
	
}
?>