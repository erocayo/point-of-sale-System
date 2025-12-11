<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Index</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>

            <div class="d-flex">
                <a href="{{ url('pos/admin/dashboard') }}" class="btn btn-light text-primary me-2">Dashboard</a>

                <form action="{{ url('/pos/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light text-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">

        @if(empty($userlist))
        <div class="alert alert-warning text-center">No User in the Database</div>

        @else

        @if(session('greeting'))
        <div class="alert alert-success">{{ session('greeting') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password Hash</th>
                        <th>Role Id</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Admin Id</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($userlist as $user)
                    <tr>
                        <td>{{ $user->USER_ID }}</td>
                        <td>{{ $user->FIRST_NAME }} {{ $user->LAST_NAME }}</td>
                        <td>{{ $user->USERNAME }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $user->PASSWORD_HASH }}</td>
                        <td>{{ $user->ROLE_ID }}</td>
                        <td>{{ $user->ADDRESS }}</td>
                        <td>{{ $user->CONTACT_NUMBER }}</td>
                        <td>{{ $user->ADMIN_ID }}</td>

                        <td>
                            <a href="{{ url('/pos/user/' . $user->USER_ID . '/edit') }}"
                                class="btn btn-sm btn-warning me-1">Edit</a>

                            <!-- Delete button triggers modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $user->USER_ID }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $user->USER_ID }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $user->USER_ID }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="deleteModalLabel{{ $user->USER_ID }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete "<strong>{{ $user->USERNAME }}</strong>"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <a href="{{ url('/pos/user/' . $user->USER_ID . '/destroy') }}"
                                                class="btn btn-danger">Yes, Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif

        <div class="text-center mt-4">
            <a href="{{ url('pos/admin/dashboard') }}" class="btn btn-secondary">Go Back</a>
        </div>

    </div>

</body>

</html>
