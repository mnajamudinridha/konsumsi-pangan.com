<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT kode
                             FROM dkbm
                             WHERE kode='$kode'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        mysqli_query($con, "UPDATE dkbm
                        SET nama='$nama', jenis='$jenis'
                        WHERE kode='$kode'");
        header('location:../../index.php?menu=dkbm&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
