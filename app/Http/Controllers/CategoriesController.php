<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konie\Repositories\categoryRepository;
use App\Category;

class CategoriesController extends Controller
{
    protected $_categoryRepository;

    public function __construct(
        categoryRepository $categoryRepository
    )
    {
        $this->middleware('auth',['except' => ['listRelatedOffers']]);
        $this->_categoryRepository = $categoryRepository;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->_categoryRepository->getAllCategories();
        return view('backend.category.listCategories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->_categoryRepository->addCategory($request);
            return back()->with(['success' => 'Zapisano kategorię']);
        } catch (\Exception $e) {
            return back()->with(['error' =>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('backend.Category.editCategory', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        try {
             $this->_categoryRepository->updateCategory($request, $category_id);
            return back()->with(['success' => 'zaktualizowano kategorię']);
        } catch (\Exception $e) {
            return back()->with(['error' =>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        try {
            $this->_categoryRepository->destroyCategory($category_id);
            return back();
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function listRelatedOffers($category_id)
    {
        $offers = $this->_categoryRepository->getOffersRelatedToCategory($category_id);
        $categories = $this->_categoryRepository->getAllCategories();
        return view('frontend.showOffers', ['offers' => $offers, 'categories' => $categories]);
    }
}
