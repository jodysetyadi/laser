<?php echo $this->session->flashdata('msg'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>star-admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>star-admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url() ?>star-admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>star-admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('asset/logofs.png') ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="<?= base_url('hangar/admin/Login/check') ?>" method="POST">
                <div class="form-group text-center">
                  <img width="240px" src="<?= base_url('asset/fulllogofs.png') ?>" alt="">
                </div>
                <hr>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input name="username" id="username" type="text" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input name="password" id="password" type="password" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn submit-btn btn-block text-white" style="background-color: #2495ff;">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <p class="footer-text text-center">copyright © 2018 Franzshop. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url() ?>star-admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>star-admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>star-admin/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>star-admin/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>