<?php
session_start();
include "../koneksi.php";

// Mengambil data dari form
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$about = $_POST['about'];
$jumlah_siswa = $_POST['jumlah_siswa'];
$jumlah_pengajar = $_POST['jumlah_pengajar'];
$jumlah_ekstrakulikuler = $_POST['jumlah_ekstrakulikuler'];
$jumlah_sarpras = $_POST['jumlah_sarpras'];
$video = $_POST['video'];

// Upload file gambar
$namafile = $_FILES['gambar_about']['name'];
$namaSementara = $_FILES['gambar_about']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);

// Melakukan query insert ke database
$tambah = mysqli_query($koneksi, "INSERT INTO about 
    (visi, misi, about, gambar_about, jumlah_siswa, jumlah_pengajar, jumlah_ekstrakulikuler, jumlah_sarpras, video) 
    VALUES ('$visi', '$misi', '$about', '$namafile', '$jumlah_siswa', '$jumlah_pengajar', '$jumlah_ekstrakulikuler', '$jumlah_sarpras', '$video')");

// Menampilkan pesan berdasarkan hasil query
if ($tambah) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Ditambahkan';
    echo "<script>
        window.location.href='../?page=about/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat menambahkan data';
    echo "<script>
        window.location.href='../?page=about/index';
    </script>";
}
