<?php

namespace App\Repositories;

use App\Models\Faq;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FaqRepository
 * @package App\Repositories
 * @version May 23, 2018, 6:05 pm UTC
 *
 * @method Faq findWithoutFail($id, $columns = ['*'])
 * @method Faq find($id, $columns = ['*'])
 * @method Faq first($columns = ['*'])
*/
class FaqRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question',
        'answer',
        'faqcategory_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Faq::class;
    }
    
    public function getFaqCategory($id)
    {
        return Faq::find($id)->category;
    }
}
