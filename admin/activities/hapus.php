<?php
// Memulai sesi 
session_start();
include "../koneksi.php";

// Mendapatkan id_activities dari parameter URL
$id_activities = $_GET['id_activities'];

// Membuat query untuk menghapus data berdasarkan id_activities
$hapus = mysqli_query($koneksi, "DELETE FROM activities WHERE id_activities = '$id_activities'");


if ($hapus) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Dihapus';
    echo "<script>
    window.location.href='../?page=activities/index';
    </script>";
} else {
    // Jika query gagal
    $_SESSION['error'] = 'Terjadi Tidak Berhasil Dihapus';
    echo "<script>
    window.location.href='../?page=activities/index';
    </script>";
}
