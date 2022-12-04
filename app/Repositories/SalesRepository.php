<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Saledetails;
use App\Models\Sales;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Repositories\Interfaces\SalesRepositoryInterface;

class SalesRepository implements SalesRepositoryInterface
{
    private $ProductsRepository;


    public function __construct(
        ProductsRepositoryInterface $ProductsRepository
        )
    {
        $this->ProductsRepository = $ProductsRepository;
    }

    public function allSales()
    {
        // TODO: Implement allSales() method.
        return Sales::latest()->paginate(10);
    }

    public function storeSales($data)
    {
        // TODO: Implement storeSales() method.
        $data['invoice_number'] = $this->invoiceNumber();
        $data['total_price'] = $data['unit_price'] * $data['qty'];

        $sale = Sales::create($data);

        $data['sale_id'] = $sale->id;
        $this->ProductsRepository->update_stock_balance($data);
        return Saledetails::create($data);
    }

    public function findSales($id)
    {
        // TODO: Implement findSales() method.
        return Sales::find($id);
    }

    public function updateSales($data, $id)
    {
        // TODO: Implement updateSales() method.
        $sale = Sales::where('id', $id)->first();

        $sale->invoice_number = $data['invoice_number'];
        $sale->total_price  = $data['total_price '];

        $sale->save();
    }

    public function destroySales($id)
    {
        // TODO: Implement destroySales() method.
        $sale = Sales::find($id);
        $sale->delete();

    }

    function invoiceNumber()
    {
        $latest = Sales::latest()->first();

        if (! $latest) {
            return 'No0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);

        return 'No' . sprintf('%04d', $string+1);
    }
}
