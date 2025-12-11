<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This Month's Transactions</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR (copied style) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>

            <div class="d-flex">
                <a href="{{ url('pos/manager/dashboard') }}" class="btn btn-light text-primary me-2">Dashboard</a>

                <form action="{{ url('/pos/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light text-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">

        <h2 class="mb-4 text-center">This Month's Transactions</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Transaction ID</th>
                        <th>User ID</th>
                        <th>Status</th>
                        <th>Confirmed At</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Tax</th>
                        <th>Line Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($transactions as $t)
                    <tr>
                        <td>{{ $t->SALE_TRANSACTION_ID }}</td>
                        <td>{{ $t->USER_ID }}</td>
                        <td>{{ $t->STATUS }}</td>
                        <td>{{ $t->confirmed_at }}</td>
                        <td>{{ $t->PRODUCT_NAME }}</td>
                        <td>{{ number_format($t->UNIT_PRICE, 2) }}</td>
                        <td>{{ $t->QUANTITY }}</td>
                        <td>{{ number_format($t->subtotal, 2) }}</td>
                        <td>{{ number_format($t->tax_amount, 2) }}</td>
                        <td>{{ number_format($t->line_total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('pos/manager/dashboard') }}" class="btn btn-secondary">Go Back</a>
        </div>

    </div>

</body>

</html>
