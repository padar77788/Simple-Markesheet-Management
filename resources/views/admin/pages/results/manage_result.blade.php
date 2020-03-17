
@extends('layouts.master')
@section('contain')
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Result</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Result List</h6>
        <div class="text-success">
          <h5>{{  Session::get('message') }} </h5>
        </div>

        <div class="float-right">
          <a href="{{ route('add_result')}}" class="btn btn-success fa fa-plus">Add Result</a>

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial No:</th>
                <th>Roll</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $result)
              <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $result->roll }}</th>
                 <th>{{ optional($result->department)->title }}</th>
                 <th>{{ optional($result->semester)->title }}</th>

                <th>

                    @csrf
                    <a href="{{ route('viewResult',[$result->roll,$result->semester])}}" class="btn btn-success">View </a>
                    <a href="{{ route('printResult',[$result->roll,$result->semester])}}" class="btn btn-success">Print </a>
                     <a href="{{ route('edit_result',$result->roll)}}" class="btn btn-success">Edit </a>
                      <a href="{{ route('delete_result',$result->roll)}}" class="btn btn-danger" onclick="return confirm('Are you sure delete this result !!!')">Delete </a>
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
