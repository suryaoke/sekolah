<?php

session_start();
$_SESSION['update_success'] = '  Data Berhasil Diubah';
include "../koneksi.php";

// Mendapatkan data dari form
$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
// $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password = $_POST['password'];
// Menangani upload file foto
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {
    $namafile = $_FILES['foto']['name'];
    $namaSementara = $_FILES['foto']['tmp_name'];
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);
}

// Membuat query untuk mengubah data user
$ubah = mysqli_query($koneksi, "UPDATE user SET nama_lengkap = 
'$nama_lengkap', username='$username', password='$password', foto='$namafile'   WHERE id_user = '$id_user'");

if ($ubah) {
    echo "<script>
     window.location.href='../?page=user/index';
    </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "<script>
      window.location.href='user/index';
    </script>";
}
