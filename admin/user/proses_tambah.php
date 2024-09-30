<?php

session_start();
$_SESSION['save_success'] = '  Data Berhasil Ditambahkan';
include "../koneksi.php";
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
// $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password = $_POST['password'];


$namafile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
move_uploaded_file($namaSementara, '../uploads/' . $namafile);


// Memperbaiki query dengan menambahkan kurung tutup yang hilang
$tambah = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, username, password, foto) VALUES ('$nama_lengkap', '$username', '$password', '$namafile' )");

if ($tambah) {
    echo "<script>
      window.location.href='../?page=user/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
   
    window.location.href='../?page=user/index';
    </script>";
}
