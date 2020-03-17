<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name','roll','registration','department_id','semester_id','shift_id','f_name','m_name','dob','religion','gender','session'];


    public function department(){
                return $this->belongsTo(Department::class);
    }

    public function semester(){
                return $this->belongsTo(Semester::class);
    }
    public function shift(){
                return $this->belongsTo(Shift::class);
    }
    public function result(){
               return $this->belongsTo(Result::class);
    }
}
