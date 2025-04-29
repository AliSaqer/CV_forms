<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create user</title>
    <link href="{{ asset('Cvassets/formasset/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>CREATE User</h1>
            <button class="btn btn-success" onclick="history.back()">Go Back</button>
        </div>
        <div class="container">

            @include('forms.errors')
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="mt-3">name</label>
                <div class="mt-3">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <label class="mt-3">password</label>
                <div class="mt-3">
                    <input type="password" name="pwd" class="form-control" value="{{ old('pwd') }}">
                </div>
                <label class="mt-3">email</label>
                <div class="mt-3">

                    <input type="text" name="email" class="form-control inmail" placeholder="email"
                        value="{{ old('email') }}">
                </div>

                <button class="btn btn-success mt-3">ADD</button>

            </form>
        </div>
</body>

</html>
<script src="{{ asset('Cvassets/globalassets/jquery-3.7.1.min.js') }}"></script>
<script>
    $('.inmail').on('keyup', function() {
        let txt = $(this).val();

        if (txt.length > 0) {
            console.log(txt);
            $.ajax({
                type: 'GET',
                url: "{{ route('user.checkmail') }}",
                data: {
                    txt: txt
                },
                success: function(res) {
                    if (res == 1) {
                        $('.inmail').removeClass('is-valid');
                        $('.inmail').addClass('is-invalid');
                    } else if (res == 0) {
                        $('.inmail').removeClass('is-invalid');
                        $('.inmail').addClass('is-valid');
                    }
                }
            })
        } else {
            $('.inmail').removeClass('is-valid');
            $('.inmail').removeClass('is-invalid');
        }
    })
</script>
