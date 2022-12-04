@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Category')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
          <div class="row">
                <div class="col">
                    <h4 class="card-title ">Category</h4>
                </div>
                <div class="col-sm-1" >
                    <a href="{{ route('categories.create') }}">
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
                <th class="th-sm">Action</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
                @foreach($categories as $index => $category)
                    <tr>
                        <th scope="row" width="10%">{{ $index }}</th>
                        <td width="60%">{{ $category->name }}</td>
                        <td width="30%">
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-info"><span class="glyphicon glyphicon-info"></span> edit</a>
                            <a href="categories/delete/{{$category->id}}" class="btn btn-danger delete-confirm"><span class="glyphicon glyphicon-trash"></span> delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!--Table body-->
            </table>
            <!--Table-->
            </div>
          </div>
          <div class="d-flex justify-content-center">
              {!! $categories->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
