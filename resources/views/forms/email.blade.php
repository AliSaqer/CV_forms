<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form 2</title>
    <link href="{{asset('Cvassets/formasset/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <style>
        textarea{
            resize: none;
        }
    </style>
  </head>
  <body>

        <div class="container mt-5">
            <h2>Email card</h2>
            <form action="{{route('email_data')}}" method="POST" class="card p-3">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        {{-- name --}}
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror" value="{{old('name')}}"/>
                            @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        {{-- //email --}}
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control @error('email')
                            is-invalid
                            @enderror" name="email" value="{{old('email')}}" />
                            @error('email')
                                <span class="invlaid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- //phone --}}
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" class="form-control @error('phone')
                            is-invalid
                            @enderror" name="phone" value="{{old('phone')}} "/>
                            @error('phone')
                                <span class="invlaid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        {{-- //subject --}}
                        <div class="mb-3">
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control @error('subject')
                            is-invalid
                            @enderror" value="{{old('subject')}} "/>
                            @error('subject')
                                <span class="invlaid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- //message --}}
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="">Message</label>
                            <textarea name="message" class="form-control @error('message')
                            is-invalid
                            @enderror" cols="30" rows="5" />{{old('message')}}</textarea>
                            @error('message')
                                <span class="invlaid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- //button --}}
                    <div class="col-md-12">
                        <button class="btn btn-success px-5"><i class="fa-solid fa-paper-plane"></i>  send</button>
                    </div>
                </div>

            </form>
        </div>
    </form>
    <script src="{{asset('Cvassets/formasset/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
