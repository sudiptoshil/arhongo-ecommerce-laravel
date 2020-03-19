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
                        <h2><span style="color:red"><i><u>All Category</u></i></span></h2>
                        <br/>
                        <div class="home_menu">
                        
                            @foreach($productcategory as $v_cat)
                             @if($v_cat->root_id == 0)
                            <h2><a href="{{route('category-product',['id' =>$v_cat->id])}}"><span style="color:green"><u>{{$v_cat->category_name}}</u></span></a></h2>
                             @endif
                              
                            <ul>
                                @if($v_cat->root_id > 0)
                                <li><h5><a href="{{route('sub-category-product',['id' => $v_cat->id])}}"><span style="color:yellowgreen">{{$v_cat->category_name}}</span></a></h5></li>
                               @endif
                            </ul>
                        
                           @endforeach
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 right-home">
                                
                                @foreach($categoryroot as $v_catroot)
                             <h2 ><span style="color:red"><u><i>{{$v_catroot->category_name}}</i></u></span></h2>
                            <img src="{{asset($v_catroot->category_image)}}" width="10%" height="1%">
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <?php $countp = 0; ?>
                                 @foreach($product as $v_product)
                                <input type="hidden" id="pro_id<?php $countp; ?>" value="{{$v_product->id}}"/>
                                    
                                    <div class="col-md-6 left-home">
                                    <button class="pro-box-btn" data-toggle="modal" data-target="#myModal" data-image="" data-id="" data-desc="" data-name="" data-price=""><br>
                                        @if($v_product->img)
                                       <span><img src="{{asset($v_product->img)}}"></span>
                                       @else
                                       <span style="color: red"> img not available</span>
                                        @endif
                                        <br>
                                    <span><a href="{{route('productdetails',['id' => $v_product->id])}}">{{$v_product->product_name}}</a></span><br>
                                        <span>&#2547; {{$v_product->display_price}}</span><br>
                                    </button>
                                  
                                    <!-- for add to cart button -->
                                    <button class='btn-cart' data-id='{{$v_product->id}}' data-bangla='' data-name='' data-price=''><i class='fa fa-shopping-cart'></i> Add to cart</button> 
                                        <!-- for add to cart button -->
                                    <!--  <button class='btn-cart' id="addtocart<?php echo $countp;?>"><i class='fa fa-shopping-cart'></i> Add to cart</button> -->
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

@endsection