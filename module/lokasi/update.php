<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $kode = $_POST['kode'];
    $wilayah = $_POST['wilayah'];
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
        mysqli_query($con, "UPDATE lokasi
                        SET desa='$desa',
                            wilayah='$wilayah',
                            argeokologi='$argeokologi',
                            ekonomi='$ekonomi'
                        WHERE kode='$kode'");
        header('location:../../index.php?menu=lokasi&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
