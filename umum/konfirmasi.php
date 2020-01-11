<?php
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<div class="panel panel-primary">';
    echo '<div class="panel-heading">
            <h3 class="panel-title">Detail Kamar Reservasi <b>'.$_SESSION['nama'].'</b></h3>
        </div>
        <div class="panel-body" style="padding:0px;margin:0px">';
    $query = mysqli_query($con, 'SELECT transaksi.*, kategori.nama as namakategori FROM transaksi
                                                    LEFT JOIN kamar ON transaksi.kamar = kamar.kode
                                                    LEFT JOIN kategori ON kamar.kategori = kategori.kode
                                                    WHERE user="'.$_SESSION['username'].'" AND tanggal = "'.date('Y-m-d').'"');
    $no = 1;
    echo '<table class="table table-hover" style="padding:0px;margin:0px">
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Kode</th>
            <th>Tipe</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Lama</th>
            <th>Total</th>
          </tr>';
          $total = 0;
    while ($a = mysqli_fetch_array($query)) {
        $sub = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM kamar WHERE kode = "'.$a['kamar'].'"'));
        echo '<tr>
                <td>'.$no.'</td>
                <td><img style="width:50px;background-color:#555" class="img img-responsive" src="file/image/thumb_'.$sub['gambar'].'"></td>
                <td>'.$sub['kode'].'</td>
                <td>'.$a['namakategori'].'</td>
                <td>'.$sub['nama'].'</td>
                <td>'.number_format($sub['harga'],2).'</td>
                <td>'.$a['lama'].'</td>
                <td>'.number_format(($sub['harga']*$a['lama']), 2).'</td>
              </tr>';
        ++$no;
        $total = $total + ($sub['harga']*$a['lama']);
    }
    echo '<tr><td colspan="7" align="right"><b>Total</b></td><th>'.number_format($total, 2).'</th></tr>';

    $id = 5;
    $query = mysqli_query($con, "SELECT * FROM halaman WHERE id='$id'");
    $a = mysqli_fetch_array($query);
    // echo '<tr><td colspan="7">
    //       <h3 class="panel-title">
    //       '.$a['judul'].'
    //       </h3>';
    // echo htmlspecialchars_decode($a['isi']);
    // echo '</td></tr>';

    $ceks = mysqli_num_rows(mysqli_query($con, 'SELECT transaksi.* FROM transaksi
                                LEFT JOIN kamar ON transaksi.kamar = kamar.kode
                                LEFT JOIN pembayaran ON transaksi.id = pembayaran.sewa
                                WHERE user="'.$_SESSION['username'].'" AND pembayaran.status = "N"'));
    if ($ceks < 1) {
        echo '<tr><td colspan="8">
    <form action="prosesbayar.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="user" value="'.$_SESSION['username'].'">
      <div class="row">
      <div class="col-md-3">Tanggal Bayar</div>
      <div class="col-md-9">
      <input type="date" class="form-control" name="tanggal" placeholder="Pilih Tanggal Bayar">
      </div>
      </div>
      <div class="row">
      <div class="col-md-3">No Rekening</div>
      <div class="col-md-9">
      <input type="text" class="form-control" name="norek" placeholder="No Rekening">
      </div>
      </div>
      <div class="row">
      <div class="col-md-3">No Rekening Tujuan</div>
      <div class="col-md-9">
      <input type="text" class="form-control" name="norektujuan" placeholder="No Rekening Tujuan">
      </div>
      </div>

      <div class="row">
      <div class="col-md-3">Nominal Transfer</div>
      <div class="col-md-9">
      <input type="number" class="form-control" name="nominal" placeholder="Nominal Transfer">
      </div>
      </div>

      <div class="row">
      <div class="col-md-3">Bukti Transfer</div>
      <div class="col-md-9">
      <div class="form-group">
        <input type="file" name="gambar">
        <p class="help-block">Upload Bukti Pembayaran</p>
      </div>
      </div>
      </div>

      <div class="row">
      <div class="col-md-12">
      <input type="submit" class="btn btn-primary pull-right" name="kirim" value="Konfirmasi Pembayaran">
      </div>
      </div>
      </form>
      </td></tr>';
    }else{
      echo '<tr><td colspan="8"><span class="btn btn-danger pull-right disabled">Sudah dikonfirmasi</span></td></tr>';
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
