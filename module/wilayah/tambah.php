<div class="panel-heading">
    <h3 class="panel-title">
    Tambah Wilayah
    </h3>
</div>
<div class="panel-body">
<form action="module/wilayah/simpan.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="tahun">Tahun</label>
    <input type="text" class="form-control" name="tahun" placeholder="Tahun">
  </div>
  <div class="form-group">
    <label for="kode">Kode Wilayah</label>
    <input type="text" class="form-control" name="kode" placeholder="Kode Wilayah">
  </div>
  <div class="form-group">
    <label for="nama">Nama Wilayah</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Wilayah">
  </div>
  <div class="form-group">
    <label for="nama">Penanggung Jawab</label>
    <input type="text" class="form-control" name="penanggungjawab" placeholder="Penanggung Jawab">
  </div>
  <div class="form-group">
    <label for="nama">Jumlah Penduduk</label>
    <input type="number" class="form-control" name="jumlahpenduduk" placeholder="Jumlah Penduduk">
  </div>
  <div class="form-group">
    <label for="nama">Laju Pertumbuhan</label>
    <input type="text" class="form-control" name="lajupertumbuhan" placeholder="Laju Pertumbuhan">
  </div>
  <div class="form-group">
    <label for="nama">Besar Keluarga</label>
    <input type="number" class="form-control" name="besarkeluarga" placeholder="Besar Keluarga">
  </div>
  <div class="form-group">
    <label for="nama">UMR</label>
    <input type="number" class="form-control" name="umr" placeholder="UMR">
  </div>
  <div class="form-group">
    <label for="nama">AKE Konsumsi</label>
    <input type="number" class="form-control" name="ake_konsumsi" placeholder="AKE Konsumsi">
  </div>
  <div class="form-group">
    <label for="nama">AKP Konsumsi</label>
    <input type="number" class="form-control" name="akp_konsumsi" placeholder="AKP Konsumsi">
  </div>
  <div class="form-group">
    <label for="nama">AKE Ketersediaan</label>
    <input type="number" class="form-control" name="ake_ketersediaan" placeholder="AKE Ketersediaan">
  </div>
  <div class="form-group">
    <label for="nama">AKP Ketersediaan</label>
    <input type="number" class="form-control" name="akp_ketersediaan" placeholder="AKP Ketersediaan">
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Simpan</button>
</form>
</div>
