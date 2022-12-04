@extends('layouts.app', ['activePage' => 'Product', 'titlePage' => __('Create Product')])

@section('content')
  <style>
    
    .file-upload {
      background-color: #ffffff;
      width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .file-upload-btn {
      width: 100%;
      margin: 0;
      color: #fff;
      background: #9c27b0;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #9c27b0;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
    }

    .file-upload-btn:hover {
      background: #9c27b0;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .file-upload-btn:active {
      border: 0;
      transition: all .2s ease;
    }

    .file-upload-content {
      display: none;
      text-align: center;
    }

    .file-upload-input {
      position: absolute;
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      outline: none;
      opacity: 0;
      cursor: pointer;
    }

    .image-upload-wrap {
      margin-top: 20px;
      border: 4px dashed #9c27b0;
      position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
      background-color: #9c27b0;
      border: 4px dashed #ffffff;
    }

    .image-title-wrap {
      padding: 0 15px 15px 15px;
      color: #222;
    }

    .drag-text {
      text-align: center;
    }

    .drag-text h3 {
      font-weight: 100;
      text-transform: uppercase;
      color: #9c27b0;
      padding: 60px 0;
    }

    .file-upload-image {
      max-height: 200px;
      max-width: 200px;
      margin: auto;
      padding: 20px;
    }

    .remove-image {
      width: 200px;
      margin: 0;
      color: #fff;
      background: #9c27b0;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #9c27b0;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
    }

    .remove-image:hover {
      background: #9c27b0;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .remove-image:active {
      border: 0;
      transition: all .2s ease;
    }
  </style>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('products.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Product') }}</h4>              </div>
              <div class="card-body ">
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-name">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="name" placeholder="{{ __('Input Name') }}" value="" required />
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-category">{{ __('Category') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control" name="category_id" required>
                        @foreach($categories as $index => $category)
                          <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                      </select> 
                    </div>
                    
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-unit_price">{{ __('Unit Price') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('unit_price') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('unit_price') ? ' is-invalid' : '' }}" name="unit_price" id="input-unit_price" type="number" placeholder="{{ __('Input Unit Price') }}" value="" required />
                      @if ($errors->has('unit_price'))
                        <span id="unit_price-error" class="error text-danger" for="input-unit_price">{{ $errors->first('unit_price') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-stock_balance">{{ __('Stock Balance') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('stock_balance') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('stock_balance') ? ' is-invalid' : '' }}" name="stock_balance" id="input-stock_balance" type="number" placeholder="{{ __('Input Stock Balance') }}" value="" required />
                      @if ($errors->has('stock_balance'))
                        <span id="stock_balance-error" class="error text-danger" for="input-stock_balance">{{ $errors->first('stock_balance') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="file-upload">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                    <div class="image-upload-wrap">
                      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image"/>
                      <div class="drag-text">
                        <h3>Drag and drop a file or select add Image</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

