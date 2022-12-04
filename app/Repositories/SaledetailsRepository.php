<?php

namespace App\Repositories;

use App\Models\Saledetails;
use App\Repositories\Interfaces\SaledetailsRepositoryInterface;

class SaledetailsRepository implements SaledetailsRepositoryInterface
{
    public function __construct()
    {
        //
    }

    public function allSaledetails()
    {
        // TODO: Implement allSaledetails() method.
        return Saledetails::latest()->paginate(10);
    }

    public function storeSaledetails($data)
    {
        // TODO: Implement storeSaledetails() method.
        return Saledetails::create($data);
    }

    public function findSaledetails($id)
    {
        // TODO: Implement findSaledetails() method.
        return Saledetails::find($id);
    }

    public function updateSaledetails($data, $id)
    {
        // TODO: Implement updateSaledetails() method.
        $sale = Saledetails::where('id', $id)->first();

        $sale->sale_id = $data['sale_id'];
        $sale->product_id  = $data['product_id'];
        $sale->qty  = $data['qty'];

        $sale->save();
    }

    public function destroySaledetails($id)
    {
        // TODO: Implement destroySaledetails() method.
        $sale = Saledetails::find($id);
        $sale->delete();

    }
}
