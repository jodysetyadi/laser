<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Shoper</title>
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>asset/fulllogofs.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>asset/logofs.png" width="100px" height="100px" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-elevation-rise"></i>Laporan</a>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a href="<?= base_url('hangar/admin/laporan/produk') ?>" class="dropdown-item mt-2">
                Data Produk
              </a>
              <a href="<?= base_url('hangar/admin/laporan/penjualan') ?>" class="dropdown-item">
                Data Penjualan
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">
                <?php
                $inbox = $this->db->get_where('inbox', ['status' => "0"])->num_rows();
                echo $inbox;
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">Anda memiliki <?= $inbox ?> pesan yang belum dibaca
                </p>
              </div>
              <div class="dropdown-divider"></div>
              <?php $newinbox = $this->db->get_where('inbox', ['status' => "0"])->result(); ?>
              <?php foreach ($newinbox as $newinb) { ?>

                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark"><?= $newinb->nama ?>
                    </h6>
                    <p class="font-weight-light small-text">
                      <?php $time = date('d M Y H:i:s', strtotime($newinb->tgl)) ?>
                      <?= $time ?>
                    </p>
                    <p class="font-weight-light small-text">
                      <?= substr($newinb->pesan, 0, 10) ?>
                    </p>
                  </div>
                </a>

              <?php } ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">
                <?php
                $order = $this->db->get_where('pesanan', ['status' => "Menunggu Konfirmasi"])->num_rows();
                echo $order;
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <?php if ($order != 0) { ?>
                  <p id="new-notification" class="mb-0 font-weight-normal float-left">Anda memiliki <?= $order ?> orderan yang belum dikonfirmasi
                  </p>
                <?php } else { ?>
                  <p id="new-notification" class="mb-0 font-weight-normal float-left">Notifikasi Kosong
                  </p>
                <?php } ?>
              </a>
              <div class="dropdown-divider"></div>
              <?php
              $neworder = $this->db->get_where('pesanan', ['status' => "Menunggu Konfirmasi"])->result();
              ?>
              <?php foreach ($neworder as $new) { ?>

                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-alert-circle-outline mx-0"></i>
                    </div>
                  </div>
                  <div id="inbox-admin" class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark"><?= $new->no_pesanan ?></h6>
                    <p class="font-weight-light small-text">
                      <?php $date = date('d M Y H:i:s', strtotime($new->tgl_pesanan)); ?>
                      <?= $date ?>
                    </p>
                  </div>
                </a>

              <?php } ?>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link mdi mdi-account" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Halo, <?= $this->session->userdata('nm_admin') ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a href="<?= base_url('hangar/admin/master/changepassword') ?>" class="dropdown-item">
                Ubah Password
              </a>
              <a href="<?= base_url('hangar/admin/login/logout') ?>" class="dropdown-item">
                Keluar
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper mt-2 mb-1" style="width:100%; height:auto;">
                <div class="profile-image">
                  <?php
                  $admin = $this->db->get('admin', ['id_admin' => $this->session->userdata('id_admin')])->row();
                  if ($admin) {
                    $foto = $admin->foto;
                  } else {
                    $foto = NULL;
                  }
                  ?>
                  <?php if (!is_null($foto)) { ?>
                    <img width="100%" height="100%" src="<?= $this->session->userdata('foto_admin') ?>" alt="profile image">
                  <?php } ?>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $this->session->userdata('nm_admin') ?></p>
                  <div>
                    <small class="designation text-muted">Admin</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('hangar/admin/dashboard') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master">
              <ul class="nav flex-column sub-menu">
                <?php if ($this->session->userdata('level') == "1") { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/admin') ?>">Admin</a>
                  </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('hangar/admin/master/product') ?>">Produk</a>
                </li>
                <?php if ($this->session->userdata('level') == "1") { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/size') ?>">Ukuran</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/color') ?>">Warna</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/voucher') ?>">Voucher</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/category') ?>">Kategori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/subcategory') ?>">subkategori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/promo') ?>">Promo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hangar/admin/master/banner') ?>">Banner</a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#data" aria-expanded="false" aria-controls="data">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="data">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('hangar/admin/data/member') ?>">Pelanggan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('hangar/admin/data/review') ?>">Ulasan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('hangar/admin/data/inbox') ?>">Inbox</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('hangar/admin/data/order') ?>">Pesanan</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>