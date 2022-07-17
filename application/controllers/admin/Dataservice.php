<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataservice extends CI_Controller 
{

	public function index()
	{
        $data['tbl_service']=$this->model_datacustomer->dataservice()->result();
		$sales['datasales']=$this->model_datacustomer->data_all_sales()->result();
		$dept['datadept']=$this->model_datacustomer->data_all_dept()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataservice/index',$data,$sales,$dept);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'ID'=>$this->input->post('ID'),
			'Kategori'=>$this->input->post('Kategori'),
			'service'=>$this->input->post('service'),
		);
		$this->model_datacustomer->insertdata('tbl_service',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Dataservice');
	}
	public function delete($ID)
	{
		$id=['ID' => $ID] ;
		$this->db->delete('tbl_service',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Dataservice');
	}
	
}
?>