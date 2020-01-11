<div class="panel-heading">
    <h3 class="panel-title">
    Modul Cetak Laporan
    </h3>
</div>
<div class="panel-body">
<form action="module/laporan/lihat.php" method="GET" enctype="multipart/form-data">
  <div  class="customform">
  <div class="form-group">
    <label for="laporan">Jenis Laporan</label>
    <select name="laporan" class="form-control laporan">
      <option value="user">Semua Pelanggan</option>
      <option value="kamar">Semua Kamar</option>
      <option value="pembayaran">Semua Pembayaran</option>
      <option value="tamu">Semua Tamu</option>
      <option value="periode">Semua Tamu Per Periode</option>
    </select>
  </div>
</div>
  <button type="submit" class="btn btn-primary" name="kirim">Cetak</button>
</form>
</div>
<script>
$('.laporan').on('change', function() {
  if(this.value == "detail"){
    $('.customform').append('<div class="form-group hilang">'+
                            '<label for="laporan">Pilih User</label>'+
                            '<select name="user" class="form-control">'+
                            '<?php
                              $query = mysqli_query($con, 'SELECT * FROM transaksi GROUP BY user');
                              while($a = mysqli_fetch_array($query)){
                                echo "<option value=$a[user]>$a[user]</option>";
                              }
                            ?>'+
                            '</select>'+
                            '</div>');
    $('.customform').append('<div class="form-group hilang">'+
                            '<label for="laporan">Pilih Tanggal</label>'+
                            '<select name="tanggal" class="form-control">'+
                            '<?php
                              $query = mysqli_query($con, 'SELECT * FROM transaksi GROUP BY tanggal');
                              while($a = mysqli_fetch_array($query)){
                                echo "<option value=$a[tanggal]>$a[tanggal]</option>";
                              }
                            ?>'+
                            '</select>'+
                            '</div>');
  } else if(this.value == "periode"){
    $('.customform').append('<div class="form-group hilang">'+
                            '<label for="laporan">Tanggal Reservasi Awal</label>'+
                            '<input type="date" name="tanggalawal" class="form-control">'+
                            '</div>');
    $('.customform').append('<div class="form-group hilang">'+
                            '<label for="date">Tanggal Reservasi Akhir</label>'+
                            '<input type="date" name="tanggalakhir" class="form-control">'+
                            '</div>');
  } else{
    $('.hilang').empty();
  }
})
</script>
