<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  protected $fillable=['department_id','semester_id','credit','roll','subject','marks','grade','gpa'];

public function department(){
    return $this->belongsTo(Department::class);
}

public function semester(){
    return $this->belongsTo(Semester::class);
}

public function shift(){
  return $this->belongsTo(Shift::class);

}

public function subject(){
  return $this->belongsTo(Subject::class);
}
public function student(){
   return $this->hasOne(Student::class);
}
}
