<?php
session_start();
	//if not manager or who ever has the right to access this page, don't allow log in, else if role is manager allow log in
	if(!isset($_SESSION['manager'])){
		header('location: ../storeadmin/login.php');
		exit();
	}
	
	$id = preg_replace('#[^0-9]#i',"",$_SESSION['id']);//filter everything but numbers and letters
	$username = preg_replace('#[^A-Za-z0-9]#i',"",$_SESSION['manager']);//filter everything but numbers and letters
	
	$password = preg_replace('#[^A-Za-z0-9]#i',"",$_SESSION['password']);//filter everything but numbers and letters
	//Connect to the database
	include_once('../storescripts/connect_to_mysql.php');
	$query="SELECT * FROM admin_user WHERE id= '$id' AND username='$username' AND password='$password' LIMIT 1";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	$rows = mysqli_fetch_array($result);
	
		
   $email =$rows['email'];//filter everything but numbers and letters
	
   
?>



	<?php
	//Error Reporting
	error_reporting(E_ALL);
	ini_set('display_error', '1');
	?>
	
<?php
	//Parse the form data and add inventory item to the system
	
	if(isset($_POST['submit'])){	
	$id2 = $_POST['id'];
	//$username = $_POST['username'];
	$email =$_POST['email'];
	$password = md5($_POST['currentPassword']);
	
	
	//See if the product name is an identical match to another product in the system.
	$query = "UPDATE admin_user SET password = '$password', email='$email' WHERE id = '$id' ";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	session_destroy();
		header("refresh:0;");
	//refresh the inventory page with the header
	;
	exit();
		
}

	?>


	

<!DOCTYPE html>
	<html>
		<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Longrich | Update Info</title>
        <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="../css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
		<link href="../css/plugins/summernote/summernote.css" rel="stylesheet">
		<link href="../css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
		<link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

		<link href="../css/animate.css" rel="stylesheet">
		<link href="../css/style2.css" rel="stylesheet">



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
                          <li class="">
							  <a href="inventory_list.php">Inventory</a></li>
                          <li><a href="display_images.php">Images</a></li>
                          <li class="active"><a href="change_password.php">Update Info</a></li>
                          
							</ul>
                          
                          <li class="">
                           <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Entries</span> <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li class="">
							  <a href="entries-html.php">Blog Entries</a></li>
                          <li><a href="entries-testimonials.php">Testimonials</a></li>
                          <li><a href="blog-form">Manage Blog</a></li>
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
					  <h2>Info Page </h2>
					  <ol class="breadcrumb">
							<li>
								<a href="../index3.php">Home</a>
							</li>
							<li> <a>Manage</a></li>
							<li class="active"> <strong>Update Info</strong></li>
					  </ol>
					</div>
					<div class="col-lg-2">
					
					</div>
					
				</div>
				<div class ="ibox-content">
				<h2>Hello, you can update your info here </h2><br>
					<h2>Your user name is <?php echo $username;?></h2><br>
					<h2>Your email address is <?php echo $rows['email'];?></h2>
				</div>
				<div class="ibox-content">
                            <form method="post" class="form-horizontal" action="change_password.php">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Username</label>

                                    <div class="col-sm-10"><input name="" type="text" class="form-control" value="<?php echo $username;?>" disabled></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="email" value="<?php echo $email;?>"> <span class="help-block m-b-none">Change Email</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">New Password</label>

									<div class="col-sm-10"><input name="currentPassword" type="password" class="form-control" placeholder="Password" required ></div><p></p><br><br><br><br>
                               
                                    <!--<label class="col-sm-2 control-label">New Password</label>

									<div class="col-sm-10"><input name="newPassword" type="password" class="form-control" placeholder="Password"></div><p></p><br><br><br><br>
                                    
                                    <label class="col-sm-2 control-label">Confirm Password</label>

                                    <div class="col-sm-10"><input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password"></div>-->
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">Current Password</label>

                                    <div class="col-lg-10"><input type="text" disabled="" placeholder="<?php echo $password;?>" class="form-control" name="password"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">Current Email Address</label>

                                    <div class="col-lg-10"><p class="form-control-static"><?php echo $email;?></p></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                      	<input type="hidden" name="id" value="<?php echo $id2;?>">
                                        <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
<div class="footer">

				<div>
					<strong>Copyright</strong> Longrich UK &copy; 2017
				</div>
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