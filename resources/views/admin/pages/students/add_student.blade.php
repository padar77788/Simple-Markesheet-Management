@extends('layouts.master')
@section('contain')

<div class="row clearfix">

  <div class="col-md-12">
    <div class="card shadow p-5 mt-5">
    @if (Session::get('message')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
       <div class="card-title">
         <h5 class="mb-3">ADD STUDENT :</h3>
          
         <form class="" action="{{ route('store_student')}}" method="post">
           @csrf
          <div class="form row ">
            <div class="col-md-6 mt-3">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('name')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Roll</label>
              <input type="text" class="form-control" name="roll" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('roll')}}</span>
            </div>

            <div class="col-md-6 mt-3">
              <label for="">Register</label>
              <input type="text" class="form-control" name="registration" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('registration')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Department</label>
              <select class="form-control" name="department_id">
                <option value="">... Select Department ...</option>
                @foreach($departments as $department)
                   <option value="{{ $department->id }}">{{ $department->title }}</option>
                   @endforeach
              </select>
              <span class="text-danger mt-5 ">{{ $errors->first('department_id')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Semester</label>
              <select class="form-control" name="semester_id">
                <option value="">... Select Semester ...</option>
                @foreach($semesters as $semester)
                   <option value="{{ $semester->id }}">{{ $semester->title }}</option>
                @endforeach
              </select>
              <span class="text-danger mt-5">{{ $errors->first('semester_id')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Shift</label>
              <select class="form-control" name="shift_id">
                <option value="">... Select Shift ...</option>
                @foreach($shifts as $shift)
                   <option value="{{ $shift->id }}">{{ $shift->title }}</option>
                @endforeach
              </select>
              <span class="text-danger mt-5">{{ $errors->first('shift_id')}}</span>
            </div>

            <div class="col-md-6  mt-3">
              <label for="">Father's Name</label>
              <input type="text" class="form-control" name="f_name" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('f_name')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Mother's Name</label>
              <input type="text" class="form-control" name="m_name" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('m_name')}}</span>
            </div>

            <div class="col-md-6  mt-3">
              <label for="">DOB</label>
              <input type="date" class="form-control" name="dob" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('dob')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Religion</label>
              <input type="text" class="form-control" name="religion" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('religion')}}</span>
            </div>

            <div class="col-md-6  mt-3">
              <label for="">Gender</label>
              <select class="form-control" name="gender">
                <option value="">... Select Gender ...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <span class="text-danger mt-5">{{ $errors->first('gender')}}</span>
            </div>
            <div class="col-md-6  mt-3">
              <label for="">Session</label>
              <input type="text" class="form-control" name="session" id='va' value="">
              <span class="text-danger mt-5">{{ $errors->first('session')}}</span>
            </div>
            <div class="col-md-6   mt-5">
              <input type="submit" name="student_btn" class="float-right btn btn-success" value="Submit">
            </div>
          </div>

         </form>
       </div>
    </div>
  </div>

</div>


@endsection
