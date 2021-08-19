<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");
$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(post("pesan")){
    $nomor = post("nomor");
    $pesan = post("pesan");
    
    //toastr_set("error", "fitur dimatikan sementara"); 

    $res = sendMSG($nomor, $pesan);
    if($res['status'] == "true"){
        toastr_set("success", "Pesan terkirim"); 
    }else{
        toastr_set("error", $res['msg']); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
            loadHeader("tes_kirim"); 

        ?>

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Test Kirim</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                                <li class="active"><a href="#">Test Kirim</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
               

                <div class="row">
                    <div class="col-lg-12 col-lg-6 col-md-6 col-sm-12 col-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">                                
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Test Kirim Pesan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <form action="" method="post">
                                    <div class="form-group mb-4">
                                        <label for="formGroupExampleInput">No Telepon</label>
                                        <input class="form-control" type="text" name="nomor" placeholder="08xxxxxxxx" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="formGroupExampleInput2">Isi Pesan</label>
                                        <input class="form-control" type="text" name="pesan" required>
                                    </div>
                                    <input type="submit" name="time" class="mb-4 btn btn-button-7">
                                </form>
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
</div>
</body>
</html>