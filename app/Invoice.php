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
 * @mixin  \Eloquent
 */

class Invoice extends Model {

    /**
     * Una factura pertenece a un cliente
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client() {
        return $this->belongsTo('App\Client');
    }

}