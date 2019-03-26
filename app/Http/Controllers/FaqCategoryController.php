<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaqCategoryRequest;
use App\Http\Requests\UpdateFaqCategoryRequest;
use App\Repositories\FaqCategoryRepository;
use App\Repositories\FaqRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class FaqCategoryController extends AppBaseController
{
    /** @var  FaqCategoryRepository */
    private $faqCategoryRepository;
    private $faqRespository;

    public function __construct(FaqCategoryRepository $faqCategoryRepo, FaqRepository $faqRepo)
    {
        $this->faqCategoryRepository = $faqCategoryRepo;
        $this->faqRepository = $faqRepo;
    }

    /**
     * Display a listing of the FaqCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->faqCategoryRepository->pushCriteria(new RequestCriteria($request));
        $faqCategories = $this->faqCategoryRepository->all();

        return view('faq_categories.index')
            ->with('faqCategories', $faqCategories);
    }

    public function frontFaqs(Request $request)
    {
        $this->faqCategoryRepository->pushCriteria(new RequestCriteria($request));
        $faqCategories = $this->faqCategoryRepository->all();    
        foreach ($faqCategories as  $key=>$value) {
            $faqCategories[$key]['faqs'] = $value->faqs;
        }
        return view('faqs')
            ->with('faqCategories', $faqCategories);
    }

    /**
     * Show the form for creating a new FaqCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('faq_categories.create');
    }

    /**
     * Store a newly created FaqCategory in storage.
     *
     * @param CreateFaqCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateFaqCategoryRequest $request)
    {
        $input = $request->all();

        $faqCategory = $this->faqCategoryRepository->create($input);

        Flash::success('Faq Category saved successfully.');

        return redirect(route('faqCategories.index'));
    }

    /**
     * Display the specified FaqCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $faqCategory = $this->faqCategoryRepository->findWithoutFail($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('faqCategories.index'));
        }

        return view('faq_categories.show')->with('faqCategory', $faqCategory);
    }

    /**
     * Show the form for editing the specified FaqCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $faqCategory = $this->faqCategoryRepository->findWithoutFail($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('faqCategories.index'));
        }

        return view('faq_categories.edit')->with('faqCategory', $faqCategory);
    }

    /**
     * Update the specified FaqCategory in storage.
     *
     * @param  int              $id
     * @param UpdateFaqCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFaqCategoryRequest $request)
    {
        $faqCategory = $this->faqCategoryRepository->findWithoutFail($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('faqCategories.index'));
        }

        $faqCategory = $this->faqCategoryRepository->update($request->all(), $id);

        Flash::success('Faq Category updated successfully.');

        return redirect(route('faqCategories.index'));
    }

    /**
     * Remove the specified FaqCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $faqCategory = $this->faqCategoryRepository->findWithoutFail($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('faqCategories.index'));
        }    
        foreach ($faqCategory->faqs as $value) {
            $this->faqRepository->delete($value->id);
        }
        $this->faqCategoryRepository->delete($id);

        Flash::success('Faq Category deleted successfully.');

        return redirect(route('faqCategories.index'));
    }
}
