<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form 2</title>
    <link href="{{asset('Cvassets/formasset/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        {{$yob}}
        <div class="container mt-5">
            <h2>Personal Info</h2>
            <div class="mb-2">
                <div class="alert alert-success">
                    <p><b>name: </b>{{$name}}</p>
                    <p><b>phone: </b>{{$phone}}</p>
                    <p><b>dob: </b>{{$dob}}</p>
                    <p><b>age: </b>{{$age}}</p>
                    <p><b>email: </b>{{$email}}</p>
                    <p><b>startFucking: </b>{{$start}}</p>
                    <p><b>endFucking: </b>{{$end}}</p>
                </div>
            </div>

        </div>
    </form>
    <script src="{{asset('Cvassets/formasset/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
