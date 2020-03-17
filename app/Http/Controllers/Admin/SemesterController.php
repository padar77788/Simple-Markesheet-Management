<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\SemesterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Semester;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $semesters=Semester::all();
       return view('admin.pages.semesters.managesemester',['semesters'=>$semesters]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pages.semesters.add_semester');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterRequest $request)
    {
             $createSemester=new Semester();
             $inputData=$request->all();
             $createSemester->create($inputData);
             session()->flash('message','Semester added successfully');
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
          $editSemester=Semester::find($id);
          return view('admin.pages.semesters.update_semester',['editSemester'=>$editSemester]);
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
          $semester=Semester::find($id);
          $semester->update($inputData);
          session()->flash('message','Semester Update successfully');
          return redirect()->route('semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $semester=Semester::find($id);
                $semester->delete();
                session()->flash('message','Semester Delete successfully');
                return redirect()->route('semester');
    }
}
