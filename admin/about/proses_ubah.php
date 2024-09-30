<?php
// Memulai sesi
session_start();
include "../koneksi.php";

// Mengambil data dari form
$id_about = $_POST['id_about'];
$visi = $_POST['visi'];
$misi = $_POST['misi'];
$about = $_POST['about'];
$jumlah_siswa = $_POST['jumlah_siswa'];
$jumlah_pengajar = $_POST['jumlah_pengajar'];
$jumlah_ekstrakulikuler = $_POST['jumlah_ekstrakulikuler'];
$jumlah_sarpras = $_POST['jumlah_sarpras'];
$video = $_POST['video'];

// Validasi semua input harus required kecuali gambar
if (empty($visi) || empty($misi) || empty($about) || empty($jumlah_siswa) || empty($jumlah_pengajar) || empty($jumlah_ekstrakulikuler) || empty($jumlah_sarpras) || empty($video)) {
    $_SESSION['error'] = 'Semua field harus diisi .';
    echo "<script>
        window.history.back();
    </script>";
    exit(); // Menghentikan eksekusi jika ada field yang kosong
}

// Menangani upload file gambar_about
if ($_FILES['gambar_about']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['gambar_about']['name'];
    $namaSementara = $_FILES['gambar_about']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Melakukan query update ke database
$update = mysqli_query($koneksi, "UPDATE about 
                                  SET visi='$visi', misi='$misi', about='$about', jumlah_siswa='$jumlah_siswa', 
                                  jumlah_pengajar='$jumlah_pengajar', jumlah_ekstrakulikuler='$jumlah_ekstrakulikuler', 
                                  jumlah_sarpras='$jumlah_sarpras', video='$video', gambar_about='$namafile' 
                                  WHERE id_about='$id_about'");

// Menampilkan pesan berdasarkan hasil query
if ($update) {
    // Jika query berhasil, set pesan sukses
    $_SESSION['success'] = 'Data Berhasil Diubah';
    echo "<script>
      window.location.href='../?page=about/index';
    </script>";
} else {
    // Jika query gagal, set pesan error dan redirect
    $_SESSION['error'] = 'Terjadi kesalahan saat mengubah data.';
    echo "<script>
       window.location.href='../?page=about/index';
    </script>";
}
