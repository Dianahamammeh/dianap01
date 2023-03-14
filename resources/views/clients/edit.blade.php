
@extends('layouts.index')
 
@section('content')
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    label{
        font-weight: 600;
    }
</style>

</head>
<body> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Update Client</h3>
                </div>
            </div>
            <hr class="my-1">
            <form action="{{ route('clients.update', $clients->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                      <label for="">Full_Name</label>
                      <input type="text" name="full_name" class="form-control" placeholder="Enter name here.." value="{{ $clients->full_name }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Email </label>
                      <input type="email" name="email" class="form-control" placeholder="Enter email here.." value="{{ $clients->email}}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                      <label for="">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter passowrd here.."value="{{ $clients->password}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Phone Number</label>
                      <input id="phone_number" type="tel" name="phone_number" class="form-control" placeholder="Enter phone number here.."value="{{ $clients->phone_number}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <label for="">Property</label>
                      <input type="name" name="property" class="form-control" placeholder="Enter property here.."value="{{ $clients->property}}">
                    </div>
                </div>
                <div class="my-2">
                    <button type="submit" class="btn btn-success w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
{{-- </body>
</html>  --}}
@push('js')
<script>

var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
  separateDialCode: true,
  preferredCountries:["in"],
  hiddenInput: "full",
  utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

$("form").submit(function() {
  var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
  $('#phone_number').val(full_number)
});

    
    
            </script>
@endpush
@endsection