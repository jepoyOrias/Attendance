<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{

    public function interns(){
        return $this->hasMany('App\Intern');
    }
    
}
