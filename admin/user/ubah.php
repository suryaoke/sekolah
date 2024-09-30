  <?php

    $id_user = $_GET['id_user'];

    // Mengambil data user berdasarkan id_user
    $ubah = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
    $data = mysqli_fetch_array($ubah);
    ?>

  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Ubah User</div>
                      </div>
                      <form action="user/proses_ubah.php" method="POST">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">

                                      <div class="form-group">
                                          <label for="">Username</label>
                                          <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>" id="">
                                          <input type="text" name="username" class="form-control" aria-describedby="emailHelp"
                                              placeholder="Masukkan Username" value="<?php echo $data['username']; ?>">
                                      </div>

                                      <div class="form-group">
                                          <label for="">Password</label>
                                          <input type="password" name="password" class="form-control" aria-describedby="emailHelp"
                                              placeholder="Masukkan Password" value="<?php echo $data['password']; ?>">
                                      </div>

                                      <div class="form-group">
                                          <label for="">Nama Lengkap</label>
                                          <input type="text" name="nama_lengkap" class="form-control" aria-describedby="emailHelp"
                                              placeholder="Masukkan Nama Lengkap" value="<?php echo $data['nama_lengkap']; ?>">
                                      </div>

                                      <div class="form-group mb-3">
                                          <label for="">Foto</label>
                                          <img width="100" src="../uploads/<?php echo $data['foto'] ?>" alt="">
                                          <input type="hidden" name="foto_lama" value="<?php echo $data['foto'] ?>" id="">
                                          <input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
                                      </div>

                                  </div>
                              </div>
                              <div class="card-action">
                                  <button type="submit" class="btn btn-success">Save</button>
                                  <a href="?page=user/index" class="btn btn-danger">Cancel</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>