@extends('layouts.master')
@section('css')
<style media="screen">
    .marksheet{
  background-color: #FFFFCC;
    }
    .bteb-name{
      font-family: 'Oleo Script Swash Caps';font-size: 28px;;
    }
    .border-sinature{
      border: 1px solid silver;
    }
    .marksheet-border{
       border: 1px solid black !important;
    }
</style>
@endsection
@section('contain')
    <div class="container mb-3 marksheet p-5">
      <div class="text-center bteb">

        <h3 class="bteb-name">  <img src="" alt=""> Bangladesh Technical Education Board, Dhaka</h3>
        <h4 >ACADEMIC TRANSCRIPT</h4>
        <h4 class='mt-3'>DIPLOMA-IN-INGINEERING (Duration : 4-Year)</h4>
        <h5 >FOURTH SEMESTER FINAL EXAMINATION,2019</h5>
        <h6>(Held in the Month of June -July , 2019)</h6>
      </div>

<div class="row mt-3 mb-3">
    <div class="col-md-8">
    <table class="table">
       <tbody>
         @foreach($student as $std)
         <tr>
           <td>Technology </td>
           <td class="ml-5">: </td>
           <td> {{ $std->department->title }} Technology</td>
         </tr>
         <tr>
           <td> Name</td>
           <td>:</td>
           <td>{{ $std->name }}</td>
         </tr>
         <tr>
           <td>Father's Name</td>
           <td>:</td>
           <td>{{ $std->f_name }}</td>
         </tr>

         <tr>
           <td>Mather's Name</td>
           <td>:</td>
           <td>{{ $std->m_name }}</td>
         </tr>
         <tr>
           <td>Roll No</td>
           <td>:</td>
           <td>{{ $std->roll }}</td>
         </tr>
         <tr>
           <td>Registration No</td>
           <td>:</td>
           <td>{{ $std->registration }}</td>
         </tr>
         <tr>
           <td>Session</td>
           <td>:</td>
           <td>{{ $std->session }}</td>
         </tr>
         <tr>
           <td>Institute Name</td>
           <td>:</td>
           <td> 17057-Kurigram Polytechnic Institute</td>
         </tr>
         @endforeach
       </tbody>
    </table>
    </div>
    <div class="col-md-4">
        <table class="table-bordered p-5 marksheet-border">
          <thead>
            <th>Range of Marks(Percentenge)</th>
            <th>Grade</th>
            <th>Point</th>
          </thead>
          <tbody>
            <tr>
            <td>80 or above </td>
            <td>A+</td>
            <td>4.00</td>
            </tr>
            <tr>
              <td>75 -below 80</td>
              <td>A</td>
              <td>3.75</td>
            </tr>
            <tr>
              <td>70 -below 75</td>
              <td>A-</td>
              <td>3.50</td>
            </tr>
            <tr>
              <td>65 -below 70</td>
              <td>B+</td>
              <td>3.25</td>
            </tr>
            <tr>
              <td>60 -below 65</td>
              <td>B</td>
              <td>3.00</td>

            </tr>
            <tr>
              <td>55 -below 60</td>
              <td>B-</td>
              <td>2.75</td>
            </tr>
            <tr>
              <td>50 -below 55</td>
              <td>C+</td>
              <td>2.50</td>
            </tr>
            <tr>
              <td>45 -below 50</td>
              <td>C</td>
              <td>2.25</td>
            </tr>
            <tr>
              <td>40 -below 45</td>
              <td>D</td>
              <td>2.00</td>
            </tr>
            <tr>
              <td>Below 40</td>
              <td>F</td>
              <td>0.00</td>
            </tr>
          </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Credit Hours</th>
            <th>Marks</th>
            <th>Grade Letter</th>
            <th>Grade Point</th>
          </tr>
        </thead>
        <tbody>
          @php
          $gpa=0;
          $subject=0;
          @endphp
          @foreach($results as $result)
          @php
          $gpa+=$result->gpa;
          $subject++;
          @endphp
          <tr>
            <td>{{ $result->subject->subject_code }}</td>
            <td>{{ $result->subject->title }}</td>
            <td>{{ $result->credit }}</td>
            <td>{{ $result->marks }}</td>
            <td>{{ $result->grade }}</td>
            <td>{{ $result->gpa }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="float-right">
        <h5>GPA <span class="border p-1">{{ round($gpa/$subject,2) }}</span></h4>
      </div>
    </div>
</div>

<div class="row mt-5 text-center">
  <div class="col-md-3">
    <div class="border-sinature">
    </div>
    <p>Register</p>
  </div>
  <div class="col-md-3 ">
    <div class="border-sinature">
    </div>
    <p>Head Of the Department</p>
  </div>
  <div class="col-md-3 ">
    <div class="border-sinature">
    </div>
    <p>Vice Principal</p>
  </div>
  <div class="col-md-3 ">
    <div class="border-sinature">
    </div>
    <p>Principal</p>
  </div>
  <a class="fa fa-print" href="{{ route('printResult',[$result->roll,$result->semester])}}"></a>

</div>
    </div>
@endsection
