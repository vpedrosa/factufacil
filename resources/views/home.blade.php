@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Factufácil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido! ¿Qué quieres hacer?

                    <ul class="list-group">
                        <li class="list-group-item">{{ link_to_route('invoices.index','Gestionar facturas') }}</li>
                        <li class="list-group-item">{{ link_to_route('clients.index','Gestionar clientes') }}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
