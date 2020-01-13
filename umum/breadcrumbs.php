<?php

$menu = null;
$aksi = null;
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];

    if (isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];
    }
    if ($menu == 'home') {
        echo '<ol class="breadcrumb">
                <li class="active">Home</li>
        </ol>';
    } elseif ($menu == 'page') {
        include 'vendor/autoload.php';
        include 'fungsi/koneksi.php';
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM halaman WHERE id='$id'");
        $judul = mysqli_fetch_array($query);
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">'.$judul['judul'].'</li>
        </ol>';
    } elseif ($menu == 'login') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Halaman Login</li>
        </ol>';
    } elseif ($menu == 'gantidata') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Ganti Data Profil</li>
        </ol>';
    } elseif ($menu == 'register') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Register</li>
        </ol>';
    } elseif ($menu == 'detailbarang') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Detail Barang</li>
        </ol>';
    } elseif ($menu == 'detailinfo') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Detail Informasi</li>
        </ol>';
    } elseif ($menu == 'belibarang') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Beli Barang</li>
        </ol>';
    } elseif ($menu == 'laporan') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Laporan</li>
        </ol>';
    } elseif ($menu == 'detailkateg') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Detail Barang Perkategori</li>
        </ol>';
    } elseif ($menu == 'detailsemuabarang') {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Detail Semua Barang</li>
        </ol>';
    } elseif ($menu == 'checkout') {
        echo '<ol class="breadcrumb">
               <li><a href="index.php">Home</a></li>
               <li class="active">Checkout</li>
       </ol>';
    } elseif ($menu == 'gagalbeli') {
        echo '<ol class="breadcrumb">
               <li><a href="index.php">Home</a></li>
               <li class="active">Gagal Beli</li>
       </ol>';
    }
/* *****************************************************************************
***************************************************************************** */
    elseif ($menu == 'admin') {
        if ($aksi == 'tambah') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=admin">Admin</a></li>
                <li class="active">Tambah</li>
              </ol>';
        } elseif ($aksi == 'edit') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=admin">Admin</a></li>
                <li class="active">Edit</li>
              </ol>';
        } else {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Admin</li>
              </ol>';
        }
    } elseif ($menu == 'barang') {
        if ($aksi == 'tambah') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=barang">Barang</a></li>
                <li class="active">Tambah</li>
              </ol>';
        } elseif ($aksi == 'edit') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=barang">Barang</a></li>
                <li class="active">Edit</li>
              </ol>';
        } else {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Barang</li>
              </ol>';
        }
    } elseif ($menu == 'halaman') {
        if ($aksi == 'tambah') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=halaman">Halaman</a></li>
                <li class="active">Tambah</li>
              </ol>';
        } elseif ($aksi == 'edit') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=halaman">Halaman</a></li>
                <li class="active">Edit</li>
              </ol>';
        } else {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Halaman</li>
              </ol>';
        }
    } elseif ($menu == 'kategori') {
        if ($aksi == 'tambah') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=kategori">Kategori</a></li>
                <li class="active">Tambah</li>
              </ol>';
        } elseif ($aksi == 'edit') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=kategori">Kategori</a></li>
                <li class="active">Edit</li>
              </ol>';
        } else {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Kategori</li>
              </ol>';
        }
    } elseif ($menu == 'transaksi') {
        if ($aksi == 'lihat') {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="?menu=transaksi">Transaksi</a></li>
                <li class="active">Lihat</li>
              </ol>';
        } else {
            echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Transaksi</li>
              </ol>';
        }
    } elseif ($menu == 'menu') {
        if ($aksi == 'tambah') {
            echo '<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="?menu=menu">Menu</a></li>
                    <li class="active">Tambah</li>
                  </ol>';
        } elseif ($aksi == 'edit') {
            echo '<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="?menu=menu">Menu</a></li>
                    <li class="active">Edit</li>
                  </ol>';
        } else {
            echo '<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Menu</li>
                  </ol>';
        }
    } else {
        echo '<ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Menu Tidak Ditemukan</li>
        </ol>';
    }
} else {
    echo '<ol class="breadcrumb">
                <li class="active">Home</li>
        </ol>';
}
