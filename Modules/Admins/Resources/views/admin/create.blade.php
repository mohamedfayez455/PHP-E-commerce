@extends('admins::layouts.master')

@section('content')

    @include('admins::includes.message')
        <section class="content">
            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Add new Admin </h3>
                </div><!-- end of box header -->


                <div class="box-body">
                    <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{old('email')}}"  class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"    class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control ">
                        </div>

                        <div class="form-group">
                            <label>image</label>
                            <input type="file" name="photo" id="input_photo" class="form-control image">
                        </div>


                        <div class="form-group">
                            <img src="{{ asset('uploads/products/default.png') }}" id="img_photo" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Admin </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->


@endsection