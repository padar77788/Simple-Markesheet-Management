
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
        <h6 class="m-0 font-weight-bold text-primary">Shift List</h6>
     
        <div class="float-right">
          <a href="{{ route('add_shift') }}" class="btn btn-success">Add Shift</a>

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial No:</th>
                <th>Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($shifts as $shift)
              <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $shift->title }}</th>
                <th>

                         <a href="{{ route('edit_shift',[$shift->id,$shift->title])}}" class="btn btn-success">Edit </a>
                         <a href="{{ route('delete_shift',$shift->id )}}" class="btn btn-danger" onclick="return confirm('Are you sure delete this shift')">Delete</a>
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
