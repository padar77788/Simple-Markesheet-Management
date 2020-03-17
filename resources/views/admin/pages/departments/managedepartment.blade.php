
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
        <h6 class="m-0 font-weight-bold text-primary">Department List</h6>
      

        <div class="float-right">
          <a href="{{ route('add_department') }}" class="btn btn-success">Add Department</a>

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
              @foreach($departments as $department)
              <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $department->title }}</th>
                <th>
                        <form class="" action="{{ route('delete_department',$department->id )}}" method="post">
                          @method('DELETE')
                          @csrf
                          <a href="{{ route('edit_department',[$department->id,$department->title])}}" class="btn btn-success">Edit </a>
                          <input type="submit" name="" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure delete this subject')">
                        </form>
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
