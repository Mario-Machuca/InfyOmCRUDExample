<?php

namespace App\Repositories;

use App\Models\Notas;
use App\Repositories\BaseRepository;

/**
 * Class NotasRepository
 * @package App\Repositories
 * @version May 2, 2020, 12:55 am UTC
*/

class NotasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'contenido'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Notas::class;
    }
}
