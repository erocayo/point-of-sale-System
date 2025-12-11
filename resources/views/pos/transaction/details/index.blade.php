<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>

            <div class="d-flex">
                <a href="{{ url('pos/cashier/dashboard') }}" class="btn btn-light text-primary me-2">Dashboard</a>

                <form action="{{ url('/pos/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light text-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">

        <!-- Sale Transaction Info -->
        <div class="p-4 shadow rounded bg-light border mb-4">
            <h3 class="mb-3">Sale Transaction Info</h3>
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Sale Transaction ID</th>
                        <th>Cashier</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        @if($transaction->STATUS === 'pending')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $transaction->SALE_TRANSACTION_ID }}</td>
                        <td>{{ $transaction->USERNAME }}</td>
                        <td>{{ number_format($transaction->TOTAL_PRICE, 2) }}</td>
                        <td>{{ $transaction->STATUS }}</td>
                        @if($transaction->STATUS === 'pending')
                        <td>
                            <a href="{{ url('/pos/transaction/'.$transaction->SALE_TRANSACTION_ID.'/confirm') }}" class="btn btn-sm btn-success">Confirm</a>
                            <a href="{{ url('/pos/transaction/'.$transaction->SALE_TRANSACTION_ID.'/cancel') }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Transaction Details -->
        <div class="p-4 shadow rounded bg-light border">
            <h3 class="mb-3">Transaction Details</h3>

           
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Detail ID</th>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Tax</th>
                            <th>Line Total</th>
                            @if($transaction->STATUS === 'pending')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailslist as $detail)
                        <tr>
                            <td>{{ $detail->SALE_TRANSACTION_DETAILS_ID }}</td>
                            <td>{{ $detail->PRODUCT_NAME }}</td>
                            <td>{{ number_format($detail->UNIT_PRICE, 2) }}</td>
                            <td>{{ $detail->QUANTITY }}</td>
                            <td>{{ number_format($detail->subtotal, 2) }}</td>
                            <td>{{ number_format($detail->tax_amount, 2) }}</td>
                            <td>{{ number_format($detail->line_total, 2) }}</td>
                            @if($transaction->STATUS === 'pending')
                            <td>
                                <a href="{{ url('/pos/transaction/'.$transaction->SALE_TRANSACTION_ID.'/details/'.$detail->SALE_TRANSACTION_DETAILS_ID.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('/pos/transaction/'.$transaction->SALE_TRANSACTION_ID.'/details/'.$detail->SALE_TRANSACTION_DETAILS_ID.'/destroy') }}" class="btn btn-sm btn-danger">Remove</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($transaction->STATUS === 'pending')
                <a href="{{ url('/pos/transaction/'.$transaction->SALE_TRANSACTION_ID.'/details/add') }}" class="btn btn-primary mt-2">Add Detail</a>
            @endif

            <div class="text-center mt-4">
                <a href="{{ url('/pos/transaction/') }}" class="btn btn-secondary">Go back</a>
            </div>

        </div>
    </div>

</body>
</html>
