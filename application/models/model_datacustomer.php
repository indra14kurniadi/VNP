<?php

	class model_datacustomer extends CI_Model
	{
		public function getdata()
		{
			$this->db->order_by('customerid','asc');
			$query=$this->db->get('datacustomer');
			return $query;
		}
		public function insertdata($data,$table)
		{
			$this->db->insert($data,$table);
		}
	
		public function data_all_sales()
		{
			$this->db->order_by('salesid');
			$q = $this->db->get('datasales');
			return $q;
		}
		public function data_all_dept()
		{
			$this->db->order_by('deptid');
			$q = $this->db->get('datadept');
			return $q;
		}
		public function data_all_wo()
		{
			$this->db->order_by('wonumber');
			$q = $this->db->get('datawo');
			return $q;
		}

		public function data_vendor()
		{
			$this->db->order_by('vendorid');
			$q = $this->db->get('data_vendor');
			return $q;
		}
		public function data_area()
		{
			$this->db->order_by('areaid');
			$q = $this->db->get('area');
			return $q;
		}
		public function data_node()
		{
			$this->db->order_by('nodeid');
			$q = $this->db->get('datanode');
			return $q;
		}
		public function update()
		{
			$data = array(
				'wodate'=> $this->input->post('wodate', TRUE),
				
				'ponumber'=> $this->input->post('ponumber', TRUE),
				'mrc'=> $this->input->post('mrc', TRUE),
				'otc' => $this->input->post('otc', TRUE),
				'titikkoordinat'=> $this->input->post('titikkoordinat', TRUE),
				'nodea'=> $this->input->post('nodea', TRUE),
				'nodeb'=> $this->input->post('nodeb', TRUE),
				'kapasitasvendor'=> $this->input->post('kapasitasvendor', TRUE),
				
			);

			
				
				$customerid=$this->input->post('customerid');
				$customername=$this->input->post('customername');
				$vendorid=$this->input->post('vendorid');
				$vendorname=$this->input->post('vendorname');
				
				$deptid=$this->input->post('deptid');
				$deptname=$this->input->post('deptname');
				$area=$this->input->post('area');
				$salesid=$this->input->post('salesid');
				$salesname=$this->input->post('salesname');
				$email=$this->input->post('email');
				
				$statuspo=$this->input->post('statuspo');
				$vendorawal=$this->input->post('vendorawal');
				
			
			$this->db->where('customerid', $customerid);
			$this->db->where('customername', $customername);
			$this->db->where('vendorid', $vendorid);
			$this->db->where('vendorname', $vendorname);
			
			$this->db->where('deptid', $deptid);
			$this->db->where('deptname', $deptname);
			$this->db->where('area', $area);
			$this->db->where('salesid', $salesid);
			$this->db->where('salesname', $salesname);
			$this->db->where('email', $email);
			
			$this->db->where('statuspo', $statuspo);
			$this->db->where('vendorawal', $vendorawal);
			
			$this->db->update('datawo', $data);
		}
		
		public function upload_csv($filename)
		{
		    $this->load->library('upload'); // Load librari upload
		    
		    $config['upload_path'] = './csv/';
		    $config['allowed_types'] = 'csv';
		    $config['max_size']  = '2048';
		    $config['overwrite'] = true;
		    $config['file_name'] = $filename;
		  
		    $this->upload->initialize($config); // Load konfigurasi uploadnya
		    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
		      // Jika berhasil :
		      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		      return $return;
		    }else{
		      // Jika gagal :
		      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			  
		      return $return;
			  
		    }
		}

		public function insert_multiple($data){
		    $this->db->insert_batch('datawo', $data);
		}
		
		public function login($username, $password)
		{
			$this->db->where('email', $username);
			$this->db->where('password', $password);
			$user = $this->db->get('datasales')->row_array();
			
			return $user;
			
		}
		public function dataservice()
		{
			$this->db->order_by('ID');
			$q = $this->db->get('tbl_service');
			return $q;
		}
		public function datacheck()
		{
			$this->db->order_by('serviceid');
			$q = $this->db->get('tbl_check');
			return $q;
		}
		public function data_alamat()
		{
			$this->db->order_by('ID');
			$q = $this->db->get('alamat');
			return $q;
		}
		public function data_join_wo()
		{
			$sql="SELECT datawo.*,tblupdate.* FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber and tblupdate.Status='DONE'";
			$q=$this->db->query($sql);
			return $q;
		}

		public function datawonotdone()
		{
			$sql="SELECT datawo.wonumber FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate				
			where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber and tblupdate.Status='ON Progress'";
			$test=$this->db->query($sql);
			
			return $test;
		}
		public function datawodone()
		{
			$sql="SELECT datawo.wonumber FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate				
			where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber and tblupdate.Status='DONE'";
			$test=$this->db->query($sql);
			
			return $test;
		}
	
	}
?>