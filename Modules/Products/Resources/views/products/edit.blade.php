@extends('admins::layouts.master')

@section('content')

    @include('admins::includes.message')
    <section class="content">
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">Add new product </h3>
            </div><!-- end of box header -->


            <div class="box-body">
                <form action="{{route('products.update' , $product->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label>desc</label>
                        <input type="text" name="desc" value="{{$product->desc}}"  class="form-control ">
                    </div>


                    <div class="form-group">
                        <label>price</label>
                        <input type="text" name="price" value="{{$product->price}}"  class="form-control ">
                    </div>


                    <div class="form-group">
                        <label>size</label>
                        <input type="text" name="size" value="{{$product->size}}"  class="form-control ">
                    </div>


                    <div class="form-group">
                        <label>color</label>
                        <input type="color" name="color" value="{{$product->color}}"  class="form-control ">
                    </div>


                    <div class="form-group">
                        <label>state</label>
                        <select name="state" class="form-control">
                            <option  value="new"  {{$product->state ==  'new'  ? 'selected'  : '' }}  > New</option>
                            <option  value="used" {{$product->state ==  'used'  ? 'selected'  : '' }}> Used</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select   name="department_id" class="form-control" >
                            @foreach($departments as $department)
                                <option value="{{$department->id}}"  {{$product->department_id ==$department->id ? 'selected' : ''}} >{{$department->name}} </option>   
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="photo"  id="input_photo" class="form-control image">
                    </div>


                    <div class="form-group">
                        <img src="{{ asset('uploads/products/'.$product->photo) }}" style="width: 100px"  id="img_photo" class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group">
                        <label>images </label>
                        <input type="file" multiple="multiple" name="photos[]" class="form-control ">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> update product </button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->


@endsection