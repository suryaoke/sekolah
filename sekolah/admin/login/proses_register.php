<?php
// Menghubungkan ke file koneksi database
include "../koneksi.php";

// Mengambil data dari form registrasi
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$status = 'Tidak Aktif'; // Status akun default adalah 'Tidak Aktif'

// Memeriksa apakah email sudah ada di database
$checkEmail = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
if (mysqli_num_rows($checkEmail) > 0) {
    // Jika email sudah terdaftar, tampilkan pesan error
    echo "<script>
    alert('Email sudah terdaftar');
    window.location.href='../?page=login/index';
    </script>";
    exit; // Menghentikan eksekusi script jika email sudah ada
}

// Mengambil informasi file foto yang diunggah
$namafile = $_FILES['foto']['name']; // Nama file asli foto
$namaSementara = $_FILES['foto']['tmp_name']; // Lokasi sementara file di server
$ekstensi = pathinfo($namafile, PATHINFO_EXTENSION); // Mendapatkan ekstensi file (jpg, jpeg, png)

// Memeriksa apakah ekstensi file foto sesuai dengan format yang diizinkan
if (in_array($ekstensi, ['jpg', 'jpeg', 'png'])) {
    // Jika ekstensi file valid, pindahkan file dari lokasi sementara ke folder 'uploads'
    move_uploaded_file($namaSementara, '../uploads/' . $namafile);

    // Menyimpan data user baru ke database
    $tambah = mysqli_query($koneksi, "INSERT INTO user (nama_lengkap, username, password, foto, email, status) 
    VALUES ('$nama_lengkap', '$username', '$password', '$namafile', '$email', '$status' )");

    // Memeriksa apakah proses insert berhasil
    if ($tambah) {
        // Jika berhasil, tampilkan pesan sukses dan arahkan user kembali ke halaman login
        echo "<script>
        alert('Data Berhasil Ditambahkan. Akun Perlu Diaktifkan Admin');
        window.location.href='../?page=login/index';
        </script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>
        alert('Data Gagal Ditambahkan');
        window.location.href='../?page=login/index';
        </script>";
    }
} else {
    // Jika ekstensi file tidak valid, tampilkan pesan error
    echo "<script>
    alert('Format foto harus jpg, jpeg, atau png.');
    window.location.href='../?page=login/index';
    </script>";
}
