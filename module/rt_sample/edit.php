<div class="panel-heading">
    <h3 class="panel-title">
    Edit RT Sample
    </h3>
</div>
<div class="panel-body">
<?php
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($con, "SELECT * FROM rt_sample
                                 WHERE kode = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/rt_sample/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode RT Sample</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode"
           value="<?php echo $a['kode'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $a['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $a['alamat'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Jumlah Orang</label>
    <input type="number" class="form-control" name="jumlahorang" placeholder="Jumlah Orang" value="<?php echo $a['jumlahorang'] ?>">
  </div>
  <div class="form-group">
    <label for="lokasi">Lokasi</label>
        <select name="lokasi" class="form-control">
          <option value="">-- Pilih Data --</option>
          <?php
                $query = mysqli_query($con, 'SELECT * FROM lokasi');
                while ($b = mysqli_fetch_array($query)) {
                    if ($b['kode'] == $a['lokasi']) {
                        echo "<option value='$b[kode]' selected>$b[kode] - $b[desa]</option>";
                    } else {
                        echo "<option value='$b[kode]'>$b[kode] - $b[desa]</option>";
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
