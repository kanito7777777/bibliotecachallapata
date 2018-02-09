<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prestamo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'observacion', 'estado', 'fkMaterial', 'fkEstudiante'];

    public $timestamps = false;

}
