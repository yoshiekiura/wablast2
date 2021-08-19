<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");
$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(post("pesan") && get("act") == "number"){
    $username = $_SESSION['username'];
    $pesan = post("pesan");
    $tgl = explode('/', post("tgl")); 
    $tgl2 = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    $jadwal = date("Y-m-d H:i:s", strtotime($tgl2." ".post("jam")));
    if (!empty($_FILES['media']) && $_FILES['media']['error'] == UPLOAD_ERR_OK) {
        // Be sure we're dealing with an upload
        if (is_uploaded_file($_FILES['media']['tmp_name']) === false) {
            throw new \Exception('Error on upload: Invalid file definition');
        }

        // Rename the uploaded file
        $uploadName = $_FILES['media']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));

        $allow = ['png', 'jpeg', 'pdf', 'jpg'];
        if(in_array($ext, $allow)){
            if($ext == "png"){
                $filename = round(microtime(true)).mt_rand().'.png';
            }

            if($ext == "pdf"){
                $filename = round(microtime(true)).mt_rand().'.pdf';
            }

            if($ext == "jpg"){
                $filename = round(microtime(true)).mt_rand().'.jpg';
            }

            if($ext == "jpeg"){
                $filename = round(microtime(true)).mt_rand().'.jpeg';
            }

        }else{
            toastr_set("error", "Format png, jpg, pdf only");
            redirect("kirim.php");
            exit;
        }

        move_uploaded_file($_FILES['media']['tmp_name'], 'uploads/'.$filename);
        // Insert it into our tracking along with the original name
        $media = $base_url."uploads/".$filename;

    }else{
        $media = null;
    }

    if($media == null){
        $nomor = serialize(getAllNumber());
        $q = mysqli_query($koneksi, "INSERT INTO blast(`nomor`, `pesan`, `jadwal`, `make_by`)
        VALUES('$nomor', '$pesan', '$jadwal', '$username')");
    }else{
        $nomor = serialize(getAllNumber());
        $q = mysqli_query($koneksi, "INSERT INTO blast(`nomor`, `pesan`, `media`, `jadwal`, `make_by`)
        VALUES('$nomor', '$pesan', '$media', '$jadwal', '$username')");
    }

    if(isset($_POST['target'])){
        $n = $_POST['target'];
    }else{
        $n = getAllNumber();
    }

    $id_blast = getLastID("blast");
    if(post("tiap_bulan") == "on"){
        $tiap_bulan = "1";
        $last_month = date("m", strtotime("-1 month"));
    }else{
        $tiap_bulan = "0";
        $last_month = date("m", strtotime("-1 month"));
    }

    foreach($n as $nn){
        if($media == null){
            $q = mysqli_query($koneksi, "INSERT INTO pesan(`id_blast`, `nomor`, `pesan`, `jadwal`, `tiap_bulan`, `last_month`, `make_by`)
            VALUES('$id_blast', '$nn', '$pesan', '$jadwal', '$tiap_bulan', '$last_month', '$username')");
        }else{
            $q = mysqli_query($koneksi, "INSERT INTO pesan(`id_blast`, `nomor`, `pesan`, `media`, `jadwal`,`tiap_bulan`, `last_month`, `make_by`)
            VALUES('$id_blast', '$nn', '$pesan', '$media', '$jadwal', '$tiap_bulan', '$last_month', '$username')");
        }
    }

    toastr_set("success", "Sukses kirim pesan terjadwal");
    redirect("kirim.php");
}

if(post("pesan") && get("act") == "group"){
    $username = $_SESSION['username'];
    $pesan = post("pesan");
    $tgl = explode('/', post("tgl")); 
    $tgl2 = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    $jadwal = date("Y-m-d H:i:s", strtotime($tgl2." ".post("jam")));
    if (!empty($_FILES['media']) && $_FILES['media']['error'] == UPLOAD_ERR_OK) {
        // Be sure we're dealing with an upload
        if (is_uploaded_file($_FILES['media']['tmp_name']) === false) {
            throw new \Exception('Error on upload: Invalid file definition');
        }

        // Rename the uploaded file
        $uploadName = $_FILES['media']['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));

        $allow = ['png', 'jpeg', 'pdf', 'jpg'];
        if(in_array($ext, $allow)){
            if($ext == "png"){
                $filename = round(microtime(true)).mt_rand().'.png';
            }

            if($ext == "pdf"){
                $filename = round(microtime(true)).mt_rand().'.pdf';
            }

            if($ext == "jpg"){
                $filename = round(microtime(true)).mt_rand().'.jpg';
            }

            if($ext == "jpeg"){
                $filename = round(microtime(true)).mt_rand().'.jpeg';
            }

        }else{
            toastr_set("error", "Format png, jpg, pdf only");
            redirect("kirim.php");
            exit;
        }

        move_uploaded_file($_FILES['media']['tmp_name'], 'uploads/'.$filename);
        // Insert it into our tracking along with the original name
        $media = $base_url."uploads/".$filename;

    }else{
        $media = null;
    }

    if($media == null){
        $nomor = serialize(getAllNumber());
        $q = mysqli_query($koneksi, "INSERT INTO blast(`nomor`, `pesan`, `jadwal`, `make_by`)
        VALUES('$nomor', '$pesan', '$jadwal', '$username')");
    }else{
        $nomor = serialize(getAllNumber());
        $q = mysqli_query($koneksi, "INSERT INTO blast(`nomor`, `pesan`, `media`, `jadwal`, `make_by`)
        VALUES('$nomor', '$pesan', '$media', '$jadwal', '$username')");
    }

    if(isset($_POST['target'])){
        $n = groupsIdToNumber($_POST['target']);
    }else{
        $n = getAllNumber();
    }

    $id_blast = getLastID("blast");
    if(post("tiap_bulan") == "on"){
        $tiap_bulan = "1";
        $last_month = date("m", strtotime("-1 month"));
    }else{
        $tiap_bulan = "0";
        $last_month = date("m", strtotime("-1 month"));
    }

    foreach($n as $nn){
        if($media == null){
            $q = mysqli_query($koneksi, "INSERT INTO pesan(`id_blast`, `nomor`, `pesan`, `jadwal`, `tiap_bulan`, `last_month`, `make_by`)
            VALUES('$id_blast', '$nn', '$pesan', '$jadwal', '$tiap_bulan', '$last_month', '$username')");
        }else{
            $q = mysqli_query($koneksi, "INSERT INTO pesan(`id_blast`, `nomor`, `pesan`, `media`, `jadwal`,`tiap_bulan`, `last_month`, `make_by`)
            VALUES('$id_blast', '$nn', '$pesan', '$media', '$jadwal', '$tiap_bulan', '$last_month', '$username')");
        }
    }

    toastr_set("success", "Sukses kirim pesan terjadwal");
    redirect("kirim.php");
}

if(get("act") == "ku"){
    $id_blast = get("id");
    $q = mysqli_query($koneksi, "UPDATE `pesan` SET `status`='MENUNGGU JADWAL' WHERE `id_blast`='$id_blast' AND `status`='GAGAL'");
    toastr_set("success", "Sukses mengirim ulang blast");
    redirect("kirim.php");
}

if(get("act") == "hd"){
    $q = mysqli_query($koneksi, "DELETE FROM pesan WHERE `status`='TERKIRIM' AND `tiap_bulan`='0'");
    toastr_set("success", "Sukses menghapus pesan");
    redirect("kirim.php");
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
            loadHeader("kirim");
        ?>
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Auto Reply</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                                <li class="active"><a href="#">Auto Reply</a> </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <!-- Button trigger modal -->
                                           <div class="col-6 text-left">
                                                <button type="button" class="btn btn-primary btn-rounded ml-4 mt-4 mb-4" data-toggle="modal" data-target="#sendModal">
                                                <i class="fas fa-paper-plane"></i> Kirim Pesan
                                                </button>
                                                <button type="button" class="btn btn-success btn-rounded mt-4 mb-4" data-toggle="modal" data-target="#groupsendModal">
                                                <i class="far fa-paper-plane"></i> Kirim Pesan Grup
                                                </button>
                                           </div>
                                           <div class="col-6 text-right">
                                                <a href="kirim.php?act=hd" class="btn btn-danger btn-rounded mt-4 mb-4">
                                                <i class="fas fa-trash"></i> Hapus Data (terkirim)
                                                </a>
                                           </div>
                                            <!-- Modal -->
                                        </div>
                                    </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive mb-4">
                                    <table id="zero-config" class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Nomor</th>
                                                <th>Pesan</th>
                                                <th>Media</th>
                                                <th>Jadwal</th>
                                                <th>Status</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                                if($_SESSION['level'] == "1"){
                                                    $q = mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id DESC");
                                                }else{
                                                    $username = $_SESSION['username'];
                                                    $q = mysqli_query($koneksi, "SELECT * FROM pesan WHERE make_by='$username' ORDER BY id DESC");
                                                }
                                                while($row = mysqli_fetch_assoc($q)){
                                                    echo '<tr>';
                                                    echo '<td>'.$row['id'].'</td>';
                                                    if($nama = getSingleValDB("nomor", "nomor", $row['nomor'], "nama")){
                                                        echo '<td>'.$nama.'</td>';
                                                    }else{
                                                        echo '<td>-</td>';
                                                    }
                                                    echo '<td>'.$row['nomor'].'</td>';
                                                    echo '<td>'.$row['pesan'].'</td>';
                                                    echo '<td>'.$row['media'].'</td>';
                                                    echo '<td>'.$row['jadwal'].'</td>';
                                                    if($row['status'] == "TERKIRIM"){
                                                        echo '<td><span class="badge badge-success status-container-'.$row['id'].'">Terkirim</span></td>';
                                                    }else if($row['status'] == "GAGAL"){
                                                        echo '<td><span class="badge badge-danger status-container-'.$row['id'].'">Gagal Terkirim</span></td>';
                                                    }else if($row['tiap_bulan'] == "1"){
                                                        echo '<td><span class="badge badge-primary status-container-'.$row['id'].'">Pengiriman Rutin Setiap Bulan</span></td>';
                                                    }else{
                                                        echo '<td><span class="badge badge-warning status-container-'.$row['id'].'">Menunggu Jadwal / Pending</span></td>';
                                                    }

                                                    if($row['status'] == "GAGAL"){
                                                        echo '<td class="button-container-'.$row['id'].'"><a style="margin:5px" class="btn btn-success" href="kirim.php?act=ku&id='.$row['id_blast'].'">Kirim Ulang</a><a style="margin:5px" class="btn btn-danger" href="hapus_pesan.php?id='.$row['id'].'">Hapus</a></td>';
                                                    }else{
                                                        echo '<td class="button-container-'.$row['id'].'">
                                                        <a href="hapus_pesan.php?id='.$row['id'].'"><i class="flaticon-delete-can-fill-1 t-icon t-hover-icon"></i></a></td>';
                                                    }
                                                    echo '</tr>';
                                                }

                                                ?>
                                        </tbody>
                                    </table>
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

     <!-- Modal -->
    <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="sendModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="sendModalLabel">Kirim Pesan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="?act=number" method="POST" enctype="multipart/form-data">
                <label> Pesan * </label>
                <textarea name="pesan" required class="form-control"></textarea>
                <br>
                <label> Media </label>
                <input type="file" name="media" class="form-control">
                <br>
                <label> Tanggal Pengiriman * </label>
                <input type="text" name="tgl" id="tanggal1" required class="form-control" placeholder="dd/mm/yyyy" autocomplete="false">
                <br>
                <label> Waktu Pengiriman * </label>
                <input type="time" name="jam" required class="form-control">
                <br>
                <label>Target</label>
                <br>
                <select class="form-control js-example-basic-multiple" name="target[]" multiple="multiple" style="width: 100%">
                    <?php
                        if($_SESSION['level'] == "1"){
                            $q = mysqli_query($koneksi, "SELECT * FROM nomor");
                        }else{
                            $u = $_SESSION['username'];
                            $q = mysqli_query($koneksi, "SELECT * FROM nomor WHERE make_by='$u'");
                        }
                        while($row = mysqli_fetch_assoc($q)){
                            echo '<option value="'.$row['nomor'].'">'.$row['nama'].' ('.$row['nomor'].')</option>';
                        }
                    ?>
                </select>
                <br>
                <p>*Kosongkan bila ingin mengirim ke semua kontak</p>
                <br>
                <br>
                <div class="form-check">
                    <input type="checkbox" name="tiap_bulan" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Kirim tiap bulan</label>
                </div>
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
                <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="groupsendModal" tabindex="-1" role="dialog" aria-labelledby="groupsendModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="groupsendModalLabel">Kirim Pesan Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="?act=group" method="POST" enctype="multipart/form-data">
                <label> Pesan * </label>
                <textarea name="pesan" required class="form-control"></textarea>
                <br>
                <label> Media </label>
                <input type="file" name="media" class="form-control">
                <br>
                <label> Tanggal Pengiriman * </label>
                <input type="text" name="tgl" id="tanggal2" required class="form-control" placeholder="dd/mm/yyyy" autocomplete="false">
                <br>
                <label> Waktu Pengiriman * </label>
                <input type="time" name="jam" required class="form-control">
                <br>
                <label>Target</label>
                <br>
                <select class="form-control js-example-basic-multiple" name="target[]" multiple="multiple" style="width: 100%">
                    <?php
                        $q = mysqli_query($koneksi, "SELECT * FROM groups");
                        while($row = mysqli_fetch_assoc($q)){
                            echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                        }
                    ?>
                </select>
                <br>
                <p>*Kosongkan bila ingin mengirim ke semua kontak</p>
                <br>
                <br>
                <div class="form-check">
                    <input type="checkbox" name="tiap_bulan" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Kirim tiap bulan</label>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
            <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
            </form>
        </div>
        </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            dropdownAutoWidth : true
        });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script>
        setInterval(sync, 4000);

        function sync(){
            let sync = localStorage.getItem('sync');
            if(sync == null){
                sync = moment().format("YYYY-MM-DD HH:mm:ss"); 
                localStorage.setItem('sync', sync);
            }

            $.get( "longpooling.php?lastsync="+sync, function( data ) {
                r = JSON.parse(data);

                jQuery.each(r, function(i, val) {
                    let id = val.id;
                    let id_blast = val.id_blast;
                    if(val.status == "GAGAL"){
                        $(".status-container-"+id).empty();
                        $(".status-container-"+id).html('Gagal Terkirim');
                        $(".status-container-"+id).addClass('badge-danger').removeClass('badge-warning');

                        $(".button-container-"+id).html('<a style="margin:5px" class="btn btn-success" href="kirim.php?act=ku&id='+id_blast+'">Kirim Ulang</a><a style="margin:5px" class="btn btn-danger" href="hapus_pesan.php?id='+id+'">Hapus</a>');
                    }

                    if(val.status == "TERKIRIM"){
                        $(".status-container-"+id).empty();
                        $(".status-container-"+id).html('Terkirim');
                        $(".status-container-"+id).addClass('badge-success').removeClass('badge-warning');

                        $(".button-container-"+id).html('<a style="margin:5px" class="btn btn-danger" href="hapus_pesan.php?id='+id+'">Hapus</a>');
                    }
                    console.log(id);
                });

                localStorage.setItem('sync', moment().format("YYYY-MM-DD HH:mm:ss"));            

            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
    $(document).ready(function() {
        var picker1 = new Pikaday({ 
            field: document.getElementById('tanggal1'),
            format: 'DD/MM/YYYY',
        });

        var picker2 = new Pikaday({ 
            field: document.getElementById('tanggal2'),
            format: 'DD/MM/YYYY',
        });
    });
    </script>

</body>
</html>