
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
        <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
       

        <div class="float-right">
          <a href="" class="btn btn-success">Add Student</a>

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial No:</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Registration</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Shift</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $student->name }}</th>
                <th>{{ $student->roll }}</th>
                <th>{{ $student->registration }}</th>
                <th>{{ $student->department->title }}</th>
                <th>{{ $student->semester->title }}</th>
                <th>{{ $student->shift->title }}</th>
                <th>

                         <a href="{{ route('edit_student',$student->id)}}" class="btn btn-success">Edit </a>
                         <a href="{{ route('delete_student',$student->id )}}" class="btn btn-danger" onclick="return confirm('Are you sure delete this student')">Delete</a>
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
