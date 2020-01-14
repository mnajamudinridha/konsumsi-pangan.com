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
    } elseif ($menu == 'tingkatkecukupan') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/tingkatkecukupan.php';
        echo '</div>';
        echo '</div>';
    } elseif ($menu == 'kontribusienergi') {
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        include 'umum/kontribusienergi.php';
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
    } elseif ($menu == 'wilayah') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/wilayah/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/wilayah/edit.php';
        } else {
            include 'module/wilayah/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'lokasi') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/lokasi/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/lokasi/edit.php';
        } else {
            include 'module/lokasi/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'rt_sample') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/rt_sample/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/rt_sample/edit.php';
        } else {
            include 'module/rt_sample/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'konsumsi') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/konsumsi/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/konsumsi/edit.php';
        } else {
            include 'module/konsumsi/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'dkbm') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/dkbm/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/dkbm/edit.php';
        } else {
            include 'module/dkbm/tampil.php';
        }
        echo '</div>';
    } elseif ($menu == 'jenispangan') {
        echo '<div class="panel panel-primary">';
        if ($aksi == 'tambah') {
            include 'module/jenispangan/tambah.php';
        } elseif ($aksi == 'edit') {
            include 'module/jenispangan/edit.php';
        } else {
            include 'module/jenispangan/tampil.php';
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
