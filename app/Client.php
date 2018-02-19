<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Client
 * @package  App
 * @property  integer id
 * @property  Carbon created_at
 * @property  Carbon updated_at
 * @property  string name
 * @property  string address
 * @property  string nif
 * @property  string phone
 * @property  string zip_code
 * @property  string province
 * @mixin  \Eloquent
 */

class Client extends Model {

}