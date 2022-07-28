<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?> Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>/dist/snackbar.min.css">
  
  <!-- jQuery -->
  <script src="<?= base_url() ?>/js/jquery.min.js"></script>

  <script src="<?= base_url() ?>/dist/snackbar.min.js"></script>
  <script src="<?= base_url() ?>/dist/init.js"></script>
  
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() . route_to('home') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() . route_to('users') ?>" class="nav-link">User</a>
      </li>
      
      <?php
        if (session()->has('isLogin')) {
          if (session()->get('role') == 'admin') {
          ?>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url() . route_to('admin') ?>" class="nav-link">Admin</a>
            </li>
          <?php
          } elseif (session()->get('role') == 'karyawan') {
          ?>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url() . route_to('employee') ?>" class="nav-link">Karyawan</a>
            </li>
          <?php
          }
        } else {
          ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() . route_to('reg-view') ?>" class="nav-link">Register</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() . route_to('log-view') ?>" class="nav-link">Login</a>
        </li>
          <?php
        }
      ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
          <i class="fas fa-user"></i>
        </a>
        <?php
          if (session()->has('isLogin')) {
            ?>
              <div class="dropdown open">
                <div class="dropdown-menu" aria-labelledby="triggerId">
                  <a class="dropdown-item" href="<?= base_url() . route_to('logout') ?>" onclick="return confirm('Yakin Anda Akan Mengakhiri Session?')">Logout</a>
                </div>
              </div>
            <?php
          }
        ?>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>/" class="brand-link">
      <img src="<?= base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/collapsed-sidebar.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CI Manual Auth</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() . route_to('home') ?>">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
              <li class="breadcrumb-item active">CI Manual Auth</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?= $this->renderSection('content') ?>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/js/popper.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>

<script>
  function successNotif(msg) {
    Snackbar.show({
      text: msg,
      showAction: true,
      actionText: 'Dismiss',
      actionTextColor: '#5cb85c',
      backgroundColor: '#232323',
      width: 'auto',
      pos: 'bottom-left'
    });
  }

  function errorNotif(msg) {
    Snackbar.show({
      text: msg,
      showAction: true,
      actionText: 'Dismiss',
      actionTextColor: '#d9534f',
      backgroundColor: '#232323',
      width: 'auto',
      pos: 'bottom-left'
    });
  }

</script>

<?php
    if (session()->has('success')) {
        $msg = session()->getFlashdata('success');
        echo "<script>successNotif('$msg')</script>";
    }

    if (session()->has('error')) {
        $msg = session()->getFlashdata('error');
        echo "<script>errorNotif('$msg')</script>";
    }
?>
  
<?= $this->renderSection('js') ?>
</body>
</html>
