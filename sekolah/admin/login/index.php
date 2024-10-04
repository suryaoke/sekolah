<?php
// Memulai session
session_start();

// Mengecek apakah user sudah login. Jika ya, maka akan menampilkan pesan alert dan mengarahkan ke halaman index
if (isset($_SESSION['id_user'])) {
    echo "<script>
    alert('Anda Sudah Login')
    window.location.href='../index.php'
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="../assets/dist/images/smapertiwi.png" rel="shortcut icon">
    <title>Login - SMA Pertiwi 1 Padang</title>
    <link rel="stylesheet" href="../assets/dist/css/app.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-32" src="../assets/dist/images/smapertiwi.png">
                    <span class="text-white text-lg ml-3"> SMA Pertiwi 1 Padang</span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-25 -mt-16 " src="../assets/dist/images/High-School.png">
                    <div class="-intro-x text-white font-medium text-3xl leading-tight mt-10">
                        Sistem Informasi <br> SMA Pertiwi 1 Padang
                    </div>
                </div>
            </div>

            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Login
                    </h2>
                    <form action="proses_login.php" method="POST" id="myForm">
                        <div class="intro-x mt-8">

                            <!-- Input username -->
                            <input type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Username" name="username">
                            <!-- Span untuk menampilkan pesan error -->
                            <span class="error-message text-danger"></span>

                            <!-- Input password -->
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" name="password">
                            <!-- Span untuk menampilkan pesan error -->
                            <span class="error-message text-danger"></span>
                        </div>

                        <!-- Tombol login dan register -->
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" name="login" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            <a href="../login/register.php" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/dist/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- Validasi form menggunakan jQuery Validation -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                // Aturan validasi untuk field username dan password
                rules: {
                    username: {
                        required: true, // Username harus diisi
                    },
                    password: {
                        required: true, // Password harus diisi
                    },
                },
                // Pesan kesalahan yang akan ditampilkan jika field tidak sesuai aturan
                messages: {
                    username: {
                        required: 'Please Enter Your Username', // Pesan error untuk username
                    },
                    password: {
                        required: 'Please Enter Your Password', // Pesan error untuk password
                    },
                },
                // Menentukan elemen error dan class untuk styling pesan kesalahan
                errorElement: 'span',
                errorClass: 'block text-sm text-red-600', // Class Tailwind CSS untuk pesan error
                errorPlacement: function(error, element) {
                    // Menempatkan pesan error di sebelah elemen input yang sesuai
                    error.appendTo(element.next('.error-message'));
                },
                // Menambahkan class jika input salah
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                // Menghapus class jika input benar
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
</body>

</html>