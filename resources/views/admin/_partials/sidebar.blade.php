<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
             <p>{{ \Auth::user()->name }}</p> 
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active">
          <a href={{ route('admin.dashboard') }}>
            <i class="fa fa-dashboard"></i>Home
          </a>
        </li>
      
        <li><a href="{{ route('admin.toilet.index') }}"><i class="fa fa-bath"></i> <span>Toilet's</span></a></li>
        <li><a href="{{ route('admin.feedback.index') }}"><i class="fa fa-star"></i> <span>Feedback</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  