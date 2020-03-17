@extends('layouts.master')
@section('contain')
  <div class="card shadow p-5 mt-5">
  @if (Session::get('message')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
     <h4>Add Result</h4>
     <div class="">
       <a href="{{ route('result')}}" class="btn btn-success float-right">Manage Result</a>
     </div>
   
      <form class="" action="{{ route('store_result')}}" method="post">
        @csrf
         <div class="form row">
           <div class="col-md-6">
             <label for="">Department</label>
            <select class="form-control" name="department_id" id='department'>
              <option value="">... Select Department ...</option>
              @foreach($departments as $department)
              <option value="{{ $department->id }}">{{ $department->title }}</option>
              @endforeach
            </select>
            <span class="text-danger mt-5">{{ $errors->first('department_id')}}</span>
           </div>

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

                 <div class="col-md-6">
                   <label for="">Subject</label>
                      <select class="form-control" name="subject_id" id='output'>
                        <option value="">... Select Subject ...</option>
                      </select>
                 </div>
                 <div class="col-md-6">
                   <label for="">Credit</label>
                   <input type="text" name="credit" id='roll' class='form-control' value="">
                   <span class="text-danger mt-5">{{ $errors->first('credit')}}</span>

                 </div>
                 <div class="col-md-6">
                   <label for="">Marks</label>
                   <input type="text" name="marks" id='marks' class='form-control' value="">
                   <span class="text-danger mt-5">{{ $errors->first('marks')}}</span>

                 </div>
                 <div class="col-md-6 mt-5">
                   <input type="submit" id='result_btn' name="btn" class='float-right btn btn-success' value="Submit">
                   </select>
                 </div>
         </div>
      </form>
  </div>


@endsection
@section('js')
<script>

$(document).ready(function(){
       $('#semester').change(function(){
          var id=$('#department').val();
          var sid=$('#semester').val();

          $.ajax({
             method:'GET',
             url:'{{ route('resultSubject') }}',
             data:{
                id:id,
                sid:sid
              },
             dataType:'html',
             success:function(response){
             $('#output').html(response);
             }
          });
       });

 });
 </script>
@endsection
