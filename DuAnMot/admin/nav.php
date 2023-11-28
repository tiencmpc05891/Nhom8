<?php
ob_start();
// Hàm ob_start() được sử dụng để bắt đầu bộ nhớ đầu ra động (output buffering), giúp tránh lỗi "Cannot modify header information" khi có output đã được gửi trước khi gọi hàm header().
?>


<style>
  /* CSS cho phần nav */
  .main-sidebar {
    position: relative;
    background: radial-gradient(circle, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../site/img/footergalaxy.jpg');
    z-index: 1;
    /* Đảm bảo phần nav hiển thị trên cùng */
  }

  /* CSS cho phần footer */
</style>

<!-- đây là phần gôm lại giữa sidebar và nav -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?act=bieudo" class="nav-link">Biểu đồ</a>
    </li>
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

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">+99</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <div class="dropdown-divider"></div>

        <div class="dropdown-divider"></div>

        <div class="dropdown-divider"></div>
        <a href="index.php?act=dsbl" class="dropdown-item dropdown-footer">Danh sách bình luận</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">45</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">45 Thông báo</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 20 Tin nhắn mới
          <span class="float-right text-muted text-sm">2 Phút trước</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 25 Lời mời kết bạn
          <span class="float-right text-muted text-sm">24 tiếng trước</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 0 Cảnh báo
          <span class="float-right text-muted text-sm">1 ngày trước</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">Xem tất cả thông báo</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-pink elevation-4">


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../site/img/logoasm1.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="../index.php" class="d-block">Quay lại cửa hàng</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>

        </li>
        <li class="nav-item">
          <a href="index.php?act=listdm" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-open"></i>
            <p>
              Quản lí danh mục
              <span class="badge badge-info right">6</span>
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=listsp" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-plus"></i>
            <p>
              Quản lí sản phẩm
              <!-- <span class="right badge badge-danger">New</span> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=dskh" class="nav-link">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
              Quản lí khách hàng
              <!-- <i class="fas fa-angle-left right"></i> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=dsbl" class="nav-link">
            <i class="nav-icon fa-solid fas fa-comment"></i>
            <p>
              Quản lí bình luận
              <!-- <i class="fas fa-angle-left right"></i> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=listbv" class="nav-link">
            <i class="nav-icon fa-solid fas fa-comment"></i>
            <p>
              Quản lý bài viết
              <!-- <i class="fas fa-angle-left right"></i> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=listbn" class="nav-link">
            <i class="nav-icon fa-solid fa-folder-plus"></i>
            <p>
              Quản lý banner
              <!-- <i class="fas fa-angle-left right"></i> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=listbill" class="nav-link">
            <i class="nav-icon fa-solid fa-shopping-cart"></i>
            <p>
              Danh sách đơn hàng
              <!-- <i class="fas fa-angle-left right"></i> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?act=thongke" class="nav-link">
            <i class="nav-icon fa-solid fa-chart-line"></i>
            <p>
              Quản lí thống kê
              <!-- <i class="fas fa-angle-left right"></i> -->
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="javascript:void(0);" onclick="confirmLogout()" class="nav-link">
            <i class="nav-icon fa-solid fas fa-sign-out-alt"></i>
            <p>
              Đăng xuất
            </p>
          </a>
        </li>

        <script>
          function confirmLogout() {
            var confirmLogout = confirm("Bạn có chắc chắn muốn đăng xuất?");
            if (confirmLogout) {
              window.location.href = 'index.php?act=logout';
            }
          }
        </script>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>