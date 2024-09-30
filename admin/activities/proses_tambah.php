<?php

session_start();

include "../koneksi.php";

// Mengambil data dari form
$id_user = $_POST['id_user'];
$tanggal_activities = $_POST['tanggal_activities'];
$isi_activities = $_POST['isi_activities'];
$judul_activities = $_POST['judul_activities'];
$lokasi_activities = $_POST['lokasi_activities'];
$slug_activities = str_replace('+', '-', urlencode($judul_activities));



// Upload file gambar
$namafile = $_FILES['gambar_activities']['name'];
$namaSementara = $_FILES['gambar_activities']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Melakukan query insert ke database
$tambah = mysqli_query($koneksi, "INSERT INTO activities (judul_activities, isi_activities, tanggal_activities, id_user, gambar_activities, lokasi_activities, slug) 
VALUES ('$judul_activities', '$isi_activities','$tanggal_activities', '$id_user','$namafile', '$lokasi_activities', '$slug_activities')");

// Menampilkan pesan berdasarkan hasil query
if ($tambah) {
  // Jika query berhasil, set pesan sukses
  $_SESSION['success'] = 'Data Berhasil Ditambahkan';
  echo "<script>
    window.location.href='../?page=activities/index';
    </script>";
} else {
  // Jika query gagal, set pesan error dan redirect
  $_SESSION['error'] = 'Terjadi kesalahan saat menambahkan data';
  echo "<script>
      window.location.href='../?page=activities/index';
    </script>";
}
