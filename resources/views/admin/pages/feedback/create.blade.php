@extends('admin.layouts.app')

@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>Category Details</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active"><i class="fa fa-ticket"></i>Category Details</li>
        </ol>
    </section>
    {{-- Main content --}}
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'category_details.store', 'method' => 'POST', 'files' => true ]) !!}
                        {{ csrf_field() }}
                        
                        {{-- Category Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('Category ID', 'please select category to add wallpaper:') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']); !!}
                        </div>

                        {{-- Image Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('Image', 'image:') !!}
                            {!! Form::file('image', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        {{-- Image Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('Model Number', 'Model Number:') !!}
                            {!! Form::text('model_number', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {{-- Submit Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('category_details.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
@endsection
