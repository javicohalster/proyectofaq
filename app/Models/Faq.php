<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faq
 * @package App\Models
 * @version May 23, 2018, 6:05 pm UTC
 *
 * @property string question
 * @property string answer
 * @property integer faqcategory_id
 */
class Faq extends Model
{
    use SoftDeletes;

    public $table = 'faqs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'question',
        'answer',
        'faqcategory_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string',
        'answer' => 'string',
        'faqcategory_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question' => 'required|min:3',
        'answer' => 'required|min:3',
        'faqcategory_id' => 'required'
    ];

    public function category(){
        return $this->belongsTo('App\Models\FaqCategory', 'faqcategory_id');
    }

    
}
