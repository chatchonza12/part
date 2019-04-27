<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">ONLINE</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
     
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item dropdown show">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>จัดการสินค้า่</span>
        </a>
        <div class="dropdown-menu show" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">จัดการสินค้า:</h6>
          <a class="dropdown-item" href="manager_dog.php"><i class="fas fa-plus-square"></i> จัดการสินค้า</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>จัดการสมาชิก</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">จัดการลูกค้า:</h6>
          <a class="dropdown-item" href="manager_customer.php"><i class="fas fa-plus-square"></i> จัดการสมาชิก</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>ออกจากระบบ</span>
        </a>
      </li>
    </ul>
