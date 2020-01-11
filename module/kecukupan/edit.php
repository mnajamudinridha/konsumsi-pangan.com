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
      $query = mysqli_query($con, "SELECT * FROM kecukupan
                                 WHERE kode = '$id'");
      $jumlah = mysqli_num_rows($query);
      if ($jumlah > 0) {
          $a = mysqli_fetch_array($query); ?>


<form action="module/kecukupan/update.php?halaman=<?php echo $_GET['halaman']; ?>&cari=<?php echo $_GET['cari']; ?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="kode">Kode Sample</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode"
           value="<?php echo $a['kode'] ?>" readonly="readonly">
  </div>
  <div class="form-group">
        <label for="nama">Tanggal</label>
        <div class="input-group date">
            <input type='text' class="form-control" name='tanggal' id='tanggal' value="<?php echo @$a['tanggal'] ?>">
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
        </div>
  </div>
  <div class="form-group">
    <label for="kode">TK. Energi %</label>
    <input type="text" class="form-control" name="energi" placeholder="Energi"
           value="<?php echo @$a['energi'] ?>">
  </div>
  <div class="form-group">
    <label for="kode">TK. Protein %</label>
    <input type="text" class="form-control" name="protein" placeholder="Protein"
           value="<?php echo @$a['protein'] ?>">
  </div>
  <script>
        $('#tanggal').datepicker({format: "yyyy-mm-dd", calendarWeeks: true, autoclose: true, todayHighlight: true});
  </script>
  <button type="submit" class="btn btn-primary" name="kirim">Update</button>
</form>

 <?php

      } else {
          echo 'Maaf, Id yang di edit tidak ditemukan';
      }
  }
  ?>
</div>
