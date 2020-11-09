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

$tuitor='';
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
		
		$tuitor=$_SESSION['ADMIN_ID'];
	
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
	
	$tuitor=$_SESSION['ADMIN_ID'];

	
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
			mysqli_query($con,"insert into product(categories_id,tuitor,title,price,mrp,duration,short_desc, 
			description ,status,image)
			values('$categories_id','$tuitor','$title','$price','$mrp','$duration','$short_desc','$description'
			,1,'$image')");
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