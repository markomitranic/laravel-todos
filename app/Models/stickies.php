<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class stickies
 * @package App\Models
 * @version January 26, 2017, 9:51 pm UTC
 */
class stickies extends Model
{
    use SoftDeletes;

    public $table = 'stickies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
