<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notas
 * @package App\Models
 * @version May 2, 2020, 12:55 am UTC
 *
 * @property string $titulo
 * @property string $contenido
 */
class Notas extends Model
{
    use SoftDeletes;

    public $table = 'notas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'titulo',
        'contenido'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'contenido' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required|min:3|max:255',
        'contenido' => 'required|min:5|max:255'
    ];

    
}
