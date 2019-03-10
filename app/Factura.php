<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
  use HasCompositeKey;
    protected $table = 'factura';
}
