<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
include 'fungsi/gambar.php';
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo '<div class="panel-heading">
            <h3 class="panel-title">Detail Resevasi Nomor <b>'.$id.'</b></h3>
        </div>
        <div class="panel-body" style="padding:0px;margin:0px">';
    $query = mysqli_query($con, 'SELECT transaksi.*, pembayaran.gambar as gambarbayar FROM transaksi, pembayaran WHERE transaksi.id = pembayaran.sewa AND pembayaran.id="'.$id.'"');
    $no = 1;
       echo '<table class="table table-hover" style="padding:0px;margin:0px">
          <tr>
            <th>Bukti Transfer</th>
            <th>Detail</th>
          </tr>';
          $total = 0;
    while ($a = mysqli_fetch_array($query)) {
        $sub = mysqli_fetch_array(mysqli_query($con, 'SELECT kamar.*, kategori.nama as namakategori FROM kamar LEFT JOIN kategori ON kamar.kategori = kategori.kode WHERE kamar.kode = "'.$a['kamar'].'"'));
        echo '<tr><td rowspan="9" align="right" width="350">';
        echo "<img width='100%' src='file/image/$a[gambarbayar]'>";
        echo '</td></tr>';
        echo '<tr>
                <td>Kamar</td>
                <td><img style="width:50px;background-color:#555" class="img img-responsive" src="file/image/thumb_'.$sub['gambar'].'"></td>
              </tr>
              <tr>
              <td>Tipe</td>
                <td>'.$sub['namakategori'].'</td>
              </tr>
              <tr>
              <td>Nomor</td>
                <td>'.$sub['nama'].'</td>
              </tr>
              <tr>
              <td>Harga</td>
                <td>'.number_format($sub['harga'],2).'</td>
              </tr>
              <tr>
              <td>Lama</td>
                <td>'.$a['lama'].'</td>
              </tr>
              <tr>
              <td>Check In</td>
                <td>'.$a['cekin'].'</td>
              </tr>
              <tr>
                <td>Check Out</td>
                <td>'.$a['cekout'].'</td>
              </tr>
              <tr>
              <td>Sub Total</td>
                <td>'.number_format($a['total'], 2).'</td>
              </tr>';
        ++$no;
        $total = $total + $a['total'];
    }
    echo '<tr><td colspan="2" align="right"><b>Total</b></td><th>'.number_format($total,2).'</th></tr>';
    echo '</table>';
    echo '</div>';
  }
