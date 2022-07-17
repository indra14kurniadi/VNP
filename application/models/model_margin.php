<?php
    class model_margin extends CI_Model
    {
        public function update()
		{
			$data = array(
				'Alamat'=> $this->input->post('Alamat', TRUE),	
				'titikkoordinat'=>$this->input->post('titikkoordinat',true),
			);	
			
				$customerid=$this->input->post('customerid');
				$customername=$this->input->post('customername');
				$deptid=$this->input->post('deptid');
				$deptname=$this->input->post('deptname');
				$Area=$this->input->post('Area');
				$salesid=$this->input->post('salesid');
				$salesname=$this->input->post('salesname');
				
			
			$this->db->where('customerid', $customerid);
			$this->db->where('customername', $customername);
			$this->db->where('deptid', $deptid);
			$this->db->where('deptname', $deptname);
			$this->db->where('Area', $Area);
			$this->db->where('salesid', $salesid);
			$this->db->where('salesname', $salesname);
			
			$this->db->update('alamat', $data);
		}
    }
?>