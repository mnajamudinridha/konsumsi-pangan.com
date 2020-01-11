<div class="panel-heading">
    <h3 class="panel-title">
    Edit Lokasi
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($con, "SELECT * FROM lokasi
                                 WHERE kode = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/lokasi/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode Lokasi</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Lokasi"
           value="<?php echo $a['kode'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="nama">Desa/Kelurahan</label>
    <input type="text" class="form-control" name="desa" placeholder="Desa/Kelurahan"
           value="<?php echo $a['desa'] ?>">
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
  <button type="submit" class="btn btn-primary" name="kirim">Update</button>
</form>

 <?php

      } else {
          echo 'Maaf, Id yang di edit tidak ditemukan';
      }
  }
  ?>
</div>
