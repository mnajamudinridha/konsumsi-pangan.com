<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $halaman = $_GET['halaman'];
    $cari = $_GET['cari'];
    $s1 = mysqli_query($con, 'SELECT pembayaran.*, transaksi.kamar FROM pembayaran, transaksi WHERE pembayaran.sewa = transaksi.id AND pembayaran.id="'.$id.'"');
    $query = mysqli_query($con, 'UPDATE pembayaran SET kembali = "Y" WHERE id="'.$id.'"');
    while ($sub = mysqli_fetch_array($s1)) {
      $query = mysqli_query($con, 'UPDATE kamar SET status = "Y" WHERE kode="'.$sub['kamar'].'"');
    }
    $query1 = mysqli_query($con, "INSERT INTO pengembalian (pembelian, tanggal) VALUES ('$id','".date('Y-m-d')."')");
    echo "INSERT INTO pengembalian (pembelian, tanggal) VALUES ('$id','".date('Y-m-d')."')";
    header('location:../../index.php?menu=pembayaran&pesan=sukseskembali&halaman='.$halaman.'&cari='.$cari.'');
}else{
  header('location:../../index.php?menu=pembayaran&pesan=gagal&halaman='.$halaman.'&cari='.$cari.'');
}
