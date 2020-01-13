<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $sample = $_POST['sample'];
    $dkbm = $_POST['dkbm'];
    $energi = $_POST['energi'];
    $protein = $_POST['protein'];
    $tanggal = $_POST['tanggal'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT id
                             FROM konsumsi
                             WHERE id='$id'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        mysqli_query($con, "UPDATE konsumsi
                        SET sample='$sample',
                            dkbm='$dkbm',
                            energi='$energi',
                            protein='$protein',
                            tanggal='$tanggal'
                        WHERE id='$id'");
        header('location:../../index.php?menu=konsumsi&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
