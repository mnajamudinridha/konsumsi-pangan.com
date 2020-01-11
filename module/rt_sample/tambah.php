<div class="panel-heading">
    <h3 class="panel-title">
    Tambah RT Sample
    </h3>
</div>
<div class="panel-body">
<form action="module/rt_sample/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode Sample</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Sample">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
  </div>
  <div class="form-group">
    <label for="nama">Jumlah Orang</label>
    <input type="number" class="form-control" name="jumlahorang" placeholder="Jumlah Orang">
  </div>
  <div class="form-group">
    <label for="lokasi">Lokasi</label>
        <select name="lokasi" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM lokasi');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['kode'] == $a['lokasi']) {
                        echo "<option value='$b[kode]' selected>$b[kode] - $b[desa]</option>";
                    } else {
                        echo "<option value='$b[kode]'>$b[kode] - $b[desa]</option>";
                    }
                } ?>
        </select>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
