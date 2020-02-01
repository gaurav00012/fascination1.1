@extends('common.admin_template')
@section('heading')
Dashboard
@endsection
@section('content')

<div class="dashboardmain" id="dashboard">

  <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$user[0]->user_count}}</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    @if(auth()->user()->user_type == 1)      
  <div class="col-lg-3 col-xs-3">
          <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$shopadmin[0]->shopadmin_count}}</h3>

        <p>Store Admin</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
  <div class="col-lg-3 col-xs-3">
          <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$coupon[0]->coupon_count}}</h3>

        <p>Total Coupon</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-3">
          <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$banner[0]->banner_count}}</h3>

        <p>Total Banners</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>



   <div class="col-md-12 col-lg-12">
    <div class="col-md-12" style="margin-bottom: 8px;">
      <br>
  </div>
  <div class="col-md-12">

  </div>
</div>


</div>



@endsection

@section('vuejs')

@endsection