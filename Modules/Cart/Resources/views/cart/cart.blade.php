@extends('front::layouts.master')

@section('content')



    <div class="aside" style="margin-left: 200px; padding: 50px;" >
        @if (Cart::count() > 0)
        <h2>{{ Cart::count() }} item(s) Moved to Cart</h2>
        <hr><br>

        @foreach(Cart::content() as  $item)
            <div class="row">

                <div class="col-sm-3">
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="{{asset('uploads/products/'.$item->model->photo)}}" alt="">

                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="{{route('product' ,$item->id)}}">{{$item->name}}</a></h3>
                            <h4 class="product-price">${{$item->price}} <del class="product-old-price">${{$item->price}} </del></h4>
                        </div>
                    </div>
                </div>




                <div class="col-sm-2">
                    Quantity = {{$item->qty}}
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>


                <div class="col-sm-3">
                    <form action="{{ route('cart.switchToSaveForLater', $item->id) }}" method="POST">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-primary">Save For Later</button>
                    </form>
                </div>


            </div>
            <br><hr>
        @endforeach
        @else
{{--            <div style="width:700px;  height: 50px; margin-left: 150px; margin-top: 50px; margin-bottom: 50px; padding: 50px; border-radius: 30px; text-align: center ; background: #d7dfe8">--}}
            <div style="width:700px;  height: 50px; margin-left: 150px; margin-top: 50px; margin-bottom: 50px; padding-bottom: 55px; padding-top: 30px; border-radius: 30px; text-align: center ; background: #d7dfe8 ">
                <h2> you have no item to Moved to Cart </h2>
            </div>

        @endif
    </div>


    @if (Cart::count()>0)

    <div class="aside" style="margin-left: 200px; padding: 50px;" >
        <div class="row">

            <div class="cart-summary" style="background: #ECF0F5 ; width: 390px; height: 220px; margin-left: 330px; margin-top: -100px; padding: 20px; border-radius: 10px; " >

                <h4 style="">{{Cart::count()}} Item(s) selected</h4><br>
                <h6>SUBTOTAL: ${{Cart::subtotal()}}</h6>
                <h6>TAX (25% ) : ${{Cart::tax()}}</h6>
                <h6>TOTAL  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ${{Cart::total()}}</h6>

                <br>
                <div class="cart-buttons">


{{--                    <a href="{{route('home')}}" class="btn btn-info">Continue Shopping</a>--}}

{{--                    <form action="{{ route('order.store') }}" method="POST" style="display: inline-block" >--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <input type="hidden"  name="user_id" value="{{auth('user')->user()->id}}">--}}
{{--                        <input type="hidden"  name="total"  value="{{Cart::total()}}">--}}
{{--                        <input type="hidden"  name="state"  value="new">--}}
{{--                        <input type="hidden"  name="quantity"  value="{{$item->qty}}">--}}
{{--                        <input type="hidden"  name="date"  value="{{now()}}">--}}

{{--                        <button type="submit" class="btn btn-primary"  >Proceed to Checkout</button>--}}
{{--                    </form>--}}








{{--                    <div id="paypal-button"></div>--}}
{{--                    <script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
{{--                    <script>--}}
{{--                        paypal.Button.render({--}}
{{--                            // Configure environment--}}
{{--                            env: 'sandbox',--}}
{{--                            client: {--}}
{{--                                // sandbox: 'ATF34qNs2zdwuaDSAINrIfLDwdKh7BEbhUD-SK9RFqrYpgvTxpNypUpBgcnP-itEmaqWayoEVh0l5SCpA',--}}
{{--                                sandbox: 'ATF34qNs2zdwuaDSAINrIfLDwdKh7BEbhU-SK9RFqrYpgvTxpNypUpBgcnP-itEmaqWayoEVh0l5SCpA',--}}
{{--                                production: 'demo_production_client_id'--}}
{{--                            },--}}
{{--                            // Customize button (optional)--}}
{{--                            locale: 'en_US',--}}
{{--                            style: {--}}
{{--                                size: 'small',--}}
{{--                                color: 'gold',--}}
{{--                                shape: 'pill',--}}
{{--                            },--}}

{{--                            // Enable Pay Now checkout flow (optional)--}}
{{--                            commit: true,--}}

{{--                            // Set up a payment--}}
{{--                            payment: function(data, actions) {--}}
{{--                                return actions.payment.create({--}}

{{--                                    redirect_urls:{--}}
{{--                                        return_url:'http://127.0.0.1:8000/front/execute-payment',--}}
{{--                                    },--}}

{{--                                    transactions: [{--}}
{{--                                        amount: {--}}
{{--                                            total: '20',--}}
{{--                                            currency: 'USD'--}}
{{--                                        }--}}
{{--                                    }]--}}
{{--                                });--}}
{{--                            },--}}
{{--                            // Execute the payment--}}
{{--                            onAuthorize: function(data, actions) {--}}
{{--                                // return actions.payment.execute().then(function() {--}}
{{--                                //     // Show a confirmation message to the buyer--}}
{{--                                //     window.alert('Thank you for your purchase!');--}}
{{--                                // });--}}

{{--                                return actions.redirect();--}}

{{--                            }--}}
{{--                        }, '#paypal-button');--}}

{{--                    </script>--}}






                    <form action="{{ route('create-payment') }}"  method="post" >
                        @csrf
                        <input type="submit" value="pay now">
                    </form>





                </div>
            </div>


        </div>

    </div>



    @endif

    <br><br><br><br>






    <div class="aside" style="margin-left: 200px; margin-top: -140px; padding: 50px;" >

        @if (Cart::instance('saveForLater')->count() > 0)
            <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>
        <hr><br>

        @foreach(Cart::instance('saveForLater')->content() as  $item)
            <div class="row">

                <div class="col-sm-4">
                    <div class="product-widget">
                        <div class="product-img">


                            <img src="{{asset('uploads/products/'.$item->model->photo)}}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category: </p>
                            <h3 class="product-name"><a href="{{route('product' ,$item->id)}}">{{$item->name}}</a></h3>
                            <h4 class="product-price">${{$item->price}} <del class="product-old-price">${{$item->price}} </del></h4>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4">
                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>


                <div class="col-sm-4">
                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-primary">Switch For Cart</button>
                    </form>
                </div>

            </div>
            <br><hr>
        @endforeach

     @else
            <div style=" width:700px;  height: 50px; margin-left: 150px; margin-top: 50px; margin-bottom: 50px; padding-bottom: 55px; padding-top: 30px; border-radius: 30px; text-align: center ; background: #d7dfe8 ">
            <h2> you have no item to save for later </h2>
            </div>

     @endif

    </div>


@endsection
