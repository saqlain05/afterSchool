<?php 
require("top.php");
$categories='';
// $picture='';

// $picture_required='required';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		header('location:categories_master.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update categories set categories='$categories' where id='$id'");
		}else{
			mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
		}
		// header('location:categories_master.php');
		echo '
		<script language="javascript" type="text/javascript">
alert("Category Added/Edit Sussessfully");
window.location.href="categories_master.php";
</script>
		';
            echo  '<span style="padding:30rem; padding-top:40rem;" ><a class="btn_1 medium"  href="categories_master.php"> categories_master</a> </span>';
		die();
	}


	// if($msg==''){
	// 	if(isset($_GET['id']) && $_GET['id']!=''){
	// 		if($_FILES['image']['name']!=''){
	// 			$picture=rand(111111111,999999999).'_'.$_FILES['image']['name'];
	// 			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$picture);
	// 			$update_sql="update categories set categories='$categories',picture='$picture' where id='$id'";
	// 		}else{
	// 			$update_sql="update categories set categories='$categories', where id='$id'";
	// 		}
	// 		mysqli_query($con,$update_sql);
	// 	}else{
	// 		$picture=rand(111111111,999999999).'_'.$_FILES['image']['name'];
	// 		move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$picture);
	// 		mysqli_query($con,"insert into categories(categories,status,picture) values('$categories',1,'$picture')");
	// 	}
	// 	echo  '<span style="padding:30rem; padding-top:40rem;" ><a class="btn_1 medium"  href="categories_master.php"> categories_master</a> </span>';
	// 	die();
	// }
}
?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Category Master</li>
      </ol>
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Category Form</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <h6>Category</h6>
                    <form method="post">
					<table id="pricing-list-container" style="width:100%;">
						<tr class="pricing-list-item">
							<td>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input name="categories" type="text" class="form-control" placeholder="Categories Name" required value="<?php echo $categories?>">
                                        </div>
										<!-- <div class="form-group">
										<label for="categories" class=" form-control-label"> Choose Image</label>
									<input type="file" name="picture" class="form-control" <?php echo  $picture_required?>>
                                        </div> -->
                                        
							            
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
        <!-- <p><a href="#0" class="btn_1 medium">Submit</a></p> -->
        <button id="payment-button" name="submit" type="submit" class="btn_1 medium">
							   <span id="payment-button-amount">Submit Button</span>
                               </button>
                               <div class="field_error"><?php echo $msg?></div>
                               </form>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
<?php require("footer.php")?>