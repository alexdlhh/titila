@extends('admin.layout')

@section('title')
    <title>Panel Titila</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="row card">
    <div class="col l6 s12 card-content">
        <div class="row">
            <div class="col l4 s12 input-field center-align">
                <select class="browser-default" id="estado" >
                    <option value="" disabled selected>Estado</option>
                    <option value="1" {{!empty($novio->estado) && $novio->estado==1?'selected':''}}>Confirmada</option>
                    <option value="2" {{!empty($novio->estado) && $novio->estado==2?'selected':''}}>Pendiente</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="col s12 card-content center-align">
    <p><h3>Estado de Invitaciones</h3></p>
</div>
<div class="centered center-align">
    <table>
        <thead>
            <tr>
                <th>Total</th>
                <th>Confirmados</th>
                <th>Pendientes</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>100</td>
                <td>60</td>
                <td>40</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col s12 right-align">
    <a class="waves-effect waves-light btn-small" href="http://localhost:8010/hkbskj_+_ogbdt/jkghjgf"><i class="material-icons left">cloud</i>Ver invitacion</a>
</div>
@endsection