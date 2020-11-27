@extends('admins::layouts.master')

@section('content')

      <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                  <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                              <div class="inner">
                                    <h3>{{$products->count()}}</h3>

                                    <p>New products</p>
                              </div>
                              <div class="icon">
                                    <i class="fa fa-product-hunt"></i>
                              </div>
                              <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                              <div class="inner">
                                    <h3>{{$departments->count()}}</h3>

                                    <p>Departments </p>
                              </div>
                              <div class="icon">
                                    <i class="fa fa-folder-open-o"></i>
                              </div>
                              <a href="{{route('departments.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                              <div class="inner">
                                    <h3>{{$admins->count()}}</h3>

                                    <p>Admins </p>
                              </div>
                              <div class="icon">
                                    <i class="ion ion-person-add"></i>
                              </div>
                              <a href="{{route('admins.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                              <div class="inner">
                                    <h3>{{$orders->count()}}</h3>

                                    <p>Orders</p>
                              </div>
                              <div class="icon">
                                    <i class="fa fa-first-order"></i>
                              </div>
                              <a href="{{route('orders.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                  </div>
                  <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

      </section>
@endsection


