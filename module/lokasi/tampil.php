<?php
if (empty($_SESSION['login']) || $_SESSION['login'] != 'admin') {
  echo '<div class="panel-heading">
          <h3 class="panel-title">
          Harus Login
          </h3>
      </div>
      <div class="panel-body">';
  echo "<h1>Anda Harus Login, Kembali Ke <a href='index.php'>Home</a></h1>";
  echo '</div>';
} else {
    ?>
    <div class="panel-heading">
        <h3 class="panel-title">
        Data Lokasi
        </h3>
    </div>
    <div class="panel-body">
      <div class="btn-group" style="padding-bottom:10px">
        <a href='?menu=lokasi&aksi=tambah' class="btn btn-primary">
        <i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <form method="post" action="?menu=lokasi&aksi=cari">
            <div class="input-group">
                <input type="text" name="cari" placeholder=" Cari..." class="form-control">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form><br>
        <button class="btn btn-success pull-right" onclick="print()">Print</button><br><br>
      </div>
    <?php
    include 'vendor/autoload.php';
    include 'fungsi/koneksi.php';
    $data = null;
    $batas = 5;
    $nohalaman = '';
    if (isset($_GET['halaman'])) {
        $nohalaman = $_GET['halaman'];
    } else {
        $nohalaman = 1;
    }
    $posisi = ($nohalaman - 1) * $batas;
    $no = $posisi + 1;
    $cari = null;
    if (isset($_POST['cari'])) {
        $cari = $_POST['cari'];
    } elseif (isset($_GET['cari']) && !empty($_GET['cari'])) {
        $cari = $_GET['cari'];
    }
    if (!empty($cari)) {
        $datas = mysqli_query($con, "SELECT lokasi.*, wilayah.nama as wilayahnama FROM lokasi LEFT JOIN wilayah ON lokasi.wilayah = wilayah.id WHERE desa LIKE '%$cari%' OR lokasi.kode LIKE '%$cari%'");
        $jumlah = mysqli_num_rows($datas);
        $data = mysqli_query($con, "SELECT lokasi.*, wilayah.nama as wilayahnama FROM lokasi LEFT JOIN wilayah ON lokasi.wilayah = wilayah.id WHERE desa LIKE '%$cari%' OR lokasi.kode LIKE '%$cari%' LIMIT $posisi, $batas");
        echo "<a href='?menu=lokasi'><h4 class='btn btn-danger'>Ditemukan $jumlah dengan Kata <u>$cari</u>, klik disini untuk CLEAR</h4></a><br><br>";
    } else {
        $data = mysqli_query($con, "SELECT lokasi.*, wilayah.nama as wilayahnama FROM lokasi LEFT JOIN wilayah ON lokasi.wilayah = wilayah.id LIMIT $posisi, $batas");
    }
    $jumlah = mysqli_num_rows($data);
    if ($jumlah > 0) {
        echo "<div id='printarea'>";
        echo "<table class='table table-hover table-bordered' width='100%' border='1'>";
        echo "<tr><th>Kode</th><th>Wilayah</th><th>Desa/Kelurahan</th><th>Argeokologi</th><th>Ekonomi</th><th style='text-align:center'>Aksi</th></tr>";
        while ($a = mysqli_fetch_array($data)) {
            echo '<tr><td>';
            echo $a['kode'];
            echo '</td><td>';
            echo $a['wilayahnama'];
            echo '</td><td>';
            echo $a['desa'];
            echo '</td><td>';
            echo $a['argeokologi'];
            echo '</td><td>';
            echo $a['ekonomi'];
            echo '</td><td align="center">';
            echo '<div class="btn-group" role="group" aria-label="...">
                <a class="btn btn-warning" href="module/lokasi/hapus.php?id=' .$a['kode'].'&halaman='.$nohalaman.'&cari='.$cari.'">
                    <i class="glyphicon glyphicon-trash"></i></a>
                <a class="btn btn-primary" href="?menu=lokasi&aksi=edit&id=' .$a['kode'].'&halaman='.$nohalaman.'&cari='.$cari.'">
                    <i class="glyphicon glyphicon-edit"></i></a>
                </div>';
            echo '</td></tr>';
            ++$no;
        }
        echo '</table>';
        echo '</div>';

        $total = null;
        if (!empty($cari)) {
            $total = mysqli_query($con, "SELECT lokasi.*, wilayah.nama as wilayahnama FROM lokasi LEFT JOIN wilayah ON lokasi.wilayah = wilayah.id WHERE desa LIKE '%$cari%' OR lokasi.kode LIKE '%$cari%'");
        } else {
            $total = mysqli_query($con, 'SELECT lokasi.*, wilayah.nama as wilayahnama FROM lokasi LEFT JOIN wilayah ON lokasi.wilayah = wilayah.id');
        }
        $jumlahbaris = mysqli_num_rows($total);
        $jumlahhalaman = ceil($jumlahbaris / $batas);

        // menampilkan link previous
        echo "<nav aria-label='Page navigation'>
  <ul class='pagination'>";
        if ($nohalaman > 1) {
            echo "<li><a href='".$_SERVER['PHP_SELF'].'?menu=lokasi&halaman='.($nohalaman - 1).'&cari='.$cari."' aria-label='Previous'>
          <span aria-hidden='true'>&lt;&lt; Sebelumnya</span>
        </a>
      </li>";
        }
        $tampilhalaman = null;
        for ($halaman = 1; $halaman <= $jumlahhalaman; ++$halaman) {
            if ((($halaman >= $nohalaman - 3) && ($halaman <= $nohalaman + 3)) || ($halaman == 1) || ($halaman == $jumlahhalaman)) {
                if (($tampilhalaman == 1) && ($halaman != 2)) {
                    echo '<li><a>...</a></li>';
                }
                if (($tampilhalaman != ($jumlahhalaman - 1)) && ($halaman == $jumlahhalaman)) {
                    echo '<li><a>...</a></li>';
                }
                if ($halaman == $nohalaman) {
                    echo '<li><a><b>'.$halaman.'</b></a></li>';
                } else {
                    echo "<li><a href='".$_SERVER['PHP_SELF'].'?menu=lokasi&halaman='.$halaman.'&cari='.$cari."'>".$halaman.'</a></li>';
                }
                $tampilhalaman = $halaman;
            }
        }
        if ($nohalaman < $jumlahhalaman) {
            echo "<li>
            <a href='".$_SERVER['PHP_SELF'].'?menu=lokasi&halaman='.($nohalaman + 1).'&cari='.$cari."' aria-label='Next'>
              <span aria-hidden='true'>Selanjutnya &gt;&gt;</span>
            </a>
          </li>";
        }
        echo '</ul></nav>';
    } else {
        echo '<h4>Data Belum Ada</h4>';
    }
    echo '</div>';
}
