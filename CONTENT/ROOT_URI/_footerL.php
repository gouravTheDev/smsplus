 <!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center"> 2020-2021 © SMS+ Dashboard
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/dashboard/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/dashboard/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/dashboard/js/app-style-switcher.js"></script>
    <script src="assets/dashboard/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="assets/dashboard/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/dashboard/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/dashboard/js/custom.js"></script>
    <script src="/JS/datatable.js"></script>

    <script type="text/javascript">
      $(document).ready(() => {
        $('#ticketList').DataTable( {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "order": [[ 0, "desc" ]]
        });
      });
      $(document).ready(() => {
        $('.serviceList').DataTable( {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "order": [[ 0, "asc" ]],
          "columns": [
                null,
                { "width": "50%" },
                null,
                null,
                null,
                null
            ]
        });
      });
    </script>

    <!--This page JavaScript -->
    <!--chartis chart-->
</body>

</html>