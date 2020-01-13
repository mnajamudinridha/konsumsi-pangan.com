<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $sample = $_POST['sample'];
    $dkbm = $_POST['dkbm'];
    $energi = $_POST['energi'];
    $protein = $_POST['protein'];
    $tanggal = $_POST['tanggal'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    mysqli_query($con, "INSERT INTO konsumsi
                (sample,dkbm,energi,protein,tanggal)
                VALUES
                ('$sample','$dkbm','$energi','$protein','$tanggal')");
    header('location:../../index.php?menu=konsumsi');
}
