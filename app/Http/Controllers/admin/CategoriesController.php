<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    private $CategoriesRepository;

    public function __construct(CategoriesRepositoryInterface $CategoriesRepository)
    {
        $this->CategoriesRepository = $CategoriesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  $this->CategoriesRepository->allCategories();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->CategoriesRepository->storeCategories($data);

        return redirect()->route('categories.index')->with('message', 'Categories Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->CategoriesRepository->findCategories($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->CategoriesRepository->updateCategories($request->all(), $id);

        return redirect()->route('categories.index')->with('message', 'Categories Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $Categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->CategoriesRepository->destroyCategories($id);

        return redirect()->route('categories.index')->with('status', 'Categories Delete Successfully');
    }
}
