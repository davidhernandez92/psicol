  </div>
  <script>
    const base_url = "<?= base_url(); ?>";
  </script>
  <!-- END MAIN CONTAINER -->
  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="<?= media(); ?>/js/libs/jquery-3.1.1.min.js"></script>
  <script src="<?= media(); ?>/bootstrap/js/popper.min.js"></script>
  <script src="<?= media(); ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= media(); ?>/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= media(); ?>/js/app.js"></script>
  <script src="<?= media(); ?>/plugins/table/datatable/datatables.js"></script>

  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
  <script src="<?= media(); ?>/js/custom.js"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="<?= media(); ?>/js/functions/functions_admin.js"></script>
  <script src="<?= media(); ?>/js/functions/<?= $data['page_functions_js']; ?>"></script>
  <script src="<?= media(); ?>/plugins/sweetalerts/sweetalert2.min.js"></script>
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  </body>

  </html>