<section class="ftco-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">Activities</h2>
                <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
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
                        <p><?php echo $data['isi_activities'] ?></p>
                        <p><a href="detailactivities-<?php echo $data['slug'] ?>" class="btn btn-primary">Read More</a></p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>