<?php

namespace App\Http\Controllers;
use App\intern;
use App\department;
use App\attendance;
use Carbon\Carbon;
use DB;


use Illuminate\Http\Request;

class InternController extends Controller
{


  public function __construct()
  {
   $this->middleware('auth');
  }


  public function store() 
  {

    $data = request()->validate(
      [
      'name'=>'required|min:3',
      'address'=> 'required|min:3',
      'department'=> 'required',
      'mobile'=> 'required|max:11|min:11|unique:interns',
    ]);
  

     $date = Carbon::today()->format('Y');
     $dateStr = "$date";
     $InternID = intern::latest('id')->first();
     $random = (rand(100,999));
     $rndm = (rand(10,99));
    
     if(!$InternID)
    {
     $intern = $dateStr . $random . $rndm . +1;
     return $this->createIntern($intern);
    }
     $id = $InternID->id;
      return $this->createIntern($dateStr . $random . $rndm . ($id + 1));
  }	

  public function createIntern($intern)
  {
    $interns= new intern();
     $interns->intern_id = $intern;
     $interns->name = request('name');
     $interns->department_id = request('department');
     $interns->address = request('address');
     $interns->mobile = request('mobile');
     $interns->save();
     return redirect('/intern')->with('toast_success','Intern Added');
  }
  
  public function show()
  {
    $department = department::all();
    $intern = intern::all();
    return view('intern.intern',compact('department','intern'));
  }

  public function show_dtr(Request $request,$id)
  {   
      $search = $request->get('startDate');
      $date = new Carbon($search);  
      $monthNum = $date->format('m');
      $year = $date->format('Y');
      $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); 
    


      $info = intern::where('id','=',$id)->first(); 
      $intern = attendance::where('intern_id','=',$id)
      ->orderBy('created_at','asc')
      ->whereMonth('created_at', '=',$monthNum)
      ->whereYear('created_at','=',$year)
      ->get();
      
     return view('intern.show')->with(compact('intern','info','monthName','year'));
  }

}
