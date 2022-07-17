<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Margin extends CI_Controller 
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
        $this->load->view('admin/Margin/index',$data2);
		$this->load->view('admin/templates/footer');
	}

    public function detail($customerid)
    {
        $id=['customerid' => $customerid];
		$data['alamat']=$this->db->get_where('alamat',$id)->result();
		$data['datacustomer']=$this->model_datacustomer->getdata()->result();
		
		

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Margin/detail',$data);
		$this->load->view('admin/templates/footer');
        
    }

    public function add()
	{
		$data = array(
			'alamat'=>$this->input->post('alamat'),
			'customerid'=>$this->input->post('customerid'),
			'customername'=>$this->input->post('customername'),
			'deptid'=>$this->input->post('deptid'),
			'deptname'=>$this->input->post('deptname'),
			'area'=>$this->input->post('area'),
			'salesid'=>$this->input->post('salesid'),
			'salesname'=>$this->input->post('salesname'),
			'titikkoordinat'=>$this->input->post('titikkoordinat'),
		);

		$this->model_datacustomer->insertdata('alamat',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Margin');
	}

	public function edit2($ID)
	{	
		
		if (isset($_POST['save'])) {
			$this->model_margin->update();
			
			redirect('admin/Margin');
		} else {
			$data = array(
				'ID'=>$this->input->post('ID'),
				'customerid'=>$this->input->post('customerid'),
				'customername'=>$this->input->post('customername'),
				'Alamat'=>$this->input->post('Alamat'),
				'salesid'=>$this->input->post('salesid'),
				'salesname'=>$this->input->post('salesname'),
				'deptid'=>$this->input->post('deptid'),
				'deptname'=>$this->input->post('deptname'),
				'area'=>$this->input->post('area'),
				'titikkoordinat'=>$this->input->post('titikkoordinat'),
			);
			$id=['ID' => $ID];
			$data['alamat']=$this->db->get_where('alamat',$id)->row_array();
	
			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/Margin/edit',$data);
			$this->load->view('admin/templates/footer');
		}
	}

	public function delete($ID)
	{
		$id=['ID' => $ID] ;
		$this->db->delete('alamat',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Margin');
	}

	public function check($ID)
    {
			$id=['alamatid' => $ID];
			$data['tbl_check']=$this->db->get_where('tbl_check',$id)->result();
			$data['datacustomer']=$this->model_datacustomer->getdata()->result();
			$data['alamat']=$this->model_datacustomer->data_alamat()->result();
			
	
			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/Margin/check',$data);
			$this->load->view('admin/templates/footer');
        
    }
	public function cari_serviceid()
	{
		$id['service']	= $this->input->post('service');
			
		$q = $this->db->get_where("tbl_service",$id);
		$row = $q->num_rows();
		if($row>0){
			foreach($q->result() as $dt){
				$d['ID'] = $dt->ID;
				$d['Kategori'] = $dt->Kategori;
			
			}
			echo json_encode($d);
		}else{
			$d['ID'] = '';
			$d['Kategori'] = '';
			
			echo json_encode($d);
		}
	}
	public function add_service()
	{
		$data = array(
			'tglreq'=>$this->input->post('tglreq'),
			'serviceid'=>$this->input->post('serviceid'),
			'service'=>$this->input->post('service'),
			'Kategori'=>$this->input->post('Kategori'),
			'iix'=>$this->input->post('iix'),
			'ix'=>$this->input->post('ix'),
			'mrcjual'=>$this->input->post('mrcjual'),
			'otcjual'=>$this->input->post('otcjual'),
			'durasikontrak'=>$this->input->post('durasikontrak'),			

		);

		$this->model_datacustomer->insertdata('tbl_check',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Margin');
	}
	public function hitung($serviceid)
	{
		$id=['serviceid' => $serviceid];
		$data['tbl_check']=$this->db->get_where('tbl_check',$id)->row_array();
		$data['area']=$this->model_datacustomer->data_area()->result();
		$data['alamat']=$this->model_datacustomer->data_alamat()->result();


		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/Margin/hitung',$data);
		$this->load->view('admin/templates/footer');
	}	

}
?>