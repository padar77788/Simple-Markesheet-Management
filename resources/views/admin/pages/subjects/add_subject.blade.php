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
         <h5 class="mb-3">ADD SUBJECT :</h3>
         
           <div class=" float-right mb-3">
             <a href="{{ route('subject')}}" class="btn btn-success ">Manage Subject</a>
           </div>
         <form class="" action="{{ route('store_subject')}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Subject Name</label>
             <input type="text" class="form-control" name="title" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>

           <div class="form-group">
             <label for="">Subject Code</label>
             <input type="text" class="form-control" name="subject_code" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
           <div class="form-group">
             <label for="">Credit</label>
             <input type="text" class="form-control" name="subject_credit" id='va' value="">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
           <div class="form-group">
             <label for="">Department</label>
             <select class="form-control" name="department_id">
               <option value="">... Select Department ...</option>
               @foreach($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->title }}</option>
                  @endforeach
             </select>
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
           <div class="form-group">
             <label for="">Semester</label>
             <select class="form-control" name="semester_id">
               <option value="">... Select semester ...</option>
               @foreach($semesters as $semester)
                  <option value="{{ $semester->id }}">{{ $semester->title }}</option>
                  @endforeach
             </select>
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='subject_btn' class="form-control btn btn-danger" value="Submit">
         </form>
       </div>
    </div>
  </div>

</div>


@endsection
