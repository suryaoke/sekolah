<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="assets/dist/images/smapertiwi.png" rel="shortcut icon">
    <title>SMA Pertiwi 1 Padang</title>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="assets/dist/css/app.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- END: CSS Assets-->


</head>
<!-- END: Head -->

<body class="main">
    <!-- BEGIN: Mobile Menu -->
    <!-- <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6" src="assets/dist/images/smapertiwi.png">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable">
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            <ul class="scrollable__content py-2">
                <li>
                    <a href="javascript:;.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="side-menu-light-dashboard-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="side-menu-light-inbox.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="menu__title"> Inbox </div>
                    </a>
                </li>


            </ul>
        </div>
    </div> -->
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                <img alt="Midone - HTML Admin Template" class="w-16 mr-2" src="assets/dist/images/smapertiwi.png">
                <span class="text-white text-lg  mt-6"> SMA Pertiwi 1 Padang </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                <ol class="breadcrumb breadcrumb-light">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active" aria-current="page">SMA Pertiwi 1 Padang </li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->


            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="../admin/uploads/<?php echo $_SESSION['foto'] ?>">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                        <li>
                            <a class="dropdown-item hover:bg-white/5"> <?php echo $_SESSION['nama_lengkap'] ?> </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="?page=profile/index" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="login/logout.php" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    <?php
                    // Mendapatkan parameter 'page' dari URL, default adalah 'home'
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    ?>
                    <li>
                        <a href="index.php" class="side-menu <?php echo ($page == 'home' || $page == 'profile/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=admin/index" class="side-menu <?php echo ($page == 'admin/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title"> Admin </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=about/index" class="side-menu <?php echo ($page == 'about/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="info"></i> </div>
                            <div class="side-menu__title"> About </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=news/index" class="side-menu <?php echo ($page == 'news/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper">
                                    <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                    <path d="M18 14h-8" />
                                    <path d="M15 18h-5" />
                                    <path d="M10 6h8v4h-8V6Z" />
                                </svg> </div>
                            <div class="side-menu__title"> News </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=activities/index" class="side-menu <?php echo ($page == 'activities/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"><i data-lucide="activity"></i> </div>
                            <div class="side-menu__title"> Activities </div>
                        </a>
                    </li>
                    <li>
                        <a href="?page=kontak/index" class="side-menu <?php echo ($page == 'kontak/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                    <path d="M16 2v2" />
                                    <path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
                                    <path d="M8 2v2" />
                                    <circle cx="12" cy="11" r="3" />
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                </svg> </div>
                            <div class="side-menu__title"> Kontak </div>
                        </a>

                    </li>
                    <li>
                        <a href="?page=activities/index" class="side-menu <?php echo ($page == 'activities/index') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"><i data-lucide="message-circle"></i> </div>
                            <div class="side-menu__title"> Message </div>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- END: Side Menu -->