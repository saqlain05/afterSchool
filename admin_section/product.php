<?php 
// require("connection.php");
require("top.php");
// require("functions.php");

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}
$uid=$_SESSION['ADMIN_ID'];
// `order`.user_id='$uid'
// $sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
// $sql = "select tuitor_admin.id,product.*,categories.categories from product,categories,tuitor_admin 
// where product.categories_id=categories.id and tuitor_admin.id='$uid' order by product.id desc";
// $res=mysqli_query($con,$sql);

$sql = "select product.*,categories.categories from 
product, categories where product.categories_id=categories.id AND
product.tuitor='$uid'order by product.id desc";
$res=mysqli_query($con,$sql);
// $sql2 = "select product.*,categories.categories from 
// product, categories where product.categories_id=categories.id AND
// product.tuitor='$uid' And product.cour_status=0 order by product.id desc";
// $res2=mysqli_query($con,$sql2);


?>


  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Course Master</li>
      </ol>
		<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Course Table
        </div>
        <div class="card-header">
       <a href="add-listing.php">   <i class="fa fa-plus"></i> <b> <u style="color:red">Add Course</u></b>
</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  
                  <th>Title</th>
                  <th>Price</th>
                  <th>duratin</th>
                  
                  <th>Short Desc</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Serial Number</th>
                  
                  <th>Title</th>
                  <th>Price</th>
                  <th>duratin</th>
                  
                  <th>Short Desc</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1;
             
							while($row=mysqli_fetch_assoc($res)){ ?>
                <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo $row['title']?></td>
                  <td><i class="fa fa-fw fa-inr"></i><?php echo $row['price']?></td>
                  <td><?php echo $row['duration']?></td>
                  <td><?php echo $row['short_desc']?></td>
                  <td><img  style="width:5vw; height:10vh;border:1px solid black;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
                  <td>
                  <?php
                  if($row['cour_status']==1){
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								// echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								echo "<span class='badge badge-edit'><a href='add-listing.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
                  </td>
                  
                </tr>
                <?php } else { echo "<span style='color:red; font-weight:700;'>Pending</span> Wait For <br>
                   Admin Varification <br> <span style='color:red; font-weight:700; font-size:10px'>It will may take few Day</span>";} }  ?> 
              
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	  <!-- /tables-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
   <?php require('footer.php')?>
	
</body>
</html>
