<?php 
require('top.php');

if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];
$row=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$uid'"));
// $password=$row['password'];
$_SESSION['mobile']=$row['mobile'];
$_SESSION['email']=$row['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
		<section id="hero_in" class="contacts">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span> Udema Profile</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="contact_info">
			<div class="container">
				<ul class="clearfix">
					<li>
						<i class="pe-7s-map-marker"></i>
						<h4>Address</h4>
						<span>PO Box 97845 Baker st. 567, Los Angeles<br>California - US.</span>
					</li>
					<li>
						<i class="pe-7s-mail-open-file"></i>
						<h4>Email address</h4>
						<span>admission@udema.com - info@udema.com<br><small>Monday to Friday 9am - 7pm</small></span>

					</li>
					<li>
						<i class="pe-7s-phone"></i>
						<h4>Contacts info</h4>
						<span>+ 61 (2) 8093 3402 + 61 (2) 8093 3402<br><small>Monday to Friday 9am - 7pm</small></span>
					</li>
				</ul>
			</div>
		</div>
		<!--/contact_info-->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="row justify-content-between">
					<div class="col-lg-5">
						<!-- <div class="map_contact"> -->
						</div>
						<!-- /map -->
					</div>
					<div class="col-lg-6">
						<h4>Profile</h4>
						<p>Ex quem dicta delicata usu, zril vocibus maiestatis in qui.</p>
						<div id="message-contact"></div>
						<form method="post" action="update_profile.php">
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="name_contact" name="fname" value="<?php echo $_SESSION['USER_NAME']?>" >
										<label class="input_label">
											<span class="input__label-content">Your Name</span>
										</label>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="lastname_contact" name="lname" value="<?php echo $_SESSION['USER_LNAME']?>">
										<label class="input_label">
											<span class="input__label-content">Last name</span>
										</label>
									</span>
								</div>
							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<span class="input">
                                        <input class="input_field" type="email" id="email_contact" name="email_contact" 
                                        value="<?php echo $_SESSION['email']?>"  disabled style="cursor:no-drop;"> 
										<label class="input_label">
											<span class="input__label-content">Your email</span>
										</label>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
                                        <input class="input_field" type="text" id="phone_contact" 
                                        name="mobile" value="<?php echo $_SESSION['mobile']?>" disabled style="cursor:no-drop;">
										<label class="input_label">
											<span class="input__label-content">Your telephone</span>
										</label>
									</span>
								</div>
							</div>
							<!-- /row -->
							<!-- <span class="input">
									<textarea class="input_field" id="message_contact" name="message_contact" style="height:150px;"></textarea>
									<label class="input_label">
										<span class="input__label-content">Your message</span>
									</label>
							</span>
							<span class="input">
									<input class="input_field" type="text" id="verify_contact" name="verify_contact">
									<label class="input_label">
									<span class="input__label-content">Are you human? 3 + 1 =</span>
									</label>
							</span> -->
                            <!-- <p class="add_top_30"><input type="submit" class="btn_1 rounded" id="submit-contact"></p> -->
                            <button type="submit" class="btn_1 rounded full-width add_top_30">Update Your Profile</button>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>

</body>
</html>


<?php require('footer.php')?>