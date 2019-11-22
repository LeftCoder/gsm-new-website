<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartsType extends Model
{
    protected $table = 'serwis__typy_czesci';
    protected $primaryKey = 'id_typ_czesci';
    public $timestamps = false;
}
