<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
include '../../fungsi/gambar.php';
if (isset($_POST['kirim'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $noktp = $_POST['noktp'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];

    $cari = @$_GET['cari'];
    $halaman = @$_GET['halaman'];
    $query = mysqli_query($con, "SELECT username
                             FROM admin
                             WHERE username='$username'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        if (!empty($password)) {
            mysqli_query($con, "UPDATE admin
                        SET password='".password_hash($password, PASSWORD_BCRYPT)."',
                            nama='$nama',
                            nohp='$nohp',
                            noktp='$noktp',
                            alamat='$alamat',
                            level='$level'
                        WHERE username='$username'");
        } else {
            mysqli_query($con, "UPDATE admin
                        SET nama='$nama',
                            nohp='$nohp',
                            noktp='$noktp',
                            alamat='$alamat',
                            level='$level'
                        WHERE username='$username'");
        }
        header('location:../../index.php?menu=user&halaman='.$halaman.'&cari='.$cari);
    } else {
        echo 'Kode yang Di Update Tidak Ada';
    }
}
