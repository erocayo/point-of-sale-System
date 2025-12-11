<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale Transaction Detail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
        <div class="container-fluid">
            <span class="navbar-brand">POS System</span>
            <div class="d-flex">
                <a href="{{ url('/pos/transaction/'.$SALE_TRANSACTION_ID) }}" class="btn btn-light text-primary me-2">Back to Transaction</a>
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
            <h3 class="mb-3">Edit Sale Transaction Detail</h3>

            <form action="{{ url('/pos/transaction/' . $SALE_TRANSACTION_ID . '/details/' . $detail->SALE_TRANSACTION_DETAILS_ID . '/update') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="PRODUCT_ID" class="form-label">Product</label>
                    <select id="PRODUCT_ID" name="PRODUCT_ID" class="form-select" required>
                        @foreach ($productlist as $product)
                            <option value="{{ $product->PRODUCT_ID }}" 
                                @if($product->PRODUCT_ID == $detail->PRODUCT_ID) selected @endif>
                                {{ $product->PRODUCT_NAME }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="QUANTITY" class="form-label">Quantity</label>
                    <input type="number" id="QUANTITY" name="QUANTITY" class="form-control" required min="1" value="{{ $detail->QUANTITY }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Detail</button>
            </form>

        </div>
    </div>

</body>

</html>
