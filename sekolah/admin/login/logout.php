<?php
//memulai session
session_start();

//menghapus session
session_destroy();

echo "<script>
alert('Logout Berhasil')
window.location.href='index.php'
</script>";
