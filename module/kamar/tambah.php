<div class="panel-heading">
    <h3 class="panel-title">
    Modul Tambah Kamar
    </h3>
</div>
<div class="panel-body">
<form action="module/kamar/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode Kamar</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Kamar">
  </div>
  <div class="form-group">
    <label for="kategori">Jenis</label>
        <select name="kategori" class="form-control">
          <option value="">-- Pilih Data --</option>
    <?php
    include 'vendor/autoload.php';
    include 'fungsi/koneksi.php';
    $query = mysqli_query($con, 'SELECT * FROM kategori');
    while ($a = mysqli_fetch_array($query)) {
        echo "<option value='$a[kode]'>$a[kode] - $a[nama]</option>";
    }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Nama Kamar</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Kamar">
  </div>
  <div class="form-group">
    <label for="harga">Harga Kamar</label>
    <input type="text" class="form-control" name="harga" placeholder="Harga Kamar">
  </div>
  <div class="form-group">
    <label for="stok">Fasilitas Kamar</label>
    <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas Kamar">
  </div>
  <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" name="gambar">
    <p class="help-block">Ukuran maksimal 2MB</p>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
