@extends('layouts.master')
@section('contain')

<div class="row clearfix">
  <div class="col-md-8 offset-md-2">
  @if (Session::get('message')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
    <div class="card shadow p-5 mt-5">
       <div class="card-title">
         <h5 class="mb-3">UPDATE SUBJECT:</h3>
        
         <form class="" action="{{ route('update_subject',[$editSubject->id,str_slug($editSubject->title)] )}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Semester</label>
             <input type="text" class="form-control" name="title" id='va' value="{{ $editSubject->title }}">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
           <div class="form-group">
             <label for="">Department</label>
             <select class="form-control" name="department_id">
               @foreach($departments as $department)
                  <option value="{{ $department->id }}"  {{ $department->id==$editSubject->department_id ? 'selected' : ''}}>{{ $department->title }}</option>
                  @endforeach
             </select>

           </div>
           <div class="form-group">
             <label for="">Semester</label>
             <select class="form-control" name="semester_id">
               @foreach($semesters as $semester)
                  <option value="{{ $semester->id }}" {{ $semester->id==$editSubject->semester_id ? 'selected' : ''}}>{{ $semester->title }}</option>
                  @endforeach
             </select>

             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='shift_btn' class="form-control btn btn-danger" value="Update">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
