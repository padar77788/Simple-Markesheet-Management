<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Model\Department;
use App\Model\Semester;
use App\Model\Shift;
use App\Model\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $students=Student::all();
           return view('admin.pages.students.managestudent',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $departments=Department::all();
          $semesters=Semester::all();
          $shifts=Shift::all();
          return view('admin.pages.students.add_student',
           [
             'departments'=>$departments,
             'semesters'=>$semesters,
             'shifts'=>$shifts
           ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
            $inputData=$request->all();
            $student=new Student();
            $student->create($inputData);
            session()->flash('message','Student Added successfully');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $departments=Department::all();
            $semesters=Semester::all();
            $shifts=Shift::all();
            $student=Student::find($id);
             return view('admin.pages.students.update_student',
             [
               'student'=>$student,
               'departments'=>$departments,
               'semesters'=>$semesters,
               'shifts'=>$shifts
             ]);
    }

    public function update(Request $request,$id)
    {
          $inputData=$request->all();
          $student=Student::find($id);
          $student->update($inputData);
          session()->flash('message','Student Update successfully');
          return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $student=Student::find($id);
                $student->delete();
                session()->flash('message','Student Delete successfully');
                return redirect()->route('student');
    }
}
