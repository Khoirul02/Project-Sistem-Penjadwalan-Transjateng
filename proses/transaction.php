<?php
$action = $_GET['action'];
if(isset($_GET['stj'])){
$stj = $_GET['stj'];
}
if($action == 'add') {
    if ($stj !='libur') {
        // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
        $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
        $id_pengguna = $_POST['id_pengguna'];
        $query_jabatan = mysqli_query($connect, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
        $data = mysqli_fetch_array($query_jabatan);
        $jabatan = $data['jabatan_pengguna'];
        $id_jadwal = $_POST['id_jadwal'];
        $tanggal_jadwal = $_POST['tanggal_jadwal'];
        $status_data_jadwal = $stj; 
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
        $status_jadwal = "procces";
        $alasan_transaksi = $_POST['alasan_transaksi'];
        $sql = "INSERT INTO jadwal(id_pengguna,tanggal_jadwal,status_data_jadwal,status_jadwal,keterangan_lain_jadwal,keterangan_waktu_jadwal,keterangan_lambung_jadwal)VALUE('$id_pengguna','$tanggal_jadwal','$status_data_jadwal','$status_jadwal','$keterangan_tempat_jadwal','$keterangan_waktu_jadwal','$keterangan_lambung_jadwal')";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            $id = mysqli_insert_id($connect);
            $tanggal_transaksi = date('Y-m-d');
            $status_transaksi = "procces";
            $sql_transaksi = "INSERT INTO transaksi (id_pengguna, id_jadwal_asli, id_jadwal_tukar, status_jadwal_transaksi ,alasan_transaksi,tanggal_transaksi,status_transaksi)VALUE('$id_pengguna','$id_jadwal','$id','$status_data_jadwal','$alasan_transaksi','$tanggal_transaksi','$status_transaksi')";
                $simpan_transaksi = mysqli_query($connect, $sql_transaksi);
                if ($simpan_transaksi == true) {
                    header('location: ../form-transaction.php?data=transaction&action=add&status=succes&stj='.$stj.'');
                }else{
                    header('location: ../form-transaction.php?data=transaction&action=add&status=warning&stj='.$stj.'');
                }
            } else {
                header('location: ../form-transaction.php?data=transaction&action=add&status=failed&stj='.$stj.'');
        }
    }else{
        // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
        $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
        $id_pengguna = $_POST['id_pengguna'];
        $id_jadwal = $_POST['id_jadwal'];
        $tanggal_jadwal = $_POST['tanggal_jadwal'];
        $query_jadwal = mysqli_query($connect, "SELECT * FROM jadwal WHERE id_pengguna='$id_pengguna' AND tanggal_jadwal='$tanggal_jadwal'");
        $data_transaksi = mysqli_fetch_array($query_jadwal);
        $id_jadwal_tukar = $data_transaksi['id_jadwal'];    
        $status_data_jadwal = $stj;
        $alasan_transaksi = $_POST['alasan_transaksi'];
        $tanggal_transaksi = date('Y-m-d');
        $status_transaksi = "procces";
        $sql_transaksi = "INSERT INTO transaksi (id_pengguna, id_jadwal_asli, id_jadwal_tukar, status_jadwal_transaksi ,alasan_transaksi,tanggal_transaksi,status_transaksi)VALUE('$id_pengguna','$id_jadwal','$id_jadwal_tukar','$status_data_jadwal','$alasan_transaksi','$tanggal_transaksi','$status_transaksi')";
        $simpan_transaksi = mysqli_query($connect, $sql_transaksi);
        if ($simpan_transaksi == true) {
            header('location: ../form-transaction.php?data=transaction&action=add&status=succes&stj='.$stj.'');
        }else{
            header('location: ../form-transaction.php?data=transaction&action=add&status=failed&stj='.$stj.'');
        }
    }
}
if($action == 'approve'){
    if ($stj !='libur') {
        // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
        $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
        $id = $_GET['id'];
        $query_jadwal = mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
        $data_transaksi = mysqli_fetch_array($query_jadwal);
        $id_jadwal_asli = $data_transaksi['id_jadwal_asli'];
        $id_jadwal_tukar = $data_transaksi['id_jadwal_tukar'];
        $sql = "UPDATE jadwal SET status_jadwal='approve' WHERE id_jadwal='$id_jadwal_tukar'";
        $simpan = mysqli_query($connect, $sql);
        if($simpan == true){
            $sql_2 = "UPDATE jadwal SET status_jadwal='noapprove' WHERE id_jadwal='$id_jadwal_asli'";
            $simpan_2 = mysqli_query($connect, $sql_2);
            if($simpan_2 == true){
                $sql_3 = "UPDATE transaksi SET status_transaksi='approve' WHERE id_transaksi='$id'";
                $simpan_3 = mysqli_query($connect, $sql_3);
                if($simpan_3 == true){
                    header('location: ../list-transaction.php?data=transaction&notifikasi=succes&stj='.$stj.'');
                }else{
                    header('location: ../list-transaction.php?data=transaction&notifikasi=warning&stj='.$stj.'');    
                }
            }else{
                header('location: ../list-transaction.php?data=transaction&notifikasi=warning&stj='.$stj.'');    
            }
        }else{
            header('location: ../list-transaction.php?data=transaction&notifikasi=failed&stj='.$stj.'');    
        }
    }else{
        // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
        $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
        $id_transaksi = $_GET['id'];
        $query_jadwal = mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
        $data_transaksi = mysqli_fetch_array($query_jadwal);
        $id_jadwal_asli = $data_transaksi['id_jadwal_asli'];
        $id_jadwal_tukar = $data_transaksi['id_jadwal_tukar'];
        $sql = "UPDATE transaksi SET status_transaksi='approve' WHERE id_transaksi='$id_transaksi'";
        $status_jadwal = "approve";
        $simpan = mysqli_query($connect, $sql);
        if($simpan == true){
            $query_jadwal_tukar = mysqli_query($connect, "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal_tukar'");
            $data_jadwal = mysqli_fetch_array($query_jadwal_tukar);
            $status_data_jadwal = $data_jadwal['status_data_jadwal'];
            $keterangan_lain_jadwal = $data_jadwal['keterangan_lain_jadwal'];
            $keterangan_waktu_jadwal = $data_jadwal['keterangan_waktu_jadwal'];
            $keterangan_lambung_jadwal = $data_jadwal['keterangan_lambung_jadwal'];
            $sql_2 = "UPDATE jadwal SET status_data_jadwal='$status_data_jadwal', keterangan_lain_jadwal='$keterangan_lain_jadwal',keterangan_waktu_jadwal='$keterangan_waktu_jadwal',keterangan_lambung_jadwal='$keterangan_lambung_jadwal',status_jadwal='$status_jadwal' WHERE id_jadwal='$id_jadwal_asli'";
            $simpan_2 = mysqli_query($connect, $sql_2);
            if($simpan_2 == true){
                $sql_3 = "UPDATE jadwal SET status_data_jadwal='$stj',keterangan_lain_jadwal=null,keterangan_waktu_jadwal=null,keterangan_lambung_jadwal=null,status_jadwal='$status_jadwal' WHERE id_jadwal='$id_jadwal_tukar'";
                $simpan_3 = mysqli_query($connect, $sql_3);
                if($simpan_3 == true){
                    header('location: ../list-transaction.php?data=transaction&notifikasi=succes&stj='.$stj.'');
                }else{
                    header('location: ../list-transaction.php?data=transaction&notifikasi=warning&stj='.$stj.'');    
                }
            }else{
                header('location: ../list-transaction.php?data=transaction&notifikasi=warning&stj='.$stj.'');    
                }
        }else{
            header('location: ../list-transaction.php?data=transaction&notifikasi=failed&stj='.$stj.'');
        }
    }
}
if($action == 'noapprove'){
    if ($stj !='libur') {
        // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
        $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
        $id = $_GET['id'];
        $query_jadwal = mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
        $data_transaksi = mysqli_fetch_array($query_jadwal);
        $id_jadwal_asli = $data_transaksi['id_jadwal_asli'];
        $id_jadwal_tukar = $data_transaksi['id_jadwal_tukar'];
        $sql = "UPDATE jadwal SET status_jadwal='noapprove' WHERE id_jadwal='$id_jadwal_tukar'";
        $simpan = mysqli_query($connect, $sql);
        if($simpan == true){
            $sql_2 = "UPDATE jadwal SET status_jadwal='approve' WHERE id_jadwal='$id_jadwal_asli'";
            $simpan_2 = mysqli_query($connect, $sql_2);
            if($simpan_2 == true){
                $sql_3 = "UPDATE transaksi SET status_transaksi='noapprove' WHERE id_transaksi='$id'";
                $simpan_3 = mysqli_query($connect, $sql_3);
                if($simpan_3 == true){
                    header('location: ../list-transaction.php?data=transaction&notifikasi=succes&stj='.$stj.'');
                }else{
                    header('location: ../list-transaction.php?data=transaction&notifikasi=warning&stj='.$stj.'');    
                }
            }else{
                header('location: ../list-transaction.php?data=transaction&notifikasi=warning&stj='.$stj.'');    
            }
        }else{
            header('location: ../list-transaction.php?data=transaction&notifikasi=failed&stj='.$stj.'');    
        }
    }else{
        // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
        $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
        $id = $_GET['id'];
        $sql = "UPDATE transaksi SET status_transaksi='noapprove' WHERE id_transaksi='$id'";
        $simpan = mysqli_query($connect, $sql);
        if ($simpan == true) {
            header('location: ../list-transaction.php?data=transaction&notifikasi=succes&stj='.$stj.'');
        }else{
            header('location: ../list-transaction.php?data=transaction&notifikasi=failed&stj='.$stj.'');
        }
    }
}
if($action == 'delete'){
    // $connect = mysqli_connect("localhost", "root", "", "penjadwalan_transjateng") or die(mysqli_error());
    $connect = mysqli_connect("localhost", "galerisa_transjatenguser", "A+gxT!]eDMq4", "galerisa_transjateng") or die(mysqli_error());
    $id = $_GET['id'];
    $sql = "DELETE FROM transaksi WHERE id_transaksi='$id'";
    $simpan = mysqli_query($connect, $sql);
    if($simpan == true){
        header('location: ../list-transaction.php?data=transaction-2&notifikasi=succes');
    }else{
        header('location: ../list-transaction.php?data=transaction-2&notifikasi=failed');
    }
}
if($action == 'search'){
    $kode_pengguna = $_POST['kode_pengguna'];
    header('location: ../list-transaction.php?data=transaction&kode_pengguna='.$kode_pengguna.'&stj='.$stj.'');
}