@extends('admins::layouts.master')

@section('content')

    <section class="content">
        <div class="box box-primary">


            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 15px"> Orders page details<small></small></h3>

            </div><!-- end of box header -->


            <div class="box-body">

                <form action="{{route('order.update' , $order->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                <label>state</label>

                 <input type="hidden" name="id" value="{{$order->id}}">
                <select  name="state" class="form-control">
                    <option value="new" {{$order->state == 'new' ?'selected' : ''}}> new </option>
                    <option value="pending" {{$order->state == 'pending' ? 'selected' : ''}} > pending </option>
                    <option value="finished" {{$order->state == 'finished' ? 'selected' : ''}} > finished </option>
                </select>

                <br>
                <button class="btn btn-primary"> Save </button>

                </form>



            </div><!-- end of box body -->


        </div>
    </section>

@endsection
