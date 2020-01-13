<?php

if ($_GET['pesan'] == 'sukses') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses!</strong> Login Sukses
</div>';
}
if ($_GET['pesan'] == 'registersukses') {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<strong>Sukses!</strong> Register Sukses, Silahkan Login
</div>';
}
