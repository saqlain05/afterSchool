<?php 
require('top.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	// window.location.href='index.php';
	window.location.href='search.php';
	</script>
	<?php
}										
?>


<main>
		<section id="hero_in" class="courses">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Online courses</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				<ul class="clearfix">
					<li>
						<div class="switch-field">
							<input type="radio" id="all" name="listing_filter" value="all" checked>
							<label for="all">All</label>
							<input type="radio" id="popular" name="listing_filter" value="popular">
							<label for="popular">Popular</label>
							<input type="radio" id="latest" name="listing_filter" value="latest">
							<label for="latest">Latest</label>
						</div>
					</li>
					<li>
						<div class="layout_view">
							<a href="#0" class="active"><i class="icon-th"></i></a>
							<a href="courses-list.php"><i class="icon-th-list"></i></a>
						</div>
					</li>
					<li >
				

				<select name="orderby" class="selectbox" onchange="location = this.value;">
				<option value="category">categories</option>
												<?php
										    foreach($cat_arr as $list){
									        ?>
 <option value="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></option>

 <?php } ?>
</select>
							
					</li>
						</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

        <?php if(count($get_product)>0){?>
		<div class="container margin_60_35">
        
			<div class="row">
			<?php
										foreach($get_product as $list){
										?>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<!-- <a href="course-detail.php"><img src="http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg" class="img-fluid" alt=""></a> -->
							<a href="product.php?id=<?php echo $list['id']?>"><img style="height: 40vh; width:100%;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="img-fluid" alt=""></a>
							<div class="price"><?php echo $list['price']?></div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							
							<small> <?php echo $list['categories']?> </small>
							<h3><?php echo $list['title']?></h3>
							<p><?php echo $list['short_desc']?></p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> <?php echo $list['duration']?></li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="product.php?id=<?php echo $list['id']?>">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<!-- /box_grid -->
							<?php } ?>
			</div>
			<!-- /row -->
           
			<!-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> -->
		</div>
        <?php } else { 
                        echo "Data not found";
                        
                        
					} ?>
		<!-- /container -->
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Need Help? Contact us</h4>
							<p>Cum appareat maiestatis interpretaris et, et sit.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Payments and Refunds</h4>
							<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Quality Standards</h4>
							<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>

<?php require('footer.php')?>