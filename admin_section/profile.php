<?php
require('top.php');
$uid=$_SESSION['ADMIN_ID'];
$row=mysqli_fetch_assoc(mysqli_query($con,"select * from tuitor_admin where id='$uid'"));
// $password=$row['password'];
$_SESSION['mobile']=$row['mobile'];
$_SESSION['email']=$row['email'];
$_SESSION['fname']=$row['fname'];
$_SESSION['lname']=$row['lname'];

?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add listing</li>
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-user"></i>Profile details</h2>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					<label>Your photo</label>
						<form action="/file-upload" class="dropzone"></form>
				    </div>
				</div>
				<div class="col-md-8 add_top_30">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" placeholder="Your name"
                                value="<?php echo $_SESSION['fname']?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last name</label>
								<input type="text" class="form-control" placeholder="Your last name"
                                value="<?php echo $_SESSION['lname']?>">
							</div>
						</div>
					</div>
					<!-- /row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Telephone</label>
								<input type="text" class="form-control" placeholder="Your telephone number"
                                value="<?php echo $_SESSION['mobile']?>" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Your email"
                                value="<?php echo $_SESSION['email']?>" disabled>
							</div>
						</div>
					</div>
					<!-- /row-->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Personal info</label>
								<textarea style="height:100px;" class="form-control" placeholder="Personal info"></textarea>
							</div>
						</div>
					</div>
					<!-- /row-->
				</div>
			</div>
		</div>
		<!-- /box_general-->
		<div class="row">
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-lock"></i>Change password</h2>
					</div>
					<div class="form-group">
						<label>Old password</label>
						<input class="form-control" type="password">
					</div>
					<div class="form-group">
						<label>New password</label>
						<input class="form-control" type="password">
					</div>
					<div class="form-group">
						<label>Confirm new password</label>
						<input class="form-control" type="password">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box_general padding_bottom">
					<div class="header_box version_2">
						<h2><i class="fa fa-envelope"></i>Change email</h2>
					</div>
					<div class="form-group">
						<label>Old email</label>
						<input class="form-control" name="old_email" id="old_email" type="email">
					</div>
					<div class="form-group">
						<label>New email</label>
						<input class="form-control" name="new_email" id="new_email" type="email">
					</div>
					<div class="form-group">
						<label>Confirm new email</label>
						<input class="form-control" name="confirm_new_email" id="confirm_new_email" type="email">
					</div>
				</div>
			</div>
		</div>
		<!-- /row-->
		<p><a href="#0" class="btn_1 medium">Save</a></p>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
<?php require('footer.php')?>