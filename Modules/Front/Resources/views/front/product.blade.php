@extends('front::layouts.master')

@section('content')

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-5 col-md-push-2">

                    <div id="product-main-img">
                            <div class="product-preview">
                                <img src="{{asset('uploads/products/'.$products->photo)}}" alt="">
                            </div>
                    </div>
                </div>


                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @foreach($product_photo as $photo)
                            <div class="product-preview">
                                <img src="{{asset('uploads/products/album/'.$photo->photos)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>



                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{$products->name}}</h2>

                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
{{--                            <a class="review-link" href="#">10 Review(s) | Add your review</a>--}}
{{--                            <a class="review-link" href="#">10 Review(s) | Add your review</a>--}}
                        </div>

                        <div>
                            <h1 style="padding-top: 10px;" class="product-price">Price : ${{$products->price}}<del class="product-old-price">   ${{$products->price}}</del></h1>
                        </div>

                        <div>
                            <p class="product-price">State : {{$products->state}}</p>
                        </div>

                        <div>
                            <p class="product-price">Category : {{$products->department->name}}</p>
                        </div>

                        <div>
                            <p> About Product:  {{$products->desc}}</p>
                        </div>

                        <div class="product-options">
                            <label>
                                Size
                                <select class="input-select">
                                    <option value="0">{{$products->size}}</option>
                                </select>
                            </label>
                        </div>


                        <div class="add-to-cart">
                            <form action="{{route('cart.store')}}" method="post">
                                {{csrf_field()}}
                                Qty
                                    <input type="number" name="quantity" value="">
                                <input type="hidden" name="id" value="{{$products->id}}">
                                <input type="hidden" name="name" value="{{$products->name}}">
                                <input type="hidden" name="price" value="{{$products->price}}">
                                <button  class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </form>
                        </div>



                        <ul class="product-btns">
                            <li>
                                <form action="{{ route('cart.switchToSaveForLater', $products->id) }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    <button  class="add-to-wishlist btn btn-info"><span class="tooltipp">add to wishlist<wishlist></wishlist></span></button>
                                </form>
                            </li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->



                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews </a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
                                        <p>{{$products->desc}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
                                        <p>{{$products->desc}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
{{--                                        <div id="rating">--}}
{{--                                            <div class="rating-avg">--}}
{{--                                                <span>4.5</span>--}}
{{--                                                <span>{{$reviews->count()}}</span>--}}
{{--                                                <div class="rating-stars">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star-o"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <ul class="rating">--}}
{{--                                                <li>--}}
{{--                                                    <div class="rating-stars">--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rating-progress">--}}
{{--                                                        <div style="width: 80%;"></div>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="sum">3</span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="rating-stars">--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rating-progress">--}}
{{--                                                        <div style="width: 60%;"></div>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="sum">2</span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="rating-stars">--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rating-progress">--}}
{{--                                                        <div></div>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="sum">0</span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="rating-stars">--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rating-progress">--}}
{{--                                                        <div></div>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="sum">0</span>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="rating-stars">--}}
{{--                                                        <i class="fa fa-star"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                        <i class="fa fa-star-o"></i>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="rating-progress">--}}
{{--                                                        <div></div>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="sum">0</span>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-4">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                @foreach($reviews as $review)
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{$review->user->name}}</h5>
                                                        <p class="date">{{$review->created_at}}</p>
                                                        <div class="review-rating">


                                                            <i class= "{{$review->rate >= 1 ? 'fa fa-star' : 'fa fa-star-o' }}"></i>
                                                            <i class= "{{$review->rate >= 2 ? 'fa fa-star' : 'fa fa-star-o' }}"></i>
                                                            <i class= "{{$review->rate >= 3 ? 'fa fa-star' : 'fa fa-star-o' }}"></i>
                                                            <i class= "{{$review->rate >= 4 ? 'fa fa-star' : 'fa fa-star-o' }}"></i>
                                                            <i class= "{{$review->rate >= 5 ? 'fa fa-star' : 'fa fa-star-o' }}"></i>


                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                    <p>{{$review->review}}</p>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>


                                            <div class="store-filter clearfix">
                                                {{$reviews->links()}}
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">



                                                <form action="{{route('reviews.store')}}" method="post" class="review-form">
                                                    {{ csrf_field() }}
                                                    {{ method_field('post') }}

                                                    <input  type="hidden" name="user_id"  value="{{auth('user')->id()}}" >
                                                    <input  type="hidden" name="product_id"  value="{{$products->id}}" >
                                                        <textarea class="input" name="review" placeholder="Your Review"></textarea>

                                                        <div class="input-rating">
                                                            <span>Your Rating: </span>
                                                            <div class="stars">
                                                                <input id="star5" name="rate" value="5" type="radio"><label for="star5"></label>
                                                                <input id="star4" name="rate" value="4" type="radio"><label for="star4"></label>
                                                                <input id="star3" name="rate" value="3" type="radio"><label for="star3"></label>
                                                                <input id="star2" name="rate" value="2" type="radio"><label for="star2"></label>
                                                                <input id="star1" name="rate" value="1" type="radio"><label for="star1"></label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="primary-btn" > Add review </button>
                                                </form><!-- end of form -->






                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /SECTION -->



    <!-- Section -->
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                @foreach($product as  $pro)
                    <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{asset('uploads/products/'.$pro->photo)}}"  style="width: 262px; height: 360px; padding: 5px; " alt="">
                            <div class="product-label">
{{--                                <span class="sale">-30%</span>--}}
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category"> Department :  {{$pro->department->name}}</p>
                            <h3 class="product-name"><a href="#">{{$pro->name}}</a></h3>
                            <h4 class="product-price">${{$pro->price}} <del class="product-old-price">${{$pro->price}}</del></h4>
                            <div class="product-rating">
                            </div>

                            <div class="product-btns">
                                <form action="{{ route('cart.switchToSaveForLater', $products->id) }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    <button  class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"></span></button>
                                </form>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                <a class="quick-view tooltipp" href="{{route('product' ,$products->id)}}"> <i class="fa fa-eye"></i></a>
                            </div>


                        </div>

                        <div class="add-to-cart" >
                            <form action="{{route('cart.store')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$products->id}}">
                                <input type="hidden" name="name" value="{{$products->name}}">
                                <input type="hidden" name="price" value="{{$products->price}}">
                                <button  class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </form>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>




@endsection
