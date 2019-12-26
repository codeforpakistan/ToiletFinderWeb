@extends('admin.layouts.app')

@section('stylesheets')

@endsection

@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>User's</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active"><i class="fa fa-ticket"></i>User's deatils</li>
        </ol>
    </section>
    {{-- Main content --}}
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List of all User's </h3>
            </div>
            <div class="box-body">
                @include('admin.pages.user.table')
                <hr>
                <div class="text-center">
                    {{ $users->links() }}
                </div>
            </div>

</div>

</div>
@endsection

@section('scripts')

@endsection