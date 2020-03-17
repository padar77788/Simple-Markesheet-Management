<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ShiftRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Shift;
class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shifts=Shift::all();
       return view('admin.pages.shifts.manageshift',['shifts'=>$shifts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pages.shifts.add_shift');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShiftRequest $request)
    {
             $shift=new Shift();
             $inputData=$request->all();
             $shift->create($inputData);
             session()->flash('message','Shift added successfully');
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
          $editShift=Shift::find($id);
          return view('admin.pages.shifts.update_shift',['editShift'=>$editShift]);
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
          $shift=Shift::find($id);
          $shift->update($inputData);
          session()->flash('message','Shift Update successfully');
          return redirect()->route('shift');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $shift=Shift::find($id);
                $shift->delete();
                session()->flash('message','Shift Delete successfully');
                return redirect()->route('shift');
    }
}
