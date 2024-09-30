<?php

session_start();

include "../koneksi.php";

// Mendapatkan data dari form
$id_activities = $_POST['id_activities'];
$tanggal_activities = $_POST['tanggal_activities'];
$isi_activities = $_POST['isi_activities'];
$judul_activities = $_POST['judul_activities'];
$lokasi_activities = $_POST['lokasi_activities'];
$slug_activities = str_replace('+', '-', urlencode($judul_activities));


// Validasi semua input harus required kecuali gambar
if (empty($tanggal_activities) || empty($isi_activities) || empty($judul_activities) || empty($lokasi_activities)) {
    $_SESSION['error'] = 'Semua field harus diisi .';
    echo "<script>
        window.history.back();
    </script>";
    exit(); // Menghentikan eksekusi jika ada field yang kosong
}

// Menangani upload file gambar_activities
if ($_FILES['gambar_activities']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['gambar_activities']['name'];
    $namaSementara = $_FILES['gambar_activities']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Membuat query untuk mengubah data activities
$ubah = mysqli_query($koneksi, "UPDATE activities SET id_activities = '$id_activities', tanggal_activities='$tanggal_activities', 
isi_activities='$isi_activities', judul_activities='$judul_activities', lokasi_activities='$lokasi_activities', gambar_activities='$namafile',
slug='$slug_activities'  WHERE id_activities='$id_activities'");

if ($ubah) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Diubah';
    echo "<script>
    window.location.href='../?page=activities/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat mengubah data';
    // Menampilkan pesan error jika query gagal
    echo "<script>
     window.location.href='activities/index';
    </script>";
}
