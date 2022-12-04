<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('Material Dashboard Laravel - Free Frontend Preset for Laravel') }}</title>
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body>
        <!-- Form Buy Product Start -->
        <div class="container-fluid py-5">
            <form method="post" action="{{ route('sale.store', ['product_id' => $product->id]) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row px-xl-5">
                    <div class="col-lg-5 pb-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{ URL::to('/') }}/upload/{{$product->image}}" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                        <h3 class="font-weight-semi-bold mb-4">{{$product->unit_price}}</h3>
                        <input class="form-control" name="unit_price" type="number" value="{{$product->unit_price}}" required hidden/>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group w-auto justify-content align-items-center">
                                <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 lh-0" data-field="qty">
                                <input type="number" step="1" max="10" value="1" name="qty" class="qty-field border-0 text-center w-25">
                                <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm lh-0" data-field="qty">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Buy</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Form Buy Product End -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <!-- script incrementer QTY -->
        <script>
            function incrementValue(e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                if (!isNaN(currentVal)) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(0);
                }
            }

            function decrementValue(e) {
                e.preventDefault();
                var fieldName = $(e.target).data('field');
                var parent = $(e.target).closest('div');
                var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

                if (!isNaN(currentVal) && currentVal > 0) {
                    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    parent.find('input[name=' + fieldName + ']').val(0);
                }
            }

            $('.input-group').on('click', '.button-plus', function(e) {
                incrementValue(e);
            });

            $('.input-group').on('click', '.button-minus', function(e) {
                decrementValue(e);
            });
        </script>
    </body>

</html>
