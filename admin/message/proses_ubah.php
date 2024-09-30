<?php

// Memulai sesi
session_start();

include "../koneksi.php";

// Mendapatkan data dari form
$id_kontak = $_POST['id_kontak'];
$email = $_POST['email'];
$instagram = $_POST['instagram'];
$notelp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

// Validasi semua input harus required
if (empty($email) || empty($instagram) || empty($notelp) || empty($alamat)) {
    // Jika ada field yang kosong, set pesan error dan redirect kembali
    $_SESSION['error'] = 'Semua field harus diisi.';
    echo "<script>
        window.history.back();
    </script>";
    exit(); // Menghentikan eksekusi jika ada field yang kosong
}

// Membuat query untuk mengubah data kontak
$ubah = mysqli_query($koneksi, "UPDATE kontak SET email = '$email', instagram='$instagram', no_telp='$notelp', alamat='$alamat' WHERE id_kontak='$id_kontak'");

if ($ubah) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Diubah';
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat mengubah data';
    echo "<script>
    window.location.href='../?page=kontak/index';
    </script>";
}
