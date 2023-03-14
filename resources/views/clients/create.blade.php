
@extends('layouts.index')
 
@section('content')

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
                      <label for="">Phonen Number</label>
                      <input id="phone_number" type="tel" name="phone_number" class="form-control" placeholder="Enter phone number here..">
                    
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
    {{-- <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
          utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            
           // Default:'Syria'
           
        });
        
      </script> --}}
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
$("input[name='phone_number[full]'").val(full_number);
  $('#phone_number').val(full_number)
});



        </script>
{{-- </body>
</html>  --}}
@endpush
@endsection