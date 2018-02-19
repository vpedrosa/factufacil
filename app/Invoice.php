<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Invoice
 * @package  App
 * @property  integer id
 * @property  Carbon created_at
 * @property  Carbon updated_at
 * @property  integer number
 * @property  string series
 * @property  integer client_id
 * @property  Carbon date
 * @property  Client client
 * @property InvoiceLine[] invoice_lines
 * @property float subtotal
 * @property float taxes
 * @mixin  \Eloquent
 */

class Invoice extends Model {

    const IVA = 0.21;
    /**
     * Una factura pertenece a un cliente
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function invoice_lines()
    {
        return $this->hasMany('App\InvoiceLine');
    }

    public function getSubtotalAttribute()
    {
        $subtotal = 0;
        foreach ($this->invoice_lines as $invoice_line) {
            $subtotal += $invoice_line->total;
        }
        return $subtotal;
    }

    public function getTaxesAttribute()
    {
        return $this->subtotal*self::IVA;
    }

    public function getTotalAttribute()
    {
        return $this->subtotal + $this->taxes;
    }

}