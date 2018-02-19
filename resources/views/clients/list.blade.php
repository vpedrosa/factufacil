@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>NIF</th>
                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ link_to_route('clients.show', 'Ver', ['client' => $client->id]) }} |
                                {{ link_to_route('clients.edit', 'Editar', ['client' => $client->id]) }} |
                                {{ link_to_route('clients.create-invoice', 'Nueva Factura', ['client' => $client->id]) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $clients->render() }}
            </div>
        </div></div>
@endsection