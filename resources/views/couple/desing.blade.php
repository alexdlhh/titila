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
    
    <div id="media" class="row">
        <div class="center-align col s12">
            <p><h4>Imágen Principal</h4></p>
        </div>
        <div class="col l4 s12">
            <img src="https://picsum.photos/250/250">
            <input id="image1" type="radio" name="image" value="https://picsum.photos/250/250">
            <p>
                <label>
                       <input name="group1" type="radio" checked />
                       <span>Select</span>
                </label>
            </p>
        </div>
        <div class="col l4 s12">
            <img src="https://picsum.photos/251/251">
            <input id="image2" type="radio" name="image" value="https://picsum.photos/251/251">
            <p>
                <label>
                       <input name="group1" type="radio" checked />
                       <span>Select</span>
                </label>
            </p>
        </div>
        <div class="col l4 s12">
            <img src="https://picsum.photos/252/252">
            <input id="image3" type="radio" name="image" value="https://picsum.photos/252/252">
            <p>
                <label>
                       <input name="group1" type="radio" checked />
                       <span>Select</span>
                </label>
            </p>
        </div>
        <div class="center-align col s12">
            <p><h4>Patrón de Fondo</h4></p>
        </div>
        <div class="col l4 s12">
            <img src="https://picsum.photos/253/253">
            <input id="image4" type="radio" name="image" value="https://picsum.photos/253/253">
            <p>
                <label>
                       <input name="group2" type="radio" checked />
                       <span>Select</span>
                </label>
            </p>
        </div>
        <div class="col l4 s12">
            <img src="https://picsum.photos/254/254">
            <input id="image5" type="radio" name="image" value="https://picsum.photos/254/254">
            <p>
                <label>
                       <input name="group2" type="radio" checked />
                       <span>Select</span>
                </label>
            </p>
        </div>
        <div class="col l4 s12">
            <img src="https://picsum.photos/255/255">
            <input id="image6" type="radio" name="image" value="https://picsum.photos/255/255">
            <p>
                <label>
                        <input name="group2" type="radio" checked />
                        <span>Select</span>
                </label>
            </p>
        </div>
    </div>

    <div id="textos" class="row">
        <div class="center-align col l4 s12">
            <p><h5>Tamaño de texto de los títulos</h5></p>
            
            <select class="browser-default" id="estado" >
                <option value="" disabled selected>Estado</option>
                <option value="1" {{!empty($novio->estado) && $novio->estado==1?'selected':''}}>Grande</option>
                <option value="2" {{!empty($novio->estado) && $novio->estado==2?'selected':''}}>Mediano</option>
                <option value="3" {{!empty($novio->estado) && $novio->estado==3?'selected':''}}>Pequeño</option>
            </select>
        </div>
        <div class="center-align col l4 s12">
            <p><h5>Tamaño de texto de los textos</h5></p>
            <select class="browser-default" id="estado" >
                    <option value="" disabled selected>Estado</option>
                    <option value="1" {{!empty($novio->estado) && $novio->estado==1?'selected':''}}>Grande</option>
                    <option value="2" {{!empty($novio->estado) && $novio->estado==2?'selected':''}}>Mediano</option>
                    <option value="3" {{!empty($novio->estado) && $novio->estado==3?'selected':''}}>Pequeño</option>
            </select>
        </div>
        <div class="col l4 s12">
            <p><h5>Color de Texto</h5></p>
            <input type="color">
        </div>
        <div class="row">
            <div class="col s12 left-align">
                <p><h5>Mensaje inicio</h5></p>
                <textarea id="mensaje_personalizado" class="materialize-textarea"></textarea>
            </div>
        </div>
    </div>
    <div id="listado_regalos" class="col s12">
        Test 3
    </div>
    <div id="Modulos" class="col s12">
        Test 4
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
<script>
    var textareas = ['#mensaje_personalizado'];
    $.each(textareas,function(index,textarea){
        tinymce.init({
            selector: textarea,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    });
    $(document).ready(function(){
        $('.tabs').tabs();
    });
</script>
@endsection