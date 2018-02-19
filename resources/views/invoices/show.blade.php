@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Factura {{ $invoice->number }}@isset($invoice->series)/{{$invoice->series}}@endisset</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Para:</h3>
                <ul class="list-group list-group-flush">
                    <p>{{$invoice->client->name}}</p>
                    <p>{{$invoice->client->nif}}</p>
                    <p>{{$invoice->client->address}}</p>
                    <p>{{$invoice->client->zip_code}},{{$invoice->client->province}}</p>
                    <p>{{$invoice->client->phone}}</p>
                </ul>
            </div>
            <div class="col">
                <h3>Datos fiscales:</h3>
                <ul class="list-group list-group-flush">
                    <p>Nombre de la empresa</p>
                    <p>B19123456</p>
                    <p>C/De Ejemplo S/N</p>
                    <p>18014, Granada</p>
                    <p>876 67 67 67</p>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mt-3"></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Total línea</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice->invoice_lines as $invoice_line)
                        <tr>
                            <td>{{ $invoice_line->product }}</td>
                            <td>{{ $invoice_line->unit_price }}</td>
                            <td>{{ $invoice_line->amount }}</td>
                            <td>{{ $invoice_line->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col text-right">
                <hr>
                <p><strong>Subtotal: {{ $invoice->subtotal }} €</strong></p>
                <p><strong>IVA 21%: {{ $invoice->taxes }} €</strong></p>
                <p><strong>Total: {{ $invoice->total }} €</strong></p>
            </div>
        </div>
    </div>
@endsection