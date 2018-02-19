@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Creación de nueva factura para {{ $client->name }}</h1>

                {{ Form::open(['route' => 'invoices.store', 'method' => 'post']) }}
                {{ csrf_field() }}
                {{ Form::hidden('client_id', $client->id) }}

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            {{ Form::label('number',  'Número de factura:') }}
                            {{ Form::text('number', (isset($invoice)) ? $invoice->number : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('series',  'Serie:') }}
                            {{ Form::text('series', (isset($invoice)) ? $invoice->series : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('date',  'Fecha:') }}
                            {{ Form::date('date', (isset($invoice)) ? $invoice->date : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

                @if(isset($invoice))
                    @foreach($invoice->invoice_lines as $invoice_line)
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('product_'.$invoice_line->id,  'Producto:') }}
                                {{ Form::text('product_'.$invoice_line->id, $invoice_line->product, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('unit_price_'.$invoice_line->id,  'Percio por unidad:') }}
                                {{ Form::text('unit_price_'.$invoice_line->id, $invoice_line->unit_price, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('amount_'.$invoice_line->id,  'Unidades:') }}
                                {{ Form::text('amount_'.$invoice_line->id, $invoice_line->amount, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @empty($invoice->invoice_lines)
                            <div class="row">
                                <div class="col">
                                    <p>No hay líneas asignadas. Haz clic {{ link_to_route('invoices.add-line',["id" => $invoice->id]) }} para añadir líneas.</p>
                                </div>
                            </div>
                    @endempty
                @else
                    <div class="row">
                        <div class="col">
                            <p>Añadirás las líneas posteriormente.</p>
                        </div>
                    </div>
                @endif

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