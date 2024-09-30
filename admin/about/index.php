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
                          Data About
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
                                          <th>Pengajar</th>
                                          <th>Siswa</th>
                                          <th>Visi</th>
                                          <th>Misi</th>
                                          <th>About</th>
                                          <th>Ekstrakulikuler</th>
                                          <th>Sarpras</th>
                                          <th>Video</th>
                                          <th>Gambar</th>
                                          <th>Action</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id_about DESC");
                                        while ($data =  mysqli_fetch_array($query)) {
                                        ?>
                                          <tr>
                                              <td><?php echo $no++ ?></td>
                                              <td> <?php echo $data['jumlah_pengajar'] ?></td>
                                              <td> <?php echo $data['jumlah_siswa'] ?></td>
                                              <td> <?php echo substr($data['visi'], 0, 50)  ?></td>
                                              <td> <?php echo substr($data['misi'], 0, 50)  ?></td>
                                              <td> <?php echo substr($data['about'], 0, 50)  ?></td>
                                              <td> <?php echo $data['jumlah_ekstrakulikuler'] ?></td>
                                              <td> <?php echo $data['jumlah_sarpras'] ?></td>
                                              <td> <?php echo substr($data['video'], 0, 50)  ?></td>
                                              <td class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['gambar_about'] ?>" alt=""></td>

                                              <td>
                                                  <a data-tw-toggle="modal"
                                                      data-tw-target="#update-header-footer-modal-preview-<?php echo $data['id_about']; ?>"
                                                      class="btn btn-primary mr-1 mb-2">
                                                      <i data-lucide="edit" class="w-4 h-4"></i>
                                                  </a>
                                                  <a data-tw-toggle="modal"
                                                      data-tw-target="#delete-confirmation-modal-<?php echo $data['id_about']; ?>"
                                                      class="btn btn-danger mr-1 mb-2">
                                                      <i data-lucide="trash" class="w-4 h-4"></i> </a>

                                              </td>
                                          </tr>

                                          <!-- BEGIN: Modal Update -->
                                          <div id="update-header-footer-modal-preview-<?php echo $data['id_about']; ?>" class="modal" tabindex="-1" aria-hidden="true">
                                              <div class="modal-dialog" style="max-width: 90vw; width: 55%;"> <!-- Perlebar modal dengan persentase -->
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h2 class="font-medium text-base mr-auto">Tambah Data About</h2>

                                                      </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                                      <form action="about/proses_ubah.php" method="POST"
                                                          enctype="multipart/form-data">
                                                          <input type="hidden" name="id_about" value="<?php echo $data['id_about']; ?>">

                                                          <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                                              <div class="col-span-12 sm:col-span-6">
                                                                  <label for="modal-form-1"
                                                                      class="form-label">Jumlah Pengajar</label>
                                                                  <input id="modal-form-1" type="text" name="jumlah_pengajar" class="form-control"
                                                                      placeholder="Jumlah Pengajar" value="<?php echo $data['jumlah_pengajar']; ?>">

                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6">
                                                                  <label for="modal-form-1"
                                                                      class="form-label">Jumlah Ekstrakulikuler</label>
                                                                  <input id="modal-form-1" type="text" name="jumlah_ekstrakulikuler" class="form-control"
                                                                      placeholder="Jumlah Ekstrakulikuler" value="<?php echo $data['jumlah_ekstrakulikuler']; ?>">

                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6">
                                                                  <label for="modal-form-1"
                                                                      class="form-label">Jumlah Siswa</label>
                                                                  <input id="modal-form-1" type="text" name="jumlah_siswa" class="form-control"
                                                                      placeholder="Jumlah Siswa" value="<?php echo $data['jumlah_siswa']; ?>">


                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6">
                                                                  <label for="modal-form-1"
                                                                      class="form-label">Jumlah Sarpras</label>
                                                                  <input id="modal-form-1" type="text" name="jumlah_sarpras" class="form-control"
                                                                      placeholder="Jumlah Sarpras" value="<?php echo $data['jumlah_sarpras']; ?>">

                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6">
                                                                  <label for="modal-form-1"
                                                                      class="form-label">Visi</label>
                                                                  <input id="modal-form-1" type="text" name="visi" class="form-control"
                                                                      placeholder="Visi" value="<?php echo $data['visi']; ?>">


                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                                                      class="form-label">Link Video</label>
                                                                  <input id="modal-form-1" type="text" name="video" class="form-control"
                                                                      placeholder="Link Video" value="<?php echo $data['video']; ?>">

                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                                                      class="form-label">Misi</label>
                                                                  <textarea name="misi" id="" cols="30" rows="4" class="form-control"><?php echo $data['misi']; ?></textarea>

                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                                                      class="form-label">Gambar</label>
                                                                  <img width="100" src="../admin/uploads/<?php echo $data['gambar_about'] ?>" alt="">
                                                                  <input type="hidden" name="foto_lama" value="<?php echo $data['gambar_about'] ?>" id="">
                                                                  <input type="file" name="gambar_about" class="form-control"
                                                                      value="<?php echo $data['gambar_about'] ?>">

                                                              </div>
                                                              <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                                                      class="form-label">About</label>
                                                                  <textarea name="about" id="" cols="30" rows="4" class="form-control"> <?php echo $data['about']; ?></textarea>

                                                              </div>
                                                          </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                                                          <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                                                                  class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                                                                  class="btn btn-primary w-20">Save</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- END: Modal Update -->

                                          <!-- BEGIN: Delete Confirmation Modal -->
                                          <div id="delete-confirmation-modal-<?php echo $data['id_about']; ?>" class="modal" tabindex="-1"
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
                                                              <a href="about/hapus.php?id_about=<?php echo $data['id_about'] ?>"
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





      <!-- BEGIN: Modal Tambah Toggle -->

      <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" style="max-width: 90vw; width: 55%;"> <!-- Perlebar modal dengan persentase -->
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="font-medium text-base mr-auto">Tambah Data About</h2>

                  </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                  <form action="about/proses_tambah.php" method="POST" id="myForm"
                      enctype="multipart/form-data">

                      <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                          <div class="col-span-12 sm:col-span-6">
                              <label for="modal-form-1"
                                  class="form-label">Jumlah Pengajar</label>
                              <input id="modal-form-1" type="text" name="jumlah_pengajar" class="form-control"
                                  placeholder="Jumlah Pengajar">
                              <span class="error-message text-danger"></span>
                          </div>
                          <div class="col-span-12 sm:col-span-6">
                              <label for="modal-form-1"
                                  class="form-label">Jumlah Ekstrakulikuler</label>
                              <input id="modal-form-1" type="text" name="jumlah_ekstrakulikuler" class="form-control"
                                  placeholder="Jumlah Ekstrakulikuler">
                              <span class="error-message text-danger"></span>
                          </div>
                          <div class="col-span-12 sm:col-span-6">
                              <label for="modal-form-1"
                                  class="form-label">Jumlah Siswa</label>
                              <input id="modal-form-1" type="text" name="jumlah_siswa" class="form-control"
                                  placeholder="Jumlah Siswa">
                              <span class="error-message text-danger"></span>

                          </div>
                          <div class="col-span-12 sm:col-span-6">
                              <label for="modal-form-1"
                                  class="form-label">Jumlah Sarpras</label>
                              <input id="modal-form-1" type="text" name="jumlah_sarpras" class="form-control"
                                  placeholder="Jumlah Srapras">
                              <span class="error-message text-danger"></span>
                          </div>
                          <div class="col-span-12 sm:col-span-6">
                              <label for="modal-form-1"
                                  class="form-label">Visi</label>
                              <input id="modal-form-1" type="text" name="visi" class="form-control"
                                  placeholder="Visi">
                              <span class="error-message text-danger"></span>

                          </div>
                          <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                  class="form-label">Link Video</label>
                              <input id="modal-form-1" type="text" name="video" class="form-control"
                                  placeholder="Link Video">
                              <span class="error-message text-danger"></span>
                          </div>
                          <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                  class="form-label">Misi</label>
                              <textarea name="misi" id="" cols="30" rows="4" class="form-control"></textarea>
                              <span class="error-message text-danger"></span>
                          </div>
                          <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                  class="form-label">Gambar</label>
                              <input type="file" name="gambar_about" class="form-control">
                              <span class="error-message text-danger"></span>
                          </div>
                          <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1"
                                  class="form-label">About</label>
                              <textarea name="about" id="" cols="30" rows="4" class="form-control"></textarea>
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
      </div>
      <!-- END: Modal Tamabh Content -->
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
                  jumlah_pengajar: {
                      required: true, // Wajib diisi
                      number: true, // Harus berupa angka
                  },
                  jumlah_siswa: {
                      required: true, // Wajib diisi
                      number: true, // Harus berupa angka
                  },
                  visi: {
                      required: true, // Wajib diisi
                  },
                  misi: {
                      required: true, // Wajib diisi
                  },
                  about: {
                      required: true, // Wajib diisi
                  },
                  jumlah_ekstrakulikuler: {
                      required: true, // Wajib diisi
                      number: true, // Harus berupa angka
                  },
                  jumlah_sarpras: {
                      required: true, // Wajib diisi
                      number: true, // Harus berupa angka
                  },
                  video: {
                      required: true, // Wajib diisi
                  },
                  gambar_about: {
                      required: true, // Wajib diisi
                      fileExtension: true,
                  },
              },
              messages: { // Pesan error yang akan ditampilkan jika validasi gagal
                  jumlah_pengajar: {
                      required: 'Please Enter Your Jumlah Pengajar',
                      number: 'Jumlah Pengajar harus berupa angka',
                  },
                  jumlah_siswa: {
                      required: 'Please Enter Your Jumlah Siswa',
                      number: 'Jumlah Siswa harus berupa angka',
                  },
                  visi: {
                      required: 'Please Enter Your Visi',
                  },
                  misi: {
                      required: 'Please Enter Your Misi',
                  },
                  about: {
                      required: 'Please Enter Your About',
                  },
                  jumlah_ekstrakulikuler: {
                      required: 'Please Enter Your Jumlah Ekstrakulikuler',
                      number: 'Jumlah Ekstrakulikuler harus berupa angka',
                  },
                  jumlah_sarpras: {
                      required: 'Please Enter Your Sarpras',
                      number: 'Jumlah Sarpras harus berupa angka',
                  },
                  video: {
                      required: 'Please Enter Your Video',
                  },
                  gambar_about: {
                      required: 'Please Enter Your Gambar',
                      fileExtension: 'File type must be JPG, JPEG, or PNG.',
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