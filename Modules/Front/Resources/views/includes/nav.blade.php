<!-- HEADER -->
<header>


    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> 01273938259</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> mohamedfayez455@yahoo.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Quesna Menoufia </a></li>
            </ul>
            <ul class="header-links pull-right">
{{--                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>--}}
                @if (auth('user')->check())
                <li><a href="{{route('profile' , auth('user')->id())}}"><i class="fa fa-user-o"></i> My Account</a></li>
                @else
                <li><a href="{{url('/front/login')}}"><i class="fa fa-user-o"></i> login </a></li>
                <li><a href="{{route('register')}}"><i class="fa fa-user-o"></i> Register </a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->




    <!-- MAIN HEADER -->
    <div id="header">
     <div class="container">
            <div class="row">

                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{url('/front/home')}}" class="logo">
                            <img src="{{asset('assets/ecommerce/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->


                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">



                        <form action=" {{route('search')}} " method="post">
                            {{csrf_field()}}
                            <select class="input-select" style="width: 150px;">
                                <option value="0">All Categories</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id }} {{old('department_id') == $department->id ?'selected' : ''  }} ">{{$department->name}}</option>
                                @endforeach
                            </select>
                            <input class="input" placeholder="Search here" name="product"  value="{{ request()->product }}" >
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->



                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">


                        <!-- Wishlist -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">{{ Cart::instance('saveForLater')->count() }}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">

                                    @foreach(Cart::instance('saveForLater')->content() as  $item)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('uploads/products/'.$item->model->photo)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href ="{{route('product' ,$item->id)}}">{{$item->name}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$item->qty}}</span>${{$item->price}}</h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="cart-summary">
                                    <small>{{Cart::count()}} Item(s) selected</small>
{{--                                    <h5>SUBTOTAL: ${{Cart::total()}}</h5>--}}
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('cart.index')}}">View Cart</a>
                                    <a href="{{route('cart.index')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Wishlist -->




                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{ Cart::instance('default')->count() }}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">

                                    @foreach(Cart::instance('default')->content() as  $item)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('uploads/products/'.$item->model->photo)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{route('product' ,$item->id)}}">{{$item->name}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$item->qty}}</span>${{$item->price}}</h4>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <div class="cart-summary">
                                    <small>{{Cart::count()}} Item(s) selected</small>
                                    <h5>SUBTOTAL: ${{Cart::total()}}</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('cart.index')}}">View Cart</a>
                                    <a href="{{route('cart.index')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->





                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end MAIN HEADER -->



</header>
<!-- /HEADER -->








<!-- NAVIGATION -->
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav mo">
                <li class="{{ active('home' , 2)  }}"><a href="{{route('home')}}">Home</a></li>
                <li class="{{ active('cart' , 2)  }}"><a href="{{route('cart.index')}}"> Your Cart </a></li>
                <li class="{{ active('stores' , 2)  }}"><a href="{{route('store')}}">All Products</a></li>

                @foreach($departments as $department)
                    <li class="{{active($department->id , 3)}}"><a href="{{ route('department' , $department->id)  }}">{{$department->name}}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
</nav>
<!-- NAVIGATION -->


