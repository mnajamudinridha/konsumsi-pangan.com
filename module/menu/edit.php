<div class="panel-heading">
    <h3 class="panel-title">
    Modul Edit Menu
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($con, "SELECT * FROM menu
                                 WHERE id = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/menu/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="id">Id</label>
    <input type="text" class="form-control" name="id" placeholder="Id Menu"
           value="<?php echo $a['id'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama"
           value="<?php echo $a['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="link">Link</label>
    <input type="text" class="form-control" name="link" placeholder="?menu=namamenu"
           value="<?php echo $a['link'] ?>">
  </div>
  <div class="form-group">
    <label for="level">Level</label>
    <select name="level" class="form-control">
      <?php
      if ($a['level'] == 1) {
          echo '<option value="1" selected>Level 1</option>
              <option value="2">Level 2</option>';
      } else {
          echo '<option value="1">Level 1</option>
              <option value="2" selected>Level 2</option>';
      } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="sub">Sub Menu</label>
        <select name="sub" class="form-control">
    <?php
          $query = mysqli_query($con, 'SELECT * FROM menu WHERE level=1');
          while ($b = mysqli_fetch_array($query)) {
              if ($b['id'] == $a['sub']) {
                  echo "<option value='$b[id]' selected>$b[id] - $b[nama]</option>";
              } else {
                  echo "<option value='$b[id]'>$b[id] - $b[nama]</option>";
              }
          } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="level">Level</label>
    <select name="level" class="form-control">
      <?php
      if ($a['level'] == 1) {
          echo '<option value="1" selected>Level 1</option>
              <option value="2">Level 2</option>';
      } else {
          echo '<option value="1">Level 1</option>
              <option value="2" selected>Level 2</option>';
      } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="jenis">Jenis</label>
    <select name="jenis" class="form-control">
      <?php
      if ($a['jenis'] == 'admin') {
          echo '<option value="home">Umum</option>
              <option value="user">User</option>
              <option value="admin" selected>User</option>';
      } elseif ($a['jenis'] == 'user') {
          echo '<option value="home">Umum</option>
              <option value="user" selected>User</option>
              <option value="admin">User</option>';
      } elseif ($a['jenis'] == 'home') {
          echo '<option value="home" selected>Umum</option>
              <option value="user">User</option>
              <option value="admin">User</option>';
      }else{
        echo '<option value="">-- Pilih Data --</option>
            <option value="home">Umum</option>
            <option value="user">User</option>
            <option value="admin">User</option>';
      } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Update</button>
</form>

 <?php

      } else {
          echo 'Maaf, Id yang di edit tidak ditemukan';
      }
  }
  ?>
</div>
