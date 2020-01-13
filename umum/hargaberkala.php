<?php

if (isset($_POST['kirim'])) {
  $tgl = $_POST['tanggal'];
  $pasar = $_POST['pasar'];
  $pangan = $_POST['pangan'];
  $tanggalbulan = null;
  $bulancek = null;
  $tahuncek = null;

  echo '<div class="panel panel-primary">';
  echo '<div class="panel-body">';
  echo '<h3>Harga Pangan Pokok</h3>';
  ?>
    <form action="?menu=hargaberkala" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-3">
          <div class="form-group">
            <select name="tanggal" class="form-control">
            <?php
            $query = mysqli_query($con, 'SELECT * FROM panganpokokpasar GROUP BY MONTH(tanggal)');
            while ($a = mysqli_fetch_array($query)) {
                $tanggal = $a['tanggal'];
                $bulans = substr($tanggal,5,2);
                $tahun = substr($tanggal,0,4);
                $bulan = null;
                if($bulans == "01"){
                    $bulan = "Januari";
                }else if($bulans == "02"){
                  $bulan = "Februari";
                }else if($bulans == "03"){
                  $bulan = "Maret";
                }else if($bulans == "04"){
                  $bulan = "April";
                }else if($bulans == "05"){
                  $bulan = "Mei";
                }else if($bulans == "06"){
                  $bulan = "Juni";
                }else if($bulans == "07"){
                  $bulan = "Juli";
                }else if($bulans == "08"){
                  $bulan = "Agustus";
                }else if($bulans == "09"){
                  $bulan = "September";
                }else if($bulans == "10"){
                  $bulan = "Oktober";
                }else if($bulans == "11"){
                  $bulan = "November";
                }else if($bulans == "12"){
                  $bulan = "Desember";
                }
                if($tanggal == $tgl){
                  $tanggalbulan = $bulan.' '.$tahun;
                  $bulancek = $bulans;
                  $tahuncek = $tahun;
                  echo "<option value='$tanggal' selected>$bulan $tahun</option>";
                }else{
                  echo "<option value='$tanggal'>$bulan $tahun</option>";
                }
                
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <select name="pasar" class="form-control">
            <?php
            $query = mysqli_query($con, 'SELECT * FROM pasar');
            while ($a = mysqli_fetch_array($query)) {
              if($a['kode'] == $pasar){
                echo "<option value='$a[kode]' selected>$a[kode] - $a[nama]</option>";
              }else{
                echo "<option value='$a[kode]'>$a[kode] - $a[nama]</option>";
              }
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
            <select name="pangan" class="form-control">
            <option value=''>-- Semua Pangan --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM panganpokok');
            while ($a = mysqli_fetch_array($query)) {
              if($a['kode'] == $pangan){
                echo "<option value='$a[kode]' selected>$a[kode] - $a[nama] / $a[satuan]</option>";
              }else{
                echo "<option value='$a[kode]'>$a[kode] - $a[nama] / $a[satuan]</option>";
              }
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-2">
      <button type="submit" class="btn btn-primary pull-right" name="kirim">Update</button>
      </div>
    </div>
    </form>
  <?php
  $datasets = null;
  $labels = null;
  $detail = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM pasar WHERE kode = "'.$pasar.'"'));
  echo "<table width='100%'>
        <tr><th>Kabupaten</th><th>:</th><th>$detail[kabupaten]</th><th>Pasar</th><th>:</th><th>$detail[nama]</th></tr>
        <tr><th>Provinsi</th><th>:</th><th>$detail[provinsi]</th><th>Bulan</th><th>:</th><th>$tanggalbulan</th></tr>
        </table><br>";

  echo "<table class='table table-responsive table-hover table-bordered'>";
  $kode = mysqli_query($con, "SELECT panganpokokharga.*, panganpokokpasar.tanggal, panganpokokpasar.kode_pasar,
                                     panganpokok.nama as namapangan
                              FROM panganpokokharga 
                              LEFT JOIN panganpokokpasar ON panganpokokharga.nomor = panganpokokpasar.nomor
                              LEFT JOIN panganpokok ON panganpokokharga.kode_pangan = panganpokok.kode
                              WHERE panganpokokharga.kode_pangan LIKE '$pangan%' AND 
                                    panganpokokpasar.kode_pasar = '$pasar' AND
                                    MONTH(panganpokokpasar.tanggal) = '".(int)$bulancek."' AND
                                    YEAR(panganpokokpasar.tanggal) = '$tahuncek'
                              GROUP BY panganpokokharga.kode_pangan");

  $sub = mysqli_query($con, "SELECT panganpokokharga.*, panganpokokpasar.tanggal, panganpokokpasar.kode_pasar,
                                     panganpokok.nama as namapangan
                              FROM panganpokokharga 
                              LEFT JOIN panganpokokpasar ON panganpokokharga.nomor = panganpokokpasar.nomor
                              LEFT JOIN panganpokok ON panganpokokharga.kode_pangan = panganpokok.kode
                              WHERE panganpokokharga.kode_pangan LIKE '$pangan%' AND 
                                    panganpokokpasar.kode_pasar = '$pasar' AND
                                    MONTH(panganpokokpasar.tanggal) = '".(int)$bulancek."' AND
                                    YEAR(panganpokokpasar.tanggal) = '$tahuncek'
                              GROUP BY panganpokokpasar.tanggal");

  echo "<tr><th rowspan=2>Kode</th><th rowspan=2>Komoditas</th>";
  $num = mysqli_num_rows($sub);
  echo "<th colspan='$num'>Harga</th><th rowspan=2>Rata-Rata</th></tr>";
  echo "<tr>";
  $labels = array();
  while($b = mysqli_fetch_array($sub)){
    array_push($labels, $b['tanggal']);
    echo "<th>$b[tanggal]</th>";
  }
  echo "</tr>";
  
  $totaldata = array();
  $penjumlah = 0;
  $penjumlah1 = 0;
  $penjumlah2 = 0;
  while($a = mysqli_fetch_array($kode)){
    echo "<tr><td>$a[kode_pangan]</td><td>$a[namapangan]</td>";
    $rata2 = null;
    $sub2 = mysqli_query($con, "SELECT panganpokokharga.*, panganpokokpasar.tanggal, panganpokokpasar.kode_pasar,
                                     panganpokok.nama as namapangan
                              FROM panganpokokharga 
                              LEFT JOIN panganpokokpasar ON panganpokokharga.nomor = panganpokokpasar.nomor
                              LEFT JOIN panganpokok ON panganpokokharga.kode_pangan = panganpokok.kode
                              WHERE panganpokokharga.kode_pangan LIKE '$pangan%' AND 
                                    panganpokokpasar.kode_pasar = '$pasar' AND
                                    MONTH(panganpokokpasar.tanggal) = '".(int)$bulancek."' AND
                                    YEAR(panganpokokpasar.tanggal) = '$tahuncek' AND
                                    panganpokokharga.kode_pangan = '$a[kode_pangan]'
                              GROUP BY panganpokokharga.nomor");
    $harga = array();
    while($b = mysqli_fetch_array($sub2)){
        $rata2 = $rata2 + $b['harga_pangan'];
        array_push($harga, $b['harga_pangan']);
        echo '<td>Rp. '.number_format($b['harga_pangan'],2,",",".")."</td>";
    }
    $dataset['label'] = $a['namapangan'];
    $dataset['backgroundColor'] = 'rgba('.(54+$penjumlah).', '.(162-$penjumlah1).', '.(235-$penjumlah2).', 0.2)';
    $dataset['borderColor'] = 'rgba('.(54+$penjumlah).', '.(162-$penjumlah1).', '.(235-$penjumlah2).', 1)';
    $dataset['borderWidth'] = 1;
    $dataset['data'] = $harga;
    $penjumlah = $penjumlah + 40;
    $penjumlah1 = $penjumlah1 + 30;
    $penjumlah2 = $penjumlah2 + 10;
    array_push($totaldata, $dataset);
    $nums = mysqli_num_rows($sub2);
    echo '<td>Rp. '.number_format($rata2/$nums,2,",",".")."</td>
    </tr>";
  }
  echo "</table>";

  if($pangan != "a"){
      echo '<canvas id="myChart" width="300" height="100"></canvas>';
      ?>
      <script>
      var ctx = document.getElementById("myChart").getContext("2d");
      var data = {
          labels: <?php echo json_encode($labels); ?>,
          datasets: <?php echo json_encode($totaldata); ?>,
          // [
          //     {
          //         label: "Blue",
          //         backgroundColor: 'rgba(54, 162, 235, 0.2)',
          //         borderColor: 'rgba(54, 162, 235, 1)',
          //         borderWidth: 1,
          //         data: [3,7,4]
          //     },
          //     {
          //         label: "Red",
          //         backgroundColor: "red",
          //         data: [4,3,5]
          //     },
          //     {
          //         label: "Green",
          //         backgroundColor: "green",
          //         data: [7,2,6]
          //     }
          // ]
      };

      var myBarChart = new Chart(ctx, {
          type: 'bar',
          data: data,
          options: {
              barValueSpacing: 20,
              scales: {
                  yAxes: [{
                      ticks: {
                          min: 0,
                      }
                  }]
              }
          }
      });
      </script>
      <?php
  }
  echo '</div>';
} else {
  echo '<div class="panel panel-primary">';
  echo '<div class="panel-body">';
  echo '<h3>Harga Pangan Pokok</h3>';
  ?>
    <form action="?menu=hargaberkala" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-3">
          <div class="form-group">
            <select name="tanggal" class="form-control">
            <?php
            $query = mysqli_query($con, 'SELECT * FROM panganpokokpasar GROUP BY MONTH(tanggal)');
            while ($a = mysqli_fetch_array($query)) {
                $tanggal = $a['tanggal'];
                $bulans = substr($tanggal,5,2);
                $tahun = substr($tanggal,0,4);
                $bulan = null;
                if($bulans == "01"){
                    $bulan = "Januari";
                }else if($bulans == "02"){
                  $bulan = "Februari";
                }else if($bulans == "03"){
                  $bulan = "Maret";
                }else if($bulans == "04"){
                  $bulan = "April";
                }else if($bulans == "05"){
                  $bulan = "Mei";
                }else if($bulans == "06"){
                  $bulan = "Juni";
                }else if($bulans == "07"){
                  $bulan = "Juli";
                }else if($bulans == "08"){
                  $bulan = "Agustus";
                }else if($bulans == "09"){
                  $bulan = "September";
                }else if($bulans == "10"){
                  $bulan = "Oktober";
                }else if($bulans == "11"){
                  $bulan = "November";
                }else if($bulans == "12"){
                  $bulan = "Desember";
                }
                echo "<option value='$tanggal'>$bulan $tahun</option>";
                
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
            <select name="pasar" class="form-control">
            <?php
            $query = mysqli_query($con, 'SELECT * FROM pasar');
            while ($a = mysqli_fetch_array($query)) {
                echo "<option value='$a[kode]'>$a[kode] - $a[nama]</option>";
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
            <select name="pangan" class="form-control">
            <option value=''>-- Semua Pangan --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM panganpokok');
            while ($a = mysqli_fetch_array($query)) {
                echo "<option value='$a[kode]'>$a[kode] - $a[nama] / $a[satuan]</option>";
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-2">
      <button type="submit" class="btn btn-primary pull-right" name="kirim">Proses</button>
      </div>
    </div>
    </form><br><br>
    <h4 align="center">Output List<br>Data Harga Pangan Pokok Berkala</h4>
    <br><br><br><br>
    <br><br><br>
  <?php
  echo '</div>';
}
