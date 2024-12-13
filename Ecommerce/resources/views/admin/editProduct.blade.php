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

                    <!-- Table to Display Products -->
                    <div class="mt-5">
                        <h2>Products List</h2>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit_product', ['product'=>$product]) }}"> 
                                            <button type="button" class="btn btn-danger">Edit</button>
                                          </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
