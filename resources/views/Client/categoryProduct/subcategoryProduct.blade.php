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
                        <span><img src=""></span><br>
                        <span></span><br>
                        <span>&#2547;</span><br>
                    </button></span><br>
                        <!-- <span><button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fas fa-shopping-cart'></i> Add to cart</button></span> -->
                        <button class='btn-cart' data-id='' data-bangla='' data-name='' data-price=''><i class='fas fa-shopping-cart'></i> Add to cart</button>
                    </p>
				</div>
			
			</div>
		<!--end  testing product -->
			@endforeach

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
<!-- modal for show product details end here -->

<script>
	$(document).ready(function () {
		$(".pro-box-btn").click(function(){
			var desc=$(this).attr("data-desc");
			var id=$(this).attr("data-id");
            var image=$(this).attr("data-image");
            
			var name=$(this).attr("data-name");
			var price=$(this).attr("data-price");
			image="assets/"+image+"' width='100%'>";
			cart_btn="<button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fas fa-shopping-cart'></i> Add to cart</button>";
			$('#product_photo').html(image);
			$('#product_cart').html(cart_btn);
			$('#desc').text(desc);
			$('#pro-name').text(name);
			$('#pro-price').text("৳ "+price);
		});
	});
</script>
@endsection