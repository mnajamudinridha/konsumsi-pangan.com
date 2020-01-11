<?php
  include '../../vendor/autoload.php';
  include '../../fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $cari = @$_GET['cari'];
      $halaman = @$_GET['halaman'];
      $query = mysqli_query($con, "SELECT id
                               FROM halaman
                               WHERE id='$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          mysqli_query($con, "DELETE FROM halaman
                          WHERE id='$id'");
          header('location:../../index.php?menu=halaman&halaman='.$halaman.'&cari='.$cari);
      } else {
          echo 'Maaf, Id tidak ditemukan';
      }
  }
