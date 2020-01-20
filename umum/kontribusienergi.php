<?php

if (isset($_POST['kirim'])) {
  $jenis = $_POST['jenis'];

  echo '<div class="panel panel-primary">';
  echo '<div class="panel-heading">
  <h3 class="panel-title">
  Kontribusi Energi DKBM
  </h3>
  </div>';
  echo '<div class="panel-body">';
  ?>
  <form action="?menu=kontribusienergi" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-10">
          <div class="form-group">
            <select name="jenis" class="form-control">
            <option value=''>-- Semua Kelompok Jenis Pangan --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM jenispangan');
            while ($a = mysqli_fetch_array($query)) {
                if($a['kode'] == $jenis){
                  echo "<option value='$a[kode]' selected>$a[kode] - $a[nama]</option>";
                }else{
                  echo "<option value='$a[kode]'>$a[kode] - $a[nama]</option>";
                }
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-2">
      <button type="submit" class="btn btn-primary pull-right" name="kirim">Proses</button>
      </div>
    </div>
    </form>
    <button class="btn btn-success pull-right" onclick="print()">Print</button><br><br><br>
  <?php
  // $datasets = null;
  // $labels = null;
  echo "<div id='printarea'>";
  echo "<table class='table table-responsive table-hover table-bordered' style='font-size:12px' width='100%' border='1'>";
  echo "<tr><th rowspan=2>Kode</th><th rowspan=2>Nama</th><th rowspan=2>Jenis</th><th colspan=2>DKBM per 100 gram</th><th rowspan=2>RKEPOK</th><th rowspan=2>KEPOK</th></tr>";
  echo "<tr><th>Energi (KKal)</th><th>Protein (gram)</th></tr>";
  if($jenis == ""){
    $query = mysqli_query($con, "SELECT dkbm.*, jenispangan.nama as jenispangannama,
                                 SUM(konsumsi.berat) as konsumsiberat,
                                 (SUM(konsumsi.berat)*100)/(SELECT SUM(konsumsi.berat) FROM konsumsi) as konsumsipersen
                                 FROM dkbm 
                                 LEFT JOIN jenispangan ON dkbm.jenis = jenispangan.kode
                                 LEFT JOIN konsumsi ON dkbm.kode = konsumsi.dkbm
                                 LEFT JOIN rt_sample ON konsumsi.sample = rt_sample.id
                                 GROUP BY dkbm.kode
                                 ORDER BY dkbm.jenis, dkbm.kode");
      
  } else {
    $query = mysqli_query($con, "SELECT dkbm.*, jenispangan.nama as jenispangannama,
                                 SUM(konsumsi.berat) as konsumsiberat,
                                 (SUM(konsumsi.berat)*100)/(SELECT SUM(konsumsi.berat) FROM konsumsi) as konsumsipersen
                                 FROM dkbm 
                                 LEFT JOIN jenispangan ON dkbm.jenis = jenispangan.kode
                                 LEFT JOIN konsumsi ON dkbm.kode = konsumsi.dkbm
                                 LEFT JOIN rt_sample ON konsumsi.sample = rt_sample.id
                                 WHERE dkbm.jenis = '$jenis'
                                 GROUP BY dkbm.kode
                                 ORDER BY dkbm.jenis, dkbm.kode");
  }
      while($a = mysqli_fetch_array($query)){
        echo "<tr><td>$a[kode]</td><td>$a[nama]</td><td>$a[jenispangannama]</td><td>$a[energi]</td><td>$a[protein]</td>";
        echo "<th>".number_format($a['konsumsiberat'],0,",",".")."</th>";
        echo "<th>".number_format($a['konsumsipersen'],0,",",".")."%</th>";
        echo "</tr>";
      }
      echo "</table>";

  echo '</div>';
  echo '<div class="col-md-5 pull-right">Penanggung Jawab<br><br><br><br><br><br>Dinas Ketahanan Pangan Kab. Banjar</div>';
  echo '</div>';
  echo '</div>';
} else {
  echo '<div class="panel panel-primary">';
  echo '<div class="panel-heading">
  <h3 class="panel-title">
  Kontribusi Energi DKBM
  </h3>
  </div>';
  echo '<div class="panel-body">';
  ?>
    <form action="?menu=kontribusienergi" method="POST"  enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-10">
          <div class="form-group">
            <select name="jenis" class="form-control">
            <option value=''>-- Semua Kelompok Jenis Pangan --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM jenispangan');
            while ($a = mysqli_fetch_array($query)) {
                if($a['kode'] == $jenis){
                  echo "<option value='$a[kode]' selected>$a[kode] - $a[nama]</option>";
                }else{
                  echo "<option value='$a[kode]'>$a[kode] - $a[nama]</option>";
                }
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
    <h4 align="center">Output Data<br>Kontribusi Energi</h4>
    <br><br><br><br>
    <br><br><br>
  <?php
  echo '</div>';
  echo '</div>';
}
