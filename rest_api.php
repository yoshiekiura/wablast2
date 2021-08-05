<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");
$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(post("callback")){
    $callback = post("callback");
    mysqli_query($koneksi, "UPDATE pengaturan SET callback = '$callback' WHERE id='1'");
    toastr_set("success", "Sukses edit callback");
}

if(get("act") == "cn"){
    mysqli_query($koneksi, "UPDATE pengaturan SET callback = NULL WHERE id='1'");
    toastr_set("success", "Sukses menonaktifkan callback");
    redirect("rest_api.php");
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
            loadHeader("setting");
        ?>
         <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Rest Api</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                                <li class="active"><a href="#">Rest Api</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- CONTENT AREA -->
                <div class="row layout-spacing">
                    <div class="col-lg-6">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>WEBHOOK CALLBACK
                                    <?php
                                        $c = getSingleValDB("pengaturan", "id", "1", "callback");

                                        if($c){
                                            echo '<span class="badge badge-success">Aktif</span>';
                                        }else{
                                            echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                        }
                                    ?>
                                        </h4> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                               <form action="" method="post">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="URL Callback Handler" value="<?= $c ?>">
                                    </div>
                                    <button class="btn btn-success col-12" type="submit">Simpan</button>
                                        <?php
                                            if($c){
                                                echo '<a class="btn btn-danger btn-block mt-2" href="?act=cn">Nonaktifkan</a>';
                                            }
                                        ?>
                                </form>
                                <hr>
                                <p> Webhook callback adalah fitur untuk mengirim notifikasi pesan masuk ke aplikasi lain</p>
                                    <p> Kami akan mengirimkan request berupa JSON dengan method <span class="badge badge-primary">POST</span></p>
                                    <img src="img/webhook.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>REST API </h4> 
                                        <hr>
                                        <h6>=== Cek Nomor ===</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                               <form>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Endpoint <span class="badge badge-pill badge-primary">post</span></label>
                                        <input type="text" class="form-control" value="<?= $base_url ?>api/cek_nomor.php?key=<?= getSingleValDB("pengaturan", "id", "1", "api_key") ?>" readonly>
                                    </div>
                                </form>
                                <hr>
                               <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Parameter (JSON)</h6>
                                    <img src="img/cek_nomor_req.png" alt="" class="img-fluid">  
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Response (JSON)</h6>
                                    <img src="img/cek_nomor_res.png" alt="" class="img-fluid"> 
                                </div>
                               </div>
                            </div>
                            <!-- 2 -->
                            <div class="widget-header mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4></h4>
                                        <h6>=== Send Message ===</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                               <form>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Endpoint <span class="badge badge-pill badge-primary">post</span></label>
                                        <input type="text" class="form-control" value="<?= $base_url ?>api/send.php?key=<?= getSingleValDB("pengaturan", "id", "1", "api_key") ?>" readonly>
                                    </div>
                                </form>
                                <hr>
                               <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Parameter (JSON)</h6>
                                    <img src="img/send.png" alt="" class="img-fluid"> 
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Response (JSON)</h6>
                                    <img src="img/respon.png" alt="" class="img-fluid"> 
                                </div>
                               </div>
                            </div>
                            <!-- 3 -->
                            <div class="widget-header mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4></h4>
                                        <h6>=== Send Message (Terjadwal) ===</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                               <form>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Endpoint <span class="badge badge-pill badge-primary">post</span></label>
                                        <input type="text" class="form-control" value="<?= $base_url ?>api/send_jadwal.php?key=<?= getSingleValDB("pengaturan", "id", "1", "api_key") ?>" readonly>
                                    </div>
                                </form>
                                <hr>
                               <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Parameter (JSON)</h6>
                                    <img src="img/send_jadwal.png" alt="" class="img-fluid">  
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Response (JSON)</h6>
                                    <img src="img/respon.png" alt="" class="img-fluid">
                                </div>
                               </div>
                            </div>
                            <!-- 4 -->
                            <div class="widget-header mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4></h4>
                                        <h6>=== Send Media ===</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                               <form>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Endpoint <span class="badge badge-pill badge-primary">post</span></label>
                                        <input type="text" class="form-control" value="<?= $base_url ?>api/media.php?key=<?= getSingleValDB("pengaturan", "id", "1", "api_key") ?>" readonly>
                                    </div>
                                </form>
                                <hr>
                               <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Parameter (JSON)</h6>
                                    <img src="img/media.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Response (JSON)</h6>
                                    <img src="img/respon.png" alt="" class="img-fluid">  
                                </div>
                               </div>
                            </div>
                            <!-- 5 -->
                            <div class="widget-header mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4></h4>
                                        <h6>=== Send Media (Terjadwal) ===</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area">
                               <form>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Endpoint <span class="badge badge-pill badge-primary">post</span></label>
                                        <input type="text" class="form-control" value="<?= $base_url ?>api/media_jadwal.php?key=<?= getSingleValDB("pengaturan", "id", "1", "api_key") ?>" readonly>
                                    </div>
                                </form>
                                <hr>
                               <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Parameter (JSON)</h6>
                                    <img src="img/media_jadwal.png" alt="" class="img-fluid"> 
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                    <h6>Response (JSON)</h6>
                                    <img src="img/respon.png" alt="" class="img-fluid">  
                                </div>
                               </div>
                            </div>
                            <!-- 6 -->
                            
                        </div>
                    </div>
                </div>




                <!-- CONTENT AREA -->

            </div>
        </div>
        <!--  END CONTENT PART  -->
                
    </div>
    <!-- END MAIN CONTAINER -->

    <?php 
            include_once("helper/footer.php"); 
            include_once("helper/script.php"); 
    ?>
</body>
</html>