@extends('admin.layouts.app')

@section('stylesheets')

@endsection

@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>Category Detail's</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active"><i class="fa fa-ticket"></i>Toilet Reviews</li>
        </ol>
    </section>
    {{-- Main content --}}
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List of all Toilet's Reviews</h3>
                <br>
                {{-- <div class="box-tools">
                    <div class="input-group input-group-sm">
                        <a class="btn btn-primary" href="{!! route('category_details.index') !!}">Add New</a>
                    </div>
                </div> --}}
            </div>
            <div class="box-body">
                @include('admin.pages.feedback.table')
                <hr>
                <div class="text-center">
                    {{ $feedback->links() }}
                </div>
            </div>

</div>

</div>
@endsection

@section('scripts')

@endsection