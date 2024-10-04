<?php
$kontak = mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY id_kontak DESC");
$datakontak = mysqli_fetch_array($kontak);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMA Pertiwi 1 Padang</title>
    <link href="../admin/assets/dist/images/smapertiwi.png" rel="shortcut icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../assets/css/aos.css">

    <link rel="stylesheet" href="../assets/css/ionicons.min.css">

    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="bg-top navbar-light">
        <div class="container">

            <div class="row no-gutters d-flex align-items-center align-items-stretch">


                <div class="col-md-4 d-flex align-items-center ">
                    <img style="width: 85px;" src="../admin/assets/dist/images/smapertiwi.png" alt="Logo SMA Pertiwi">
                    <a class="navbar-brand" href="index.html">SMA Pertiwi 1 <span>Padang</span></a>
                </div>

                <div class="col-lg-8 d-block">
                    <div class="row d-flex">

                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <div class="text">
                                <span>Email</span>
                                <span><?= $datakontak['email'] ?></span>
                            </div>
                        </div>
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <div class="text">
                                <span>Call</span>
                                <span><?= $datakontak['no_telp'] ?></span>
                            </div>
                        </div>
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-instagram"></span></div>
                            <div class="text">
                                <span>Instagram</span>
                                <span><?= $datakontak['instagram'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center px-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <!-- <form action="index.php" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input name="cari" type="text" class="form-control pl-3" placeholder="Search News">
                    <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
                </div>
            </form> -->
            <?php
            // Mendapatkan parameter 'page' dari URL, default adalah 'home'
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            ?>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo ($page == 'home') ? 'active' : ''; ?>"><a href="/" class="nav-link pl-0">Home</a></li>
                    <li class="nav-item <?php echo ($page == 'about') ? 'active' : ''; ?>"><a href="about" class="nav-link">About</a></li>
                    <li class="nav-item <?php echo ($page == 'activities') ? 'active' : ''; ?>"><a href="activities" class="nav-link">Activities</a></li>
                    <li class="nav-item <?php echo ($page == 'news') ? 'active' : ''; ?>"><a href="news" class="nav-link">News</a></li>
                    <li class="nav-item <?php echo ($page == 'contact') ? 'active' : ''; ?>"><a href="contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->