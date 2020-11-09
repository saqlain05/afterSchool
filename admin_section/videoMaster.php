<?php 
require("top.php");


$videoUrl='';
$videoTitle='';
$vidCategories='';
$admin_id=$_SESSION['ADMIN_ID'];
// $admin_id="";
$product_id='';
$msg ="";


if(isset($_POST['submit'])){
	$videoUrl=get_safe_value($con,$_POST['videoUrl']);
	$videoTitle=get_safe_value($con,$_POST['videoTitle']);
	$vidCategories=get_safe_value($con,$_POST['vidCategories']);
	$product_id=get_safe_value($con,$_POST['product_id']);
    $admin_id=$_SESSION['ADMIN_ID'];
    
	

	
	// $res=mysqli_query($con,"select * from product where title='$title'");
	// $check=mysqli_num_rows($res);
	// if($check>0){
	// 	if(isset($_GET['id']) && $_GET['id']!=''){
	// 		$getData=mysqli_fetch_assoc($res);
	// 		if($id==$getData['id']){
			
	// 		}else{
	// 			$msg="Product already exist";
	// 		}
	// 	}else{
	// 		$msg="Product already exist";
	// 	}
	// }
	
	// if($_GET['id']==0){
	// 	if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
	// 		$msg="Please select only png,jpg and jpeg image formate";
	// 	}
	// }else{
	// 	if($_FILES['image']['type']!=''){
	// 			if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
	// 			$msg="Please select only png,jpg and jpeg image formate";
	// 		}
	// 	}
	// }
    
    $videoUrl=get_safe_value($con,$_POST['videoUrl']);
	$videoTitle=get_safe_value($con,$_POST['videoTitle']);
	$vidCategories=get_safe_value($con,$_POST['vidCategories']);
	$product_id=get_safe_value($con,$_POST['product_id']);
    $admin_id=$_SESSION['ADMIN_ID'];
    if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($con,"update video set videoUrl='$videoUrl', vieoTitle='$vieoTitle',
            vidCategories='$vidCategories',product_id='$product_id',admin_id='$admin_id', where id='$id'");
		}else{
			// $added_on=date('Y-m-d h:i:s');
            mysqli_query($con,"insert into video(videoUrl, videoTitle, vidCategories, product_id, admin_id)values('$videoUrl', '$videoTitle','$vidCategories','$product_id','$admin_id')");
        }
        echo '
		<script language="javascript" type="text/javascript">
alert("Your Email/Password is Wrong Please try again");
window.location.href="videoMaster.php";
</script>
		';
        // header('location:index.php');
            // echo  '<span style="padding:30rem; padding-top:40rem;" ><a class="btn_1 medium"  href="categories_master.php"> categories_master</a> </span>';
		die();
	}
}



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
	  <form method="post" enctype="multipart/form-data">
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Basic info</h2>
				<a href="product.php"><h2><i class="fa fa-file"></i><u>Goto Course Page</u></h2></a>
			</div>
		
		<!-- /box_general-->
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-video-camera"></i>Videos </h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h6>Item</h6>
					<table id="pricing-list-container" style="width:100%;">
						<tr class="pricing-list-item">
							<td>
								
							
							
								<div class="row">
									<div class="col-md-4">
									<h6> video Title</h6>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Video title" name="videoTitle">
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
										<h6> Product Title</h6>
                                        <select class="form-control"  name="product_id" required>
                                        <?php
										$res=mysqli_query($con,"select id,title from product where tuitor='$admin_id' order by id asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$product_id){
												echo "<option selected value=".$row['id'].">".$row['title']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['title']."</option>";
											}
											
										}
										?>

                                        </select>
										
										<!-- <input type="text" class="form-control"  value=hell> -->
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Video Category</h6>
                                        <select class="form-control"  name="vidCategories" required>
                                        <?php
										$res=mysqli_query($con,"select id,vidcategories from vidcategories where admin_id='$admin_id' order by id asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$vidCategories){
												echo "<option selected value=".$row['id'].">".$row['vidcategories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['vidcategories']."</option>";
											}
											
										}
										?>

                                        </select>
										
										<!-- <input type="text" class="form-control"  value=hell disabled> -->
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
										<h6> Upload video</h6>
											<input type="text" class="form-control"  placeholder="Video URL" name="videoUrl">
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
											<!-- <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a> -->
										</div>
									</div>
								</div>
							</td>
						</tr>
					</table>
					
					<!-- <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add Item</a> -->
					</div>
			</div>

			
			<!-- /row-->
		</div>
		<!-- /box_general-->
		<!-- <p><a href="#0" class="btn_1 medium">Save</a></p> -->
		<button id="payment-button" name="submit" type="submit" class="btn_1 medium">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
	  </div>
</form>
	  <!-- /.container-fluid-->
   	</div>
<?php require("footer.php")?>