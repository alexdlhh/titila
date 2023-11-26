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
            <span class="card-title">Novios</span>
            <div class="row">
                <div class="col l4 s12 input-field center-align">
                    <label for="novios"></label>
                    <input type="text" id="novios" value="{{$filtroNombre!='0'?$filtroNombre:''}}">
                </div>
                <div>
                    <div class="col l4 s12 input-field center-align">
                        <label for="fechas"></label>
                        <input name="fecha" id="fechas" type="date" value="{{$filtroFecha}}">
                    </div>
                </div>
                <div class="col l4 s12 input-field center-align">
                    <select class="browser-default" id="filtroEstado" >
                        <option value="" disabled selected>Estado</option>
                        <option value="1" {{$filtroEstado==1?'selected':''}}>Activo</option>
                        <option value="2" {{$filtroEstado==2?'selected':''}}>Editado por titila</option>
                        <option value="3" {{$filtroEstado==3?'selected':''}}>Editado por el novio</option>
                        <option value="4" {{$filtroEstado==4?'selected':''}}>En revisión</option>
                        <option value="5" {{$filtroEstado==5?'selected':''}}>Preparado para enviar</option>
                        <option value="6" {{$filtroEstado==6?'selected':''}}>Enviado y esperando confirmación</option>
                        <option value="7" {{$filtroEstado==7?'selected':''}}>Confirmación cerrada</option>
                        <option value="8" {{$filtroEstado==8?'selected':''}}>En curso</option>
                        <option value="9" {{$filtroEstado==9?'selected':''}}>Finalizado</option>
                    </select>
                </div>
            </div>
            <div class="row table">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Fecha de boda</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($novios))
                            @foreach($novios as $novio)
                                <tr>
                                    <td class="center-align"></td>
                                    <td>{{$novio->novio}} - {{$novio->novia}}</td>
                                    <td>{{$novio->fecha_boda}}</td>
                                    <td>
                                        <a href="/coupleEdit/{{$novio->id}}" class="btn"><i class="material-icons">edit</i></a>
                                        <a href="javascript:;" class="btn red deleteNovio" data-id="{{$novio->id}}"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    <div>
           
    <div class="row">
        <div class="col s12 right-align">
            <a href="/coupleEdit/0" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
    </div>    
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.deleteNovio').click(function(){
                if(confirm('¿Seguro que desea borrar esta pareja y todos los componentes asociados, la acción NO será reversible?')){
                    var id = $(this).attr('data-id');
                    var token = '{{csrf_token()}}';
                    $.ajax({
                        url: '/coupleDelete',
                        type: 'POST',
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                location.reload();
                            }else{
                                alert('Error al borrar la pareja');
                            }
                        }
                    });
                }
            })

            $('#novios').change(function(){
                var nombre = $('#novios').val();
                if(nombre == ''){
                    nombre = '0';
                }
                var fecha = $('#fechas').val();
                if(fecha == ''){
                    fecha = '0';
                }
                var estado = $('#filtroEstado').val();
                if(estado == null){
                    estado = '0';
                }
                window.location.href="http://localhost:8010/coupleList/"+nombre+"/"+fecha+"/"+estado+"/";
            })

            $('#filtroEstado').change(function(){
                var nombre = $('#novios').val();
                if(nombre == ''){
                    nombre = '0';
                }
                var fecha = $('#fechas').val();
                if(fecha == ''){
                    fecha = '0';
                }
                var estado = $('#filtroEstado').val();
                if(estado == null){
                    estado = '0';
                }
                window.location.href="http://localhost:8010/coupleList/"+nombre+"/"+fecha+"/"+estado+"/";
            })
        });        
    </script>
@endsection
