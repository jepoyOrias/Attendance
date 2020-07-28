<?php

namespace App\Http\Controllers;
use App\attendance;
use App\intern;
use App\department;
use App\Employee;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/dashboard');
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|min:3',
        ]);
        
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        

        $id = request('id');
        $checkinternId = intern::where('intern_id','=',$id)->first();
            if(!$checkinternId){
                return back()->with('toast_warning', 'ID not recognized');
            }  
                $time  = attendance::where('intern_id','=',$checkinternId->id)->get(); 
                foreach($time as $timeid){
                    if($timeid->intern_id == $checkinternId->id){
                        if($timeid->created_at->format('d-m-y') == Carbon::now()->format('d-m-y')){ 
                            return back()->with('toast_warning', 'You have already Timed-in');
                        }
                    }
                }
        $store = new Attendance();
        $store->intern_id = $checkinternId->id;
        $store->time_in = request('time');
        $store->save();
        return redirect('/')->with('success','Timed-in Successfully!'); 
        
        // return back();

    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|min:3',
        ]);
        
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $id = request('id');
        $checkinternId = intern::where('intern_id','=',$id)->first();
        if(!$checkinternId){
            return back()->with('toast_warning', 'ID not recognized');
        }
                $time_out = Attendance::where('intern_id','=',$checkinternId->id)->latest()->first();
                if(!$time_out){     
                    return back()->with('toast_warning', 'ID is not recognized');
                }
                if($time_out->created_at->format('d-m-y') != Carbon::now()->format('d-m-y')){
                    return back()->with('toast_warning', 'failed to time-out. Record has been marked as absence'); 
                }
                if($time_out->Time_out != null){
                    return back()->with('toast_warning', 'You have already Timed-out.');
                }       
              
                $time_out->time_out = request('time');
                $time_out->save();
                return redirect('/')->with('success','Timed-out Successfully! See you tommorow.');
       
    }



}
