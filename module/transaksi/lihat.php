<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
include 'fungsi/gambar.php';
if (isset($_GET['user']) && isset($_GET['tanggal'])) {
    $user = $_GET['user'];
    $tanggal = $_GET['tanggal'];
    echo '<div class="panel-heading">
            <h3 class="panel-title">Detail Resevasi <b>'.$user.'</b></h3>
        </div>
        <div class="panel-body" style="padding:0px;margin:0px">';
    $query = mysqli_query($con, 'SELECT * FROM transaksi WHERE user="'.$user.'" AND tanggal ="'.$tanggal.'"');
    $no = 1;
    echo '<table class="table table-hover" style="padding:0px;margin:0px">
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Tipe</th>
            <th>Nama Kamar</th>
            <th>Harga</th>
            <th>Lama</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Total</th>
          </tr>';
          $total = 0;
    while ($a = mysqli_fetch_array($query)) {
        $sub = mysqli_fetch_array(mysqli_query($con, 'SELECT kamar.*, kategori.nama as namakategori FROM kamar LEFT JOIN kategori ON kamar.kategori = kategori.kode WHERE kamar.kode = "'.$a['kamar'].'"'));
        echo '<tr>
                <td>'.$no.'</td>
                <td><img style="width:50px;background-color:#555" class="img img-responsive" src="file/image/thumb_'.$sub['gambar'].'"></td>
                <td>'.$sub['namakategori'].'</td>
                <td>'.$sub['nama'].'</td>
                <td>'.number_format($sub['harga'],2).'</td>
                <td>'.$a['lama'].'</td>
                <td>'.$a['cekin'].'</td>
                <td>'.$a['cekout'].'</td>
                <td>'.number_format($a['total'], 2).'</td>
              </tr>';
        ++$no;
        $total = $total + $a['total'];
    }
    echo '<tr><td colspan="8" align="right"><b>Total</b></td><th>'.number_format($total,2).'</th></tr>';
    echo '</table>';
    echo '</div>';
}
