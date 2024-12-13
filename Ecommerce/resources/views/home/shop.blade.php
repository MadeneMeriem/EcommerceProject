<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Latest Products</h2>
    </div>
    <div class="row">
      @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
          <div class="box">
            <a href="{{ route('home.product_details', ['product'=>$product]) }}">
              <div class="img-box">
                <img src="images/{{$product->image}}" alt="Image of the Product">
              </div>
              <div class="detail-box">
                <h6>{{$product->title}}</h6>
                <h6>
                  Price
                  <span>{{$product->price}}</span>
                </h6>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
