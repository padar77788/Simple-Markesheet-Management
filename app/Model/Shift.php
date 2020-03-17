<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable=['title'];

    public function student(){
        return $this->belongsTo(Student::class);
}

public function results(){
  return $this->hasMany(Result::class);

}
}
