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
      $query = mysqli_query($con, "SELECT * FROM wilayah
                                 WHERE id = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/wilayah/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $a['id'] ?>">
  <div class="form-group">
    <label for="tahun">Tahun</label>
    <input type="text" class="form-control" name="tahun" placeholder="Tahun" value="<?php echo $a['tahun'] ?>">
  </div>
  <div class="form-group">
    <label for="kode">Kode Wilayah</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Wilayah" value="<?php echo $a['kode'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Wilayah</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Wilayah" value="<?php echo $a['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Penanggung Jawab</label>
    <input type="text" class="form-control" name="penanggungjawab" placeholder="Penanggung Jawab" value="<?php echo $a['penanggungjawab'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Jumlah Penduduk</label>
    <input type="number" class="form-control" name="jumlahpenduduk" placeholder="Jumlah Penduduk" value="<?php echo $a['jumlahpenduduk'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Laju Pertumbuhan</label>
    <input type="text" class="form-control" name="lajupertumbuhan" placeholder="Laju Pertumbuhan" value="<?php echo $a['lajupertumbuhan'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Besar Keluarga</label>
    <input type="number" class="form-control" name="besarkeluarga" placeholder="Besar Keluarga" value="<?php echo $a['besarkeluarga'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">UMR</label>
    <input type="number" class="form-control" name="umr" placeholder="UMR" value="<?php echo $a['umr'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">AKE Konsumsi</label>
    <input type="number" class="form-control" name="ake_konsumsi" placeholder="AKE Konsumsi" value="<?php echo $a['ake_konsumsi'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">AKP Konsumsi</label>
    <input type="number" class="form-control" name="akp_konsumsi" placeholder="AKP Konsumsi" value="<?php echo $a['akp_konsumsi'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">AKE Ketersediaan</label>
    <input type="number" class="form-control" name="ake_ketersediaan" placeholder="AKE Ketersediaan" value="<?php echo $a['ake_ketersediaan'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">AKP Ketersediaan</label>
    <input type="number" class="form-control" name="akp_ketersediaan" placeholder="AKP Ketersediaan" value="<?php echo $a['akp_ketersediaan'] ?>">
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
