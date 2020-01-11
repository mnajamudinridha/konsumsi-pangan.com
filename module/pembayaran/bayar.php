<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $halaman = $_GET['halaman'];
    $cari = $_GET['cari'];
    $query = mysqli_query($con, 'UPDATE pembayaran SET status = "Y" WHERE id="'.$id.'"');
    $cek = mysqli_query($con, 'SELECT * FROM pembayaran WHERE id="'.$id.'"');
    while($a = mysqli_fetch_array($cek)){
      $sub = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM transaksi WHERE id="'.$a['sewa'].'"'));
      mysqli_query($con, 'UPDATE kamar SET status = "Y" WHERE kode="'.$sub['kamar'].'"');
    }
    header('location:../../index.php?menu=pembayaran&pesan=suksesbayar&halaman='.$halaman.'&cari='.$cari.'');
}else{
  header('location:../../index.php?menu=pembayaran&pesan=gagal&halaman='.$halaman.'&cari='.$cari.'');
}
