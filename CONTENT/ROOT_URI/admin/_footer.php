 <!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center"> 2020-2021 © SMS+ Dashboard <a
        href="https://codewithbogo.in/">Code With Bogo</a>
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
    <script src="/assets/dashboard/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/dashboard/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/dashboard/js/app-style-switcher.js"></script>
    <script src="/assets/dashboard/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="/assets/dashboard/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/assets/dashboard/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/dashboard/js/custom.js"></script>
    <script src="/JS/datatable.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <!-- <script src="/JS/charts.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->

    <script src="/assets/emoji/lib/js/config.js"></script>
    <script src="/JS/export.js"></script>
    <script src="/assets/emoji/lib/js/util.js"></script>
    <script src="/assets/emoji/lib/js/jquery.emojiarea.js"></script>
    <script src="/assets/emoji/lib/js/emoji-picker.js"></script>

    <script>
      $(async function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '.emojiPick',
          assetsPath: '/assets/emoji/lib/img/',
          popupButtonClasses: 'fas fa-smile'
        });
        console.log(emojiPicker)
        window.emojiPicker.discover();
      });
    </script>


    <script type="text/javascript">
      $(document).ready(() => {
        $('#ticketList').DataTable( {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "order": [[ 0, "desc" ]]
        });
      });
       $(document).ready(() => {
        $('#categoryList').DataTable( {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "order": [[ 0, "asc" ]]
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