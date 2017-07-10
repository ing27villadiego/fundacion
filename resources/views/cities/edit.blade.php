@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">Editar la ciudad {{ $city->slug }}</div>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['route' => ['city_update', $city->id], 'method'=>'PUT', 'autocomplete'=>'off']) !!}
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                {{Form::label('name','Nombre Ciudad')}}
                                {{Form::text('name',$city->name ,['class' => 'form-control', 'placeholder' => 'nombre de la ciudad'])}}
                                <span class="alert-danger"> {{ $errors->first('name') }}</span>
                            </div>

                            <div class="form-group">
                                {{Form::label('letter','Letra ciudad')}}
                                {{Form::text('letter',$city->letter ,['class' => 'form-control', 'placeholder' => 'letra de la ciudad'])}}
                                <span class="alert-danger"> {{ $errors->first('letter') }}</span>
                            </div>
                            <button type="submit" class="btn btn-success pull-right">Guardar</button>
                        </fieldset>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop