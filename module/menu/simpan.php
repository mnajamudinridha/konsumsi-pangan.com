<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $link = $_POST['link'];
    $level = $_POST['level'];
    $sub = $_POST['sub'];
    $jenis = $_POST['jenis'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT nama
                             FROM menu
                             WHERE nama='$nama'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        echo 'Nama Sudah Ada';
    } else {
        mysqli_query($con, "INSERT INTO menu
                  (nama,link,level,sub,jenis)
                  VALUES
                  ('$nama','$link','$level','$sub','$jenis')");

        header('location:../../index.php?menu=menu');
    }
}
