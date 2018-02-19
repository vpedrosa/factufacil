@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Factura</h1>
                <h4 class="text-muted">Número: {{ $invoice->number }}@isset($invoice->series)/{{$invoice->series}}@endisset</h4>
                <h4 class="text-muted">Fecha: {{ $invoice->date }}</h4>
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
                            <td>{{ $invoice_line->unit_price }} €</td>
                            <td>{{ $invoice_line->amount }}</td>
                            <td>{{ $invoice_line->total }} €</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row no-print">
            <div class="col">
                @empty($invoice->invoice_lines)
                    <p>No hay líneas asignadas. Haz
                        clic {{ link_to_route('invoices.add-line', 'aquí', ["id" => $invoice->id]) }} para añadir
                        líneas.</p>

                @endempty
                @isset($invoice->invoice_lines)
                    <p class="text-right">{{ link_to_route('invoices.add-line', 'Añadir más líneas', ["id" => $invoice->id]) }}</p>
                @endisset
            </div>
        </div>

        <div class="row">
            <div class="col text-right">
                <hr>
                <h3><strong>Subtotal: {{ $invoice->subtotal }} €</strong></h3>
                <h3><strong>IVA 21%: {{ $invoice->taxes }} €</strong></h3>
                <h2><strong>Total: {{ $invoice->total }} €</strong></h2>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <hr>
                <p>Realizar ingreso en los próximos 30 días en la cuenta ES91 2100 0418 4502 0005 1332.</p>
            </div>
        </div>

        <div class="row no-print">
            <div class="col text-right">
                <hr>
                {{ link_to_route('invoices.edit', 'Editar', ["id" => $invoice->id], ["class" => "btn btn-primary"]) }}
            </div>
        </div>
    </div>
@endsection