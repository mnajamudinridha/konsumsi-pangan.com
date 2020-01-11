<div class="panel-heading">
    <h3 class="panel-title">
    Modul Tambah Menu
    </h3>
</div>
<div class="panel-body">
<form action="module/menu/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Menu">
  </div>
  <div class="form-group">
    <label for="link">Link</label>
    <input type="text" class="form-control" name="link" placeholder="Link Menu">
  </div>
  <div class="form-group">
    <label for="level">Level</label>
    <select name="level" class="form-control">
      <option value="1">Level 1</option>
      <option value="2">Level 2</option>
    </select>
  </div>
  <div class="form-group">
    <label for="sub">Sub Menu</label>
        <select name="sub" class="form-control">
    <?php
    include 'vendor/autoload.php';
    include 'fungsi/koneksi.php';
    $query = mysqli_query($con, 'SELECT * FROM menu WHERE level=1');
    while ($a = mysqli_fetch_array($query)) {
        echo "<option value='$a[id]'>$a[id] - $a[nama]</option>";
    }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="jenis">Jenis</label>
    <select name="jenis" class="form-control">
      <option value="home">Umum</option>
      <option value="user">User</option>
      <option value="admin">User</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
