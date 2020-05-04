<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Autos
 * @package App\Models
 * @version May 2, 2020, 1:08 am UTC
 *
 * @property string $Marca
 * @property string $Modelo
 * @property string $Descripcion
 */
class Autos extends Model
{
    use SoftDeletes;

    public $table = 'autos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'Marca',
        'Modelo',
        'Descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Marca' => 'string',
        'Modelo' => 'string',
        'Descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Marca' => 'required|min:5|max:255',
        'Modelo' => 'required|min:5|max:255',
        'Descripcion' => 'required'
    ];

    
}
