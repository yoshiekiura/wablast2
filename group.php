<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");
$login = cekSession();
if($login == 0){
    redirect("login.php");
}

if(post("nama") && !get("act")){
    $nama = post("nama");
    $anggota = post("anggota", false);

    if($anggota == null){
        $anggota = serialize(getAllNumber());
    }else{
        $anggota = serialize($anggota);
    }

    $q = mysqli_query($koneksi, "INSERT INTO groups(`nama`, `anggota`)
                                VALUES('$nama', '$anggota')");
    toastr_set("success", "Sukses membuat group");
}

if(get("act") == "hapus"){
    $id = get("id");

    $q = mysqli_query($koneksi, "DELETE FROM groups WHERE id='$id'");
    toastr_set("success", "Sukses menghapus Group"); 
    redirect("group.php");
}

if(get("act") == "edit"){
    $id = post("id");
    $nama = post("nama");
    $anggota = post("anggota", false);

    if($anggota == null){
        $anggota = serialize(getAllNumber());
    }else{
        $anggota = serialize($anggota);
    }

    $q = mysqli_query($koneksi, "UPDATE `groups` SET `nama`='$nama', `anggota`='$anggota' WHERE `id`='$id'");
    toastr_set("success", "Sukses mengedit group");
    redirect("group.php");

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
                        <h3>Nomor Grup</h3>
                        <div class="crumbs">
                            <ul id="breadcrumbs" class="breadcrumb">
                                <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
                                <li class="active"><a href="#">Nomor Grup</a> </li>
                                
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
                                                <button type="button" class="btn btn-primary btn-rounded ml-4 mt-4 mb-4" data-toggle="modal" data-target="#add">
                                                <i class="fas fa-plus-circle"></i> Nomor Group
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
                                                <th>Nama Group</th>
                                                <th>Anggota</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $q = mysqli_query($koneksi, "SELECT * FROM groups ORDER BY id DESC");
                                        while($row = mysqli_fetch_assoc($q)){
                                            echo '<tr>';
                                            echo '<td>'.$row['id'].'</td>';
                                            echo '<td>'.$row['nama'].'</td>';
                                            echo '<td>'.implode(", ",unserialize($row['anggota'])).'</td>';
                                            echo '<td>

                                            <a data-toggle="modal" data-target="#editModal" id="editModalBtn" class="edit" style="margin:5px" data-nama="'.$row['nama'].'" data-id="'.$row['id'].'"><i class="flaticon-edit-fill t-icon t-hover-icon"></i></a>

                                            <a href="group.php?act=hapus&id='.$row['id'].'"><i class="flaticon-delete-can-fill-1 t-icon t-hover-icon"></i></a> 
                                            </td>';
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <label> Nama Group * </label>
                    <input type="text" name="nama" required class="form-control">
                    <br>
                    <label>Anggota</label>
                    <br>
                    <select class="form-control tagging" name="anggota[]" multiple="multiple">
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="importLabel">Edit Nomor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="?act=edit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" required class="form-control" id="id_group_edit">
                    <label> Nama Group * </label>
                    <input type="text" name="nama" required class="form-control" id="nama_group_edit">
                    <br>
                    <label>Anggota</label>
                    <br>
                    <select class="form-control tagging" name="anggota[]" id="anggota_group_edit" multiple="multiple">
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

    <script>
    $(document).ready(function() {
        $('.tagging').select2({
            dropdownAutoWidth : false
        });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
    $(document).ready(function() {
        var picker = new Pikaday({ 
            field: document.getElementById('tanggal'),
            format: 'DD/MM/YYYY',
        });
    });

    $(".edit").on('click', function() {
        let id = $(this).attr("data-id");
        let nama = $(this).attr("data-nama");

        $.get( "json.php?id="+id, function( data ) {
            r = JSON.parse(JSON.stringify(data));
            $('#id_group_edit').val(id);
            $('#nama_group_edit').val(nama);
            $('#anggota_group_edit').val(json2array(r));
            $('#anggota_group_edit').trigger('change');
        });
    });

    
    function json2array(json){
        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function(key){
            result.push(json[key]);
        });
        return result;
    }
    </script>
</body>
</html>