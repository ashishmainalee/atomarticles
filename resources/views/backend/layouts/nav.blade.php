  <!-- Navbar -->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('backend.dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-circle fa-x"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('backend.settings.profile') }}" class="dropdown-item profile" style="background-color: lavender">
            <img src="{{ asset(imagePath(Auth::user()->profile_image, 'abouts')) }}" class="img img-responsive img-circle center-block" style="width: 90px;height:90px;margin-left:75px;">
            <p class="text-center text-bold mt-2">{{ Auth::user()->name }}</p>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('backend.settings.password') }}" class="dropdown-item">
            <i class="fas fa-cog"></i>&nbspUpdate Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('backend.settings.profile') }}" class="dropdown-item">
            <i class="fa fa-user"></i> &nbsp Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i>  &nbsp Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt fa-x"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(imagePath(Auth::user()->profile_image, 'abouts')) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('backend.dashboard') }}" class="nav-link {{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('backend.articles') }}" class="nav-link {{ request()->routeIs('backend.articles*') ? 'active' : '' }}">
              <i class="fas fa-newspaper"></i>
              <p>
                Article
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.articles') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Articles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.articles.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Article</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.articles.trashed') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trashed Articles</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.categories') }}" class="nav-link  {{ request()->routeIs('backend.categories*') ? 'active' : '' }}">
              <i class="fas fa-layer-group"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.categories') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.categories.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('backend.categories.trashed') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trashed Categories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('backend.gallery*') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.gallery') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Images</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.gallery.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Image</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.gallery.manage') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Image</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->routeIs('backend.settings*') ? 'active' : '' }}">
              <i class="fas fa-cogs"></i>
              <p>
                Site Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.settings.about') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.settings.password') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.settings.profile') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Profile</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->routeIs('backend.messages*') ? 'active' : '' }}">

              <a href="{{ route('backend.messages') }}" class="nav-link">
                  <i class="fas fas fa-bell"> </i>
                  <p>
                      &nbspMessages
                  </p>
              </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p> Logout</p>
            </a>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
