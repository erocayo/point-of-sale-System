<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

        .login-box {
            width: 350px;
            background: #e9ecef; /* light gray */
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #ccc; /* border around container */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* shadow */
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>

            <div class="d-flex gap-2">
                <a href="{{ url('pos') }}" class="btn btn-light text-primary">
                    Home   
                </a>
                <a href="{{ url('pos/login') }}" class="btn btn-light text-primary">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <!-- CENTERED FORM -->
    <div class="center-content">
        <div class="login-box">

            <h3 class="text-center mb-4">Login</h3>

            <form action="{{ url('/pos/login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <input type="text" class="form-control" name="USERNAME" placeholder="Username" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="PASSWORD" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Log In</button>

                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </form>

        </div>
    </div>

</body>

</html>
