@extends('Client.client_master')
@section('client-home')

 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
         
                  
    @php($i = 0) 
    @foreach($slider as $key=>$v_slider)
    <div class="carousel-item <?php echo $key== 0 ? 'active':'' ?>">
    <img  src="{{asset($v_slider->slider_image)}}" width="200px">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="home_slide_bottom">
            <div class="container slider_bottom">
                <div class="row">
<div class="owl-carousel owl-theme">
    
        <a href="">
            <div class="item text-center"><h4></h4>
            <img src="" width="100%" style="max-height:300px;"/>
        </div>
        </a>
   

</div>
    </div>
        </div>
            </div>




    

<div class="home_section_area">
    <div class="container home_section">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Discover our <a href="">Fitness Equipment</a> Store!</h3>
                        <div class="home_menu">
                        
                            @foreach($productcategory as $v_cat)
                             @if($v_cat->root_id == 0)
                            <h2><a href="{{route('category-product',['id' =>$v_cat->id])}}">{{$v_cat->category_name}}</a></h2>
                             @endif
                              
                            <ul>
                                @if($v_cat->root_id > 0)
                                <li><a href="{{route('sub-category-product',['id' => $v_cat->id])}}">{{$v_cat->category_name}}</a></li>
                               @endif
                            </ul>
                        
                           @endforeach
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 right-home">
                                
                                <img src="" width="100%">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                 @foreach($product as $v_product)

                                    <div class="col-md-6 left-home">
                                    <button class="pro-box-btn" data-toggle="modal" data-target="#myModal" data-image="" data-id="" data-desc="" data-name="" data-price=""><br>
                                        @if($v_product->img)
                                       <span><img src="{{asset($v_product->img)}}"></span>
                                       @else
                                       <span style="color: red"> img not available</span>
                                        @endif
                                        <br>
                                        <span>{{$v_product->product_name}}</span><br>
                                        <span>&#2547; {{$v_product->display_price}}</span><br>
                                    </button>
                                  
                                    <!-- for add to cart button -->
                                    <button class='btn-cart' data-id='{{$v_product->id}}' data-bangla='' data-name='' data-price=''><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                        <!-- for add to cart button -->
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        

<!-- modal for show product details start here -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-7">
                        <div id="product_photo"></div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="pro-details">
                            <h1 id="pro-name"></h1>
                            <h2 id="pro-price"></h2>
                            <div id="product_cart"></div>
                        </div>

                        <hr>
                        <p id="desc"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer pro-details-footer">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <span><i class="fas fa-truck"></i> Quick Delivery</span>
                        <span><i class="fas fa-money-bill-alt"></i> Cash on Delivery</span>

                        <hr>
                        <h1>Arhongo</h1>
                        <p>
                            Arhongo is an online shop in Bangladesh. We believe time is valuable to our clients and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Arhongo delivers everything you need right at your door-step and at no additional cost.
                        </p>
                        <hr>
                    </div>
                    <div class="col-md-4 col-12">
                        <h4>Call us for any query</h4><br>
                        <h3><i class="fas fa-phone"></i> +880 1826 XXXXXX</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src=""></script>
<!-- modal for show product details end here -->
@endsection