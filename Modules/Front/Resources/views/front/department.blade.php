@extends('front::layouts.master')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">

                <!-- /ASIDE -->
                <div id="aside" class="col-md-3">

                    <!-- aside price -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside price -->


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

                    <!-- /sort -->
{{--                    <div class="store-filter clearfix">--}}

{{--                        <div class="store-sort">--}}
{{--                            <label>--}}
{{--                                Sort By:--}}
{{--                                <select class="input-select">--}}
{{--                                    <option value="0">Popular</option>--}}
{{--                                    <option value="1">Position</option>--}}
{{--                                </select>--}}
{{--                            </label>--}}

{{--                            <label>--}}
{{--                                Show:--}}
{{--                                <select class="input-select">--}}
{{--                                    <option value="0">20</option>--}}
{{--                                    <option value="1">50</option>--}}
{{--                                </select>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <ul class="store-grid">--}}
{{--                            <li class="active"><i class="fa fa-th"></i></li>--}}
{{--                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <!-- /sort -->

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
