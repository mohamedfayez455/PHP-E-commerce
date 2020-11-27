@extends('admins::layouts.master')

@section('content')

    <section class="content">
        <div class="box box-primary">


            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 15px">Manage Admins page<small></small></h3>
                <form action="{{route('admins.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        </div>
                        <div class="col-md-2">
                                <a href="{{route('admins.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Admin</a>
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
                            <th>email</th>
                            <th>photo</th>
                            <th>created AT</th>
                            <th>Updated AT</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td><img src="{{$admin->image_path}}" class="img-thumbnail" style="width: 100px; height: 100px"></td>
                                <td>{{$admin->created_at}}</td>
                                <td>{{$admin->updated_at}}</td>
                                <td>
                                        <a href="{{route('admins.edit' , $admin->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                        <form action="{{route('admins.destroy' , $admin->id)}}" method="post" style="display: inline-block">
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
