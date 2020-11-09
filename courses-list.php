<?php require('top.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$sql="select product.*,categories.categories from product,categories 
where product.categories_id=categories.id and product.status=1  and product.cour_status=1 order by product.id desc";
$res=mysqli_query($con,$sql);


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
							<a href="courses-grid.php"><i class="icon-th"></i></a>
							<a href="#0" class="active"><i class="icon-th-list"></i></a>
						</div>
					</li>
					<li>
						<!-- <select name="orderby" class="selectbox">
							<option value="category">Category</option>
							<option value="category 2">Literature</a></option>
							<option value="category 3">Architecture</option>
							<option value="category 4">Economy</option>
							</select> -->
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
		<?php 
							$i=1;
							while($rows=mysqli_fetch_assoc($res)){?>
		<div class="container margin_60_35">
			<div class="box_list wow">
				<div class="row no-gutters">
				
					<div class="col-lg-5">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<!-- <a href="course-detail.php"><img src="http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg" class="img-fluid" alt=""></a> -->
							<a href="product.php?id=<?php echo $rows['id']?>"><img style="height: 100%; width:100%;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$rows['image']?>" class="img-fluid" alt=""></a>
							<div class="preview"><span>Preview course</span></div>
						</figure>
					</div>
					<div class="col-lg-7">
						<div class="wrapper">
							<a href="#0" class="wish_bt"></a>
							<div class="price">&#x20B9; <?php echo $rows['price']?></div>
							<small>c<?php echo $rows['categories']?></small>
							<h3><?php echo $rows['title']?></h3>
							<p><?php echo $rows['short_desc']?></p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> <?php echo $rows['duration']?></li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="product.php?id=<?php echo $rows['id']?>">Enroll now</a></li>
						</ul>
					</div>
							
				</div>
			</div>
			
			<!-- /box_list -->
		
			<!-- /box_list --><?php }?>
			<p class="text-center add_top_60"><a href="#0" class="btn_1">Load more</a></p>
		</div>
		
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