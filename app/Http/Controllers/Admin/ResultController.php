<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Model\Result;
use App\Model\Department;
use App\Model\Shift;
use App\Model\Subject;
use App\Model\Semester;
use App\Model\Student;
use PDF;
use DB;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $results=Result::select('roll','semester_id','department_id')->distinct()->orderBy('roll')->get();
      return view('admin.pages.results.manage_result',['results'=>$results]);

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
          $subjects=Subject::all();
          return view('admin.pages.results.add_result',[
                    'departments'=>$departments,
                    'semesters'=>$semesters,
                    'shifts'=>$shifts,
                    'subjects'=>$subjects
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    {
                $metechRoll=Student::where('roll',$request->roll)->count();
               if($metechRoll==0){
                 session()->flash('message','No Student Found in this roll !!!');
                 return redirect()->back();
               }else{
                 $inputData=$request->all();
                 $marks=$request->marks;
                 if($request->credit=='2'){
                    $grade=$this->grade1($marks);
                    $gpa=$this->gpa1($marks);
                 }elseif($request->credit=='4'){
                    $grade=$this->grade2($marks);
                    $gpa=$this->gpa2($marks);
                 }
               
                 $result=new Result();
                 $result->department_id=$request->department_id;
                 $result->semester_id=$request->semester_id;
                 $result->credit=$request->credit;
                 $result->roll=$request->roll;
                 $result->subject_id=$request->subject_id;
                 $result->marks=$request->marks;
                 $result->grade=$grade;
                 $result->gpa=$gpa;
                 $result->save();
                 session()->flash('message','Result Added successfully');
                 return redirect()->back();
               }



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
            $results=Result::where('roll', $id)->get();
           return view('admin.pages.results.result_list',['results'=>$results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit_per_subject_result($id){
              $result=new Result();
             $subjects=Subject::all();
              $per_result=Result::find($id);
             return view('admin.pages.results.update_per_subject_result',
             [
               'per_result'=>$per_result,
               'subjects'=>$subjects

             ]);


     }
    public function update(Request $request, $id)
    {

                 $result=Result::find($id);
                 $inputData=$request->all();
                 $inputData['grade']=$this->grade($request->marks);
                 $inputData['gpa']=$this->gpa($request->marks);
                 $result->update($inputData);
                 session()->flash('message','Result Update successfully');
                 return  redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $result=Result::where('roll',$id);
          $result->delete();
          \session()->flash('message','Result Delete successfully');
          return redirect()->route('result');
    }

    public function grade1($marks){
      if($marks>79 && $marks<=100){
          return 'A+';
      }

      elseif ($marks>74 && $marks<80) {
          return 'A';
      }

      elseif ($marks>69 && $marks<75) {
          return 'A-';
      }

      elseif ($marks>64 && $marks<70) {
          return 'B+';
      }
      elseif ($marks>59 && $marks<65) {
          return 'B';
      }

      elseif ($marks>54 && $marks<60) {
          return 'B-';
      }
      elseif ($marks>49 && $marks<55) {
            return 'C+';
        }

        elseif ($marks>44 && $marks<40) {
            return 'C';
        }

        elseif ($marks>39 && $marks<45) {
            return 'D';
        }
        elseif ($marks>0 && $marks<40) {
            return 'F';
        }
    }


    public function gpa1($marks){
      if($marks>79 && $marks<=100){
          return '4';
      }

      elseif ($marks>74 && $marks<80) {
          return '3.75';
      }

      elseif ($marks>69 && $marks<75) {
          return '3.5';
      }

      elseif ($marks>64 && $marks<70) {
          return '3.25';
      }
      elseif ($marks>59 && $marks<65) {
          return '3.00';
      }

      elseif ($marks>54 && $marks<60) {
          return '2.75';
      }
      elseif ($marks>49 && $marks<55) {
            return '2.5';
        }

        elseif ($marks>44 && $marks<40) {
            return '2.25';
        }

        elseif ($marks>39 && $marks<45) {
            return '2';
        }
        elseif ($marks>0 && $marks<40) {
            return '0';
        }
    }
    public function grade2($marks){
        if($marks>149 && $marks<=200){
            return 'A+';
        }
  
        elseif ($marks>139 && $marks<150) {
            return 'A';
        }
  
        elseif ($marks>129 && $marks<140) {
            return 'A-';
        }
  
        elseif ($marks>119 && $marks<130) {
            return 'B+';
        }
        elseif ($marks>109 && $marks<120) {
            return 'B';
        }
  
        elseif ($marks>99 && $marks<110) {
            return 'B-';
        }
        elseif ($marks>89 && $marks<100) {
              return 'C+';
          }
  
          elseif ($marks>79 && $marks<90) {
              return 'C';
          }
  
          elseif ($marks>69 && $marks<80) {
              return 'D';
          }
          elseif ($marks>0 && $marks<70) {
              return 'F';
          }
  
      
      }
  
  
      public function gpa2($marks){
        if($marks>149 && $marks<=200){
            return '4';
        }
  
        elseif ($marks>139 && $marks<150) {
            return '3.75';
        }
  
        elseif ($marks>129 && $marks<140) {
            return '3.50';
        }
  
        elseif ($marks>119 && $marks<130) {
            return '3.25';
        }
        elseif ($marks>109 && $marks<120) {
            return '3.00';
        }
  
        elseif ($marks>99 && $marks<110) {
            return '2.75';
        }
        elseif ($marks>89 && $marks<100) {
              return '2.50';
          }
  
          elseif ($marks>79 && $marks<90) {
              return '2.25';
          }
  
          elseif ($marks>69 && $marks<80) {
              return '2.00';
          }
          elseif ($marks>0 && $marks<70) {
              return 'F';
          }
  
  
      }

    public function viewResult($roll,$semester){
          $student=Student::where('roll','=',$roll)->get();
         $results=Result::where('roll', $roll)->where('semester_id','=',$semester)->get();
         return view('admin.pages.results.view_marksheet',
         [
           'student'=>$student,
           'results'=>$results
         ]);
    }

    public function printResult($roll,$semester){

           $student=Student::where('roll','=',$roll)->get();
          $results=Result::where('roll', $roll)->where('semester_id','=',$semester)->get();
         $pdf=PDF::loadView('admin.pages.results.print_result', ['student'=>$student,
         'results'=>$results]);
         return $pdf->download('invoice.pdf');;
    }


    public function resultSubject(Request $request){

            $subjects=Subject::where('department_id',$request->id)->where('semester_id',$request->sid)->get();

            foreach ($subjects as $key => $subject) {?>

                  <option value="<?php echo $subject->id ?>"><?php echo $subject->title ?></option>
           <?php }

          }
public function individual_marksheet(){
                  $semesters=Semester::all();
                  return view('admin.pages.results.individual_marksheet',['semesters'=>$semesters]);
}
public function view_individual_marksheet(Request $request){
                 $metech_individualRoll=Student::where('roll',$request->roll)->where('semester_id',$request->semester_id)->count();
                 if($metech_individualRoll==0){
                   session()->flash('message','No Student Found in this roll !!!');
                   return redirect()->back();
                 }else{
                   $student=Student::where('roll','=',$request->roll)->get();
                   $results=Result::where('roll', $request->roll)->where('semester_id','=',$request->semester_id)->get();
                   return view('admin.pages.results.view_individual_marksheet',
                   [
                     'student'=>$student,
                     'results'=>$results
                   ]);
                   }

                }

}
