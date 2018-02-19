@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Añadir línea para factura {{ $invoice->id }}</h1>

                {{ Form::open(['route' => 'invoice-lines.store', 'method' => 'post']) }}
                {{ csrf_field() }}
                {{ Form::hidden('invoice_id', $invoice->id) }}

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('product',  'Producto:') }}
                            {{ Form::text('product', (isset($invoice)) ? $invoice->invoice_linesproduct : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('unit_price',  'Percio por unidad:') }}
                            {{ Form::text('unit_price', (isset($invoice)) ? $invoice->unit_price : '', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('amount',  'Unidades:') }}
                            {{ Form::text('amount', (isset($invoice)) ? $invoice->amount : '', ['class' => 'form-control']) }}
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