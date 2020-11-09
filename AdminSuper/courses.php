<?php require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='cour_status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$cour_status='1';
		}else{
			$cour_status='0';
		}
		$update_status_sql="update product set product.cour_status='$cour_status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select product.*,categories.categories from product,categories
where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);


?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Your Courses</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Your Courses</h2>
				<div class="filter">
					<select name="orderby" class="selectbox">
						<option value="Any status">Any status</option>
						<option value="Approved">Started</option>
						<option value="Pending">Pending</option>
						<option value="Cancelled">Cancelled</option>
					</select>
				</div>
			</div>
			<div class="list_general">
			
				<ul>
				<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
					<li>
					<?php 
						if($row['cour_status']==1){
							echo "<span class='btn_1 gray approve'><a href='?type=cour_status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
						}else{
							echo "<span  style='padding: .71rem 1rem;' class='pending'><a href='?type=cour_status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
						}
						// echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
						// echo "<span class='badge badge-edit'><a href='add-listing.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
						
						echo "<span class='btn_1 gray delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
						
						
						?>
						<figure><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt=""></figure>
						<h4><?php echo $row['title']?>
						 <!-- <i class="pending">Pending</i> -->
						 </h4>
						<ul class="course_list">
							<li><strong>Duration</strong> <?php echo $row['duration']?></li>
							<li><strong>Price</strong> <i class="fa fa-fw fa-inr"></i><?php echo $row['price']?></li>
							<li><strong>MRP</strong> <i class="fa fa-fw fa-inr"></i><?php echo $row['mrp']?></li>
							<li><strong>Category</strong> <?php echo $row['categories']?></li>
							<li><strong>Tuitor Name</strong> <?php echo $row['tuitor']?></li>
						</ul>
						<h6>Course description</h6> 
						<p><?php echo $row['description']?></p>
					
						<?php } ?>
						<!-- <ul class="buttons">
							<li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a></li>
							<li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
						</ul> -->
					</li>
							
					<!-- <li>
						<figure><img src="img/course_2.jpg" alt=""></figure>
						<h4>Course title <i class="cancel">Cancelled</i></h4>
						<ul class="course_list">
							<li><strong>Start date</strong> 11 November 2017</li>
							<li><strong>Expire date</strong> 11 April 2018</li>
							<li><strong>Category</strong> Science, Economy</li>
							<li><strong>Teacher</strong> Mark Twain</li>
						</ul>
						<h6>Course description</h6> 
						<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et. Sea ut nullam aperiam, mei cu tollit salutatus delicatissimi. His appareat perfecto intellegat te. </p>
						<ul class="buttons">
							<li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a></li>
							<li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
						</ul>
					</li>
					<li>
						<figure><img src="img/course_3.jpg" alt=""></figure>
						<h4>Course title <i class="approved">Started</i></h4>
						<ul class="course_list">
							<li><strong>Start date</strong> 11 November 2017</li>
							<li><strong>Expire date</strong> 11 April 2018</li>
							<li><strong>Category</strong> Science, Economy</li>
							<li><strong>Teacher</strong> Mark Twain</li>
						</ul>
						<h6>Course description</h6> 
						<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et. Sea ut nullam aperiam, mei cu tollit salutatus delicatissimi. His appareat perfecto intellegat te. </p>
						<ul class="buttons">
							<li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a></li>
							<li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
		<!-- /box_general-->
		<nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
<?php require('footer.php')?>