<?php

// Menghubungkan ke database
include "../koneksi.php";

// Memulai session
session_start();
$_SESSION['login_success'] = 'Login Berhasil'; // Mengatur pesan sukses login ke dalam session

// Mengecek apakah tombol login telah ditekan
if (isset($_POST['login'])) {

    // Mengambil input username dan password dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengecek data user di database berdasarkan username dan password yang dimasukkan
    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    // Mengecek apakah query menemukan user dengan username dan password yang sesuai
    if (mysqli_num_rows($user) > 0) {
        // Mengambil data user dalam bentuk array asosiatif
        $data = mysqli_fetch_assoc($user);

        // Mengecek apakah status user adalah 'Aktif'
        if ($data['status'] == 'Aktif') {
            // Menyimpan data user ke dalam session
            session_start(); // Memulai kembali session jika belum ada
            $_SESSION['id_user'] = $data['id_user']; // ID user
            $_SESSION['username'] = $data['username']; // Username
            $_SESSION['nama_lengkap'] = $data['nama_lengkap']; // Nama lengkap
            $_SESSION['foto'] = $data['foto']; // Foto profil user
            $_SESSION['status'] = $data['status']; // Status user
            $_SESSION['email'] = $data['email']; // Email user

            // Mengarahkan user ke halaman index setelah login berhasil
            echo "<script>
            window.location.href='../index.php';
            </script>";
        } else {
            // Jika akun belum aktif, menampilkan pesan error dan tetap di halaman login
            echo "<script>
            alert('Akun Belum Aktif');
            window.location.href='../index.php';
            </script>";
        }
    } else {
        // Jika username atau password salah, menampilkan pesan error dan tetap di halaman login
        echo "<script>
        alert('Username atau Password salah');
        window.location.href='../index.php';
        </script>";
    }
}
