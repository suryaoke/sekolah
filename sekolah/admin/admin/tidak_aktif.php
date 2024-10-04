<?php

// Memulai sesi 
session_start();
$_SESSION['success'] = 'Akun Berhasil NonAktif';
include "../koneksi.php";

// Mendapatkan data dari form
$user = $_GET['id_user'];

// Menentukan status yang akan diubah menjadi tidak aktif
$status = 'Tidak Aktif';

// Membuat query untuk mengubah data user

$tidakaktif = mysqli_query($koneksi, "UPDATE user SET status='$status' WHERE id_user='$user'");

if ($tidakaktif) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Akun Berhasil Di Nonaktifkan';
    echo "<script>
    window.location.href='../?page=admin/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat menonaktfikan data';
    echo "<script>
     window.location.href='../?page=admin/index';
    </script>";
}
