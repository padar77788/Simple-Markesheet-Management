<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable=['title'];
    public function subjects(){
      return $this->hasManay(Subject::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
}
public function department(){
    return $this->belongsTo(Department::class);
}

public function results(){
  return $this->hasMany(Result::class);

}
}
