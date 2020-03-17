@extends('layouts.master')
@section('contain')
  <div class="card shadow p-5 mt-5">
  @if (Session::get('message')==true)
      <div class="alert alert-danger">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
     <h4>Individual Marksheet </h4>
    
      <form class="" action="{{ route('view_individual_marksheet')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <label for="">Semester</label>
            <select class="form-control" name="semester_id" id='semester'>
               <option value="">... Select Semester ...</option>
               @foreach($semesters as $semester)
               <option value="{{ $semester->id }}">{{ $semester->title }}</option>
               @endforeach
            </select>
            <span class="text-danger mt-5">{{ $errors->first('semester_id')}}</span>

          </div>

                <div class="col-md-6">
                  <label for="">Roll</label>
                  <input type="text" name="roll" id='roll' class='form-control' value="">
                  <span class="text-danger mt-5">{{ $errors->first('roll')}}</span>

                </div>

                <div class="col-md-6 mt-5">
                  <input type="submit" id='result_btn' name="btn" class='float-right btn btn-success' value="Submit">
                  </select>
                </div>
        </div>


      </form>
  </div>

@endsection
