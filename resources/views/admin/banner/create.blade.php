@extends('common.admin_template')
@section('heading')
Create Shopkeeper
@endsection
@section('content')


<div class="col-md-6">
  <form class="form-horizontal" method="POST">
  @csrf
    <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Store Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="storename" value="{{ old('storename') }}"  id="storename" >
                    @if($errors->has('storename'))
                        <div class="error">{{ $errors->first('storename') }}</div>
                    @endif
                  </div>
    </div>
     <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">E-Mail Id</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="emailid" value="{{ old('emailid') }}"  id="emailid" >
                    @if($errors->has('emailid'))
                        <div class="error">{{ $errors->first('emailid') }}</div>
                    @endif
                  </div>
    </div>
      <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Mobile No</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="mobileno" value="{{ old('mobileno') }}"  id="mobileno" >
                    @if($errors->has('mobileno'))
                        <div class="error">{{ $errors->first('mobileno') }}</div>
                    @endif
                  </div>
    </div>
     <!--<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username"  id="username" >
                    
                  </div>
    </div> -->
     <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password"  id="password" >
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                  </div>
    </div>
     <div class="col-md-6">
               
                <button type="submit"  class="btn btn-info pull-right">Submit</button>
     </div>
  </form>
</div>
@endsection