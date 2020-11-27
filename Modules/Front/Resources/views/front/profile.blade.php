@extends('front::layouts.master')

@section('content')

    <div class="container" style="margin-top: 30px;">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8" style="height: 330px;">
                    <h1>hi {{$user->name}}</h1>
                    <div class="col-lg-12" style=" margin-top: 30px;">
                        <h3 style="margin-bottom: 20px;">Personal Information</h3>
                        <ul class="list-unstyled" >
                            <li style="margin-bottom: 20px;"><strong> Name :</strong> {{$user->name}} </strong>
                            </li>
                            <li style="margin-bottom: 20px;"><strong>Email :</strong> {{$user->email}} </strong>
                            </li>
                            <li style="margin-bottom: 20px;" ><strong>phone:</strong> {{$user->phone}}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('uploads/users/'.$user->photo)}}" class="img-thumbnail">

                </div>
            </div>
            <hr><br>

            @if (  $user->orders !== null )



            <div class="row">
                <h4 style="text-align: center">Your Orders</h4><br>
                <div style=" padding: 30px; margin: auto ; border-radius: 20px; width: 600px; min-height: 200px; background: white">
                        <div style="margin:20px ; " >
                            <div class="cart-list">
                            @foreach($user->orders as  $index=>$order)
                                <h3 style="text-align: center ; margin-bottom: 40px; color: red">  Order number {{$index +1 }} </h3>
                                <div class="product-widget" >
                                    <div class="product-img" >
                                        @foreach($order->products as  $product)
                                            <img src="{{asset('uploads/products/'.$product->photo)}}" alt="" class="img-thumbnail" > <br>
                                        @endforeach
                                    </div>
                                    <div class="product-body"  >
                                        @foreach($order->products as  $product)
                                        <h3 class="product-name"  ><a href=""> name:  {{$product->name}}</a></h3>
                                        <h4 class="product-price"><span class="qty"></span>price:  ${{$product->price}}</h4>
                                        <h4 class="product-price" style="color: black"><span class="qty"></span>quantity:   {{$product->pivot->quantity}}</h4>
                                        @endforeach
                                    </div>

                                    <div class="row">

                                    <div class="col-sm-6">

                                    <div class="cart-summary">
                                        <hr><h5>SUBTOTAL: ${{$order->total}}</h5>
                                    </div>
                                    </div>

                                    <br>
                                    <div class="col-sm-6">
                                    <div class="cart-btns">
                                        <form action="{{ route('order.destroy', auth('user')->user()->orders()->orderBy('created_at' , 'asc')->first()->id ) }}" style="display: inline-block   " method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Cancel Order</button>
                                        </form>
                                    </div>
                                    </div>

                                    </div>

                                </div><br><br><br>
                            @endforeach
                            </div>
                        </div>
                </div>
            </div>

            @else

                <div style=" text-align: center; padding: 30px; margin: auto ; border-radius: 20px; width: 600px; min-height: 100px; background: white">
                <h2> you not have any order </h2>
                </div>

            @endif


        </div>
    </div>

@endsection


{{--                    @foreach($user->orders as  $order)--}}
{{--                        {{$order->products->first()->name}}<br>--}}
{{--                        {{$order->products->first()->price}}<br>--}}
{{--                        {{$order->total}} <br>--}}
{{--                        {{$order->products->first()->photo}}<br>--}}
{{--                        {{$order->quantity}}<br>--}}
{{--                    @endforeach--}}