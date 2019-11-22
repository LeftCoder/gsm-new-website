<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevModel extends Model
{
    protected $table = 'urzadzenia__modele';
    protected $primaryKey = 'id_modelu';
    public $timestamps = false;
}
