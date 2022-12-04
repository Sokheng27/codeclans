<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function allProducts()
    {
        // TODO: Implement all() method.
        return Products::latest()->paginate(10);

    }

    public function storeProducts($data)
    {

        $image = $this->uploadFile($data);
        $data['image'] = $image;
        return Products::create($data);
    }

    public function findProducts($id)
    {
        // TODO: Implement find() method.
        return Products::find($id);
    }

    public function updateProducts($data, $id)
    {
        // TODO: Implement update() method.

        $product = Products::where('id', $id)->first();

        $product->name = $data['name'];
        $product->category_id = $data['category_id'];
        $product->unit_price = $data['unit_price'];
        $product->stock_balance = $data['stock_balance'];
        if($product->image != null && $product->image != $data['image']){
            $image = $this->uploadFile($data);
            $product->image = $image;
        }

        $product->save();
    }

    public function destroyProducts($id)
    {
        $product = Products::find($id);
        $product->delete();
    }

    public function uploadFile($data) {

        $filename = md5(microtime()) . '.' . "png";
        $temp ='/';
        $fileContents = file_get_contents($data['image']);
        Storage::disk('public')->put($temp . $filename, $fileContents);
        return $filename;
    }

    public function update_stock_balance($data){

        $product = Products::where('id', $data['product_id'])->first();
        $product->stock_balance = $product->stock_balance - $data['qty'];;
        $product->save();
    }
}
