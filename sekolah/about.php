<?php

$about = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id_about DESC");
$dataabout = mysqli_fetch_array($about);

?>
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