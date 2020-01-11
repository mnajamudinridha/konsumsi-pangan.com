<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $fasilitas = $_POST['fasilitas'];
    $kategori = $_POST['kategori'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT kode
                             FROM kamar
                             WHERE kode='$kode'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        $lokasi_file = $_FILES['gambar']['tmp_name'];
        $nama_file = $_FILES['gambar']['name'];
        $tipe_file = $_FILES['gambar']['type'];
        $ukuran_file = $_FILES['gambar']['size'];
        $acak = rand(1, 99);
        $gambar = seoGambar($acak.$nama_file);
        if (!empty($lokasi_file)) {
            UploadGambar('gambar', 'thumb_', 400, '../../file/image/', $gambar);
            mysqli_query($con, "UPDATE kamar
                                SET nama='$nama',
                                    kategori='$kategori',
                                    harga='$harga',
                                    fasilitas='$fasilitas',
                                    gambar='$gambar'
                                WHERE kode='$kode'");
        } else {
            var_dump(mysqli_query($con, "UPDATE kamar
                        SET nama='$nama',
                            kategori='$kategori',
                            fasilitas='$fasilitas',
                            harga='$harga'
                        WHERE kode='$kode'"));
        }
        header('location:../../index.php?menu=kamar&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
