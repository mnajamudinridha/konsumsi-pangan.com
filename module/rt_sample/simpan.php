<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jumlahorang = $_POST['jumlahorang'];
    $lokasi = $_POST['lokasi'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
        mysqli_query($con, "INSERT INTO rt_sample
                  (nama,alamat,jumlahorang,lokasi)
                  VALUES
                  ('$nama','$alamat','$jumlahorang','$lokasi')");
        header('location:../../index.php?menu=rt_sample');
}
