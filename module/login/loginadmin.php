<?php
session_start();
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
if (isset($_POST['kirim'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username'");
    $jumlah = mysqli_num_rows($query);
    if ($jumlah < 1) {
        header('location:../../index.php?menu=login&pesan=error&salah=username');
    } else {
        $var = mysqli_fetch_array($query);
        //cek password sama
        if (password_verify($password, $var['password'])) {
            //sukses
            $_SESSION['login'] = $var['level'];
            $_SESSION['username'] = $var['username'];
            $_SESSION['nama'] = $var['nama'];
            $_SESSION['email'] = $var['email'];
            header('location:../../index.php?pesan=sukses');
        } else {
            header('location:../../index.php?menu=login&pesan=error&salah=password');
        }
    }
} else {
    header('location:../../index.php');
}
