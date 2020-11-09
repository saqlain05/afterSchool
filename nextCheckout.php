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
					<h1 class="fadeInUp"><span></span> Site Under Development</h1>
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

		
		<!-- /bg_color_1 -->
	</main>

</body>
</html>


<?php require('footer.php')?>