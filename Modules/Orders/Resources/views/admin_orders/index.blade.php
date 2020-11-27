@extends('admins::layouts.master')

@section('content')

    @push('js')
        <script>
            $('select[name="state"]').change(function () {
                var order_id = $(this).data('id');

                $.ajax({
                    url:"/admin/order/update/" + order_id + "/status",
                    method:'put',
                    data:{
                        _token:"{{csrf_token()}}",
                        state:$(this).val()
                    },
                    success:function () {
                    }
                });
            });
        </script>
        @endpush

    <section class="content">
        <div class="box box-primary">


            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 15px">Manage Orders page<small></small></h3>

            </div><!-- end of box header -->


            <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Total</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>State</th>
                            <th>created AT</th>
                            <th>Updated AT</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>$ {{$order->total}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->date}}</td>
                                <td>
                                    <select name="state" class="form-control" data-id="{{$order->id}}">
                                        <option {{$order->state == 'new' ? 'selected' : ''}} value="new">New</option>
                                        <option {{$order->state == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                                        <option {{$order->state == 'finished' ? 'selected' : ''}} value="finished">Finished</option>
                                    </select>

                                </td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td>
{{--                                        <a href="{{route('orders.edit' ,$order->id ) }}" class="btn btn-info btn-sm"><i class="fa fa-shower"></i> Show</a>--}}
                                        <a href="{{route('order.show' ,$order->id ) }}" class="btn btn-info btn-sm"><i class="fa fa-shower"></i> Show</a>
{{--                                        <a href="{{route('order.edit' ,$order->id ) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</a>--}}
                                        <form action="{{route('orders.destroy' , $order->id)}}" method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> delete</button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

{{--                {{ $admins->appends(request()->query())->links() }}--}}


            </div><!-- end of box body -->


        </div>
    </section>

@endsection
