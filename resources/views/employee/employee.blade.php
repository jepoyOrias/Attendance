@extends('layouts.layout')
@section('title','Employee')
@section('content')

<div class="container py-4">
    <div class="card">
        <div class="card-header"><strong>Employee</strong></div>
        <div class="card-body">
            <div class="mb-4">
               <button class="btn btn-primary" data-toggle="modal" data-target="#add_intern">
                   <i class="fa fa-plus"></i> Add Employee
                </button>
                <hr>
            </div>
            <div class="my-4">
                <table class="table table-hover table-responsive-lg" id="employeeTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Mobile No.</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $employees)
                        <tr>
                            <td>{{$employees->employee_id}}</td>
                            <td>{{$employees->name}}</td>
                            <td>{{$employees->department->dept_name}}</td>
                            <td>{{$employees->mobile}}</td>
                            <td>
                                <a class="btn btn-success btn-sm text-white"> <i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm text-white"> <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</div>
 
<!-- Modal -->
<div class="modal fade" id="add_intern">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/employee" method="POST">
        
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input required type="text" name="employee_name" value="{{old('employee_name')}}" class="form-control">
                    <div>{{ $errors->first('employee_name') }}</div>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department">
                        @foreach ($department as $department)
                        <option value="{{$department->id}}">{{$department->dept_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input required type="text" name="address" value="{{old('address')}}" class="form-control">
                    <div>{{ $errors->first('address') }}</div>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input required type="text" name="mobile" value="{{old('mobile')}}"  class="form-control">
                    <div>{{ $errors->first('mobile') }}</div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
@csrf
            </div>
        </form>
      </div>
    </div>
</div>   

@endsection