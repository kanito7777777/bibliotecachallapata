<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'material';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo', 'titulo', 'autor', 'descripcion', 'tipo', 'portada', 'estado'];

    public $timestamps = false;

}
