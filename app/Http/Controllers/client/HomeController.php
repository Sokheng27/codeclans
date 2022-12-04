<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function index(){

        $products = $this->ProductsRepository->allProducts();
        $categories = $this->CategoriesRepository->allCategories();
        return view('frontend.interface.home', compact('products', 'categories'));
    }

    public function product_detail($id){

        $product = $this->ProductsRepository->findProducts($id);
        return view('frontend.interface.productdetail', compact('product'));
    }
}
