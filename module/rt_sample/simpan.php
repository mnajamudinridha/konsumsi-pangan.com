<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jumlahorang = $_POST['jumlahorang'];
    $lokasi = $_POST['lokasi'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT kode
                             FROM rt_sample
                             WHERE kode='$kode'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        echo 'Kode Sudah Ada';
    } else {
        mysqli_query($con, "INSERT INTO rt_sample
                  (kode,nama,alamat,jumlahorang,lokasi)
                  VALUES
                  ('$kode','$nama','$alamat','$jumlahorang','$lokasi')");

        header('location:../../index.php?menu=rt_sample');
    }
}
