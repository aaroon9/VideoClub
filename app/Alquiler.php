<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasCompositeKey;

    //Nombre tabla.
    protected $table = 'alquiler';

    protected $primarykey = ['id_user','id_movie'];
}
