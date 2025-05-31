<nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
    <!-- Left navbar links -->
     <style>
  .nav-item.dropdown:hover > .dropdown-menu {
    display: block;
    margin-top: 0;
    left: 0px;
  }
</style>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <strong>PROFILE</strong>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'change_password', $this->request->getAttribute('identity')->getIdentifier()]) ?>" class="dropdown-item">
            <i class="fas fa-tools mr-2"></i>CHANGE PASSWORD
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'edit', $this->request->getAttribute('identity')->getIdentifier()]) ?>" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>EDIT PROFILE
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'view', $this->request->getAttribute('identity')->getIdentifier()]) ?>" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>VIEW PROFILE
          </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <strong>REQUEST</strong>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'ServiceForms', 'action' => 'index']) ?>" class="dropdown-item">
            <i class="fas fa-tools mr-2"></i>REQUEST SERVICE
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>REQUESTITEM
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>REQUIEST EQUIPMENT
          </a>
        </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Items', 'action' => 'index']) ?>" class="nav-link"><strong>
              INVENTORY</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Users', 'action' => 'logout']) ?>" class="nav-link"><strong>
              LOGOUT</strong></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"><strong>
              WELCOME! 
              <?= h(strtoupper(
          $this->request->getAttribute('identity')->lastname . ',  ' .
                  $this->request->getAttribute('identity')->firstname . '   ' .
                  ($this->request->getAttribute('identity')->middlename ?? 'Unknown')
              )) ?>
          </strong></a>
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