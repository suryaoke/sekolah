<?php

$news = mysqli_query($koneksi, "SELECT * FROM news
    JOIN user ON news.id_user=user.id_user
 ORDER BY id_news DESC");
$datanews = mysqli_fetch_array($news);

$activities = mysqli_query($koneksi, "SELECT * FROM activities
    JOIN user ON activities.id_user=user.id_user
 ORDER BY id_activities DESC");
$dataactivities = mysqli_fetch_array($activities);

$kontak = mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY id_kontak DESC");
$datakontak = mysqli_fetch_array($kontak);
?>
<!-- ##### Footer Area Start ##### -->

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?= $datakontak['alamat'] ?> </span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $datakontak['no_telp'] ?> </span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $datakontak['email'] ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">News</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(../admin/uploads/<?php echo $datanews['gambar_news'] ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href=""> <?= $datanews['judul_news'] ?> </a></h3>
                            <div class="meta">
                                <div><a href=""><span class="icon-calendar"></span> <?php echo date('d-m-Y', strtotime($datanews['tanggal_news'])) ?></a></div>
                                <div><a href="#"><span class="icon-person"></span><?= $datanews['nama_lengkap'] ?> </a></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">Activities</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(../admin/uploads/<?php echo $dataactivities['gambar_activities'] ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#"><?= $dataactivities['judul_activities'] ?></a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                                <div><a href="#"><span class="icon-person"></span> <?= $dataactivities['nama_lengkap'] ?> </a></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> SMA Pertiwi 1 Padang</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/aos.js"></script>
<script src="assets/js/jquery.animateNumber.min.js"></script>
<script src="assets/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="assets/js/google-map.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>