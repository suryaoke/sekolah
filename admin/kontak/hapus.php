<?php

// Memulai sesi 
session_start();
include "../koneksi.php";

// Mendapatkan id_kontak dari parameter URL
$id_kontak = $_GET['id_kontak'];

// Membuat query untuk menghapus data berdasarkan id_kontak
$hapus = mysqli_query($koneksi, "DELETE FROM kontak WHERE id_kontak = '$id_kontak'");


if ($hapus) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Dihapus';
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
} else {
    // Jika query gagal
    $_SESSION['error'] = 'Terjadi Tidak Berhasil Dihapus';
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
}
