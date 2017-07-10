@extends('layouts.app')

@section('content')

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="{{asset('imagenes/padrinosHappy.jpeg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Cumpleaños Padrinos</h2>
                <p>Deseeale un feliz cumpleaños</p>
                <p><a class="btn btn-default" href="#" role="button">Ver Cumplimentados &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="{{asset('imagenes/ahijadoHappy.jpg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Cumpleaños Ahijados</h2>
                <p>Deseeale un feliz cumpleaños</p>
                <p><a class="btn btn-default" href="#" role="button">Ver Cumplimentados &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="img-circle" src="{{asset('imagenes/empleadoHappy.jpeg')}}" alt="Generic placeholder image" width="140" height="140">
                <h2>Cumpleaños Empleados</h2>
                <p>Deseeale un feliz cumpleaños</p>
                <p><a class="btn btn-default" href="#" role="button">Ver Cumplimentados &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

    </div><!-- /.container -->

@stop