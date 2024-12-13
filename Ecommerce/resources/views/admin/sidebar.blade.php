<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('adminCss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <ul class="list-unstyled">
            <li class="active">
                <a href="{{ url('admin/dashboard') }}"> 
                    <i class="icon-home">
                        </i>Home </a>
            </li>
            <li>
                <a href="{{ url('view_category') }}"> <i class="icon-grid">
                    </i>Category </a>
            </li>
            <li>
              <a href="{{ route('admin.order_table') }}"> <i class="icon-grid">
                  </i>Order Table </a>
          </li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.add_product_form') }}">Add Product</a></li>
                <li><a href="{{ route('admin.view_product') }}">View Products</a></li>
                <li><a href="{{ url('/edit-product') }}">Edit Product</a></li>
              </ul>
            </li>
    </ul>
    
  </nav>