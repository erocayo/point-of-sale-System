<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Index</title>

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

        @if(empty($productlist))
        <div class="alert alert-warning text-center">No product in the database</div>

        @else

        @if(session('greeting'))
        <div class="alert alert-success">{{ session('greeting') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Product Id</th>
                        <th>Product Category Id</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock Level</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productlist as $product)
                    <tr>
                        <td>{{ $product->PRODUCT_ID }}</td>
                        <td>{{ $product->PRODUCT_CATEGORY_ID }}</td>
                        <td>{{ $product->PRODUCT_NAME }}</td>
                        <td>{{ $product->DESCRIPTION }}</td>
                        <td>{{ number_format($product->PRICE, 2) }}</td>
                        <td>{{ $product->STOCK_LEVEL }}</td>

                        <td>
                            <a href="{{ url('/pos/products/' . $product->PRODUCT_ID . '/edit') }}"
                                class="btn btn-sm btn-warning me-1">Edit</a>

                            <!-- Delete button triggers modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $product->PRODUCT_ID }}">
                                Delete
                            </button>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $product->PRODUCT_ID }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $product->PRODUCT_ID }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="deleteModalLabel{{ $product->PRODUCT_ID }}">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete "<strong>{{ $product->PRODUCT_NAME }}</strong>"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <a href="{{ url('/pos/products/' . $product->PRODUCT_ID . '/destroy') }}"
                                                class="btn btn-danger">Yes, Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif

    </div>

</body>

</html>
