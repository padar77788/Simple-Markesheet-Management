@extends('layouts.master')
@section('contain')

<div class="row clearfix">
  <div class="col-md-8 offset-md-2">
    <div class="card shadow p-5 mt-5">
       <div class="card-title">
         <h5 class="mb-3">UPDATE  SEMESTER :</h3>
           <div class="text-success">
             <h5>{{  Session::get('message') }} </h5>
           </div>
         <form class="" action="{{ route('update_semester',[$editSemester->id,str_slug($editSemester->title)] )}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Semester</label>
             <input type="text" class="form-control" name="title" id='va' value="{{ $editSemester->title }}">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='semester_btn' class="form-control btn btn-danger" value="Update">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
