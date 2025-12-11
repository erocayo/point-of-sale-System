<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Category Index</title>

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

        @if (empty($categorylist))
            <div class="alert alert-warning text-center">No Product Category in the database</div>
        @else
            @if(session('greeting'))
                <div class="alert alert-success">{{ session('greeting') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Product Category Id</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Tax Rate</th>
                            <th>Pricing Rule</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categorylist as $category)
                            <tr>
                                <td>{{ $category->PRODUCT_CATEGORY_ID }}</td>
                                <td>{{ $category->CATEGORY_NAME }}</td>
                                <td>{{ $category->DESCRIPTION }}</td>
                                <td>{{ $category->TAX_RATE }}</td>
                                <td>{{ $category->PRICING_RULE }}</td>
                                <td>
                                    <a href="{{ url('/pos/products/category/' . $category->PRODUCT_CATEGORY_ID . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ url('pos/admin/dashboard') }}" class="btn btn-secondary">Go Back</a>
        </div>

    </div>

</body>

</html>
