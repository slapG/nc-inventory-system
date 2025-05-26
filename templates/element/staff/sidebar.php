<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?= $this->Url->assetUrl('img/nc_logo.png')?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">NCIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $this->Url->assetUrl('img/cit.png')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-bold"><?= h($this->request->getAttribute('identity')->email ?? 'Unknown')?></a>
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
          <li class="nav-header">REQUEST</li>

          
              <li class="nav-item item-gradient-hover">
                <a href="<?= $this->Url->build(['prefix' => 'Staff', 'controller' => 'ServiceForms', 'action' => 'index']) ?>" class="nav-link">
                  <i class="nav-icon fas fa-tools"></i>
                  <p>Service</p>
                </a>
              </li>
              <li class="nav-item item-gradient-hover">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-toolbox"></i>
                  <p>Item</p>
                </a>
              </li>

              <li class="nav-item item-gradient-hover">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-vest"></i>
                  <p>Equipment</p>
                </a>
              </li>
            

          <li class="nav-header">HISTORY</li>
          <li class="nav-item item-gradient-hover">
            <a href="<?= $this->Url->build(['prefix' => 'Staff', 'controller' => 'ServiceForms', 'action' => 'serviceh']) ?>" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Service
              </p>
            </a>
          </li>
          
          
          
          <li class="nav-header">USER COMMAND</li>
          <li class="nav-item item-gradient-hover">
            <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Users', 'action' => 'logout']) ?>" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>