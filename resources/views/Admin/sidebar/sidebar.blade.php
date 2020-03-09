<ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

    
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <a class="dropdown-item" href="{{route('add-product')}}">Add a Product</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="{{route('manage-product')}}">All Products</a>
          </div>
        </li>
       <!--  <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Brands</span></a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="ordersDropdown">
            <a class="dropdown-item" href="order/pending_order_of_vendor">Pendign Orders</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="order/all_order_of_vendor">All Orders</a>
          </div>
        </li>      

     <!--    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <a class="dropdown-item" href="">Add a Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">All Products</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="{{route('manage-type')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Types</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('manage-category')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span>
          </a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{route('manage-sub-category')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Subcategory</span>
          </a>
          
        <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span>
          </a>
        </li>   
        
        <li class="nav-item">
        <a class="nav-link" href="{{route('manage-slider')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Sliders</span>
          </a>
        </li>                        

        

      
    

    </ul>




    