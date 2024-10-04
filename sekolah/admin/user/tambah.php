  <div class="container">
      <div class="page-inner">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="card-title">Tambah User</div>
                      </div>
                      <form action="user/proses_tambah.php" method="POST">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-lg-12">
                                     
                                          <div class="form-group">
                                              <label for="username">Username</label>
                                              <input type="text" name="username" class="form-control"
                                                  placeholder="Masukkan Username">
                                          </div>
                                          <div class="form-group">
                                              <label for="">Password</label>
                                              <input type="password" name="password" class="form-control"
                                                  placeholder="Masukkan Password">
                                          </div>

                                          <div class="form-group">
                                              <label for="">Nama Lengkap</label>
                                              <input type="text" name="nama_lengkap" class="form-control"
                                                  placeholder="Masukkan Nama Lengkap">
                                          </div>

                                          <div class="form-group mb-3">
                                              <label for="">Foto</label>
                                              <input type="file" name="foto" class="form-control" required>
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