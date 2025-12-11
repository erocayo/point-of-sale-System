<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f2f2f2;
        }

        .center-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 450px;
            background: #e9ecef;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>

            <div class="d-flex">
                <a href="{{ url('/pos/admin/dashboard') }}" class="btn btn-light text-primary me-2">Dashboard</a>
                <form action="{{ url('/pos/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light text-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- CENTERED FORM -->
    <div class="center-content">
        <div class="form-box">
            <h3 class="text-center mb-3">Add User</h3>

            <form action="{{ url('/pos/user/create') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="FIRST_NAME" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="LAST_NAME" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="USERNAME" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="PASSWORD" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="ROLE_ID" class="form-select" required>
                        <option value="">-- Select Role --</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->ROLE_ID }}">{{ $role->ROLE_NAME }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="ADDRESS" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="CONTACT_NUMBER" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Add User</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ url('/pos/admin/dashboard') }}" class="btn btn-secondary w-100">Go Back</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.querySelector('select[name="ROLE_ID"]');
            const adminSelect = document.querySelector('select[name="ADMIN_ID"]');
            const restrictedRoles = ['2', '3', '4']; // cashier, manager, inventory, etc.

            function updateAdminRequired() {
                if (restrictedRoles.includes(roleSelect.value)) {
                    adminSelect.required = true;
                } else {
                    adminSelect.required = false;
                    adminSelect.style.border = "";
                }
            }

            updateAdminRequired();
            roleSelect.addEventListener('change', updateAdminRequired);
        });
    </script>

</body>
</html>
