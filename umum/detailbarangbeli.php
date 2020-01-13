<?php

if (isset($_GET['id'])) {
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'user') {
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
                  <form action="proses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idbarang" value="'.$a['kode'].'">
                    <input type="hidden" name="hargabarang" value="'.$a['harga'].'">
                    <div class="form-group"  style="padding:0px;margin:0px">
                    <td>
                      <label for="jumlah">Jumlah</label>
                      </td>
                      <td>:</td>
                      <td>
                      <select name="jumlah" class="form-control">';
            for ($i = 1; $i <= 50; ++$i) {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            echo '</select>
                      </td>
                    </div>
                </tr>
                <tr>
                  <td colspan="3">
                      <button type="submit" class="btn btn-primary pull-right" name="belibarang">Tambahkan Ke Keranjang</button>
                    </form>
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
             Harus Login
             </h3>
         </div>
         <div class="panel-body">';
        echo '<h1>Untuk Membeli Produk Ini Harus Login</h1>';
        echo '<form action="module/login/loginadmin.php" method="POST">
             <div class="form-group">
                 <label for="username">Username</label>
                 <input type="text" class="form-control" name="username" placeholder="Username Anda">
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Password">
             </div>
             <span class="btn-group pull-right" role="group">
               <a data-toggle="tooltip" title="Lihat" class="btn btn-danger" href="?menu=register">
                 <i class="fa fa-eye"></i> Register
               </a>
               <button type="submit" class="btn btn-primary" name="kirim">Login Admin</button>
             </span>
         </form>';
        echo '</div>';
        echo '</div>';
    }
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
