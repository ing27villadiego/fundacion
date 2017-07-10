@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel-body content-box-header panel-heading">

            <div class="box-footer panel-title clearfix no-border">
                <h3>FORMULARIO AGREGAR PROMOTOR</h3>
            </div>
        </div>
        <div class="row">

            @include('errors.error')
            <div class="col-lg-11">

                {!! Form::open(['route' => 'promoter_create', 'method'=>'POST', 'autocomplete'=>'off']) !!}

                {{ Form::token() }}
                <hr>

                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::label('first_name', 'Nombres',['class'=> 'control-label']) !!}
                            {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'Nombres del Promotor...']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::label('last_name', 'Apellidos',['class'=> 'control-label']) !!}
                            {!! Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Apellidos del Promotor...']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::label('address', 'Direccion',['class'=> 'control-label']) !!}
                            {!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Direccion del Promotor...']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::label('cell_phone', 'Celular',['class'=> 'control-label']) !!}
                            {!! Form::text('cell_phone', null, ['class'=>'form-control', 'placeholder'=>'Celular del Promotor...']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::label('document', 'Documento',['class'=> 'control-label']) !!}
                            {!! Form::text('document', null, ['class'=>'form-control', 'placeholder'=>'Documento del Promotor...']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::label('email', 'Correo', ['class'=>'control-label']) !!}
                            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'example@gmail.com...']) !!}
                        </div>
                    </div>
                </div>

                <br>
                <div class="modal-footer">
                    {!! Form::submit('Agregar Promotor', ['class' => 'btn btn-primary']) !!}
                    {!! Form::reset('Cancelar', ['class' => 'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
