<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
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
        <div class="p-4 shadow rounded bg-light border">

            <h3 class="mb-4">Edit Product</h3>

            <form action="{{ url('/pos/products/'.$productlist->PRODUCT_ID.'/update') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="PRODUCT_NAME" class="form-control"
                        value="{{ $productlist->PRODUCT_NAME }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="DESCRIPTION" class="form-control"
                        value="{{ $productlist->DESCRIPTION }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="PRICE" class="form-control" value="{{ $productlist->PRICE }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock Level</label>
                    <input type="number" name="STOCK_LEVEL" class="form-control" value="{{ $productlist->STOCK_LEVEL }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="PRODUCT_CATEGORY_ID" class="form-select">
                        @foreach($categorylist as $category)
                        <option value="{{ $category->PRODUCT_CATEGORY_ID }}"
                            {{ $category->PRODUCT_CATEGORY_ID == $productlist->PRODUCT_CATEGORY_ID ? 'selected' : '' }}>
                            {{ $category->CATEGORY_NAME }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="{{ url('/pos/products') }}" class="btn btn-secondary ms-2">Go Back</a>
            </form>

        </div>
    </div>

</body>

</html>
