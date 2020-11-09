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

// $sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
// $res=mysqli_query($con,$sql);
$sql="select * from admin ";
$res=mysqli_query($con,$sql);

?>



  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User Master</li>
      </ol>
		<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> USER Table         
        </div>
        <!-- <div class="card-header">
       <a href="add-listing.php">   <i class="fa fa-plus"></i> <b> <u style="color:red">Add Course</u></b>
</a>
        </div> -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  <th>ID</th>
                  <th>First Name</th>
                  
                  <th>Last Name</th>
                  <th>Email</th>
                  
                  <th>Password</th>
                  <th>Mobile</th>
                  <th>addedOn</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>Serial Number</th>
                  <th>ID</th>
                  <th>First Name</th>
                  
                  <th>Last Name</th>
                  <th>Email</th>
                  
                  <th>Password</th>
                  <th>Mobile</th>
                  <th>addedOn</th>
                  <!-- <th>Action</th> -->
                </tr>
              </tfoot>
              <tbody>
              <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $row['fname']?></td>
                  
                  <td><?php echo $row['lname']?></td>
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['password']?></td>
                  <td><?php echo $row['mobile']?></td>
                  <td><?php echo $row['added_on']?></td>
                  <!-- <td>
                  <?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								// echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								echo "<span class='badge badge-edit'><a href='add-listing.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
                  </td> -->
                  
                </tr>
                <?php } ?>
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
