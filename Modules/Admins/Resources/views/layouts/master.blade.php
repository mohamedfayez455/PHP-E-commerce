@include('admins::includes.header')
@include('admins::includes.nav')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
{{--            <li><a href="{{url('/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            <li><a href="{{route('home.admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admins::includes.message')
        @yield('content')
    </section>
    <!-- /.content -->
</div>



@include('admins::includes.footer')