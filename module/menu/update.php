<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $link = $_POST['link'];
    $level = $_POST['level'];
    $sub = $_POST['sub'];
    $jenis = $_POST['jenis'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT id
                             FROM menu
                             WHERE id='$id'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        mysqli_query($con, "UPDATE menu
                        SET nama='$nama',
                            link='$link',
                            level='$level',
                            sub='$sub',
                            jenis='$jenis'
                        WHERE id='$id'");
        header('location:../../index.php?menu=menu&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
