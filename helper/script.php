<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="vendor/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="vendor/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="vendor/assets/bootstrap/js/popper.min.js"></script>
    <script src="vendor/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="vendor/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="vendor/plugins/charts/sparklines/jquery.sparkline.min.js"></script>
    <script src="vendor/plugins/charts/d3charts/d3.v3.min.js"></script>
    <script src="vendor/plugins/charts/c3charts/c3.min.js"></script>
    <script src="vendor/plugins/calendar/pignose/moment.latest.min.js"></script>
    <script src="vendor/plugins/calendar/pignose/pignose.calendar.js"></script>
    <script src="vendor/plugins/dropzone/dropzone.min.js"></script>
    <script src="vendor/plugins/progressbar/progressbar.min.js"></script>
    <script src="vendor/assets/js/accounting-dashboard/accounting-custom.js"></script>    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
   
      <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="vendor/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#zero-config').DataTable({
            "language": {
                "paginate": { "previous": "<i class='flaticon-arrow-left-1'></i>", "next": "<i class='flaticon-arrow-right'></i>" },
                "info": "Showing page _PAGE_ of _PAGES_"
            }
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->

     <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="vendor/assets/js/modal/classie.js"></script>
    <script src="vendor/assets/js/modal/modalEffects.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPT FILE  -->
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
          $('[data-toggle="popover"]').popover()
        })
    </script>

     <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="vendor/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="vendor/plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- END THEME GLOBAL STYLE -->   

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- toastr -->
    <script src="vendor/plugins/notification/toastr/toastr.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <script>
        <?php

        toastr_show();

        ?>
    </script>

    
    <!--  END CUSTOM SCRIPT FILE  -->

 <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="vendor/plugins/select2/select2.min.js"></script>
    <script src="vendor/plugins/select2/custom-select2.js"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->