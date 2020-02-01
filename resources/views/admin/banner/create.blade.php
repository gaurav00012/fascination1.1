@extends('common.admin_template')
@section('heading')
Manage Banner
@endsection
@section('content')

<div class="bannermain" id="banner">

<div class="modal fade" id="addbannermodal" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Add Banner</h4>
            </div>
            <div class="modal-body">
              <form role="form" id="coupon-form">
              <div class="box-body">
              
                <div class="form-group">
                  <label for="banner-image">Coupon Image</label>
                  <input type="file" id="baner-image" name="banner-image"  class="form-control"  >
                  
                </div>
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center><button type="button" @click="addBanner" class="btn btn-primary">Submit</button></center>
              </div>
            </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="bannereditmodal" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Edit Banner</h4>
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
    <button type="button" class="btn btn-info pull-right" @click="addBannermodal" data-toggle="modal">
      Add Banner
    </button>
    <br>
  </div>

<input hidden id="urlBanneradd" value="{!! url('admin/create-banner');!!}">
 <input hidden id="urlbannerget" value="{!! url('admin/get-banner');!!}">
<input hidden id="urlbannerdel" value="{!! url('admin/delete-banner');!!}">
<input hidden id="urlbanneredit" value="{!! url('admin/editcoupon');!!}">

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
                    <th>Banner Image</th>
                    <th>Action</th>

                    </tr>
                  </thead>
                    <tbody>
                      <tr v-for="banner,index in allBanner">
                       <td>@{{index+1}}</td>
                       <td hidden>@{{banner.id}}</td>
                      
                       
                       <td><img v-bind:src="`${banner.banner_url}`" height="50"  width="50"></td>
                      <td><a href="javascript:void(0)" @click="deleteBanner(banner.id)"><i class="fa fa-fw fa-trash"></i></a> </td>
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
<script  src="{{URL::asset('js/admin/banner.js')}}"></script>
@endsection