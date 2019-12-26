<header class="main-header" style="background-image:linear-gradient(-60deg,#2ea1e3,#05d8c3);">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color:white"><b>Public Toilet </b>Finder</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        {{-- Sidebar toggle button --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{-- User Account: style can be found in dropdown.less --}}
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('admin/img/avatar5.png') }}" class="user-image" alt="User Image">
                                 <span class="hidden-xs" style="color:black"><b>{{ \Auth::user()->name }}</b></span> 
                    </a>
                    <ul class="dropdown-menu">
                        {{-- User image --}}
                        <li class="user-header">
                            <img src="{{ asset('admin/img/avatar5.png') }}" class="img-circle" alt="User Image">
                                    <p style="color:black"><small><b>Username : {{ \Auth::user()->name }}</b></small></p>
                                    <p style="color:black"><small><b>Email : {{ \Auth::user()->email }}</b></small></p>
                        </li>
                        {{-- Menu Footer --}}
                        <li class="user-footer">
                            {{-- <div class="pull-left"><a href="{{ route('changePassword') }}" class="btn btn-default btn-flat">Change Password</a></div> --}}
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                {!! Form::open(['route' => 'logout', 'method' => 'POST', 'files' => true, 'id' => "logout-form", 'style' =>"display: none;"]) !!}
                                {!! Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  