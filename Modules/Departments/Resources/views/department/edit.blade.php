@extends('admins::layouts.master')
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#jstree').jstree({
                "core" : {
                    'data' : {!! load_department($department->parent , $department->id)  !!} ,
                    "themes" : {
                        "variant" : "large"
                    }
                },
                "checkbox" : {
                    "keep_selected_style" : false
                },
                "plugins" : [ "wholerow" ]
            });
        });

        $('#jstree').on('changed.jstree' , function (e, data) {
            var  i , j , r = [];
            for (i = 0 , j = data.selected.length ; i < j ; i++ )
            {
                r.push(data.instance.get_node(data.selected[i]).id);
            }
            $('.parent_id').val(r.join(', '));
        });
    </script>
@endpush



@section('content')

    @include('admins::includes.message')
    <section class="content">
        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">Add new Department </h3>
            </div><!-- end of box header -->

            <div class="box-body">
                <form action="{{route('departments.update' , $department->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$department->name}}" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label>Description </label>
                        <input type="text" name="desc" value="{{$department->desc}}"  class="form-control ">
                    </div>

                    <div class="clearfix"></div>
                    <div id="jstree"></div>
                    <input type="hidden" name="parent_id"  class="parent_id"  value="{{$department->parent_id}}" >
                    <div class="clearfix"></div>


                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="photo"  id="input_photo" class="form-control image">
                    </div>


                    <div class="form-group">
                        <img src="{{ asset('uploads/departments/'.$department->photo) }}" style="width: 100px"  id="img_photo" class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Department </button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

@endsection