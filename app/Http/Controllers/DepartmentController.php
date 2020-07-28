<?php

namespace App\Http\Controllers;
use App\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class DepartmentController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth');
    }

    public function show(){

        $department = department::all(); 
        return view('department.department')->with('department', $department);
    }
    
    
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'dept_name' => 'required',
        ]);
          
            
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all('Deparment name cannot be empty')[0]);
        }
        
        $dept_name = request('dept_name');
        $checkDepartment = department::where('dept_name','=',$dept_name)->first();
        
        if($checkDepartment){
            return back()->with('toast_warning', 'This Department is already in the Table Below');
        }
        $department = new department();
        $department->dept_name  = ucwords($dept_name);
        $department->save();
        return back()->with('toast_success','Department Added');
    }
}
