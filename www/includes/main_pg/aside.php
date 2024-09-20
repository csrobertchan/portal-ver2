  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <center><span class="brand-text font-weight-light">4PS - Gateway</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $fullname; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home.php" class="nav-link <?php echo ($page == "main" ? "active" : "")?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo ($page == "rcct" || $page == "mcct" ? "menu-open" : "")?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                PROGRAM TOOLS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php echo ($page == "rcct" ? "active" : "")?>">
                <a href="rcct.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RCCT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mcct.php" class="nav-link <?php echo ($page == "mcct" ? "active" : "")?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MCCT</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($fullname = 'KIMBERLY MARTINEZ MANAGBANAG' || $fullname = 'ROBERT MALLARI CHAN') { ?>
          <li class="nav-item <?php echo ($page == "trans" || $page == "manage" ? "menu-open" : "")?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                ADMIN TOOLS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <?php if($fullname = 'KIMBERLY MARTINEZ MANAGBANAG' || $fullname = 'ROBERT MALLARI CHAN') { ?>
                <li class="nav-item">
                <a href="adm-manage.php" class="nav-link <?php echo ($page == "manage" ? "active" : "")?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MANAGE ADMIN</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="transmittal.php" class="nav-link <?php echo ($page == "trans" ? "active" : "")?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TRANSMITTAL BOX</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <li class="nav-header">PERSONNEL MATTERS</li>
          <li class="nav-item">
            <a href="vw_payslip.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>PAYSLIP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>AVAILABLE FORMS</p>
            </a>
          </li>
          <li class="nav-header">PROPERTY & SUPPLY</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Your equipment info</p>
            </a>
          </li>
          <li class="nav-header">NEED HELP ?</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Create Ticket</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>