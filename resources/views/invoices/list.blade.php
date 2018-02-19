@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número</th>
                        <th>Serie</th>
                        <th>Cliente</th>
                        <th>Importe</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $invoice->number }}</td>
                            <td>{{ $invoice->series }}</td>
                            <td>{{ $invoice->client->name }}</td>
                            <td>{{ $invoice->total }}€</td>
                            <td>{{ link_to_route('invoices.show', 'Ver', ['invoice' => $invoice->id]) }} |
                                {{ link_to_route('invoices.edit', 'Editar', ['invoice' => $invoice->id]) }} |
                                {{ link_to_route('invoices.add-line', 'Nueva Línea', ['invoice' => $invoice->id]) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $invoices->render() }}
            </div>
        </div></div>
@endsection