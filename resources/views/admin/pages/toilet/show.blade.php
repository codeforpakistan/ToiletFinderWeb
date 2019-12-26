@extends('admin.layouts.app')

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
    <div class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List of all Toilet's </h3>
                
            </div>
            <div class="box-body">
                <table class="table table-responsive" id="restaurants-table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>picture</th>
                    <th>Review</th>
                    <th>Comments</th>
                    <th>Toilet Id</th>
                    <th>Toilet Details</th>
                    {{-- <th colspan="3">Action</th> --}}
                </thead>
                <tbody>
                    @foreach($feedba as $fd)
                    {{-- dd($fd); --}}
                        <tr>
                            <td>{!! $fd->id !!}</td>
                            <td>{!! $fd->name !!}</td>
                            <td>{!! $fd->email !!}</td>
                            <td><img src="{!! $fd->picture !!}" width="40px" alt=""></td>
                            <!--<td>{!! $fd->review !!}</td>-->
                            <td>
                                @if($fd->review == 1 || $fd->review == 1.0 )
                                <div class="rating">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-0"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div><!-- end rating -->
                                @elseif($fd->review == 2 || $fd->review == 2.0)
                                <div class="rating">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-0"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div><!-- end rating -->
                                @elseif($fd->review == 3 || $fd->review == 3.0)
                                <div class="rating">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div><!-- end rating -->
                                @elseif($fd->review == 4 || $fd->review == 4.0)
                                <div class="rating">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div><!-- end rating -->
                                @elseif($fd->review == 5 || $fd->review == 5.0)
                                <div class="rating">
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div><!-- end rating -->
                                @endif
                            </td>
                            <td>{!! $fd->comments !!}</td>
                            @if($fd->toilet->address)
                            <td>{!! $fd->toilet->id !!}</td>
                            @else
                            <td>Not Specified the Location</td>
                            @endif
                            <td><a href="{{ route('admin.feedback.show',['id' => $fd->id]) }}" class="btn btn-sx btn-success">Show Details</a></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
                
            </div>
        </div>
    <hr>
    </div>
@endsection

