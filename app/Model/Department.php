<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $fillable=['title'];
     public  $timestamps=false;

     public function subjects(){
         return $this->hasMany(Subject::class);
     }

     public function student(){
         return $this->belongsTo(Student::class);
     }
     public function results(){
       return $this->hasMany(Result::class);

     }
     public function semester(){
       return $this->hasMany(Semester::class);

     }
}
