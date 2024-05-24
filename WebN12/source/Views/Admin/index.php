<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="../../Style/Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../Style/Admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../Style/Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../Style/Admin/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="../../Style/Admin/assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../Style/Admin/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
           
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="../../Views/Access/logout.php">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../Admin/index.php?page_layout=dashboard">
                <span class="menu-title">Dashboard</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Admin/index.php?page_layout=ManagerProduct">
                <span class="menu-title">Quản lý sản phẩm</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Admin/index.php?page_layout=ManagerAccount">
                <span class="menu-title">Quản lý tài khoản</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Admin/index.php?page_layout=ManagerBill">
                <span class="menu-title">Quản lý đơn hàng</span>
     
              </a>
            </li>
           
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        <?php
        if(isset($_GET['page_layout']))  {
            switch($_GET['page_layout']) {
                case 'dashboard':
                    include_once("../../Views/Admin/dashboard.php");
                    break;
                case 'ManagerAccount':
                  include_once("../../Views/Admin/ManagerAccount.php");
                    break;
                case 'editAccount':
                  include_once("../../Views/Admin/editAccount.php");
                    break;
                case 'editCustomerInfo':
                  include_once("../../Views/Admin/editCustomerInfo.php");
                    break;
                case 'ManagerBill':
                  include_once("../../Views/Admin/ManagerBill.php");
                    break;
                case 'editBill':
                  include_once("../../Views/Admin/editBill.php");
                    break;
                case 'detailBill':
                  include_once("../../Views/Admin/detailBill.php");
                    break;
                case 'ManagerProduct':
                  include_once("../../Views/Admin/ManagerProduct.php");
                    break;
            }
        }
        else {
            include_once("../../Views/Admin/dashboard.php");
        }
      
        ?>
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
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
    <script src="../../Style/Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../Style/Admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../Style/Admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../Style/Admin/assets/js/off-canvas.js"></script>
    <script src="../../Style/Admin/assets/js/hoverable-collapse.js"></script>
    <script src="../../Style/Admin/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../Style/Admin/assets/js/dashboard.js"></script>
    <script src="../../Style/Admin/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>