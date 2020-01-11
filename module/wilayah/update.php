<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
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
    $query = mysqli_query($con, "SELECT id
                             FROM wilayah
                             WHERE id='$id'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        mysqli_query($con, "UPDATE wilayah
                        SET tahun='$tahun',
                            kode='$kode',
                            nama='$nama',
                            penanggungjawab='$penanggungjawab',
                            jumlahpenduduk='$jumlahpenduduk',
                            lajupertumbuhan='$lajupertumbuhan',
                            besarkeluarga='$besarkeluarga',
                            umr='$umr',
                            ake_konsumsi='$ake_konsumsi',
                            akp_konsumsi='$akp_konsumsi',
                            ake_ketersediaan='$ake_ketersediaan',
                            akp_ketersediaan='$akp_ketersediaan'
                        WHERE id='$id'");
        header('location:../../index.php?menu=wilayah&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
