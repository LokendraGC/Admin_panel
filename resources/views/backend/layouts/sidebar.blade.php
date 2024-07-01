  <!-- Main Sidebar Container -->

  <style>
      i.fa.fa-tachometer {
          font-size: 18px;
      }

      i.fa.fa-tachometer,
      .fa-cog,
      .fa-book,
      .fa-rss,
      .fa-user,
      .fa-television,
      .fa-wrench {
          margin-right: 5px;
      }

      i.fa.fa-circle {
          font-size: 8px;
          padding-right: 4px;
          text-align: center;
      }

      .nav-sidebar>.nav-item.menu-open>.nav-link {
          background-color: rgb(110 155 201) !important;
      }

      .nav-treeview>.nav-item>.nav-link.active {
          background-color: rgba(255, 255, 255, .1) !important;
          color: white !important;
      }

      .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
          background-color: rgba(255, 255, 255, .1) !important;
          color: white !important;
      }
  </style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
          <i class="fa fa-tachometer" aria-hidden="true"></i>
          <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}"
                          class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                          <i class="fa fa-television" aria-hidden="true"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin.options.index') }}"
                          class="nav-link {{ Route::is('admin.options.index') ? 'active' : '' }}">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <p>
                              Options
                          </p>
                      </a>

                  </li>

                  <li class="nav-item {{ Request::is('admin/post*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link">
                          <i class="fa fa-rss" aria-hidden="true"></i>
                          <p>
                              Posts
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.post.index') }}"
                                  class="nav-link {{ Route::is('admin.post.index') ? 'active' : '' }}">
                                  {{-- <i class="fa fa-circle" aria-hidden="true"></i> --}}
                                  <p>All Posts</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.post.create') }}"
                                  class="nav-link {{ Route::is('admin.post.create') ? 'active' : '' }}">
                                  {{-- <i class="fa fa-circle" aria-hidden="true"></i> --}}

                                  <p>Add New Post</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.post.category.index') }}"
                                  class="nav-link {{ Route::is('admin.post.category.index') ? 'active' : '' }}">
                                  {{-- <i class="fa fa-circle" aria-hidden="true"></i> --}}

                                  <p>Category</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item {{ Request::is('admin/page*') ? 'menu-open' : '' }}">
                      <a href="#" class="nav-link">
                          <i class="fa fa-book" aria-hidden="true"></i>
                          <p>
                              Pages
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.page.index') }}"
                                  class="nav-link {{ Route::is('admin.page.index') ? 'active' : '' }}">
                                  {{-- <i class="fa fa-circle" aria-hidden="true"></i> --}}
                                  <p>All Page</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.page.create') }}"
                                  class="nav-link {{ Route::is('admin.page.create') ? 'active' : '' }}">
                                  {{-- <i class="fa fa-circle" aria-hidden="true"></i> --}}
                                  <p>Add New Page</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.options.index') }}" class="nav-link">
                          <i class="fa fa-user-plus" aria-hidden="true"></i>
                          <p>
                              User Profile
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.options.index') }}" class="nav-link">
                          <i class="fa fa-cog" aria-hidden="true"></i>
                          <p>
                              Settings
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link">
                          <i class="fa fa-sign-out" aria-hidden="true"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
