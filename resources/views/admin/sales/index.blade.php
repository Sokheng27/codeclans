@extends('layouts.app', ['activePage' => 'sale', 'titlePage' => __('sale')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
          <div class="row">
                <div class="col">
                    <h4 class="card-title ">Sale</h4>
                </div>
                <div class="col-sm-1" >
                    <a href="{{ route('sales.create') }}">
                        <i class="bi bi-plus-square-fill" style="font-size: 40px; color: white"></i>
                    </a>
                </div>
            </div>
          </div>

          <div class="card-body">
          <div class="table-responsive">

            <!--Table-->
            <table class="table">

            <!--Table head-->
            <thead>
                <tr>
                <th>#</th>
                <th class="th-sm-8">Invoice Number</th>
                <th class="th-sm-8">Product Name</th>
                <th class="th-sm-8">Unit Price</th>
                <th class="th-sm-8">QTY</th>
                <th class="th-sm">Total</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
                @foreach($sales as $index => $sale)
                    <tr>
                        <th scope="row" width="5%">{{ $index }}</th>
                        <td width="20%">{{ $sale->invoice_number }}</td>
                        <td width="20%">{{ $sale->saleDetail->product->name ??  "This Product has been Delete" }}</td>
                        <td width="20%">{{ $sale->saleDetail->product->unit_price  ??  "This Product has been Delete" }}</td>
                        <td width="10%">{{ $sale->saleDetail->qty ??  null }}</td>
                        <td width="10%">{{ $sale->total_price }}$
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!--Table body-->

            </table>
            <!--Table-->

            </div>
            <div class="d-flex justify-content-center">
              {!! $sales->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
