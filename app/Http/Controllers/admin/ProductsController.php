<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $ProductsRepository;
    private $CategoriesRepository;

    public function __construct
        (
        ProductsRepositoryInterface $ProductsRepository,
        CategoriesRepositoryInterface $CategoriesRepository
        )
    {
        $this->ProductsRepository = $ProductsRepository;
        $this->CategoriesRepository = $CategoriesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  $this->ProductsRepository->allProducts();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  $this->CategoriesRepository->getAll();

        return view('admin.products.create', compact('categories'));
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
            'category_id' => 'required',
            'unit_price' => 'required',
            'stock_balance' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

//        $this->uploadFile($request);
        $this->ProductsRepository->storeProducts($data);
        return redirect()->route('products.index')->with('message', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->ProductsRepository->findProducts($id);
        $categories =  $this->CategoriesRepository->getAll();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'unit_price' => 'required',
            'stock_balance' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->ProductsRepository->updateProducts($data, $id);
        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ProductsRepository->destroyProducts($id);
        return redirect()->route('products.index')->with('message', 'Product Daleted Successfully');
    }
}
