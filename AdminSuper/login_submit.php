



<?php
require('connection.php');
require('functions.php');

$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from admin where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$_SESSION['SUPER_LOGIN']='yes';
	$_SESSION['SUPER_ID']=$row['id'];
	$_SESSION['SUPER_FNAME']=$row['fname'];
	$_SESSION['SUPER_LNAME']=$row['lname'];
	$_SESSION['SUPER_MOBILE']=$row['mobile'];
	$_SESSION['password']=$row['password'];
    echo "valid";
    header('location:dashboard.php');
    header('location:dashboard.php');
    
}else{
	echo '
		<script language="javascript" type="text/javascript">
alert("Your Email/Password is Wrong Please try again");
window.location.href="index.php";
</script>
		';
}

?>
<br><br><br>
<!-- <a href="index.php" style="padding: 15px; margin-top:20px; color:white; background-color:blue;">Home</a>
<a href="login.php" style="padding: 15px; margin-top:20px; color:white; background-color:red;">Login</a> -->


