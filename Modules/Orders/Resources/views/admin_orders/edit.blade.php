@extends('admins::layouts.master')

@section('content')

    <section class="content">
        <div class="box box-primary">


            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 15px"> Orders page details<small></small></h3>

            </div><!-- end of box header -->


            <div class="box-body">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>owner</th>
                        <th>product</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>photo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as  $index=>$product)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>$ {{$product->price}}</td>
                            <td><img src="{{$product->image_path}}" class="img-thumbnail" style="width: 100px; height: 100px"></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>



            </div><!-- end of box body -->


        </div>
    </section>

@endsection
