<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                    <h1>Add Category</h1>
                    <div class="div_deg">
                        <form action="{{ route('admin.add_category') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="text" name="category">
                            <input type="submit" value="Add new category" class="btn btn-primary">
                        </form>
                    </div>

                    <!-- Table to Display Categories -->
                    <div class="mt-5">
                        <h2>Categories List</h2>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Category Edition</th>
                                    <th scope="col">Category deletion</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <a href="{{ route('admin.edit_category', ['category'=>$category]) }}"> 
                                            <button type="button" class="btn btn-danger">Edit</button>
                                          </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.delete_category', ['category'=>$category]) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-button">Delete</button>
                                            
                                        </form>

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
