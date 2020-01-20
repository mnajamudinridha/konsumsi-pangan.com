<?php

if (isset($_POST['kirim'])) {
  $kode = $_POST['kode'];
  $sample = $_POST['sample'];

  echo '<div class="panel panel-primary">';
  echo '<div class="panel-heading">
  <h3 class="panel-title">
  Tingkat Kecukupan
  </h3>
  </div>';
  echo '<div class="panel-body">';
  ?>
  <form action="?menu=tingkatkecukupan" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-5">
          <div class="form-group">
            <select name="kode" class="form-control">
            <option value=''>-- Semua Lokasi --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM lokasi');
            while ($a = mysqli_fetch_array($query)) {
                if($a['kode'] == $kode){
                  echo "<option value='$a[kode]' selected>$a[kode] - $a[desa]</option>";
                }else{
                  echo "<option value='$a[kode]'>$a[kode] - $a[desa]</option>";
                }
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-5">
          <div class="form-group">
            <select name="sample" class="form-control">
            <option value=''>-- Semua Sample --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM rt_sample');
            while ($a = mysqli_fetch_array($query)) {
                if($a['id'] == $sample){
                  echo "<option value='$a[id]' selected>$a[id] - $a[nama]</option>";
                }else{
                  echo "<option value='$a[id]'>$a[id] - $a[nama]</option>";
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
  if($kode == "" && $sample == ""){
    echo "<table class='table table-responsive table-hover table-bordered' style='font-size:12px'  width='100%' border='1'>";
    echo "<tr><th rowspan=2>Kode</th><th rowspan=2>Nama</th><th rowspan=2>Alamat</th><th rowspan=2>Orang</th><th colspan=2>Total Konsumsi</th><th colspan=2>Konsumsi Perkapita</th><th colspan=2>Tingkat Kecukupan</th></tr>";
    echo "<tr><th>Energi</th><th>Protein</th><th>Energi</th><th>Protein</th><th>Energi(%)</th><th>Protein(%)</th></tr>";
    $query = mysqli_query($con, "SELECT rt_sample.*,
                                        konsumsi.berat as konsumsiberat,
                                        konsumsi.tanggal as konsumsitanggal,
                                        SUM(dkbm.energi) as dkbmenergi,
                                        SUM(dkbm.protein) as dkbmprotein,
                                        SUM(((konsumsi.berat*dkbm.energi)/100)) as totalkonsumsienergi,
                                        SUM(((konsumsi.berat*dkbm.protein)/100)) as totalkonsumsiprotein,
                                        SUM(((konsumsi.berat*dkbm.energi)/100)/rt_sample.jumlahorang) as perkapitakonsumsienergi,
                                        SUM(((konsumsi.berat*dkbm.protein)/100)/rt_sample.jumlahorang) as perkapitakonsumsiprotein
                                 FROM rt_sample
                                 LEFT JOIN konsumsi ON rt_sample.id = konsumsi.sample
                                 LEFT JOIN dkbm ON dkbm.kode = konsumsi.dkbm
                                 GROUP BY rt_sample.id");
      $subwil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM wilayah LIMIT 1"));
      while($a = mysqli_fetch_array($query)){
        echo "<tr><td>$a[id]</td><td>$a[nama]</td><td>$a[alamat]</td><td>$a[jumlahorang]</td>";
        echo "<td>".number_format($a['totalkonsumsienergi'],0,",",".")."</td><td>".number_format($a['totalkonsumsiprotein'],2,",",".")."</td>";
        echo "<td>".number_format($a['perkapitakonsumsienergi'],0,",",".")."</td><td>".number_format($a['perkapitakonsumsiprotein'],2,",",".")."</td>";
        echo "<th>".number_format(($a['perkapitakonsumsienergi']/$subwil['ake_konsumsi']),2,",",".")." %</th><th>".number_format(($a['perkapitakonsumsiprotein']/$subwil['akp_konsumsi']),2,",",".")." %</th></tr>";
      }
      echo "</table>";
  } else if($sample != ""){
    echo "<table class='table table-responsive table-hover table-bordered' style='font-size:12px' width='100%' border='1'>";
    echo "<tr><th rowspan=2>Kode</th><th rowspan=2>Nama</th><th rowspan=2>Alamat</th><th rowspan=2>Orang</th><th colspan=2>Total Konsumsi</th><th colspan=2>Konsumsi Perkapita</th></tr>";
    echo "<tr><th>Energi</th><th>Protein</th><th>Energi</th><th>Protein</th></tr>";
    $query = mysqli_query($con, "SELECT rt_sample.*,
                                        konsumsi.berat as konsumsiberat,
                                        konsumsi.tanggal as konsumsitanggal,
                                        dkbm.energi as dkbmenergi,
                                        dkbm.protein as dkbmprotein,
                                        ((konsumsi.berat*dkbm.energi)/100) as totalkonsumsienergi,
                                        ((konsumsi.berat*dkbm.protein)/100) as totalkonsumsiprotein,
                                        ((konsumsi.berat*dkbm.energi)/100)/rt_sample.jumlahorang as perkapitakonsumsienergi,
                                        ((konsumsi.berat*dkbm.protein)/100)/rt_sample.jumlahorang as perkapitakonsumsiprotein
                                    FROM rt_sample
                                    LEFT JOIN konsumsi ON rt_sample.id = konsumsi.sample
                                    LEFT JOIN dkbm ON dkbm.kode = konsumsi.dkbm
                                    WHERE rt_sample.id = '$sample'");    
    $subwil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM wilayah LIMIT 1"));
    $totenergi = null;
    $totprotein = null;
    $konenergi = null;
    $konprotein = null;
    while($a = mysqli_fetch_array($query)){
      $totenergi = $totenergi+$a['totalkonsumsienergi'];
      $totprotein = $totprotein+$a['totalkonsumsiprotein'];
      $konenergi = $konenergi+$a['perkapitakonsumsienergi'];
      $konprotein = $konprotein+$a['perkapitakonsumsiprotein'];
      echo "<tr><td>$a[id]</td><td>$a[nama]</td><td>$a[alamat]</td><td>$a[jumlahorang]</td>";
      echo "<td>".number_format($a['totalkonsumsienergi'],0,",",".")."</td><td>".number_format($a['totalkonsumsiprotein'],2,",",".")."</td>";
      echo "<td>".number_format($a['perkapitakonsumsienergi'],0,",",".")."</td><td>".number_format($a['perkapitakonsumsiprotein'],2,",",".")."</td></tr>";
    }
    echo "<tr><th colspan=4>Total</th>
    <th>".number_format($totenergi,0,",",".")."</th>
    <th>".number_format($totprotein,2,",",".")."</th>
    <th>".number_format($konenergi,0,",",".")."</th>
    <th>".number_format($konprotein,2,",",".")."</th>
    </tr>";
    echo "<tr><th colspan=6>Tingkat Kecukupan</th>
    <th>".number_format($konenergi/$subwil['ake_konsumsi'],2,",",".")." %</th>
    <th>".number_format($konprotein/$subwil['akp_konsumsi'],2,",",".")." %</th>
    </tr>";
    echo "</table>";
  } else {
    echo "<table class='table table-responsive table-hover table-bordered' style='font-size:12px' width='100%' border='1'>";
    echo "<tr><th rowspan=2>Kode</th><th rowspan=2>Nama</th><th rowspan=2>Alamat</th><th rowspan=2>Orang</th><th colspan=2>Total Konsumsi</th><th colspan=2>Konsumsi Perkapita</th><th colspan=2>Tingkat Kecukupan</th></tr>";
    echo "<tr><th>Energi</th><th>Protein</th><th>Energi</th><th>Protein</th><th>Energi(%)</th><th>Protein(%)</th></tr>";
    $query = mysqli_query($con, "SELECT rt_sample.*,
                                        konsumsi.berat as konsumsiberat,
                                        konsumsi.tanggal as konsumsitanggal,
                                        SUM(dkbm.energi) as dkbmenergi,
                                        SUM(dkbm.protein) as dkbmprotein,
                                        SUM(((konsumsi.berat*dkbm.energi)/100)) as totalkonsumsienergi,
                                        SUM(((konsumsi.berat*dkbm.protein)/100)) as totalkonsumsiprotein,
                                        SUM(((konsumsi.berat*dkbm.energi)/100)/rt_sample.jumlahorang) as perkapitakonsumsienergi,
                                        SUM(((konsumsi.berat*dkbm.protein)/100)/rt_sample.jumlahorang) as perkapitakonsumsiprotein
                                    FROM rt_sample
                                    LEFT JOIN konsumsi ON rt_sample.id = konsumsi.sample
                                    LEFT JOIN dkbm ON dkbm.kode = konsumsi.dkbm
                                    WHERE rt_sample.lokasi = '$kode'
                                    GROUP BY rt_sample.id");
    $subwil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM wilayah LIMIT 1"));
    while($a = mysqli_fetch_array($query)){
      echo "<tr><td>$a[id]</td><td>$a[nama]</td><td>$a[alamat]</td><td>$a[jumlahorang]</td>";
      echo "<td>".number_format($a['totalkonsumsienergi'],0,",",".")."</td><td>".number_format($a['totalkonsumsiprotein'],2,",",".")."</td>";
      echo "<td>".number_format($a['perkapitakonsumsienergi'],0,",",".")."</td><td>".number_format($a['perkapitakonsumsiprotein'],2,",",".")."</td>";
      echo "<th>".number_format(($a['perkapitakonsumsienergi']/$subwil['ake_konsumsi']),2,",",".")." %</th><th>".number_format(($a['perkapitakonsumsiprotein']/$subwil['akp_konsumsi']),2,",",".")." %</th></tr>";
    }
    echo "</table>";
  }
  echo '</div>';
  echo '<div class="col-md-5 pull-right">Penanggung Jawab<br><br><br><br><br><br>Dinas Ketahanan Pangan Kab. Banjar</div>';
  echo '</div>';
  echo '</div>';
} else {
  echo '<div class="panel panel-primary">';
  echo '<div class="panel-heading">
  <h3 class="panel-title">
  Tingkat Kecukupan
  </h3>
  </div>';
  echo '<div class="panel-body">';
  ?>
    <form action="?menu=tingkatkecukupan" method="POST"  enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-5">
          <div class="form-group">
            <select name="kode" class="form-control">
            <option value=''>-- Semua Lokasi --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM lokasi');
            while ($a = mysqli_fetch_array($query)) {
                if($a['kode'] == $kode){
                  echo "<option value='$a[kode]' selected>$a[kode] - $a[desa]</option>";
                }else{
                  echo "<option value='$a[kode]'>$a[kode] - $a[desa]</option>";
                }
            }
            ?>
            </select>
        </div>
      </div>
      <div class="col-md-5">
          <div class="form-group">
            <select name="sample" class="form-control">
            <option value=''>-- Semua Sample --</option>
            <?php
            $query = mysqli_query($con, 'SELECT * FROM rt_sample');
            while ($a = mysqli_fetch_array($query)) {
                if($a['id'] == $sample){
                  echo "<option value='$a[id]' selected>$a[id] - $a[nama]</option>";
                }else{
                  echo "<option value='$a[id]'>$a[id] - $a[nama]</option>";
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
    <h4 align="center">Output Data<br>Tingkat Kecukupan</h4>
    <br><br><br><br>
    <br><br><br>
  <?php
  echo '</div>';
  echo '</div>';
}
