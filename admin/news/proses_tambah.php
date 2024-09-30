<?php

session_start();

include "../koneksi.php";

// Mengambil data dari form
$judul_news = $_POST['judul_news'];
$news = $_POST['news'];
$tanggal_news = $_POST['tanggal_news'];
$id_user = $_POST['id_user'];
$slug_news = str_replace('+', '-', urlencode($judul_news));


// Upload file gambar
$namafile = $_FILES['gambar_news']['name'];
$namaSementara = $_FILES['gambar_news']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Melakukan query insert ke database
$tambah = mysqli_query($koneksi, "INSERT INTO news (judul_news, news, tanggal_news, id_user, gambar_news, slug) VALUES ('$judul_news', '$news','$tanggal_news', '$id_user','$namafile', '$slug_news')");

// Menampilkan pesan berdasarkan hasil query
if ($tambah) {
  // Jika query berhasil, set pesan sukses
  $_SESSION['success'] = 'Data Berhasil Ditambahkan';
  echo "<script>
    window.location.href='../?page=news/index';
    </script>";
} else {
  // Jika query gagal, set pesan error dan redirect
  $_SESSION['error'] = 'Terjadi kesalahan saat menambahkan data';
  echo "<script>
      window.location.href='../?page=news/index';
    </script>";
}
