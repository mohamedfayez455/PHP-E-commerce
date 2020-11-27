@extends('front::layouts.master')

@section('content')


<div style="height: 200px; margin: 200px; padding: 50px; border-radius: 30px; text-align: center ; background: #E9EBEE ">
    <h2> thank you for your order </h2>
    <p> you will recive the order in 30 days from now </p>
    <div class="row">
    <div class="col-sm-4"></div>

    <div class="col-sm-2">
        <a href="{{url('/front/home')}}" class="btn btn-info">Continue Shopping</a>
    </div>

    <div class="col-sm-2">
        <form action="{{ route('order.destroy', auth('user')->user()->orders()->orderBy('created_at' , 'asc')->first()->id ) }}" method="POST">
        {{ csrf_field() }}
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Cancel Order</button>
        </form>
    </div>

    </div>

</div>


@endsection
