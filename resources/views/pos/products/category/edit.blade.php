<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary"style="background: linear-gradient(to right, #FFFF00, #FFD700, #FF8C00, #FF4500, #FF0000);">
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
        <h3>Edit Product Category</h3>

        <form action="{{ url('/pos/products/category/'.$categorylist->PRODUCT_CATEGORY_ID.'/update') }}" method="post" class="border p-4 shadow bg-light">
            @csrf

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="CATEGORY_NAME" value="{{ $categorylist->CATEGORY_NAME }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="DESCRIPTION" value="{{ $categorylist->DESCRIPTION }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tax Rate</label>
                <input type="text" name="TAX_RATE" value="{{ $categorylist->TAX_RATE }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pricing Rule</label>
                <select name="PRICING_RULE" class="form-select" required>
                    @foreach($rulelist as $rule)
                        <option value="{{ $rule }}" {{ $categorylist->PRICING_RULE == $rule ? 'selected' : '' }}>
                            {{ $rule }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ url('/pos/products/category') }}" class="btn btn-secondary">Go Back</a>
            </div>

        </form>
    </div>

</body>
</html>
