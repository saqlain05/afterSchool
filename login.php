
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational site template</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.php"><img src="img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
			  
				<div class="access_social">
					<a href="#0" class="social_bt facebook">Login with Facebook</a>
					<a href="#0" class="social_bt google">Login with Google</a>
					<a href="#0" class="social_bt linkedin">Login with Linkedin</a>
				</div>
				<div class="divider"><span>Or</span></div>
				<form method="post" action="login_submit.php">
				<div class="form-group">
					<span class="input">
					<input class="input_field" type="text" autocomplete="off" name="email" >
						<label class="input_label">
						
						<span class="input__label-content">Your email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" autocomplete="new-password" name="password" >
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>
					<br>	
					<small><a href="#0">Forgot password?</a></small>
				</div>
				<!-- <a href="#0" class="btn_1 rounded full-width add_top_60">Login to Udema</a> -->
				<button type="submit" class="btn_1 rounded full-width add_top_30" onclick="user_login()">Login to Udema</button>
				</form>
				<!-- <button type="submit" name="submit" class="btn_1 rounded full-width add_top_30">Login to Udema</button> -->
				
				<div class="text-center add_top_10">New to Udema? <strong><a href="register.php">Sign up!</a></strong></div>
			
			<div class="copy">© 2017 Udema</div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/custom.js"></script> -->
	<script src="assets/validate.js"></script>	
	
  
</body>
</html>