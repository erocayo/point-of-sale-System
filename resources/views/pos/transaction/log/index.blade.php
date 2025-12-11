<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Transaction Log Index</title>

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


        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Sale Transaction Log ID</th>
                        <th>Sale Transaction ID</th>
                        <th>Action Type</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loglist as $log)
                    <tr>
                        <td>{{ $log->SALE_TRANSACTION_LOG_ID }}</td>
                        <td>{{ $log->SALE_TRANSACTION_ID }}</td>
                        <td>{{ $log->ACTION_TYPE }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="text-center mt-4">
            <a href="{{ url('/pos/transaction/') }}" class="btn btn-secondary">Go Back</a>
        </div>

    </div>

</body>

</html>
