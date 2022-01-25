  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/assets//img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/assets//img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                CRUD Basic
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/employee') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/pegawai') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Reporting
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/employee/fprint') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print PDF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/student') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export & Import Excel</p>
                </a>
              </li>
            </ul>
            
          </li>
          
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Relation
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/pengguna') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>One to One Relation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/article') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>One to Many Relation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/anggota') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Many to Many Relation</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
              <a href="{{ url('/upload') }}" class="nav-link">
                <i class="nav-icon fas fa-upload"></i>
                <p>
                  Upload
                </p>
              </a>
            </li>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>