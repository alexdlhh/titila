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
            <span class="card-title">{{!empty($city['id'])?$city['nombre']:'Crear Ciudad'}}</span>
            <div class="row">
                <div class="col s6 form-field">
                    <input type="text" id="nombre_ciudad" value="{{!empty($city['nombre'])?$city['nombre']:''}}">
                    <label for="nombre_ciudad">Nombre de la ciudad</label>
                </div>
                <div class="col s6 form-field">
                    <input type="text" id="alias_ciudad" value="{{!empty($city['alias'])?$city['alias']:''}}">
                    <label for="alias_ciudad">Nombre de la ciudad en la url (no poner espacios)</label>
                </div>           
                <div class="col s6">
                    <img src="{{$city['portada'] ?? ''}}" alt="" width="100px">
                </div>
                <div class="col s6 file-field input-field">
                    <div class="btn">
                      <span>Portada</span>
                      <input type="file" id="portada_ciudad">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="col s12">
                    <textarea id="descripcion_ciudad"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a href="javascript:;" class="btn" id="saveCity">Guardar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row card">
        <div class="col s12 card-content">
            <span class="card-title">Restaurantes</span>
            <div class="row">
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Nombre</th>
                                <th><a href="#restaurantModal" class="modal-trigger btn">Añadir</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($restaurantes))
                                @foreach($restaurantes as $restaurant)
                                    <tr>
                                        <td><img src="{{$restaurant->portada}}" alt="" width="100px"></td>
                                        <td>{{$restaurant->nombre}}</td>
                                        <td>
                                            <a href="#restaurantModal" class="btn modal-trigger" data-json="{{json_encode($restaurant)}}"><i class="material-icons">edit</i></a>
                                            <a href="javascript:;" class="btn red deleteRestaurant" data-id="{{$restaurant->id}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row card">
        <div class="col s12 card-content">
            <span class="card-title">Actividades</span>
            <div class="row">
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Nombre</th>
                                <th><a href="#activityModal" class="modal-trigger btn">Añadir</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($actividades))
                                @foreach($actividades as $activity)
                                    <tr>
                                        <td><img src="{{$activity->portada}}" alt="" width="100px"></td>
                                        <td>{{$activity->nombre}}</td>
                                        <td>
                                            <a href="#activityModal" class="btn modal-trigger" data-json="{{json_encode($activity)}}"><i class="material-icons">edit</i></a>
                                            <a href="javascript:;" class="btn red deleteActivity" data-id="{{$activity->id}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row card">
        <div class="col s12 card-content">
            <span class="card-title">Imperdibles</span>
            <div class="row">
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Nombre</th>
                                <th><a href="#mustSeeModal" class="modal-trigger btn">Añadir</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($imperdibles))
                                @foreach($imperdibles as $mustSee)
                                    <tr>
                                        <td><img src="{{$mustSee->portada}}" alt="" width="100px"></td>
                                        <td>{{$mustSee->nombre}}</td>
                                        <td>
                                            <a href="#mustSeeModal" class="btn modal-trigger" data-json="{{json_encode($mustSee)}}"><i class="material-icons">edit</i></a>
                                            <a href="javascript:;" class="btn red deleteMustSee" data-id="{{$mustSee->id}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row card">
        <div class="col s12 card-content">
            <span class="card-title">Estética</span>
            <div class="row">
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Nombre</th>
                                <th><a href="#steticModal" class="modal-trigger btn">Añadir</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($estetica))
                                @foreach($estetica as $stetic)
                                    <tr>
                                        <td><img src="{{$stetic->portada}}" alt="" width="100px"></td>
                                        <td>{{$stetic->nombre}}</td>
                                        <td>
                                            <a href="#steticModal" class="btn modal-trigger" data-json="{{json_encode($stetic)}}"><i class="material-icons">edit</i></a>
                                            <a href="javascript:;" class="btn red deleteStetic" data-id="{{$stetic->id}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row card">
        <div class="col s12 card-content">
            <span class="card-title">Alojamiento</span>
            <div class="row">
                <div class="col s12">
                    <table>
                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Nombre</th>
                                <th><a href="#steticModal" class="modal-trigger btn">Añadir</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($estetica))
                                @foreach($estetica as $stetic)
                                    <tr>
                                        <td><img src="{{$stetic->portada}}" alt="" width="100px"></td>
                                        <td>{{$stetic->nombre}}</td>
                                        <td>
                                            <a href="#steticModal" class="btn modal-trigger" data-json="{{json_encode($stetic)}}"><i class="material-icons">edit</i></a>
                                            <a href="javascript:;" class="btn red deleteStetic" data-id="{{$stetic->id}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#descripcion_ciudad',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | link image',
        });
        $(document).ready(function(){
            
            $('#saveCity').click(function(){
                
            })
        });        
    </script>
@endsection