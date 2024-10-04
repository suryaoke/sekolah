<?php

session_start();

include "../koneksi.php";
$nama_email = $_POST['email'];
$nama_instagram = $_POST['instagram'];
$nama_notelp = $_POST['no_telp'];
$nama_alamat = $_POST['alamat'];


// Melakukan query insert ke database
$tambah = mysqli_query($koneksi, "INSERT INTO kontak (email, instagram, no_telp, alamat) VALUES ('$nama_email', '$nama_instagram','$nama_notelp', '$nama_alamat')");

if ($tambah) {
  // Jika query berhasil, set pesan sukses
  $_SESSION['success'] = 'Data Berhasil Ditambahkan';
  echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
} else {
  // Jika query gagal, set pesan error dan redirect
  $_SESSION['error'] = 'Terjadi kesalahan saat menambahkan data';
  echo "<script>
      window.location.href='../?page=kontak/index';
    </script>";
}
