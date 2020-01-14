<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $sample = $_POST['sample'];
    $dkbm = $_POST['dkbm'];
    $berat = $_POST['berat'];
    $tanggal = $_POST['tanggal'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    mysqli_query($con, "INSERT INTO konsumsi
                (sample,dkbm,berat,tanggal)
                VALUES
                ('$sample','$dkbm','$berat','$tanggal')");
    header('location:../../index.php?menu=konsumsi');
}
