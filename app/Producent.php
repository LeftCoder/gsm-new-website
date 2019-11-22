<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producent extends Model
{
    protected $table = 'urzadzenia__producenci';
    protected $primaryKey = 'id_producent';
    public $timestamps = false;
}
