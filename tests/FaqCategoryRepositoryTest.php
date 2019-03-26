<?php

use App\Models\FaqCategory;
use App\Repositories\FaqCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FaqCategoryRepositoryTest extends TestCase
{
    use MakeFaqCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FaqCategoryRepository
     */
    protected $faqCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->faqCategoryRepo = App::make(FaqCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFaqCategory()
    {
        $faqCategory = $this->fakeFaqCategoryData();
        $createdFaqCategory = $this->faqCategoryRepo->create($faqCategory);
        $createdFaqCategory = $createdFaqCategory->toArray();
        $this->assertArrayHasKey('id', $createdFaqCategory);
        $this->assertNotNull($createdFaqCategory['id'], 'Created FaqCategory must have id specified');
        $this->assertNotNull(FaqCategory::find($createdFaqCategory['id']), 'FaqCategory with given id must be in DB');
        $this->assertModelData($faqCategory, $createdFaqCategory);
    }

    /**
     * @test read
     */
    public function testReadFaqCategory()
    {
        $faqCategory = $this->makeFaqCategory();
        $dbFaqCategory = $this->faqCategoryRepo->find($faqCategory->id);
        $dbFaqCategory = $dbFaqCategory->toArray();
        $this->assertModelData($faqCategory->toArray(), $dbFaqCategory);
    }

    /**
     * @test update
     */
    public function testUpdateFaqCategory()
    {
        $faqCategory = $this->makeFaqCategory();
        $fakeFaqCategory = $this->fakeFaqCategoryData();
        $updatedFaqCategory = $this->faqCategoryRepo->update($fakeFaqCategory, $faqCategory->id);
        $this->assertModelData($fakeFaqCategory, $updatedFaqCategory->toArray());
        $dbFaqCategory = $this->faqCategoryRepo->find($faqCategory->id);
        $this->assertModelData($fakeFaqCategory, $dbFaqCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFaqCategory()
    {
        $faqCategory = $this->makeFaqCategory();
        $resp = $this->faqCategoryRepo->delete($faqCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(FaqCategory::find($faqCategory->id), 'FaqCategory should not exist in DB');
    }
}
