<?php 
// require("connection.php");
require("top.php");
// require("functions.php");

// if(isset($_GET['type']) && $_GET['type']!=''){
// 	$type=get_safe_value($con,$_GET['type']);
// 	if($type=='status'){
// 		$operation=get_safe_value($con,$_GET['operation']);
// 		$id=get_safe_value($con,$_GET['id']);
// 		if($operation=='active'){
// 			$status='1';
// 		}else{
// 			$status='0';
// 		}
// 		$update_status_sql="update video set status='$status' where id='$id'";
// 		mysqli_query($con,$update_status_sql);
// 	}
	
// 	if($type=='delete'){
// 		$id=get_safe_value($con,$_GET['id']);
// 		$delete_sql="delete from video where id='$id'";
// 		mysqli_query($con,$delete_sql);
// 	}
// }
$uid=$_SESSION['ADMIN_ID'];
// `order`.user_id='$uid'
// $sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
// $sql = "select tuitor_admin.id,product.*,categories.categories from product,categories,tuitor_admin 
// where product.categories_id=categories.id and tuitor_admin.id='$uid' order by product.id desc";
// $res=mysqli_query($con,$sql);

// $sql = "select product.*,categories.categories from 
// product, categories where product.categories_id=categories.id AND
// product.tuitor='$uid'order by product.id desc";
// $res=mysqli_query($con,$sql);
$sql = "select video.*, vidcategories.*, product.title from video, vidcategories, product
where video.vidCategories=vidcategories.id and product.id=video.product_id AND video.admin_id='$uid'";
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
        <li class="breadcrumb-item active">Video Master</li>
      </ol>
		<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Video Table
        </div>
        <div class="card-header">
       <a href="videoMaster.php">   <i class="fa fa-plus"></i> <b> <u style="color:red">Add Video</u></b>
</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  <th>Product Title</th>
                  <th>Video Title</th>
                  <th>videoURL</th>
                  <th>VideoCategory</th>
                  
                  
                  <!-- <th>Image</th> -->
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Serial Number</th>
                  <th>Product Title</th>
                  <th>Video Title</th>
                  <th>videoURL</th>
                  <th>VideoCategory</th>
                  
                  
                  <!-- <th>Image</th> -->
                  <!-- <th>Action</th> -->
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1;
             
							while($row=mysqli_fetch_assoc($res)){ ?>
                            
                <tr>
                
                  <td><?php echo $i++?></td>
                  <td><?php echo $row['title']?></td>
                  <td><?php echo $row['videoTitle']?></td>
                  <td><?php echo $row['videoUrl']?></td>
                  <td><?php echo $row['vidcategories']?></td>
                  
                </tr>
                            <?php  } ?>
               
              
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
