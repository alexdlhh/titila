@extends('saveTheDate.layout')

@section('title')
    <title>save The Date</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/savethedate.css') }}">
@endsection

@section('content')
    <div style="clear:both;"></div>
    <div id="title"><p>{{str_replace('-',' + ',$couple)}}<p></div>
    <div class="row" id="fixedToFooter">
        <div class="col s12">
            <div class="row">
                <div class="col l6 offset-l3 s12 headZone">
                    <a href="#programa" class="linkHead">{{$lang->_t('PROGRAMA',$_lang)}}</a>
                    <a href="#confirmar" class="linkHead src_button modal-trigger">{{$lang->_t('SRC',$_lang)}}</a>
                    <a href="#fotos" class="linkHead fotos_button" onclick="$('.modal2').show();">{{$lang->_t('FOTOS',$_lang)}}</a>
                    <a href="#city" class="linkHead">{{$lang->_t('EN LA CIUDAD',$_lang)}}</a>
                </div>
            </div>
        </div>
        <div class="col l3 s1 divFecha">
            <p>31</p>
            <p>08</p>
            <p>24</p>
        </div>
        <div class="col l6 s11 imagen">
            <img src="\images\saveTheDate\WhatsApp Image 2023-09-15 at 18.13.57.jpeg" class="responsive-img" alt="">
        </div>
        <div class="col l3 s12 location" 
        onclick="openMaps()"
        ontouchstart="open()">
            <p>HACIENDA LOS MOLINILLOS</p>
            <div class="bigBorder"></div>
            <p>SEVILLA</p>
        </div>
        <div class="col s12 zone">
            <p class="textoZone">"{{$lang->_t('¡BIENVENIDOS A LA WEB DE NUESTRA BODA!',$_lang)}}</p>
            <p class="textoZone">{{$lang->_t('ESTAMOS ILUSIONADOS DE PODER COMPARTIR ESTE DIA TAN ESPECIAL CON VOSOTROS.',$_lang)}}</p>
            <p class="textoZone">{{$lang->_t('EN ESTA PÁGINA IREMOS COMPARTIENDO TODA LA INFORMACIÓN QUE NECESITAS. ¡TE ESPERAMOS EN SEVILLA!',$_lang)}}"</p>
            <p class="textoZone margenZone">-Arianna & Tomas</p>
        </div>
        <div class="col s12 program">
            <div class="row">
                <div class="col l8 offset-l2 s10 offset-s1" id="programa">
                    <h2 class="subtitle">{{$lang->_t('Programa',$_lang)}}</h2>
                    <div class="padText">
                        <p>11:00 am . {{$lang->_t('Ceremonia',$_lang)}}</p>
                        <p>~</p>
                        <p>1:00 pm . {{$lang->_t('Almuerzo',$_lang)}}</p>
                        <p>~</p>
                        <p>7:00 pm . {{$lang->_t('Aperitivo',$_lang)}}</p>
                        <p>~</p>
                        <p>9:00 pm . {{$lang->_t('Fiesta',$_lang)}}</p>
                    </div>
                    <h2 class="subtitle">{{$lang->_t('Menú',$_lang)}}</h2>
                    <div class="padText">
                        <p class="subtitle2">{{$lang->_t('ENTRANTES',$_lang)}}</p>
                        <p>{{$lang->_t('Entrante 1',$_lang)}}</p>
                        <p>{{$lang->_t('Entrante 2',$_lang)}}</p>
                        <br>
                        <p class="subtitle2">{{$lang->_t('PRIMEROS',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 1',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 2',$_lang)}}</p>
                        <br>
                        <p class="subtitle2">{{$lang->_t('SEGUNDOS',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 1',$_lang)}}</p>
                        <p>{{$lang->_t('Plato 2',$_lang)}}</p>
                        <br>
                        <p class="subtitle2">{{$lang->_t('POSTRE',$_lang)}}</p>
                        <p>{{$lang->_t('Postre 1',$_lang)}}</p>
                        <p>{{$lang->_t('Postre 2',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('VINOS & CHAMPAGNE',$_lang)}}</p>
                        <p>{{$lang->_t('Bodegas XXXX',$_lang)}}</p>
                        <br>
                        <p>{{$lang->_t('BEBIDAS SIN ALCOHOL',$_lang)}}</p>
                        <p>{{$lang->_t('CAFE/TE',$_lang)}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12" id="program_config">
            <div class="row">
                <div class="col l6 offset-l3 s10 offset-s1">
                    <div class="confirmar_box">
                        <a href="#confirmar" class="waves-effect waves-light btn-large libro_link_full modal-trigger">{{$lang->_t('CONFIRMAR ASISTENCIA',$_lang)}}</a>
                    </div>
                    <div class="colored centrar lista_regalos"><div class="linea_fina"></div><a href="#gift" id="lista_regalos" class="modal-trigger">{{$lang->_t('LISTA DE REGALOS',$_lang)}}</a><div class="linea_fina"></div></div>
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
                    <img src="https://wedding.titila.es/images/cities/sevilla.jpg" class="responsive-img">
                </div>
                <div class="col s12">
                    <h2 class="cityTitle">{{$lang->_t('La Ciudad...',$_lang)}}</h2>
                </div>
                <div class="col s12 textCity">
                    <p class="frase_celebre">"{{$lang->_t('Hércules me edificó. Julio César me cercó de muros y torres altas. Y el Rey Santo me ganó con Garci Pérez de Vargas.',$_lang)}}"</p>
                    <p class="texto-mayusculas">{{$lang->_t('Julio César avistó por primera vez la ciudad de Sevilla –llamada en la época romana Híspalis– en el año 68 a.C.,',$_lang)}}</p> 
                    <p class="texto-mayusculas">{{$lang->_t('cuando vino a la península como cuestor del pretor Antistio Tuberon. Tenía 32 años y unas ambiciones ya en ciernes ',$_lang)}}</p> 
                    <p class="texto-mayusculas">{{$lang->_t('de poder. Julio César estuvo en Sevilla entre los años 68 y 65 a.C., cuando era cuestor —magistrado de la antigua ',$_lang)}}</p> 
                    <p class="texto-mayusculas">{{$lang->_t('Roma— de la provincia. En esta época, acometió algunas restauraciones, como las principales murallas y sus ',$_lang)}}</p> 
                    <p class="texto-mayusculas">{{$lang->_t('torreones, reemplazando la antigua empalizada. Consiguió convertir la ciudad en un importante centro ',$_lang)}}</p>
                    <p class="texto-mayusculas">{{$lang->_t('industrial de la Bética. Itálica, en Santiponce (Sevilla), fue la primera ciudad creada por Roma fuera de la Península ',$_lang)}}</p>
                    <p class="texto-mayusculas">{{$lang->_t('Itálica y la cuna de los emperadores Trajano y Adriano, dos de los personajes principales',$_lang)}}</p>
                    <p class="texto-mayusculas">{{$lang->_t('de la historia de lo que ahora es España.',$_lang)}}</p>
                </div>
                <div class="col l6 s12 centrar">
                    <p class="colored-fino ultrapadding title2">{{$lang->_t('INTO ÚTIL',$_lang)}}</p>
                    <div class="infoText">
                        <p class="colored titulos_info"><b>{{$lang->_t('TRANSPORTE AÉREO',$_lang)}}</b></p>
                        <p>{{$lang->_t('El aeropuerto de Sevilla es internacional.',$_lang)}}</p>
                        <p>{{$lang->_t('Vuelos directos a países como Suiza, Alemania, Francia,',$_lang)}}</p>
                        <p>{{$lang->_t('Italia y Reino Unido, entre otros.',$_lang)}}</p>
                        <p>{{$lang->_t('El aeropuerto dispone de terminal de aviación privada.',$_lang)}}</p>
                        <p class="colored titulos_info"><b>{{$lang->_t('TREN',$_lang)}}</b></p>
                        <p>{{$lang->_t('Renfe AVE Madrid-Sevilla: 2.5 horas. Frecuencia diaria.',$_lang)}}</p>
                        <p>{{$lang->_t('Distancia a Villa Luisa: 15 minutos.',$_lang)}}</p>
                        <p class="colored titulos_info"><b>{{$lang->_t('EN LA CIUDAD',$_lang)}}</b></p>
                        <p>Uber y Cabify</p>
                        <p>TELE TAXI SEVILLA +(34) 954 62 22 22</p>
                        <p>RADIO TAXI SEVILLA +(34) 954 58 00 00</p>
                        <p>TAXI SEVILLA +(34) 954 62 14 61</p>
                        <p class="colored titulos_info"><b>{{$lang->_t('ESTETICA',$_lang)}}</b></p>
                        <p>{{$lang->_t('(1 de cada, provee Laura)',$_lang)}}</p>
                        <p>{{$lang->_t('Peluquería',$_lang)}}</p>
                        <p>{{$lang->_t('Manicura',$_lang)}}</p>
                        <p>{{$lang->_t('Sastre & Modista',$_lang)}}</p>
                        <p>{{$lang->_t('Maquillaje',$_lang)}}</p>
                        <p class="colored titulos_info"><b>{{$lang->_t('RESTAURANTES',$_lang)}}</b></p>
                        <p>{{$lang->_t('Tradicional "XXXXXXX"',$_lang)}}</p>
                        <p>{{$lang->_t('De autor "XXXXXXX"',$_lang)}}</p>
                        <p>{{$lang->_t('Vistas "XXXXXXX"',$_lang)}}</p>
                    </div>
                </div>
                <div class="col l6 s12 centrar">
                    <h3 class="colored-fino ultrapadding2 title2">{{$lang->_t('IMPERDIBLES',$_lang)}}</h3>
                    <div class="infoText">
                        <p class="colored titulos_imper"><b>{{$lang->_t('Real Alcázar de Sevilla',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Visita uno de los palacios reales más antiguos y activos del mundo',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('Patrimonio de la Humanidad por la Unesco',$_lang)}}</p>
                        <p class="colored titulos_imper"><b>{{$lang->_t('La Catedral de Sevilla & Giralda',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Visita la catedral gótica más grande del mundo.',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('Patrimonio de la Humanidad por la Unesco',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('Distancia a Villa Luisa: 15 minutos.',$_lang)}}</p>
                        <p class="colored titulos_imper"><b>{{$lang->_t('El Archivo de Indias',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Visita al edificio que centralizó toda la documentación de los',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('territorios ultramarinos españoles, tras la conquista de América.',$_lang)}}</p>
                        <p class="colored titulos_imper"><b>{{$lang->_t('Torre del Oro, Parque Maria Luisa y Casco antiguo',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Paseo imperdible que debe hacerse a pie para disfrutarlo todo.',$_lang)}}</p>
                        <p class="colored titulos_imper"><b>{{$lang->_t('Calle Mateos Gago',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Sus bares de ambiente auténtico sevillano, una experiencia inolvidable.',$_lang)}}</p>
                        <p class="colored titulos_imper"><b>{{$lang->_t('Rio Guadalquivir',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Paseo náutico. Fue uno de los puertos más importantes del mundo',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('y a donde llegaban los barcos de gran tonelaje cargados de oro, plata',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('y esmeraldas de América.',$_lang)}}</p>
                        <p class="colored titulos_imper"><b>{{$lang->_t('Triana',$_lang)}}</b></p>
                        <p class="cursiva">{{$lang->_t('Cruzando el Guadalquivir, Triana callecitas coloridas de buen tapeo',$_lang)}}</p>
                        <p class="cursiva">{{$lang->_t('y tiendas de cerámica Tradicional',$_lang)}}</p>
                    </div>
                </div>
                <div class="col s12 center-align padding-flecha">
                    <img src="\flechita.png" alt="" class="responsive-img">
                </div>
                <div class="col s12 center-align">
                    <h2 class="title2 COLORED">{{$lang->_t('¡NOVEDADES!',$_lang)}}</h2>
                </div>
                <div class="col s12 center-align">
                    <div class="infoText2">
                        <p>{!!$lang->_t('PASEO EN BARCO: Amigos y familia: Hemos reservado un paseo en barco por el río el día 1 de septiembre a 13 a 15hrs. Los que quieran acompañarnos. deben avisarnos antes del 15 de agosto pues el cupo es limitado e incluirá brunch de despedida <b>SRC ariannaytomas@gmail.com o a nuestros whatsapp.</b>',$_lang)!!}</p>
                        <p>{!!$lang->_t('NIÑOS: Hemos contratado dos animadoras para llevar a los niños mayores de 4 años a la "isla Mágica", un parque temático y acuático muy divertido, durante el cocktail previo a la boda la tarde del 30. El drop in/drop off será en el restaurante del cocktail. <b>SRC indicando número de niños a ariannaytomas@gmail.com o a nuestros whatsapp.</b>',$_lang)!!}</p>
                    </div>
                </div>
                <div class="col s12 powered">
                    <p><b>powered by TITILA</b></p>
                </div>
                <div class="col s12 centrar redessociales">
                    <a href="" class="linkRs linkRs1"><img src="\images\home.png" alt=""></a>
                    <a href="" class="linkRs linkRs2"><img src="\images\instagram.png" alt=""></a>
                    <a href="" class="linkRs linkRs3"><img src="\images\pinterest.png" alt=""></a>
                    <a href="" class="linkRs linkRs4"><img src="\images\tiktok.webp" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div id="confirmar" class="modal">
        <div class="modal-content">
            <h4 class="colored">{{$lang->_t('CONFIRMAR ASISTENCIA',$_lang)}}</h4>
            <div class="row">
                <div class="col s6 input-field">
                    <input type="text" id="nombre_asistente">
                    <label for="nombre_asistente">{{$lang->_t('Nombre',$_lang)}}</label>
                </div>
                <div class="col s6 input-field"><input type="text" id="alergenos_guest0"><label for="alergenos_guest0">{{$lang->_t('Alergenos',$_lang)}}</label></div>
                <div class="col s6 input-field"><select class="browser-default" id="menu_guest"><option>Test</option><option>Test 2</option></select><label for="menu_guest" class="active">{{$lang->_t('Menu',$_lang)}}</label></div>
                <div class="col s6 input-field">
                    <input type="number" id="num_asistente">
                    <label for="num_asistente">{{$lang->_t('Acompañantes',$_lang)}}</label>
                </div>
                <div id="fields_asistant"></div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col s12">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">{{$lang->_t('Cerrar',$_lang)}}</a>
                    <a class="waves-effect waves-light btn-large libro_link_full notop" id="confirmar_asistencia">{{$lang->_t('Confirmar',$_lang)}}</a>
                </div>
            </div>
        </div>
    </div>
    <div id="libro" class="modal">
        <div class="modal-content">
            <h4 class="colored">{{$lang->_t('LIBRO DE FIRMAS',$_lang)}}</h4>
            <p>{{$lang->_t('Vuestros pensamientos serán un recuerdo que guardaremos para siempre ....',$_lang)}}</p>
            <div class="row" id="chat">
                @if(!empty($libro))
                    @foreach($libro as $l)
                        <div id="firma_guest">
                            <label>{{$l->nombre}}</label>
                            <p>{{$l->mensaje}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="nombre_firmante">
                    <label for="nombre_firmante">{{$lang->_t('Nombre',$_lang)}}</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">{{$lang->_t('Escribe tu mensaje',$_lang)}}</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col s12">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">{{$lang->_t('Cerrar',$_lang)}}</a>
                    <a class="waves-effect waves-light btn-large libro_link_full notop" id="firmar">{{$lang->_t('Enviar',$_lang)}}</a>
                </div>
            </div>
        </div>
    </div>
    <div id="gift" class="modal">
        <div class="modal-content">
            <h4 class="colored">{{$lang->_t('LISTA DE REGALOS',$_lang)}}</h4>
            <p>{{$lang->_t('El regalo más bonito para nosotros será celebrarlo con vosotros y si queréis hacernos un presente ayudamos a los que realmente lo necesitan con un gesto de amor',$_lang)}}</p>
            <p><a href="https://www.aldeasinfantiles.es/" target="_blank">https://www.aldeasinfantiles.es/</a></p>
            <p><a href="https://donazioni.ail.it/" target="_blank">https://donazioni.ail.it/</a></p>
            <br>
            <p>{!!$lang->_t('Haciendo clic en <span class="cursiva">“Lista de regalos solidarios”</span>',$_lang)!!}</p>
            <p>{!!$lang->_t('Transferencia bancaria <strong>IT43K 02008 03284 000400543111</strong>',$_lang)!!}</p>
            <p>{!!$lang->_t('Motivo del pago <span class="cursiva">"Lista de regalos-boda Arianna y Tomas"</span>',$_lang)!!}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">{{$lang->_t('Cerrar',$_lang)}}</a>
        </div>
    </div>
    
@endsection
<div id="fotos" class="modal2" onclick="$('.modal2').hide();">
    <div class="modal-content">
        <div class="row">
            <div class="col l4 offset-l4 s12" id="galeria_fotos">
                <div class="carousel carousel-slider center">
                    <a class="carousel-item" href="#one!"><img src="https://picsum.photos/250/250"></a>
                    <a class="carousel-item" href="#two!"><img src="https://picsum.photos/251/251"></a>
                    <a class="carousel-item" href="#three!"><img src="https://picsum.photos/252/252"></a>
                    <a class="carousel-item" href="#four!"><img src="https://picsum.photos/253/253"></a>
                    <a class="carousel-item" href="#five!"><img src="https://picsum.photos/254/254"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        function openMaps(){
            //abrimos url en una nueva pestaña
            window.open('https://www.google.com/maps/place/Hacienda+de+Celebraciones+los+Molinillos/@37.4275546,-5.7568431,15z/data=!4m2!3m1!1s0x0:0x967ffe4fa61fe9ab?sa=X&ved=2ahUKEwi-9uP098CCAxViVKQEHUMgCW0Q_BJ6BQifARAA', '_blank');
            //var win = window.open('https://www.google.com/maps/place/Hacienda+de+Celebraciones+los+Molinillos/@37.4275546,-5.7568431,15z/data=!4m2!3m1!1s0x0:0x967ffe4fa61fe9ab?sa=X&ved=2ahUKEwi-9uP098CCAxViVKQEHUMgCW0Q_BJ6BQifARAA', '_blank');
        }
        $(document).ready(function(){
            $('.modal2').hide();
            $('.modal').modal();
            $('#num_asistente').change(function(){
                var num = $(this).val();
                var html='<div class="col s12"><p class="colored">{{$lang->_t('Acompañantes',$_lang)}}</p></div>';
                for(var i=0;i<num;i++){
                    html+='<div class="row"><div class="col l4 s6 input-field"><input type="text" id="nombre_asistente'+i+'"><label for="nombre_asistente'+i+'">{{$lang->_t('Nombre',$_lang)}}</label></div>';
                    html+='<div class="col l4 s6 input-field"><input type="text" id="alergenos_asistente'+i+'"><label for="alergenos_asistente'+i+'">{{$lang->_t('Alergenos',$_lang)}}</label></div>';
                    html+='<div class="col l4 s12 input-field"><select class="browser-default" id="menu'+i+'"><option>Test</option><option>Test 2</option></select><label for="menu'+i+'" class="active">{{$lang->_t('Menu',$_lang)}}</label></div></div>';
                }
                $('#fields_asistant').html(html);
                $('#confirmar_asistencia').click(function(){
                    var nombre = $('#nombre_asistente').val();
                    var num = $('#num_asistente').val();
                    var acompanantes = [];
                    for(var i=0;i<num;i++){
                        var nombre_asistente = $('#nombre_asistente'+i).val();
                        var alergenos_asistente = $('#alergenos_asistente'+i).val();
                        acompanantes.push({nombre:nombre_asistente,alergenos:alergenos_asistente});
                    }
                    console.log(acompanantes);
                    console.log(nombre);
                    console.log(num);
                    return
                    if(nombre!='' && num!=''){
                        $.ajax({
                            url: '/saveTheDate/confirmar',
                            type: 'POST',
                            data: {
                                nombre: nombre,
                                num: num,
                                _token: '{{csrf_token()}}'
                            },
                            success: function(data){
                                if(data=='ok'){
                                    alert("{{$lang->_t('Gracias por confirmar tu asistencia',$_lang)}}");
                                    location.reload();
                                }else{
                                    alert("{{$lang->_t('Ha ocurrido un error',$_lang)}}");
                                }
                            }
                        });
                    }else{
                        alert("{{$lang->_t('Debes rellenar todos los campos',$_lang)}}");
                    }
                });
            })
            
            $('.fotos_button').click(function(){
                $('.carousel').carousel({
                    fullWidth: true,
                    indicators: true
                });
            })
            $('#firmar').click(function(){
                $('#firmar').css('pointer-events','none');
                var texto = $('#textarea1').val();
                var nombre = $('#nombre_firmante').val();
                if(texto!=''){
                    $('#textarea1').val('');
                    $('#nombre_firmante').val('');
                    $.ajax({
                        url: '/familybook/insert',
                        type: 'POST',
                        data: {
                            mensaje: texto,
                            nombre: nombre,
                            hash: '{{$hash}}',
                            _token: '{{csrf_token()}}'
                        },
                        success: function(data){
                            $('#firmar').css('pointer-events','auto');
                            if(data.libro!=''){
                                alert("{{$lang->_t('Gracias por firmar',$_lang)}}");
                                //location.reload();
                            }else{
                                alert("{{$lang->_t('Ha ocurrido un error',$_lang)}}");
                            }
                        }
                    });
                }else{
                    alert("{{$lang->_t('Debes rellenar todos los campos',$_lang)}}");
                }
            })
            var last_id={{$last}};
            setInterval(() => {
                $.ajax({
                    url: '/familybook/get',
                    type: 'POST',
                    data: {
                        hash: '{{$hash}}',
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data){
                        $.each(data.libro,function(k,v){
                            if(v.id>last_id){
                                last_id=v.id;
                                $('#chat').prepend('<div id="firma_guest"><label>'+v.nombre+'</label><p>'+v.mensaje+'</p></div>');
                            }
                        })
                    }
                });
            }, 5000);
        });        
    </script>
@endsection