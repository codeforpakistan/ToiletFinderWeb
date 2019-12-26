@extends('admin.layouts.app')

@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>MCQ'S</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active"><i class="fa fa-ticket"></i>Multiple Choice Questions</li>
        </ol>
    </section>
    {{-- Main content --}}
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($texts, ['route' => ['texts.update',$texts->id], 'method' => 'PATCH']) !!}
                    {{ csrf_field() }}
                        {{-- Text Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::label('text', 'Text:') !!}
                            {!! Form::text('text', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {{-- Submit Field --}}
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('mcqs.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
@endsection
