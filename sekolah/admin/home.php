<?php

$querycountadmin = mysqli_query($koneksi, "SELECT COUNT(*) as total_admin FROM user ");
$datacountadmin = mysqli_fetch_array($querycountadmin);
$total_admin = $datacountadmin['total_admin'];


$querycountnews = mysqli_query($koneksi, "SELECT COUNT(*) as total_news FROM user ");
$datacountnews = mysqli_fetch_array($querycountnews);
$total_news = $datacountnews['total_news'];


$querycountactivities = mysqli_query($koneksi, "SELECT COUNT(*) as total_activities FROM user ");
$datacountactivities = mysqli_fetch_array($querycountactivities);
$total_activities = $datacountactivities['total_activities'];

$querycountpesan = mysqli_query($koneksi, "SELECT COUNT(*) as total_pesan FROM user ");
$datacountpesan = mysqli_fetch_array($querycountpesan);
$total_pesan = $datacountpesan['total_pesan'];


?>

<div class="content">
    <?php

    // Check if the session variable is set and display the message
    if (isset($_SESSION['login_success'])) :
    ?>
        <div id="alert-success" class="mt-2 alert alert-success-soft show flex items-center mb-2" role="alert">
            <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> <?= $_SESSION['login_success'] ?>
        </div>
        <script>
            // JavaScript to hide the alert after 2 seconds
            setTimeout(function() {
                var alert = document.getElementById('alert-success');
                if (alert) {
                    alert.style.display = 'none'; // Hide the alert
                }
            }, 2000); // 2000 milliseconds = 2 seconds
        </script>
    <?php
        unset($_SESSION['login_success']); // Unset the message after displaying it
    endif;
    ?>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-6 -mb-6 intro-y">
                    <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                        <span>Silahkan gunakan aplikasi dengan sebaik-baiknya, dan jaga kerahasiaan username dan password Anda..!!!</span>
                        <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <!-- Data admin -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="users" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?= $total_admin  ?> </div>
                                    <div class="text-base text-slate-500 mt-1">Data admin</div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Barang -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper">
                                            <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
                                            <path d="M18 14h-8" />
                                            <path d="M15 18h-5" />
                                            <path d="M10 6h8v4h-8V6Z" />
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?= $total_news ?> </div>
                                    <div class="text-base text-slate-500 mt-1">News</div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Lelang -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="activity" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?= $total_activities ?></div>
                                    <div class="text-base text-slate-500 mt-1">Activities</div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Penawaran Lelang -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="message-circle" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"> <?= $total_pesan ?> </div>
                                    <div class="text-base text-slate-500 mt-1">Message</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
</div>