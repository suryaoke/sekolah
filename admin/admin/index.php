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
                         Data Admin
                     </h2>

                 </div>
                 <div class="p-5" id="striped-rows-table">
                     <div class="preview">
                         <div class="overflow-x-auto">
                             <table id="datatable" class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th class="whitespace-nowrap">No</th>
                                         <th class="whitespace-nowrap">Nama</th>
                                         <th class="whitespace-nowrap">Username</th>
                                         <th class="whitespace-nowrap">Email</th>
                                         <th class="whitespace-nowrap">Gambar</th>
                                         <th class="whitespace-nowrap">Status</th>
                                         <th class="whitespace-nowrap">Action</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        $id_user = $_SESSION['id_user'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user != $id_user ORDER BY id_user DESC");
                                        while ($data =  mysqli_fetch_array($query)) {
                                        ?>
                                         <tr>
                                             <td class="whitespace-nowrap"><?php echo $no++ ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['nama_lengkap'] ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['username'] ?></td>
                                             <td class="whitespace-nowrap"><?php echo $data['email'] ?></td>
                                             <td class="whitespace-nowrap" class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['foto'] ?>" alt=""></td>
                                             <td class="whitespace-nowrap">
                                                 <?php if ($data['status'] == 'Tidak Aktif') { ?>
                                                     <div class="text-danger"> <?php echo $data['status'] ?></div>
                                                 <?php } else { ?>
                                                     <div class="text-success"> <?php echo $data['status'] ?></div>
                                                 <?php } ?>
                                             </td>
                                             <td class="whitespace-nowrap">
                                                 <!-- Tombol untuk membuka modal konfirmasi hapus user -->
                                                 <a data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-<?php echo $data['id_user']; ?>" class="btn btn-danger mr-1 mb-2">
                                                     <i data-lucide="trash" class="w-4 h-4"></i>
                                                 </a>
                                                 <!-- Tombol untuk mengaktifkan user jika statusnya 'Tidak Aktif' -->
                                                 <?php if ($data['status'] == 'Tidak Aktif') { ?>
                                                     <a data-tw-toggle="modal" data-tw-target="#aktif-confirmation-modal-<?php echo $data['id_user']; ?>" class="btn btn-success mr-1 mb-2">
                                                         <i data-lucide="check-circle" class="w-4 h-4"></i>
                                                     </a>
                                                 <?php } else { ?>
                                                     <!-- Tombol untuk menonaktifkan user jika statusnya aktif -->
                                                     <a data-tw-toggle="modal" data-tw-target="#tidak-aktif-confirmation-modal-<?php echo $data['id_user']; ?>" class="btn btn-pending mr-1 mb-2">
                                                         <i data-lucide="x-circle" class="w-4 h-4"></i>
                                                     </a>
                                                 <?php } ?>
                                             </td>
                                         </tr>

                                         <!-- BEGIN: Delete Confirmation Modal -->
                                         <div id="delete-confirmation-modal-<?php echo $data['id_user']; ?>" class="modal" tabindex="-1"
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
                                                             <a href="admin/hapus.php?id_user=<?php echo $data['id_user'] ?>"
                                                                 class="btn btn-danger w-24">Delete</a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- END: Delete Confirmation Modal -->

                                         <!-- BEGIN: Aktif Confirmation Modal -->
                                         <div id="aktif-confirmation-modal-<?php echo $data['id_user']; ?>" class="modal" tabindex="-1"
                                             aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-body p-0">
                                                         <div class="p-5 text-center">
                                                             <i data-lucide="check-circle"
                                                                 class="w-16 h-16 text-success mx-auto mt-3"></i>
                                                             <div class="text-3xl mt-5">Are you sure?</div>
                                                         </div>
                                                         <div class="px-5 pb-8 text-center">
                                                             <button type="button" data-tw-dismiss="modal"
                                                                 class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                             <a href="admin/aktif.php?id_user=<?php echo $data['id_user'] ?>"
                                                                 class="btn btn-success w-24">Aktif</a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- END: Aktif Confirmation Modal -->

                                         <!-- BEGIN: Tidak Aktif Confirmation Modal -->
                                         <div id="tidak-aktif-confirmation-modal-<?php echo $data['id_user']; ?>" class="modal" tabindex="-1"
                                             aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-body p-0">
                                                         <div class="p-5 text-center">
                                                             <i data-lucide="x-circle"
                                                                 class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                             <div class="text-3xl mt-5">Are you sure?</div>
                                                         </div>
                                                         <div class="px-5 pb-8 text-center">
                                                             <button type="button" data-tw-dismiss="modal"
                                                                 class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                             <a href="admin/tidak_aktif.php?id_user=<?php echo $data['id_user'] ?>"
                                                                 class="btn btn-danger w-24">Tidak Aktif</a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- END: Tidak Aktif Confirmation Modal -->

                                     <?php } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>

 </div>