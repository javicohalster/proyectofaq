<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FaqCategoryApiTest extends TestCase
{
    use MakeFaqCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFaqCategory()
    {
        $faqCategory = $this->fakeFaqCategoryData();
        $this->json('POST', '/api/v1/faqCategories', $faqCategory);

        $this->assertApiResponse($faqCategory);
    }

    /**
     * @test
     */
    public function testReadFaqCategory()
    {
        $faqCategory = $this->makeFaqCategory();
        $this->json('GET', '/api/v1/faqCategories/'.$faqCategory->id);

        $this->assertApiResponse($faqCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFaqCategory()
    {
        $faqCategory = $this->makeFaqCategory();
        $editedFaqCategory = $this->fakeFaqCategoryData();

        $this->json('PUT', '/api/v1/faqCategories/'.$faqCategory->id, $editedFaqCategory);

        $this->assertApiResponse($editedFaqCategory);
    }

    /**
     * @test
     */
    public function testDeleteFaqCategory()
    {
        $faqCategory = $this->makeFaqCategory();
        $this->json('DELETE', '/api/v1/faqCategories/'.$faqCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/faqCategories/'.$faqCategory->id);

        $this->assertResponseStatus(404);
    }
}
