<?php
namespace App\Repositories\Interfaces;

Interface ProductsRepositoryInterface
{
    public function allProducts();
    public function storeProducts($data);
    public function findProducts($id);
    public function updateProducts($data, $id);
    public function destroyProducts($id);
    public function uploadFile($data);
    public function update_stock_balance($data);
}
