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
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo"><img src="/titila1.png" alt=""></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    
    <ul class="sidenav" id="mobile-demo">
        @if(Auth::user()->role == 'admin')
            <li><a href="/adminPanel">Dashboard</a></li>
            <li><a href="/cityList">Ciudades</a></li>
            <li><a href="/coupleList">Novios</a></li>
        @elseif(Auth::user()->role == 'couple')
            <li><a href="/saveTheDatePanel">Dashboard</a></li>
            <li><a href="/saveTheDatePanel/desing">Diseño</a></li>
            <li><a href="/saveTheDatePanel/guests">Invitados</a></li>
        @endif
        <li><a href="/logout">Logout</a></li>
    </ul>

    <div class="row" id="panelBox">
        <div class="col s12 l2 hide-on-med-and-down" id="columna">
            <ul class="collection">
                @if(Auth::user()->role == 'admin')
                    <li class="collection-item {{$section=='adminPanel'?'active':''}}"><a href="/adminPanel">Dashboard</a></li>
                    <li class="collection-item {{$section=='cityList'?'active':''}}"><a href="/cityList">Ciudades</a></li>
                    <li class="collection-item {{$section=='coupleList'?'active':''}}"><a href="/coupleList">Novios</a></li>
                @elseif(Auth::user()->role == 'couple')
                    <li class="collection-item {{$section=='saveTheDatePanel'?'active':''}}"><a href="/saveTheDatePanel">Dashboard</a></li>
                    <li class="collection-item {{$section=='desing'?'active':''}}"><a href="/saveTheDatePanel/desing">Diseño</a></li>
                    <li class="collection-item {{$section=='guests'?'active':''}}"><a href="/saveTheDatePanel/guests">Invitados</a></li>
                @endif
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
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.materialboxed').materialbox();
        });
    </script>
</body>
</html>