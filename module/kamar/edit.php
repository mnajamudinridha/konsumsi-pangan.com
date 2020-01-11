<div class="panel-heading">
    <h3 class="panel-title">
    Modul Edit Kamar
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($con, "SELECT * FROM kamar
                                 WHERE kode = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query);
          ?>


<form action="module/kamar/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Kamar"
           value="<?php echo $a['kode'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="kategori">Jenis</label>
        <select name="kategori" class="form-control">
          <option value="">-- Pilih Data --</option>
    <?php
          $query = mysqli_query($con, 'SELECT * FROM kategori');
          while ($b = mysqli_fetch_array($query)) {
              if ($b['kode'] == $a['kategori']) {
                  echo "<option value='$b[kode]' selected>$b[kode] - $b[nama]</option>";
              } else {
                  echo "<option value='$b[kode]'>$b[kode] - $b[nama]</option>";
              }
          } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Kamar"
           value="<?php echo $a['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="harga">Harga</label>
    <input type="text" class="form-control" name="harga" placeholder="Harga Kamar"
           value="<?php echo $a['harga'] ?>">
  </div>
  <div class="form-group">
    <label for="stok">Fasilitas</label>
    <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas Kamar"
           value="<?php echo $a['fasilitas'] ?>">
  </div>
  <?php
  if (!empty($a['gambar'])) {
    echo '<div class="form-group">
          <label for="ket">Gambar Kamar</label>';
    echo "<div class=''><img src='file/image/thumb_".$a['gambar']."' width=300></div>";
    echo '</div>';
    echo '<div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar">
          <p class="help-block">Ukuran maksimal 2MB</p>
          </div>';
  }else{
    echo '<div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar">
          <p class="help-block">Ukuran maksimal 2MB</p>
          </div>';
  } ?>
  <button type="submit" class="btn btn-primary" name="kirim">Update</button>
</form>

 <?php

      } else {
          echo 'Maaf, Id yang di edit tidak ditemukan';
      }
  }
  ?>
</div>
