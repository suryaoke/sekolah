 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 <div class="content">

     <div class="grid grid-cols-12 gap-6 mt-5">
         <div class="intro-y col-span-12 lg:col-span-12">
             <div class="intro-y box mt-5">
                 <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                     <h2 class="font-medium text-base mr-auto">
                         Data Message
                     </h2>

                 </div>
                 <div class="p-5" id="striped-rows-table">
                     <div class="preview">
                         <div class="overflow-x-auto">
                             <table id="datatable" class="table table-striped">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Nama Pengirim</th>
                                         <th>Email</th>
                                         <th>Judul Pesan</th>
                                         <th>Isi pesan</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id_pesan DESC");
                                        while ($data =  mysqli_fetch_array($query)) {
                                        ?>
                                         <tr>
                                             <td><?php echo $no++ ?></td>
                                             <td> <?php echo $data['nama_pengirim'] ?></td>
                                             <td> <?php echo $data['email'] ?></td>
                                             <td> <?php echo $data['judul'] ?></td>
                                             <td> <?php echo substr($data['isi_pesan'], 0, 50)  ?></td>

                                             <td>
                                                 <a data-tw-toggle="modal"
                                                     data-tw-target="#update-header-footer-modal-preview-<?php echo $data['id_pesan']; ?>"
                                                     class="btn btn-primary mr-1 mb-2">
                                                     <i data-lucide="message-circle" class="w-4 h-4"></i>
                                                 </a>

                                             </td>
                                         </tr>
                                         <!-- BEGIN: show pesan -->
                                         <div id="update-header-footer-modal-preview-<?php echo $data['id_pesan']; ?>" class="modal"
                                             tabindex="-1" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                                     <div class="modal-header">
                                                         <h2 class="font-medium text-base mr-auto">Data pesan</h2>

                                                     </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->


                                                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                 class="form-label">Nama Pengirim</label>
                                                             <input id="modal-form-1" type="text" value="<?php echo $data['nama_pengirim']; ?>"
                                                                 class="form-control"
                                                                 readonly>
                                                         </div>
                                                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                 class="form-label">Email</label>
                                                             <input id="modal-form-1" type="text" value="<?php echo $data['email']; ?>"
                                                                 class="form-control"
                                                                 readonly>
                                                         </div>

                                                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                 class="form-label">Judul</label>
                                                             <input id="modal-form-1" type="text" value="<?php echo $data['judul']; ?>"
                                                                 class="form-control"
                                                                 readonly>
                                                         </div>

                                                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                                 class="form-label">Isi Pesan</label>

                                                             <textarea class="form-control" id="" readonly><?php echo $data['isi_pesan']; ?></textarea>
                                                         </div>


                                                     </div>
                                                 </div>
                                             </div> <!-- END: show pesan -->


                                         <?php } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>