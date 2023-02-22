<template>
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 ftco-section img js-fullheight" style="background-image: url(images/bg.jpg);">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">User</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img :src="image" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">Tri Thuc</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
    <a href="#" class="nav-link active">
      <i class="fa fa-tachometer" aria-hidden="true"></i>
      <p>
        Features
        <i class="right fa fa-arrow-down" aria-hidden="true"></i>
      </p>
    </a>
    <!-- Upload Customer -->
    <ul class="nav nav-treeview" >
      <li class="nav-item">
        <a href="upload_customer" class="nav-link">
          <i class="fa fa-circle-thin nav-icon" aria-hidden="true"></i>
          <p style="color:white!important" >Upload customer</p>
        </a>
      </li>
    </ul>
    <!-- Upload Staff -->
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="upload_staff" class="nav-link">
          <i class="fa fa-circle-thin nav-icon" aria-hidden="true"></i>
          <p style="color:white!important" >Upload Staff</p>
        </a>
      </li>
    </ul>
    <!-- Fill Info Staff -->
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="upload_staff" class="nav-link">
          <i class="fa fa-circle-thin nav-icon" aria-hidden="true"></i>
          <p style="color:white!important" >Fill Info Staff</p>
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
</template>

<script>
</script>