@extends('layouts.master')
@section('contain')

<div class="row clearfix">

  <div class="col-md-8 offset-md-2">
    <div class="card p-5">
    @if (Session::get('message')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
       <div class="card-title">
         <h5 class="mb-3">Update Result  :</h3>
         <form class="" action="{{ route('update_result' ,$per_result->id)}}" method="post">
           @csrf
           <div class="form-group">
             <label for="">Subject</label>
             <select class="form-control" name="subject_id">
                <option value="">... Select Subject ...</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $subject->id==$per_result->subject_id ? 'selected' : ''}}>{{ $subject->title }}</option>
                @endforeach
             </select>
             <span class="text-danger mt-5">{{ $errors->first('subject_id')}}</span>

           <div class="form-group">
             <label for="">Marks </label>
             <input type="text" class="form-control" name="marks" id='va' value="{{ $per_result->marks }}">
             <span class="text-danger mt-5">{{ $errors->first('title')}}</span>
           </div>
            <input type="submit" id='department_btn' class="form-control btn btn-danger" value="Submit">
         </form>
       </div>
    </div>
  </div>

</div>
</div>

@endsection
