<?php

session_start();
require 'vendor/autoload.php'; // Autoload PHPMailer jika menggunakan Composer
include "koneksi.php";

// Mengambil data dari form
$nama_pengirim = $_POST['nama_pengirim'];
$email = $_POST['email'];
$judul = $_POST['judul'];
$isi_pesan = $_POST['isi_pesan'];
$tanggal_create = date('Y-m-d H:i:s'); // Mendapatkan tanggal dan waktu saat ini

// Melakukan query insert ke database
$tambah = mysqli_query($koneksi, "INSERT INTO pesan (nama_pengirim, email, judul, isi_pesan, tanggal_create) 
VALUES ('$nama_pengirim', '$email', '$judul', '$isi_pesan', '$tanggal_create')");

if ($tambah) {
    // Setup PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        // Konfigurasi server email (sesuaikan dengan detail SMTP )
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dara79992@gmail.com'; // Ganti dengan email SMTP 
        $mail->Password   = 'qlfwhfhmnpglsame';    // Ganti dengan password SMTP 
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // Port SMTP, biasanya 587 atau 465 untuk TLS

        // Pengaturan pengirim dan penerima
        $mail->setFrom($email, $nama_pengirim); // Dari siapa email dikirim
        $mail->addAddress('dara79992@gmail.com'); // Penerima email

        // Konten email
        $mail->isHTML(true);  // Mengirim dalam format HTML
        $mail->Subject = $judul;

        $mail->Body = "
        <div style='font-family: Arial, sans-serif; color: #333; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd;'>
            <h1 style='color: #444; border-bottom: 2px solid #007BFF; padding-bottom: 10px;'>Pesan dari $nama_pengirim</h1>
            <p style='font-size: 16px;'><strong>Email:</strong> <a href='mailto:$email' style='color: #007BFF;'>$email</a></p>
            <p style='font-size: 16px;'><strong>Judul:</strong> $judul</p>
             <p style='font-size: 16px;'><strong>Pesa:</strong> $isi_pesan</p>
          
        </div>
        ";

        // Mengirim email
        if ($mail->send()) {
            echo "<script>
            alert('Pesan Berhasil Dikirim dan Email Berhasil Terkirim');
            window.location.href='contact';
            </script>";
        } else {
            echo "<script>
            alert('Pesan Berhasil Dikirim, tetapi Email Gagal Terkirim');
            window.location.href='contact';
            </script>";
        }
    } catch (Exception $e) {
        echo "<script>
        alert('Pesan Berhasil Dikirim, tetapi Gagal Mengirim Email. Error: {$mail->ErrorInfo}');
        window.location.href='contact';
        </script>";
    }
} else {
    echo "<script>
    alert('Pesan Gagal Dikirim');
    window.location.href='contact';
    </script>";
}
