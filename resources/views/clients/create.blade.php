
@extends('layouts.index')
 
@section('content')

    
    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Create Client</h3>
                </div>
                <div class="">
                    <a href="{{ route('clients.index') }}"><button class="btn btn-primary"><i class="fa fa-list"></i> Client List</button></a>
                </div>
            </div>
            <hr class="my-1">
            <form action="{{ route('clients.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                      <label for="">Full_Name</label>
                      <input type="text" name="full_name" class="form-control" placeholder="Enter name here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Email </label>
                      <input type="email" name="email" class="form-control" placeholder="Enter email here..">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                      <label for="">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter passowrd here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Phone_Number</label>
                      <input type="number" name="phone number" class="form-control" placeholder="Enter phone number here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Property</label>
                      <input type="name" name="property" class="form-control" placeholder="Enter property here..">
                    </div>
                </div>
                <div class="my-2">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
{{-- </body>
</html>  --}}

@endsection