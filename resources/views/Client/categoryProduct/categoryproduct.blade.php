@extends('Client.client_master')
@section('client-home')
        <div class="related_product_page">
        	<div class="container">
        		<div class="row">
					<div class="col-md-12">
						<div class="product-title">
							<h2>Fitness</h2>
						</div>	
					</div>
				</div>

        @foreach($products as $v_pro) 
		<!--start testing product -->
		<div class="row">
				<div class="col-lg-3">
                
					<p class="border border-success p-2 text-center">
                    <span><button class="pro-box-btn" data-toggle="modal" data-target="#myModal" data-image="" data-id="" data-desc="" data-name="" data-price=""><br>
                        <span><img src="{{asset($v_pro->img)}}"></span><br>
                        <span><a href="{{route('productdetails',['id' => $v_pro->id])}}">{{$v_pro->product_name}}</a></span><br>
                        <span>&#2547;{{$v_pro->display_price}}</span><br>
                    </button></span><br>
                        
                        <button class='btn-cart' data-id='{{$v_pro->id}}' data-bangla='' data-name='{{$v_pro->product_name}}' data-price=''><i class='fas fa-shopping-cart'></i> Add to cart</button>
                    </p>
				</div>
			</div>
		<!--end  testing product -->
			@endforeach

        	</div>
        </div>


	

{{-- <script>
	$(document).ready(function () {
		$(".pro-box-btn").click(function(){
			var desc=$(this).attr("data-desc");
			var id=$(this).attr("data-id");
            var image=$(this).attr("data-image");
            
			var name=$(this).attr("data-name");
			var price=$(this).attr("data-price");
			image=""+image+"' width='100%'>";
			cart_btn="<button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fas fa-shopping-cart'></i> Add to cart</button>";
			$('#product_photo').html(image);
			$('#product_cart').html(cart_btn);
			$('#desc').text(desc);
			$('#pro-name').text(name);
			$('#pro-price').text("৳"+price);
		});
	});
</script> --}}

@endsection