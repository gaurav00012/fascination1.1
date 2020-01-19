@extends('common.admin_template')
@section('heading')
Manage Coupons
@endsection
@section('content')

<div class="couponmain" id="coupon">

<div class="modal fade" id="addcouponmodal" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Add Coupon</h4>
            </div>
            <div class="modal-body">
              <form role="form" id="coupon-form">
              <div class="box-body">
                <div class="form-group">
                  <label for="coupon-name">Coupon Name</label>
                  <input type="text" name="coupon-name" id="coupon-name" class="form-control"  >
                  
                </div>
                <div class="form-group">
                  <label for="coupon-detail">Coupon Detail</label>
                  <input type="text" name="coupon-detail" id="coupon-detail"   class="form-control"  >
                  
                </div>
                <div class="form-group">
                  <label for="coupon-image">Coupon Image</label>
                  <input type="file" id="coupon-image" name="coupon-image"  class="form-control"  >
                  
                </div>
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center><button type="button" @click="addCoupon" class="btn btn-primary">Submit</button></center>
              </div>
            </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="couponeditmodal" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Edit Coupon</h4>
            </div>
           <div class="box-body">
            
                
                
              
              </div>
              <div class="box-footer">
                <center><button type="button" class="btn btn-primary">Submit</button></center>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>



   <div class="col-md-12 col-lg-12">
    <div class="col-md-12" style="margin-bottom: 8px;">
    <button type="button" class="btn btn-info pull-right" @click="addCouponmodal" data-toggle="modal">
      Add Coupon
    </button>
    <br>
  </div>

<input hidden id="urlcouponadd" value="{!! url('admin/create-coupon');!!}">
 <input hidden id="urlcouponget" value="{!! url('admin/get-coupon');!!}">
<input hidden id="urlcoupondel" value="{!! url('admin/deletecoupon');!!}">
<input hidden id="urlcouponedit" value="{!! url('admin/editcoupon');!!}">

   <div class="col-md-12">
          <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">All Coupon</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                  <table class="table table-bordered" id="shopkeeper-table">
                    <thead>
                  <tr>
                    <th>S.No</th>
                    <th hidden> id</th>
                    <th>Coupon  Name</th>
                    <th>Coupon Detail</th>
                    <th>Coupon Image</th>

                    </tr>
                  </thead>
                    <tbody>
                      <tr v-for="coupon,index in allCoupon">
                       <td>@{{index+1}}</td>
                       <td hidden>@{{coupon.id}}</td>
                       <td>@{{coupon.coupon_name}}</td>
                       <td>@{{coupon.coupon_detail}}</td>
                       
                       <td><img v-bind:src="`/assets/coupons/${coupon.coupon_image}`" height="50"  width="50"></td>
                      </tr>


                    </tbody>
                </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
              </div>
            </div>
        </div>


</div>



@endsection

@section('vuejs')
<script  src="{{URL::asset('js/admin/coupon.js')}}"></script>
@endsection