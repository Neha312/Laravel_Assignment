@extends('layout.main')
@section('main')
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-sm-5 align-item-center pt-5">

                {{-- <h1>User Info</h1> --}}
                <form action="/user/add" method="POST">
                    @csrf
                    <div class="mb-3">

                        <label for="name" class="form-label">User
                            Name</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter User Name">
                        <span class="text-danger">
                            @error('username')
                                {{ 'username is required' }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="role" id="rollname">
                            <option hidden>Choose Role Name</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->rollname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-sm-5">
                <br><br>
                <table class="table table-hover" style="background-color:">
                    <thead class="table-active">
                        <tr>
                            <th scope="col">
                                ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <a href="{{ url('user/edit', $user->id) }}" class="btn btn-info btn-sm "><i
                                            class="bi bi-pencil-square"></i>Edit</a>
                                    {{-- <a href="{{ url('user/delete', $user->id) }}"
                                        class="btn btn-danger btn-sm">DELETE</a> --}}

                                </td>
                                <td>
                                    <form method="POST" action="{{ url('user/delete', $user->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm_user"
                                            data-toggle="tooltip" title='Delete'><i
                                                class="bi bi-trash-fill"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <span>
                    {{ $users->links() }}
                </span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm_user').click(function(event) {
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
@endsection
