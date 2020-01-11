<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">List Resevasi Kamar</h3>
    </div>
    <div class="panel-body">
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == 'user') {
            echo '<h3 class="panel-title">Hai, <b>'.$_SESSION['nama'].',</b></h3>berikut detail Resevasi Kamar<hr>';
            $query = mysqli_query($con, 'SELECT transaksi.* FROM transaksi LEFT JOIN kamar ON transaksi.kamar = kamar.kode WHERE user="'.$_SESSION['username'].'" AND kamar.status = "N"');
            $tot = mysqli_num_rows($query);
            echo '<h3 class="panel-title"><b>'.$tot.'</b> Item</h3><hr>';
            echo '<span class="btn-group pull-right" role="group">
              <a data-toggle="tooltip" title="Lihat" class="btn btn-sm btn-primary" href="?menu=konfirmasi">
                <i class="fa fa-eye"></i> Checkout
              </a>
            </span>';
            echo '';
        } else {
            echo '<h3 class="panel-title">Anda Harus Login Terlebih Dahulu<hr>
            <span class="btn-group pull-right" role="group">
            <a data-toggle="tooltip" class="btn btn-sm btn-primary" href="?menu=login">
              <i class="fa fa-sign-in"></i> Login
            </a></span>';
        }
        ?>
    </div>
</div>
