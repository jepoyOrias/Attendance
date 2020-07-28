@extends('layouts.layout')
@section('title','Intern')

@section('content')

<div class="container py-4">
    <div class="card">
        <div class="card-header"><strong>Intern</strong></div>
        <div class="card-body">
            <div class="mb-4">
               <button class="btn btn-primary" data-toggle="modal" data-target="#add_intern">
                   <i class="fa fa-plus"></i> Add Intern
                </button>
                <hr>
            </div>
            <div class="my-4">
                <table class="table table-hover table-responsive-lg" id="internTable">
                    <thead>
                        <tr>  
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Mobile No.</th>
                            <th>DTR</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($intern as $interns)
                        <tr>
                            <td>{{$interns->intern_id}}</td>
                            <td>{{$interns->name}}</td>
                            <td>{{$interns->department->dept_name}}</td>
                            <td>{{$interns->mobile}}</td>
                            <td>

                                <a href="show/{{$interns->id}}" class="btn btn-primary btn-sm text-white"> <i class="fa fa-eye"></i> View</a>
                            </td>
                            <td>
                                <a  href="/intern{{$interns->id}}" class="btn btn-success btn-sm text-white ml-2"  > 
                                    <i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                <a href="/dest{{$interns->id}}"  onclick="return confirm('Are you sure, do you want to delete?')" class="btn btn-danger btn-sm text-white"> <i class="fa fa-trash"></i> Delete</a>

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
          <h5 class="modal-title" id="exampleModalLabel">Add Intern</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/intern" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Intern Name</label>
                    <input required type="text" name="name" value="{{old('name')}}" class="form-control">
                    <div>{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department">
                        <option selected disabled>Choose...</option>
                        @foreach ($department as $department)
                        <option value="{{$department->id}}">{{$department->dept_name}}</option>
                        @endforeach
                    </select>
                    <div>{{ $errors->first('department') }}</div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input required type="text" name="address" value="{{old('address')}}" class="form-control">
                    <div>{{ $errors->first('address') }}</div>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input required type="text" name="mobile" value="{{old('mobile')}}" class="form-control">
                    <div>{{ $errors->first('mobile') }}</div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>

@endsection



