<?php

namespace App;

use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
  use SearchableTrait;

  protected $table = 'serwis__cennik';
  protected $primaryKey = 'id_cennik';
  public $timestamps = false;
  public $with = ['producent', 'model', 'service'];

  protected $searchable = [
    /**
     * Columns and their priority in search results.
     * Columns with higher values are more important.
     * Columns with equal values have equal importance.
     *
     * @var array
     */
    'columns' => [
        'urzadzenia__producenci.nazwa_producenta' => 10,
        'urzadzenia__modele.nazwa_modelu' => 10,
        'urzadzenia__modele.kod_modelu' => 10,
    ],
    'joins' => [
        'urzadzenia__producenci' => ['serwis__cennik.id_producent','urzadzenia__producenci.id_producent'],
        'urzadzenia__modele' => ['serwis__cennik.id_model','urzadzenia__modele.id_modelu']
    ],
  ];

  public function producent()
  {
      return $this->belongsTo('App\Producent', 'id_producent');
  }

  public function model()
  {
      return $this->belongsTo('App\DevModel', 'id_model');
  }

  public function service()
  {
      return $this->belongsTo('App\PartsType', 'id_czesci');
  }

  public function partListCounter() {
    return $this->count();
  }
}
