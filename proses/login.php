<?php
session_start();
include "../connection/config.php";
$username = $_POST['nama_lengkap_pengguna'];
$password = $_POST['kode_pengguna'];
$jabatan_pengguna = $_POST['jabatan_pengguna'];
// query untuk mendapatkan record dari username
$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama_lengkap_pengguna= '$username' and kode_pengguna='$password' and jabatan_pengguna='$jabatan_pengguna'");
$user = mysqli_fetch_assoc($data);
$cek = mysqli_num_rows($data);
$id_pengguna = $user['id_pengguna'];
if($cek  > 0) {
    $_SESSION['nama_lengkap_pengguna']= $username;
    $_SESSION['kode_pengguna']= $user['kode_pengguna'];
    $_SESSION['foto_pengguna']= $user['foto_pengguna'];
    $_SESSION['tempat_lahir_pengguna'] = $user['tempat_lahir_pengguna'];
    $_SESSION['tanggal_lahir_pengguna'] = $user['tanggal_lahir_pengguna'];
    $_SESSION['jabatan_pengguna']= $user['jabatan_pengguna'];
    $_SESSION['status_pengguna']= $user['status_pengguna'];
    $_SESSION['status_jadwal_pengguna']= $user['status_jadwal_pengguna'];
    $_SESSION['id_pengguna']= $id_pengguna;

    $response['error'] = $user['kode_pengguna'];
    $response['error_id'] = $_SESSION['id_pengguna'];
    $response['error_cek'] = $cek;
    $response['error_akses'] = $user['status_pengguna'];

    if($_SESSION['status_pengguna'] == "korlay"){
        header("Location:../dashboard.php?data=home");
    } else if ($_SESSION['status_pengguna'] == "admin"){
        header("Location:../dashboard.php?data=home");
    }else{
        header("Location:../dashboard.php?data=home&menu=home");
    }
    echo json_encode($response);
}else{
    echo '<script>
        alert("Gagal login, Data yang anda masukan salah!");
        window.location = "../index.php"
        </script>';
    }
?>