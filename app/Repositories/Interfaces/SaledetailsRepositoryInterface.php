<?php
namespace App\Repositories\Interfaces;

Interface SaledetailsRepositoryInterface
{
    public function allSaledetails();
    public function storeSaledetails($data);
    public function findSaledetails($id);
    public function updateSaledetails($data, $id);
    public function destroySaledetails($id);
}