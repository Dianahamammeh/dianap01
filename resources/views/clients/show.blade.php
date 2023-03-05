<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
<body>

    <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Client Show</h3>
                </div>
                <div class="">
                    <a href="{{ route('clients.edit',$client) }}"><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                </div>
            </div>
                    <h6> Information</h6>
                    <hr class="my-1">
                    <div class="d-flex justify-content-between">
                        <label class="">Full_Name :</label>
                        <span class="text-primary">{{ $client->full_name }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Email  :</label>
                        <span class="text-primary">{{ $client->email }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Password :</label>
                        <span class="text-primary">{{ $client->password }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Phone_Name :</label>
                    <span class="text-primary">{{ $client->phone_number}}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="">Property :</label>
                        <span class="text-primary">{{ $client->property  }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> 