<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Intern extends Model
{

 use softDeletes;


    public function department(){

         return $this->belongsTo('App\Department');
    }

    public function attendances(){

        return $this->hasMany('App\Attendance');
   }


   
}
