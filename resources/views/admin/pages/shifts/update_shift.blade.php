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
         <h5 class="mb-3">UPDATE  SHIFT :</h3>
         
         <form class="" action="{{ route('update_shift',[$editShift->id,str_slug($editShift->title)] )}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Semester</label>
             <input type="text" class="form-control" name="title" id='va' value="{{ $editShift->title }}">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='shift_btn' class="form-control btn btn-danger" value="Update">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
