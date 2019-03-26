<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FaqCategory
 * @package App\Models
 * @version May 23, 2018, 2:14 pm UTC
 *
 * @property string name
 */
class FaqCategory extends Model
{
    use SoftDeletes;

    public $table = 'faq_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function faqs()
    {
        return $this->hasMany('App\Models\Faq', 'faqcategory_id', 'id');
        
    }   
}
