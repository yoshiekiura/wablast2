<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(post("nama")){
    $nama = post("nama");
    $nomor = post("nomor");
    $u = $_SESSION['username'];

    if(cekNomorWhatsapp($nomor)){
        $count = countDB("nomor", "nomor", $nomor);
    
        if($count == 0){
            $q = mysqli_query($koneksi, "INSERT INTO nomor(`nama`, `nomor`, `make_by`)
            VALUES('$nama', '$nomor', '$u')");
            toastr_set("success", "Sukses input nomor"); 
        }else{
            toastr_set("error", "Nomor telah ada sebelumnya");
        }
    }else{
        toastr_set("error", "Nomor tidak terdaftar whatsapp");
    }   
}

if(get("act") == "hapus"){
    $id = get("id");

    $q = mysqli_query($koneksi, "DELETE FROM nomor WHERE id='$id'");
    toastr_set("success", "Sukses hapus nomor"); 
    redirect("nomor.php");
}

if(get("act") == "delete_all"){
    $q = mysqli_query($koneksi, "DELETE FROM nomor");
    toastr_set("success", "Sukses hapus semua nomor"); 
    redirect("nomor.php");
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
            loadHeader("nomor");
        ?>
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Data Nomor</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                                <li class="active"><a href="#">Data Nomor</a> </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <!-- Button trigger modal -->
                                           <div class="col-6 text-left">
                                                <button type="button" class="btn btn-primary btn-rounded ml-3 mt-4 mb-4" data-toggle="modal" data-target="#add">
                                                <i class="fas fa-plus-circle"></i> Tambah Nomor
                                                </button>
                                           </div>
                                           <div class="col-6 text-right">
                                                <button type="button" class="btn btn-success btn-rounded mt-4 mb-4" data-toggle="modal" data-target="#import">
                                                <i class="fas fa-file-excel"></i> Import Excel
                                                </button>
                                                <a class="btn btn-danger btn-rounded mt-4 mb-4" href="nomor.php?act=delete_all" style="margin:5px"><i class="fas fa-trash"></i> Hapus Semua</a>
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
                                                <th>Nama</th>
                                                <th>Nomor</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        if($_SESSION['level'] == "1"){
                                            $q = mysqli_query($koneksi, "SELECT * FROM nomor");
                                        }else{
                                            $u = $_SESSION['username'];
                                            $q = mysqli_query($koneksi, "SELECT * FROM nomor WHERE make_by='$u'");
                                        }
                                        while($row = mysqli_fetch_assoc($q)){
                                            echo '<tr>';
                                            echo '<td>'.$row['id'].'</td>';
                                            echo '<td>'.$row['nama'].'</td>';
                                            echo '<td>'.$row['nomor'].'</td>';
                                            echo '<td><a href="nomor.php?act=hapus&id='.$row['id'].'"><i class="flaticon-delete-can-fill-1 t-icon t-hover-icon"></i></a></td>';
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
     <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addLabel">Tambah Nomor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <label> Nama </label>
                    <input type="text" name="nama" required class="form-control">
                    <br>
                    <label> Nomor Telepon </label>
                    <input type="text" name="nomor" required class="form-control" placeholder="08xxxxxxxx">
            </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
                    <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
                    </div>
                </form>

        </div>
    </div>
    </div>
<!-- endmodals -->

     <!-- Modal -->
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="importLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="importLabel">Import Nomor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="import_excel.php" method="POST" enctype="multipart/form-data">
                    <label> File (.xlsx) </label>
                    <input type="file" name="file" required class="form-control">
                    <br>
                    <label> Mulai dari Baris ke </label>
                    <input type="text" name="a" required class="form-control" value="2">
                    <br>
                    <label> Kolom Nama ke </label>
                    <input type="text" name="b" required class="form-control" value="1">
                    <br>
                    <label> Kolom Nomor ke </label>
                    <input type="text" name="c" required class="form-control" value="2">
                    <br>
                    <p> Download file contoh <a href="excel/contoh.xlsx" target="_blank">disini</a> </p>
            </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
                    <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
                    </div>
                </form>

        </div>
    </div>
    </div>
<!-- endmodals -->
    
    <!-- script -->
</body>
</html>