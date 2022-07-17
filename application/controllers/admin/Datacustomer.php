<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacustomer extends CI_Controller 
{

	public function index()
	{
        $data['datacustomer']=$this->model_datacustomer->getdata()->result();
		$sales['datasales']=$this->model_datacustomer->data_all_sales()->result();
		$dept['datadept']=$this->model_datacustomer->data_all_dept()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/datacustomer/index',$data,$sales,$dept);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'customerid'=>$this->input->post('customerid'),
			'customername'=>$this->input->post('customername'),
			'salesid'=>$this->input->post('salesid'),
			'deptid'=>$this->input->post('deptid'),
		);
		$this->model_datacustomer->insertdata('datacustomer',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Datacustomer');
	}
	public function delete($customerid)
	{
		$id=['customerid' => $customerid] ;
		$this->db->delete('datacustomer',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Datacustomer');
	}
	
}
?>