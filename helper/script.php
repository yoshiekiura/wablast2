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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <script>
        <?php

        toastr_show();

        ?>
    </script>
    <!--  END CUSTOM SCRIPT FILE  -->

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h4 class="modal-heading mb-4 mt-2">Why We Use Electoral College, Not Popular Vote</h4>
                <p class="modal-text mb-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-rounded mb-4 mt-2">Save changes</button>
            <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
<!-- endmodals -->
</div>