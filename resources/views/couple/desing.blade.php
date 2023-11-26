@extends('admin.layout')

@section('title')
    <title>Panel Titila</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#media">Media</a></li>
        <li class="tab col s3"><a href="#textos">Textos</a></li>
        <li class="tab col s3"><a href="#listado_regalos">Listado regalos</a></li>
        <li class="tab col s3"><a href="#Modulos">Módulos</a>Módulos</li>
      </ul>
    </div>
    <div class="col s12">
        <div id="media" class="row">
            <div class="center-align col s12">
                <p><h4>Imágen Principal</h4></p>
            </div>
            <div class="col s12">
                <div class="row">
                    @if(!empty($admin['svgs']))
                        @foreach($admin['svgs'] as $svg)
                            <div class="col l4 s4">
                                <div class="row">
                                    <div class="col s12 center-align">
                                        {!!str_replace(['#Novio','#Novia'],[$admin['novios']->novio,$admin['novios']->novia],$svg->codigo)!!}
                                    </div>
                                    <div class="col s12 center-align">
                                        <p>
                                            <label>
                                                <input name="svg_selected" value="{{$svg->id}}" type="radio" {{$admin['novios_rel']->id_media_svg==$svg->id?"checked":""}} />
                                                <span>Seleccionar</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col s12 center-align">
                <p><h4>Galería</h4></p>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imágenes</span>
                        <input id="imagenes" type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
            </div>
            <div class="col s12">
                @if(!empty($admin['media']))
                    <div class="row">
                        @foreach($admin['media'] as $media)
                            <div class="col s3">
                                <div class="row">
                                    <div class="col s12 foto">
                                        <img src="{{str_replace('public','',$media->ruta)}}" class="responsive-img" alt="">
                                    </div>
                                    <div class="col s12">
                                        <a data-id="{{$media->id}}" class="deleteMedia waves-effect waves-light btn-small" href="javascript:;"><i class="material-icons left">delete</i>Borrar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col s12">
        <div id="textos" class="row">
            <div class="col l4 s12">
                <p>Tamaño de los títulos</p>
                <select class="browser-default" id="titulo" >
                    <option value="" disabled selected>Tamaño de títulos</option>
                    <option value="1" {{!empty($admin['novios_preferencias']->title_size) && $admin['novios_preferencias']->title_size==1?'selected':''}}>Grande</option>
                    <option value="2" {{!empty($admin['novios_preferencias']->title_size) && $admin['novios_preferencias']->title_size==2?'selected':''}}>Mediano</option>
                    <option value="3" {{!empty($admin['novios_preferencias']->title_size) && $admin['novios_preferencias']->title_size==3?'selected':''}}>Pequeño</option>
                </select>
            </div>
            <div class="col l4 s12">
                <p>Tamaño de texto</p>
                <select class="browser-default" id="texto" >
                    <option value="" disabled selected>Tamaño de texto</option>
                    <option value="1" {{!empty($admin['novios_preferencias']->text_size) && $admin['novios_preferencias']->text_size==1?'selected':''}}>Grande</option>
                    <option value="2" {{!empty($admin['novios_preferencias']->text_size) && $admin['novios_preferencias']->text_size==2?'selected':''}}>Mediano</option>
                    <option value="3" {{!empty($admin['novios_preferencias']->text_size) && $admin['novios_preferencias']->text_size==3?'selected':''}}>Pequeño</option>
                </select>
            </div>
            <div class="col l4 s12">
                <p>Color de Texto</p>
                <input id="color" type="color" value="{{!empty($admin['novios_preferencias']->color_text)?$admin['novios_preferencias']->color_text:'#000000'}}">
            </div>
            <div class="col s12">
                <p>Mensaje inicio</p>
            </div>
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#es">ES</a></li>
                    <li class="tab col s3"><a href="#en">EN</a></li>
                    <li class="tab col s3"><a href="#it">IT</a></li>
                    <li class="tab col s3"><a href="#fr">FR</a></li>
                </ul>
            </div>
            @php
                $mensaje_personalizado = !empty($admin['novios_preferencias']->message)?json_decode($admin['novios_preferencias']->message):[];
            @endphp
            <div class="col s12" id="es">
                <textarea id="mensaje_personalizado_es">{{$mensaje_personalizado->es??''}}</textarea>
            </div>
            <div class="col s12" id="en">
                <p>Mensaje inicio</p>
                <textarea id="mensaje_personalizado_en">{{$mensaje_personalizado->en??''}}</textarea>
            </div>
            <div class="col s12" id="it">
                <p>Mensaje inicio</p>
                <textarea id="mensaje_personalizado_it">{{$mensaje_personalizado->it??''}}</textarea>
            </div>
            <div class="col s12" id="fr">
                <p>Mensaje inicio</p>
                <textarea id="mensaje_personalizado_fr">{{$mensaje_personalizado->fr??''}}</textarea>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div id="listado_regalos" class="row">
            <div class="col s12">
                <table>
                    <thead>
                    <tr>
                        <th>Regalo</th>
                        <th>URL</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
    
                    <tbody>
                    <tr>
                        <td>Lavadora</td>
                        <td>URL, http...</td>
                        <td>
                            <a class="waves-effect waves-light btn-small" href="http://localhost:8010/hkbskj_+_ogbdt/jkghjgf"><i class="material-icons left">edit</i>Editar</a>
                            <a class="waves-effect waves-light btn-small" href="http://localhost:8010/hkbskj_+_ogbdt/jkghjgf"><i class="material-icons left">delete</i>Borrar</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col s12">
                <p>
                    <h5>Añadir Regalo</h5>
                </p>
            </div>
            <div class="col s12">
                <div class="row">
                    <div id="regalo" class="col l4 s12 input-field center-align">
                        <input name=nombre type="text">
                        <label for="nombre">Nombre Regalo</label>
                    </div>
                    <div class="col l4 s12 input-field center-align">
                        <input id="URL" name=URL type="text">
                        <label for="URL">URL</label>
                    </div>
                    <div class="col s12">
                        <a class="waves-effect waves-light btn-small" href=""><i class="material-icons left"></i>Añadir</a>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col s12">
        <div id="Modulos" class="row">
            @php
                $lenguajes = [
                    1=>'Español',
                    2=>'Ingles',
                    3=>'Frances',
                    4=>'Italiano'
                ];
                $langs = !empty($admin['novios_preferencias']->langs)?explode(',',$admin['novios_preferencias']->langs):[];
            @endphp
            <div class="col l6 s12">
                <select id="lenguaje" multiple>
                    <option value="" disabled selected>Lenguaje</option>
                    <option value="1" {{in_array(1,$langs)?'selected':''}}>Español</option>
                    <option value="2" {{in_array(2,$langs)?'selected':''}}>Ingles</option>
                    <option value="3" {{in_array(3,$langs)?'selected':''}}>Frances</option>
                    <option value="4" {{in_array(4,$langs)?'selected':''}}>Italiano</option>
                </select>
            </div>
            <div class="col l6 s12">
                <p>
                    <label>
                        <input id="mostrar_restaurante" type="checkbox" class="filled-in" {{!empty($admin['novios_preferencias']->show_restaurants) && $admin['novios_preferencias']->show_restaurants!=1?'':"checked"}} />
                        <span>Mostrar Restaurantes</span>
                    </label>
                </p>
            </div>
            <div class="col l6 s12">
                <p>
                    <label>
                        <input id="mostrar_regalos" type="checkbox" class="filled-in" {{!empty($admin['novios_preferencias']->show_gifts) && $admin['novios_preferencias']->show_gifts!=1?'':"checked"}} />
                        <span>Lista de Regalos</span>
                    </label>
                </p>
            </div>
            <div class="col l6 s12">
                <p>
                    <label>
                        <input id="mostrar_alojamiento" type="checkbox" class="filled-in" {{!empty($admin['novios_preferencias']->show_hotel) && $admin['novios_preferencias']->show_hotel!=1?'':"checked"}} />
                        <span>Mostrar Alojamientos</span>
                    </label>
                </p>
            </div>
            <div class="col l6 s12">
                <p>
                    <label>
                        <input id="ciudad" type="checkbox" class="filled-in" {{!empty($admin['novios_preferencias']->show_city) && $admin['novios_preferencias']->show_city!=1?'':"checked"}} />
                        <span>Mostrar Ciudad</span>
                    </label>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12 right-align">
        <a class="btn-floating btn-large waves-effect waves-light red" id="guardar">
            <i class="material-icons">save</i>
        </a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
<script>
    var textareas = ['#mensaje_personalizado_es','#mensaje_personalizado_en','#mensaje_personalizado_it','#mensaje_personalizado_fr'];
    $.each(textareas,function(index,textarea){
        tinymce.init({
            selector: textarea,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    });
    $(document).ready(function(){
        $('.tabs').tabs();
        $('select').formSelect();
        $('#guardar').on('click', function() {
            var svg_selected = $("input[name=svg_selected]:checked").val();
            var imagenes = $('#imagenes').prop('files');
            var titulo = $('#titulo').val();
            var texto = $('#texto').val();
            var color = $('#color').val();
            var mensaje_personalizado_es = tinymce.get('mensaje_personalizado_es').getContent();
            var mensaje_personalizado_en = tinymce.get('mensaje_personalizado_en').getContent();
            var mensaje_personalizado_it = tinymce.get('mensaje_personalizado_it').getContent();
            var mensaje_personalizado_fr = tinymce.get('mensaje_personalizado_fr').getContent();
            var mensaje_personalizado = {
                es:mensaje_personalizado_es,
                en:mensaje_personalizado_en,
                it:mensaje_personalizado_it,
                fr:mensaje_personalizado_fr
            };
            var lenguaje = $('#lenguaje').val();
            var mostrar_restaurante = $('#mostrar_restaurante').is(':checked')?1:0;
            var mostrar_regalos = $('#mostrar_regalos').is(':checked')?1:0;
            var mostrar_alojamiento = $('#mostrar_alojamiento').is(':checked')?1:0;
            var ciudad = $('#ciudad').is(':checked')?1:0;
            var _token = '{{csrf_token()}}';
            formData = new FormData();
            formData.append('svg_selected', svg_selected);
            for(var i=0; i<imagenes.length; i++){
                formData.append('imagenes[]', imagenes[i]);
            }
            formData.append('title_size', titulo);
            formData.append('text_size', texto);
            formData.append('color_text', color);
            formData.append('message', JSON.stringify(mensaje_personalizado));
            formData.append('langs', lenguaje);
            formData.append('show_restaurants', mostrar_restaurante);
            formData.append('show_gifts', mostrar_regalos);
            formData.append('show_hotel', mostrar_alojamiento);
            formData.append('show_city', ciudad);
            formData.append('_token', _token);
            $.ajax({
                url: '/savePreferences',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if(data.success){
                        M.toast({html: 'Datos guardados correctamente', classes: 'rounded'});
                        if(imagenes.length>0){
                            location.reload();
                        }
                    }else{
                        M.toast({html: 'Error al guardar los datos', classes: 'rounded'});
                    }
                }
            });
        });
        $('.deleteMedia').click(function(){
            var id = $(this).attr('data-id');
            var token = '{{csrf_token()}}';
            $.ajax({
                url: '/deleteMedia',
                type: 'POST',
                data: {id:id,_token:token},
                success: function (data) {
                    console.log(data);
                }
            });
        })
    });
</script>
@endsection