<?php
$provinces = ['Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
    'Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
    'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra',
    'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
    'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if(empty($client))
                    <h1>Creación de cliente</h1>
                @else
                    <h1>Actualizar cliente {{ $client->id }}</h1>
                @endif
                {{ Form::open(['route' => 'clients.store', 'method' => 'post']) }}
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            {{ Form::label('name',  'Nombre:') }}
                            {{ Form::text('name', (isset($client)) ? $client->name : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('nif',  'NIF:') }}
                            {{ Form::text('nif', (isset($client)) ? $client->nif : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('address',  'Dirección:') }}
                            {{ Form::text('address', (isset($client)) ? $client->address : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('zip_code',  'Código postal:') }}
                            {{ Form::text('zip_code', (isset($client)) ? $client->zip_code : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('province',  'Provincia:') }}
                            {{ Form::select('province', $provinces, (isset($client)) ? $client->province : '',
                            ['placeholder' => 'Selecciona una provincia...', 'class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('phone',  'Teléfono:') }}
                            {{ Form::text('phone', (isset($client)) ? $client->phone : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-right">
                        <div class="form-group">
                            {{  Form::submit('Guardar',['class' => 'btn btn-primary mt-2']) }}
                        </div>
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection