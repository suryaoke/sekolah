<?php

$about = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id_about DESC");
$dataabout = mysqli_fetch_array($about);



?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image:url(assets/images/banner-siswa.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-6 ftco-animate">
                    <h1 class="mb-4">SMA Pertiwi 1 Padang</h1>
                    <p><a href="contact" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image:url(assets/images/bg-sma.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-6 ftco-animate">
                    <h1 class="mb-4">SMA Pertiwi 1 Padang</h1>
                    <p><a href="contact" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


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



<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(assets/images/bg-sma.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2 d-flex">
            <div class="col-md-6 align-items-stretch d-flex">
                <div class="img img-video d-flex align-items-center" style="background-image: url(admin/uploads/<?= $dataabout['gambar_about'] ?>);">
                    <div class="video justify-content-center">
                        <a href="<?= $dataabout['video'] ?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="ion-ios-play"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
                <h2 class="mb-4">About</h2>
                <p><?= $dataabout['about'] ?></p>
                <p>Visi : <?= $dataabout['visi'] ?> </p>
                <p>Misi : <?= $dataabout['misi'] ?> </p>
            </div>
        </div>
        <div class="row d-md-flex align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="row d-md-flex align-items-center">
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="icon"><span class="flaticon-doctor"></span></div>
                            <div class="text">
                                <strong class="number" data-number="<?= $dataabout['jumlah_siswa'] ?>">0 </strong>
                                <span>Siswa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="icon"><span class="flaticon-doctor"></span></div>
                            <div class="text">
                                <strong class="number" data-number="<?= $dataabout['jumlah_pengajar'] ?>"> 0 </strong>
                                <span>Guru</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="icon"><span class="flaticon-doctor"></span></div>
                            <div class="text">
                                <strong class="number" data-number="<?= $dataabout['jumlah_ekstrakulikuler'] ?>">0</strong>
                                <span>Ekstrakulikuler</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="icon"><span class="flaticon-doctor"></span></div>
                            <div class="text">
                                <strong class="number" data-number="<?= $dataabout['jumlah_sarpras'] ?>">0 </strong>
                                <span>Srana Prasarana</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">Activities</h2>

            </div>
        </div>
        <div class="row">
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM activities
                                       JOIN user ON activities.id_user=user.id_user
                                         ORDER BY id_activities DESC");
            while ($data =  mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-3 course ftco-animate">
                    <div class="img" style="background-image: url(../admin/uploads/<?php echo $data['gambar_activities'] ?>);"></div>
                    <div class="text pt-4">
                        <p class="meta d-flex">
                            <span><i class="icon-user mr-2"></i> <?php echo $data['nama_lengkap']  ?></span>
                            <span><i class="icon-map mr-2"></i><?php echo $data['lokasi_activities']  ?></span>
                            <span><i class="icon-calendar mr-2"></i><?php echo date('d-m-Y', strtotime($data['tanggal_activities'])) ?></span>
                        </p>
                        <h3><a href=""><?php echo $data['judul_activities'] ?></a></h3>
                        <p><?php echo substr($data['isi_activities'], 0, 50)  ?></p>
                        <p><a href="detailactivities-<?php echo $data['slug'] ?>" class="btn btn-primary">Read More</a></p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>