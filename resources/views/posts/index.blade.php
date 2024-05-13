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
        <h1>All Posts</h1>
        <h2>Search</h2>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username"
                aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
        </div>
        <table class="table table-hover table-striped">
            <tr class="table-dark">
                <th>id</th>
                <th>email</th>
                <th>title</th>
                <th>image</th>
                <th>actions</th>
            </tr>
            @foreach ($Posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img width="80 px" src="{{ $post->image }}" alt=""></td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach

        </table>
        {{ $Posts->links() }}
    </div>

</body>

</html>
