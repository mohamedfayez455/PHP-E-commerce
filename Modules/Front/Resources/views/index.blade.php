@extends('front::layouts.master')

@section('content')

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                              <img src="{{asset('uploads/products/'.$product->photo)}}" style="width: 350px; height: 230px;">
                            </div>
                            <div class="shop-body">
                                <h3>{{$product->name}}</h3>
                                <a href="{{route('product' ,$product->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End SECTION -->



    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                    </div>
                </div>

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach($products2 as $product)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset('uploads/products/'.$product->photo)}}" style="width: 255px; height: 350px; margin: 5px;">
                                                <div class="product-label">

                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category : {{$product->department->name}}</p>
                                                <h3 class="product-name"><a href="{{route('product' ,$product->id)}}">{{$product->name}}</a></h3>
                                                <h4 class="product-price"> ${{$product->price}} <del class="product-old-price">{{$product->price}}</del></h4>


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
                                @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- End SECTION -->




    <!-- HOT DEAL SECTION -->
{{--    <div id="hot-deal" class="section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="hot-deal">--}}
{{--                        <ul class="hot-deal-countdown">--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--                                    <h3>02</h3>--}}
{{--                                    <span>Days</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--                                    <h3>10</h3>--}}
{{--                                    <span>Hours</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--                                    <h3>34</h3>--}}
{{--                                    <span>Mins</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--                                    <h3>60</h3>--}}
{{--                                    <span>Secs</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <h2 class="text-uppercase">hot deal this week</h2>--}}
{{--                        <p>New Collection Up to 50% OFF</p>--}}
{{--                        <a class="primary-btn cta-btn" href="#">Shop now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}






    <!-- SECTION -->
    <!-- End HOT DEAL SECTION -->



    <!--  SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">

                                    @foreach($top_product as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{asset('uploads/products/'.$product->photo)}}"  style="width: 255px; height: 350px; margin: 5px;" alt="">
                                            <div class="product-label">
{{--                                                <span class="sale">-30%</span>--}}
{{--                                                <span class="new">NEW</span>--}}
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category: {{$product->department->name}}</p>
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
                                    @endforeach


                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End SECTION -->


    <br><br>


    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                @foreach($departmentss as  $department)
                @php
                    $top_department = Modules\Products\Entities\Product::where('department_id' , $department->id )
                    ->withCount('orders')->orderBy('orders_count' , 'asc')->limit(9)->get();
                @endphp

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title" style="color: red">Top selling: {{$department->name}} </h4>
                    </div>

                    <div class="products-widget-slick" data-nav="">
                        <div>

                            @foreach($top_department as  $top_dep)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/'.$top_dep->photo)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category: {{$top_dep->department->name}}</p>
                                    <h3 class="product-name"><a href="{{route('product' ,$product->id)}}">{{$top_dep->name}}</a></h3>
                                    <h4 class="product-price">${{$top_dep->price}} <del class="product-old-price">${{$top_dep->price}}</del></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End SECTION -->


@endsection
