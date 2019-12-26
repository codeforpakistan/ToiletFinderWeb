@extends('admin.layouts.app')

@section('stylesheets')

@endsection

@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>Toilet's</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active"><i class="fa fa-ticket"></i>Toilet</li>
        </ol>
    </section>
    {{-- Main content --}}
    @include('flash-message')
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List of all Toilet's </h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm">
                        <a class="btn btn-primary" href="{!! route('admin.toilet.create') !!}">Add New</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                @include('admin.pages.toilet.table')
                <hr>
                <div class="text-center">
                    {{ $toilets->links() }}
                </div>
            </div>
        </div>
    <hr>
    </div>
@endsection

@section('scripts')

@endsection