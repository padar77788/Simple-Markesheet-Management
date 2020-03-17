
@extends('layouts.master')
@section('contain')
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      @if (Session::get('message')==true)
      <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
      </div>
      @endif
        <h6 class="m-0 font-weight-bold text-primary">Subject List</h6>
      

        <div class="float-right">
          <a href="{{ route('add_subject') }}" class="btn btn-success">Add Subject</a>

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial No:</th>
                <th>Subject</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subjects as $subject)
              <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $subject->title }}</th>
                <th>{{ $subject->department->title }}</th>
                <th>{{ $subject->semester->title }}</th>
                <th>

                         <a href="{{ route('edit_subject',[$subject->id,$subject->title])}}" class="btn btn-success">Edit </a>
                         <a href="{{ route('delete_subject',$subject->id )}}" class="btn btn-danger" onclick="return confirm('Are you sure delete this subject')">Delete</a>
                </th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

@endsection
