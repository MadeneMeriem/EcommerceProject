<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .cart-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            width: 100%;
        }
        .cart-items {
            margin-bottom: 30px;
            flex: 0 0 65%;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }
        .cart-item img {
            max-width: 100px;
            height: auto;
            border-radius: 10px;
        }
        .item-details {
            flex: 1;
            margin-left: 20px;
        }
        .item-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .item-price {
            font-size: 18px;
            color: #e67e22;
            margin-bottom: 10px;
        }
        .item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .btn-remove {
            padding: 8px 16px;
            font-size: 14px;
            color: #fff;
            background-color: #e74c3c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-remove:hover {
            background-color: #c0392b;
        }
        .cart-summary, .user-info-form {
            flex: 0 0 30%;
            text-align: right;
        }
        .total-price {
            font-size: 24px;
            font-weight: bold;
            color: #e67e22;
        }
        .btn-checkout {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #27ae60;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn-checkout:hover {
            background-color: #2ecc71;
        }
        .user-info-form {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
       @include('home.header')
        <!-- end header section -->
    </div>
    @php
        $total = 0;
    @endphp
    <div class="container">
        <h1 class="cart-title">Your Cart</h1>

        <div class="cart-items">   
            <!-- Repeat this block for each item in the cart -->
            @foreach ($cart as $item)
            <div class="cart-item">
                <img src="images/{{$item->product->image}}" alt="Item Image">
                <div class="item-details">
                    <div class="item-title">{{$item->product->title}}</div>
                    <div class="item-price"><p>{{$item->product->description}}</p></div>
                    <div class="item-price">${{$item->product->price}}</div>
                </div>
                <div class="item-actions">
                    <form action="{{ route('home.delete_item', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-remove">Remove</button> 
                    </form>
                </div>
            </div>
            @php
                $total += $item->product->price;
            @endphp
            @endforeach
            <!-- End of cart item block -->
        </div>

        <!-- User Information Form -->
        <div class="user-info-form">
            <h2>Enter Your Information</h2>
            <form action="{{ route('home.make_order') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <button type="submit" class="btn-checkout">Proceed to Checkout</button>
            </form>
        </div>
    </div>

    <!-- info section -->
    @include('home.info')

    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->

    <!-- end info section -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
