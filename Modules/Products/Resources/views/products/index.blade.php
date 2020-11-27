@extends('admins::layouts.master')

@section('content')

    <section class="content">
        <div class="box box-primary">


            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 15px">Manage Products page<small></small></h3>
                <form action="{{route('products.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        </div>
                        <div class="col-md-2">
                                <a href="{{route('products.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New product</a>
                        </div>
                    </div>
                </form><!-- end of form -->
            </div><!-- end of box header -->


            <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>desc</th>
                            <th>price</th>
                            <th>state</th>
                            <th>department</th>
                            <th>color</th>
                            <th>photo</th>
                            <th>Gallery</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as  $index=>$product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->desc}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->state}}</td>
                                <td>{{$product->department->name}}</td>
                                <td><div style="width: 80px; height: 20px; background: {{$product->color}}" >  </div></td>
                                <td><img src="{{$product->image_path}}" class="img-thumbnail" style="width: 100px; height: 100px"></td>
                                <td>
                                        <a href="{{route('image.index' , $product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-image"></i> photo</a>
                                </td>
                                <td>
                                        <a href="{{route('products.edit' , $product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                </td>
                                <td>
                                        <form action="{{route('products.destroy' , $product->id)}}" method="post" style="display: inline-block">
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
