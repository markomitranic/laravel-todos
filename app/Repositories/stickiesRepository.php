<?php

namespace App\Repositories;

use App\Models\stickies;
use InfyOm\Generator\Common\BaseRepository;

class stickiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return stickies::class;
    }
}
