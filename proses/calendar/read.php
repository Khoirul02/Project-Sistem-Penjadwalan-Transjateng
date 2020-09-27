<?php

//read.php
$connect = new PDO('mysql:host=localhost;dbname=galerisa_transjateng', 'galerisa_transjatenguser', 'A+gxT!]eDMq4');

$data = array();

if(isset($_GET['kode_pengguna'])){
  $kode_pengguna = $_GET['kode_pengguna'];
  if ($kode_pengguna == '') {
    $query = "SELECT * FROM jadwal WHERE status_jadwal='approve'";
    }else{
    $query_id_pengguna = "SELECT * FROM pengguna WHERE kode_pengguna=".$kode_pengguna."";
    $statement_id_pengguna = $connect->prepare($query_id_pengguna);
    $statement_id_pengguna->execute();
    $result_id_pengguna = $statement_id_pengguna->fetchAll();
    foreach ($result_id_pengguna as $row_id_pengguna) {
      $id_pengguna = $row_id_pengguna["id_pengguna"];  
    }
    $query = "SELECT * FROM jadwal WHERE id_pengguna='$id_pengguna' AND status_jadwal='approve'";
  }
}else{
  $query = "SELECT * FROM jadwal WHERE status_jadwal='approve'";
}
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
    function tgl_indo($tanggal){
    $bulan = array(
    	1 => 'Januari',
    	'Februari',
    	'Maret',
    	'April',
    	'Mei',
    	'Juni',
    	'Juli',
    	'Agustus',
    	'September',
    	'Oktober',
    	'November',
    	'Desember'
    );
    $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
                                            
foreach($result as $row){
if($row['status_data_jadwal']=='libur'){
	$className = "label-important";
}else{
	$className = "label-success";
}
$query_user = "SELECT * FROM pengguna WHERE id_pengguna=".$row['id_pengguna']."";
$statement_user = $connect->prepare($query_user);
$statement_user->execute();
$result_user = $statement_user->fetchAll();
foreach ($result_user as $row_user) {
	$kode_pengguna = $row_user["kode_pengguna"];
	$nama_lengkap = $row_user["nama_lengkap_pengguna"];
	$jabatan_pengguna = $row_user["jabatan_pengguna"];
	$foto_pengguna = $row_user["foto_pengguna"];
	if($jabatan_pengguna == 'timer'){
		$jabatan = "Timer";
	}elseif ($jabatan_pengguna == 'pengawas') {
		$jabatan = "Pengawas Angkutan";
	}else{
		$jabatan = "Pramusaja";
	}
}
if(strlen($row['keterangan_waktu_jadwal']) > 1){
    $keterangan_waktu_jadwal = $row['keterangan_waktu_jadwal'];
    $shift = substr($keterangan_waktu_jadwal,0,1);
    $waktu = substr($keterangan_waktu_jadwal, 2,5);
    $keterangan_waktu_jadwal_shift = $shift;
    if($keterangan_waktu_jadwal_shift == '1'){
      $shift = "Shift Pagi";
      $penghubung = " / Jam ";
      $time = $shift.$penghubung.$waktu; 
    }else{
      $shift = "Shift Siang";
      $penghubung = " / Jam ";
      $time = $shift.$penghubung.$waktu;
    }
}elseif (strlen($row['keterangan_waktu_jadwal']) == 1) {
  if($row['keterangan_waktu_jadwal'] == "1"){
    $time = "Shift Pagi";
  }else{
    $time = "Shift Siang";
  }
}else{
    $time = "Libur";
}
if($row['status_data_jadwal'] != 'libur'){
  $title = "Masuk";
}else{
  $title = "Libur";
}
if($row['keterangan_lain_jadwal'] == 'bawen'){
  $keterangan_lain = "Pool Bawen";
}elseif ($row['keterangan_lain_jadwal'] == 'tawang') {
  $keterangan_lain = "Pool Tawang";
}elseif ($row['keterangan_lain_jadwal'] == 'ksatrian') {
  $keterangan_lain = "Shelter Ksatrian";
}elseif ($row['keterangan_lain_jadwal'] == 'sukun'){
  $keterangan_lain = "Shelter Sukun 2";
}else{
  $keterangan_lain = "-";
}
$data[] = array(
  'id'   => $row["id_jadwal"],
  'name' => $nama_lengkap,
  'code' => $kode_pengguna,
  'title' => $title,
  'date' => tgl_indo($row["tanggal_jadwal"]),
  'time' => $time,
  'photos' => $foto_pengguna,
  'position' => $jabatan,
  'etc' => $keterangan_lain,
  'className' => $className
 );
}

echo json_encode($data);

?>