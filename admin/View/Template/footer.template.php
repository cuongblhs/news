<!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="">Admin</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/myscript/upload_image.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <script src="dist/js/myscript/my_functions.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            //Add text editor
            $(function() {
                
                $('#summernote').summernote({
                    // onImageUpload: function(files, editor, $editable) {
                    
                    // sendFile(files[0],editor,$editable);
                    // } 
                    height: 200,
                    callbacks: {
                        onImageUpload : function(files, editor, welEditable) {
                            console.log("onImageUpload");
                            for(var i = files.length - 1; i >= 0; i--) {
                                    sendFile(files[i], this);
                            }
                        }
                    } 
                });

                function sendFile(file,editor,welEditable) {
                    data = new FormData();
                    data.append("file", file);
                    $.ajax({
                        url: "View/upload.php",
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        success: function(data){
                            alert(data);
                            $('#summernote').summernote("insertImage", data, 'filename');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus+" "+errorThrown);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>