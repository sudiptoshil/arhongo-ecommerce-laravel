
@include('Client.Header.header')

@yield('client-home')
<!-- modal for show product details end here -->


@include('Client.Footer.footer')


<script>
	$(document).ready(function () {
	   // var form1 = $(this).prevAll('.item:last');
	   //jQuery('.carousel-inner').siblings('.item:first').addClass( "active" );
        // var a = $(this).siblings('.line_item_wrapper').eq(0);
        //console.log(form1);

		$(".pro-box-btn").click(function(){
			var desc=$(this).attr("data-desc");
			var id=$(this).attr("data-id");
            var image=$(this).attr("data-image");
            
			var name=$(this).attr("data-name");
			var price=$(this).attr("data-price");
			image="assets/"+image+"' width='100%'>";
			cart_btn="<button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fa fa-shopping-cart'></i> Add to cart</button>";
			$('#product_photo').html(image);
			$('#product_cart').html(cart_btn);
			$('#desc').text(desc);
			$('#pro-name').text(name);
			$('#pro-price').text("৳ "+price);
		});
	});
</script>