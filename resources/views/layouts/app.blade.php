<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Funpacol') }}</title>

    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css')}}">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">




    <!-- Custom styles for this template -->
    <link href=" {{ asset('css/normalize.css') }} " rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href=" {{ asset('css/funpacol.css') }} " rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

@include('layouts.header')

@if(Auth::check())
    @include('layouts.nav')
@endif



<div class="sections">
    <div class="section">
        @yield('content')
    </div>
</div>

<script src=" {{ asset('js/jquery.min.js') }} "></script>


<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
<!-- Scripts -->
<script src="{{asset('/js/app.js')}}"></script>

<!-- Placed at the end of the document so the pages load faster -->
<script src=" {{ asset('js/funpacol.js') }} "></script>

<script src=" {{ asset('js/bootstrap.min.js') }} "></script>


<script src="{{asset('https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js')}}"></script>


</body>
</html>
