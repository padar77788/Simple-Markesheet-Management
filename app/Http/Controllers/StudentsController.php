<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    
    public function index()
    {
    	$allStudents = Student::all();
    	$a = "hello word";
    	$arr = [ 
    		'msg' => $a,
    		'students' => $allStudents,
    	];

    	return view('students.index', $arr);
    }


    public function create()
    {
        $md = 'create';
    	return view('students.form', ['mode' => $md]);
    }
 

    public function store( Request $request )
    {
    	$data = $request->all();
    	Student::create($data);
        flash("Created Successfully")->success();
        return redirect()->to('students');
    }


    public function edit( $id )
    {
        $student = Student::find($id);
        $md = 'edit';
        return view('students.form', ['mode' => $md, 'std' => $student]);
    }


    public function update( Request $req, $id )
    {
        $data = $req->all();
        $student = Student::find($id);
//        $student->name = $data['name'];
//        $student->email = $data['email'];
//        $student->save();
        flash("Updated Successfully")->warning();
        $student->update($data);

        return redirect()->to('students');
    }

    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->to('students');
    }

}
