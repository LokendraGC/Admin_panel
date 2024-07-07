  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">Home</a>
          </li> --}}

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item text-center">
              <p style="margin-top: 7px">Welcome {{ explode(' ', Auth::user()->name)[0] }}</p>
          </li>
          <li class="nav-item ">
              <a href="{{route('user.all')}}" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
