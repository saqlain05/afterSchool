<?php
require('connection.php');
require('functions.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$fname=get_safe_value($con,$_POST['fname']);
$lname=get_safe_value($con,$_POST['lname']);
$mobile=get_safe_value($con,$_POST['mobile']);
$uid=$_SESSION['USER_ID'];
mysqli_query($con,"update users set fname='$fname',lname='$lname' ,where id='$uid'");
$_SESSION['USER_NAME']=$fname;
$_SESSION['USER_LNAME']=$lname;
$_SESSION['USER_MOBILE']=$mobile;
header('location:profile.php');
?>