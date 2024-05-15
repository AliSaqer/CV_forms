<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="{{ asset('Cvassets/formasset/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        .search-result {
            margin: 0;
            padding: 0;
            list-style: none;
            position: absolute;
            top: 38px;
            width: 100%;
            background-color: #f0f0f0;
            box-shadow: 0px 2px 10px #7f7d7d;
            border-radius: 3px;
            display: none;
        }

        .search-wrapper {
            position: relative;
        }

        .search-result a {
            color: #000;
            padding: 8px 15px;
            display: block;
            text-decoration: none;
        }

        .search-result a:hover {
            background-color: #bdbdbd;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h1>All Posts</h1>
        <h2>Search</h2>
        <div class="search-wrapper">
            <form action="{{ route('Post.index') }}", method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="find post" aria-label="Recipient's username"
                        aria-describedby="button-addon2" id="inp">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
                <ul class="search-result">
                    {{-- <li><a href=""> result 1  </a></li>
                    <li><a href=""> result 2  </a></li>
                    <li><a href=""> result 3  </a></li>
                    <li><a href=""> result 4  </a></li> --}}
                </ul>
            </form>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('Cvassets/js/posts.js') }}"></script>
{{-- <script>
    let inp = document.querySelector("#inp");

    console.log(inp.value);

    inp.onkeyup = function() {
        axios.get("{{ route('Post.post_search') }}").then((res) => {
            console.log("done");
        });
    };
</script> --}}

</html>
