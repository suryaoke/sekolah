<?php

session_start();
$_SESSION['delete_success'] = '  Data Berhasil Dihapus';
include "../koneksi.php";

// Mendapatkan id_user dari parameter URL
$id_user = $_GET['id_user'];

// Membuat query untuk menghapus data berdasarkan id_user
$hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");

if ($hapus) {
    echo "<script>
       window.location.href='../?page=user/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
       window.location.href='../?page=user/index';
    </script>";
}
