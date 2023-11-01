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
            <div class="col l4 s12 input-field center-align">
                <input name="novio" type="text" id="novio" value="{{$novio->novio ?? ''}}">
                <label for="novio">Novio</label>
            </div>
            <div class="col l4 s12 input-field center-align">
                <input name="novia" type="text" id="novia" value="{{$novio->novia ?? ''}}">
                <label for="novia">Novia</label>
            </div>
        </div>
        <div class="row">
            <div class="col l4 s12 input-field center-align">
                <input name="fecha_boda" type="date" id="fecha_boda" value="{{$novio->fecha_boda ?? ''}}">
                <label for="fecha_boda">Fecha de boda</label>
            </div>
            <div class="col l4 s12 input-field center-align">
                <form action="#">
                    <p>
                    <label>
                        <input id="habilitar" value="" type="checkbox" {{!empty($novio->habilitar) && $novio->habilitar==1?'checked':''}}/>
                        <span>Habilitar</span>
                    </label>
                    </p>
                </form>
            </div>
            <div class="col l4 s12 input-field center-align">
                <form action="#">
                    <p>
                    <label>
                        <input id="publicar" value="" type="checkbox" {{!empty($novio->publicar) && $novio->publicar==1?'checked':''}}/>
                        <span>Publicar</span>
                    </label>
                    </p>
                </form>
            </div> 
        </div>
        <div class="row">
            <form class="col s12">
                <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea">{{$novio->programa ?? ''}}</textarea>
                    <label for="textarea1">Programa</label>
                </div>
                </div>
            </form>
            <a class="waves-effect waves-light btn" id="saveCouple">Guardar</a>
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
                                        <a href="#menuModal" class="btn modal-trigger editMenu" data-json="{{json_encode($menu)}}"><i class="material-icons">edit</i></a>
                                        <a href="javascript:;" class="btn red deleteMenu" data-id="{{$menu->id}}"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                </table>
            </div>
        </div>


    </div>
</div>


<!-- Modal Structure EL CODIGO DE LAS VENTANAS MODALES SE SEPARA DEL RESTO PORQUE NO SE VEN HASTA QUE HACEN CLICK EN EL BOTON -->
<div id="menuModal" class="modal">
    <div class="modal-content">
        <h4>Menu</h4>
        <div class="row">
            <input type="text" id="id_novio" value="{{$novio->id ?? ''}}" hidden>
            <div class="col s12 form-field">
                <input type="text" id="nombre_menu">
                <label for="nombre_menu">Nombre de menu</label>
            </div>
            <div class="col s12">
                <textarea id="descripcion_menu"></textarea>
            </div>
            <div>
                <input type="text" id="alergenos">
                <label for="alergenos">Alergenos</label>
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
    var textareas = ['#textarea1','#descripcion_menu'];
    $.each(textareas,function(index,textarea){
        tinymce.init({
            selector: textarea,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    });
    $(document).ready(function(){  //se espera a que termine de cargar la pagina, luego ejecuta lo que hay dentro
        $('.modal').modal();
        $('.hideMenu').hide();
        $('#saveCouple').click(function(){
            var estado = $('#estado').val();
            var novio = $('#novio').val();
            var novia = $('#novia').val();
            var fecha_boda = $('#fecha_boda').val();
            var habilitar = $('#habilitar').prop('checked')?1:0;
            var publicar = $('#publicar').prop('checked')?1:0;
            var programa = tinymce.get('textarea1').getContent();
            var _token = $('#_token').val();
            $.ajax({
                url: "/coupleSave",
                type: 'POST',
                data: {
                    estado: estado,
                    novio: novio,
                    novia: novia,
                    fecha_boda: fecha_boda,
                    habilitar: habilitar,
                    publicar: publicar,
                    programa: programa,
                    _token: _token,
                    _token: '{{csrf_token()}}'
                },
                success: function(data){
                    data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: response.message});
                        location.reload()
                    }else{
                        alert(data.message);
                    }
                }
            });
        });

        //capturar click en el boton de añadir menu .saveMenu
        $('.saveMenu').click(function(){
            var id_novio = $('#id_novio').val();
            var nombre_menu = $('#nombre_menu').val();
            var descripcion_menu = tinymce.get('descripcion_menu').getContent();
            var _token ='{{csrf_token()}}';
            $.ajax({
                url: "/coupleMenu", 
                type: 'POST',
                data: {
                    id_novio: id_novio,
                    nombre: nombre_menu,
                    cuerpo: descripcion_menu,
                    _token: _token
                },
                success: function(data){
                    data = JSON.parse(data);
                    if(data.success){
                        M.toast({html: response.message});
                        location.reload()
                    }else{
                        alert(data.message);
                    }
                }
            });
        });
    });
</script>       
@endsection

