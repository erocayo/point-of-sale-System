<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS system Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .center-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>

            <div class="d-flex">
                <a href="{{ url('pos/login') }}" class="btn btn-light text-primary">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <!-- CENTERED CONTENT -->
    <div class="center-content">
        <h1>Welcome</h1>
    </div>

</body>
</html>
