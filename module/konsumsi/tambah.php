<div class="panel-heading">
    <h3 class="panel-title">
    Tambah Data Konsumsi
    </h3>
</div>
<div class="panel-body">
<form action="module/konsumsi/simpan.php" method="POST" enctype="multipart/form-data">
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
    <label for="kode">Energi / 100g</label>
    <input type="number" step="0.01" class="form-control" name="energi" placeholder="Energi (100g)" value="<?php echo @$a['energi']; ?>">
  </div>
  <div class="form-group">
    <label for="kode">Protein / 100g</label>
    <input type="number" step="0.01" class="form-control" name="protein" placeholder="Protein (100g)" value="<?php echo @$a['protein']; ?>">
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
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
