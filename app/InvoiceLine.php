<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class InvoiceLine
 * @package  App
 * @property  integer id
 * @property  Carbon created_at
 * @property  Carbon updated_at
 * @property  integer invoice_id
 * @property  string product
 * @property  integer amount
 * @property  float unit_price
 * @property  Invoice invoice
 * @property float total
 * @mixin  \Eloquent
 */

class InvoiceLine extends Model {

    /**
     * Una línea de factura pertenece a una factura
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice() {
        return $this->belongsTo('App\Invoice');
    }

    public function getTotalAttribute()
    {
        return $this->unit_price * $this->amount;
    }

}