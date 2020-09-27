<?php
$action = $_GET['action'];
if ($action == 'add') {
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id_pengguna = $_POST['id_pengguna'];
    $query_jabatan = mysqli_query($connect, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
    $data = mysqli_fetch_array($query_jabatan);
    $jabatan = $data['jabatan_pengguna'];
    $tanggal_jadwal = $_POST['tanggal_jadwal'];
    $status_data_jadwal = $_POST['status_data_jadwal'];
    if($status_data_jadwal != 'libur'){
        if($jabatan == 'kasir' || $jabatan == 'timer'){
            $keterangan_tempat_jadwal = $_POST['keterangan_tempat_jadwal'];
            $keterangan_waktu_jadwal = $_POST['keterangan_waktu_jadwal'];
            $keterangan_lambung_jadwal = "";
        }elseif($jabatan == 'pengawas'){
            $keterangan_tempat_jadwal = $_POST['keterangan_tempat_jadwal_pengawas'];
            $keterangan_waktu_jadwal = $_POST['keterangan_waktu_jadwal_pengawas'];
            $keterangan_lambung_jadwal = "";
        }else{
            $keterangan_waktu_jadwal_pramusaja = $_POST['keterangan_waktu_jadwal_pramusaja'];
            $keterangan_waktu_jadwal_pramusaja_2 = $_POST['keterangan_waktu_jadwal_pramusaja_2'];
            $penghubung = "/";
            $value_waktu = $keterangan_waktu_jadwal_pramusaja.$penghubung.$keterangan_waktu_jadwal_pramusaja_2;
            $keterangan_tempat_jadwal = "";
            $keterangan_waktu_jadwal = $value_waktu;
            $keterangan_lambung_jadwal = $_POST['keterangan_lambung_jadwal'];
        }
    }else{
        $keterangan_tempat_jadwal = ""; 
        $keterangan_waktu_jadwal = "";
        $keterangan_lambung_jadwal = "";
    }
    $status_jadwal = "approve";
    $sql = "INSERT INTO jadwal(id_pengguna,tanggal_jadwal,status_data_jadwal,status_jadwal,keterangan_lain_jadwal,keterangan_waktu_jadwal,keterangan_lambung_jadwal)VALUE('$id_pengguna','$tanggal_jadwal','$status_data_jadwal','$status_jadwal','$keterangan_tempat_jadwal','$keterangan_waktu_jadwal','$keterangan_lambung_jadwal')";
    $simpan = mysqli_query($connect, $sql);

    if ($simpan == true) {
            header('location: ../form-schedule.php?data=schedule&action=add&status=succes');
        } else {
            header('location: ../form-schedule.php?data=schedule&action=add&status=failed');
    }
}
if($action == 'edit'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id_jadwal = $_POST['id_jadwal'];
    $id_pengguna = $_POST['id_pengguna'];
    $query_jabatan = mysqli_query($connect, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
    $data = mysqli_fetch_array($query_jabatan);
    $jabatan = $data['jabatan_pengguna'];
    $tanggal_jadwal = $_POST['tanggal_jadwal'];
    $status_data_jadwal = $_POST['status_data_jadwal'];
    if($status_data_jadwal != 'libur'){
        if($jabatan == 'kasir' || $jabatan == 'timer'){
            $keterangan_tempat_jadwal = $_POST['keterangan_tempat_jadwal'];
            $keterangan_waktu_jadwal = $_POST['keterangan_waktu_jadwal'];
            $keterangan_lambung_jadwal = "";
        }elseif($jabatan == 'pengawas'){
            $keterangan_tempat_jadwal = $_POST['keterangan_tempat_jadwal_pengawas'];
            $keterangan_waktu_jadwal = $_POST['keterangan_waktu_jadwal_pengawas'];
            $keterangan_lambung_jadwal = "";
        }else{
            $keterangan_waktu_jadwal_pramusaja = $_POST['keterangan_waktu_jadwal_pramusaja'];
            $keterangan_waktu_jadwal_pramusaja_2 = $_POST['keterangan_waktu_jadwal_pramusaja_2'];
            $penghubung = "/";
            $value_waktu = $keterangan_waktu_jadwal_pramusaja.$penghubung.$keterangan_waktu_jadwal_pramusaja_2;
            $keterangan_tempat_jadwal = "";
            $keterangan_waktu_jadwal = $value_waktu;
            $keterangan_lambung_jadwal = $_POST['keterangan_lambung_jadwal'];
        }
    }else{
        $keterangan_tempat_jadwal = ""; 
        $keterangan_waktu_jadwal = "";
        $keterangan_lambung_jadwal = "";
    }
    $status_jadwal = "approve";
    $sql = "UPDATE jadwal SET id_pengguna='$id_pengguna', tanggal_jadwal='$tanggal_jadwal', status_data_jadwal='$status_data_jadwal', keterangan_lain_jadwal='$keterangan_tempat_jadwal', keterangan_waktu_jadwal='$keterangan_waktu_jadwal',  keterangan_lambung_jadwal='$keterangan_lambung_jadwal',status_jadwal='$status_jadwal' WHERE id_jadwal ='$id_jadwal'";
    $simpan = mysqli_query($connect, $sql);

    if ($simpan == true) {
            header('location: ../form-schedule.php?data=schedule&action=add&status=succes');
        } else {
            header('location: ../form-schedule.php?data=schedule&action=add&status=failed');
    }
}
if($action == 'delete'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM jadwal WHERE id_jadwal='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-schedule.php?data=schedule&status=succes');
    }else{
        header('location: ../list-schedule.php?data=schedule&status=failed');
    }
}
if($action == 'search'){
    $kode_pengguna = $_POST['kode_pengguna'];
    header('location: ../list-schedule.php?data=schedule&kode_pengguna='.$kode_pengguna.'');
}