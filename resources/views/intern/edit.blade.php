@extends('layouts.layout')
@section('title','Edit Information')

@section('content')

<form action="/intern{{$interns->id}}" method="POST">
    {{csrf_field()}}
        <div class="container py-4">
            <div class="card">
                <div class="card-header"><strong>Edit Information</strong></div>
                <div class="card-body">
                    <div class="mb-4">
                        </div>
                            <div class="my-4">
                    
                            <div class="form-group">
                                <label for="name">Intern Name</label>
                                <input required type="text" name="name" value="{{$interns->name}}" class="form-control">
                                <div>{{ $errors->first('name') }}</div>
                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>
                                <input required type="text" name="address" value="{{$interns->address}}" class="form-control">
                                <div>{{ $errors->first('address') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input required type="text" name="mobile" value="{{$interns->mobile}}" class="form-control">
                                <div>{{ $errors->first('mobile') }}</div>
                            </div>       
                        </div>
                            <a class="btn btn-secondary" href="/intern" style="color: white" ><i class="fas fa-arrow-circle-left"></i> Back </a></button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            @csrf
                        </div>
            </div>
    </div>
</form>
@endsection