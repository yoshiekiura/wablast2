<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if($login == 0){
    redirect("login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- style -->
        <?php 
            include_once("helper/style.php"); 
        ?>
<body>
   <!-- header -->
        <?php 
            include_once("helper/header_new.php"); 
        ?>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

       <!-- sidebar -->
        <?php 
            include_once("helper/sidebar.php"); 
            loadHeader("index"); 
        ?>
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                
                <div class="row layout-spacing accounts-widgets">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-xl-0 mb-4">
                        <div class="widget-content widget-content-area br-4 accounts-income">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <h6 class="value"><?= countDB("nomor") ?></h6>
                                    <p class="mt-2">Nomor Tersimpan</p>
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <i class="flaticon-telephone"></i>
                                </div>
                            </div>
                            <!-- <div class="progress br-30 mb-0 mt-5">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-xl-0 mb-4">
                        <div class="widget-content widget-content-area br-4 accounts-cogs">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <h6 class="value"><?= countDB("pesan", "status", "TERKIRIM") ?></h6>
                                    <p class="mt-2">Whatsapp Terkirim</p>
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <i class="flaticon-chat-line-1"></i>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-sm-0 mb-4">
                        <div class="widget-content widget-content-area br-4 accounts-profit">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <h6 class="value"><?= round(countPresentase()) ?>%</h6>
                                    <p class="mt-2">Presentase Terkirim</p>
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <i class="flaticon-checked"></i>
                                </div>
                            </div>
                            <div class="progress br-30 mb-0 mt-5">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?= round(countPresentase()) ?>%" aria-valuenow="<?= round(countPresentase()) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="widget-content widget-content-area br-4 accounts-expenses">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <h6 class="value"><?= countDB("pesan", "status", "MENUNGGU JADWAL") ?></h6>
                                    <p class="mt-2">Menunggu Jadwal Pengiriman</p>
                                </div>
                                <div class="col-md-6 col-6 text-right">
                                    <i class="flaticon-pause"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->
                
    </div>
    <!-- END MAIN CONTAINER -->

   <!-- footer -->
    <?php 
            include_once("helper/footer.php"); 
            include_once("helper/script.php"); 
    ?>
    
    <!-- script -->
   
</body>
</html>