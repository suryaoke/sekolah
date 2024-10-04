<?php


//Mendapatkan slug dari parameter URL
$slug = $_GET['slug'];

$news = mysqli_query($koneksi, "SELECT * FROM news
    JOIN user ON news.id_user=user.id_user
 WHERE news.slug = '$slug'");
$datanews = mysqli_fetch_array($news);
?>


<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ftco-animate">
                <h2 class="mb-3"><?= $datanews['judul_news'] ?></h2>

                <p>
                    <img src="../admin/uploads/<?php echo $datanews['gambar_news'] ?>" alt="" class="img-fluid">
                </p>
                <p style="text-align: justify;">
                    <?= $datanews['news'] ?>
                </p>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="" class="tag-user-link"><?= $datanews['nama_lengkap'] ?></a>
                        <a href="" class="tag-date-link"><?php echo date('d-m-Y', strtotime($datanews['tanggal_news'])) ?></a>

                    </div>
                </div>


            </div> <!-- .col-md-8 -->


        </div>
    </div>
</section>