<div class="panel-heading">
    <h3 class="panel-title">
    Tambah Jenis Pangan
    </h3>
</div>
<div class="panel-body">
<form action="module/jenispangan/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Jenis Pangan">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Jenis Pangan">
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
