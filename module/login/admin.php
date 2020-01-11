<div class="panel-heading">
    <h3 class="panel-title">
    Form Login
    </h3>
</div>
<div class="panel-body">
<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'error') {
        $pesan = null;
        if (isset($_GET['salah']) && $_GET['salah'] == 'username') {
            $pesan = 'Username Tidak Terdaftar';
        }
        if (isset($_GET['salah']) && $_GET['salah'] == 'password') {
            $pesan = 'Password Anda Salah';
        }
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <strong>Ops!</strong> Gagal Login, '.$pesan.'</div>';
    }
}
?>
<form action="module/login/loginadmin.php" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username Anda">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary" name="kirim">Login</button>
</form>
</div>
