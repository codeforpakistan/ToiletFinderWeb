@include('_partials.header')
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <hr>
                    <p style="text-align: center;font-weight: bold;font-size: 24px">
                            Please add the details below
                    </p>
                        @include('flash-message')
                    <hr>
                        {!! Form::open(['route' => 'apistore', 'method' => 'POST']) !!}
                                {{ csrf_field() }}
                                
                                <div class="row">
                                {{-- Address --}}
                                <div class="form-group col-sm-6">
                                    {!! Form::label('Name', 'Name:') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                
                                {{-- Address --}}
                                <div class="form-group col-sm-6">
                                    {!! Form::label('Email', 'Email:') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                {{-- Added By --}}
                                <div class="form-group col-sm-12">
                                    {!! Form::label('Purpose', 'Purpose:') !!}
                                   {!! Form::textarea("purpose",null, ['class' => 'form-control', 'required','placeholder' => 'Please provide the purpose of the api','rows' => 4, 'cols' => 54, 'style' => 'resize:none'])
                                    !!}

                                </div>

                                 
                                
                                </div>
                               
                                {{-- Submit Field --}}
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-info btn-block']) !!}
                                    <a href="{!! route('home') !!}" class="btn btn-secondary btn-block">Cancel</a>
                                </div>

                            </div>

                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-2"></div>
                    <div>
                </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="{{ asset('css/sweetalert.min.js') }}"></script>


  </body>
</html>
