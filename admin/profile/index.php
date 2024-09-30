   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
   <div class="content">

       <?php
        // Mengecek apakah session 'success' ada, jika ya, maka menampilkan pesan sukses
        if (isset($_SESSION['success'])) :
        ?>
           <!-- Alert untuk menampilkan pesan sukses -->
           <div id="alert-success" class="mt-2 alert alert-success-soft show flex items-center mb-2" role="alert">
               <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> <?= $_SESSION['success'] ?>
           </div>
           <script>
               // JavaScript untuk menyembunyikan alert setelah 3 detik
               setTimeout(function() {
                   var alert = document.getElementById('alert-success');
                   if (alert) {
                       alert.style.display = 'none'; // Menyembunyikan alert
                   }
               }, 3000);
           </script>

       <?php
            // Menghapus session 'success' setelah pesan ditampilkan
            unset($_SESSION['success']);
        endif;
        ?>
       <?php
        // Mengecek apakah session 'error' ada, jika ya, maka menampilkan pesan sukses
        if (isset($_SESSION['error'])) :
        ?>
           <!-- Alert untuk menampilkan pesan sukses -->
           <div id="alert-error" class="mt-2 alert alert-danger-soft show flex items-center mb-2" role="alert">
               <i data-lucide="x-circle" class="w-6 h-6 mr-2"></i> <?= $_SESSION['error'] ?>
           </div>
           <script>
               // JavaScript untuk menyembunyikan alert setelah 3 detik
               setTimeout(function() {
                   var alert = document.getElementById('alert-error');
                   if (alert) {
                       alert.style.display = 'none'; // Menyembunyikan alert
                   }
               }, 3000);
           </script>

       <?php
            // Menghapus session 'error' setelah pesan ditampilkan
            unset($_SESSION['error']);
        endif;
        ?>
       <div class="intro-y flex items-center mt-8">
           <h2 class="text-lg font-medium mr-auto">
               Profile
           </h2>

       </div>
       <div class="grid grid-cols-12 gap-6 mt-5">
           <!-- BEGIN: Profile Menu -->
           <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
               <div class="intro-y box mt-5 lg:mt-0">
                   <div class="relative flex items-center p-5">
                       <div class="w-12 h-12 image-fit">
                           <img alt="Midone - HTML Admin Template" class="rounded-full"
                               src="../admin/uploads/<?= $_SESSION['foto'] ?>">
                       </div>
                       <div class="ml-4 mr-auto">
                           <div class="font-medium text-base"> </div>

                       </div>

                   </div>
                   <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                       <a class="flex items-center  font-medium" href=""> <i data-lucide="user"
                               class="w-4 h-4 mr-2"></i>: <?= $_SESSION['nama_lengkap'] ?> </a>
                       <br>
                       <a class="flex items-center  font-medium" href=""> <i data-lucide="mail"
                               class="w-4 h-4 mr-2"></i>: <?= $_SESSION['email'] ?> </a>
                   </div>
               </div>
           </div>

           <!-- END: Profile Menu -->
           <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
               <div class="grid grid-cols-12 gap-6">
                   <!-- BEGIN: Edit Profile -->
                   <div class="intro-y box col-span-12 2xl:col-span-6">
                       <div
                           class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                           <h2 class="font-medium text-base mr-auto">
                               Edit Profile
                           </h2>

                       </div>
                       <form method="post" action="profile/proses_ubah.php" id="myForm" class="mt-6 space-y-6" enctype="multipart/form-data">
                           <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">

                           <div class="p-5">
                               <div class="col-span-12 sm:col-span-12">
                                   <label for="nama_lengkap" class="form-label">Nama</label>
                                   <input id="nama_lengkap" type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama" value="<?= $_SESSION['nama_lengkap'] ?>">
                                   <span class="error-message text-danger"></span>
                               </div>

                               <div class="col-span-12 sm:col-span-12 mt-2">
                                   <label for="username" class="form-label">Username</label>
                                   <input id="username" type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?= $_SESSION['username'] ?>">
                                   <span class="error-message text-danger"></span>
                               </div>

                               <div class="col-span-12 sm:col-span-12 mt-2">
                                   <label for="email" class="form-label">Email</label>
                                   <input id="email" type="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?= $_SESSION['email'] ?>">
                                   <span class="error-message text-danger"></span>
                               </div>

                               <div class="col-span-12 sm:col-span-12 mt-2">
                                   <label for="foto" class="form-label">Foto</label>
                                   <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png">
                                   <span class="error-message text-danger"></span>
                               </div>

                               <div class="col-span-12 sm:col-span-12 mt-2">
                                   <img width="100" src="../admin/uploads/<?= $_SESSION['foto'] ?>" alt="Foto Pengguna">
                                   <input type="hidden" name="foto_lama" value="<?= $_SESSION['foto'] ?>">
                               </div>

                               <div class="flex items-center mt-5">
                                   <button type="submit" class="btn btn-primary ml-auto">Update</button>
                               </div>
                           </div>
                       </form>

                   </div>
                   <!-- END: Edit Profile -->


                   <!-- BEGIN: Change Password -->
                   <div class="intro-y box col-span-12 2xl:col-span-6">
                       <div
                           class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                           <h2 class="font-medium text-base mr-auto">
                               Change Password
                           </h2>

                       </div>
                       <form method="post" action="profile/proses_password.php" id="myForm1" class="mt-6 space-y-6">
                           <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                           <div class="p-5">
                               <div class="col-span-12 sm:col-span-12">
                                   <label for="update_password_current_password" class="form-label">Password Saat
                                       Ini</label>
                                   <input name="password_lama" type="password"
                                       class="form-control" placeholder="">
                                   <span class="error-message text-danger"></span>
                               </div>

                               <div class="col-span-12 sm:col-span-12 mt-2">
                                   <label for="update_password_password" class="form-label">Password Baru</label>
                                   <input name="password" type="password"
                                       class="form-control" placeholder="">
                                   <span class="error-message text-danger"></span>
                               </div>


                               <div class="flex items-center mt-5">

                                   <button type="submit" class="btn btn-primary ml-auto">Save</button>
                               </div>
                           </div>
                       </form>

                   </div>
                   <!-- END: Change Password -->
               </div>
           </div>
       </div>


   </div>


   <script>
       $(document).ready(function() {
           // Menambahkan metode khusus untuk validasi ekstensi file gambar
           $.validator.addMethod("fileExtension", function(value, element) {
               var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Ekstensi file yang diperbolehkan
               return this.optional(element) || allowedExtensions.test(value); // Validasi berdasarkan ekstensi
           }, 'Please upload a file in JPG, JPEG or PNG format.');

           $('#myForm1').validate({
               rules: { // Aturan validasi untuk setiap input
                   password_lama: {
                       required: true, // Wajib diisi
                   },
                   password: {
                       required: true, // Wajib diisi
                   },

               },
               messages: { // Pesan error yang akan ditampilkan jika validasi gagal
                   password_lama: {
                       required: 'Please Enter Your Saat Ini',
                   },
                   password: {
                       required: 'Please Enter Your Password',
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

   <script>
       $(document).ready(function() {
           // Menambahkan metode khusus untuk validasi ekstensi file gambar
           $.validator.addMethod("fileExtension", function(value, element) {
               var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Ekstensi file yang diperbolehkan
               return this.optional(element) || allowedExtensions.test(value); // Validasi berdasarkan ekstensi
           }, 'Please upload a file in JPG, JPEG or PNG format.');

           $('#myForm').validate({
               rules: { // Aturan validasi untuk setiap input
                   nama_lengkap: {
                       required: true, // Wajib diisi

                   },
                   username: {
                       required: true, // Wajib diisi

                   },
                   email: {
                       required: true, // Wajib diisi
                   },

               },
               messages: { // Pesan error yang akan ditampilkan jika validasi gagal
                   nama_lengkap: {
                       required: 'Please Enter Your Jumlah Nama Lengkap',

                   },
                   username: {
                       required: 'Please Enter Your Username',
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