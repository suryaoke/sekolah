<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">News</h2>
                <p>
                    Selamat datang! Di sini, Anda dapat tetap diperbarui dengan berita terbaru dan pengumuman dari sekolah kami yang dinamis!
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM news
                                       JOIN user ON news.id_user=user.id_user
                                         ORDER BY id_news DESC");
            while ($data =  mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('../admin/uploads/<?php echo $data['gambar_news'] ?>');">
                            <div class="meta-date text-center p-2">
                                <span class="day"><?php echo date('d', strtotime($data['tanggal_news'])) ?></span>
                                <span class="mos"><?php echo date('M', strtotime($data['tanggal_news'])) ?></span>
                                <span class="yr"><?php echo date('Y', strtotime($data['tanggal_news'])) ?></span>
                            </div>
                        </a>
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href=""> <?php echo $data['judul_news'] ?> </a></h3>
                            <p><?php echo substr($data['news'], 0, 50)  ?></p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0"><a href="detailnews-<?php echo $data['slug'] ?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                <p class="ml-auto mb-0">
                                    <a href="" class="mr-2"><?php echo $data['nama_lengkap']  ?></a>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>