<div class="panel-heading">
    <h3 class="panel-title">
    Tambah DKBM
    </h3>
</div>
<div class="panel-body">
<form action="module/dkbm/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode DKBM">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama DKBM">
  </div>
  <div class="form-group">
    <label for="lokasi">Jenis Pangan</label>
        <select name="jenis" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM jenispangan');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['kode'] == @$a['jenis']) {
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
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
