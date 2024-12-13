<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css') <!-- Your existing CSS include -->
    <title>Order Data - Admin Panel</title>
    <style>
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #333; /* Slightly lighter background for content */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #fff; /* White text color */
            margin-bottom: 20px;
            text-align: center;
        }
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .order-table th, .order-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #444;
            color: #fff; /* White text color */
        }
        .order-table th {
            background-color: #444;
        }
        .order-table tr:hover {
            background-color: #555; /* Hover effect */
        }
        .btn-view {
            padding: 8px 16px;
            font-size: 14px;
            color: #fff;
            background-color: #27ae60; /* Green color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-view:hover {
            background-color: #2ecc71; /* Lighter green on hover */
        }
    </style>
</head>
<body>
    @include('admin.header') <!-- Your existing header include -->

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation -->
        @include('admin.sidebar') <!-- Your existing sidebar include -->
        <!-- Sidebar Navigation end -->

        <!-- Page Content -->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 class="page-title">Order Data</h1>
                    
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Customer Address</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                
                            <!-- Sample Data Row -->
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->rec_address}}</td>
                                <td>{{$order->product->title}}</td>
                                <td>{{$order->product->price}}</td>
                                <td>
                                   
                                    
                                    <form action="{{ route('admin.update_status', ['order' => $order]) }}" method="POST" class="status-form">
                                        @csrf
                                        @method('PUT')
                                        <!-- Dropdown for Status -->
                                        <select class="status-dropdown" style="background-color: #2c2f33; color: white; border: none; border-radius: 4px; padding: 5px;">
                                            <option value="In progress" {{ $order->status == 'In progress' ? 'selected' : '' }}>In progress</option>
                                            <option value="Confirmed" {{ $order->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Delivering" {{ $order->status == 'Delivering' ? 'selected' : '' }}>Delivering</option>
                                        </select>
                                        <input type="hidden" value="{{ $order->status }}" name="status" class="status-input">
                                    </form>
                                </td>                                
                                <td>{{$order->created_at}}</td>
                                <td><a href="#" class="btn-view">Confirm</a></td>
                            </tr>
                            <!-- Additional rows will go here -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Page Content end -->
    </div>

    <!-- Your existing JS includes -->
    <script src="{{ asset('adminCss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminCss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminCss/js/charts-home.js') }}"></script>
    <script src="{{ asset('adminCss/js/front.js') }}"></script>
    <script>
        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', function() {
                const form = this.closest('.status-form');
                form.querySelector('.status-input').value = this.value;
                form.submit();
            });
        });
    </script>
</body>
</html>
