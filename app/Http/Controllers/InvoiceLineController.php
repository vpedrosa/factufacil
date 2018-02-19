<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceLine;
use Illuminate\Http\Request;

class InvoiceLineController extends Controller
{

    /**
     * Vista de creación de línea
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Invoice $invoice)
    {
        return view('invoice-lines.create', compact('invoice'));
    }

    /**
     * Almacenar una línea
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /** @var Invoice $invoice */
        $invoice = Invoice::findOrFail($request->invoice_id);
        return $this->storeWithInvoice($invoice, $request);
    }
    /**
     * Almacenar una línea con una factura
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeWithInvoice(Invoice $invoice, Request $request)
    {
        $invoice_line = new InvoiceLine();
        $this->save($invoice_line, $request, $invoice);

        return redirect()->route('invoices.show',['invoice' => $invoice->id])->with('session','Línea añadida con éxito');
    }

    /**
     * Actualizar una línea
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InvoiceLine $invoice_line, Request $request)
    {
        $this->save($invoice_line, $request, $invoice_line->invoice);
        return redirect()->route('invoices.show',['invoice' => $invoice_line->invoice->id])->with('session','Línea editada con éxito');
    }

    /**
     * Guardar una línea
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(InvoiceLine $invoice_line, Request $request, Invoice $invoice, $save=true)
    {
        $invoice_line->product = $request->product;
        $invoice_line->unit_price = $request->unit_price;
        $invoice_line->amount = $request->amount;
        $invoice_line->product = $request->product;
        $invoice_line->invoice()->associate($invoice);

        if($save) $invoice_line->save();
    }
}
