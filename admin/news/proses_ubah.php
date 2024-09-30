<?php

session_start();

include "../koneksi.php";

// Mendapatkan data dari form
$id_news = $_POST['id_news'];
$judul_news = $_POST['judul_news'];
$news = $_POST['news'];
$tanggal_news = $_POST['tanggal_news'];
$slug_news = str_replace('+', '-', urlencode($judul_news));


// Validasi semua input harus required kecuali gambar
if (empty($judul_news) || empty($news) || empty($tanggal_news)) {
    $_SESSION['error'] = 'Semua field harus diisi .';
    echo "<script>
        window.history.back();
    </script>";
    exit(); // Menghentikan eksekusi jika ada field yang kosong
}

// Menangani upload file gambar_news
if ($_FILES['gambar_news']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['gambar_news']['name'];
    $namaSementara = $_FILES['gambar_news']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Membuat query untuk mengubah data news
$ubah = mysqli_query($koneksi, "UPDATE news SET judul_news = '$judul_news', news='$news', tanggal_news='$tanggal_news',gambar_news='$namafile', 
 slug='$slug_news' WHERE id_news='$id_news'");

if ($ubah) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Diubah';
    echo "<script>
    window.location.href='../?page=news/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat mengubah data';
    // Menampilkan pesan error jika query gagal
    echo "<script>
     window.location.href='news/index';
    </script>";
}
