<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jumlahorang = $_POST['jumlahorang'];
    $lokasi = $_POST['lokasi'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT id
                             FROM rt_sample
                             WHERE id='$id'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        mysqli_query($con, "UPDATE rt_sample
                        SET     nama='$nama',
                                alamat='$alamat',
                                jumlahorang='$jumlahorang',
                                lokasi='$lokasi'
                        WHERE id='$id'");
        header('location:../../index.php?menu=rt_sample&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
