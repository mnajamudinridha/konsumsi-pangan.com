<div class="panel-heading">
    <h3 class="panel-title">
    Modul Tambah Pelanggan
    </h3>
</div>
<div class="panel-body">
<form action="module/user/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="nama">No HP</label>
    <input type="text" class="form-control" name="nohp" placeholder="Nomor HP">
  </div>
  <div class="form-group">
    <label for="nama">No KTP</label>
    <input type="text" class="form-control" name="noktp" placeholder="Nomor KTP">
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
  </div>
  <input type="hidden" name="level" value='user'>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
