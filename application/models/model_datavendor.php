<?php

	class model_datavendor extends CI_Model
	{
		public function getdata()
		{
			$this->db->order_by('vendorid','asc');
			$query=$this->db->get('data_vendor');
			return $query;
		}
		public function insertdata($data,$table)
		{
			$this->db->insert($data,$table);
		}
	}

?>