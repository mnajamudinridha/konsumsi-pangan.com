<div class="panel-heading">
    <h3 class="panel-title">
    Modul Tambah Menu
    </h3>
</div>
<div class="panel-body">
<form action="module/kecukupan/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="lokasi">Kode Sample</label>
        <select name="kode" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM rt_sample');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['kode'] == @$a['kode']) {
                        echo "<option value='$b[kode]' selected>$b[kode] - $b[nama]</option>";
                    } else {
                        echo "<option value='$b[kode]'>$b[kode] - $b[nama]</option>";
                    }
                } ?>
        </select>
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
  <div class="form-group">
    <label for="kode">TK. Energi %</label>
    <input type="text" class="form-control" name="energi" placeholder="Energi"
           value="<?php echo @$a['energi'] ?>">
  </div>
  <div class="form-group">
    <label for="kode">TK. Protein %</label>
    <input type="text" class="form-control" name="protein" placeholder="Protein"
           value="<?php echo @$a['protein'] ?>">
  </div>
  <script>
        $('#tanggal').datepicker({format: "yyyy-mm-dd", calendarWeeks: true, autoclose: true, todayHighlight: true});
  </script>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
