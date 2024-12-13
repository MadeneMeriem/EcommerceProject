<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* Center pagination */
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }
        /* Style the search bar */
        input[name="search"] {
            width: 200px; /* Adjust the width as needed */
            height: 30px; /* Adjust the height as needed */
            border: 1px solid #ced4da;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
        }
        input[name="Search"] {
            height: 30px;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 5px;
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
                    <h5>
                        Search For a Product
                    </h5>
                    <form action="{{ route('admin.search_product') }}" method="GET">
                        @csrf
                        @method('GET')
                    <input type="text" name="search" class="form-control">
                    <input type="submit" name="Search" value="Submit" class="btn btn-danger">
                    </form>
                    <!-- Table to Display Products -->
                    <div class="mt-5">
                        <h2>Products List</h2>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->description }}</td>                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.delete_product', ['product'=>$product]) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-button">Delete</button>
                                            
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Centered Pagination -->
                        <div class="d-flex justify-content-center">
                            {{$products->onEachSide(1)->links()}}
                        </div>
                    </div>
                    <!-- Table end -->
                </div>
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
    
    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Attach event listener to all delete buttons
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const form = this.closest('.delete-form');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
