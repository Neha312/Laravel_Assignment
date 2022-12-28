<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>user table</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-light">
            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">My App</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index">USER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/role/index">ROLE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/permission/index">PERMISSION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/module/index">MODULE</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="/module/add">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Module Name</label>
                        <input type="text" class="form-control" id="modulename" name="modulename">
                        <span class="text-danger">
                            @error('name')
                                {{ 'Name is required' }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" href="{{ url('module/add') }}" class="btn btn-primary">Submit</button>
                </form>
                <br>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-sm-6">
                <br><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Module</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <th>{{ $module->id }}</th>
                                <td>{{ $module->modulename }}</td>
                                <td>
                                    <a href="{{ url('module/edit', $module->id) }}" class="btn btn-info btn-sm">EDIT</a>
                                    <form method="POST" action="{{ url('module/delete', $module->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                            data-toggle="tooltip" title='Delete'>Delete</button>
                                        {{-- <a id="b1" href="{{ url('module/delete', $module->id) }}"
                                            class="btn btn-danger btn-sm">DELETE</a> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <nav>
                    {{ $modules->links() }}
                </nav> --}}
                <style>
                    .w-5 {
                        display: none;
                    }
                </style>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
</body>

</html>
