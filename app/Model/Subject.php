<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['title','subject_code','subject_credit','department_id','semester_id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function results(){
      return $this->hasMany(Result::class);

    }
}
