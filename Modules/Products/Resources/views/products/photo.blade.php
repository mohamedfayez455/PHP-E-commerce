@extends('admins::layouts.master')

@section('content')

    <section class="content">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 15px">Manage Products page<small></small></h3>
            </div>

            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product_photo as  $index=>$photo)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>
                                <img src="{{ asset('uploads/products/album/'.$photo->photos) }}"  style="width: 100px" class="img-thumbnail " alt="">
                            </td>
                            <td>
                                <form action="{{route('image.delete' , $photo->id)}}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        <br>
        <br>
        <hr>
        <br>

        <form action="{{ route('image.create') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('post') }}

        <input type="hidden" name="product_id" value="{{$product->id}}" >

        <div class="form-group">
            <label> Add new  image</label>
            <input type="file" name="photos" id="input_photo" class="form-control image">
        </div>

        <div class="form-group">
        <img src="{{ asset('uploads/products/default.png') }}" id="img_photo" style="width: 100px" class="img-thumbnail " alt="">
        </div>

            <button type="submit"  class="btn btn-primary"><i class="fa fa-plus"></i> New photos</button>
        </form>


        </div>
    </section>

@endsection
