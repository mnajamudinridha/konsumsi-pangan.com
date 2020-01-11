      <?php
      if (isset($_GET['id'])) {
          echo '<div class="panel panel-primary">';
          $kateg = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM kategori WHERE kode = "'.$_GET['id'].'"'));
          echo '<div class="panel-heading">
        <h3 class="panel-title">Detail Kamar Berdasarkan Tipe <b>'.$kateg['nama'].'</b></h3>
        </div>
        <div class="panel-body">';
          $batas = 8;
          $nohalaman = '';
          if (isset($_GET['halaman'])) {
              $nohalaman = $_GET['halaman'];
          } else {
              $nohalaman = 1;
          }
          $posisi = ($nohalaman - 1) * $batas;
          $no = $posisi + 1;
          $query = mysqli_query($con, "SELECT * FROM kamar WHERE kategori = '$kateg[kode]' ORDER BY kode DESC LIMIT $posisi, $batas");
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              $no = 1;
              echo '<div class="row">';
              while ($a = mysqli_fetch_array($query)) {
                  $query1 = mysqli_query($con, 'SELECT * FROM kategori WHERE kategori = "'.$a['kategori'].'"');
                  echo '<div class="col-md-3" style="padding-left:5px;padding-right:5px;">';
                  echo '<div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">'.$a['nama'].'</h3>
            </div>
            <div class="panel-body" style="padding:0px;margin:0px">';
                  echo '<table class="table table-hover" style="padding:0px;margin:0px">
              <tr>
                <td colspan="3" style="padding:0px">
                <a href="">
                <img style="min-height:140px;height:140px;width:100%;background-color:#555" class="img img-responsive" src="file/image/thumb_'.$a['gambar'].'"></td>
                </a>
              </tr>
              <tr>
                <td colspan="3">Rp. '.number_format($a['harga'], 2).' / malam</td>
              </tr>
              <tr>
                <td colspan="3">
                <span class="btn-group pull-right" role="group">
                  <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-primary" href="?menu=sewakamar&id='.$a['kode'].'">
                    <i class="fa fa-shopping-cart"></i> Resevasi Kamar Ini
                  </a>
                </span>
                </td>
              </tr>
            </table>';
                  echo '</div></div>';
                  echo '</div>';
                  if ($no % 4 == 0) {
                      echo '</div>';
                      echo '<div class="row">';
                  }
                  ++$no;
              }
              echo '</div>';
              $total = mysqli_query($con, 'SELECT * FROM kamar WHERE kategori = "'.$kateg['kode'].'"');
              $jumlahbaris = mysqli_num_rows($total);
              $jumlahhalaman = ceil($jumlahbaris / $batas);

          // menampilkan link previous
          echo '<div class="row">';
              echo '<div class="col-md-12">';
              echo "<nav aria-label='Page navigation'>
    <ul class='pagination'>";
              if ($nohalaman > 1) {
                  echo "<li><a href='".$_SERVER['PHP_SELF'].'?menu=detailkateg&id='.$kateg['kode'].'&halaman='.($nohalaman - 1)." aria-label='Previous'>
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
                          echo "<li><a href='".$_SERVER['PHP_SELF'].'?menu=detailkateg&id='.$kateg['kode'].'&halaman='.$halaman."'>".$halaman.'</a></li>';
                      }
                      $tampilhalaman = $halaman;
                  }
              }
              if ($nohalaman < $jumlahhalaman) {
                  echo "<li>
              <a href='".$_SERVER['PHP_SELF'].'?menu=detailkateg&id='.$kateg['kode'].'&halaman='.($nohalaman + 1)."' aria-label='Next'>
                <span aria-hidden='true'>Selanjutnya &gt;&gt;</span>
              </a>
            </li>";
              }
              echo '</ul></nav>';
              echo '</div>';
              echo '</div>';
          } else {
              echo '<h1>Tidak Ada Data Pada Kategori ini</h1>';
          }
          echo '</div>';
          echo '</div>';
      } else {
          echo '<div class="panel-heading">
              <h3 class="panel-title">
                Kategori Tidak Ada
              </h3>
          </div>
          <div class="panel-body">';
          echo "<h1>Kategori Tidak Ada, Kembali Ke <a href='index.php'>Home</a></h1>";
          echo '</div>';
      }
        ?>
