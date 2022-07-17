<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataprogpo extends CI_Controller 
{

	private $filename = "import_data"; // nama file .csv

	public function index()
	{

		$data2['datacustomer']=$this->model_datacustomer->getdata()->result();
        $data['datawo']=$this->model_datacustomer->data_all_wo()->result();
		$data3['data_vendor']=$this->model_datacustomer->data_vendor()->result();
		$data4['area']=$this->model_datacustomer->data_area()->result();
		$data5['datanode']=$this->model_datacustomer->data_node()->result();
		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataprogpo/index',$data,$data2,$data3,$data4,$data5);
		$this->load->view('admin/templates/footer');
	}
	public function add()
	{
		$data = array(
			'wodate'=>$this->input->post('wodate'),
			'wonumber'=>$this->input->post('wonumber'),
			'ponumber'=>$this->input->post('ponumber'),
			'customerid'=>$this->input->post('customerid'),
			'customername'=>$this->input->post('customername'),
			'vendorid'=>$this->input->post('vendorid'),
			'vendorname'=>$this->input->post('vendorname'),
			'mrc'=>$this->input->post('mrc'),
			'otc'=>$this->input->post('otc'),
			'deptid'=>$this->input->post('deptid'),
			'deptname'=>$this->input->post('deptname'),
			'area'=>$this->input->post('area'),
			'salesid'=>$this->input->post('salesid'),
			'salesname'=>$this->input->post('salesname'),
			'email'=>$this->input->post('email'),
			'titikkoordinat'=>$this->input->post('titikkoordinat'),
			'nodea'=>$this->input->post('nodea'),
			'nodeb'=>$this->input->post('nodeb'),
			'statuspo'=>$this->input->post('statuspo'),
			'vendorawal'=>$this->input->post('vendorawal'),
			'kapasitasvendor'=>$this->input->post('kapasitasvendor'),
		);

		$this->model_datacustomer->insertdata('datawo',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Dataprogpo');
	}
	
	public function cari_customername()
	{
			$id['customerid']	= $this->input->post('customerid');
			
			$q = $this->db->get_where("datacustomer",$id);
			$row = $q->num_rows();
			if($row>0){
				foreach($q->result() as $dt){
					$d['customername'] = $dt->customername;
				
				}
				echo json_encode($d);
			}else{
				$d['customername'] = '';
				
				echo json_encode($d);
			}
	}
	public function cari_deptname()
	{
			$id['deptid']	= $this->input->post('deptid');
			
			$q = $this->db->get_where("datadept",$id);
			$row = $q->num_rows();
			if($row>0){
				foreach($q->result() as $dt){
					$d['deptname'] = $dt->deptname;
				
				}
				echo json_encode($d);
			}else{
				$d['deptname'] = '';
				
				echo json_encode($d);
			}
	}
	public function cari_vendorname()
	{
			$id['vendorid']	= $this->input->post('vendorid');
			
			$q = $this->db->get_where("data_vendor",$id);
			$row = $q->num_rows();
			if($row>0){
				foreach($q->result() as $dt){
					$d['vendorname'] = $dt->vendorname;
				
				}
				echo json_encode($d);
			}else{
				$d['vendorname'] = '';
				
				echo json_encode($d);
			}
	}

	public function cari_salesid()
	{
			$id['salesname']	= $this->input->post('salesname');
			
			$q = $this->db->get_where("datasales",$id);
			$row = $q->num_rows();
			if($row>0){
				foreach($q->result() as $dt){
					$d['salesid'] = $dt->salesid;
					$d['email'] = $dt->email;
				
				}
				echo json_encode($d);
			}else{
				$d['salesid'] = '';
				$d['salesemail'] = '';
				
				echo json_encode($d);
			}
	}
	public function detail($wonumber)
	{
		$id=['wonumber' => $wonumber];
		$data['datawo']=$this->db->get_where('datawo',$id)->row_array();
		$data['updating']=$this->db->get_where('tblupdate',$id)->result();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataprogpo/detail',$data);
		$this->load->view('admin/templates/footer');
	}	
	public function delete($wonumber)
	{
		$id=['wonumber' => $wonumber] ;
		$this->db->delete('datawo',$id);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully Deleted	!
	 	</div>');
		redirect('admin/Dataprogpo');
	}


	public function update_add()
	{
		$data = array(
			'wonumber'=>$this->input->post('wonumber'),
			'update'=>$this->input->post('update'),
			'status'=>$this->input->post('progress'),
			
			'createdate'=>date('Y-m-d H:i:s'),
			
		);

		$this->model_datacustomer->insertdata('tblupdate',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success!</h4>
		Data has been sucessfully added!
	 	</div>');
		return redirect('admin/Dataprogpo');
	}
	public function edit($wonumber)
	{	
		if (isset($_POST['submit'])) {
			$this->model_datacustomer->update();
			
			redirect('admin/Dataprogpo');
		} else {
			$data = array(
				'wodate'=>$this->input->post('wodate'),
				
				'ponumber'=>$this->input->post('ponumber'),
				'customerid'=>$this->input->post('customerid'),
				'customername'=>$this->input->post('customername'),
				'vendorid'=>$this->input->post('vendorid'),
				'vendorname'=>$this->input->post('vendorname'),
				'mrc'=>$this->input->post('mrc'),
				'otc'=>$this->input->post('otc'),
				'deptid'=>$this->input->post('deptid'),
				'deptname'=>$this->input->post('deptname'),
				'area'=>$this->input->post('area'),
				'salesid'=>$this->input->post('salesid'),
				'salesname'=>$this->input->post('salesname'),
				'email'=>$this->input->post('email'),
				'titikkoordinat'=>$this->input->post('titikkoordinat'),
				'nodea'=>$this->input->post('nodea'),
				'nodeb'=>$this->input->post('nodeb'),
				'statuspo'=>$this->input->post('statuspo'),
				'vendorawal'=>$this->input->post('vendorawal'),
				'kapasitasvendor'=>$this->input->post('kapasitasvendor'),
			);
			$id=['wonumber' => $wonumber];
			$data['datawo']=$this->db->get_where('datawo',$id)->row_array();
	
			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/Dataprogpo/edit',$data);
			$this->load->view('admin/templates/footer');
		}
	}
	

	public function sendemail($wonumber)
	{
		
			$config=array(
				'protocol'=>'smtp',
				'smtp_host'=>'ssl://smtp.gmail.com',
				'smtp_port'=>465,
				'smtp_user'=>'indra14kurniadi@gmail.com',
				'smtp_pass'=>'zrtarujjshqxeysx',
				'mailtype'=>'html',
				'charset'=>'iso-8859-1',
				'newline'=>'\r\n',
				

			);

			
			$this->db->select('wonumber');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$wo=$this->db->get()->row_array();

			$this->db->select('customername');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$customername=$this->db->get()->row_array();

			$this->db->select('salesname');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$salesname=$this->db->get()->row_array();

			$this->db->select('ponumber');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$po=$this->db->get()->row_array();

			$this->db->select('nodea');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$nodea=$this->db->get()->row_array();
			
			$this->db->select('nodeb');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$nodeb=$this->db->get()->row_array();
			
			$this->db->select('nodeb');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$nodeb=$this->db->get()->row_array();
			
			$this->db->select('kapasitasvendor');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$kapasitasvendor=$this->db->get()->row_array();

			$this->db->select('vendorname');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$vendorname=$this->db->get()->row_array();

			$this->db->select('statuspo');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$statuspo=$this->db->get()->row_array();

			$this->db->select('Status');
			$this->db->from('tblupdate');
			$this->db->where('wonumber',$wonumber);
			$this->db->order_by('createdate','desc');
			$Status=$this->db->get()->row_array();


			$this->db->select('update');
			$this->db->from('tblupdate');
			$this->db->where('wonumber',$wonumber);
			$this->db->order_by('createdate','desc');
			$update=$this->db->get()->row_array();

			//buat masukkin email sesuai yg diklik
			$this->db->select('email');
			$this->db->from('datawo');
			$this->db->where('wonumber',$wonumber);
			$email=$this->db->get()->row_array();


			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");
			$this->email->from('indra14kurniadi@gmail.com', 'Indra Kurniadi');
			$this->email->to($email);
			$this->email->cc('indra.kurniadi@hypernet.co.id');
			//$this->email->cc('networkdelivery@hypernet.co.id');
			//$this->email->cc('salessupport@hypernet.co.id');
			//$this->email->cc('opr.support@hypernet.co.id');
			//$this->email->cc('masing2 head');
			$this->email->subject('STATUS DONE - '.$wo["wonumber"].' - '.$customername["customername"].' - '.$salesname["salesname"]);
			$this->email->message(
				'Data dibawah ini sudah done dari vendor:'.'<br>'.'<br>'.

				'WO Number'.'        = '.$wo["wonumber"].'<br>'.
				'PO Number'.'        = '.$po["ponumber"].'<br>'.
				'NODE A'.'           = '.$nodea["nodea"].'<br>'.
				'NODE B'.'           = '.$nodeb["nodeb"].'<br>'.
				'KAPASITAS'.'        = '.$kapasitasvendor["kapasitasvendor"].'<br>'.
				'VENDOR NAME'.'      = '.$vendorname["vendorname"].'<br>'.
				'KATEGORI'.'         = '.$statuspo["statuspo"].'<br>'.
				'STATUS'.'         = '.$Status["Status"].'<br>'.
				'FOLLOW UP STATUS'.' = '.$update["update"].'<br>'.'<br>'.

				'Atas perhatian dan kerjasamanya. Saya ucapkan terima kasih.'.'<br>'.'<br>'.
				'Best Regards,'.'<br>'.'<br>'.
				'VNP_BOT'
	
			);
	
			if($this->email->send()) {
				 redirect('admin/Dataprogpo');
			}
			else {
				 echo "Email tidak berhasil dikirim";
				 echo '<br />';
				 echo $this->email->print_debugger();
			}		
	}
	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array
				
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
		  // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
		  $uploadcsv = $this->model_datacustomer->upload_csv($this->filename);
		  
		  if($uploadcsv['result'] == "success"){ // Jika proses upload sukses
			// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			
			$csvreader = PHPExcel_IOFactory::createReader('CSV');
			$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
			$sheet = $loadcsv->getActiveSheet()->getRowIterator();
			
			// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
			// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
			$data['sheet'] = $sheet; 
		  }else{ // Jika proses upload gagal
			$data['upload_error'] = $uploadcsv['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		  }
		}
		
		$this->load->view('admin/dataprogpo/importdata', $data);
	  }

	  public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	  
	  $csvreader = PHPExcel_IOFactory::createReader('CSV');
	  $loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
	  $sheet = $loadcsv->getActiveSheet()->getRowIterator();
	  
	  // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	  $data = [];
	  
	  $numrow = 1;
	  foreach($sheet as $row){
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
		  // START -->
		  // Skrip untuk mengambil value nya
		  $cellIterator = $row->getCellIterator();
		  $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
		  
		  $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
		  foreach ($cellIterator as $cell) {
			array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
		  }
		  // <-- END
		  
		  // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
		  $wodate = $get[0]; // Ambil data NIS dari kolom A di csv
		  $wonumber = $get[1]; // Ambil data nama dari kolom B di csv
		  $ponumber = $get[2]; // Ambil data jenis kelamin dari kolom C di csv
		  $customerid = $get[3]; // Ambil data alamat dari kolom D di csv
		  $customername = $get[4];
		  $vendorid = $get[5];
		  $vendorname = $get[6];
		  $mrc = $get[7];
		  $otc = $get[8];
		  $deptid = $get[9];
		  $deptname = $get[10];
		  $area = $get[11];
		  $salesid = $get[12];
		  $salesname = $get[13];
		  $email = $get[14];
		  $titikkoordinat = $get[15];
		  $nodea = $get[16];
		  $nodeb = $get[17];
		  $statuspo = $get[18];
		  $vendorawal = $get[19];
		  $kapasitasvendor = $get[20];

		  
		  // Kita push (add) array data ke variabel data
		  array_push($data, [
			'wodate'=>$wodate, // Insert data nis
			'wonumber'=>$wonumber, // Insert data nama
			'ponumber'=>$ponumber, // Insert data jenis kelamin
			'customerid'=>$customerid, // Insert data alamat
			'customername'=>$customername,
			'vendorid'=>$vendorid,
			'vendorname'=>$vendorname,
			'mrc'=>$mrc,
			'otc'=>$otc,
			'deptid'=>$deptid,
			'deptname'=>$deptname,
			'area'=>$area,
			'salesid'=>$salesid,
			'salesname'=>$salesname,
			'email'=>$email,
			'titikkoordinat'=>$titikkoordinat,
			'nodea'=>$nodea,
			'nodeb'=>$nodeb,
			'statuspo'=>$statuspo,
			'vendorawal'=>$vendorawal,
			'kapasitasvendor'=>$kapasitasvendor,
		  ]);
		}
		
		$numrow++; // Tambah 1 setiap kali looping
	  }
	  // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	  $this->model_datacustomer->insert_multiple($data);
	  
	  redirect("admin/Dataprogpo/"); 
	}
	function export_excel()
	{
		$this->load->library('CPHP_excel');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'WO Date');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'WO Number');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'PO Number');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Customer ID');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Customer Name');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Vendor ID');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Vendor Name');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'MRC');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'OTC');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Dept ID');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Dept Name');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Area');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Sales ID');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Sales Name');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Email');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Titik Koordinat');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Node A');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Node B');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Status PO');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Vendor Awal');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Kapasitas Vendor');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Tanggal Done');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Status Delivery');

		
		
		$sql 					= "SELECT * FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate				
									where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber";
									
			$datawo	= $this->db->query($sql)->result();
			
		$no=2;
		foreach ($datawo as $row){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $row->wodate);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->wonumber);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->ponumber);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$no, $row->customerid);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$no, $row->customername);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no, $row->vendorid);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$no, $row->vendorname);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$no, $row->mrc);
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$no, $row->otc);
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$no, $row->deptid);
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$no, $row->deptname);
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$no, $row->area);
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$no, $row->salesid);
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$no, $row->salesname);
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$no, $row->email);
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$no, $row->titikkoordinat);
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$no, $row->nodea);
			$objPHPExcel->getActiveSheet()->setCellValue('R'.$no, $row->nodeb);
			$objPHPExcel->getActiveSheet()->setCellValue('S'.$no, $row->statuspo);
			$objPHPExcel->getActiveSheet()->setCellValue('T'.$no, $row->vendorawal);
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$no, $row->kapasitasvendor);
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$no, $row->createdate);
			$objPHPExcel->getActiveSheet()->setCellValue('W'.$no, $row->Status);
			$no++;
		}
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
		$objWriter->save("report_wo.xlsx");
		$this->load->helper('download');
		force_download('report_wo.xlsx', NULL);
	}

	public function emailnotdone()
	{
		//$sql="SELECT * FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate				
		//where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber and tblupdate.Status='ON Progress' group by datawo.email";
		//$datanotdone=$this->db->query($sql)->result();
		//var_dump($datanotdone);die;
		$config=array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.gmail.com',
			'smtp_port'=>465,
			'smtp_user'=>'indra14kurniadi@gmail.com',
			'smtp_pass'=>'zrtarujjshqxeysx',
			'mailtype'=>'html',
			'charset'=>'iso-8859-1',
			'newline'=>'\r\n',
			

		);
		


		//$wonotdone="SELECT datawo.*,tblupdate.* FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate				
		//where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber and tblupdate.Status='ON PROGRESS' ";
		//$wonotdone2=$this->db->query($wonotdone)->result_array();
		$data23="SELECT group_concat(wonumber), email as wo From datawo group by email ";
		$sql="SELECT group_concat(datawo.wonumber) FROM datawo,tblupdate,(select wonumber,max(createdate) as createdate from tblupdate group by wonumber) max_createdate				
		where tblupdate.wonumber=datawo.wonumber and max_createdate.createdate=tblupdate.createdate and max_createdate.wonumber=datawo.wonumber and tblupdate.Status='ON Progress' group by datawo.email";
		$test=$this->db->query($sql)->result();
		
		var_dump($test);die;

		

		//foreach ($test as $row){
		//	$this->email->initialize($config);
		//	$this->email->set_newline("\r\n");
		//	$this->email->set_crlf("\r\n");
		//	$this->email->from('indra14kurniadi@gmail.com', 'Indra Kurniadi');
		//	$this->email->to(explode(",",$row['email']));
		//	$this->email->cc('indra14kurniadi@gmail,com');
		//	$this->email->message("test");
		//	$this->email->subject("test");
		//	$this->email->send();

		
		
		

		
		
	}	
		

}



?>