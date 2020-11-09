<?php 
require("top.php");
$vidcategories='';
$msg='';
// $admin_id='';
$admin_id=$_SESSION['ADMIN_ID'];
$product_id='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from vidcategories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$vidcategories=$row['vidcategories'];
		$product_id=$row['product_id'];
		
	}else{
		header('location:vidcategories_master.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$vidcategories=get_safe_value($con,$_POST['vidcategories']);
	$product_id=get_safe_value($con,$_POST['product_id']);
	$admin_id=$_SESSION['ADMIN_ID'];

	$res=mysqli_query($con,"select * from vidcategories where vidcategories='$vidcategories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="vidCategories already exist";
			}
		}else{
			$msg="vidCategories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update vidcategories
			 set vidcategories='$vidcategories', admin_id='$admin_id', product_id='$product_id' where id='$id'");
		}else{
			mysqli_query($con,"insert into vidcategories(vidcategories, admin_id, product_id,status) 
			values('$vidcategories', '$admin_id', '$product_id','1')");
		}
        // header('location:vidcategories_master.php');
            echo  '<span style="padding:30rem; padding-top:40rem;" ><a class="btn_1 medium"  href="vidcategories_master.php"> vidcategories_master</a> </span>';
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
											<input name="vidcategories" type="text" class="form-control" placeholder="vidCategories Name" required value="<?php echo $vidcategories?>">
                                        </div>
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