<?php

namespace App\Repositories;

use App\Models\Autos;
use App\Repositories\BaseRepository;

/**
 * Class AutosRepository
 * @package App\Repositories
 * @version May 2, 2020, 1:08 am UTC
*/

class AutosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Marca',
        'Modelo',
        'Descripcion'
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
        return Autos::class;
    }
}
