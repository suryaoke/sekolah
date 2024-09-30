<?php
// Query for the total number of 'admin'
// $querycountadmin = mysqli_query($koneksi, "SELECT COUNT(*) as total_admin FROM user ");
// $datacountadmin = mysqli_fetch_array($querycountadmin);
// $total_admin = $datacountadmin['total_admin']; // Extract the total value


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
                                    <div class="text-3xl font-medium leading-8 mt-6"></div>
                                    <div class="text-base text-slate-500 mt-1">Data admin</div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Barang -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="package" class="report-box__icon text-pending"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"></div>
                                    <div class="text-base text-slate-500 mt-1">Barang</div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Lelang -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="file-text" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"></div>
                                    <div class="text-base text-slate-500 mt-1">Data Lelang</div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Penawaran Lelang -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="file-text" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"></div>
                                    <div class="text-base text-slate-500 mt-1">Data Penawaran Lelang</div>
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