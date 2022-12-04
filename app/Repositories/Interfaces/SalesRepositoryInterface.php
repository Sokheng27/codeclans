<?php
namespace App\Repositories\Interfaces;

Interface SalesRepositoryInterface
{
    public function allSales();
    public function storeSales($data);
    public function findSales($id);
    public function updateSales($data, $id);
    public function destroySales($id);
}
