<?php

namespace App\Http\Controllers;
use App\attendance;
use App\intern;
use App\department;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }

    public function show(){
       
        $date = Carbon::now()->format('d-m-y');
        $internCount = intern::count();
        $departmentCount = department::count();
        $employeeCount = employee::count();

        $attendance = attendance::
        whereDate('created_at', Carbon::today())
        ->orderBy('Time_in','DESC')
        ->get();

        return view('admin.dashboard')->with(compact('internCount','departmentCount','employeeCount','attendance'));
    }

 
}
