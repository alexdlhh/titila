<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('style')
</head>

@php
    $section = !empty($admin['section']) ? $admin['section'] : '';
@endphp

<body>
    <div class="row">
        <div class="col s12 l2" id="columna">
            <ul class="collection">
                <li class="collection-item {{$section=='adminPanel'?'active':''}}"><a href="/adminPanel">Dashboard</a></li>
                <li class="collection-item {{$section=='cityList'?'active':''}}"><a href="/cityList">Ciudades</a></li>
                <li class="collection-item {{$section=='coupleList'?'active':''}}"><a href="/coupleList">Novios</a></li>
                <li class="collection-item"><a href="/logout">Logout</a></li>
            </ul>
        </div>
        <div class="col s12 l10">
            @yield('content')
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @yield('script')
</body>
</html>