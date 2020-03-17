@extends('layouts.master')
@section('contain')

<div class="row clearfix">
  <div class="col-md-8 offset-md-2">
    <div class="card p-5">
  
       <div class="card-title">
         <h5 class="mb-3">UPDATE  DEPARTMENT :</h3>
         
         <form class="" action="{{ route('update_department',[$editDepartment->id,str_slug($editDepartment->title)] )}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Department</label>
             <input type="text" class="form-control" name="title" id='va' value="{{ $editDepartment->title }}">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='department_btn' class="form-control btn btn-danger" value="Update">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
