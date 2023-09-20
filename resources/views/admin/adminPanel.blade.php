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
            <span class="card-title">Panel Titila</span>
        </div>
        <div class="col s12">
            <p align="center">KPIs de contenido</p>
        </div>
        <div class="col s12">
            <div class="row">
                <div class="col s3 card">
                    <div class="card-content">
                        <span class="card-title">Ciudades</span>
                        <p>10</p>
                    </div>
                </div>
                <div class="col s3 card">
                    <div class="card-content">
                        <span class="card-title">Novios</span>
                        <p>10</p>
                    </div>
                </div>
                <div class="col s3 card">
                    <div class="card-content">
                        <span class="card-title">Invitaciones</span>
                        <p>10</p>
                    </div>
                </div>
                <div class="col s3 card">
                    <div class="card-content">
                        <span class="card-title">Pendientes</span>
                        <p>10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
        });        
    </script>
@endsection