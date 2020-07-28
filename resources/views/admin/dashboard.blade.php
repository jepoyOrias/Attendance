@extends('layouts.layout')
@section('title','Home')
@section('content') 
        
          <div class="container p-4">
          <h5>Dashboard<hr class="mt-0"></h5>
            
            <div class="card-deck">  
              <div class="card shadow text-white" style="background: #015eeb;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <i class="fa fa-users fa-3x mx-2"></i>
                      <p class="mt-2">Departments</p>
                    </div>
                    <div class="col-3 py-2">
                      <h1>{{$departmentCount}}</h1>
                    </div>
                  </div>      
                </div>
              </div>
              <div class="card text-white shadow" style="background: #f4a000;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <i class="fa fa-user-tie fa-3x mx-2"></i>
                      <p class="mt-2">Employees</p>
                    </div>
                    <div class="col-3  py-2">
                      <h1>{{$employeeCount}}</h1>
                    </div>
                  </div>
                                
                </div>
              </div>
              <div class="card text-white shadow" style="background: #00ab69;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-9">
                      <i class="fa fa-user-graduate fa-3x mx-1"></i>
                      <p class="mt-2">Interns</p>
                    </div>
                    <div class="col-3 py-2">
                      <h1>{{$internCount}}</h1>
                    </div>
                  </div>
                    
                </div>
              </div>
            </div>
            
            <div class="card my-4">
            <div class="card-header"> 
              <strong>Attendances :</strong> 
              <div style="float: right;">{{Carbon\Carbon::today()->format('D. M, d Y')}}</div> 
            </div> 
              <div class="card-body">
                <table class="table table-hover table-bordered table-responsive-lg text-center rounded" id="dashboardTable">
                    <thead>
                     
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Time-in</th>
                          <th scope="col">Time-out</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($attendance as $attendances)
                        <tr>
                          <td>{{$attendances->intern->intern_id}}</td>
                          <td>{{$attendances->intern->name}}</td>
                          <td>{{date("h:i a",strtotime($attendances->Time_in))}}</td>
                            @if ($attendances->Time_out == null)
                              <td>{{$attendances->Time_out}}</td>
                            @else
                              <td>{{date("h:i a",strtotime($attendances->Time_out))}}</td>
                            @endif
                        </tr>
                      @endforeach
                    </tbody>     
                </table>
              </div>
            </div>
          </div>
@endsection 