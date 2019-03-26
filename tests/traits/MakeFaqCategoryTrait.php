<?php

use Faker\Factory as Faker;
use App\Models\FaqCategory;
use App\Repositories\FaqCategoryRepository;

trait MakeFaqCategoryTrait
{
    /**
     * Create fake instance of FaqCategory and save it in database
     *
     * @param array $faqCategoryFields
     * @return FaqCategory
     */
    public function makeFaqCategory($faqCategoryFields = [])
    {
        /** @var FaqCategoryRepository $faqCategoryRepo */
        $faqCategoryRepo = App::make(FaqCategoryRepository::class);
        $theme = $this->fakeFaqCategoryData($faqCategoryFields);
        return $faqCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of FaqCategory
     *
     * @param array $faqCategoryFields
     * @return FaqCategory
     */
    public function fakeFaqCategory($faqCategoryFields = [])
    {
        return new FaqCategory($this->fakeFaqCategoryData($faqCategoryFields));
    }

    /**
     * Get fake data of FaqCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFaqCategoryData($faqCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $faqCategoryFields);
    }
}
