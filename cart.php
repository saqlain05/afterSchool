<?php require('top.php');
?>


<main>
		<section id="hero_in" class="cart_section">
			<div class="wrapper">
				<div class="container">
					<div class="bs-wizard clearfix">
						<div class="bs-wizard-step active">
							<div class="text-center bs-wizard-stepnum">Your cart</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#0" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step disabled">
							<div class="text-center bs-wizard-stepnum">Payment</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#0" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step disabled">
							<div class="text-center bs-wizard-stepnum">Finish!</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#0" class="bs-wizard-dot"></a>
						</div>
					</div>
					<!-- End bs-wizard -->
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<div class="box_cart">
						<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Item
									</th>
									<th>
										Quantity
									</th>
									<th>
										MRP
									</th>
									<th>
										Price
									</th>
									<th>
										Total Price
									</th>
									<th>
										Discount
									</th>
									<th>
										Actions
									</th>
								</tr>
							</thead>
							<tbody>
							<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
											$pname=$productArr[0]['title'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
											

											$discount1=($mrp-$price);
												$discount2=$discount1/$mrp;

											$discount= $discount2 * 100;
											$total_price=$qty*$price;
											// $total_price=$total_price+($qty*$price);
											

											?>
								<tr>
									<td>
										<div class="thumb_cart">
											<!-- <img src="http://via.placeholder.com/150x150/ccc/fff/thumb_cart_1.jpg" alt="Image"> -->
											<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="product images">
										</div>
										<span class="item_cart"><?php echo $pname?></span>
									</td>
									<td>
									<!-- <td class="product-quantity"> -->
										<strong><input type="number" style="width:100%;" id="<?php echo $key?>qty" value="<?php echo $qty?>" /></strong>
									</td>
									
									<td>
										<strong>$<?php echo $mrp?></strong>
										
									</td>
									<td>
										<strong>$<?php echo $price?></strong>
										
									</td>
									<td>
										<strong>$<?php echo $total_price?></strong>
										
									</td>
									<td>
										<?php echo $discount ?>%
									</td>
									<td class="options" style="width:5%; text-align:center;">
										<!-- <a href="#"><i class="icon-trash"></i></a> -->
										<br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
										<td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="icon-trash icons"></i></a></td>
									</td>
								</tr>
								<?php } } ?>
							</tbody>
							
						</table>
						<div class="cart-options clearfix">
							<div class="float-left">
								<div class="apply-coupon">
									<div class="form-group">
										<input type="text" name="coupon-code" value="" placeholder="Your Coupon Code" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn_1 outline">Apply Coupon</button>
									</div>
								</div>
							</div>
							<div class="float-right fix_mobile">
							<a class="btn_1 outline" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update Cart</a>
								<!-- <button type="button" class="btn_1 outline">Update Cart</button> -->
							</div>
						</div>
						<!-- /cart-options -->
					</div>
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail">
							<div id="total_cart">
								Total Product <span class="float-right"><?php echo $totalProduct?></span>
							</div>
							<div class="add_bottom_30">Lorem ipsum dolor sit amet, sed vide <strong>moderatius</strong> ad. Ex eius soleat sanctus pro, enim conceptam in quo, <a href="#0">brute convenire</a> appellantur an mei.</div>
							<?php if(isset($_SESSION['USER_LOGIN'])){
                                            
                                            echo	'<a href="checkout.php" class="btn_1 full-width">Checkout</a>';
                                            
										}else{
										echo	'<a href="login.php" class="btn_1 full-width">Login/Register then Checkout</a>';
										}
										?>		
				
							<a href="<?php echo SITE_PATH?>" class="btn_1 full-width outline"><i class="icon-right"></i> Continue Shopping</a>
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>


  
	<script>
            function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}
        </script>

	<?php require('footer.php')?>