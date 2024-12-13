<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    @include('admin.css')
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                </div>
            </div>
            <div class="container">
                <h2 class="text-center">Add New Product</h2>
                <form method="POST" action="{{ route('admin.add_product') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Product Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="" disabled selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('adminCss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminCss/js/charts-home.js') }}"></script>
    <script src="{{ asset('adminCss/js/front.js') }}"></script>
</body>
</html>
