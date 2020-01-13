<?php
    echo '<div class="panel panel-primary">';
    echo '<div class="panel-heading">
  <h3 class="panel-title">Produk Terbaru</h3>
  </div>
  <div class="panel-body" style="padding:10px">';
  echo '<div class="row">';
  $no = 1;
    $query = mysqli_query($con, 'SELECT * FROM barang ORDER BY kode DESC LIMIT 2');
    $jumlah = mysqli_num_rows($query);
    if ($jumlah > 0) {
        while ($a = mysqli_fetch_array($query)) {
            $query1 = mysqli_query($con, 'SELECT * FROM kategori WHERE kategori = "'.$a['kategori'].'"');
            echo '<div class="col-md-12">';
            echo '<div class="panel panel-warning">
      <div class="panel-heading">
          <h3 class="panel-title">'.$a['nama'].'</h3>
      </div>
      <div class="panel-body" style="padding:0px;margin:0px">';
            echo '<table class="table table-hover" style="padding:0px;margin:0px">
        <tr>
          <td colspan="3" style="padding:0px">
          <a href="">
          <img style="max-height:100px;width:100%;background-color:#555" class="img img-responsive" src="file/image/thumb_'.$a['gambar'].'"></td>
          </a>
        </tr>
        <tr>
        <td colspan="3">Rp. '.number_format($a['harga'],2).'</td>
        </tr>
        <tr>
          <td colspan="3">
          <span class="btn-group pull-right" role="group">
            <a data-toggle="tooltip" title="Lihat" class="btn btn-xs btn-primary" href="?menu=detailbarang&id='.$a['kode'].'">
              <i class="fa fa-eye"></i> Lihat
            </a>
            <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="?menu=belibarang&id='.$a['kode'].'">
              <i class="fa fa-shopping-cart"></i> Beli
            </a>
          </span>
          </td>
        </tr>
      </table>';
            echo '</div></div>';
            echo '</div>';
            if ($no % 2 == 0) {
              echo '</div>';
              echo '<div class="row">';
            }
            ++$no;
        }
    } else {
        echo '<h1>Tidak Ada Data Pada Kategori ini</h1>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
