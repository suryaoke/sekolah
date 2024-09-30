<?php

session_start();

include "koneksi.php";
$nama_pengirim = $_POST['nama_pengirim'];
$email = $_POST['email'];
$judul = $_POST['judul'];
$isi_pesan = $_POST['isi_pesan'];
$tanggal_create = date('Y-m-d H:i:s'); // Mendapatkan tanggal dan waktu saat ini dalam format 'YYYY-MM-DD HH:MM:SS'

// Melakukan query insert ke database
$tambah = mysqli_query($koneksi, "INSERT INTO pesan (nama_pengirim, email, judul, isi_pesan, tanggal_create) 
VALUES ('$nama_pengirim', '$email', '$judul', '$isi_pesan', '$tanggal_create')");

if ($tambah) {
    echo "<script>
    alert('Pesan Berhasil Dikirim')
    window.location.href='contact';
    </script>";
} else {
    echo "<script>
       alert('Pesan Gagal  Dikirim')
    window.location.href='contact';
    </script>";
}
