@extends('Client.client_master')
@section('client-home')

<div class="container">
	<div class="row">
		<section class="panel">
			<header class="panel-heading" style="background:#3EBD96;padding:10px;"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<span style="font-size:13px;font-weight:bold;color:white;font-family:sans-serif;"> ORDER LIST</span>

			</header>
			<div class="panel-body">
				<div class="adv-table">

					<div class="col-sm-12" style="margin:0;padding:0;overflow:auto">
						<table class="table table-bordered table-hover" data-toggle="table" data-url=""
							data-cache="false" data-height="299">
							<thead style="background:gray;color:white;font-family:sans-serif;font-weight:bold;">
								<tr>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
									{{-- <th class="mobile_dt">Discount</th>
									<th class="mobile_dt">Time</th> --}}
									<th>
								<div class="img" style="display:none; position: absolute; left:50%; top: 50%; z-index: 1000;">
											<p id="percent"></p>
											<img src="" />

										</div>

									</th>

								</tr>
                            </thead>
                            @php($sum = 0)
							@foreach ($cart as $v_cart)
                            <tbody id="trr">

                            <td>{{$v_cart->name}}</td>
                            <td>{{$v_cart->price}}</td>
                            <td>{{$v_cart->qty}}</td>
                            <td>{{$total = $v_cart->qty*$v_cart->price}}</td>

								
							</tbody> 
                            @endforeach
                            @php($sum = $sum +$total)
                            <tr>
                            <th>Item Total</th>
                            <td>{{$sum}}</td>
                            <th>Vat total</th>
                            <td>{{$vat = 0}}</td>
                            <th>Payable Total</th>
                            <td>{{$sum + $vat}}</td>
                            </tr>
                        
						</table>

					</div>

				</div>
			</div>

			<!-- if not logged in -->

         @if (Session::get('client_id')) 
                
         
			<div id="place_order">
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="card">
						
                        <div class="card-body">
							<form action="" method="post">
								<input type="hidden" value="" name="customer_id" id="customer_id">
								<h4 class="header-title"><i class="fas fa-map-marker-alt"></i> Delivery Address</h4>
								
								<div class="form-group">
									<label class="checkbox-inline"><input type="checkbox" value="1" id="same-address" name="same_address">Same as present address</label>
								</div>

                                <div class="form-group" id="shipping">
                                <label class="col-form-label">Shipping Address</label>
									<textarea class="form-control" rows="3" name="shipping_address"  id="shipping_address" placeholder="Shipping Address"></textarea>
                                </div>

                                <div class="form-group">
                                <label  class="col-form-label">Coupon Code (Optional)</label>
                                    <input type="text" name="coupon" class="form-control" placeholder="Coupon Code">
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="col-form-label">Payment Method</label>
                                            <select name="payment_method" id="payment_method" class="form-control" onchange="bkashTransactionCode(this.value)">
                                                <option value="1">Cash on Delivery</option> <!-- 1 for cash -->
                                                <option value="2">Bkash</option> <!-- 2 for bkash -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" id="bkash_transaction_code" style="display:none">
                                        <div class="form-group" >
                                            <label   class="col-form-label">Transaction Number</label>
                                            <input type="text" id="transaction_id" name="transaction_id" placeholder="Transaction Number" class="form-control">
                                        </div>
                                       
                                    </div>
                                </div>
                                

								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Place Order">
								</div>
							</form>
						</div>
                       
					</div>
					<!-- Textual inputs end -->
				</div>
            </div>
            
			<div id="need_to_add_cart">
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="p-10">
						<h4 class="text-center">You need to add product to place order!</h4>
						<div class="row">
							<div class="p-10 place-order-signInOption">
								<img src="" width="100%">
							</div>
						</div>
					</div>
				</div>
			</div>
	
			<!-- if not logged in -->

		
			
			 @else
			<form action="" method="post">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
						
                        {{-- <label class="col-sm-12 control-label"><a href="{{route('client-login')}}" class="btn btn-default" style="background:#3EBD96;color:#fff">Login &nbsp;</a> OR You can create an account for placing your
								order.</label> --}}
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">
								<div class="row">
									<div class="col-sm-12">
									
									</div>
							</label>

						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">Full Name</label>
							<div class="col-sm-10">
								<input type="text" name="full_name" id="full_name" class="form-control" required placeholder="Name">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">User Name</label>
							<div class="col-sm-10">
								<input type="text" name="user_name" id="user_name" class="form-control" required placeholder="User Name">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">Mobile</label>
							<div class="col-sm-10">
								<input type="text" name="contact_no" required="required" id="contact_no" class="form-control"
									required placeholder="Mobile Number">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12 control-label">Present Address</label>
							<div class="col-sm-10">
								<input type="text" name="present_address" required="required" id="present_address" class="form-control"
									required placeholder="Present Address">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">Password</label>
							<div class="col-sm-10">
							<input type="password" name="password" required="required" id="password" class="form-control"
									required placeholder="Type a password with at least 6 characters">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">Confirm Password</label>
							<div class="col-sm-10">
							<input type="password" class="form-control" name="c_password" autocomplete="off" placeholder="Confirm password" onkeyup="confirm_password(this.value)" required>
							</div>
							<!--<small class="alert alert-danger"></small>-->
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary o-btn" name="submit" value="Submit"><span
										class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
									Submit</button>
							</div>
						</div>
					</div>
            </form>
            @endif

		</section>
	</div>
</div>





<script>
function confirm_password(value){
		var password = $('#password').val();
		// alert(password);
		if(value == password){
			$("#password").css("border", "2px solid green");
		}else{
			$("#password").css("border", "2px solid red");
		}
	}
</script>
<script>
	$(document).ready(function () {
		$('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#shipping').hide();
				$('#shipping_address').attr('required',false);
            }
            else if($(this).prop("checked") == false){
                $('#shipping').show();
				$('#shipping_address').attr('required',true);
            }
        });


		if (Modernizr.mq('(min-width: 768px)')) {
			$("#toggle").show();
		} else {
			$("#toggle").hide();
		}
		$(".order-btn").hide();

		var customer_id = $('#customer_id').val();
		$.getJSON( "", {
			"customer_id":customer_id,
			format: "json"
		}).done(function( data ) {
			// $("#area_name").val(data['area_name']);
			$("#full_name").val(data['full_name']);
			$("#contact_no").val(data['contact_no']);

			/*$("#same-address").click(function(){
				var value=$("#same-address").val();
				alert(value);
			});*/
			$('#same-address').on('change', function() {
				var value=this.checked ? this.value : '';
				if(value==1){
					$("#shipping_address").val(data['present_address']);
				}
				else if(value==""){
					$("#shipping_address").val("");
				}
			});
		});
	});

   function bkashTransactionCode(pm){
       $('#bkash_transaction_code').toggle();
       if(pm == 2){
            $('#transaction_id').attr('required','required');
       }else{
        $('#transaction_id').attr('required',false);
       }
       
        // $('#bkash_transaction_code').css('display','block');
    }

	// $('#same-address').click(function() {
    // $("#shipping").toggle(
	// 	function(){$("#shipping_address").attr({"required": false});},
	// 	function(){$("#shipping_address").attr({"required": true});},
	// );


	
	

</script>


@endsection