@extends('front::layouts.master')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">

                <!-- /ASIDE -->
                <div id="aside" class="col-md-3">


                    <!-- aside top sell  -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>

                        @foreach($top_product as $product)

                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/'.$product->photo)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category: {{$product->department->name}} </p>
                                    <h3 class="product-name"><a href="{{route('product' ,$product->id)}}">{{$product->name}}</a></h3>
                                    <h4 class="product-price">${{$product->price}} <del class="product-old-price">${{$product->price}}</del></h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- /aside top sell -->


                </div>
                <!-- /ASIDE -->


                <!-- STORE -->
                <div id="store" class="col-md-9">

                    @if (  $products->count() > 0 )


                    <div class="row">
                        @foreach($products as  $product)
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('uploads/products/'.$product->photo)}} " style="height: 300px; padding: 5px;" alt="">
                                        <div class="product-label">
                                            {{--   <span class="sale">-30%</span>--}}
                                            {{--   <span class="new">NEW</span>--}}
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category: {{$product->department->name}} </p>
                                        <h3 class="product-name"><a href="{{route('product' ,$product->id)}}">{{$product->name}}</a></h3>
                                        <h4 class="product-price">${{$product->price}} <del class="product-old-price">${{$product->price}}</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                        @include('cart::cart.save_for_later')

                                    </div>

                                    @include('cart::cart.add_to_cart')



                                </div>
                            </div>
                        @endforeach

                    </div>

                       @else

                        <div style=" border-radius: 30px; padding: 50px; width: 600px; min-height: 200px; margin: auto ; background: black">
                            <h2 style=" margin-top: 30px; text-align: center ; color: white"> no product for this search </h2>
                        </div>

                    @endif


                    <!-- store bottom filter -->
                    <div>
                        <div class="store-filter clearfix">
                            {{$products->links()}}
                        </div>

                    </div>
                </div>
                <!-- STORE -->


            </div>
        </div>
    </div>

@endsection
