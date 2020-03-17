@extends('layouts.master')
@section('contain')

<div class="row clearfix">

  <div class="col-md-8 offset-md-2">
    <div class="card shadow p-5 mt-5">
      @if (Session::get('error')==true)
      <div class="alert alert-danger">
        <p>{{ Session::get('error') }}</p>
      </div>
      @endif
      @if (Session::get('success')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div>
      @endif
       <div class="card-title">
         <h5 class="mb-3">Change Password :</h3>
           <div class="text-success">
             <h5>{{  Session::get('message') }} </h5>
           </div>
  
         <form class="" action="{{ route('setting.store')}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Old Password</label>
             <input type="old_password" class="form-control" name="old_password" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('old_password')}}</span>
           </div>

           <div class="form-group">
             <label for="">New Password</label>
             <input type="password" class="form-control" name="password" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('password')}}</span>
           </div>
           <div class="form-group">
             <label for="">Confirm Password</label>
             <input type="password" class="form-control" name="password_confirmation" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('confirm_password')}}</span>
           </div>
         
          
            <input type="submit" id='subject_btn' class="form-control btn btn-danger" value="Submit">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
