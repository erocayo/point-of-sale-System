<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark"
        style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS SYSTEM</span>

            <div class="d-flex">
                <form action="{{ url('/pos/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light text-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- PAGE CONTENT -->
    <div class="container mt-4">

        <div class="p-4 shadow rounded bg-light border">

            <h3 class="mb-3">Welcome, <strong>{{ $username }}</strong></h3>

            <div class="list-group mb-3">
                <a href="{{ url('pos/manager/transaction') }}" class="list-group-item list-group-item-action">
                    📊 View Monthly Transactions
                </a>

                <a href="{{ url('/pos/products') }}" class="list-group-item list-group-item-action">
                    📦 View Products
                </a>

                <a href="{{ url('/pos/manager/reports') }}" class="list-group-item list-group-item-action">
                    📝 Generate Summary Report
                </a>
            </div>

        </div>
    </div>

</body>

</html>