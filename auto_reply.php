<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(post("keyword")){
    $keyword = post("keyword");
    $response = post("response");
    $case_sensitive = post("case_sensitive");

    if($case_sensitive == ""){
        $case_sensitive = "0";
    }else{
        $case_sensitive = "1";
    }

    $q = mysqli_query($koneksi, "INSERT INTO autoreply(`keyword`, `response`, `case_sensitive`)
            VALUES('$keyword', '$response', '$case_sensitive')");
    toastr_set("success", "Sukses menambahkan autoreply"); 
}

if(get("act") == "hapus"){
    $id = get("id");

    $q = mysqli_query($koneksi, "DELETE FROM autoreply WHERE id='$id'");
    toastr_set("success", "Sukses menghapus autoreply"); 
    redirect("auto_reply.php");
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
            loadHeader("auto_reply"); 

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
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <!-- Button trigger modal -->
                                           <div class="col-12 text-left">
                                                <button type="button" class="btn btn-primary btn-rounded ml-4 mt-4 mb-4" data-toggle="modal" data-target="#autoreply">
                                                <i class="fas fa-plus-circle"></i> Tambah Autoreply
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
                                                <th>Keyword</th>
                                                <th>Response</th>
                                                <th>Case Sensitive</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $q = mysqli_query($koneksi, "SELECT * FROM autoreply");

                                                while($row = mysqli_fetch_assoc($q)){
                                                    echo '<tr>';
                                                    echo '<td>'.$row['id'].'</td>';
                                                    echo '<td>'.$row['keyword'].'</td>';
                                                    echo '<td>'.$row['response'].'</td>';
                                                    if($row['case_sensitive'] == "0"){
                                                        echo '<td><span class="badge badge-primary">Non Sensitive</span></td>';
                                                    }else{
                                                        echo '<td><span class="badge badge-danger">Sensitive</span></td>';
                                                    }
                                                    echo '<td><a href="auto_reply.php?act=hapus&id='.$row['id'].'"><i class="flaticon-delete-can-fill-1 t-icon t-hover-icon"></i></a></td>';
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
    <div class="modal fade" id="autoreply" tabindex="-1" role="dialog" aria-labelledby="autoreplyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="autoreplyLabel">Tambah Autoreply</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <label> Keyword </label>
                    <input type="text" name="keyword" required class="form-control">
                    <br>
                    <label> Response </label>
                    <textarea name="response" class="form-control" required></textarea>
                    <br>
                    <div class="form-check">
                        <input type="checkbox" name="case_sensitive" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Case Sensitive ?</label>
                    </div>
            </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
                    <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
                    </div>
                </form>

        </div>
    </div>
<!-- endmodals -->
</body>
</html>