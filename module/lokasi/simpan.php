<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $kode = $_POST['kode'];
    $desa = $_POST['desa'];
    $argeokologi = $_POST['argeokologi'];
    $ekonomi = $_POST['ekonomi'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT kode
                             FROM lokasi
                             WHERE kode='$kode'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        echo 'Kode Sudah Ada';
    } else {
        mysqli_query($con, "INSERT INTO lokasi
                  (kode,desa,argeokologi,ekonomi)
                  VALUES
                  ('$kode','$desa','$argeokologi','$ekonomi')");

        header('location:../../index.php?menu=lokasi');
    }
}
