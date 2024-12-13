<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    @include('admin.css')
    <style>
        .form-group img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .form-group .image-container {
            text-align: center;
        }
        .form-group .image-container img {
            width: 80%;
            max-width: 100px; /* Smaller size */
            margin-bottom: 10px;
        }
    </style>
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
                <h2 class="text-center">Edit the Product</h2>
                <form method="POST" action="{{ route('admin.update_product', ['product'=>$product]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Product Title</label>
                        <input type="text" name="title" class="form-control" value="{{$product->title}}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control" >
                            <option value="{{$product->category}}">{{$product->category}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group image-container">
                        <label for="image">Current Image</label>
                        <img src="/images/{{$product->image}}" alt="Product Image">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Edit Product</button>
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
