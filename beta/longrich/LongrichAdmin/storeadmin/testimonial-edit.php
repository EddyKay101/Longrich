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

	if(isset($_POST['title'])){
	$id = $conn->real_escape_string($_POST['thisID']);
	$title = $conn->real_escape_string($_POST['title']);
	$entry =$conn->real_escape_string($_POST['entry_text']);

	//See if the product name is an identical match to another product in the system.
	$query = "UPDATE entry SET title='$title', entry_text='$entry' WHERE entry_id='$id'";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	if($_FILES['fileField']['tmp_name']!=""){
	//Place image in folder
	$newname="$id.jpg";
	move_uploaded_file($_FILES['fileField']['tmp_name'],"../inventory_images/$newname");
	}
	//refresh the inventory page with the header
	header("location: entries-testimonials.php");
	exit();
}
	?>
	
	<?php
if(isset($_GET['id'])){
//This block grabs the whole list for display
$targetID = $_GET['id'];	
$entry_list = "";
$query = "SELECT * FROM testimonials WHERE entry_id='$targetID' LIMIT 1";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows =$result->num_rows;
if($rows > 0){
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		
		$title = $row['title'];
		$entry = $row['entry_text'];								
								
		}
	}

	else{
	echo "Entry does not exist";
	exit();
	}
}
?>
	



	<!DOCTYPE html>
	<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Longrich | Blog Form</title>
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
					  <h2>Manage Blog </h2>
					  <ol class="breadcrumb">
							<li>
								<a href="../index.php">Home</a>
							</li>
							<li> <a>Entries</a></li>
							<li class="active"> <strong>Manage Blog</strong></li>
					  </ol>
					</div>
					<div class="col-lg-2">

					</div>
				</div>

			<div class="wrapper wrapper-content animated fadeInRight ecommerce">
				<p><h3>Add Entries</h3></p>

			<form action="blog-edit.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
			  <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                        <fieldset class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-2 control-label">Title:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" placeholder="Title" name="title" value ="<?php echo  $title; ?>"required></div>
                                            </div>
                                            
                                            <div class="form-group"><label class="col-sm-2 control-label">Entry:</label>
                                                <div class="col-sm-10">
                                                    <textarea class="summernote" name="entry_text"  required  style="resize:none;">
                                                        
                                                      <?php echo $entry;?>  

                                                    </textarea>
                                                </div>
                                            </div>
                                             <div class="tab-content">
							  <label class="col-sm-2 control-label" for="status">Upload Image</label>
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
                                            <input type="hidden" name="thisID" value="<?php echo $targetID;?>">
                                            <input type="submit" name="submit" style="margin-left:19%;" value="Make Changes" class="btn btn-primary">
											<a href="entries-testimonials.php" class="btn btn-primary">Cancel</a>
                                         
											
											
                                        </fieldset>
		
                                    </div>
                                </div>
                             
                               

                            </div>
				</form>	
			</div>
			<div class="footer">
            <div class="pull-right">
                
            </div>
            <div>
                <strong>Copyright</strong> Longrich UK &copy; 2017
            </div>
        </div>
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