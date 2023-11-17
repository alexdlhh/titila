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
<body>
    <div class="container">
        <nav>
            <div class="nav-wrapper">
                <a class="brand-logo" href="https://titila.es/" target="_blank"><img src="/titila.png" alt="Titila"></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#libro" class="waves-effect waves-light btn-large libro_link modal-trigger">{{$lang->_t('LIBRO DE FIRMAS',$_lang)}}</a></li>
                    <li><a class="waves-effect waves-light btn-large setEs {{$_lang=='es'?'libro_link_full':'libro_link'}}">ES</a></li>
                    <li><a class="waves-effect waves-light btn-large setIt {{$_lang=='it'?'libro_link_full':'libro_link'}}">IT</a></li>
                </ul>
            </div>
        </nav>
        <div class="enlinea_div show-on-medium hide-on-large-only">
            <ul class="enlinea">
                <li><a href="#libro" class="waves-effect waves-light btn-large libro_link modal-trigger">{{$lang->_t('LIBRO DE FIRMAS',$_lang)}}</a></li>
                <li><a class="waves-effect waves-light btn-large setEs {{$_lang=='es'?'libro_link_full':'libro_link'}}">ES</a></li>
                <li><a class="waves-effect waves-light btn-large setIt {{$_lang=='it'?'libro_link_full':'libro_link'}}">IT</a></li>
            </ul>
        </div>
        @yield('content')
    </div>
    <div class="footer">
        <p>© Titila · Calle Progreso s/n, SEVILLA 41013</p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    @yield('script')
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.materialboxed').materialbox();
            $('.setEs').click(function(){
                //creamos la cookie lang con valor es
                document.cookie = "lang=es";
                //recargamos la página
                location.reload();
            });
            $('.setEn').click(function(){
                //creamos la cookie lang con valor en
                document.cookie = "lang=en";
                //recargamos la página
                location.reload();
            });
            $('.setIt').click(function(){
                //creamos la cookie lang con valor en
                document.cookie = "lang=it";
                //recargamos la página
                location.reload();
            });
            $('.setEs').on('touchstart', function(){
                //creamos la cookie lang con valor es
                document.cookie = "lang=es";
                //recargamos la página
                location.reload();
            });
            $('.setIt').on('touchstart', function(){
                //creamos la cookie lang con valor en
                document.cookie = "lang=it";
                //recargamos la página
                location.reload();
            });
        });
    </script>
    
</body>
</html>