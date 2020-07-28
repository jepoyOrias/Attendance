<?php

namespace App\Http\Controllers;
use App\Employee;
use App\department;
use App\Intern;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class EmployeeConrtoller extends Controller
{

  public function __construct()
  {
   $this->middleware('auth');
  }

  
  public function store() 
  {


    $data = request()->validate(
      [
      'employee_name'=>'required|min:3',
      'address'=> 'required|min:3',
      'mobile'=> 'required|min:11|unique:employees' ,
    ]);


     $date = Carbon::today()->format('y');
     $dateStr = "$date";
     $EmployeeID = Employee::latest('id')->first();
     $random = (rand(10,100));
     $rndm = (rand(10,99));
     
    if(!$EmployeeID)
    {
     $employee = "2019" . $random . $dateStr . $rndm . +1;
     return $this->createEmployee($employee);
    }
     $id = $EmployeeID->id;
      return $this->createEmployee("2019" . $random .$dateStr . $rndm . ($id + 1));
  }	

  public function createEmployee($employee)
  {
    $employees= new Employee();
     $employees->employee_id = $employee;
     $employees->name = request('employee_name');
     $employees->department_id = request('department');
     $employees->address = request('address');
     $employees->mobile = request('mobile');
     $employees->save();
     return redirect('/employee')->with('toast_success','Employee Added');
  }
    public function show(){
        $department = department::all();
        $employee = Employee::all();
        return view('employee.employee',compact('department','employee'));
    }

}
