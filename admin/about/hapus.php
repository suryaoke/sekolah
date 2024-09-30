<?php
// Memulai sesi 
session_start();

include "../koneksi.php";

// Mendapatkan id_about dari parameter URL
$id_about = $_GET['id_about'];

// Membuat query untuk menghapus data berdasarkan id_about
$hapus = mysqli_query($koneksi, "DELETE FROM about WHERE id_about = '$id_about'");


if ($hapus) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Dihapus';
    echo "<script>
      window.location.href='../?page=about/index';
    </script>";
} else {
    // Jika query gagal
    $_SESSION['error'] = 'Terjadi Tidak Berhasil Dihapus';
    echo "<script>
        window.location.href='../?page=about/index';
    </script>";
}
