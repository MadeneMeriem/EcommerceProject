<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        @include('home.css')
      </head>
      
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
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
        }
        .product-image {
            text-align: center;
            margin-bottom: 30px;
        }
        .product-image img {
            max-width: 30%;
            height: auto;
            border-radius: 10px;
        }
        .product-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product-details div {
            flex: 1 1 48%;
            margin-bottom: 20px;
        }
        .product-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .product-price {
            font-size: 24px;
            color: #e67e22;
            margin-bottom: 15px;
        }
        .product-quantity,
        .product-category {
            font-size: 18px;
            color: #555;
        }
        .product-description {
            margin-top: 30px;
            font-size: 16px;
            line-height: 1.6;
        }
        .btn-add-to-cart {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #e67e22;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn-add-to-cart:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
       @include('home.header')
        <!-- end header section -->
      </div>
    <div class="container">
        <h1 class="product-title">{{$product->title}}</h1>
        
        <div class="product-image">
            <img src="{{ asset('images/'.$product->image) }}" alt="Image of the Product">
        </div>
        
        <div class="product-details">
            <div class="product-price">
                Price: {{$product->price}}
            </div>
            <div class="product-quantity">
                Quantity: {{$product->quantity}}
            </div>
            <div class="product-category">
                Category: {{$product->category}}
            </div>
        </div>

        <div class="product-description">
            <p>Description : {{$product->description}}</p>
        </div>

        <a href="{{ route('home.add_cart', ['product'=>$product]) }}" class="btn-add-to-cart">Add to Cart</a>
    </div>

  

  <br><br><br>


   

  <!-- info section -->
  @include('home.info')

 
    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->

 

  <!-- end info section -->



  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
