<?php
function seoGambar($s)
{
    $c = array(' ');
    $d = array('-', '/', '\\', ',', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
    $s = str_replace($d, '-', $s);
    $s = strtolower(str_replace($c, '_', $s));

    return $s;
}
function UploadGambar($name, $prefix, $width, $dir, $gambarartikel_name)
{
    $lokasi_file = $_FILES["$name"]['tmp_name'];
    $nama_file = $_FILES["$name"]['name'];
    $tipe_file = $_FILES["$name"]['type'];
    $ukuran_file = $_FILES["$name"]['size'];

  //direktori gambar
  $vdir_upload = $dir;
    $vfile_upload = $vdir_upload.$gambarartikel_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["$name"]['tmp_name'], $vfile_upload);
  //identitas file asli
  if ($tipe_file == 'image/jpeg') {
      $im_src = imagecreatefromjpeg($vfile_upload);
  } elseif ($tipe_file == 'image/png') {
      $im_src = imagecreatefrompng($vfile_upload);
  } elseif ($tipe_file == 'image/gif') {
      $im_src = imagecreatefromgif($vfile_upload);
  }
    $src_width = imageSX($im_src);
    $src_height = imageSY($im_src);

  //Set ukuran gambar thumb
  $dst_width = $width;
    $dst_height = ($dst_width / $src_width) * $src_height;
  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width, $dst_height);
    imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im, $vdir_upload.$prefix.$gambarartikel_name);
    if ($_FILES["$name"]['type'] == 'image/jpeg') {
        imagejpeg($im, $vdir_upload.$prefix.$gambarartikel_name);
    } elseif ($_FILES["$name"]['type'] == 'image/png') {
        imagepng($im, $vdir_upload.$prefix.$gambarartikel_name);
    } elseif ($_FILES["$name"]['type'] == 'image/gif') {
        imagegif($im, $vdir_upload.$prefix.$gambarartikel_name);
    }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
    imagedestroy($im);
}
