	<?php
	session_start();
	//if not manager or who ever has the right to access this page, don't allow log in, else if role is manager allow log in
	if(!isset($_SESSION['manager'])){
		header('location: ../storeadmin/login.php');
		exit();
	}
	$managerID = preg_replace('#[^0-9]#i',"",$_SESSION['id']);//filter everything but numbers and letters
	$manager = preg_replace('#[^A-Za-z0-9]#i',"",$_SESSION['manager']);//filter everything but numbers and letters
	$password = preg_replace('#[^A-Za-z0-9]#i',"",$_SESSION['password']);//filter everything but numbers and letters
	//Connect to the database
	include_once('../storescripts/connect_to_mysql.php');
	$query="SELECT * FROM admin_user WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	$rows = $result->num_rows;
	if($rows == 0){//evaluate the count
		echo "Your login session data is not on record in the database";
		header("location: ../index.php");
		exit();
	}
	?>

	<?php
	//Error Reporting
	error_reporting(E_ALL);
	ini_set('display_error', '1');
	?>



	<?php
	//Parse the form data and add inventory item to the system
	if(isset($_POST['product_name'])){
		$product_name = $conn->real_escape_string($_POST['product_name']);
		$price =$conn->real_escape_string($_POST['price']);
		$category = $conn->real_escape_string($_POST['category']);
		$subcategory = $conn->real_escape_string($_POST['subcategory']);
		$details = $conn->real_escape_string($_POST['details']);
		$quantity = $conn->real_escape_string($_POST['quantity']);
		//See if the product name is an identical match to another product in the system.
		$query = "SELECT id FROM products WHERE product_name='$product_name'LIMIT 1";
		$result = $conn->query($query);
		if (!$result) die ("Database access failed: " . $conn->error);
		$productMatch = $result->num_rows;
		if($productMatch > 0){
			echo'Sorry you tried to place a duplicate "Product Name" into the system,<a href="inventory_list.php">click here</a>';
			exit();
		}
		//Insert this product into the database
		$query = "INSERT INTO products(product_name,price,details,category,subcategory,date_added,quantity) VALUES('$product_name','$price','$details','$category','$subcategory',now(), '$quantity')";
		$result = $conn->query( $query );
		$pid = $conn->insert_id;
	if ( !$result )die( "Database access failed: " . $conn->error );
		$newname="$pid.jpg";
		move_uploaded_file($_FILES['fileField']['tmp_name'],"../inventory_images/$newname");
		//refresh the inventory page with the header
		header("location: inventory_list.php");
		exit();
	}
	?>

	<?php

	/*if($rows > 0){
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$id = $row['id'];
			$product_name = $row['product_name'];
			//$date_added = strftime("%d/%m/%Y", strtotime($row['date_added']));
			$price = $row['price'];
			$category = $row['category'];
			$subcategory = $row['subcategory'];
			$details  = $row['details'];
			$product_list .=  "<button class='btn-white btn btn-xs' formaction='inventory_list.php?deleteid=$id'>Delete</button>
												<button class='btn-white btn btn-xs' formaction='inventory_edit.php?pid=$id'>Edit</button>"; 
		}
	}*/

	?>


<?php
if(isset($_GET['yesdelete'])){
	//Remove item from inventory and delete image
	//delete from database first
	$id_to_delete = $_GET['yesdelete'];
	$query = "DELETE FROM products WHERE id='$id_to_delete' LIMIT 1";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	//unlink the image from server
	$pictodelete=("../inventory_images/$id_to_delete.jpg");
	if(file_exists($pictodelete)){
		unlink($pictodelete);
	}
	header("location: inventory_list.php");
	exit();	
}
?>
	<!DOCTYPE html>
	<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Longrich | Inventory</title>
        <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="../css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
		<link href="../css/plugins/summernote/summernote.css" rel="stylesheet">
		<link href="../css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
		<link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

		<link href="../css/animate.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">



	</head>

	<body>
	<div id="wrapper">
			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
				  </div>
					<ul class="nav metismenu" id="side-menu">
                 <li class="">
                      <a href="../index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
					</li>
                  		<li class="">
                     
                      <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Manage</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li class="active">
							  <a href="inventory_list.php">Inventory</a></li>
                          <li><a href="display_images.php">Images</a></li>
                          <li><a href="change_password.php">Update Info</a></li>
                          
							</ul>
                          
                          <li class="">
                           <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Entries</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li class="">
							  <a href="entries-html.php">Blog Entries</a></li>
                          <li><a href="entries-testimonials.php">Testimonials</a></li>
                          <li><a href="blog-form.php">Manage Blog</a></li>
                          <li><a href="testimonial-form.php">Manage Testimonials</a></li>
							 
                                    
		 
        </ul>
					</li>
			</ul>			
		</nav>
			<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
			<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
				<form role="search" class="navbar-form-custom" action="search_results.html">
					<div class="form-group">
						<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
					</div>
				</form>
			</div>
				<ul class="nav navbar-top-links navbar-right">
				  <li> <span class="m-r-sm text-muted welcome-message">Welcome to Longrich Admin Area.</span> </li>
				  <li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="img/a7.jpg">
									</a>
									<div class="media-body">
										<small class="pull-right">46h ago</small>
										<strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
										<small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="img/a4.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right text-navy">5h ago</small>
										<strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
										<small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="img/profile.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right">23h ago</small>
										<strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
										<small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a href="mailbox.html">
										<i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
									</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="mailbox.html">
									<div>
										<i class="fa fa-envelope fa-fw"></i> You have 16 messages
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html">
									<div>
										<i class="fa fa-twitter fa-fw"></i> 3 New Followers
										<span class="pull-right text-muted small">12 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="grid_options.html">
									<div>
										<i class="fa fa-upload fa-fw"></i> Server Rebooted
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a href="notifications.html">
										<strong>See All Alerts</strong>
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</li>
						</ul>
					</li>


					<li>
						<a href="logout.php">
							<i class="fa fa-sign-out"></i> Log out
						</a>
					</li>
				</ul>

			</nav>
			</div>
				<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
					  <h2>Inventory </h2>
					  <ol class="breadcrumb">
							<li>
								<a href="../index.php">Home</a>
							</li>
							<li> <a>Manage</a></li>
							<li class="active"> <strong>Inventory</strong></li>
					  </ol>
					</div>
					<div class="col-lg-2">

					</div>
				</div>

			<div class="wrapper wrapper-content animated fadeInRight ecommerce">
				<p><h3>Add Products</h3></p>

				<div class="ibox-content m-b-sm border-bottom">
					<form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">

								<label class="control-label" for="product_name">Product Name</label>
								<input type="text" id="product_name" name="product_name" value="" placeholder="Product Name" class="form-control" required>
							</div>
						</div>
						
						
						<div class="col-sm-2">
							<div class="form-group">
								<label class="control-label" for="status">Quantity</label>
								<input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="control-label" for="price">Price</label>
								<input type="text" id="price" name="price" value="" placeholder="Price" class="form-control" required>
							</div>
						</div>

						<div class="col-sm-2">
							<div class="form-group">
								<label class="control-label" for="status">Category</label>
								<select name="category" id="status" class="form-control">
									<option value="Cream" selected>Health Care</option>
									<option value="Spray">Skin Care</option>
									<option value="Spray">Feminine Care</option>
									<option value="Spray">Hand Care</option>
									<option value="Spray">Hair Care</option>
									<option value="Spray">Body Care</option>
									<option value="Spray">Oral Care</option>
									<option value="Spray">HouseHold Care</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="control-label" for="status">SubCategory</label>
								<select name="subcategory" id="status" class="form-control">
									<option value="clien" selected>Clien</option>
									<option value="yves">Yves</option>
								</select>
							</div>
						</div>

						<div class="col-sm-4">
							  <label class="control-label" for="status">Upload Image</label>
							   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							<div class="form-control" data-trigger="fileinput">
								<i class="glyphicon glyphicon-file fileinput-exists"></i>
							<span class="fileinput-filename"></span>
							</div>
							<span class="input-group-addon btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="fileField" required>
							</span>
							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
						</div>

				</div>
				 <div class="col-sm-4">
							<div class="form-group">

								<label class="control-label" for="details">Description</label>
								<textarea name="details" value="" placeholder="Description" class="form-control" cols="64" rows="5" style="resize:none;" required>
								</textarea>
							</div>
						</div> 
						 <div class="col-sm-4">
											<div class="form-group">
											<label class="control-label" for="details"></label>
											<input type="submit" name="submit" style="margin-top:23px;" value="Insert Products" class="btn btn-primary">
							 </div>
						</div>



				<div class="row">
					<div class="col-lg-12">
						<div class="ibox">
							<div class="ibox-content">

								<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
									<thead>

									  <tr>

										<th data-toggle="true">Product Name</th>
										<th data-toggle="true">Quantity</th>
										<th data-hide="phone">Category</th>
										<th data-hide="all">Description</th>
										<th data-hide="phone">Price</th>
										<th data-hide="phone">Subcategory</th>
										<th data-hide="phone">Image Preview</th>
										<th class="text-right" data-sort-ignore="true">Action</th>

									</tr>
									</thead>
									<?php
									
									$product_list = "";
	//This block grabs the whole list for display
	$product_list = "";
	$query = "SELECT * FROM products ORDER BY date_added DESC";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	$rows =$result->num_rows;
	$dir = "../inventory_images";
									
	//read dir
	
		
									if($rows > 0){
											
		
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
	
		
			$id = $row['id'];
			$product_name = $row['product_name'];
			//$date_added = strftime("%d/%m/%Y", strtotime($row['date_added']));
			$price = $row['price'];
			$category = $row['category'];
			$subcategory = $row['subcategory'];
			$details  = $row['details'];
			$quantity = $row['quantity'];
			
			$product_list =  "<form action='inventory_list' method='post'>
			
			<div class='btn-group'>
			<a href='inventory_edit.php?pid=$id' class='btn-white btn btn-xs'>edit</a> 
			<a href='inventory_list.php?deleteid=$id' class='btn-white btn btn-xs'>delete</a><br></div></form>";


									echo"<tbody>";
									echo"<tr>";
									echo"<td>".$product_name."</td>";
									echo"<td>".$quantity."</td>";
									echo"<td>".$category."</td>";
									echo"<td>".$details."</td>";	
									echo"<td>"."£".$price."</td>";
									echo"<td>".$subcategory."</td>";
									echo"<td><img src ='../inventory_images/$id.jpg' width = '100px' height = '100px'>";
									echo"<td class='text-right'>".$product_list. '&nbsp;'."</td>";
									echo"</tr>";
									echo"</tbody>";
			 }
			
		}
		
	
									
										

			
									

?>
								</table>

							</div>
						</div>
					</div>
				</div>

			
			
			</div>
						
					</form>
						<?php 
// Delete Item Question to Admin, and Delete Product if they choose and Delete product if they choose to
if (isset($_GET['deleteid'])) {
	echo '<p>Do you really want to delete this product ? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a></p>';
	exit();
}
?>

			

			</div>
			</div>
		 <div class="footer">
            <div class="pull-right">
                
            </div>
            <div>
                <strong>Copyright</strong> Longrich UK &copy; 2017
            </div>
        </div>	
		</div>


		<!-- Mainly scripts -->
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../js/plugins/jasny/jasny-bootstrap.min.js"></script>

		<!-- Custom and plugin javascript -->
		<script src="../js/inspinia.js"></script>
		<script src="../js/plugins/pace/pace.min.js"></script>


		<!-- FooTable -->
		<script src="../js/plugins/footable/footable.all.min.js"></script>

		<!-- Page-Level Scripts -->
		<script>
			$(document).ready(function() {

				$('.footable').footable();

			});

		</script>
		<!-- Data picker -->
	<script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>
	
	
	<!---->
	
	
	 <script src="../js/plugins/summernote/summernote.min.js"></script>

		<script>
			$(document).ready(function(){

				$('.summernote').summernote();

		   });
		</script>




	</body>

	</html>