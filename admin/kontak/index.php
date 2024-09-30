 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <div class="content">
     <?php
        // Mengecek apakah ada pesan sukses dalam sesi
        if (isset($_SESSION['success'])) :
        ?>
         <!-- Menampilkan alert sukses jika ada pesan sukses -->
         <div id="alert-success" class="mt-2 alert alert-success-soft show flex items-center mb-2" role="alert">
             <!-- Ikon sukses -->
             <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i>
             <!-- Menampilkan pesan sukses dari sesi -->
             <?= $_SESSION['success'] ?>
         </div>

         <!-- Script untuk menyembunyikan alert sukses setelah 3 detik -->
         <script>
             setTimeout(function() {
                 var alert = document.getElementById('alert-success'); // Mencari elemen alert dengan id 'alert-success'
                 if (alert) {
                     alert.style.display = 'none'; // Menyembunyikan alert
                 }
             }, 3000); // 3000 milidetik = 3 detik
         </script>
     <?php
            // Menghapus pesan sukses dari sesi setelah ditampilkan
            unset($_SESSION['success']);
        endif;
        ?>

     <?php
        // Mengecek apakah ada pesan error dalam sesi
        if (isset($_SESSION['error'])) :
        ?>
         <!-- Menampilkan alert error jika ada pesan error -->
         <div id="alert-error" class="mt-2 alert alert-danger-soft show flex items-center mb-2" role="alert">
             <!-- Ikon error -->
             <i data-lucide="x-circle" class="w-6 h-6 mr-2"></i>
             <!-- Menampilkan pesan error dari sesi -->
             <?= $_SESSION['error'] ?>
         </div>

         <!-- Script untuk menyembunyikan alert error setelah 3 detik -->
         <script>
             setTimeout(function() {
                 var alert = document.getElementById('alert-error'); // Mencari elemen alert dengan id 'alert-error'
                 if (alert) {
                     alert.style.display = 'none'; // Menyembunyikan alert
                 }
             }, 3000); // 3000 milidetik = 3 detik
         </script>
     <?php
            // Menghapus pesan error dari sesi setelah ditampilkan
            unset($_SESSION['error']);
        endif;
        ?>


     <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 lg:col-span-12">
             <div class="intro-y box mt-5">
                 <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                     <h2 class="font-medium text-base mr-auto">
                         Data Kontak
                     </h2>
                     <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                         class="btn btn-primary shadow-md mr-2">Tambah Data</a>
                 </div>
                 <div class="p-5" id="striped-rows-table">
                     <div class="preview">
                         <div class="overflow-x-auto">
                             <table id="datatable" class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Email</th>
                                         <th>Instagram</th>
                                         <th>No Hp</th>
                                         <th>Alamat</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY id_kontak DESC");
                                        while ($data =  mysqli_fetch_array($query)) {
                                        ?>
                                         <tr>
                                             <td><?php echo $no++ ?></td>
                                             <td> <?php echo $data['email'] ?></td>
                                             <td> <?php echo $data['instagram'] ?></td>
                                             <td> <?php echo $data['no_telp'] ?></td>
                                             <td> <?php echo substr($data['alamat'], 0, 50)  ?></td>

                                             <td>
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#update-header-footer-modal-preview-<?php echo $data['id_kontak']; ?>"
                                                     class="btn btn-primary mr-1 mb-2">
                                                     <i data-lucide="edit" class="w-4 h-4"></i>
                                                 </a>
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#delete-confirmation-modal-<?php echo $data['id_kontak']; ?>"
                                                     class="btn btn-danger mr-1 mb-2">
                                                     <i data-lucide="trash" class="w-4 h-4"></i> </a>

                                             </td>
                                         </tr>

                                         <!-- BEGIN: Modal Update -->
                                         <div id="update-header-footer-modal-preview-<?php echo $data['id_kontak']; ?>" class="modal"
                                             tabindex="-1" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                                     <div class="modal-header">
                                                         <h2 class="font-medium text-base mr-auto">Ubah Data Kontak</h2>

                                                     </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                                     <form action="kontak/proses_ubah.php" method="POST"
                                                         enctype="multipart/form-data">

                                                         <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                             <input type="hidden" name="id_kontak" value="<?php echo $data['id_kontak']; ?>">
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Email</label>
                                                                 <input id="modal-form-1" type="text" value="<?php echo $data['email']; ?>"
                                                                     name="email" class="form-control"
                                                                     placeholder="Email">
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Instagram</label>
                                                                 <input id="modal-form-1" type="text" value="<?php echo $data['instagram']; ?>"
                                                                     name="instagram" class="form-control"
                                                                     placeholder=" Instagram">
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">No Hp</label>
                                                                 <input id="modal-form-1" type="text" value="<?php echo $data['no_telp']; ?>"
                                                                     name="no_telp" class="form-control"
                                                                     placeholder=" No Hp">
                                                             </div>
                                                             <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                     class="form-label">Alamat</label>

                                                                 <textarea class="form-control" name="alamat" id=""><?php echo $data['alamat']; ?></textarea>
                                                             </div>

                                                         </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                                                         <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                                                                 class="btn btn-danger w-20 mr-1">Cancel</button> <button
                                                                 type="submit" class="btn btn-primary w-20">Save</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div> <!-- END: Modal Update -->

                                         <!-- BEGIN: Delete Confirmation Modal -->
                                         <div id="delete-confirmation-modal-<?php echo $data['id_kontak']; ?>" class="modal" tabindex="-1"
                                             aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-body p-0">
                                                         <div class="p-5 text-center">
                                                             <i data-lucide="x-circle"
                                                                 class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                             <div class="text-3xl mt-5">Are you sure?</div>
                                                             <div class="text-slate-500 mt-2">
                                                                 Do you really want to delete these records?
                                                                 <br>
                                                                 This process cannot be undone.
                                                             </div>
                                                         </div>
                                                         <div class="px-5 pb-8 text-center">
                                                             <button type="button" data-tw-dismiss="modal"
                                                                 class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                             <a href="kontak/hapus.php?id_kontak=<?php echo $data['id_kontak'] ?>"
                                                                 class="btn btn-danger w-24">Delete</a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- END: Delete Confirmation Modal -->

                                     <?php } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>

     <!-- BEGIN: Modal Tambah -->
     <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content"> <!-- BEGIN: Modal Header -->
                 <div class="modal-header">
                     <h2 class="font-medium text-base mr-auto">Tambah Data Kontak</h2>

                 </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                 <form action="kontak/proses_tambah.php" method="POST" id="myForm"
                     enctype="multipart/form-data">

                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Email</label>
                             <input id="modal-form-1" type="email"
                                 name="email" class="form-control"
                                 placeholder="Email">
                             <span class="error-message text-danger"></span>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Instagram</label>
                             <input id="modal-form-1" type="text"
                                 name="instagram" class="form-control"
                                 placeholder=" Instagram">
                             <span class="error-message text-danger"></span>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">No Hp</label>
                             <input id="modal-form-1" type="text"
                                 name="no_telp" class="form-control"
                                 placeholder=" No Hp">
                             <span class="error-message text-danger"></span>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Alamat</label>
                             <textarea class="form-control" name="alamat" id=""></textarea>
                             <span class="error-message text-danger"></span>
                         </div>


                     </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                     <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                             class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                             class="btn btn-primary w-20">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div> <!-- END: Modal Tambah -->
 </div>




 <script>
     $(document).ready(function() {
         // Menambahkan metode khusus untuk validasi ekstensi file gambar
         $.validator.addMethod("fileExtension", function(value, element) {
             var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; // Ekstensi file yang diperbolehkan
             return this.optional(element) || allowedExtensions.test(value); // Validasi berdasarkan ekstensi
         }, 'Please upload a file in JPG, JPEG or PNG format.');

         $('#myForm').validate({
             rules: { // Aturan validasi untuk setiap input
                 email: {
                     required: true, // Wajib diisi
                 },
                 instagram: {
                     required: true, // Wajib diisi
                 },

                 no_telp: {
                     required: true, // Wajib diisi
                 },
                 alamat: {
                     required: true, // Wajib diisi

                 },

             },
             messages: { // Pesan error yang akan ditampilkan jika validasi gagal
                 email: {
                     required: 'Please Enter Your Email',
                 },
                 instagram: {
                     required: 'Please Enter Your Instagram',
                 },
                 no_telp: {
                     required: 'Please Enter Your No Telp',
                 },
                 alamat: {
                     required: 'Please Enter Your Alamat',

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