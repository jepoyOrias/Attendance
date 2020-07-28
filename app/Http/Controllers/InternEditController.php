<?php

namespace App\Http\Controllers;
use App\Intern;
use App\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class InternEditController extends Controller
{
    public function view($id)
    {

     $id = Intern::find($id);
     Return view('intern.edit')->with('interns',$id);
    }
    public function update($id)
    {
        $data = request()->validate(
     [
        'name'=>'required|min:3',
        'address'=> 'required|min:3',
        'mobile'=> "required|max:11|min:11|unique:interns,mobile,$id",
    ]);
      $interns = Intern::find($id); 
      $interns->name = request('name');
      $interns->address = request('address');
      $interns->mobile = request('mobile');
      $interns->save();
      return redirect('intern');

}
  //******* R E S T O R E *********//
//okay na

public function destroy($id){
    $interns = Intern::find($id)->delete();
    return redirect('intern');
   }

public function passingdata($id){
    $interns = Intern::withTrashed()
    ->find($id)->restore();
    return redirect('intern');
  }

  public function restoredata(){
    $interns = Intern::onlyTrashed()->get();
    return view('intern.restore')->with('interns',$interns);
  }
}


