<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>user table</title>
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
                        <a class="nav-link" href="">USER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">ROLE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">PERMISSION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">MODULE</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Permission Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="text-danger">
                            @error('name')
                                {{ 'Name is required' }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="" id="modulename">
                            <option hidden>Choose Module Name</option>
                            @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->modulename }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-6">
                <br><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Permission Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $per)
                            <tr>
                                <th>{{ $per->id }}</th>
                                <td>{{ $per->name }}</td>
                                <td>
                                    <a href="{{ url('/editrole') }}" class="btn btn-info btn-sm">EDIT</a>
                                    <a href="{{ url('/deleterole') }}" class="btn btn-danger btn-sm">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
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
</body>

</html>
