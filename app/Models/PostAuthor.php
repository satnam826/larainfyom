<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PostAuthor
 * @package App\Models
 * @version January 21, 2019, 8:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection comments
 * @property integer author_id
 * @property integer post_id
 */
class PostAuthor extends Model
{
    use SoftDeletes;

    public $table = 'post_authors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'author_id',
        'post_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'author_id' => 'integer',
        'post_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
