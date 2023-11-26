@extends('admin.layout')

@section('title')
    <title>Panel Titila</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="row card">
        <div class="col s12 card-content">        
            <div class="row">
                <div class="col l4 s12 input-field center-align">
                    <input name="novia" type="text" id="novia" value="{{$novio->novia ?? ''}}">
                    <label for="novia">Novia</label>
                </div>
                <div class="col l4 s12 input-field center-align">
                    <input name="novio" type="text" id="novio" value="{{$novio->novio ?? ''}}">
                    <label for="novio">Novio</label>
                </div>            
                <div class="col l4 s12 input-field center-align">
                    <select class="browser-default" id="estado" >
                        <option value="" disabled selected>Estado</option>
                        <option value="1" {{!empty($novio->estado) && $novio->estado==1?'selected':''}}>Activo</option>
                        <option value="2" {{!empty($novio->estado) && $novio->estado==2?'selected':''}}>Editado por titila</option>
                        <option value="3" {{!empty($novio->estado) && $novio->estado==3?'selected':''}}>Editado por el novio</option>
                        <option value="4" {{!empty($novio->estado) && $novio->estado==4?'selected':''}}>En revisión</option>
                        <option value="5" {{!empty($novio->estado) && $novio->estado==5?'selected':''}}>Preparado para enviar</option>
                        <option value="6" {{!empty($novio->estado) && $novio->estado==6?'selected':''}}>Enviado y esperando confirmación</option>
                        <option value="7" {{!empty($novio->estado) && $novio->estado==7?'selected':''}}>Confirmación cerrada</option>
                        <option value="8" {{!empty($novio->estado) && $novio->estado==8?'selected':''}}>En curso</option>
                        <option value="9" {{!empty($novio->estado) && $novio->estado==9?'selected':''}}>Finalizado</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col s6 input-field">
                    <input type="text" id="email" value="{{$user->email ?? ''}}">
                    <label for="email">Email</label>
                </div>
                <div class="col s6 input-field">
                    <input type="text" id="password">
                    <label for="text">Contraseña (una vez creada es encriptada y no se puede consultar)</label>
                </div>
            </div>
            <div class="row">
                <div class="col l4 s12 input-field center-align">
                    <input name="fecha_boda" type="date" id="fecha_boda" value="{{$novio->fecha_boda ?? ''}}">
                    <label for="fecha_boda">Fecha de boda</label>
                </div>
                <div class="col l4 s12 input-field center-align">
                    <select id="city">
                        @if(!empty($cities))
                            @foreach($cities as $_city)
                                <option value="{{$_city->id}}" {{!empty($novio->id_city) && $novio->id_city==$_city->id?'selected':''}}>{{$_city->nombre}}</option>
                            @endforeach
                        @endif
                    </select>
                </div> 
                <div class="col l2 s12 input-field center-align">
                    <p>
                        <label>
                            <input id="habilitar" value="" type="checkbox" {{!empty($novio->habilitar) && $novio->habilitar==1?'checked':''}}/>
                            <span>Habilitar</span>
                        </label>
                    </p>
                </div>
                <div class="col l2 s12 input-field center-align">
                    <p>
                        <label>
                            <input id="publicar" value="" type="checkbox" {{!empty($novio->publicar) && $novio->publicar==1?'checked':''}}/>
                            <span>Publicar</span>
                        </label>
                    </p>
                </div> 
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#es">ES</a></li>
                    <li class="tab col s3"><a href="#en">EN</a></li>
                    <li class="tab col s3"><a href="#it">IT</a></li>
                    <li class="tab col s3"><a href="#fr">FR</a></li>
                    </ul>
                </div>
                @php
                    $programa = json_decode($novio->programa ?? '{}');
                @endphp
                <div class="col s12" id="es">
                    <div class="row">
                        <div class="col s12">
                            <h5 for="programa_es">Programa</h5>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="programa_es" class="materialize-textarea">{{$programa->es ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col s12" id="en">
                    <div class="row">
                        <div class="col s12">
                            <h5 for="programa_en">Programa</h5>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="programa_en" class="materialize-textarea">{{$programa->en ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col s12" id="it">
                    <div class="row">
                        <div class="col s12">
                            <h5 for="programa_it">Programa</h5>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="programa_it" class="materialize-textarea">{{$programa->it ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col s12" id="fr">
                    <div class="row">
                        <div class="col s12">
                            <h5 for="programa_fr">Programa</h5>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="programa_fr" class="materialize-textarea">{{$programa->fr ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col s12 right-align">
                    <a class="waves-effect waves-light btn" id="saveCouple">Guardar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row card">
        <div class="col s12 card-content">
            <div class="row">
                <div class="col s6">
                    <span class="card-title">Menú</span>
                </div>
                <div class="col s6">
                    <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showMenu" onclick="$(this).hide();$('#menu').hide();$('.hideMenu').show()"><i class="material-icons">arrow_upward</i></a>
                    <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideMenu" onclick="$(this).hide();$('#menu').show();$('.showMenu').show()"><i class="material-icons">arrow_downward</i></a>
                </div>
            </div>
            <div class="row">
                <div class="col s12" id="menu">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th><a href="#menuModal" class="modal-trigger btn addMenu">Añadir</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($menu))
                                @foreach($menu as $_menu)
                                    <tr>
                                        <td>{{$_menu->nombre}}</td>
                                        <td>
                                            <a href="#menuModal" class="btn modal-trigger editMenu" data-json="{{json_encode($_menu)}}"><i class="material-icons">edit</i></a>
                                            <a href="javascript:;" class="btn red deleteMenu" data-id="{{$_menu->id}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($novios_rel->id_ciudad))
        @if(!empty($data['restaurants_city']))
            @php
                $restaurantes = explode(',',$novios_rel->restaurantes);
            @endphp
            <div class="row card">
                <div class="col s12 card-content">
                    <div class="row">
                        <div class="col s6">
                            <span class="card-title">Restaurantes</span>
                        </div>
                        <div class="col s6">
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showRestaurant" onclick="$(this).hide();$('#restaurants').hide();$('.hideRestaurant').show()"><i class="material-icons">arrow_upward</i></a>
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideRestaurant" onclick="$(this).hide();$('#restaurants').show();$('.showRestaurant').show()"><i class="material-icons">arrow_downward</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="restaurants">
                            @php
                                $novios_rel->restaurantes = explode(',',$novios_rel->restaurantes);
                            @endphp
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Activar/Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data['restaurants_city']))
                                        @foreach($data['restaurants_city'] as $_restaurant)
                                            <tr>
                                                <td>{{$_restaurant->nombre}}</td>
                                                <td>
                                                    <div class="switch">
                                                        <label>
                                                        Off
                                                        <input type="checkbox" class="status_restaurant_change" data-novio="{{$novio->id}}" data-restaurant="{{$_restaurant->id}}" {{!empty($restaurantes) && in_array($_restaurant->id,$restaurantes)?'checked':''}}>
                                                        <span class="lever"></span>
                                                        On
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($data['activities_city']))
            @php
                $actividades = explode(',',$novios_rel->actividades);
            @endphp
            <div class="row card">
                <div class="col s12 card-content">
                    <div class="row">
                        <div class="col s6">
                            <span class="card-title">Actividades</span>
                        </div>
                        <div class="col s6">
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showActivities" onclick="$(this).hide();$('#activities').hide();$('.hideActivities').show()"><i class="material-icons">arrow_upward</i></a>
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideActivities" onclick="$(this).hide();$('#activities').show();$('.showActivities').show()"><i class="material-icons">arrow_downward</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="activities">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Activar/Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data['activities_city']))
                                        @foreach($data['activities_city'] as $_activity)
                                            <tr>
                                                <td>{{$_activity->nombre}}</td>
                                                <td>
                                                    <div class="switch">
                                                        <label>
                                                        Off
                                                        <input type="checkbox" class="status_activity_change" data-novio="{{$novio->id}}" data-activity="{{$_activity->id}}" {{!empty($actividades) && in_array($_activity->id,$actividades)?'checked':''}}>
                                                        <span class="lever"></span>
                                                        On
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($data['must_see_city']))
            @php
                $imperdibles = explode(',',$novios_rel->imperdibles);
            @endphp
            <div class="row card">
                <div class="col s12 card-content">
                    <div class="row">
                        <div class="col s6">
                            <span class="card-title">Imperdibles</span>
                        </div>
                        <div class="col s6">
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showMust" onclick="$(this).hide();$('#must').hide();$('.hideMust').show()"><i class="material-icons">arrow_upward</i></a>
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideMust" onclick="$(this).hide();$('#must').show();$('.showMust').show()"><i class="material-icons">arrow_downward</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="must">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Activar/Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data['must_see_city']))
                                        @foreach($data['must_see_city'] as $_must)
                                            <tr>
                                                <td>{{$_must->nombre}}</td>
                                                <td>
                                                    <div class="switch">
                                                        <label>
                                                        Off
                                                        <input type="checkbox" class="status_must_change" data-novio="{{$novio->id}}" data-must="{{$_must->id}}" {{!empty($imperdibles) && in_array($_must->id,$imperdibles)?'checked':''}}>
                                                        <span class="lever"></span>
                                                        On
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($data['estetica_city']))
            @php
                $estetica = explode(',',$novios_rel->estetica);
            @endphp
            <div class="row card">
                <div class="col s12 card-content">
                    <div class="row">
                        <div class="col s6">
                            <span class="card-title">Estética</span>
                        </div>
                        <div class="col s6">
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showStetic" onclick="$(this).hide();$('#stetic').hide();$('.hideStetic').show()"><i class="material-icons">arrow_upward</i></a>
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideStetic" onclick="$(this).hide();$('#stetic').show();$('.showStetic').show()"><i class="material-icons">arrow_downward</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="stetic">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Activar/Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data['estetica_city']))
                                        @foreach($data['estetica_city'] as $_stetic)
                                            <tr>
                                                <td>{{$_stetic->nombre}}</td>
                                                <td>
                                                    <div class="switch">
                                                        <label>
                                                        Off
                                                        <input type="checkbox" class="status_stetic_change" data-novio="{{$novio->id}}" data-stetic="{{$_stetic->id}}" {{!empty($estetica) && in_array($_stetic->id,$estetica)?'checked':''}}>
                                                        <span class="lever"></span>
                                                        On
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($data['alojamiento_city']))
            @php
                $alojamiento = explode(',',$novios_rel->alojamiento);
            @endphp
            <div class="row card">
                <div class="col s12 card-content">
                    <div class="row">
                        <div class="col s6">
                            <span class="card-title">Alojamiento</span>
                        </div>
                        <div class="col s6">
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showAlojamiento" onclick="$(this).hide();$('#alojamiento').hide();$('.hideAlojamiento').show()"><i class="material-icons">arrow_upward</i></a>
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideAlojamiento" onclick="$(this).hide();$('#alojamiento').show();$('.showAlojamiento').show()"><i class="material-icons">arrow_downward</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="alojamiento">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Activar/Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data['alojamiento_city']))
                                        @foreach($data['alojamiento_city'] as $_alojamiento)
                                            <tr>
                                                <td>{{$_alojamiento->nombre}}</td>
                                                <td>
                                                    <div class="switch">
                                                        <label>
                                                        Off
                                                        <input type="checkbox" class="status_alojamiento_change" data-novio="{{$novio->id}}" data-alojamiento="{{$_alojamiento->id}}" {{!empty($alojamiento) && in_array($_alojamiento->id,$alojamiento)?'checked':''}}>
                                                        <span class="lever"></span>
                                                        On
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($data['transporte_city']))
            @php
                $transporte = explode(',',$novios_rel->transporte);
            @endphp
            <div class="row card">
                <div class="col s12 card-content">
                    <div class="row">
                        <div class="col s6">
                            <span class="card-title">Transporte</span>
                        </div>
                        <div class="col s6">
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showTransporte" onclick="$(this).hide();$('#transporte').hide();$('.hideTransporte').show()"><i class="material-icons">arrow_upward</i></a>
                            <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideTransporte" onclick="$(this).hide();$('#transporte').show();$('.showTransporte').show()"><i class="material-icons">arrow_downward</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="transporte">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Activar/Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data['transporte_city']))
                                        @foreach($data['transporte_city'] as $_transporte)
                                            <tr>
                                                <td>{{$_transporte->nombre}}</td>
                                                <td>
                                                    <div class="switch">
                                                        <label>
                                                        Off
                                                        <input type="checkbox" class="status_transporte_change" data-novio="{{$novio->id}}" data-transporte="{{$_transporte->id}}" {{!empty($transporte) && in_array($_transporte->id,$transporte)?'checked':''}}>
                                                        <span class="lever"></span>
                                                        On
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <input type="text" id="id" value="{{$novio->id ?? '0'}}" hidden>
    <!-- Modal Structure -->
    <div id="menuModal" class="modal">
        <div class="modal-content">
            <h4>Menu</h4>
            <div class="row">
                <input type="text" id="id_novio" value="{{$novio->id ?? ''}}" hidden>
                <div class="col s6 form-field">
                    <label for="nombre_menu">Nombre de menu</label>
                    <input type="text" id="nombre_menu">
                </div>
                <div class="col s6 form-field">
                    <label for="alergenos">Alergenos</label>
                    <input type="text" id="alergenos">
                </div>
                <div class="col s12">
                    <ul class="tabs">
                    <li class="tab col s3"><a href="#menu_es">ES</a></li>
                    <li class="tab col s3"><a href="#menu_en">EN</a></li>
                    <li class="tab col s3"><a href="#menu_it">IT</a></li>
                    <li class="tab col s3"><a href="#menu_fr">FR</a></li>
                    </ul>
                </div>
                <div class="col s12" id="menu_es">
                    <label for="descripcion_menu_es">Descripción</label>
                    <textarea id="descripcion_menu_es"></textarea>
                </div>
                <div class="col s12" id="menu_en">
                    <label for="descripcion_menu_en">Descripción</label>
                    <textarea id="descripcion_menu_en"></textarea>
                </div>
                <div class="col s12" id="menu_it">
                    <label for="descripcion_menu_it">Descripción</label>
                    <textarea id="descripcion_menu_it"></textarea>
                </div>
                <div class="col s12" id="menu_fr">
                    <label for="descripcion_menu_fr">Descripción</label>
                    <textarea id="descripcion_menu_fr"></textarea>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            <a href="javascript:;" class="waves-effect waves-green btn-flat saveMenu">Guardar</a>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
<script>
    var textareas = ['#programa_es','#programa_en','#programa_it','#programa_fr','#descripcion_menu_es','#descripcion_menu_en','#descripcion_menu_it','#descripcion_menu_fr'];
    $.each(textareas,function(index,textarea){
        tinymce.init({
            selector: textarea,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    });
    $(document).ready(function(){  //se espera a que termine de cargar la pagina, luego ejecuta lo que hay dentro
        $('.modal').modal();
        $('select').formSelect();
        $('.hideMenu').hide();
        $('.hideRestaurant').hide();
        $('.hideActivities').hide();
        $('.hideMust').hide();
        $('.hideStetic').hide();
        $('.hideAlojamiento').hide();
        $('.hideTransporte').hide();
        $('.tabs').tabs();

        //capturar click en el boton de añadir menu .addMenu
        $('#saveCouple').click(function(){
            var estado = $('#estado').val();
            var novio = $('#novio').val();
            var novia = $('#novia').val();
            var fecha_boda = $('#fecha_boda').val();
            var habilitar = $('#habilitar').prop('checked')?1:0;
            var publicar = $('#publicar').prop('checked')?1:0;
            var programa_es = tinymce.get('programa_es').getContent();
            var programa_en = tinymce.get('programa_en').getContent();
            var programa_it = tinymce.get('programa_it').getContent();
            var programa_fr = tinymce.get('programa_fr').getContent();
            var email = $('#email').val();
            var password = $('#password').val();
            var id = $('#id').val();
            var city = $('#city').val();
            var programa = JSON.stringify({
                es: programa_es,
                en: programa_en,
                it: programa_it,
                fr: programa_fr
            });
            var _token = $('#_token').val();
            $.ajax({
                url: "/coupleSave",
                type: 'POST',
                data: {
                    id: id,
                    estado: estado,
                    novio: novio,
                    novia: novia,
                    fecha_boda: fecha_boda,
                    habilitar: habilitar,
                    publicar: publicar,
                    programa: programa,
                    city: city,
                    email: email,
                    password: password,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    if(data.success){
                        M.toast({html: data.message});
                        window.location.href = '/coupleEdit/'+data.id;
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        });

        $('.editMenu').click(function(){
            var menu = JSON.parse($(this).attr('data-json'));
            var id = menu.id;
            $('#id_novio').val(menu.id_novio);
            $('#nombre_menu').val(menu.nombre);
            $('#alergenos').val(menu.alergenos);
            var descripcion = JSON.parse(menu.cuerpo);
            tinymce.get('descripcion_menu_es').setContent(descripcion.es);
            tinymce.get('descripcion_menu_en').setContent(descripcion.en);
            tinymce.get('descripcion_menu_it').setContent(descripcion.it);
            tinymce.get('descripcion_menu_fr').setContent(descripcion.fr);
            $('.saveMenu').attr('data-id',id);
        });
        //capturar click en el boton de añadir menu .saveMenu
        $('.saveMenu').click(function(){
            var id = $(this).attr('data-id');
            var id_novio = $('#id_novio').val();
            var nombre_menu = $('#nombre_menu').val();
            var descripcion_menu_es = tinymce.get('descripcion_menu_es').getContent();
            var descripcion_menu_en = tinymce.get('descripcion_menu_en').getContent();
            var descripcion_menu_it = tinymce.get('descripcion_menu_it').getContent();
            var descripcion_menu_fr = tinymce.get('descripcion_menu_fr').getContent();
            var alergenos = $('#alergenos').val();
            var descripcion_menu = JSON.stringify({
                es: descripcion_menu_es,
                en: descripcion_menu_en,
                it: descripcion_menu_it,
                fr: descripcion_menu_fr
            });
            var _token ='{{csrf_token()}}';
            $.ajax({
                url: "/coupleMenu", 
                type: 'POST',
                data: {
                    id: id,
                    id_novio: id_novio,
                    nombre: nombre_menu,
                    cuerpo: descripcion_menu,
                    alergenos: alergenos,
                    _token: _token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        });

        $('.deleteMenu').click(function(){
            var id = $(this).attr('data-id');
            var _token ='{{csrf_token()}}';
            if(confirm('¿Está seguro de eliminar este menu?')){
                $.ajax({
                    url: "/coupleMenuDelete", 
                    type: 'POST',
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function(data){
                        //data = JSON.parse(data);
                        if(data.success){
                            M.toast({html: data.message});
                            location.reload()
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            }
        })

        //capturar id a añadir a novios_rel restaurantes
        $('.status_restaurant_change').click(function(){
            var novio_id = $(this).attr('data-novio');
            var restaurant_id = $(this).attr('data-restaurant');
            var status = $(this).prop('checked')?1:0;
            var token = '{{csrf_token()}}';
            $.ajax({
                url: "/coupleRestaurantRel", 
                type: 'POST',
                data: {
                    id_novio: novio_id,
                    id_restaurante: restaurant_id,
                    status: status,
                    _token: token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        //location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        })

        //capturar id a añadir a novios_rel actividades
        $('.status_activity_change').click(function(){
            var novio_id = $(this).attr('data-novio');
            var activity_id = $(this).attr('data-activity');
            var status = $(this).prop('checked')?1:0;
            var token = '{{csrf_token()}}';
            $.ajax({
                url: "/coupleActivityRel", 
                type: 'POST',
                data: {
                    id_novio: novio_id,
                    activity_id: activity_id,
                    status: status,
                    _token: token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        //location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        })

        //capturar id a añadir a novios_rel must_see
        $('.status_must_change').click(function(){
            var novio_id = $(this).attr('data-novio');
            var must_id = $(this).attr('data-must');
            var status = $(this).prop('checked')?1:0;
            var token = '{{csrf_token()}}';
            $.ajax({
                url: "/coupleMustSeeRel", 
                type: 'POST',
                data: {
                    id_novio: novio_id,
                    must_id: must_id,
                    status: status,
                    _token: token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        //location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        })

        //capturar id a añadir a novios_rel estetica
        $('.status_stetic_change').click(function(){
            var novio_id = $(this).attr('data-novio');
            var stetic_id = $(this).attr('data-stetic');
            var status = $(this).prop('checked')?1:0;
            var token = '{{csrf_token()}}';
            $.ajax({
                url: "/coupleSteticRel", 
                type: 'POST',
                data: {
                    id_novio: novio_id,
                    stetic_id: stetic_id,
                    status: status,
                    _token: token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        //location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        })

        //capturar id a añadir a novios_rel alojamiento
        $('.status_alojamiento_change').click(function(){
            var novio_id = $(this).attr('data-novio');
            var alojamiento_id = $(this).attr('data-alojamiento');
            var status = $(this).prop('checked')?1:0;
            var token = '{{csrf_token()}}';
            $.ajax({
                url: "/coupleAccomodaionRel", 
                type: 'POST',
                data: {
                    id_novio: novio_id,
                    alojamiento_id: alojamiento_id,
                    status: status,
                    _token: token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        //location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        })

        //capturar id a añadir a novios_rel transporte
        $('.status_transporte_change').click(function(){
            var novio_id = $(this).attr('data-novio');
            var transporte_id = $(this).attr('data-transporte');
            var status = $(this).prop('checked')?1:0;
            var token = '{{csrf_token()}}';
            $.ajax({
                url: "/coupleTransportRel", 
                type: 'POST',
                data: {
                    id_novio: novio_id,
                    transporte_id: transporte_id,
                    status: status,
                    _token: token
                },
                success: function(data){
                    //data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: data.message});
                        //location.reload()
                    }else{
                        M.toast({html: data.message});
                    }
                }
            });
        })
    });
</script>       
@endsection

