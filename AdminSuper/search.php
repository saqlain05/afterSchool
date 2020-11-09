<?php 
require('top.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	// window.location.href='index.php';
    alert("Active/Deactive Successfully");
window.location.href="courses.php";
	// window.location.href='courses.php';
	</script>
	<?php
}	
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
		$update_status_sql="update product set cour_status='$cour_status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
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
        <li class="breadcrumb-item active">Search</li>
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
    <?php if(count($get_product)>0){?>
                                        <?php
										foreach($get_product as $list){
										?>
                                        <li>
					<?php 
						if($list['cour_status']==1){
							echo "<span class='btn_1 gray approve'><a href='?type=cour_status&operation=deactive&id=".$list['id']."'>Active</a></span>&nbsp;";
						}else{
							echo "<span  style='padding: .71rem 1rem;' class='pending'><a href='?type=cour_status&operation=active&id=".$list['id']."'>Deactive</a></span>&nbsp;";
						}
						// echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$list['id']."'>Edit</a></span>&nbsp;";
						// echo "<span class='badge badge-edit'><a href='add-listing.php?id=".$list['id']."'>Edit</a></span>&nbsp;";
						
						echo "<span class='btn_1 gray delete'><a href='?type=delete&id=".$list['id']."'>Delete</a></span>";
						
						
						?>
						<figure><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt=""></figure>
						<h4><?php echo $list['title']?>
						 <!-- <i class="pending">Pending</i> -->
						 </h4>
                                        	<ul class="course_list">
							<li><strong>Duration</strong> <?php echo $list['duration']?></li>
							<li><strong>Price</strong> <?php echo $list['price']?></li>
							<li><strong>MRP</strong> <?php echo $list['mrp']?></li>
							<li><strong>Category</strong> <?php echo $list['categories_id']?></li>
							<li><strong>Teacher ID</strong> <?php echo $list['tuitor']?></li>
						</ul>
						<h6>Course description</h6> 
						<p><?php echo $list['description']?></p>
                                        <?php } ?>
                                        <?php } else { 
                        echo "Data not found";
                        
                        
					} ?>
    </div>
</div>

<?php require('footer.php')?>