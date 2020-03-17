@extends('layouts.master')
@section('contain')

<div class="row clearfix">

  <div class="col-md-8 offset-md-2">
    <div class="card shadow p-5 mt-5">
    @if (Session::get('message')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
       <div class="card-title">
         <h5 class="mb-3">ADD SHIFT :</h3>
        
           <div class=" float-right mb-3">
             <a href="{{ route('shift')}}" class="btn btn-success ">Manage Shift</a>
           </div>
         <form class="" action="{{ route('store_shift')}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Shift</label>
             <input type="text" class="form-control" name="title" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='shift_btn' class="form-control btn btn-danger" value="Submit">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
