<?php

namespace App\Repositories;

use App\Models\todos;
use InfyOm\Generator\Common\BaseRepository;

class todosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'alert'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return todos::class;
    }
}
