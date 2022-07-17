<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databast extends CI_Controller 
{

	private $filename = "import_data"; // nama file .csv

	public function construct()
	{
		parent::_construct();
	}

	public function index()
	{

		$data['datacustomer']=$this->model_datacustomer->getdata()->result();
        $data['datawo']=$this->model_datacustomer->data_all_wo()->result();
		$data['data_vendor']=$this->model_datacustomer->data_vendor()->result();
		$data['area']=$this->model_datacustomer->data_area()->result();
		$data['datanode']=$this->model_datacustomer->data_node()->result();
        $data['datajoin']=$this->model_datacustomer->data_join_wo()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/databast/index',$data);
		$this->load->view('admin/templates/footer');
	}
	
	public function do_upload() { 
		$config['upload_path']   = './berkas/'; 
		$config['allowed_types'] = 'pdf|gif|jpg|png'; 
		$config['max_size']      = 100; 
		$config['max_width']     = 1024; 
		$config['max_height']    = 768;  
		$this->load->library('upload', $config);
		   
		if ( ! $this->upload->do_upload('bastupload')) {
		   $error = array('error' => $this->upload->display_errors()); 
		   $this->load->view('upload_form', $error); 
		}
		   
		else { 
		   $data = $this->upload->data();
		   $data2= array(
			'wonumber'=>$this->input->post('wonumber'),
			'ponumber'=>$this->input->post('wonumber'),
			'vendorid'=>$this->input->post('vendorid'),
			'bastdate'=>$this->input->post('bastdate'),
			'bastupload'=>$data['file_name'],
			'uploadpertgl'=>$this->input->post('uploadpertgl'),
		);

		$this->model_datacustomer->insertdata('databast',$data2);

		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Databast');
		} 
	}

  

    public function detail($wonumber)
	{
		$id=['wonumber' => $wonumber];
		$data['datawo']=$this->model_datacustomer->data_all_wo()->result();
		$data['datawo']=$this->db->get_where('datawo',$id)->row_array();
	
		

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/databast/detail',$data);
		$this->load->view('admin/templates/footer');
	}	
    
}

?>