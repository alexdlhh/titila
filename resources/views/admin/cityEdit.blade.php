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
                <div class="col s6">
                    <span class="card-title">{{!empty($city['id'])?$city['nombre']:'Crear Ciudad'}}</span>
                </div>
                <div class="col s6">
                    <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showBasic" onclick="$(this).hide();$('#basic').hide();$('.hideBasic').show()"><i class="material-icons">arrow_upward</i></a>
                    <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideBasic" onclick="$(this).hide();$('#basic').show();$('.showBasic').show()"><i class="material-icons">arrow_downward</i></a>
                </div>
            </div>
            
            <div class="row" id="basic">
                <div class="col s6 form-field">
                    <input type="text" id="nombre_ciudad" value="{{!empty($city['nombre'])?$city['nombre']:''}}">
                    <label for="nombre_ciudad">Nombre de la ciudad</label>
                </div>
                <div class="col s6 form-field">
                    <input type="text" id="alias_ciudad" value="{{!empty($city['alias'])?$city['alias']:''}}">
                    <label for="alias_ciudad">Nombre de la ciudad en la url (no poner espacios)</label>
                </div>           
                <div class="col s6">
                    <img src="/images/cities/{{$city['portada'] ?? ''}}" class="materialboxed" width="100px">
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
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#es">ES</a></li>
                        <li class="tab col s3"><a href="#en">EN</a></li>
                        <li class="tab col s3"><a href="#it">IT</a></li>
                        <li class="tab col s3"><a href="#fr">FR</a></li>
                    </ul>
                </div>
                @php
                    $descripcion = json_decode($city['descripcion'] ?? '{}');
                @endphp
                <div class="col s12" id="es">
                    <textarea id="descripcion_ciudad_es">{{$descripcion->es ?? ''}}</textarea>
                </div>
                <div class="col s12" id="en">
                    <textarea id="descripcion_ciudad_en">{{$descripcion->en ?? ''}}</textarea>
                </div>
                <div class="col s12" id="it">
                    <textarea id="descripcion_ciudad_it">{{$descripcion->it ?? ''}}</textarea>
                </div>
                <div class="col s12" id="fr">
                    <textarea id="descripcion_ciudad_fr">{{$descripcion->fr ?? ''}}</textarea>
                </div>
                <div class="col s12 padding">
                    <a href="javascript:;" class="btn" id="saveCity">Guardar</a>
                </div>
            </div>
        </div>
    </div>
    @if($id!=0)
        <div class="row card">
            <div class="col s12 card-content">
                <div class="row">
                    <div class="col s6">
                        <span class="card-title">Creatividades</span>
                    </div>
                    <div class="col s6">
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showSVG" onclick="$(this).hide();$('#SVG').hide();$('.hideSVG').show()"><i class="material-icons">arrow_upward</i></a>
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideSVG" onclick="$(this).hide();$('#SVG').show();$('.showSVG').show()"><i class="material-icons">arrow_downward</i></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s11 file-field input-field">
                        <div class="btn">
                            <span>Añadir creatividades</span>
                            <input type="file" id="newSVG" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                        </div>
                    </div>
                    <div class="col s1">
                        <a href="javascript:;" class="btn" id="saveSVG">Guardar</a>
                    </div>
                    <div class="col s12" id="SVG">
                        @if(!empty($svgs))
                            <div class="row">
                                @foreach($svgs as $svg)
                                    <div class="col s3">
                                        <div class="svgField">
                                            {!!$svg->codigo!!}
                                        </div>
                                        <a href="javascript:;" class="btn red deleteSVG" data-id="{{$svg->id}}"><i class="material-icons">delete</i></a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row card">
            <div class="col s12 card-content">
                <div class="row">
                    <div class="col s6">
                        <span class="card-title">Restaurantes</span>
                    </div>
                    <div class="col s6">
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showRestaurantes" onclick="$(this).hide();$('#restaurantes').hide();$('.hideRestaurantes').show()"><i class="material-icons">arrow_upward</i></a>
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideRestaurantes" onclick="$(this).hide();$('#restaurantes').show();$('.showRestaurantes').show()"><i class="material-icons">arrow_downward</i></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s12" id="restaurantes">
                        <table>
                            <thead>
                                <tr>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th><a href="#restaurantModal" class="modal-trigger btn addRestaurant">Añadir</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($restaurantes))
                                    @foreach($restaurantes as $restaurant)
                                        <tr>
                                            <td><img src="/images/restaurants/{{$restaurant->portada}}" alt="" width="100px"></td>
                                            <td>{{$restaurant->nombre}}</td>
                                            <td>
                                                <a href="#restaurantModal" class="btn modal-trigger editRestaurant" data-json="{{json_encode($restaurant)}}"><i class="material-icons">edit</i></a>
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
                <div class="row">
                    <div class="col s6">
                        <span class="card-title">Actividades</span>
                    </div>
                    <div class="col s6">
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showActividades" onclick="$(this).hide();$('#actividades').hide();$('.hideActividades').show()"><i class="material-icons">arrow_upward</i></a>
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideActividades" onclick="$(this).hide();$('#actividades').show();$('.showActividades').show()"><i class="material-icons">arrow_downward</i></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s12" id="actividades">
                        <table>
                            <thead>
                                <tr>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th><a href="#activityModal" class="modal-trigger btn addActivity">Añadir</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($actividades))
                                    @foreach($actividades as $activity)
                                        <tr>
                                            <td><img src="/images/activity/{{$activity->portada}}" alt="" width="100px"></td>
                                            <td>{{$activity->nombre}}</td>
                                            <td>
                                                <a href="#activityModal" class="btn modal-trigger editActivity" data-json="{{json_encode($activity)}}"><i class="material-icons">edit</i></a>
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
                <div class="row">
                    <div class="col s6">
                        <span class="card-title">Imperdibles</span>
                    </div>
                    <div class="col s6">
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showImperdibles" onclick="$(this).hide();$('#imperdibles').hide();$('.hideImperdibles').show()"><i class="material-icons">arrow_upward</i></a>
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideImperdibles" onclick="$(this).hide();$('#imperdibles').show();$('.showImperdibles').show()"><i class="material-icons">arrow_downward</i></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s12" id="imperdibles">
                        <table>
                            <thead>
                                <tr>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th><a href="#mustSeeModal" class="modal-trigger btn addMustSee">Añadir</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($imperdibles))
                                    @foreach($imperdibles as $mustSee)
                                        <tr>
                                            <td><img src="/images/mustSee/{{$mustSee->portada}}" alt="" width="100px"></td>
                                            <td>{{$mustSee->nombre}}</td>
                                            <td>
                                                <a href="#mustSeeModal" class="btn modal-trigger editMustSee" data-json="{{json_encode($mustSee)}}"><i class="material-icons">edit</i></a>
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
                <div class="row">
                    <div class="col s6">
                        <span class="card-title">Estética</span>
                    </div>
                    <div class="col s6">
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showEstetica" onclick="$(this).hide();$('#estetica').hide();$('.hideEstetica').show()"><i class="material-icons">arrow_upward</i></a>
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideEstetica" onclick="$(this).hide();$('#estetica').show();$('.showEstetica').show()"><i class="material-icons">arrow_downward</i></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s12" id="estetica">
                        <table>
                            <thead>
                                <tr>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th><a href="#steticModal" class="modal-trigger btn addStetic">Añadir</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($estetica))
                                    @foreach($estetica as $stetic)
                                        <tr>
                                            <td><img src="/images/esthetics/{{$stetic->portada}}" alt="" width="100px"></td>
                                            <td>{{$stetic->nombre}}</td>
                                            <td>
                                                <a href="#steticModal" class="btn modal-trigger editStetic" data-json="{{json_encode($stetic)}}"><i class="material-icons">edit</i></a>
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
                <div class="row">
                    <div class="col s6">
                        <span class="card-title">Alojamiento</span>
                    </div>
                    <div class="col s6">
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light showAlojamiento" onclick="$(this).hide();$('#alojamientos').hide();$('.hideAlojamiento').show()"><i class="material-icons">arrow_upward</i></a>
                        <a href="javascript:;" class="showhide btn-floating btn-large waves-effect waves-light hideAlojamiento" onclick="$(this).hide();$('#alojamientos').show();$('.showAlojamiento').show()"><i class="material-icons">arrow_downward</i></a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s12" id="alojamientos">
                        <table>
                            <thead>
                                <tr>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th><a href="#accommodationModal" class="modal-trigger btn addAccomodation">Añadir</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($alojamiento))
                                    @foreach($alojamiento as $accommodation)
                                        <tr>
                                            <td><img src="/images/accommodation/{{$accommodation->portada}}" alt="" width="100px"></td>
                                            <td>{{$accommodation->nombre}}</td>
                                            <td>
                                                <a href="#accommodationModal" class="btn modal-trigger editAccomodation" data-json="{{json_encode($accommodation)}}"><i class="material-icons">edit</i></a>
                                                <a href="javascript:;" class="btn red deleteAccommodation" data-id="{{$accommodation->id}}"><i class="material-icons">delete</i></a>
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
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th><a href="#transportModal" class="modal-trigger btn addTransport">Añadir</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($transporte))
                                    @foreach($transporte as $transport)
                                        <tr>
                                            <td><img src="/images/transport/{{$transport->portada}}" alt="" width="100px"></td>
                                            <td>{{$transport->nombre}}</td>
                                            <td>
                                                <a href="#transportModal" class="btn modal-trigger editTransport" data-json="{{json_encode($transport)}}"><i class="material-icons">edit</i></a>
                                                <a href="javascript:;" class="btn red deleteTransport" data-id="{{$transport->id}}"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="restaurantModal" class="modal">
            <div class="modal-content">
                <h4>Restaurante</h4>
                <div class="row">
                    <div class="col s12 form-field">
                        <input type="text" id="nombre_restaurante">
                        <label for="nombre_restaurante">Nombre del restaurante</label>
                    </div>
                    <div class="col s6">
                        <img src="" class="materialboxed" width="100px" id="portada_restaurante_img">
                    </div>
                    <div class="col s6 file-field input-field">
                        <div class="btn">
                        <span>Portada</span>
                        <input type="file" id="portada_restaurante">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#restaurant_es">ES</a></li>
                            <li class="tab col s3"><a href="#restaurant_en">EN</a></li>
                            <li class="tab col s3"><a href="#restaurant_it">IT</a></li>
                            <li class="tab col s3"><a href="#restaurant_fr">FR</a></li>
                        </ul>
                    </div>
                    <div class="col s12" id="restaurant_es">
                        <textarea id="descripcion_restaurante_es"></textarea>
                    </div>
                    <div class="col s12" id="restaurant_en">
                        <textarea id="descripcion_restaurante_en"></textarea>
                    </div>
                    <div class="col s12" id="restaurant_it">
                        <textarea id="descripcion_restaurante_it"></textarea>
                    </div>
                    <div class="col s12" id="restaurant_fr">
                        <textarea id="descripcion_restaurante_fr"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a href="javascript:;" class="waves-effect waves-green btn-flat saveRestaurant">Guardar</a>
            </div>
        </div>
        <div id="activityModal" class="modal">
            <div class="modal-content">
                <h4>Actividad</h4>
                <div class="row">
                    <div class="col s12 form-field">
                        <input type="text" id="nombre_actividad">
                        <label for="nombre_actividad">Nombre de la actividad</label>
                    </div>
                    <div class="col s6">
                        <img src="" alt="" width="100px" id="portada_actividad_img">
                    </div>
                    <div class="col s6 file-field input-field">
                        <div class="btn">
                        <span>Portada</span>
                        <input type="file" id="portada_actividad">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#descripcion_es">ES</a></li>
                            <li class="tab col s3"><a href="#descripcion_en">EN</a></li>
                            <li class="tab col s3"><a href="#descripcion_it">IT</a></li>
                            <li class="tab col s3"><a href="#descripcion_fr">FR</a></li>
                        </ul>
                    </div>
                    <div class="col s12" id="descripcion_es">
                        <textarea id="descripcion_actividad_es"></textarea>
                    </div>
                    <div class="col s12" id="descripcion_en">
                        <textarea id="descripcion_actividad_en"></textarea>
                    </div>
                    <div class="col s12" id="descripcion_it">
                        <textarea id="descripcion_actividad_it"></textarea>
                    </div>
                    <div class="col s12" id="descripcion_fr">
                        <textarea id="descripcion_actividad_fr"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a href="javascript:;" class="waves-effect waves-green btn-flat saveActivity">Guardar</a>
            </div>
        </div>
        <div id="mustSeeModal" class="modal">
            <div class="modal-content">
                <h4>Imperdible</h4>
                <div class="row">
                    <div class="col s12 form-field">
                        <input type="text" id="nombre_imperdible">
                        <label for="nombre_imperdible">Nombre del imperdible</label>
                    </div>
                    <div class="col s6">
                        <img src="" alt="" width="100px" id="portada_imperdible_img">
                    </div>
                    <div class="col s6 file-field input-field">
                        <div class="btn">
                        <span>Portada</span>
                        <input type="file" id="portada_imperdible">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#imperdible_es">ES</a></li>
                            <li class="tab col s3"><a href="#imperdible_en">EN</a></li>
                            <li class="tab col s3"><a href="#imperdible_it">IT</a></li>
                            <li class="tab col s3"><a href="#imperdible_fr">FR</a></li>
                        </ul>
                    </div>
                    <div class="col s12" id="imperdible_es">
                        <textarea id="descripcion_imperdible_es"></textarea>
                    </div>
                    <div class="col s12" id="imperdible_en">
                        <textarea id="descripcion_imperdible_en"></textarea>
                    </div>
                    <div class="col s12" id="imperdible_it">
                        <textarea id="descripcion_imperdible_it"></textarea>
                    </div>
                    <div class="col s12" id="imperdible_fr">
                        <textarea id="descripcion_imperdible_fr"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a href="javascript:;" class="waves-effect waves-green btn-flat saveMustSee">Guardar</a>
            </div>
        </div>
        <div id="steticModal" class="modal">
            <div class="modal-content">
                <h4>Estética</h4>
                <div class="row">
                    <div class="col s12 form-field">
                        <input type="text" id="nombre_estetica">
                        <label for="nombre_estetica">Nombre de la estética</label>
                    </div>
                    <div class="col s6">
                        <img src="" alt="" width="100px" id="portada_estetica_img">
                    </div>
                    <div class="col s6 file-field input-field">
                        <div class="btn">
                        <span>Portada</span>
                        <input type="file" id="portada_estetica">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#estetica_es">ES</a></li>
                            <li class="tab col s3"><a href="#estetica_en">EN</a></li>
                            <li class="tab col s3"><a href="#estetica_it">IT</a></li>
                            <li class="tab col s3"><a href="#estetica_fr">FR</a></li>
                        </ul>
                    </div>
                    <div class="col s12" id="estetica_es">
                        <textarea id="descripcion_estetica_es"></textarea>
                    </div>
                    <div class="col s12" id="estetica_en">
                        <textarea id="descripcion_estetica_en"></textarea>
                    </div>
                    <div class="col s12" id="estetica_it">
                        <textarea id="descripcion_estetica_it"></textarea>
                    </div>
                    <div class="col s12" id="estetica_fr">
                        <textarea id="descripcion_estetica_fr"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a href="javascript:;" class="waves-effect waves-green btn-flat saveStetic">Guardar</a>
            </div>
        </div>
        <div id="accommodationModal" class="modal">
            <div class="modal-content">
                <h4>Alojamiento</h4>
                <div class="row">
                    <div class="col s12 form-field">
                        <input type="text" id="nombre_alojamiento">
                        <label for="nombre_alojamiento">Nombre del alojamiento</label>
                    </div>
                    <div class="col s6">
                        <img src="" alt="" width="100px" id="portada_alojamiento_img">
                    </div>
                    <div class="col s6 file-field input-field">
                        <div class="btn">
                        <span>Portada</span>
                        <input type="file" id="portada_alojamiento">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#alojamiento_es">ES</a></li>
                            <li class="tab col s3"><a href="#alojamiento_en">EN</a></li>
                            <li class="tab col s3"><a href="#alojamiento_it">IT</a></li>
                            <li class="tab col s3"><a href="#alojamiento_fr">FR</a></li>
                        </ul>
                    </div>
                    <div class="col s12" id="alojamiento_es">
                        <textarea id="descripcion_alojamiento_es"></textarea>
                    </div>
                    <div class="col s12" id="alojamiento_en">
                        <textarea id="descripcion_alojamiento_en"></textarea>
                    </div>
                    <div class="col s12" id="alojamiento_it">
                        <textarea id="descripcion_alojamiento_it"></textarea>
                    </div>
                    <div class="col s12" id="alojamiento_fr">
                        <textarea id="descripcion_alojamiento_fr"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a href="javascript:;" class="waves-effect waves-green btn-flat saveAccommodation">Guardar</a>
            </div>
        </div>
        <div id="transportModal" class="modal">
            <div class="modal-content">
                <h4>Transporte</h4>
                <div class="row">
                    <div class="col s12 form-field">
                        <input type="text" id="nombre_transport">
                        <label for="nombre_transport">Nombre del transporte</label>
                    </div>
                    <div class="col s6">
                        <img src="" alt="" width="100px" id="portada_transport_img">
                    </div>
                    <div class="col s6 file-field input-field">
                        <div class="btn">
                        <span>Portada</span>
                        <input type="file" id="portada_transport">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#transport_es">ES</a></li>
                            <li class="tab col s3"><a href="#transport_en">EN</a></li>
                            <li class="tab col s3"><a href="#transport_it">IT</a></li>
                            <li class="tab col s3"><a href="#transport_fr">FR</a></li>
                        </ul>
                    </div>
                    <div class="col s12" id="transport_es">
                        <textarea id="descripcion_transport_es"></textarea>
                    </div>
                    <div class="col s12" id="transport_en">
                        <textarea id="descripcion_transport_en"></textarea>
                    </div>
                    <div class="col s12" id="transport_it">
                        <textarea id="descripcion_transport_it"></textarea>
                    </div>
                    <div class="col s12" id="transport_fr">
                        <textarea id="descripcion_transport_fr"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <a href="javascript:;" class="waves-effect waves-green btn-flat saveTransport">Guardar</a>
            </div>
        </div>
    @endif
    <input type="text" id="id" value="{{$city['id'] ?? $id}}" hidden>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
    <script>
        var textareas = [
            '#descripcion_ciudad_es',
            '#descripcion_ciudad_en',
            '#descripcion_ciudad_fr',
            '#descripcion_ciudad_it',
            '#descripcion_restaurante_es',
            '#descripcion_restaurante_en',
            '#descripcion_restaurante_it',
            '#descripcion_restaurante_fr',
            '#descripcion_actividad_es',
            '#descripcion_actividad_en',
            '#descripcion_actividad_fr',
            '#descripcion_actividad_it',
            '#descripcion_imperdible_es',
            '#descripcion_imperdible_en',
            '#descripcion_imperdible_fr',
            '#descripcion_imperdible_it',
            '#descripcion_estetica_es',
            '#descripcion_estetica_en',
            '#descripcion_estetica_it',
            '#descripcion_estetica_fr',
            '#descripcion_alojamiento_es',
            '#descripcion_alojamiento_en',
            '#descripcion_alojamiento_fr',
            '#descripcion_alojamiento_it',
            '#descripcion_transport_es',
            '#descripcion_transport_en',
            '#descripcion_transport_fr',
            '#descripcion_transport_it'
        ];
        $.each(textareas,function(index,textarea){
            tinymce.init({
                selector: textarea,
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        });
        $(document).ready(function(){
            $('.tabs').tabs();
            $('.modal').modal();
            $('.hideBasic').hide();
            $('.hideRestaurantes').hide();
            $('.hideActividades').hide();
            $('.hideImperdibles').hide();
            $('.hideEstetica').hide();
            $('.hideAlojamiento').hide();
            $('.hideTransporte').hide();
            $('.showhide').hide();

            $('#saveCity').click(function(){
                var id = $('#id').val();
                var nombre = $('#nombre_ciudad').val();
                var alias = $('#alias_ciudad').val();
                var portada = $('#portada_ciudad')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_ciudad_es').getContent();
                var descripcion_en = tinymce.get('descripcion_ciudad_en').getContent();
                var descripcion_it = tinymce.get('descripcion_ciudad_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_ciudad_fr').getContent();
                var description = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                var formData = new FormData();
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('alias',alias);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(description));
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/citySave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Ciudad guardada correctamente'});
                            window.location.href = '/cityEdit/'+data.id;
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            });

            $('.editRestaurant').click(function(){
                var restaurant = $(this).attr('data-json');
                restaurant = JSON.parse(restaurant);
                $('#nombre_restaurante').val(restaurant.nombre);
                $('#portada_restaurante_img').attr('src','/images/restaurants/'+restaurant.portada);
                var descripcion_res = JSON.parse(restaurant.descripcion);
                tinymce.get('descripcion_restaurante_es').setContent(descripcion_res.es);
                tinymce.get('descripcion_restaurante_en').setContent(descripcion_res.en);
                tinymce.get('descripcion_restaurante_it').setContent(descripcion_res.it);
                tinymce.get('descripcion_restaurante_fr').setContent(descripcion_res.fr);
                $('.saveRestaurant').attr('data-id',restaurant.id);
            });
            $('.addRestaurant').click(function(){
                $('#nombre_restaurante').val('');
                $('#portada_restaurante_img').attr('src','');
                tinymce.get('descripcion_restaurante_es').setContent('');
                tinymce.get('descripcion_restaurante_en').setContent('');
                tinymce.get('descripcion_restaurante_it').setContent('');
                tinymce.get('descripcion_restaurante_fr').setContent('');
                $('.saveRestaurant').attr('data-id','');
            });
            $('.saveRestaurant').click(function(){
                var id_ciudad = $('#id').val();
                var id = $(this).attr('data-id');
                var nombre = $('#nombre_restaurante').val();
                var portada = $('#portada_restaurante')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_restaurante_es').getContent();
                var descripcion_en = tinymce.get('descripcion_restaurante_en').getContent();
                var descripcion_it = tinymce.get('descripcion_restaurante_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_restaurante_fr').getContent();
                var descripcion = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(descripcion));
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/restaurantSave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Restaurante guardado correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
            $('.deleteRestaurant').click(function(){
                if(confirm('¿Está seguro de eliminar este restaurante?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/restaurantDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'Restaurante eliminado correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            })

            $('.editActivity').click(function(){
                var activity = $(this).attr('data-json');
                activity = JSON.parse(activity);
                $('#nombre_actividad').val(activity.nombre);
                $('#portada_actividad').attr('src','/images/activity/'+activity.portada);
                var descripcion_act = JSON.parse(activity.descripcion);
                tinymce.get('descripcion_actividad_es').setContent(descripcion_act.es);
                tinymce.get('descripcion_actividad_en').setContent(descripcion_act.en);
                tinymce.get('descripcion_actividad_it').setContent(descripcion_act.it);
                tinymce.get('descripcion_actividad_fr').setContent(descripcion_act.fr);
                //$('#web_actividad').val(activity.web);
                $('.saveActivity').attr('data-id',activity.id);
            });
            $('.addActivity').click(function(){
                $('#nombre_actividad').val('');
                $('#portada_actividad').attr('src','');
                tinymce.get('descripcion_actividad_es').setContent('');
                tinymce.get('descripcion_actividad_en').setContent('');
                tinymce.get('descripcion_actividad_it').setContent('');
                tinymce.get('descripcion_actividad_fr').setContent('');
                //$('#web_actividad').val('');
                $('.saveActivity').attr('data-id','');
            });
            $('.saveActivity').click(function(){
                var id_ciudad = $('#id').val();
                var id = $(this).attr('data-id');
                var nombre = $('#nombre_actividad').val();
                var portada = $('#portada_actividad')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_actividad_es').getContent();
                var descripcion_en = tinymce.get('descripcion_actividad_en').getContent();
                var descripcion_it = tinymce.get('descripcion_actividad_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_actividad_fr').getContent();
                var descripcion = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                //var web = $('#web_actividad').val();
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(descripcion));
                //formData.append('web',web);
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/activitySave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Actividad guardada correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
            $('.deleteActivity').click(function(){
                if(confirm('¿Está seguro de eliminar esta actividad?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/activityDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'Actividad eliminada correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            });

            $('.editMustSee').click(function(){
                var mustSee = $(this).attr('data-json');
                mustSee = JSON.parse(mustSee);
                $('#nombre_imperdible').val(mustSee.nombre);
                $('#portada_imperdible').attr('src','/images/mustSee/'+mustSee.portada);
                var descripcion_mus = JSON.parse(mustSee.descripcion);
                tinymce.get('descripcion_imperdible_es').setContent(descripcion_mus.es);
                tinymce.get('descripcion_imperdible_en').setContent(descripcion_mus.en);
                tinymce.get('descripcion_imperdible_it').setContent(descripcion_mus.it);
                tinymce.get('descripcion_imperdible_fr').setContent(descripcion_mus.fr);
                //$('#web_imperdible').val(mustSee.web);
                $('.saveMustSee').attr('data-id',mustSee.id);
            });
            $('.addMustSee').click(function(){
                $('#nombre_imperdible').val('');
                $('#portada_imperdible').attr('src','');
                tinymce.get('descripcion_imperdible_es').setContent('');
                tinymce.get('descripcion_imperdible_en').setContent('');
                tinymce.get('descripcion_imperdible_it').setContent('');
                tinymce.get('descripcion_imperdible_fr').setContent('');
                //$('#web_imperdible').val('');
                $('.saveMustSee').attr('data-id','');
            });
            $('.saveMustSee').click(function(){
                var id_ciudad = $('#id').val();
                var id = $(this).attr('data-id');
                var nombre = $('#nombre_imperdible').val();
                var portada = $('#portada_imperdible')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_imperdible_es').getContent();
                var descripcion_en = tinymce.get('descripcion_imperdible_en').getContent();
                var descripcion_it = tinymce.get('descripcion_imperdible_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_imperdible_fr').getContent();
                var descripcion = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                //var web = $('#web_imperdible').val();
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(descripcion));
                //formData.append('web',web);
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/mustSeeSave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Imperdible guardado correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
            $('.deleteMustSee').click(function(){
                if(confirm('¿Está seguro de eliminar este imperdible?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/mustSeeDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'Imperdible eliminado correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            })

            $('.editStetic').click(function(){
                var stetic = $(this).attr('data-json');
                stetic = JSON.parse(stetic);
                $('#nombre_estetica').val(stetic.nombre);
                $('#portada_estetica').attr('src','/images/esthetics/'+stetic.portada);
                var descripcion_est = JSON.parse(stetic.descripcion);
                tinymce.get('descripcion_estetica_es').setContent(descripcion_est.es);
                tinymce.get('descripcion_estetica_en').setContent(descripcion_est.en);
                tinymce.get('descripcion_estetica_it').setContent(descripcion_est.it);
                tinymce.get('descripcion_estetica_fr').setContent(descripcion_est.fr);

                $('.saveStetic').attr('data-id',stetic.id);
            });
            $('.addStetic').click(function(){
                $('#nombre_estetica').val('');
                $('#portada_estetica').attr('src','');
                tinymce.get('descripcion_estetica_es').setContent('');
                tinymce.get('descripcion_estetica_en').setContent('');
                tinymce.get('descripcion_estetica_it').setContent('');
                tinymce.get('descripcion_estetica_fr').setContent('');
                $('.saveStetic').attr('data-id','');
            });
            $('.saveStetic').click(function(){
                var id_ciudad = $('#id').val();
                var id = $(this).attr('data-id');
                var nombre = $('#nombre_estetica').val();
                var portada = $('#portada_estetica')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_estetica_es').getContent();
                var descripcion_en = tinymce.get('descripcion_estetica_en').getContent();
                var descripcion_it = tinymce.get('descripcion_estetica_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_estetica_fr').getContent();
                var descripcion = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(descripcion));
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/estheticsSave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Estética guardada correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
            $('.deleteStetic').click(function(){
                if(confirm('¿Está seguro de eliminar esta estética?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/estheticsDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'Estética eliminada correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            })

            $('.editAccomodation').click(function(){
                var accommodation = $(this).attr('data-json');
                accommodation = JSON.parse(accommodation);
                $('#nombre_alojamiento').val(accommodation.nombre);
                $('#portada_alojamiento').attr('src','/images/accommodation/'+accommodation.portada);
                var descripcion_alo = JSON.parse(accommodation.descripcion);
                tinymce.get('descripcion_alojamiento_es').setContent(descripcion_alo.es);
                tinymce.get('descripcion_alojamiento_en').setContent(descripcion_alo.en);
                tinymce.get('descripcion_alojamiento_it').setContent(descripcion_alo.it);
                tinymce.get('descripcion_alojamiento_fr').setContent(descripcion_alo.fr);
                $('.saveAccommodation').attr('data-id',accommodation.id);
            });
            $('.addAccomodation').click(function(){
                $('#nombre_alojamiento').val('');
                $('#portada_alojamiento_img').attr('src','');
                tinymce.get('descripcion_alojamiento_es').setContent('');
                tinymce.get('descripcion_alojamiento_en').setContent('');
                tinymce.get('descripcion_alojamiento_it').setContent('');
                tinymce.get('descripcion_alojamiento_fr').setContent('');
                $('.saveAccommodation').attr('data-id','');
            });
            $('.saveAccommodation').click(function(){
                var id_ciudad = $('#id').val();
                var id = $(this).attr('data-id');
                var nombre = $('#nombre_alojamiento').val();
                var portada = $('#portada_alojamiento')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_alojamiento_es').getContent();
                var descripcion_en = tinymce.get('descripcion_alojamiento_en').getContent();
                var descripcion_it = tinymce.get('descripcion_alojamiento_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_alojamiento_fr').getContent();
                var descripcion = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(descripcion));
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/accommodationSave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Alojamiento guardado correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
            $('.deleteAccommodation').click(function(){
                if(confirm('¿Está seguro de eliminar este alojamiento?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/accommodationDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'Alojamiento eliminado correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            })

            $('.editTransport').click(function(){
                var transport = $(this).attr('data-json');
                transport = JSON.parse(transport);
                $('#nombre_transport').val(transport.nombre);
                $('#portada_transport').attr('src','/images/transport/'+transport.portada);
                var descripcion_tra = JSON.parse(transport.descripcion);
                tinymce.get('descripcion_transport_es').setContent(descripcion_tra.es);
                tinymce.get('descripcion_transport_en').setContent(descripcion_tra.en);
                tinymce.get('descripcion_transport_it').setContent(descripcion_tra.it);
                tinymce.get('descripcion_transport_fr').setContent(descripcion_tra.fr);
                $('.saveTransport').attr('data-id',transport.id);
            });
            $('.addTransport').click(function(){
                $('#nombre_transport').val('');
                $('#portada_transport').attr('src','');
                tinymce.get('descripcion_transport_es').setContent('');
                tinymce.get('descripcion_transport_en').setContent('');
                tinymce.get('descripcion_transport_it').setContent('');
                tinymce.get('descripcion_transport_fr').setContent('');
                $('.saveTransport').attr('data-id','');
            });
            $('.saveTransport').click(function(){
                var id_ciudad = $('#id').val();
                var id = $(this).attr('data-id');
                var nombre = $('#nombre_transport').val();
                var portada = $('#portada_transport')[0].files[0];
                var descripcion_es = tinymce.get('descripcion_transport_es').getContent();
                var descripcion_en = tinymce.get('descripcion_transport_en').getContent();
                var descripcion_it = tinymce.get('descripcion_transport_it').getContent();
                var descripcion_fr = tinymce.get('descripcion_transport_fr').getContent();
                var descripcion = {
                    es:descripcion_es,
                    en:descripcion_en,
                    it:descripcion_it,
                    fr:descripcion_fr
                };
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                formData.append('id',id);
                formData.append('nombre',nombre);
                formData.append('portada',portada);
                formData.append('descripcion',JSON.stringify(descripcion));
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/transportSave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'Transporte guardado correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
            $('.deleteTransport').click(function(){
                if(confirm('¿Está seguro de eliminar este transporte?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/transportDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'Transporte eliminado correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            })

            $('.deleteSVG').click(function(){
                if(confirm('¿Está seguro de eliminar este SVG?')){
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: "/svgDelete",
                        type: 'POST',
                        data: {
                            id:id,
                            _token:'{{csrf_token()}}'
                        },
                        success: function (data) {
                            if(data.status == 'success'){
                                M.toast({html: 'SVG eliminado correctamente'});
                                window.location.reload();
                            }else{
                                M.toast({html: data.message});
                            }
                        }
                    });
                }
            })
            $('#saveSVG').click(function(){
                var id_ciudad = $('#id').val();
                var svgs = $('#newSVG')[0].files;
                var formData = new FormData();
                formData.append('id_ciudad',id_ciudad);
                for (var i = 0; i < svgs.length; i++) {
                    formData.append('svgs[]', svgs[i]);
                }
                formData.append('_token','{{csrf_token()}}');
                $.ajax({
                    url: "/svgSave",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.status == 'success'){
                            M.toast({html: 'SVG guardado correctamente'});
                            window.location.reload();
                        }else{
                            M.toast({html: data.message});
                        }
                    }
                });
            })
        });        
    </script>
@endsection