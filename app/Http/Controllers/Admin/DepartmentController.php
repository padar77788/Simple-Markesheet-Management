<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $departments=Department::all();
       return view('admin.pages.departments.managedepartment',['departments'=>$departments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pages.departments.add_department');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
             $department=new Department();
             $inputData=$request->all();
             $department->create($inputData);
             session()->flash('message','Department added successfully');
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
          $editDepartment=Department::find($id);
          return view('admin.pages.departments.update_department',['editDepartment'=>$editDepartment]);
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
          $department=Department::find($id);
          $department->update($inputData);
          session()->flash('message','Department Update successfully');
          return redirect()->route('department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $department=Department::find($id);
                $department->delete();
                session()->flash('message','Department Delete successfully');
                return redirect()->route('department');
    }
}
