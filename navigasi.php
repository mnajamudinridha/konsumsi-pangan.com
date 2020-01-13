<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Navigasi Situs</h3>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <?php
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == 'admin') {
              ?>
              Data Master<br><br>
              <a href="index.php" class="list-group-item">Beranda</a>
              <a href="index.php?menu=wilayah" class="list-group-item">Data Wilayah</a>
              <a href="index.php?menu=lokasi" class="list-group-item">Data Lokasi</a>
              <a href="index.php?menu=rt_sample" class="list-group-item">Data RT Sample</a>
              <a href="index.php?menu=jenispangan" class="list-group-item">Data Jenis Pangan</a>
              <a href="index.php?menu=dkbm" class="list-group-item">Data DKBM</a>
              <br>
              Data Website<br><br>
              <a href="index.php?menu=admin" class="list-group-item">Data Admin</a>
              <a href="index.php?menu=halaman" class="list-group-item">Data Halaman</a>
              <a href="index.php?menu=gantidata" class="list-group-item">Ganti Data</a>
              <a href="module/login/logout.php" class="list-group-item">Logout</a>
              <?php
            } else {
              ?>
              Menu Utama<br><br>
              <a href="index.php" class="list-group-item">Home</a>
              <a href="index.php?menu=page&id=2" class="list-group-item">Profil Kami</a>
              <a href="index.php?menu=page&id=3" class="list-group-item">Cara Resevasi</a>
              <a href="index.php?menu=page&id=4" class="list-group-item">Kontak Kami</a>
              <br><br>
              Resevasi Kamar<br><br>
              <a href="index.php?menu=detailsemuakamar" class="list-group-item">Resevasi Kamar</a>
              <br><br>
              Data Akun<br><br>
              <a href="index.php?menu=gantidata" class="list-group-item">Ganti Data</a>
              <a href="module/login/logout.php" class="list-group-item">Logout</a>
              <?php
            }
        } else {
            ?>
            Menu Utama<br><br>
            <a href="index.php" class="list-group-item">Beranda</a>
            <a href="index.php?menu=page&id=2" class="list-group-item">Tentang Gizi</a>
            <a href="index.php?menu=page&id=3" class="list-group-item">Tentang B2SA</a>
            <a href="index.php?menu=page&id=4" class="list-group-item">Tentang Pola Konsumsi</a>
            <br><br>
            Menu PPH<br><br>
            <a href="index.php" class="list-group-item">Beranda</a>
            <a href="index.php?menu=page&id=2" class="list-group-item">Tentang Gizi</a>
            <a href="index.php?menu=page&id=3" class="list-group-item">Tentang B2SA</a>
            <a href="index.php?menu=page&id=4" class="list-group-item">Tentang Pola Konsumsi</a>
            <br><br>
            Menu Akun<br><br>
          <a href="index.php?menu=login" class="list-group-item">Login Admin</a>
          <?php
        }
         ?>
      </div>
    </div>
  </div>
