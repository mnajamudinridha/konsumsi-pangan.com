<div class="panel-heading">
    <h3 class="panel-title">
    Modul Tambah Halaman
    </h3>
</div>
<div class="panel-body">
<form action="module/halaman/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" name="judul" placeholder="Judul">
  </div>
  <div class="form-group">
    <label for="isi">Isi Halaman</label>
    <textarea name="isi" class="mytextarea" rows=5></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
