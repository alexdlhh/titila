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
<div class="table">
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
                    <a class="waves-effect waves-light btn-small" href="http://localhost:8010/hkbskj_+_ogbdt/jkghjgf"><i class="material-icons left">contact_phone</i>Enviar por whatsapp</a>
                </td>    
            </tr>
        </tbody>
    </table>
</div>
<div class="col s12 right-align">
    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Invitar</a>
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
            <div class="col l4 s12 input-field center-align">
                <input name="id_novio" type="text" id="id_novio" value="{{$id_novio->id_novio ?? ''}}" hidden>
                <label for="id_novio"></label>
            </div>
        </div>
        <div>
            <a class="col l4 s12 input-field right-align waves-effect waves-light btn-small" href="http://localhost:8010/saveTheDatePanel/guests#!"><i class="material-icons left">archive</i>Cargar invitaciones</a>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Atrás</a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
<script>
    $(document).ready(function(){
    $('.modal').modal();
  });
</script>
@endsection