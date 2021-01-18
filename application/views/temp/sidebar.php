


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('vendor/adminlte/'); ?>dist/img/fahri.jpg" class="img-circle elevation-2" alt="Administrator">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?= base_url('dashboard'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('siswa'); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>

           <!-- <li class="nav-item">
            <a href="<?= base_url('guru'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Guru
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?= base_url('kelas'); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= base_url('mapel'); ?>" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Mata Pelajaran
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= base_url('nilai'); ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Nilai
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>