<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasales extends CI_Controller 
{

	public function index()
	{
		$sales['datasales']=$this->model_datacustomer->data_all_sales()->result();
		$dept['datadept']=$this->model_datacustomer->data_all_dept()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/datasales/index',$sales,$dept);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'salesid'=>$this->input->post('salesid'),
			'employeeid'=>$this->input->post('employeeid'),
			'salesname'=>$this->input->post('salesname'),
			'deptid'=>$this->input->post('deptid'),
			'email'=>$this->input->post('email'),
		);
		$this->model_datacustomer->insertdata('datasales',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Datasales');
	}
	public function delete($salesid)
	{
		$id=['salesid' => $salesid] ;
		$this->db->delete('datasales',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Datasales');
	}
}
?>