<div class="panel-heading">
    <h3 class="panel-title">
    Edit Data Konsumsi
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($con, "SELECT * FROM konsumsi
                                 WHERE id = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/konsumsi/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
<input type='hidden' name='id' value="<?php echo @$a['id'] ?>">
<div class="form-group">
    <label for="lokasi">Sample</label>
        <select name="sample" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM rt_sample');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['id'] == @$a['sample']) {
                        echo "<option value='$b[id]' selected>$b[id] - $b[nama] - $b[alamat]</option>";
                    } else {
                        echo "<option value='$b[id]'>$b[id] - $b[nama] - $b[alamat]</option>";
                    }
                } ?>
        </select>
  </div>
  <div class="form-group">
    <label for="lokasi">DKBM</label>
        <select name="dkbm" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM dkbm');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['kode'] == @$a['dkbm']) {
                        echo "<option value='$b[kode]' selected>$b[kode] - $b[nama]</option>";
                    } else {
                        echo "<option value='$b[kode]'>$b[kode] - $b[nama]</option>";
                    }
                } ?>
        </select>
  </div>
  <div class="form-group">
    <label for="kode">Berat (gram)</label>
    <input type="number" step="0.01" class="form-control" name="berat" placeholder="Berat (gram)" value="<?php echo @$a['berat']; ?>">
  </div>
  <div class="form-group">
        <label for="nama">Tanggal</label>
        <div class="input-group date">
            <input type='text' class="form-control" name='tanggal' id='tanggal' value="<?php echo @$a['tanggal'] ?>">
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
        </div>
  </div>
  <script>
        $('#tanggal').datepicker({format: "yyyy-mm-dd", calendarWeeks: true, autoclose: true, todayHighlight: true});
  </script>
  <button type="submit" class="btn btn-primary" name="kirim">Update</button>
</form>

 <?php

      } else {
          echo 'Maaf, Id yang di edit tidak ditemukan';
      }
  }
  ?>
</div>
