<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estudiante';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ci', 'nombre', 'apellido'];

    public $timestamps = false;

}
