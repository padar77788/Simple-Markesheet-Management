
@extends('layouts.master')
@section('contain')
<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Per Subject Result List</h6>
        <div class="text-success">
          <h5>{{  Session::get('message') }} </h5>
        </div>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial No:</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($results as $result)
              <tr>
                <th>{{ $loop->index+1 }}</th>
                <th>{{ $result->subject->title }}</th>
                <th>{{ $result->marks }}</th>

                <th>
                     <a href="{{ route('edit_per_subject_result',$result->id)}}" class="btn btn-success">Edit </a>
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
