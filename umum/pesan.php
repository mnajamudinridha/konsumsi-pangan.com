<?php

if ($_GET['pesan'] == 'sukses') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses!</strong> Login Sukses, Silahkan Pilih Kamar untuk disewa
</div>';
}

if ($_GET['pesan'] == 'suksesbayar') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses Validasi Pembayaran!</strong> Data Pembayaran sudah di Validasi, tombol akan didisable
</div>';
}

if ($_GET['pesan'] == 'sukseskembali') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses Validasi Pengembalian!</strong> Data Pengembalian sudah di Validasi. tombol akan didisable
</div>';
}

if ($_GET['pesan'] == 'sukseskonfirmasi') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses Konfirmasi Pembayaran!</strong> Silahkan Tunggu Proses Verifikasi User
</div>';
}

if ($_GET['pesan'] == 'gagal') {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Terjadi Kesalahan!</strong> Gagal Melakukan Proses
</div>';
}

if ($_GET['pesan'] == 'registersukses') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses!</strong> Register Sukses, Silahkan Login
</div>';
}
