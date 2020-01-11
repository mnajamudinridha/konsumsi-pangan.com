<?php
session_start();
date_default_timezone_set('Asia/Makassar');
include 'vendor/autoload.php';
include 'fungsi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Penginapan Qarina Banjarbaru</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet">
        <link href="bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="source/favicon.png" sizes="16x16">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="system/tinymce/tinymce.min.js"></script>
                  <script type="text/javascript">
                    tinymce.init({
                    selector: ".mytextarea",
                    theme: "modern",
                    plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager sh4tinymce preview wordcount"
                ],
                toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | link unlink anchor | responsivefilemanager image media sh4tinymce preview | forecolor backcolor print emoticons",
                image_advtab: true,
                external_filemanager_path: "<?php echo getenv('file_external'); ?>",
                filemanager_title: "Filemanager",
                external_plugins: {"filemanager": "<?php echo getenv('file_manager'); ?>"}
            });
        </script>
    </head>
    <body>
          <div class="container"><br>
            <div class="row">
                <div class="col-md-3">
                  <?php include 'umum/alamat.php'; ?>
                  <?php include 'navigasi.php'; ?>
                </div>
                <div class="col-md-9">
                  <div class="panel panel-primary">
                    <img src="source/header.png" width="100%" class="img-responsive" style="max-height:147px;border-radius:4px;">
                  </div>
                  <?php
                  include 'umum/breadcrumbs.php';
                  if (isset($_GET['pesan'])) {
                      include 'umum/pesan.php';
                  }
                  ?>
                <div class="col-md-12">
                  <div class="row">
                  <?php include 'konten.php'; ?>
                </div>
                </div> <!-- tutup dari col-md-8 -->
              </div>
            </div><!-- tutup dari row -->
            <footer class="footer">
  <div class="container">
    <p class="text-muted" style="color:#ffffff">&copy 2019 Penginapan Qarina Banjarbaru</p>
  </div>
</footer>
            </div>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>