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
              Manajemen Resevasi<br><br>
              <a href="index.php?menu=kamar" class="list-group-item">Manajemen Kamar</a>
              <a href="index.php?menu=transaksi" class="list-group-item">Manajemen Reservasi</a>
              <a href="index.php?menu=pembayaran" class="list-group-item">Manajemen Pembayaran</a>
              <br>
              Master Data<br><br>
              <a href="index.php?menu=admin" class="list-group-item">Data User</a>
              <a href="index.php?menu=user" class="list-group-item">Data Pelanggan</a>
              <a href="index.php?menu=halaman" class="list-group-item">Data Halaman</a>
              <a href="index.php?menu=laporan" class="list-group-item">Data Laporan</a>
              <br>
              Data Akun<br><br>
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
            <a href="index.php" class="list-group-item">Home</a>
            <a href="index.php?menu=page&id=2" class="list-group-item">Profil Kami</a>
            <a href="index.php?menu=page&id=3" class="list-group-item">Cara Resevasi</a>
            <a href="index.php?menu=page&id=4" class="list-group-item">Kontak Kami</a>
            <br><br>
          Menu Resevasi<br><br>
          <a href="index.php?menu=detailsemuakamar" class="list-group-item">List Semua Kamar</a>
          <a href="index.php?menu=register" class="list-group-item">Registrasi User</a>
          <a href="index.php?menu=login" class="list-group-item">Login User/User</a>
          <?php
        }
         ?>
      </div>
    </div>
  </div>
