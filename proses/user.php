<?php
$action = $_GET['action'];
if(isset($_GET['sp'])){
    $sp = $_GET['sp'];
}
if($action == 'add') {
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $kode_pengguna = $_POST['kode_pengguna'];
    $nama_lengkap_pengguna = $_POST['nama_lengkap_pengguna'];
    $tempat_lahir_pengguna = $_POST['tempat_lahir_pengguna'];
    $tanggal_lahir_pengguna = $_POST['tanggal_lahir_pengguna'];
    $jabatan_pengguna = $_POST['jabatan_pengguna'];
    if($jabatan_pengguna == 'admin'){
        $status_pengguna = "admin";
        $status_jadwal_pengguna = "approve";
    }elseif ($jabatan_pengguna == 'korlay') {
        $status_pengguna = "korlay";
        $status_jadwal_pengguna = "approve";
    }else{
        $status_pengguna = "karyawan";
        $status_jadwal_pengguna = "procces";
    }
    $foto_pengguna = $_FILES['foto_pengguna']['name'];
    $tanggal_pembaruan_data_pengguna = date('Y-m-d');
    if ($foto_pengguna != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $foto_pengguna); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_pengguna']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto_pengguna; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $sql = "INSERT INTO pengguna(kode_pengguna,nama_lengkap_pengguna,tempat_lahir_pengguna,tanggal_lahir_pengguna,jabatan_pengguna, status_pengguna ,foto_pengguna,status_jadwal_pengguna,tanggal_pembaruan_data_pengguna)VALUE('$kode_pengguna','$nama_lengkap_pengguna','$tempat_lahir_pengguna','$tanggal_lahir_pengguna','$jabatan_pengguna','$status_pengguna','$nama_gambar_baru','$status_jadwal_pengguna','$tanggal_pembaruan_data_pengguna')";
            $simpan = mysqli_query($connect, $sql);
            // periska query apakah ada error
            if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                header('location: ../form-user.php?data=user&action=add&status=succes&sp='.$sp.'');
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            header('location: ../form-user.php?data=user&action=add&status=warning&sp='.$sp.'');
        }
    } else {
        $sql = "INSERT INTO pengguna(kode_pengguna,nama_lengkap_pengguna,tempat_lahir_pengguna,tanggal_lahir_pengguna,jabatan_pengguna, status_pengguna ,foto_pengguna)VALUE('$kode_pengguna','$nama_lengkap_pengguna','$tempat_lahir_pengguna','$tanggal_lahir_pengguna','$jabatan_pengguna','$status_pengguna',null)";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            header('location: ../form-user.php?data=user&action=add&status=two-succes&sp='.$sp.'');
        } else {
            header('location: ../form-user.php?data=user&action=add&status=failed&sp='.$sp.'');
        }
    }
}
if($action == 'edit'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id_pengguna = $_POST['id_pengguna']; 
    $kode_pengguna = $_POST['kode_pengguna'];
    $nama_lengkap_pengguna = $_POST['nama_lengkap_pengguna'];
    $tempat_lahir_pengguna = $_POST['tempat_lahir_pengguna'];
    $tanggal_lahir_pengguna = $_POST['tanggal_lahir_pengguna'];
    $foto_pengguna = $_FILES['foto_pengguna']['name'];
    $tanggal_pembaruan_data_pengguna = date('Y-m-d');
    if ($foto_pengguna != "") { 
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $foto_pengguna); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_pengguna']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto_pengguna; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $sql = "UPDATE pengguna SET kode_pengguna='$kode_pengguna', nama_lengkap_pengguna='$nama_lengkap_pengguna',tempat_lahir_pengguna='$tempat_lahir_pengguna',tanggal_lahir_pengguna='$tanggal_lahir_pengguna',foto_pengguna='$nama_gambar_baru', tanggal_pembaruan_data_pengguna='$tanggal_pembaruan_data_pengguna' WHERE id_pengguna='$id_pengguna'";
            $simpan = mysqli_query($connect, $sql);
            // periska query apakah ada error
            if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                header('location: ../form-user.php?data=user&action=add&status=succes&sp='.$sp.'');
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
             header('location: ../form-user.php?data=user&action=add&status=warning&sp='.$sp.'');
        }
    } else {
        $sql = "UPDATE pengguna SET kode_pengguna='$kode_pengguna', nama_lengkap_pengguna='$nama_lengkap_pengguna',tempat_lahir_pengguna='$tempat_lahir_pengguna',tanggal_lahir_pengguna='$tanggal_lahir_pengguna', tanggal_pembaruan_data_pengguna='$tanggal_pembaruan_data_pengguna' WHERE id_pengguna='$id_pengguna'";
        $simpan = mysqli_query($connect, $sql);
        // periska query apakah ada error
        if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
            header('location: ../form-user.php?data=user&action=add&status=two-succes&sp='.$sp.'');
         }
    }
}
if($action == 'editdata'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id_pengguna = $_POST['id_pengguna']; 
    $nama_lengkap_pengguna = $_POST['nama_lengkap_pengguna'];
    $tempat_lahir_pengguna = $_POST['tempat_lahir_pengguna'];
    $tanggal_lahir_pengguna = $_POST['tanggal_lahir_pengguna'];
    $foto_pengguna = $_FILES['foto_pengguna']['name'];
    $tanggal_pembaruan_data_pengguna = date('Y-m-d');
    if ($foto_pengguna != "") { 
        $ekstensi_diperbolehkan = array('png', 'jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $foto_pengguna); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_pengguna']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $foto_pengguna; //menggabungkan angka acak dengan nama file sebenarnya
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../upload/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
            $sql = "UPDATE pengguna SET nama_lengkap_pengguna='$nama_lengkap_pengguna',tempat_lahir_pengguna='$tempat_lahir_pengguna',tanggal_lahir_pengguna='$tanggal_lahir_pengguna',foto_pengguna='$nama_gambar_baru', tanggal_pembaruan_data_pengguna='$tanggal_pembaruan_data_pengguna' WHERE id_pengguna='$id_pengguna'";
            $simpan = mysqli_query($connect, $sql);
            // periska query apakah ada error
            if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                header('location: ../dashboard.php?data=home&menu=user&status=succes');
            }
        } else {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
             header('location: ../dashboard.php?data=home&menu=user&status=warning');
        }
    } else {
        $sql = "UPDATE pengguna SET nama_lengkap_pengguna='$nama_lengkap_pengguna',tempat_lahir_pengguna='$tempat_lahir_pengguna',tanggal_lahir_pengguna='$tanggal_lahir_pengguna', tanggal_pembaruan_data_pengguna='$tanggal_pembaruan_data_pengguna' WHERE id_pengguna='$id_pengguna'";
        $simpan = mysqli_query($connect, $sql);
        // periska query apakah ada error
        if (!$simpan) {
                die ("Query gagal dijalankan: " . mysqli_errno($connect) .
                    " - " . mysqli_error($connect));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
            header('location: ../dashboard.php?data=home&menu=user&status=two-succes');
         }
    }
}
if($action == 'approve'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "UPDATE pengguna SET status_jadwal_pengguna='approve' WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-user.php?data=user&notifikasi=succes');
    }else{
        header('location: ../list-user.php?data=user&notifikasi=failed');    
    }
}
if($action == 'noapprove'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "UPDATE pengguna SET status_jadwal_pengguna='noapprove' WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-user.php?data=user&notifikasi=succes');
    }else{
        header('location: ../list-user.php?data=user&notifikasi=failed');    
    }
}
if($action == 'delete'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM pengguna WHERE id_pengguna='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
       header('location: ../list-user.php?data=user&status=succes&sp='.$sp.'');
    }else{
       header('location: ../list-user.php?data=user&status=failed&sp='.$sp.'');
    }
}

if($action == 'search'){
    $kode_pengguna = $_POST['kode_pengguna'];
    header('location: ../list-user.php?data=user&kode_pengguna='.$kode_pengguna.'');
}