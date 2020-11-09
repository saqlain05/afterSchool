<?php
require('connection.php');
require('functions.php');

$fname=get_safe_value($con,$_POST['fname']);
$lname=get_safe_value($con,$_POST['lname']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$password=get_safe_value($con,$_POST['password']);

$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
if($check_user>0){
    echo "email_present"; echo '<br>';
    echo '<a href="register.php" id="link">GOTO REGISTER FORM</a>';

    // header('location:register.php');
    // echo '<script>alert("email present")</script>';

//    


    
}else{
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into users(fname,lname,email,mobile,password,added_on) values('$fname','$lname','$email','$mobile','$password','$added_on')");
    // echo "insert";
    
    header('location:login.php');
    echo 'alert("register successfully")';
}

?>

