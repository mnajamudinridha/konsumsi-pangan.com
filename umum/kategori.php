<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Kategori</h3>
    </div>
    <div class="panel-body" style="padding:0px">
      <ul class="nav nav-stacked">
        <?php
          $query = mysqli_query($con, 'SELECT * FROM kategori');
          while ($a = mysqli_fetch_array($query)) {
              $query1 = mysqli_query($con, 'SELECT * FROM kamar WHERE kategori = "'.$a['kode'].'"');
              $jumlah = mysqli_num_rows($query1);
              echo '<li><a href="?menu=detailkateg&id='.$a['kode'].'">'.$a['nama'].'<span class="pull-right badge bg-blue">'.$jumlah.'</span></a></li>';
          }
        ?>
        </ul>
    </div>
</div>
