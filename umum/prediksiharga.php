<?php
function getrata($con, $pangan1, $pasar1, $bulan1, $tahun1){
  $rata2 = null;
  $sub2 = mysqli_query($con, "SELECT panganpokokharga.*, panganpokokpasar.tanggal, panganpokokpasar.kode_pasar,
                                   panganpokok.nama as namapangan
                            FROM panganpokokharga 
                            LEFT JOIN panganpokokpasar ON panganpokokharga.nomor = panganpokokpasar.nomor
                            LEFT JOIN panganpokok ON panganpokokharga.kode_pangan = panganpokok.kode
                            WHERE panganpokokharga.kode_pangan = '$pangan1' AND 
                                  panganpokokpasar.kode_pasar = '$pasar1' AND
                                  MONTH(panganpokokpasar.tanggal) = '$bulan1' AND
                                  YEAR(panganpokokpasar.tanggal) = '$tahun1'
                            GROUP BY panganpokokharga.nomor");
  while($b = mysqli_fetch_array($sub2)){
      $rata2 = $rata2 + $b['harga_pangan'];
  }
  $nums = mysqli_num_rows($sub2);
  return $rata2/$nums;
}

if (isset($_POST['kirim'])) {
  $tgl = $_POST['tanggal'];
  $pasar = $_POST['pasar'];
  $pangan = $_POST['pangan'];
  $tanggalbulan = null;
  $bulancek = null;
  $tahuncek = null;
  echo '<div class="panel panel-primary">';
  echo '<div class="panel-body">';
  echo '<h3>Prediksi Harga Pangan</h3>';
  ?>
    <form action="?menu=prediksiharga" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-3">
          <div class="form-group">
            <select name="tanggal" class="form-control">
            <?php
              if($tgl == "2019-10-01"){
                $tanggalbulan = "Oktober 2019";
                echo '<option value="2019-10-01" selected>Oktober 2019</option>
                      <option value="2019-11-01">November 2019</option>
                      <option value="2019-12-01">Desember 2019</option>';
              }else if($tgl == "2019-11-01"){
                $tanggalbulan = "November 2019";
                echo '<option value="2019-10-01">Oktober 2019</option>
                      <option value="2019-11-01" selected>November 2019</option>
                      <option value="2019-12-01">Desember 2019</option>';
              }else if($tgl == "2019-12-01"){
                $tanggalbulan = "Desember 2019";
                echo '<option value="2019-10-01">Oktober 2019</option>
                      <option value="2019-11-01">November 2019</option>
                      <option value="2019-12-01" selected>Desember 2019</option>';
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
            <?php
            $query = mysqli_query($con, 'SELECT * FROM panganpokok WHERE prediksi = "Y"');
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
  $detail = mysqli_fetch_array(mysqli_query($con, 'SELECT * FROM pasar WHERE kode = "'.$pasar.'"'));
  echo "<table width='100%'>
        <tr><th>Kabupaten</th><th>:</th><th>$detail[kabupaten]</th><th>Pasar</th><th>:</th><th>$detail[nama]</th></tr>
        <tr><th>Provinsi</th><th>:</th><th>$detail[provinsi]</th><th>Bulan</th><th>:</th><th>$tanggalbulan</th></tr>
        </table><br>";

  if($tgl == "2019-10-01"){
    echo "<table class='table table-responsive table-hover table-bordered'>";
    echo "<tr><th>Apr 2019</th><th>Mei 2019</th><th>Jun 2019</th><th>Jul 2019</th><th>Ags 2019</th><th>Sep 2019</th><th bgcolor='yellow'>Okt 2019</th></tr>";
    $april = getrata($con, $pangan, $pasar, 4, 2019);
    $mei = getrata($con, $pangan, $pasar, 5, 2019);
    $jun = getrata($con, $pangan, $pasar, 6, 2019);
    $jul = getrata($con, $pangan, $pasar, 7, 2019);
    $agt = getrata($con, $pangan, $pasar, 8, 2019);
    $sep = getrata($con, $pangan, $pasar, 9, 2019);
    $okt = ($april+$mei+$jun+$jul+$agt+$sep)/6;

    echo "<tr><td>Rp. ".number_format($april,2,",",".")."</td>
              <td>Rp. ".number_format($mei,2,",",".")."</td>
              <td>Rp. ".number_format($jun,2,",",".")."</td>
              <td>Rp. ".number_format($jul,2,",",".")."</td>
              <td>Rp. ".number_format($agt,2,",",".")."</td>
              <td>Rp. ".number_format($sep,2,",",".")."</td>
              <td>Rp. ".number_format($okt,2,",",".")."</td></tr>";
    
    echo "</table>";
    echo '<canvas id="myChart" width="300" height="100"></canvas>';
      ?>
      <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Apr - 19', 'Mei - 19', 'Jun - 19', 'Jul - 19', 'Agt - 19', 'Sep - 19', 'Okt - 19'],
                datasets: [{
                    label: 'Prediksi Bulan <?php echo $tanggalbulan; ?>',
                    data: [<?php echo "$april, $mei, $jun, $jul, $agt, $sep, $okt"; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
  <?php
  }else if($tgl == "2019-11-01"){
    echo "<table class='table table-responsive table-hover table-bordered'>";
    echo "<tr><th>Apr 2019</th><th>Mei 2019</th><th>Jun 2019</th><th>Jul 2019</th><th>Ags 2019</th><th>Sep 2019</th><th bgcolor='yellow'>Okt 2019</th><th bgcolor='yellow'>Nov 2019</th></tr>";
    $april = getrata($con, $pangan, $pasar, 4, 2019);
    $mei = getrata($con, $pangan, $pasar, 5, 2019);
    $jun = getrata($con, $pangan, $pasar, 6, 2019);
    $jul = getrata($con, $pangan, $pasar, 7, 2019);
    $agt = getrata($con, $pangan, $pasar, 8, 2019);
    $sep = getrata($con, $pangan, $pasar, 9, 2019);
    $okt = ($april+$mei+$jun+$jul+$agt+$sep)/6;
    $nov = ($mei+$jun+$jul+$agt+$sep+$okt)/6;

    echo "<tr><td>Rp. ".number_format($april,2,",",".")."</td>
              <td>Rp. ".number_format($mei,2,",",".")."</td>
              <td>Rp. ".number_format($jun,2,",",".")."</td>
              <td>Rp. ".number_format($jul,2,",",".")."</td>
              <td>Rp. ".number_format($agt,2,",",".")."</td>
              <td>Rp. ".number_format($sep,2,",",".")."</td>
              <td>Rp. ".number_format($okt,2,",",".")."</td>
              <td>Rp. ".number_format($nov,2,",",".")."</td></tr>";
    echo "</table>";
    echo '<canvas id="myChart" width="300" height="100"></canvas>';
      ?>
      <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Apr - 19', 'Mei - 19', 'Jun - 19', 'Jul - 19', 'Agt - 19', 'Sep - 19', 'Okt - 19', 'Nov - 19'],
                datasets: [{
                    label: 'Prediksi Bulan <?php echo $tanggalbulan; ?>',
                    data: [<?php echo "$april, $mei, $jun, $jul, $agt, $sep, $okt, $nov"; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
  <?php
  }else if($tgl == "2019-12-01"){
    echo "<table class='table table-responsive table-hover table-bordered'>";
    echo "<tr><th>Apr 2019</th><th>Mei 2019</th><th>Jun 2019</th><th>Jul 2019</th><th>Ags 2019</th><th>Sep 2019</th><th bgcolor='yellow'>Okt 2019</th><th bgcolor='yellow'>Nov 2019</th><th bgcolor='yellow'>Des 2019</th></tr>";
    $april = getrata($con, $pangan, $pasar, 4, 2019);
    $mei = getrata($con, $pangan, $pasar, 5, 2019);
    $jun = getrata($con, $pangan, $pasar, 6, 2019);
    $jul = getrata($con, $pangan, $pasar, 7, 2019);
    $agt = getrata($con, $pangan, $pasar, 8, 2019);
    $sep = getrata($con, $pangan, $pasar, 9, 2019);
    $okt = ($april+$mei+$jun+$jul+$agt+$sep)/6;
    $nov = ($mei+$jun+$jul+$agt+$sep+$okt)/6;
    $des = ($jun+$jul+$agt+$sep+$okt+$nov)/6;

    echo "<tr style='font-size:11px'><td>Rp. ".number_format($april,2,",",".")."</td>
              <td>Rp. ".number_format($mei,2,",",".")."</td>
              <td>Rp. ".number_format($jun,2,",",".")."</td>
              <td>Rp. ".number_format($jul,2,",",".")."</td>
              <td>Rp. ".number_format($agt,2,",",".")."</td>
              <td>Rp. ".number_format($sep,2,",",".")."</td>
              <td>Rp. ".number_format($okt,2,",",".")."</td>
              <td>Rp. ".number_format($nov,2,",",".")."</td>
              <td>Rp. ".number_format($des,2,",",".")."</td></tr>";
    echo "</table>";
    echo '<canvas id="myChart" width="300" height="100"></canvas>';
      ?>
      <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Apr - 19', 'Mei - 19', 'Jun - 19', 'Jul - 19', 'Agt - 19', 'Sep - 19', 'Okt - 19', 'Nov - 19', 'Des - 19'],
                datasets: [{
                    label: 'Prediksi Bulan <?php echo $tanggalbulan; ?>',
                    data: [<?php echo "$april, $mei, $jun, $jul, $agt, $sep, $okt, $nov, $des"; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
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
  echo '<h3>Predikti Harga Pangan</h3>';
  ?>
    <form action="?menu=prediksiharga" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-3">
          <div class="form-group">
            <select name="tanggal" class="form-control">
            <option value="2019-10-01">Oktobers 2019</option>
            <option value="2019-11-01">November 2019</option>
            <option value="2019-12-01">Desember 2019</option>
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
            <?php
            $query = mysqli_query($con, 'SELECT * FROM panganpokok WHERE prediksi = "Y"');
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
    <h4 align="center">Output List<br>Prediksi Harga Pangan Pokok</h4>
    <br><br><br><br>
    <br><br><br>
  <?php
  echo '</div>';
}
