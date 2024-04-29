<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form 2</title>
    <link href="{{asset('Cvassets/formasset/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

        <div class="container mt-5">
            <form action="{{route('form3_data')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('forms.errors')
                <h2>submit your CV</h2>
                <label class="mb-3">your name</label>
                <input type="text" name="name" class="form-control mb-3" placeholder="your name">
                <input type="file" name="cv" class="form-control" >
                <button name="btn" class="btn btn-dark w-100 mt-5 mb-5 btn-send">Send</button>
            </form>
        </div>

    <script src="{{asset('Cvassets/formasset/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
