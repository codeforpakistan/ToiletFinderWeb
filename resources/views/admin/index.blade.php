@extends('admin.layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box" style="background-image:linear-gradient(-60deg,#2ea1e3,#05d8c3);">
            <div class="inner">
              <h3 style="color:white;">Toilet's</h3>

              <h4>Add Toilet</h4>
              @if ($toilet)
                  <b>Total Toilet {{ $toilet }}</b>
              @endif
            </div>
            <div class="icon">
              <i class="fa fa-bath"></i>
            </div>
            <a href="{{ route('admin.toilet.create') }}" class="small-box-footer">Create <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box" style="background-image:linear-gradient(-60deg,#2ea1e3,#05d8c3);">
            <div class="inner">
              <h3 style="color:white;">Feedback</h3>

              <h4>Review Feedback</h4>
                @if ($review)
                  <b>Total Review {{ $review }}</b>
                @endif
            </div>
            <div class="icon">
              <i class="fa fa-star"></i>
            </div>
            <a href="{{ route('admin.feedback.index') }}" class="small-box-footer">See more <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
@endsection

