@extends('layouts.layout')
@section('title','Intern')

@section('content')

<div class="container py-4">
    <div class="card">
        <div class="card-header"><strong>Restore Information</strong></div>
        <div class="card-body">
            <div class="mb-4">

            </div>
            <div class="my-4">
                <table class="table table-hover table-responsive-lg" id="internTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Mobile No.</th>
                            <th>Restore</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($interns as $intern) 
                        <tr>
                            <td>{{$intern->intern_id}}</td>
                            <td>{{$intern->name}}</td>
                            <td>{{$intern->department->dept_name}}</td>
                            <td>{{$intern->mobile}}</td>
                            <td><a href="/passdata{{$intern->id}}" onclick="return confirm('Are you sure, do you want to restore?')" class="btn btn-warning"><i class="fas fa-trash"></i>Restore</a>
                              </td>
                             @endforeach
                        </tr>
                      </tbody>

                </table>    
            </div>
        </div>
    </div>
</div>
 
@endsection