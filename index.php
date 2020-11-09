<?php require('top.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
?>

<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>What would you learn?</h3>
					<p>Increase your expertise in business, technology and personal development</p>
					<form>
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class=" search-query" placeholder="Ex. Architecture, Specialization...">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->

		<div class="features clearfix">
			<div class="container">
				<ul>
					<li><i class="pe-7s-study"></i>
						<h4>+200 courses</h4><span>Explore a variety of fresh topics</span>
					</li>
					<li><i class="pe-7s-cup"></i>
						<h4>Expert teachers</h4><span>Find the right instructor for you</span>
					</li>
					<li><i class="pe-7s-target"></i>
						<h4>Focus on target</h4><span>Increase your personal expertise</span>
					</li>
				</ul>
			</div>
		</div>
		<!-- /features -->

		<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Udema Popular Courses</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
						<?php
                        $get_product = get_product($con,10);
                        foreach($get_product as $list){
                        ?>
			<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="product.php?id=<?php echo $list['id']?>"><img style="height:40vh"  src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="img-fluid" alt=""></a>
							<div class="price">&#8377; <?php echo $list['price']?></div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small><?php echo $list['categories']?></small>
							<h3><?php echo $list['title']?></h3>
							<p><?php echo $list['short_desc']?> </p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> <?php echo $list['duration']?></li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="product.php?id=<?php echo $list['id'] ?>">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- /carousel -->
			<div class="container">
				<p class="btn_home_align"><a href="courses-grid.php" class="btn_1 rounded">View all courses</a></p>
			</div>
			<!-- /container -->
			<hr>
		</div>
		<!-- /container -->

		<div class="container margin_30_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Udema Categories Courses</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div class="row">
			<?php
										    foreach($cat_arr as $list){
									        ?>
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="categories.php?id=<?php echo $list['id']?>" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							
							<img style="height: 40vh; width:100%" src="media/product/283540565_logo.jpg" class="img-fluid" alt="">
							
							<div class="info">
								<small><i class="ti-layers"></i>15 Programmes</small>
								<h3><?php echo $list['categories']?></h3>
							</div>
						</figure>
					</a>
				</div>
				<!-- /grid_item -->
						<?php }?>					
					</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>News and Events</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Mark Twain</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Pri oportere scribentur eu</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="http://via.placeholder.com/500x333/ccc/fff/news_home_2.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Jhon Doe</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Duo eius postea suscipit ad</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="http://via.placeholder.com/500x333/ccc/fff/news_home_3.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Luca Robinson</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Elitr mandamus cu has</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
					<div class="col-lg-6">
						<a class="box_news" href="#0">
							<figure><img src="http://via.placeholder.com/500x333/ccc/fff/news_home_4.jpg" alt="">
								<figcaption><strong>28</strong>Dec</figcaption>
							</figure>
							<ul>
								<li>Paula Rodrigez</li>
								<li>20.11.2017</li>
							</ul>
							<h4>Id est adhuc ignota delenit</h4>
							<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
						</a>
					</div>
					<!-- /box_news -->
				</div>
				<!-- /row -->
				<p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->

		<div class="call_section">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>Enjoy a great students community</h3>
							<p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
							<a href="#0" class="btn_1 rounded">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
    </main>
    
    <?php require('footer.php')?>