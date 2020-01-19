@extends('common.admin_template')
@section('heading')
Manage Shopkeeper
@endsection
@section('content')

<div class="shopkeepermain" id="shopkeeper">

<div class="modal fade" id="addshopkeeper" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Add Shopkeeper</h4>
            </div>
            <div class="modal-body">
              <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Store Name</label>
                  <input type="text" v-model="shopkeeperVal.storename"  class="form-control"  >
                  <span v-if="shopkeeperValidationError.storename" class="text-danger">@{{ shopkeeperValidationError.storename[0] }}</span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-Mail Id</label>
                  <input type="email" v-model="shopkeeperVal.emailid"  class="form-control"  >
                  <span v-if="shopkeeperValidationError.emailid" class="text-danger">@{{ shopkeeperValidationError.emailid[0] }}</span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile No.</label>
                  <input type="text" v-model="shopkeeperVal.mobileno"  class="form-control"  >
                  <span v-if="shopkeeperValidationError.mobileno" class="text-danger">@{{ shopkeeperValidationError.mobileno[0] }}</span>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" v-model="shopkeeperVal.password"  class="form-control"  >
                  <span v-if="shopkeeperValidationError.password" class="text-danger">@{{ shopkeeperValidationError.password[0] }}</span>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center><button type="button" @click="addShopkeeper"  class="btn btn-primary">Submit</button></center>
              </div>
            </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="shopkeepereditmodal" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Edit Shopkeeper</h4>
            </div>
           <div class="box-body">
             <input type="hidden"  id="euserid" class="form-control">
                <div class="form-group">
                  <label for="exampleInputEmail1">Store Name</label>
                  <input type="text"  id="estorename" class="form-control"  >
                  <span v-if="shopkeeperValidationError.storename" class="text-danger">@{{ eshopkeeperValidationError.storename }}</span>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Mobile No.</label>
                  <input type="text" id="emobile" class="form-control"  >
                  <span v-if="shopkeeperValidationError.mobileno"  class="text-danger">@{{ eshopkeeperValidationError.mobileno }}</span>
                </div>
                 <!-- <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" v-model="eshopkeeperVal.password"  class="form-control"  >
                  <span v-if="shopkeeperValidationError.password" id="epassword" class="text-danger">@{{ eshopkeeperValidationError.password[0] }}</span>
                </div> -->
              </div>
              <div class="box-footer">
                <center><button type="button" @click="shopkeeperEditSubmit"  class="btn btn-primary">Submit</button></center>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>



   <div class="col-md-12 col-lg-12">
    <div class="col-md-12" style="margin-bottom: 8px;">
    <button type="button" class="btn btn-info pull-right" @click="addshopkeepermodal" data-toggle="modal">
      Add Shopkeeper
    </button>
    <br>
  </div>

<input hidden id="urlshopkeeperadd" value="{!! url('admin/create-shopkeeper');!!}">
 <input hidden id="urlshopkeeperget" value="{!! url('admin/get-shopkeeper');!!}">
<input hidden id="urlshopkeeperdel" value="{!! url('admin/deleteshopkeeper');!!}">
<input hidden id="urlshopkeeperedit" value="{!! url('admin/editshopkeeper');!!}">

   <div class="col-md-12">
          <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">All Shopkeeper</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                  <table class="table table-bordered" id="shopkeeper-table">
                    <thead>
                  <tr>
                    <th>S.No</th>
                    <th hidden> id</th>
                    <th hidden>userid</th>
                    <th>Store Name</th>
                    <th>Phone</th>
                    <th>Action</th>

                    </tr>
                  </thead>
                    <tbody>
                      <tr v-for="shopkeeper,index in allshopkeeper">
                        <td>@{{index+1}}</td>
                      <td hidden>@{{shopkeeper.id}}</td>
                      <td hidden>@{{shopkeeper.user_id}}</td>
                      <td>@{{shopkeeper.store_name}}</td>
                      <td>@{{shopkeeper.phone_no}}</td>
                      <td><a href="javascript:void(0)" @click="editshopkeeperModal" ><i class="fa fa-fw fa-edit"></i></a>|<a href="javascript:void(0)" @click="deleteShopkeeper(shopkeeper.user_id)"><i class="fa fa-fw fa-trash"></i></a> </td>
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
<script  src="{{URL::asset('js/admin/shopkeeper.js')}}"></script>
@endsection
