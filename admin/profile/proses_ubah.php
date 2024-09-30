<?php

session_start();
$_SESSION['success'] = 'Data Profile Berhasil Diubah';
include "../koneksi.php";

// Mengambil data dari form
$id_user = $_POST['id_user']; // ID about yang akan diupdate
$username = $_POST['username'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];

// Menangani upload file foto
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Melakukan query update ke database
$update = mysqli_query($koneksi, "UPDATE user SET username='$username', email='$email',  foto='$namafile', nama_lengkap='$nama_lengkap'  WHERE id_user='$id_user'");

// Mengecek apakah query berhasil
if ($update) {
    // Ambil data terbaru
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
    $user = mysqli_fetch_assoc($result);

    // Simpan data terbaru ke session
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['foto'] = $user['foto']; // Jika foto juga diperbarui

    echo "<script>
       window.location.href='../?page=profile/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
     window.location.href='../?page=profile/index';
    </script>";
}
