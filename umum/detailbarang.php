<?php

if (isset($_GET['id'])) {
    echo '<div class="panel panel-primary">';
    $query = mysqli_query($con, 'SELECT * FROM barang WHERE kode="'.$_GET['id'].'"');
    while ($a = mysqli_fetch_array($query)) {
        $query1 = mysqli_query($con, 'SELECT * FROM kategori WHERE kategori = "'.$a['kategori'].'"');
        echo '<div class="panel-heading">
                <h3 class="panel-title">'.$a['nama'].'</h3>
            </div>
            <div class="panel-body" style="padding:0px;margin:0px">';
        echo '<table class="table table-hover" style="padding:0px;margin:0px">
              <tr>
                <td colspan="3" style="padding:0px">
                <img style="width:100%;background-color:#555" class="img img-responsive" src="file/image/thumb_'.$a['gambar'].'"></td>
              </tr>
              <tr>
                <td width="20">Kode</td><td width="10">:</td><td>'.$a['kode'].'</td>
              </tr>
              <tr>
                <td>Harga</td><td>:</td><td>'.$a['harga'].'</td>
              </tr>
              <tr>
                <td>Stok</td><td>:</td><td>'.$a['stok'].'</td>
              </tr>
              <tr><td colspan="3">'.$a['ket'].'</td></tr>
              <tr>
                <td colspan="3">
                    <a href="?menu=belibarang&id='.$a['kode'].'" class="btn btn-primary pull-right" name="kirim">Beli</a>
                </td>
              </tr>
            </table>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<div class="panel panel-primary">';
    echo '<div class="panel-heading">
          <h3 class="panel-title">
          Data Tidak Ada
          </h3>
      </div>
      <div class="panel-body">';
    echo "<h1>Data Tidak Ada, Kembali Ke <a href='index.php'>Home</a></h1>";
    echo '</div>';
    echo '</div>';
}
