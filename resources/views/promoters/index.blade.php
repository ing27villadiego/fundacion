@extends('layouts.app')

@section('content')
<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">LISTA DE PROMOTORES</div>
    </div>
    <div class="panel-body content-box-header panel-heading">

        <div class="btn btn-success">
            <i class="fa fa-plus glyphicon glyphicon-plus-sign"></i> <a href="{{route('create_promoter')}}" style="color: white; text-decoration: none">Agregar nuevo</a>
        </div>

    </div>
    <div class="content-box-large box-with-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-lesss display responsive no-wrap" id="example">
                        <thead>
                        <tr>
                            <th>Nombres </th>
                            <th>Apellidos</th>
                            <th>estado </th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($promoters as $promoter)
                            <tr>
                                <td>{{ $promoter->first_name }}</td>
                                <td>{{ $promoter->last_name }}</td>
                                <td>
                                    @if ($promoter->state  == 1)
                                        Activo
                                    @elseif ($promoter->state == 2)
                                        Inactivo
                                    @else
                                        Eliminado
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="#" role="button">
                                        <i class="glyphicon glyphicon-eye-open">
                                        </i>
                                    </a>
                                    <a class="btn btn-success btn-sm" href="#" role="button">
                                        <i class="glyphicon glyphicon-pencil">
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
    </div>
</div>

@stop