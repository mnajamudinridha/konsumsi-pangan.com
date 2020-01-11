<?php

$menu = null;
$aksi = null;
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    if (isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];
    }
    if ($menu == 'page') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="panel panel-primary">';
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM halaman WHERE id='$id'");
        $a = mysqli_fetch_array($query);
        echo '<div class="panel-heading">
                <h3 class="panel-title">
                '.$a['judul'].'
                </h3>
            </div>
            <div class="panel-body" style="font-size:18px">';
        echo htmlspecialchars_decode($a['isi']);
        echo '</div>';
        $dibaca = $a['dibaca'] + 1;
        $querysimpan = mysqli_query($con, "UPDATE halaman SET dibaca = $dibaca WHERE id=$id");
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    /* ********************************************
    * MODUL LOGIN
    *********************************************** */
    elseif ($menu == 'login') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="panel panel-primary">';
        include 'module/login/admin.php';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    /* ********************************************
    * MODUL LOGIN
    *********************************************** */
    elseif ($menu == 'gantidata') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="panel panel-primary">';
        include 'module/profil/edit.php';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'register') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="panel panel-primary">';
        include 'module/profil/tambah.php';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'detailkamar') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/detailkamar.php';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'sewakamar') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/detailkamarbeli.php';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'detailkateg') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/detailkateg.php';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'detailsemuakamar') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/detailsemuakamar.php';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'checkout') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/checkout.php';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'konfirmasi') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/konfirmasi.php';
        echo '</div>';
        echo '</div>';
    }
    /* ********************************************
    * MODUL Mahasiswa
    *********************************************** */
    elseif ($menu == 'admin') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/admin/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/admin/edit.php';
        } else {
            include 'module/admin/tampil.php';
        }
        echo '</div>';
    }elseif ($menu == 'user') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/user/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/user/edit.php';
        } else {
            include 'module/user/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'kamar') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/kamar/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/kamar/edit.php';
        } else {
            include 'module/kamar/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'kategori') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/kategori/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/kategori/edit.php';
        } else {
            include 'module/kategori/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'laporan') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/laporan/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/laporan/edit.php';
        } else {
            include 'module/laporan/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'transaksi') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'lihat') {
            include 'module/transaksi/lihat.php';
        } else {
            include 'module/transaksi/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'pembayaran') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'lihat') {
            include 'module/pembayaran/lihat.php';
        } elseif ($aksi == 'bayar') {
            include 'module/pembayaran/bayar.php';
        } elseif ($aksi == 'kembali') {
            include 'module/pembayaran/kembali.php';
        } else {
            include 'module/pembayaran/tampil.php';
        }
        echo '</div>';
    }  elseif ($menu == 'pengembalian') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'lihat') {
            include 'module/pengembalian/lihat.php';
        } elseif ($aksi == 'bayar') {
            include 'module/pengembalian/bayar.php';
        } elseif ($aksi == 'kembali') {
            include 'module/pengembalian/kembali.php';
        } else {
            include 'module/pengembalian/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'halaman') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/halaman/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/halaman/edit.php';
        } else {
            include 'module/halaman/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'menu') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/menu/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/menu/edit.php';
        } else {
            include 'module/menu/tampil.php';
        }
        echo '</div>';
    } elseif($menu =='gagalbeli'){
      echo '<div class="row">';
      echo '<div class="col-md-12">';
      echo '<div class="panel panel-primary">';
      echo '<div class="panel-heading">
          <h3 class="panel-title">
          Gagal Melakukan Resevasi Kamar
          </h3>
      </div>
      <div class="panel-body">';
      echo '<h1>Gagal Melakukan Resevasi Kamar, Kamar Tidak Tersedia</h1>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }else {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="panel panel-primary">';
        echo '<div class="panel-heading">
            <h3 class="panel-title">
            Menu Tidak Ditemukan
            </h3>
        </div>
        <div class="panel-body">';
        echo '<h1>Ini Tidak Ditemukan</h1>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<div class="panel panel-primary">';
    $id = 1;
    $query = mysqli_query($con, "SELECT * FROM halaman WHERE id='$id'");
    $a = mysqli_fetch_array($query);
    echo '<div class="panel-heading">
              <h3 class="panel-title">
              '.$a['judul'].'
              </h3>
          </div>
          <div class="panel-body" style="font-size:18px">';
    echo htmlspecialchars_decode($a['isi']);
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
