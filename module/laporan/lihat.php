<?php
include '../../vendor/autoload.php';
include '../../fungsi/koneksi.php';
  if (isset($_GET['laporan'])) {
      $laporan = $_GET['laporan'];
      if ($laporan == 'user') {
          $query = mysqli_query($con, 'SELECT * FROM admin WHERE level="user"');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
            <table class="table table-hover" width="80%" align="center" rules="all" border="1">
              <tr><td colspan="3" align="center">
                <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
              </td></tr>
              <tr><th>Username</th><th>Nama</th><th>Nomor HP</th></tr>
              <?php
              while ($a = mysqli_fetch_array($query)) {
                  echo '<tr><td>'.$a['username'].'</td><td>'.$a['nama'].'</td><td>'.$a['nohp'].'</td></tr>';
              } ?>
            </table>
            <br><br>
            <table width="80%" align="center">
              <tr align="right">
                <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
              </tr>
            </table>
            <script>print()</script>
            <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
      } elseif ($laporan == 'kamar') {
          $query = mysqli_query($con, 'SELECT kamar.*, kategori.nama as namakategori FROM kamar LEFT JOIN kategori ON kamar.kategori = kategori.kode');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
          <table class="table table-hover" width="80%" align="center" rules="all" border="1">
            <tr><td colspan="5" align="center">
              <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
            </td></tr>
            <tr><th>Kode</th><th>Gambar</th><th>Tipe</th><th>Nama</th><th>Harga</th></tr>
            <?php
            while ($a = mysqli_fetch_array($query)) {
                echo '<tr align="center"><td>'.$a['kode'].'</td><td><img src="../../file/image/thumb_'.$a['gambar'].'" width="80"></td><td>'.$a['namakategori'].'</td><td>'.$a['nama'].'</td><td>Rp. '.number_format($a['harga'], 2).'</td></tr>';
            } ?>
          </table>
          <br><br>
          <table width="80%" align="center">
            <tr align="right">
              <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
            </tr>
          </table>
          <script>print()</script>
          <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
          //
      } elseif ($laporan == 'transaksi') {
          $query = mysqli_query($con, 'SELECT *, SUM(lama) as lama, SUM(total) as totalbayar FROM transaksi GROUP BY user,tanggal,kembali');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
        <table class="table table-hover" width="80%" align="center" rules="all" border="1">
          <tr><td colspan="6" align="center">
            <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
          </td></tr>
          <tr><th>User</th><th>Tanggal Resevasi</th><th>Tanggal Kembali</th><th>Lama Resevasi</th><th>Biaya Supir</th><th>Total Bayar</th></tr>
          <?php
          while ($a = mysqli_fetch_array($query)) {
              echo '<tr align="center"><td>'.$a['user'].'</td><td>'.$a['tanggal'].'</td><td>'.$a['kembali'].'</td><td>'.$a['lama'].'</td><td>250.000,00</td><td>Rp. '.number_format($a['totalbayar']+250000, 2).'</td></tr>';
          } ?>
        </table>
        <br><br>
        <table width="80%" align="center">
          <tr align="right">
            <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
          </tr>
        </table>
        <script>print()</script>
        <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
      } elseif ($laporan == 'tamu') {
          $query = mysqli_query($con, 'SELECT *, SUM(lama) as lama, admin.nama as namaadmin, admin.nohp, kamar.nama as namakamar FROM transaksi
                                                                                                        LEFT JOIN admin ON transaksi.user = admin.username
                                                                                                        LEFT JOIN kamar ON transaksi.kamar = kamar.kode GROUP BY user,tanggal,cekin,cekout');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
        <table class="table table-hover" width="80%" align="center" rules="all" border="1">
          <tr><td colspan="6" align="center">
            <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
            <br>
            <b>LAPORAN TAMU RESERVASI HOTEL</b>
          </td></tr>
          <tr><th>Nama Lengkap</th><th>Tanggal Checkin</th><th>Tanggal Checkout</th><th>Lama</th><th>Nomor Hp</th><th>Kamar</th></tr>
          <?php
          while ($a = mysqli_fetch_array($query)) {
              echo '<tr align="center"><td>'.$a['namaadmin'].'</td><td>'.$a['cekin'].'</td><td>'.$a['cekout'].'</td><td>'.$a['lama'].'</td><td>'.$a['nohp'].'</td><td>'.$a['namakamar'].'</td></tr>';
          } ?>
        </table>
        <br><br>
        <table width="80%" align="center">
          <tr align="right">
            <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
          </tr>
        </table>
        <script>print()</script>
        <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
      } elseif ($laporan == 'periode') {
          $tanggal1 = $_GET['tanggalawal'];
          $tanggal2 = $_GET['tanggalakhir'];
          $query = mysqli_query($con, 'SELECT *, SUM(lama) as lama, admin.nama as namaadmin, admin.nohp, kamar.nama as namakamar FROM transaksi
                                                                                                        LEFT JOIN admin ON transaksi.user = admin.username
                                                                                                        LEFT JOIN kamar ON transaksi.kamar = kamar.kode
                                                                                                        WHERE transaksi.tanggal BETWEEN "'.$tanggal1.'" AND "'.$tanggal2.'" GROUP BY user,tanggal,cekin,cekout');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
        <table class="table table-hover" width="80%" align="center" rules="all" border="1">
          <tr><td colspan="8" align="center">
            <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
            <br>
            <b>LAPORAN TAMU RESERVASI HOTEL</b><br>
            Periode <b><?php echo $tanggal1 ?></b> Sampai <b><?php echo $tanggal2 ?></b>
          </td></tr>
          <tr><th>Nama Lengkap</th><th>Tanggal Checkin</th><th>Tanggal Checkout</th><th>Lama</th><th>Nomor Hp</th><th>Kamar</th><th>Sub Total</th><th>Total</th></tr>
          <?php
          while ($a = mysqli_fetch_array($query)) {
              echo '<tr align="center"><td>'.$a['namaadmin'].'</td><td>'.$a['cekin'].'</td><td>'.$a['cekout'].'</td><td>'.$a['lama'].'</td><td>'.$a['nohp'].'</td><td>'.$a['namakamar'].'</td><td>'.number_format($a['total'],2,",",".").'</td><td>'.number_format(($a['lama']*$a['total']),2,",",".").'</td></tr>';
          } ?>
        </table>
        <br><br>
        <table width="80%" align="center">
          <tr align="right">
            <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
          </tr>
        </table>
        <script>print()</script>
        <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
      } elseif ($laporan == 'pembayaran') {
          $query = mysqli_query($con, 'SELECT pembayaran.*, transaksi.user, transaksi.kamar  FROM pembayaran LEFT JOIN transaksi ON pembayaran.sewa = transaksi.id WHERE pembayaran.status = "Y" GROUP BY id ORDER BY id');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
        <table class="table table-hover" width="80%" align="center" rules="all" border="1">
          <tr><td colspan="5" align="center">
            <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
          </td></tr>
          <tr><th>No</th><th>User</th><th>No Resevasi</th><th>Nominal</th><th>Tanggal</th></tr>
          <?php
          $no = 1;
              while ($a = mysqli_fetch_array($query)) {
                  echo '<tr align="center"><td>'.$no.'</td><td>'.$a['user'].'</td><td>'.$a['id'].'</td><td>'.number_format($a['nominal'], 2, '.', ',').'</td><td>'.$a['tanggal'].'</td></tr>';
                  $no++;
              } ?>
        </table>
        <br><br>
        <table width="80%" align="center">
          <tr align="right">
            <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
          </tr>
        </table>
        <script>print()</script>
        <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
      } elseif ($laporan == 'pengembalian') {
          $query = mysqli_query($con, 'SELECT pembayaran.*, transaksi.user, transaksi.kamar  FROM pembayaran LEFT JOIN transaksi ON pembayaran.sewa = transaksi.id WHERE pembayaran.kembali = "Y" GROUP BY id ORDER BY id');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
        <table class="table table-hover" width="80%" align="center" rules="all" border="1">
          <tr><td colspan="5" align="center">
            <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
          </td></tr>
          <tr><th>No</th><th>User</th><th>No Resevasi</th><th>Nominal</th><th>Tanggal</th></tr>
          <?php
          $no = 1;
              while ($a = mysqli_fetch_array($query)) {
                  echo '<tr align="center"><td>'.$no.'</td><td>'.$a['user'].'</td><td>'.$a['id'].'</td><td>'.number_format($a['nominal'], 2, '.', ',').'</td><td>'.$a['tanggal'].'</td></tr>';
                  $no++;
              } ?>
        </table>
        <br><br>
        <table width="80%" align="center">
          <tr align="right">
            <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br> </td>
          </tr>
        </table>
        <script>print()</script>
        <?php
          } else {
              echo 'Maaf, Data Belum Ada';
          }
      } elseif ($laporan == 'detail') {
          $user = $_GET['user'];
          $tanggal = $_GET['tanggal'];
          $query = mysqli_query($con, 'SELECT transaksi.*, kamar.nama as kamarnama, kamar.gambar as kamargambar FROM transaksi,kamar WHERE transaksi.kamar = kamar.kode AND user="'.$user.'" AND tanggal = "'.$tanggal.'"');
          $jumlah = mysqli_num_rows($query);
          if ($jumlah > 0) {
              ?>
<table class="table table-hover" width="80%" align="center" rules="all" border="1">
  <tr><td colspan="5" align="center">
    <img src="../../source/mediumlogo.png" style="height:100px; padding:5px;margin:0px auto;">
    <br>
    <?php
    echo 'Transkasi User <b>'.$user.'</b> pada tanggal <b>'.$tanggal.'</b>'; ?>
  </td></tr>
  <tr><th>Gambar</th><th>Kamar</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>
  <?php
  $jumlah = null;
              $total = null;
              while ($a = mysqli_fetch_array($query)) {
                  $jumlah = $jumlah + $a['lama'];
                  $total = $total + $a['total'];
                  echo '<tr align="center"><td><img src="../../file/image/thumb_'.$a['kamargambar'].'" width="80"></td><td>'.$a['kamarnama'].'</td><td>Rp. '.number_format($a['total'], 2).'</td><td>'.$a['lama'].'</td><td>Rp. '.number_format($a['total'], 2).'</td></tr>';
              }
              echo '<tr><th colspan=3 align=right>Total &nbsp;</th><th>'.$jumlah.'</th><th>Rp. '.number_format($total, 2).'</th></tr>'; ?>

</table>
<br><br>
<table width="80%" align="center">
  <tr align="right">
    <td> Qarina Banjarbaru, <?php echo date('d-m-Y')?><br><br><br><br><br>( ------------------------- )<br></td>
  </tr>
</table>
<script>print()</script>
<?php
          } else {
              echo 'Maaf, User <b>'.$user.'</b> ini tidak melakukan transaksi sewa tanggal <b>'.$tanggal.'</b>';
          }
      }
  }
  ?>
</div>
