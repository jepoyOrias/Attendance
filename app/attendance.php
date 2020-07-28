<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    

    public function intern(){
        return $this->belongsTo('App\Intern');
    }

}
