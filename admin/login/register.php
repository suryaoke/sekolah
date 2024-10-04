<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="../assets/dist/images/smapertiwi.png" rel="shortcut icon">
    <title>Register - SMA Pertiwi 1 Padang</title>
    <link rel="stylesheet" href="../assets/dist/css/app.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-12" src="../assets/dist/images/smapertiwi.png">
                    <span class="text-white text-lg ml-3"> SMA Pertiwi 1 Padang</span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-25 -mt-16 " src="../assets/dist/images/High-School.png">
                    <div class="-intro-x text-white font-medium text-3xl leading-tight mt-10">
                        Sistem Informasi <br> SMA pertiwi 1 Padang
                    </div>
                </div>
            </div>
            <!-- BEGIN: Register Form -->

            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Register
                    </h2>
                    <form action="proses_register.php" method="POST" enctype="multipart/form-data" id="myForm"> <!-- Formulir pendaftaran -->

                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">

                            <input type="text" class="intro-x login__input form-control py-3 px-4 block" placeholder="Username" name="username"> <!-- Input untuk username -->
                            <span class="error-message text-danger"></span> <!-- Menampilkan pesan error  -->

                            <input type="email" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Email" name="email"> <!-- Input untuk email -->
                            <span class="error-message text-danger"></span>

                            <input type="text" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Nama Lengkap" name="nama_lengkap"> <!-- Input untuk nama lengkap -->
                            <span class="error-message text-danger"></span>

                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password" name="password"> <!-- Input untuk password -->
                            <span class="error-message text-danger"></span>

                            <label class="intro-x login__input block mt-4">Foto</label> <!-- Label untuk input foto -->
                            <input type="file" class="intro-x login__input form-control py-3 px-4 block" placeholder="Foto" name="foto"> <!-- Input untuk file foto -->
                            <span class="error-message text-danger"></span>

                        </div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button> <!-- Tombol submit -->
                            <a href="../login/index.php" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Login</a> <!-- Tombol menuju halaman login -->
                        </div>
                    </form>

                </div>
            </div>

            <!-- END: Login Form -->
        </div>
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="../assets/dist/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Menambahkan metode khusus untuk validasi ekstensi file gambar
            $.validator.addMethod("fileExtension", function(value, element) {
                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Ekstensi file yang diperbolehkan
                return this.optional(element) || allowedExtensions.test(value); // Validasi berdasarkan ekstensi
            }, 'Please upload a file in JPG, JPEG or PNG format.');

            $('#myForm').validate({
                rules: { // Aturan validasi untuk setiap input
                    username: {
                        required: true, // Wajib diisi
                    },
                    password: {
                        required: true, // Wajib diisi
                    },
                    nama_lengkap: {
                        required: true, // Wajib diisi
                    },
                    foto: {
                        required: true, // Wajib diisi
                        fileExtension: true, // Menambahkan aturan validasi ekstensi file
                    },
                    email: {
                        required: true, // Wajib diisi
                    },
                },
                messages: { // Pesan error yang akan ditampilkan jika validasi gagal
                    username: {
                        required: 'Please Enter Your Username',
                    },
                    password: {
                        required: 'Please Enter Your Password',
                    },
                    nama_lengkap: {
                        required: 'Please Enter Your Nama Lengkap',
                    },
                    foto: {
                        required: 'Please Enter Your Foto',
                        fileExtension: 'File type must be JPG, JPEG, or PNG.', // Pesan untuk validasi ekstensi file
                    },
                    email: {
                        required: 'Please Enter Your Email',
                    },
                },
                errorElement: 'span', // Elemen yang digunakan untuk menampilkan pesan error
                errorClass: 'block text-sm text-red-600', // Kelas CSS untuk styling pesan error
                errorPlacement: function(error, element) { // Menempatkan pesan error di bawah input terkait
                    error.appendTo(element.next('.error-message'));
                },
                highlight: function(element) { // Jika input tidak valid, tambahkan kelas 'is-invalid'
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) { // Jika input valid, hapus kelas 'is-invalid'
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
</body>

</html>