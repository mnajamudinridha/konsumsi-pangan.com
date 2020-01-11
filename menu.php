<nav class="navbar navbar-default">
  <img src="source/header.jpg" class="img-responsive" width="100%" style="max-height:400px;">
    <div class="container">
        <!-- Brand and toggle get grouped for better kamare display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Penginapan Qarina Banjarbaru</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                  $query = mysqli_query($con, "SELECT * FROM menu WHERE jenis='home' AND level = 1");
                  while ($var = mysqli_fetch_array($query)) {
                      $sub = mysqli_query($con, "SELECT * FROM menu WHERE jenis='home' AND
                                                              level=2 AND sub = $var[id]");
                      $jumlah = mysqli_num_rows($sub);
                      if ($jumlah < 1) {
                          echo '<li><a href='.$var['link'].'>'.$var['nama'].'</a></li>';
                      } else {
                          echo '<li class=dropdown>'.
                        "<a href='".$var['link']."' class='dropdown-toggle' data-toggle='dropdown'
                        role='button' aria-haspopup='true' aria-expanded='false'>".
                        $var['nama']." <span class='caret'></span></a>".
                        "<ul class='dropdown-menu'>";
                          while ($anak = mysqli_fetch_array($sub)) {
                              echo '<li><a href='.$anak['link'].'>'.$anak['nama'].'</a></li>';
                          }
                          echo '</ul></li>';
                      }
                  }

                if (isset($_SESSION['login'])) {
                    if ($_SESSION['login'] == 'admin') {
                        $query = mysqli_query($con, "SELECT * FROM menu WHERE jenis='admin' AND level = 1");
                        while ($var = mysqli_fetch_array($query)) {
                            $sub = mysqli_query($con, "SELECT * FROM menu WHERE jenis='admin' AND
                                                                  level=2 AND sub = $var[id]");
                            $jumlah = mysqli_num_rows($sub);
                            if ($jumlah < 1) {
                                echo '<li><a href='.$var['link'].'>'.$var['nama'].'</a></li>';
                            } else {
                                echo '<li class=dropdown>'.
                            "<a href='".$var['link']."' class='dropdown-toggle' data-toggle='dropdown'
                            role='button' aria-haspopup='true' aria-expanded='false'>".
                            $var['nama']." <span class='caret'></span></a>".
                            "<ul class='dropdown-menu'>";
                                while ($anak = mysqli_fetch_array($sub)) {
                                    echo '<li><a href='.$anak['link'].'>'.$anak['nama'].'</a></li>';
                                }
                                echo '</ul></li>';
                            }
                        }
                    } elseif ($_SESSION['login'] == 'user') {
                        $query = mysqli_query($con, "SELECT * FROM menu WHERE jenis='user' AND level = 1");
                        while ($var = mysqli_fetch_array($query)) {
                            $sub = mysqli_query($con, "SELECT * FROM menu WHERE jenis='user' AND
                                                                  level=2 AND sub = $var[id]");
                            $jumlah = mysqli_num_rows($sub);
                            if ($jumlah < 1) {
                                echo '<li><a href='.$var['link'].'>'.$var['nama'].'</a></li>';
                            } else {
                                echo '<li class=dropdown>'.
                            "<a href='".$var['link']."' class='dropdown-toggle' data-toggle='dropdown'
                            role='button' aria-haspopup='true' aria-expanded='false'>".
                            $var['nama']." <span class='caret'></span></a>".
                            "<ul class='dropdown-menu'>";
                                while ($anak = mysqli_fetch_array($sub)) {
                                    echo '<li><a href='.$anak['link'].'>'.$anak['nama'].'</a></li>';
                                }
                                echo '</ul></li>';
                            }
                        }
                    }
                }
                ?>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['login'])) {
                    ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-log-in"></i> Akun <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?menu=gantidata">Ganti Data</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="module/login/logout.php">Logout</a></li>
                    </ul>
                </li>
                    <?php

                } else {
                    ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-log-in"></i> Masuk <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?menu=login">Login User/Admin</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="?menu=register">Register User</a></li>
                    </ul>
                </li>
                <?php

                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
