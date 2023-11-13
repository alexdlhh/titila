@extends('admin.layout')

@section('title')
    <title>Panel Titila</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="center-align">
    <p><h4>Estado de las Invitaciones</h4></p>
</div>
<div class="row card">
    <div class="col l6 s12 card-content">
        <div class="row">
            <div class="col l6 s12 input-field center-align">
                <select class="browser-default" id="estado" >
                    <option value="" disabled selected>Estado</option>
                    <option value="1" {{!empty($novio->estado) && $novio->estado==1?'selected':''}}>Confirmada</option>
                    <option value="2" {{!empty($novio->estado) && $novio->estado==2?'selected':''}}>Pendiente</option>
                </select>
            </div>
            <div id="estado" class="col l6 s12 right-align">
                <button class="waves-effect waves-light btn red modal-trigger delete">Borrar filtro</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>Alvin</td>
                    <td>Confirmado</td>
                    <td>
                        <a class="waves-effect waves-light btn-small" href="https://api.whatsapp.com/send?phone={{$invitado->telefono ?? '637192482'}}&text=https://wedding.titila.es/Arianna-+-Tomas/g0treg9"><i class="material-icons left">contact_phone</i>Enviar por whatsapp</a>
                    </td>    
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col s12 right-align">
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Invitar</a>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="col l6 s12 input-field center-align">
            <input name="nombre" type="text" id="nombre" value="{{$nombre->nombre ?? ''}}">
            <label for="nombre">Nombre</label>
        </div>
        <div class="col l6 s12 input-field center-align">
            <input name="invitados" type="text" id="invitados" value="{{$invitados->invitados ?? ''}}">
            <label for="invitados">Invitados</label>
        </div>
        <div class="col l6 s12 input-field center-align">
            <input name="email" type="text" id="email" value="{{$email->email ?? ''}}">
            <label for="email">Email</label>
        </div>
        <div class="col l6 s12 input-field center-align">
            <input name="telefono" type="text" id="telefono" value="{{$telefono->telefono ?? ''}}">
            <label for="telefono">Teléfono</label>
        </div>
        <input name="id_novio" type="text" id="id_novio" value="{{$id_novio->id_novio ?? ''}}" hidden>
        <div class="col s12 file-field input-field">
            <div class="btn">
                <span>Subir CSV</span>
                <input type="file" id="archivo">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        <a href="#!" class="waves-effect waves-green btn-flat" id="saveGuest">Guardar</a>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('#saveGuest').on('click', function() {
            var nombre = $('#nombre').val();
            var invitados = $('#invitados').val();
            var email = $('#email').val();
            var telefono = $('#telefono').val();
            var id_novio = $('#id_novio').val();
            var archivo = $('#archivo').prop('files')[0];
            var _token = '{{csrf_token()}}';
            $.ajax({
                url: "/SaveTheDate/guests",
                type: 'POST',
                data: {
                    nombre: nombre,
                    invitados: invitados,
                    email: email,
                    telefono: telefono,  
                    id_novio: id_novio,
                    archivo: archivo,                                                                           
                    _token: '{{csrf_token()}}'
                },
                success: function (response) {
                    console.log(response);
                }   
            });
        });
  });
</script>
@endsection