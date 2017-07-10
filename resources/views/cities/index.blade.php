@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Lista de Ciudades</div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Letra</th>
                            <th>Nombre</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->letter }}</td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('city_edit', $city->id ) }}" role="button">
                                        <i class="glyphicon glyphicon-pencil">
                                        </i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#"  role="button">
                                        <i class="glyphicon glyphicon-remove">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Formulario Ciudad</div>
                </div>
                <div class="panel-body">
                    {{Form::open(['route' => 'city_create', 'method' => 'post', 'role' => 'form'])}}
                    <fieldset>
                        <div class="form-group">
                            {{Form::label('name','Nombre Ciudad')}}
                            {{Form::text('name',null ,['class' => 'form-control', 'placeholder' => 'nombre de la ciudad'])}}
                            <span class="error_span"> {{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group">
                            {{Form::label('letter','Letra ciudad')}}
                            {{Form::text('letter',null ,['class' => 'form-control', 'placeholder' => 'Asigne una letra a la ciudad'])}}
                            <span class="error_span"> {{ $errors->first('letter') }}</span>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Guardar</button>
                    </fieldset>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>


@stop