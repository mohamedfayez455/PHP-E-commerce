@extends('front::layouts.master')

@section('content')

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">


                <!-- /ASIDE -->
                <div id="aside" class="col-md-3">

                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">

                        @foreach($departments as $department  )
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-1">
                                <label for="category-1">
                                    <span></span>
                                    {{$department->name}}
{{--                                    <small>(120)</small>--}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                    </div>


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


                    <!-- aside Brand -->
                    {{--                    <div class="aside">--}}
{{--                        <h3 class="aside-title">Brand</h3>--}}
{{--                        <div class="checkbox-filter">--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="brand-1">--}}
{{--                                <label for="brand-1">--}}
{{--                                    <span></span>--}}
{{--                                    SAMSUNG--}}
{{--                                    <small>(578)</small>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="brand-2">--}}
{{--                                <label for="brand-2">--}}
{{--                                    <span></span>--}}
{{--                                    LG--}}
{{--                                    <small>(125)</small>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="brand-3">--}}
{{--                                <label for="brand-3">--}}
{{--                                    <span></span>--}}
{{--                                    SONY--}}
{{--                                    <small>(755)</small>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="brand-4">--}}
{{--                                <label for="brand-4">--}}
{{--                                    <span></span>--}}
{{--                                    SAMSUNG--}}
{{--                                    <small>(578)</small>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="brand-5">--}}
{{--                                <label for="brand-5">--}}
{{--                                    <span></span>--}}
{{--                                    LG--}}
{{--                                    <small>(125)</small>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="input-checkbox">--}}
{{--                                <input type="checkbox" id="brand-6">--}}
{{--                                <label for="brand-6">--}}
{{--                                    <span></span>--}}
{{--                                    SONY--}}
{{--                                    <small>(755)</small>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /aside Brand -->
                    <!-- aside Brand -->


                    <!-- aside topsell -->
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
                    <!-- /aside topsell -->

                </div>
                <!-- /ASIDE -->





                <!-- STORE -->
                <div id="store" class="col-md-9">

                    <!-- store top filter -->
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
                    <!-- /store top filter -->



                    <!-- store products -->
                    <div class="row">
                        @foreach($products as  $product)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/'.$product->photo)}} " style="height: 300px; padding: 5px;" alt="">
                                    <div class="product-label">
{{--                                        <span class="sale">-30%</span>--}}
{{--                                        <span class="new">NEW</span>--}}
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

                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 6-{{$products->count()}} products</span>
                        {{$products->links()}}
                    </div>


            </div>


            </div>
        </div>
    </div>
    <!-- /SECTION -->






@endsection
