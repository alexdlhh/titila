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
            <div class="col l4 s12">
                <img src="https://picsum.photos/250/250">
                <p>
                    <label>
                        <input name="group1" value="https://picsum.photos/250/250" type="radio" checked />
                        <span>Select</span>
                    </label>
                </p>
            </div>
            <div class="col l4 s12">
                <img src="https://picsum.photos/251/251">
                <p>
                    <label>
                        <input name="group1" value="https://picsum.photos/251/251" type="radio" checked />
                        <span>Select</span>
                    </label>
                </p>
            </div>
            <div class="col l4 s12">
                <img src="https://picsum.photos/252/252">
                <p>
                    <label>
                        <input name="group1" value="https://picsum.photos/252/252" type="radio" checked />
                        <span>Select</span>
                    </label>
                </p>
            </div>
            <div class="center-align col s12">
                <p><h4>Patrón de Fondo</h4></p>
            </div>
            <div class="col l4 s12">
                <img src="https://picsum.photos/253/253">
                <p>
                    <label>
                        <input name="group2" value="https://picsum.photos/253/253" type="radio" checked />
                        <span>Select</span>
                    </label>
                </p>
            </div>
            <div class="col l4 s12">
                <img src="https://picsum.photos/254/254">
                <p>
                    <label>
                        <input name="group2" value="https://picsum.photos/254/254" type="radio" checked />
                        <span>Select</span>
                    </label>
                </p>
            </div>
            <div class="col l4 s12">
                <img src="https://picsum.photos/255/255">
                <p>
                    <label>
                            <input name="group2" value="https://picsum.photos/255/255" type="radio" checked />
                            <span>Select</span>
                    </label>
                </p>
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
        </div>
    </div>
    <div class="col s12">
        <div id="textos" class="row">
            <div class="center-align col l4 s12">
                <p><h5>Tamaño de texto de los títulos</h5></p>
                <select class="browser-default" id="titulo" >
                    <option value="" disabled selected>Estado</option>
                    <option value="1" {{!empty($novio->titulo) && $novio->titulo==1?'selected':''}}>Grande</option>
                    <option value="2" {{!empty($novio->titulo) && $novio->titulo==2?'selected':''}}>Mediano</option>
                    <option value="3" {{!empty($novio->titulo) && $novio->titulo==3?'selected':''}}>Pequeño</option>
                </select>
            </div>
            <div class="center-align col l4 s12">
                <p><h5>Tamaño de texto de los textos</h5></p>
                <select class="browser-default" id="texto" >
                        <option value="" disabled selected>Estado</option>
                        <option value="1" {{!empty($novio->texto) && $novio->texto==1?'selected':''}}>Grande</option>
                        <option value="2" {{!empty($novio->texto) && $novio->texto==2?'selected':''}}>Mediano</option>
                        <option value="3" {{!empty($novio->texto) && $novio->texto==3?'selected':''}}>Pequeño</option>
                </select>
            </div>
            <div class="col l4 s12">
                <p><h5>Color de Texto</h5></p>
                <input id="color" type="color">
            </div>
            <div class="row">
                <div class="col s12 left-align">
                    <p><h5>Mensaje inicio</h5></p>
                    <textarea id="mensaje_personalizado" class="materialize-textarea"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div id="listado_regalos" class="row">
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
                </div>
                </tbody>
            </table>
            <div class="col s12">
                <p>
                    <h5>Añadir Regalo</h5>
                </p>
            </div>
            <div class="col s12">
                <div id="regalo" class="col l4 s12 input-field center-align">
                    <input name=nombre type="text">
                    <label for="nombre">Nombre Regalo</label>
                </div>
                <div class="col l4 s12 input-field center-align">
                    <input id="URL" name=URL type="text">
                    <label for="URL">URL</label>
                </div>
                <a class="waves-effect waves-light btn-small" href=""><i class="material-icons left"></i>Añadir</a>
            </div> 
        </div>
    </div>
    <div class="col s12">
        <div id="Modulos" class="row">
            <div class="col l6 s12">
                <select class="browser-default" id="lenguaje" >
                            <option value="" disabled selected>Lenguaje</option>
                            <option value="1" {{!empty($novio->lenguaje) && $novio->lenguaje==1?'selected':''}}>Español</option>
                            <option value="2" {{!empty($novio->lenguaje) && $novio->lenguaje==2?'selected':''}}>Ingles</option>
                            <option value="3" {{!empty($novio->lenguaje) && $novio->lenguaje==3?'selected':''}}>Frances</option>
                            <option value="4" {{!empty($novio->lenguaje) && $novio->lenguaje==4?'selected':''}}>Italiano</option>
                            <option value="5" {{!empty($novio->lenguaje) && $novio->lenguaje==5?'selected':''}}>Portugues</option>
                </select>
            </div>
            <div class="col l6 s12">
                <p>
                    <label>
                        <input id="mostrar_restaurante" type="checkbox" class="filled-in" checked="checked" />
                        <span>Mostrar Restaurantes</span>
                    </label>
                </p>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in" checked="checked" />
                            <span>Lista de Regalos</span>
                        </label>
                    </p>
                </div>
                <div class="col l6 s12">
                    <p>
                        <label>
                            <input id="mostrar_alojamiento" type="checkbox" class="filled-in" checked="checked" />
                            <span>Mostrar Alojamientos</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col l6 s12">
                    <p>
                        <label>
                            <input id="ciudad" type="checkbox" class="filled-in" checked="checked" />
                            <span>Ciudad</span>
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="col s12"> 
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light red" id="guardar">
            <i class="material-icons">archive</i>
            </a>
        </div>
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
        $('#guardar').on('click', function() {
            var image1 = $("input[name=group1]:checked").val();
            var image4 = $("input[name=group2]:checked").val();
            var imagenes = $('#imagenes').val();
            var  titulo = $('#titulo').val();
            var  texto = $('#texto').val();
            var  color = $('#color').val();
            var mensaje_personalizado = tinymce.get('mensaje_personalizado').getContent();
            var regalo = $('#regalo').val();
            var URL = $('#URL').val();
            var lenguaje = $('#lenguaje').val();
            var mostrar_restaurante = $('#mostrar_restaurante').prop("checked")?1:0;
            var mostrar_alojamiento = $('#mostrar_alojamiento').prop("checked")?1:0;
            var ciudad = $('#ciudad').prop("checked")?1:0;
            var _token = '{{csrf_token()}}';
            formData = new FormData();
            formData.append("image1", image1 ? 1 : 0);
            formData.append("image4", image4 ? 1 : 0);
            formData.append("mostrar_restaurante", mostrar_restaurante ? 1 : 0);
            formData.append("mostrar_alojamiento", mostrar_alojamiento ? 1 : 0);
            formData.append("ciudad", ciudad ? 1 : 0);
            $.ajax({
                url: "/SaveTheDate/saveDesing",
                type: 'POST',
                data: {
                    image1: image1,
                    image4: image4,
                    imagenes: imagenes,
                    titulo: titulo,
                    texto: texto,
                    color: color,
                    mensaje_personalizado: mensaje_personalizado,
                    regalo: regalo,
                    URL: URL,
                    lenguaje: lenguaje,
                    mostrar_restaurante: mostrar_restaurante,
                    mostrar_alojamiento: mostrar_alojamiento,
                    ciudad: ciudad,                                                                             
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    console.log(response);
                }   
            });
            alert('Button clicked!'); // Replace this with your actual logic
        });
        $('.tabs').tabs();
    });
</script>
@endsection