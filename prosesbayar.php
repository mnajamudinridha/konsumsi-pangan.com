<?php
session_start();
date_default_timezone_set('Asia/Makassar');
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
include 'fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $user = $_POST['user'];
    $tanggal = $_POST['tanggal'];
    $norek = $_POST['norek'];
    $norektujuan = $_POST['norektujuan'];
    $nominal = $_POST['nominal'];

    $cek = mysqli_query($con, 'SELECT transaksi.* FROM transaksi LEFT JOIN kamar ON transaksi.kamar = kamar.kode WHERE user="'.$user.'"');
    $kode = date('Ymdhms');
    while($var = mysqli_fetch_array($cek)){
      $lokasi_file = $_FILES['gambar']['tmp_name'];
      $nama_file = $_FILES['gambar']['name'];
      $tipe_file = $_FILES['gambar']['type'];
      $ukuran_file = $_FILES['gambar']['size'];
      $acak = rand(1, 99);
      $gambar = seoGambar($acak.$nama_file);
      if (!empty($lokasi_file)) {
          UploadGambar('gambar', 'thumb_', 400, 'file/image/', $gambar);
          mysqli_query($con, "INSERT INTO pembayaran (id,sewa,norek,norektujuan,nominal,tanggal,status,gambar) VALUES ('$kode','$var[id]','$norek','$norektujuan','$nominal','$tanggal','N','$gambar')");
      } else {
          mysqli_query($con, "INSERT INTO pembayaran (id,sewa,norek,norektujuan,nominal,tanggal,status) VALUES ('$kode','$var[id]','$norek','$norektujuan','$nominal','$tanggal','N')");
      }
    }
    header('location:index.php?menu=konfirmasi&pesan=sukseskonfirmasi');
}
