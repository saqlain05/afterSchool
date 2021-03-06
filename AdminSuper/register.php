<?php 
require("connection.php");
require("functions.php");
$fname='';
$lname='';
$email='';
$password='';
$mobile='';
// $picture='';

// $picture_required='required';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from admin where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$fname=$row['fname'];
		$lname=$row['lname'];
		$email=$row['email'];
		$password=$row['password'];
		$mobile=$row['mobile'];
	}else{
		header('location:index.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$email=get_safe_value($con,$_POST['email']);
	$password=get_safe_value($con,$_POST['password']);
	$fname=get_safe_value($con,$_POST['fname']);
	$lname=get_safe_value($con,$_POST['lname']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$res=mysqli_query($con,"select * from admin where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Email already exist";
			}
		}else{
			$msg="Email already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update admin set email='$email', password='$password',lname='$lname',fname='$fname',mobile='$mobile', where id='$id'");
		}else{
			$added_on=date('Y-m-d h:i:s');
			mysqli_query($con,"insert into admin(email, password, fname, lname, mobile,added_on) 
			values('$email', '$password','$fname','$lname','$mobile','$added_on')");
		}
        header('location:index.php');
            // echo  '<span style="padding:30rem; padding-top:40rem;" ><a class="btn_1 medium"  href="categories_master.php"> categories_master</a> </span>';
		die();
	}
}

	?>


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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/vendors.css" rel="stylesheet">
	<link href="../css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">
	
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
			<form method="post">
				<div class="form-group">

					<span class="input">
					<input class="input_field" type="text" name="fname" required>
						<label class="input_label">
						<span class="input__label-content">Your First Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="text" name="lname" required>
						<label class="input_label">
						<span class="input__label-content">Your Last Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="number" name="mobile" required >
						<label class="input_label">
						<span class="input__label-content">Your Mobile Number</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="email" name="email" required>
						<label class="input_label">
						<span class="input__label-content">Your Email</span>
					</label>
					
					</span>
					<div class="field_error" style="color:red;"><?php echo $msg?></div>
					<span class="input">
					<input class="input_field" type="password" name="password" id="password1" required>
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>

					
					
					<div id="pass-info" class="clearfix"></div>
				</div>
				<button type="submit" name="submit" class="btn_1 rounded full-width add_top_30">Register to Udema</button>
				</form>
				<!-- <a href="#0" class="btn_1 rounded full-width add_top_30">Register to Udema</a> -->
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
		
			<div class="copy">© 2017 Udema</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/common_scripts.js"></script>
    <script src="../js/main.js"></script>
	<script src="../assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="../js/pw_strenght.js"></script>
  
</body>
</html>