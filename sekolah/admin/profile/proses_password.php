<?php
session_start();
include "../koneksi.php";

// Mengambil data dari form
$id_user = $_POST['id_user']; // ID user yang akan diupdate
$password = $_POST['password'];
$password_lama = $_POST['password_lama'];

// Mengecek apakah password lama sesuai
$query = mysqli_query($koneksi, "SELECT password FROM user WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);

if ($user && $user['password'] === $password_lama) {
    // Melakukan query update ke database
    $update = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE id_user='$id_user'");

    // Mengecek apakah query berhasil
    if ($update) {
        $_SESSION['success'] = 'Data Password Berhasil Diubah';
    } else {
        $_SESSION['error'] = 'Gagal memperbarui password. Silakan coba lagi.';
    }
} else {
    $_SESSION['error'] = 'Password saat ini tidak valid.';
}

// Redirect ke halaman profil
header("Location: ../?page=profile/index");
exit;
