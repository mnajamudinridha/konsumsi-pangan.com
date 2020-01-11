<div class="panel-heading">
    <h3 class="panel-title">
    Modul Edit Data Profile
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_SESSION['username'])) {
      $id = $_SESSION['username'];
      $query = mysqli_query($con, "SELECT * FROM admin
                                 WHERE username = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query);

          if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
              echo '<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <strong>Sukses!</strong> Update Profile Sukses
          </div>';
          } ?>


<form action="module/profil/update.php" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username"
           value="<?php echo $a['username'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama"
           value="<?php echo $a['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">No KTP</label>
    <input type="text" class="form-control" name="noktp" placeholder="Nomor KTP"
           value="<?php echo $a['noktp'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">No HP</label>
    <input type="text" class="form-control" name="nohp" placeholder="Nomor HP"
           value="<?php echo $a['nohp'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <input type="text" class="form-control" name="alamat" placeholder="Alamat"
           value="<?php echo $a['alamat'] ?>">
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
