@extends('saveTheDate.layout')

@section('title')
    <title>save The Date</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/savethedate.css') }}">
@endsection

@section('content')
    <h1 id="title">{{$couple}}</h1>
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="col l6 offset-l3 s12 headZone">
                    <a href="#programa" class="linkHead">{{$lang->_t('PROGRAMA',$_lang)}}</a>
                    <a href="#src" class="linkHead">{{$lang->_t('SRC',$_lang)}}</a>
                    <a href="#fotos" class="linkHead">{{$lang->_t('FOTOS',$_lang)}}</a>
                    <a href="#city" class="linkHead">{{$lang->_t('EN LA CIUDAD',$_lang)}}</a>
                </div>
            </div>
        </div>
        <div class="col s3 divFecha">
            <span>31</span><br>
            <span>08</span><br>
            <span>24</span>
        </div>
        <div class="col s6 imagen">
            <img src="\images\saveTheDate\WhatsApp Image 2023-09-15 at 18.13.57.jpeg" class="responsive-img" alt="">
        </div>
        <div class="col s3 location">
            <p>HACIENDA LOS MOLINOS</p>
            <div class="bigBorder"></div>
            <p>SEVILLA</p>
        </div>
        <div class="col s12 zone">
            <p class="textoZone">"{{$lang->_t('¡BIENVENIDOS A LA WEB DE NUESTRA BODA!',$_lang)}}</p>
            <p class="textoZone">{{$lang->_t('ESTAMOS ILUSIONADOS DE PODER COMPARTIR ESTE DIA TAN ESPECIAL CON VOSOTROS.',$_lang)}}</p>
            <p class="textoZone">{{$lang->_t('EN ESTA PÁGINA IREMOS COMPARTIENDO TODA LA INFORMACIÓN QUE NECESITAS. ¡TE ESPERAMOS EN SEVILLA!',$_lang)}}"</p>
            <p class="textoZone">-Arianna & Tomas</p>
        </div>
        <div class="col s12">
            <div class="row">
                <div class="col l6 offset-l3 s8 offset-s2" id="programa">
                    <h2 class="subtitle">{{$lang->_t('Programa',$_lang)}}</h2>
                    <div class="padText">
                        <p>11:00 am . {{$lang->_t('Ceremonia',$_lang)}}</p>
                        <p>-</p>
                        <p>1:00 pm . {{$lang->_t('Almuerzo',$_lang)}}</p>
                        <p>-</p>
                        <p>7:00 pm . {{$lang->_t('Aperitivo',$_lang)}}</p>
                        <p>-</p>
                        <p>9:00 pm . {{$lang->_t('Fiesta',$_lang)}}</p>
                    </div>
                    <h2 class="subtitle">{{$lang->_t('menú',$_lang)}}</h2>
                    <div class="padText">
                        <p>{{$lang->_t('ENTRANTES',$_lang)}}</p>
                        <p>{{$lang->_t('Entrante 1',$_lang)}}</p>
                        <p>{{$lang->_t('Entrante 2',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('PRIMEROS',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 1',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 2',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('SEGUNDOS',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 1',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 2',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('POSTRE',$_lang)}}</p>
                        <p>{{$lang->_t('Postre 1',$_lang)}}</p>
                        <p>{{$lang->_t('Postre 2',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('VINOS & CHAMPAGNE',$_lang)}}</p>
                        <p>{{$lang->_t('Bodegas XXXX',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('BEBIDAS SIN ALCOHOL',$_lang)}}</p>
                        <p>{{$lang->_t('CAFE/TE',$_lang)}}</p>
                    </div>
                    <div class="colored centrar"><div class="linea_fina"></div><a href="#gift" id="lista_regalos" class="modal-trigger">{{$lang->_t('LISTA DE REGALOS',$_lang)}}</a><div class="linea_fina"></div></div>
                    <div class="padText">
                        <a href="#confirmar" class="waves-effect waves-light btn-large libro_link_full modal-trigger">{{$lang->_t('CONFIRMAR',$_lang)}}</a>
                    </div>
                    <h2 class="subtitle">{{$lang->_t('Alojamiento',$_lang)}}</h2>
                    <div class="padText">
                        <p>{{$lang->_t('HOTEL (5 ESTRELLAS)',$_lang)}}</p>
                        <p>{{$lang->_t('HOTEL (4 ESTRELLAS)',$_lang)}}</p>
                        <p>{{$lang->_t('HOTEL (BED & BREAKFAST)',$_lang)}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12" id="city">
            <div class="row">
                <div class="col s12 cityImg">
                    <img src="\images\cities\sevilla.jpg" class="responsive-img">
                </div>
                <div class="col s12">
                    <h2 class="cityTitle">{{$lang->_t('En la Ciudad...',$_lang)}}</h2>
                </div>
                <div class="col s12 textCity">
                    <p>{{$lang->_t('SEVILLA, CAPITAL DEL IMPERIO ALMOHADE, AL ANDALÚS, QUE LLEGÓ A EXTENDERSE DESDE CATALUÑA HASTA LIBIA',$_lang)}}</p>
                    <p>{{$lang->_t('DURANTE 8 SIGLOS, ESTA CIUDAD INTERIOR, LA ÚNICA CON PUERTO DE ESPAÑA, CONSERVA UN PATRIMONIO CULTURAL',$_lang)}}</p>
                    <p>{{$lang->_t('Y ARQUITECTÓNICO DE UNA RIQUEZA INCOMPARABLE SU CASCO HISTÓRICO ES EL MÁS GRANDE DE ESPAÑA Y',$_lang)}}</p>
                    <p>{{$lang->_t('UNO DE LOS MÁS GRANDES DE EUROPA, JUNTO A VENECIA Y GÉNOVA.',$_lang)}}</p>
                </div>
                <div class="col l6 s12 centrar">
                    <p class="colored ultrapadding title2"><b>{{$lang->_t('INTO ÚTIL',$_lang)}}</b></p>
                    <div class="infoText">
                        <b class="colored"><b>{{$lang->_t('TRANSPORTE AÉREO',$_lang)}}</b></b>
                        <p>{{$lang->_t('El aeropuerto de Sevilla es internacional.',$_lang)}}</p>
                        <p>{{$lang->_t('Vuelos directos a países como Suiza, Alemania, Francia,',$_lang)}}</p>
                        <p>{{$lang->_t('Italia y Reino Unido, entre otros.',$_lang)}}</p>
                        <p>{{$lang->_t('El aeropuerto dispone de terminal de aviación privada.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('TREN',$_lang)}}</b></b>
                        <p>{{$lang->_t('Renfe AVE Madrid-Sevilla: 2.5 horas. Frecuencia diaria.',$_lang)}}</p>
                        <p>{{$lang->_t('Distancia a Villa Luisa: 15 minutos.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('EN LA CIUDAD',$_lang)}}</b></b>
                        <p>Uber y Cabify</p>
                        <p>TELE TAXI SEVILLA +(34) 954 62 22 22</p>
                        <p>RADIO TAXI SEVILLA +(34) 954 58 00 00</p>
                        <p>TAXI SEVILLA +(34) 954 62 14 61</p>
                        <b class="colored"><b>{{$lang->_t('ESTETICA',$_lang)}}</b></b>
                        <p>{{$lang->_t('(1 de cada, provee Laura)',$_lang)}}</p>
                        <p>{{$lang->_t('Peluquería',$_lang)}}</p>
                        <p>{{$lang->_t('Manicura',$_lang)}}</p>
                        <p>{{$lang->_t('Sastre & Modista',$_lang)}}</p>
                        <p>{{$lang->_t('Maquillaje',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('RESTAURANTES',$_lang)}}</b></b>
                        <p>{{$lang->_t('Tradicional "XXXXXXX"',$_lang)}}</p>
                        <p>{{$lang->_t('De autor "XXXXXXX"',$_lang)}}</p>
                        <p>{{$lang->_t('Vistas "XXXXXXX"',$_lang)}}</p>
                    </div>
                </div>
                <div class="col l6 s12 centrar">
                    <h3 class="colored ultrapadding title2"><b>{{$lang->_t('IMPERDIBLES',$_lang)}}</b></h3>
                    <div class="infoText">
                        <b class="colored"><b>{{$lang->_t('Real Alcázar de Sevilla',$_lang)}}</b></b>
                        <p>{{$lang->_t('Visita uno de los palacios reales más antiguos y activos del mundo',$_lang)}}</p>
                        <p>{{$lang->_t('Patrimonio de la Humanidad por la Unesco',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('La Catedral de Sevilla & Giralda',$_lang)}}</b></b>
                        <p>{{$lang->_t('Visita la catedral gótica más grande del mundo.',$_lang)}}</p>
                        <p>{{$lang->_t('Patrimonio de la Humanidad por la Unesco',$_lang)}}</p>
                        <p>{{$lang->_t('Distancia a Villa Luisa: 15 minutos.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('El Archivo de Indias',$_lang)}}</b></b>
                        <p>{{$lang->_t('Visita al edificio que centralizó toda la documentación de los',$_lang)}}</p>
                        <p>{{$lang->_t('territorios ultramarinos españoles, tras la conquista de América.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('Torre del Oro, Parque Maria Luisa y Casco antiguo',$_lang)}}</b></b>
                        <p>{{$lang->_t('Paseo imperdible que debe hacerse a pie para disfrutarlo todo.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('Calle MAteos Gago',$_lang)}}</b></b>
                        <p>{{$lang->_t('Sus bares de ambiente auténtico sevillano, una experiencia inolvidable.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('Rio Guadalquivir',$_lang)}}</b></b>
                        <p>{{$lang->_t('Paseo náutico. Fue uno de los puertos más importantes del mundo',$_lang)}}</p>
                        <p>{{$lang->_t('y a donde llegaban los barcos de gran tonelaje cargados de oro, plata',$_lang)}}</p>
                        <p>{{$lang->_t('y esmeraldas de América.',$_lang)}}</p>
                        <b class="colored"><b>{{$lang->_t('Triana',$_lang)}}</b></b>
                        <p>{{$lang->_t('Cruzando el Guadalquivir, Triana callecitas coloridas de buen tapeo',$_lang)}}</p>
                        <p>{{$lang->_t('y tiendas de cerámica Tradicional',$_lang)}}</p>
                    </div>
                </div>
                <div class="col s12 powered">
                    <p><b>powered by TITILA</b></p>
                </div>
                <div class="col s12">
                    <a href="" class="linkRs"></a>
                    <a href="" class="linkRs"></a>
                    <a href="" class="linkRs"></a>
                    <a href="" class="linkRs"></a>
                </div>
            </div>
        </div>
    </div>
    <div id="confirmar" class="modal">
        <div class="modal-content">
            <h4 class="colored">{{$lang->_t('CONFIRMAR ASISTENCIA',$_lang)}}</h4>
            <div class="row">
                <div class="col s12 input-field">
                    <input type="text" id="nombre_asistente">
                    <label for="nombre_asistente">{{$lang->_t('Nombre',$_lang)}}</label>
                </div>
                <div class="col s12 input-field">
                    <input type="number" id="num_asistente">
                    <label for="num_asistente">{{$lang->_t('Asistentes',$_lang)}}</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">{{$lang->_t('Cerrar',$_lang)}}</a>
        </div>
    </div>
    <div id="libro" class="modal">
        <div class="modal-content">
            <h4 class="colored">{{$lang->_t('LIBRO DE FIRMAS',$_lang)}}</h4>
            <div class="row" id="chat">

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">{{$lang->_t('Escribe tu mensaje',$_lang)}}</label>
                </div>
                <a class="waves-effect waves-light btn-large libro_link_full" id="send">Enviar</a>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">{{$lang->_t('Cerrar',$_lang)}}</a>
        </div>
    </div>
    <div id="gift" class="modal">
        <div class="modal-content">
            <h4 class="colored">{{$lang->_t('LISTA DE REGALOS',$_lang)}}</h4>
            <p>{{$lang->_t('FUNDACIÓN XXXX',$_lang)}}</p>
            <p>{{$lang->_t('ESXX XXXX XXXX XXXX XXXX',$_lang)}}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">{{$lang->_t('Cerrar',$_lang)}}</a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });        
    </script>
@endsection