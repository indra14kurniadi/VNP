<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportpo extends CI_Controller 
{
    public function index()
    {
		$data2['datacustomer']=$this->model_datacustomer->getdata()->result();
        $data['datawo']=$this->model_datacustomer->data_all_wo()->result();
		$data3['data_vendor']=$this->model_datacustomer->data_vendor()->result();
		$data4['area']=$this->model_datacustomer->data_area()->result();
		$data5['datanode']=$this->model_datacustomer->data_node()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/reportpo/view',$data,$data2,$data3,$data4,$data5);
		$this->load->view('admin/templates/footer');
    }
}

?>