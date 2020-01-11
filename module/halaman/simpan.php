<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT judul
                             FROM halaman
                             WHERE judul='$judul'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        echo 'Judul Sudah Ada';
    } else {
        mysqli_query($con, "INSERT INTO halaman
                    (judul,isi,dibaca,tanggal)
                    VALUES
                    ('$judul','$isi',1,NOW())");
        header('location:../../index.php?menu=halaman');
    }
}
