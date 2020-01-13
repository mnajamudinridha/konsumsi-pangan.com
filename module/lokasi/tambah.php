<div class="panel-heading">
    <h3 class="panel-title">
    Tambah Lokasi
    </h3>
</div>
<div class="panel-body">
<form action="module/lokasi/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Lokasi">
  </div>
  <div class="form-group">
    <label for="lokasi">Wilayah</label>
        <select name="wilayah" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM wilayah');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['id'] == @$a['wilayah']) {
                        echo "<option value='$b[id]' selected>$b[tahun] - $b[kode] - $b[nama]</option>";
                    } else {
                        echo "<option value='$b[id]'>$b[tahun] - $b[kode] - $b[nama]</option>";
                    }
                } ?>
        </select>
  </div>
  <div class="form-group">
    <label for="nama">Desa/Kelurahan</label>
    <input type="text" class="form-control" name="desa" placeholder="Desa/Kelurahan">
  </div>
  <div class="form-group">
    <label for="kategori">Argeokologi</label>
        <select name="argeokologi" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
          $data = array('Pertanian','Perikanan','Lainnya');
          foreach($data as $b){
              if ($b == $a['argeokologi']) {
                  echo "<option value='$b' selected>$b</option>";
              } else {
                  echo "<option value='$b'>$b</option>";
              }
          } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="kategori">Ekonomi</label>
        <select name="ekonomi" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
          $data = array('Maju','Sedang','Tertinggal');
          foreach($data as $b){
              if ($b == $a['ekonomi']) {
                  echo "<option value='$b' selected>$b</option>";
              } else {
                  echo "<option value='$b'>$b</option>";
              }
          } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
