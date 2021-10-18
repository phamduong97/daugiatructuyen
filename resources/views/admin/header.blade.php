<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" style="width: 250px;" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!--- ----------Config ----------------->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cogs"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Cài đặt hệ thống</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('logout')}}" class="dropdown-item" style="text-align: center;">
            <i class="fa fa-sign-out-alt"></i> Đăng xuất
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="public/assets/images/logo.png"  class="brand-image elevation-3">
      <span class="brand-text font-weight-light">Quản trị  </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if(Auth::check())
            {{Auth::user()->fullname}}
            @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bảng điều khiển
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Quản lý lịch làm việc
              </p>
            </a>
          </li> 
           -->
{{--     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-portrait"></i>
              <p>
                Quản lý đơn vị/trung tâm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('admin.create-employee')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới đơn vị/trung tâm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.list-employee')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách đơn vị/trung tâm</p>
                </a>
              </li>
            </ul>
          </li>  --}}
           
           @if(Auth::user()->role==4 || Auth::user()->role==3)
           <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Quản lý báo cáo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('admin.list-complete-100')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hồ sơ hoàn thành thông tin 100%</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.list-complete-50')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hồ sơ hoàn thành thông tin dưới <br> 50%</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.list-month')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hồ sơ được nhập trong tháng</p>
                </a>
              </li>
            </ul>
          </li> -->

           <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản lý tài liệu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> -->
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.list-type-document')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục tài liệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.list-document')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài liệu</p>
                </a>
              </li>
            </ul>
          </li> -->
          @endif

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý tài sản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('admin.create_blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới tài sản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.list_blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài sản</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.list_type_blog')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Danh mục tài sản
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý tin tức
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('admin.create_blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới tin tức</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('admin.list_blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tin tức</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{Route('admin.list_type_blog')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Danh mục tin tức
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{Route('admin.contact')}}" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Liên hệ
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{Route('admin.settings')}}" class="nav-link">
              <i class="fab fa-ubuntu"></i>
              <p>
                Cài đặt website
              </p>
            </a>
          </li>

         
          @if(Auth::user()->role==4)
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.all-bidders')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài khoản đấu giá</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.manage-users')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài khoản hệ thống</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.create-users')}}" class="nav-link item-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới tài khoản</p>
                </a>
              </li>
            </ul>
          </li>
        
          @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <style type="text/css">
    .item-link{
      font-size: 13px!important;
    }
  </style>