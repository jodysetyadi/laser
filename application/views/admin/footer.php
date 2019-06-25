<!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="container-fluid clearfix">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; <?= date('Y') ?>
      <a href="http://www.bootstrapdash.com/" target="_blank">Shoper</a>. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Di desain dan dibuat dengan
      <i class="mdi mdi-heart text-danger"></i>
    </span>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= base_url() ?>star-admin/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= base_url() ?>star-admin/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url() ?>star-admin/js/off-canvas.js"></script>
<script src="<?= base_url() ?>star-admin/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url() ?>star-admin/js/dashboard.js"></script>
<script src="<?= base_url() ?>asset/js/master.js"></script>
<script src="<?= base_url() ?>asset/js/data.js"></script>
<!-- End custom js for this page-->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel'
      ]
    });
  });
</script>

</body>

</html>