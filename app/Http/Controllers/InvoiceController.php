<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\InvoiceLine;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id','desc')->paginate(10);
        return view('invoices.list',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    public function createWithClient(Client $client)
    {
        return view('invoices.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Client $client */
        $client = Client::findOrFail($request->client_id);
        $invoice = new Invoice();
        $invoice->client()->associate($client);
        $this->save($invoice, $request);
        return redirect()->route('home')->with('status', '¡Factura '.$invoice->number.'/'.$invoice->series.' creada con éxito!');
    }

    private function save(Invoice &$invoice, Request &$request, $save = true)
    {
        $invoice->number = $request->number;
        $invoice->series = $request->series;
        $invoice->date = $request->date;
        if($save) $invoice->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.create', ['invoice' => $invoice, 'client' => $invoice->client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $this->save($invoice,$request);
        return redirect()->route('home')->with('status', '¡Factura '.$invoice->number.'/'.$invoice->series.' actualizada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('home')->with('status', '¡Factura eliminada con éxito!');

    }
}
