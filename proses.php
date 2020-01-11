<?php
session_start();
date_default_timezone_set('Asia/Makassar');
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
include 'fungsi/gambar.php';
if (isset($_POST['sewakamar'])) {
    $jumlah = $_POST['jumlah'];
    $tanggal = date('Y-m-d');
    $cekin = $_POST['checkin'];
    $cekout = $_POST['checkout'];

    $id = $_POST['idkamar'];
    $harga = $_POST['hargakamar'];
    $user = @$_SESSION['username'];
    $total = $harga * $jumlah;
    $cek = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM kamar WHERE kode = '$id'"));
    if ($cek['status'] == "Y") {
        mysqli_query($con, "UPDATE kamar SET status = 'N' WHERE kode = '$id'");
        mysqli_query($con, 'INSERT INTO transaksi (user, kamar, tanggal, cekin, cekout, lama, total)
                          VALUES ("'.$user.'","'.$id.'","'.$tanggal.'","'.$cekin.'","'.$cekout.'","'.$jumlah.'","'.$total.'")');
        header('location:index.php?menu=konfirmasi');
    } else {
        header('location:index.php?menu=gagalsewa');
    }
}
