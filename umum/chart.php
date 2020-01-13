<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Keranjang Belanja</h3>
    </div>
    <div class="panel-body">
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == 'user') {
            echo '<h3 class="panel-title">Hai, <b>'.$_SESSION['nama'].',</b></h3>berikut detail Keranjang Belanja<hr>';
            $query = mysqli_query($con, "SELECT * FROM transaksi WHERE user ='".$_SESSION['username']."' AND tanggal = '".date('Y-m-d')."'");
            $tot = mysqli_num_rows($query);
            echo '<h3 class="panel-title"><b>'.$tot.'</b> Item</h3><hr>';
            echo '<span class="btn-group pull-right" role="group">
              <a data-toggle="tooltip" title="Lihat" class="btn btn-sm btn-primary" href="?menu=checkout">
                <i class="fa fa-eye"></i> Checkout
              </a>
              <a class="btn btn-warning btn-sm" href="module/login/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            </span>';
            echo '';
        } else {
            echo '<h3 class="panel-title">Anda Harus Login Terlebih Dahulu<hr>
            <span class="btn-group pull-right" role="group">
            <a data-toggle="tooltip" class="btn btn-sm btn-primary" href="?menu=login">
              <i class="fa fa-sign-in"></i> Login
            </a>
            <a data-toggle="tooltip" class="btn btn-sm btn-warning" href="?menu=register">
              <i class="fa fa-users"></i> Register
            </a></span>';
        }
        ?>
    </div>
</div>
