<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class todos
 * @package App\Models
 * @version January 26, 2017, 10:08 pm UTC
 */
class todos extends Model
{
    use SoftDeletes;

    public $table = 'todos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'alert'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required min:3'
    ];

    
}
