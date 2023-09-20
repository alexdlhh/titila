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
            <span class="card-title">Ciudades</span>
            <div class="row table">
                <table>
                    <thead>
                        <tr>
                            <th>Ciudad</th>
                            <th>Última actualización</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($cities))
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{$city->nombre}}</td>
                                    <td>{{$city->updated_at}}</td>
                                    <td>
                                        <a href="/cityEdit/{{$city->id}}" class="btn"><i class="material-icons">edit</i></a>
                                        <a href="javascript:;" class="btn red deleteCity" data-id="{{$city->id}}"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 right-align">
            <a href="/cityEdit/0" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
    </div>    
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.deleteCity').click(function(){
                if(confirm('¿Seguro que desea borrar esta ciudad y todos los componentes asociados, la acción NO será reversible?')){
                    var id = $(this).data('id');
                    var token = '{{csrf_token()}}';
                    $.ajax({
                        url: '/cityDelete/',
                        type: 'POST',
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                location.reload();
                            }else{
                                alert('Error al borrar la ciudad');
                            }
                        }
                    });
                }
            })
        });        
    </script>
@endsection