  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <span class="brand-text font-weight-light" style="font-weight: bolder;">AM-System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
    </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type==1)
        <li class="nav-item">
            <a href=" {{ url('/admin/dashboard')}}" class="nav-link @if( Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/admin/list')}}" class="nav-link @if( Request::segment(2) == 'admin') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
        @elseif(Auth::user()->user_type==2)
        <li class="nav-item">
            <a href=" {{ url('/HOD/dashboard')}}" class="nav-link @if( Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=" {{ url('/HOD/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Student
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/HOD/dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Attachment
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/HOD/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Staff
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=" {{ url('/HOD/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href=" {{ url('/HOD/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Direct chat
              </p>
            </a>
          </li>
        @elseif(Auth::user()->user_type==3)
        <li class="nav-item">
            <a href=" {{ url('/staff/dashboard')}}" class="nav-link @if( Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/staff/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                View student
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/staff/notes/add')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Supervisor Notes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/staff/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports and Evaluation
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/staff/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-check-circle"></i>
              <p>
                Approve Attachment Completion
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/staff/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Direct chat
              </p>
            </a>
          </li>
        @elseif(Auth::user()->user_type==4)
        <li class="nav-item">
            <a href=" {{ url('/student/dashboard')}}" class="nav-link @if( Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/student/attachment/interface')}}" class="nav-link @if( Request::segment(2) == 'attachment') active @endif">
            <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Attachment
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/student/dashboard')}}" class="nav-link @if( Request::segment(2) == 'supervisor') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Supervisor
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/student/logbook/download')}}" class="nav-link @if( Request::segment(2) == 'Logbook') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logbook
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/student/dashboard')}}" class="nav-link @if( Request::segment(2) == 'reports') active @endif">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Reports
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/student/dashboard')}}" class="nav-link @if( Request::segment(2) == 'notifications') active @endif">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notifications/Reminders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href=" {{ url('/student/directchat')}}" class="nav-link @if( Request::segment(2) == 'directchat') active @endif">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Direct chat
              </p>
            </a>
          </li>
        @endif
          <li class="nav-item">
            <a href="{{url('/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
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