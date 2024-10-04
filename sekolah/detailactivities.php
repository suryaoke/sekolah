<?php


//Mendapatkan slug dari parameter URL
$slug = $_GET['slug'];


$activities = mysqli_query($koneksi, "SELECT * FROM activities
    JOIN user ON activities.id_user=user.id_user
 WHERE activities.slug = '$slug'");
$dataactivities = mysqli_fetch_array($activities);
?>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3"><?= $dataactivities['judul_activities'] ?></h2>

                <p>
                    <img src="../admin/uploads/<?php echo $dataactivities['gambar_activities'] ?>" alt="" class="img-fluid">
                </p>
                <p>
                    <?= $dataactivities['isi_activities'] ?>
                </p>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="" class="tag-user-link"><?= $dataactivities['nama_lengkap'] ?></a>
                        <a href="" class="tag-date-link"><?php echo date('d-m-Y', strtotime($dataactivities['tanggal_activities'])) ?></a>
                        <a href="" class="tag-user-link"><?= $dataactivities['lokasi_activities'] ?></a>
                    </div>
                </div>


            </div> <!-- .col-md-8 -->


        </div>
    </div>
</section>