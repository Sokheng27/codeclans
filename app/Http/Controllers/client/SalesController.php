<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Repositories\Interfaces\SaledetailsRepositoryInterface;
use App\Repositories\Interfaces\SalesRepositoryInterface;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    private $SalesRepository;
    private $ProductsRepository;
    private $SaledetailsRepository;

    public function __construct
    (
        SalesRepositoryInterface $SalesRepository,
        ProductsRepositoryInterface $ProductsRepository,
        SaledetailsRepositoryInterface $SaledetailsRepository
    )

    {
        $this->SalesRepository = $SalesRepository;
        $this->ProductsRepository = $ProductsRepository;
        $this->SaledetailsRepository = $SaledetailsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'product_id' => 'required',
            'qty' => 'required',
            'unit_price' => 'required'
        ]);
        $this->SalesRepository->storeSales($data);
        return redirect()->route('frontend.home')->with('message', 'Buy Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
