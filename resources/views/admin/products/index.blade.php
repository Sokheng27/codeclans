@extends('layouts.app', ['activePage' => 'product', 'titlePage' => __('Product')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
          <div class="row">
                <div class="col">
                    <h4 class="card-title ">Product</h4>
                </div>
                <div class="col-sm-1" >
                    <a href="{{ route('products.create') }}">
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
                <th class="th-sm-8">Name</th>
                <th class="th-sm-8">Category</th>
                <th class="th-sm-8">Price</th>
                <th class="th-sm-8">Stock</th>
                <th class="th-sm">Action</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
                @foreach($products as $index => $product)
                    <tr>
                        <th scope="row" width="5%">{{ $index }}</th>
                        <td width="20%">{{ $product->name }}</td>
                        <td width="20%">{{ $product->category->name ?? "This Category has been Delete" }}</td>
                        <td width="10%">{{ $product->unit_price }}</td>
                        <td width="10%">{{ $product->stock_balance }}</td>
                        <td width="20%">
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-info"><span class="glyphicon glyphicon-info"></span> edit</a>
                            <a href="/products/delete/{{$product->id}}" class="btn btn-danger delete-confirm"><span class="glyphicon glyphicon-danger"></span> Delete</a>                        
                          </td>
                    </tr>
                @endforeach
            </tbody>
            <!--Table body-->

            </table>
            <!--Table-->

            </div>
            <div class="d-flex justify-content-center">
              {!! $products->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection