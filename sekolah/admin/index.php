<?php

session_start();


if ($_SESSION == NULL) {
    echo "<script>
    alert('Anda Belum Login')
    window.location.href='../admin/login/index.php'
    </script>";
}

if ($_SESSION['status'] !== 'Aktif') {
    echo "<script>
    alert('Anda Tidak Memiliki Akses');
    window.location.href='../admin/login/index.php';
    </script>";
    exit();
}
include "koneksi.php";
include "layout/header.php";
include  "content.php";
include "layout/footer.php";
