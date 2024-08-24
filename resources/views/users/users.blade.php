<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="{{ asset('Cvassets/formasset/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        .password-cell {
            max-width: 200px;
            /* Set the maximum width for the <td> */
            overflow: hidden;
            /* Hide the overflow text */
            white-space: nowrap;
            /* Prevent text from wrapping */
            /* text-overflow: ellipsis; */
            /* Add ellipsis for overflowing text */
            /* display: inline-block; */
            /* Ensure the text is treated as an inline element */
        }

        .password-cell::before {
            content: attr(data-password-mask);
            /* Display the masked password */
        }
    </style>

</head>

<body>

    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>users</h1>
            <a class="btn btn-dark px5" href="{{ route('user.create') }}">Create New</a>
        </div>

        {{-- notification --}}

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- edit modal --}}
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

                        <div class="alert alert-danger d-none">

                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                            </div>

                            <div class="mb-3">
                                <label>email</label>
                                <input type="text" name="email" class="form-control" placeholder="email">
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
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>created at</th>
                <th>updated at</th>
                <th>actions</th>
            </tr>

            @foreach ($Users as $User)
                <tr id="row_{{ $User->id }}">
                    <td>{{ $User->id }}</td>
                    <td>{{ $User->name }}</td>
                    <td>{{ $User->email }}</td>
                    <td class="password-cell">{{ $User->password }}</td>
                    <td>{{ $User->created_at }}</td>
                    <td>
                        @if ($User->created_at == $User->updated_at)
                            not updated yet
                        @else
                            {{ $User->updated_at->diffForHumans() }}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editmodal"
                            data-url="{{ route('user.update', $User->id) }}" data-name="{{ $User->name }}"
                            data-email="{{ $User->email }}" data-password="{{ $User->password }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{ route('user.destroy', $User->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>



                    </td>
                </tr>
            @endforeach
        </table>
        {{ $Users->appends($_GET) }}
    </div>


</body>

</html>
<script src="{{ asset('Cvassets/globalassets/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Cvassets/globalassets/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('Cvassets/globalassets/sweetalert2@11.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


{{-- password shit --}}
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const passwordCells = document.querySelectorAll('.password-cell');

        passwordCells.forEach(cell => {
            const password = cell.textContent.trim();
            const maskedPassword = '*'.repeat(password.length);

            cell.setAttribute('data-password-mask', maskedPassword);
            cell.textContent = ''; // Clear the original text
        });
    });

    setTimeout(() => {
        document.querySelector(".alert-success").style.display = "none";
    }, 3000);
</script>

{{-- that is for update --}}

<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {

            $("#edit-form .alert").addClass("d-none");
            $("#edit-form .alert").html("");

            let url = $(this).data("url");
            let name = $(this).data("name");
            let email = $(this).data("email");

            $('#edit-form').attr('action', url);
            $('#editmodal input[name=name]').val(name);
            $('#editmodal input[name=email]').val(email);

            $('#edit-form').on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();

                $.ajax({
                    type: 'put',
                    url: url,
                    data: data,
                    success: function(res) {
                        console.log(res.id);
                        console.log(res.name);
                        console.log(res.email);
                        $('#row_' + res.id + " td:nth-child(2)").text(res.name);
                        $('#row_' + res.id + " td:nth-child(3)").text(res.email);

                    },
                    error: function(err) {

                        $("#edit-form .alert").removeClass("d-none");
                        $("#edit-form .alert").html("");


                        let errArray = err.responseJSON.errors;
                        console.log(errArray);

                        let note = $('#edit-form .alert');

                        //فور ان بتستخدم لمن بدنا نعمل لووب على اوبجكت

                        for (const key in errArray) {
                            let li = '<li>' + errArray[key] + '</li>';
                            note.append(li);
                        }
                    }
                });
            });
        });
    });
</script>
