<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subject;
use App\Model\Department;
use App\Model\Semester;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $subjects=Subject::all();
       return view('admin.pages.subjects.managesubject',['subjects'=>$subjects]);

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
      return view('admin.pages.subjects.add_subject',
      [
        'departments'=>$departments,
        'semesters'=>$semesters
      ]
    );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
             $createSubject=new Subject();
             $inputData=$request->all();
             $createSubject->create($inputData);
             session()->flash('message','Subject added successfully');
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
    public function edit($id,$slug)
    {
          $departments=Department::all();
          $semesters=Semester::all();
          $editSubject=Subject::find($id);
          return view('admin.pages.subjects.update_subject',[
            'editSubject'=>$editSubject,
            'departments'=>$departments,
            'semesters'=>$semesters
          ]
          );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$slug)
    {
          $inputData=$request->all();
          $subject=Subject::find($id);
          $subject->update($inputData);
          session()->flash('message','Subject Update successfully');
          return redirect()->route('subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $subject=Subject::find($id);
                $subject->delete();
                session()->flash('message','Subject Delete successfully');
                return redirect()->route('subject');
    }
}
