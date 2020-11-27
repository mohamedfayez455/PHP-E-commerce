@extends('admins::layouts.master')

@push('js')


    <div id="delete_model" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Delete
                        <span id="dep_name"></span>
                    </h4>
                </div>
                <form action="" method="post"  id="form_delete_department" >
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <div class="modal-body">
                        <p>delete <span class="dep_name"></span>    </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="Yes" class="btn btn-primary"> Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    $(document).ready(function () {
        $('#jstree').jstree({
            "core" : {
                'data' : {!! load_department() !!},
                "themes" : {
                    "variant" : "large"
                }
            },
            "checkbox" : {
                "keep_selected_style" : true
            },
            "plugins" : [ "wholerow" ]
        });
    });

    $('#jstree').on('changed.jstree' , function (e, data) {
        var  i , j , r = [];
        var name =  [];
        for (i = 0 , j = data.selected.length ; i < j ; i++ )
        {
            r.push(data.instance.get_node(data.selected[i]).id);
            name.push(data.instance.get_node(data.selected[i]).text);


        }

            // console.log(r);
            // console.log(r.join(', '));


        $('#form_delete_department').attr('action' , '{{url('/admin/departments')}}/'+ r.join(', '));
        $('.dep_name').text( name.join(', '));
        if (r.join(', ') != '')
        {
            $('.show_btn').removeClass('hidden');
            $('.edit_dep').attr('href' , '{{url('/admin/departments')}}/' +r.join(', ')+'/edit' );
        }else {
            $('.show_btn').addClass('hidden');
        }
    });

    </script>
@endpush


@section('content')
    <div class="box">
        <div class="box-header">
            <h3>  Mange Department </h3>
        </div>
        <div class="box-body">
            <a class="btn btn-info edit_dep show_btn hidden"><i class="fa fa-edit"> Edit</i></a>

            <a  class="btn btn-danger delete_dep show_btn hidden"
               data-toggle="modal" data-target="#delete_model" ><i class="fa fa-trash"></i>Delete</a>
    <div id="jstree"></div>
        </div>
    </div>
@endsection

