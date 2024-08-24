<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form 2</title>
    <link href="{{ asset('Cvassets/formasset/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('form2_data') }}" method="POST">
            @csrf

            <h2>Personal Info</h2>

            {{-- @dump($errors) --}}
            {{-- @dump($w->all())
            @dump($errors->any()) --}}

            {{-- @include('forms.errors') --}}


            <div class="mb-3">
                <label>name</label>
                <input type="text" name="name" id="inputName"
                    class="form-control @error('name') is-invalid @enderror " placeholder="name"
                    @error('name')
                        autofocus
                    @enderror
                    value="{{ old('name', 'ahmed') }}">
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="email" @error('email') autofocus @enderror value="{{ old('email') }}">
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    placeholder="phone" @error('phone') autofocus @enderror value="{{ old('phone') }}">
                @error('phone')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror

            </div>


            <div class="mb-3">
                <label>Date Of Birth</label>
                <input type="date" name="dob"
                    class="form-control @error('dob')
                    is-invalid
                    @enderror"
                    placeholder="date of birth"
                    @error('dob')
                        autofocus
                    @enderror
                    value="{{ old('dob') }}">
                @error('dob')
                    <small class="invlaid-feedback">{{ $message }}</small>
                @enderror
            </div>

            {{-- <div class="mb-3">
                    <label>age</label>
                    <input type="number" name="age" class="form-control @error('age')
                        is-invalid
                    @enderror" placeholder="age" @error('age')
                        autofocus
                    @enderror value="{{old('age')}}">
                    @error('age')
                        <small class="invlaid-feedback">{{$message}}</small>
                    @enderror
                </div> --}}


            <div class="mb-3">
                <label>start fucking</label>
                <input type="date" name="start"
                    class="form-control @error('start')
                        is-invlaid
                    @enderror"
                    placeholder="start fucking"
                    @error('start')
                        autofocus
                    @enderror
                    value="{{ old('start') }}">
                @error('start')
                    <small class="invlaid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>end fucking</label>
                <input type="date" name="end"
                    class="form-control @error('end')
                        is-invalid
                    @enderror"
                    placeholder="end fucking"
                    @error('end')
                        autofocus
                    @enderror
                    value="{{ old('end') }}">
                @error('end')
                    <small class="invlaid-feedback">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label>Gender</label><br>
                <input type="radio" name="gender" id="male" value="male" @checked(old('gender' == 'male'))><label
                    for="male">male</label><br>
                <label><input type="radio" name="gender" value="female"
                        {{ old('gender') == 'female' ? 'checked' : '' }}> female</label>
            </div>

            <div class="mb-3">
                <label for="">Level of education</label>
                <select name="education" class="form-control">
                    <option value="">--select--</option>
                    <option {{ old('education') == 'high_school' ? 'selected' : '' }} value="high_school">high school
                    </option>
                    <option @selected(old('education') == 'deploma') value="deploma">deploma</option>
                    <option @selected(old('education') == 'bachelor') value="bachelor">bachelor</option>
                    <option @selected(old('education') == 'PHD') value="PHD">PHD</option>
                </select>
            </div>


            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio"
                    class="form-control
                        @error('bio')
                            is-invalid
                        @enderror"
                    @error('bio')
                            autofocus
                        @enderror rows="5">{{ old('bio') }}</textarea>
                @error('bio')
                    <small class="invlaid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-info w-100 mb-5 btn-send">send</button>


        </form>
    </div>


    <script src="{{ asset('Cvassets/js/formscript.js') }}"></script>
    <script src="{{ asset('Cvassets/formasset/bootstrap.bundle.min.js') }}"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
