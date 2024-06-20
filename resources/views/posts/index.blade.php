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

        .modal-body {
            height: 400px;
            overflow-y: scroll;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>All Posts</h1>
            <a class="btn btn-dark px5" href="{{ route('Post.create') }}">Create New</a>
        </div>
        {{-- search --}}
        <h2>Search</h2>
        <div class="search-wrapper">
            <form action="{{ route('Post.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" value="{{ request()->keyword }}" class="form-control" placeholder="find post"
                        aria-label="Recipient's username" aria-describedby="button-addon2" id="inp"
                        name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2" a><i
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
        {{-- success massage --}}
        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <!-- Modal -->
        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editmodalLabel">Edit Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="edit-form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="alert alert-danger d-none">
                                <ul>
                                </ul>
                            </div>

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
                                <img class="img-space" width="40px">
                            </div>

                            <div class="mb-3">
                                <label>Body</label>
                                <textarea name="body" id="mytextarea" rows="5"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- table of contant --}}
        <table class="table table-hover table-striped">
            <tr class="table-dark">
                <th>id</th>
                <th>email</th>
                <th>title</th>
                <th>views</th>
                <th>image</th>
                <th>created at</th>
                <th>updated at</th>
                <th>actions</th>
            </tr>
            @foreach ($Posts as $post)
                <tr id="row_{{ $post->id }}">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->views }}</td>
                    <td><img width="80 px" src="{{ asset('uploads/' . $post->image) }}" alt=""></td>
                    <td>{{ $post->created_at->format('F d , Y') }}</td>
                    <td>
                        @if ($post->created_at == $post->updated_at)
                            not updated yet
                        @else
                            {{ $post->updated_at->diffForHumans() }}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editmodal"
                            data-url="{{ route('post.update', $post->id) }}" data-title="{{ $post->title }}"
                            data-email="{{ $post->email }}" data-image="{{ asset('uploads/' . $post->image) }}"
                            data-body="{{ $post->body }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{ route('post.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('are you fucking sure ');" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </table>


        {{-- this for pagination and we use appends to maintain the search word in every page --}}
        {{-- {{ $Posts->appends(['keyword' => request()->keyword])->links() }} --}}
        {{-- we can also use $_GET , $_POST to call every input in the form instade if call them one by one
        and since our method in the form is get we gonna use $_GET --}}
        {{ $Posts->appends($_GET) }}



    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.0/tinymce.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
<script src="{{ asset('Cvassets/globalassets/jquery-3.7.1.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="{{ asset('Cvassets/js/posts.js') }}"></script>

<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
{{-- <script>
    let inp = document.querySelector("#inp");

    console.log(inp.value);

    inp.onkeyup = function() {
        axios.get("{{ route('Post.post_search')}}", {
            keyword : inp.value
        }).then((res) => {
            console.log("done");
        });
    };
</script> --}}

</html>
