<?php

// Memulai sesi 
session_start();

// Menghubungkan file koneksi database
include "../koneksi.php";

// Mendapatkan data 'id_user' dari URL menggunakan metode GET
$user = $_GET['id_user'];

// Menentukan status yang akan diubah menjadi 'Aktif'
$status = 'Aktif';

// Membuat query SQL untuk memperbarui status pengguna menjadi 'Aktif' berdasarkan 'id_user'
$akrif = mysqli_query($koneksi, "UPDATE user SET status='$status' WHERE id_user='$user'");

// Mengecek apakah query berhasil dijalankan
if ($aktif) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Akun Berhasil Di Aktifkan';
    echo "<script>
    window.location.href='../?page=admin/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat mengaktifkan data';
    echo "<script>
    window.location.href='../?page=admin/index';
    </script>";
}
