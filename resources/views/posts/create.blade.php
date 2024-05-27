<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="{{ asset('Cvassets/formasset/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>All Posts</h1>
            <button class="btn btn-success" onclick="history.back()">Go Back</button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('Post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="title">
            </div>

            <div class="mb-3">
                <label>email</label>
                <input type="text" name="email" class="form-control" placeholder="email">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" id="mytextarea" rows="5"></textarea>
            </div>

            <button class="btn btn-success">ADD</button>

        </form>

    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

</html>
