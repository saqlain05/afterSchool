<?php 
require("top.php");



$categories_id='';
$title='';
$price='';
$mrp='';
$duration='';
$short_desc='';
$description='';
$image='';
$msg='';
$vidtitle1='';
$vidtitle2='';
$vidtitle3='';
$vidtitle4='';
$vidurl1='';
$vidurl2='';
$vidurl3='';
$vidurl4='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$title=$row['title'];
		$price=$row['price'];
		$mrp=$row['mrp'];
		$duration=$row['duration'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$vidtitle1=$row['vidtitle1'];
		$vidtitle2=$row['vidtitle2'];
		$vidtitle3=$row['vidtitle3'];
		$vidtitle4=$row['vidtitle4'];
		$vidurl1=$row['vidurl1'];
		$vidurl2=$row['vidurl2'];
		$vidurl3=$row['vidurl3'];
		$vidurl4=$row['vidurl4'];
	
	}else{
		// header('location:product.php');
		die();
	}
}
if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$title=get_safe_value($con,$_POST['title']);
	$price=get_safe_value($con,$_POST['price']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$duration=get_safe_value($con,$_POST['duration']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$vidtitle1=get_safe_value($con,$_POST['vidtitle1']);
	$vidtitle2=get_safe_value($con,$_POST['vidtitle2']);
	$vidtitle3=get_safe_value($con,$_POST['vidtitle3']);
	$vidtitle4=get_safe_value($con,$_POST['vidtitle4']);
	$vidurl1=get_safe_value($con,$_POST['vidurl1']);
	$vidurl2=get_safe_value($con,$_POST['vidurl2']);
	$vidurl3=get_safe_value($con,$_POST['vidurl3']);
	$vidurl4=get_safe_value($con,$_POST['vidurl4']);

	
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
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update product set categories_id='$categories_id',title='$title',price='$price',
				mrp='$mrp',duration='$duration',short_desc='$short_desc',description='$description', image='$image'
				 where id='$id'";
			}else{
				$update_sql="update product set categories_id='$categories_id',title='$title',price='$price',
				mrp='$mrp',duration='$duration',short_desc='$short_desc',description='$description'
				 where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into product(categories_id,title,price,mrp,duration,short_desc, 
			description ,status,image, vidtitle1,vidtitle2,vidtitle3, vidtitle4, vidurl1,vidurl2,vidurl3,vidurl4)
			values('$categories_id','$title','$price','$mrp','$duration','$short_desc','$description'
			,1,'$image', '$vidtitle1', '$vidtitle2','$vidtitle3','$vidtitle4','$vidurl1','$vidurl2','$vidurl3','$vidurl4')");
		}
		echo '
		<script language="javascript" type="text/javascript">
alert("Your Cousrse is Add/Edit successfully");
window.location.href="product.php";
</script>
		';
		// echo '<span style="padding:50rem; padding-top:100rem;" >Course Add Successfully </span>';
		// echo  '<span style="padding:50rem; padding-top:130rem;" ><a class="btn_1 medium"  href="add-listing.php"> Add Listing</a> </span>';
		die();
	}
}

$vsql="select * from vidcategories where id=1";
$vres=mysqli_query($con,$vsql);
$wsql="select * from vidcategories where id=2";
$wres=mysqli_query($con,$wsql);
$xsql="select * from vidcategories where id=3";
$xres=mysqli_query($con,$xsql);
$ysql="select * from vidcategories where id=4";
$yres=mysqli_query($con,$ysql);


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
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Course title</label>
						<input type="text" class="form-control" placeholder="Course title" required name="title" value="<?php echo $title?>" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Course price</label>
						<input type="number" class="form-control" placeholder="Course Price" required name="price" value="<?php echo $price?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Course MRP</label>
						<input type="number" class="form-control" placeholder="Course MRP" required name="mrp" value="<?php echo $mrp?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Course Duration</label>
						<input type="text" class="form-control" placeholder="Course Duration i.e : 1h 45m " required name="duration" value="<?php echo $duration?>">
					</div>
				</div>
			</div>
			<!-- /row-->
			<!-- <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Course start</label>
						<input type="text" class="form-control date-pick" placeholder="Course start">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Course expire</label>
						<input type="email" class="form-control date-pick" placeholder="Your email">
					</div>
				</div>
			</div> -->
			<!-- /row-->
			<div class="row">
				<!-- <div class="col-md-6">
					<div class="form-group">
						<label>Teacher name</label>
						<input type="text" class="form-control" placeholder="Course teacher">
					</div>
				</div> -->
				<div class="col-md-6">
					<div class="form-group">
						<label>Course Category</label>
						<!-- <input type="text" class="form-control" placeholder="Choose Course Category"> -->
						
<select class="form-control"  name="categories_id" required>
<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>

</select>
					</div>
				</div>
				
			</div>
			
			<!-- /row-->
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label for="categories" class=" form-control-label"> Choose Image</label>
									<input type="file" name="image" class="form-control"  <?php echo  $image_required?>>
					</div>
				</div>
			</div>
			<!-- /row-->
		</div> 
		<!-- /box_general-->
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file-text"></i>Description</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Short description</label>
						<textarea rows="5" required class="form-control" style="height:100px;" placeholder=" Short Description" name="short_desc"><?php echo $short_desc?></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Course description</label>
						<textarea rows="5" required class="form-control" style="height:100px;" placeholder="Description" name="description"><?php echo $description?></textarea>
					</div>
				</div>
			</div>
			<!-- /row-->
			
			<!-- /row-->
		</div>
		<!-- /box_general-->
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-video-camera"></i>Videos <span style="color:red;"> Adding video is not avilable at this moment</span></h2>
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
											<input type="text" class="form-control" placeholder="Video title" name="vidtitle1">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Video Category</h6>
										<?php 
										while($vrow=mysqli_fetch_assoc($vres)){?>
										<input type="text" class="form-control"  value=<?php echo $vrow['vidcategories']?> disabled>
										<?php } ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Upload video</h6>
											<input type="text" class="form-control"  placeholder="Video URL" name="vidurl1">
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
											<a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
									<h6> video Title</h6>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Video title" name="vidtitle2">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Video Category</h6>
										<?php 
										while($wrow=mysqli_fetch_assoc($wres)){?>
										<input type="text" class="form-control"  value=<?php echo $wrow['vidcategories']?> disabled>
										<?php } ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Upload video</h6>
											<input type="text" class="form-control"  placeholder="Video URL" name="vidurl2">
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
											<a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
									<h6> video Title</h6>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Video title" name="vidtitle3">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Video Category</h6>
										<?php 
										while($xrow=mysqli_fetch_assoc($xres)){?>
										<input type="text" class="form-control"  value=<?php echo $xrow['vidcategories']?> disabled>
										<?php } ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Upload video</h6>
											<input type="text" class="form-control"  placeholder="Video URL" name="vidurl3">
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
											<a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
									<h6> video Title</h6>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Video title" name="vidtitle4">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Video Category</h6>
										<?php 
										while($yrow=mysqli_fetch_assoc($yres)){?>
										<input type="text" class="form-control"  value=<?php echo $yrow['vidcategories']?> disabled>
										<?php } ?>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										<h6> Upload video</h6>
											<input type="text" class="form-control"  placeholder="Video URL" name="vidurl4">
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="form-group">
											<a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
										</div>
									</div>
								</div>
							</td>
						</tr>
					</table>
					
					<a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add Item</a>
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