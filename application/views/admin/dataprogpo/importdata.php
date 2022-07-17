<html>

<head>
    <title>Form Import</title>

    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        // Sembunyikan alert validasi kosong
        $("#kosong").hide();
    });
    </script>
</head>

<body>
    <h3>Form Import</h3>
    <hr>

    <a href="<?php echo base_url("csv/import_data.csv"); ?>">Download Format</a>
    <br>
    <br>

    <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
    <form method="post" action="<?php echo base_url("admin/dataprogpo/form"); ?>" enctype="multipart/form-data">
        <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
        <input type="file" name="file">

        <!--
    -- Buat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
        <input type="submit" name="preview" value="Preview">
    </form>

    <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url('admin/Dataprogpo/import')."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum terisi semua.
    </div>";
    
    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='21'>Preview Data</th>
    </tr>
    <tr>
      <th>wodate</th>
      <th>wonumber</th>
      <th>ponumber</th>
      <th>customerid</th>
      <th>customername</th>
      <th>vendorid</th>
      <th>vendorname</th>
      <th>mrc</th>
      <th>otc</th>
      <th>deptid</th>
      <th>deptname</th>
      <th>area</th>
      <th>salesid</th>
      <th>salesname</th>
      <th>email</th>
      <th>titikoordinat</th>
      <th>nodea</th>
      <th>nodeb</th>
      <th>statuspo</th>
      <th>vendorawal</th>
      <th>kapasitasvendor</th>
    </tr>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di csv
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
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
      $wodate = $get[0]; // Ambil data NIS
      $wonumber = $get[1]; // Ambil data nama
      $ponumber = $get[2]; // Ambil data Tanggal Lahir
      $customerid = $get[3]; // Ambil data Tempat Lahir
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
      
      // Cek jika semua data tidak diisi
      if(empty($wodate) && empty($wonumber) && empty($ponumber) && empty($customerid)&& empty($customername)
      && empty($vendorid)&& empty($vendorname)&& empty($mrc)&& empty($otc)&& empty($deptid)&& empty($deptname)
      && empty($area)&& empty($salesid)&& empty($salesname)&& empty($email)&& empty($titikkoordinat)&& empty($nodea)&& empty($nodeb)
      && empty($statuspo)&& empty($vendorawal)&& empty($kapasitasvendor))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $wodate_td = ( ! empty($wodate))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $wonumber_td = ( ! empty($wonumber))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $ponumber_td = ( ! empty($ponumber))? "" : " style='background: #E07171;'"; // Jika Tanggal Lahir kosong, beri warna merah
        $customerid_td = ( ! empty($customerid))? "" : " style='background: #E07171;'"; // Jika Tempat Lahir kosong, beri warna merah
        $customername_td = ( ! empty($customername))? "" : " style='background: #E07171;'";
        $vendorid_td = ( ! empty($vendorid))? "" : " style='background: #E07171;'";
        $vendorname_td = ( ! empty($vendorname))? "" : " style='background: #E07171;'";
        $mrc_td = ( ! empty($mrc))? "" : " style='background: #E07171;'";
        $otc_td = ( ! empty($otc))? "" : " style='background: #E07171;'";
        $deptid_td = ( ! empty($deptid))? "" : " style='background: #E07171;'";
        $deptname_td = ( ! empty($deptname))? "" : " style='background: #E07171;'";
        $area_td = ( ! empty($area))? "" : " style='background: #E07171;'";
        $salesid_td = ( ! empty($salesid))? "" : " style='background: #E07171;'";
        $salesname_td = ( ! empty($salesname))? "" : " style='background: #E07171;'";
        $email_td = ( ! empty($email))? "" : " style='background: #E07171;'";
        $titikkoordinat_td = ( ! empty($titikkoordinat))? "" : " style='background: #E07171;'";
        $nodea_td = ( ! empty($nodea))? "" : " style='background: #E07171;'";
        $nodeb_td = ( ! empty($nodeb))? "" : " style='background: #E07171;'";
        $statuspo_td = ( ! empty($statuspo))? "" : " style='background: #E07171;'";
        $vendorawal_td = ( ! empty($vendorawal))? "" : " style='background: #E07171;'";
        $kapasitasvendor_td = ( ! empty($kapasitasvendor))? "" : " style='background: #E07171;'";

        
        // Jika salah satu data ada yang kosong
        if(empty($wodate) or empty($wonumber) or empty($ponumber) or empty($customerid)
        or empty($customername)or empty($vendorid)or empty($vendorname)or empty($mrc)
        or empty($otc)or empty($deptid)or empty($deptname)or empty($area)
        or empty($salesid)or empty($salesname)or empty($email)or empty($titikkoordinat)
        or empty($nodea)or empty($nodeb)or empty($statuspo)or empty($vendorawal)
        or empty($kapasitasvendor)){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$wodate_td.">".$wodate."</td>";
        echo "<td".$wonumber_td.">".$wonumber."</td>";
        echo "<td".$ponumber_td.">".$ponumber."</td>";
        echo "<td".$customerid_td.">".$customerid."</td>";
        echo "<td".$customername_td.">".$customername."</td>";
        echo "<td".$vendorid_td.">".$vendorid."</td>";
        echo "<td".$vendorname_td.">".$vendorname."</td>";
        echo "<td".$mrc_td.">".$mrc."</td>";
        echo "<td".$otc_td.">".$otc."</td>";
        echo "<td".$deptid_td.">".$deptid."</td>";
        echo "<td".$deptname_td.">".$deptname."</td>";
        echo "<td".$area_td.">".$area."</td>";
        echo "<td".$salesid_td.">".$salesid."</td>";
        echo "<td".$salesname_td.">".$salesname."</td>";
        echo "<td".$email_td.">".$email."</td>";
        echo "<td".$titikkoordinat_td.">".$titikkoordinat."</td>";
        echo "<td".$nodea_td.">".$nodea."</td>";
        echo "<td".$nodeb_td.">".$nodeb."</td>";
        echo "<td".$statuspo_td.">".$statuspo."</td>";
        echo "<td".$vendorawal_td.">".$vendorawal."</td>";
        echo "<td".$kapasitasvendor_td.">".$kapasitasvendor."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 1
    // Jika lebih dari 1, berarti ada data yang masih kosong
    if($kosong > 1){
    ?>
    <script>
    $(document).ready(function() {
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

        $("#kosong").show(); // Munculkan alert validasi kosong
    });
    </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button> ";
      echo "<a href='".base_url("admin/Dataprogpo/")."'>Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
</body>

</html>