<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt #{{ $transaction->SALE_TRANSACTION_ID }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printable, #printable * {
                visibility: visible;
            }
            #printable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
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

        <div class="p-4 shadow rounded bg-light border">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Receipt #{{ $transaction->SALE_TRANSACTION_ID }}</h3>
                <button onclick="window.print()" class="btn btn-primary">Print</button>
            </div>
            <p class="text-end"><strong>Date Completed:</strong> {{ $completed_log[0]->created_at }}</p>

            <div id="printable">
                <!-- POS System header for print -->
                <h4 class="text-center mb-4">POS System</h4>

                <div class="d-flex justify-content-between mb-2">
                    <strong>Receipt #{{ $transaction->SALE_TRANSACTION_ID }}</strong>
                    <strong>Date Completed: {{ $completed_log[0]->created_at }}</strong>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>SubTotal</th>
                                <th>Tax Rate%</th>
                                <th>Tax Amount</th>
                                <th>Line Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $item)
                            <tr>
                                <td>{{ $item->PRODUCT_NAME }}</td>
                                <td>₱{{ number_format($item->UNIT_PRICE, 2) }}</td>
                                <td>{{ $item->QUANTITY }}</td>
                                <td>₱{{ number_format($item->subtotal, 2) }}</td>
                                <td>{{ $item->TAX_RATE }}%</td>
                                <td>₱{{ number_format($item->tax_amount, 2) }}</td>
                                <td>₱{{ number_format($item->line_total, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-secondary">
                                <th colspan="6" class="text-end">Grand Total</th>
                                <th>₱{{ number_format($transaction->TOTAL_PRICE, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-3">
                    <p class="fw-bold text-center">Thank you for your purchase!</p>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ url('/pos/transaction') }}" class="btn btn-secondary">Go Back</a>
            </div>

        </div>

    </div>

</body>

</html>
