<?php
// Memulai sesi 
session_start();
include "../koneksi.php";

// Mendapatkan id_news dari parameter URL
$id_news = $_GET['id_news'];

// Membuat query untuk menghapus data berdasarkan id_news
$hapus = mysqli_query($koneksi, "DELETE FROM news WHERE id_news = '$id_news'");


if ($hapus) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Dihapus';
    echo "<script>
    window.location.href='../?page=news/index';
    </script>";
} else {
    // Jika query gagal
    $_SESSION['error'] = 'Terjadi Tidak Berhasil Dihapus';
    echo "<script>
    window.location.href='../?page=news/index';
    </script>";
}
