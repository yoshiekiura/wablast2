<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if($_SESSION['level'] != 1){
    echo "Tidak diizinkan akses halaman ini";
    exit;
}

if(post("username")){
    $u = post("username");
    $p = sha1(post("password"));
    $l = post("level");

    $count = countDB("account", "username", $u);

    if($count == 0){
        $q = mysqli_query($koneksi, "INSERT INTO account(`username`, `password`, `level`)
        VALUES('$u', '$p', '$l')");
        toastr_set("success", "Sukses membuat user");
    }else{
        toastr_set("error", "Username telah terpakai");
    }

}

if(get("act") == "hapus"){
    $id = get("id");

    $q = mysqli_query($koneksi, "DELETE FROM account WHERE id='$id'");
    toastr_set("success", "Sukses hapus user");
}

if(post("chunk")){
    $chunk = post("chunk");
    $wa = post("wa");
    $api_key = post("api_key");
    $nomor = post("nomor");
    mysqli_query($koneksi, "UPDATE pengaturan SET chunk = '$chunk', wa_gateway_url = '$wa', api_key='$api_key', nomor='$nomor' WHERE id='1'");
    toastr_set("success", "Sukses edit pengaturan");
}

if(get("act") == "gapi"){
    $api_key = sha1(date("Y-m-d H:i:s").rand(100000, 999999));
    mysqli_query($koneksi, "UPDATE pengaturan SET api_key='$api_key' WHERE id='1'");
    toastr_set("success", "Sukses generate api key baru");
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
                        <h3>Pengaturan</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                                <li class="active"><a href="#">Pengaturan</a></li>
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
                                        <div class="row">
                                            <!-- Button trigger modal -->
                                           <div class="col-12 text-left">
                                                <button type="button" class="btn btn-primary btn-rounded ml-3 mt-4 mb-4" data-toggle="modal" data-target="#addModal">
                                                <i class="fas fa-plus-circle"></i> Tambah Nomor
                                                </button>
                                           </div>
                                            <!-- Modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                               <div class="table-responsive mb-4">
                                    <table id="zero-config" class="table table-striped table-hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Level</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                            $q = mysqli_query($koneksi, "SELECT * FROM account");
                                            while($row = mysqli_fetch_assoc($q)){
                                                echo '<tr>';
                                                echo '<td>'.$row['id'].'</td>';
                                                echo '<td>'.$row['username'].'</td>';
                                                if($row['level'] == 1){
                                                    echo '<td>Admin</td>';
                                                }else{
                                                    echo '<td>CS</td>';
                                                }
                                                echo '<td><a class="btn btn-danger" href="pengaturan.php?act=hapus&id='.$row['id'].'">Hapus</a></td>';
                                                echo '</tr>';
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Pengaturan </h4> 
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <h6>Whatsapp Gateway :<span id="status"></span> </h6>
                                <h6><span id="qr"></span> </h6>
                                <a class="btn btn-danger btn-block" id="btnReset"> Reset Whatsapp </a>
                                    <hr>
                                <form action="" method="post">
                                    <label> URL Whatsapp Gateway </label>
                                    <input type="text" class="form-control" name="wa" value="<?= url_wa() ?>">
                                    <br>
                                    <label> Nomor Whatsapp Yang Terkoneksi </label>
                                    <input type="text" class="form-control" name="nomor" value="<?= getSingleValDB("pengaturan", "id", "1", "nomor") ?>">
                                    <br>
                                    <label> Batas Pengiriman per menit </label>
                                    <input type="text" class="form-control" name="chunk" value="<?= getSingleValDB("pengaturan", "id", "1", "chunk") ?>">
                                    <br>
                                    <label> API Key </label>
                                    <input type="text" class="form-control" name="api_key" readonly value="<?= getSingleValDB("pengaturan", "id", "1", "api_key") ?>">
                                    <br>
                                    <button class="btn btn-success"> Simpan </button>
                                    <a class="btn btn-primary" href="pengaturan.php?act=gapi"> Generate New API Key </a>
                                </form>
                                <!-- content -->
                            </div>   
                            
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


<!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <label> Username </label>
                <input type="text" name="username" required class="form-control">
                <br>
                <label> Password </label>
                <input type="password" name="password" required class="form-control">
                <br>
                <label for="exampleFormControlSelect1">Level</label>
                <select class="form-control" id="exampleFormControlSelect1" name="level">
                    <option value="1">Admin</option>
                    <option value="2">CS</option>
                </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
            <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
            </form>
        </div>
        </div>
    </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
    <script>
        getWaStatus();
        setInterval(getWaStatus, 3000);
        function getWaStatus(){
            $.get( "<?= url_wa() ?>/status", function( data ) {
                console.log(data);
                if(data.msg == "READY"){
                    $("#status").html('<span class="badge badge-success">READY</span>');
                    $("#qr").empty();
                }else{
                    $("#status").html('<span class="badge badge-danger">NOT READY, PLEASE SCAN QR CODE</span>');
                    getAndShowQR();
                }
            });
        }

        function getAndShowQR(){
            $.get( "<?= url_wa() ?>/qr", function( data ) {
                if(data.data.qr){
                  $("#qr").empty();
                  new QRCode(document.getElementById("qr"), data.data.qr);
                }
            });
        }

        $("#btnReset").click(function(){
            reset()
        });

        function reset(){
            $.get( "<?= url_wa() ?>/deletesess", function( data ) {
                console.log("delete session success");
            });

            $.get( "<?= url_wa() ?>/reset", function( data ) {
                console.log("re-init client success");
            });

            toastr.success('Sukses', 'Sukses reset whatsapp');
            getWaStatus();
        }
    </script>
</body>
</html>