<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $tahun = $_POST['tahun'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $penanggungjawab = $_POST['penanggungjawab'];
    $jumlahpenduduk = $_POST['jumlahpenduduk'];
    $lajupertumbuhan = $_POST['lajupertumbuhan'];
    $besarkeluarga = $_POST['besarkeluarga'];
    $umr = $_POST['umr'];
    $ake_konsumsi = $_POST['ake_konsumsi'];
    $akp_konsumsi = $_POST['akp_konsumsi'];
    $ake_ketersediaan = $_POST['ake_ketersediaan'];
    $akp_ketersediaan = $_POST['akp_ketersediaan'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $coba = mysqli_query($con, "INSERT INTO wilayah
                (tahun,kode,nama,penanggungjawab,jumlahpenduduk,
                lajupertumbuhan,besarkeluarga,umr,ake_konsumsi,
                akp_konsumsi,ake_ketersediaan,akp_ketersediaan)
                VALUES
                ('$tahun','$kode',$nama,'$penanggungjawab','$jumlahpenduduk',
                '$lajupertumbuhan','$besarkeluarga','$umr','$ake_konsumsi',
                '$akp_konsumsi','$ake_ketersediaan','$akp_ketersediaan')");
    header('location:../../index.php?menu=wilayah');
}
