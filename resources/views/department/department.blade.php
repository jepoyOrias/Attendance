@extends('layouts.layout')
@section('title','Department')
@section('content')

    <div class="container py-4">
        <div class="card">
            <div class="card-header"><strong>Department</strong></div>
            <div class="card-body">
                <div class="mb-4">
                    <form class="form-inline" action="/department" method="POST">
                        @csrf                       
                         <div class="form-group mb-2 mx-1">
                          <label for="">Department Name :</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <input type="text" name="dept_name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-plus"></i> Add Department</button>
                    </form>
                    <hr>
                </div>
                
                <div class="my-4">
                    <table class="table table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>Department Name</th>
                                <th>Date Created</th>
                                <th>View</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department as $departments)
                            <tr>
                                <td>{{$departments->dept_name}}</td>
                                <td>{{$departments->created_at->format('M-d-y')}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm text-white mx-2"> 
                                    <i class="fa fa-eye"></i> View </a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm text-white"> 
                                    <i class="fa fa-edit"></i> Edit </a>
                                </td>                 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection