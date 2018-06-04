<?php
$deleteImage = isset($_GET['delete-image']);
if($deleteImage)
{
	$whichImage = $_GET['delete-image'];
	unlink($whichImage);
	header('location: display_images.php');
	exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Longrich | Images</title>
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="../css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

    <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">

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
                          <li class="">
							  <a href="inventory_list.php">Inventory</a></li>
                          <li class="active"><a href="display_images.php">Images</a></li>
                          <li><a href="change_password.php">Update Info</a></li>
                          
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
					  <h2>Images </h2>
					  <ol class="breadcrumb">
							<li>
								<a href="../index.php">Home</a>
							</li>
							<li> <a>Manage</a></li>
							<li class="active"> <strong>Images</strong></li>
					  </ol>
					</div>
					<div class="col-lg-2">

					</div>
				</div>
				
			
       
      				 
											
       
		               
     <?php
				echo<<<_END
					<form method='post' action='display_images.php'
enctype='multipart/form-data'>
							<div class="panel-body">
				<div id="tab-4" class="tab-pane">
								<div class="table-responsive">
								<table class="table table-bordered table-stripped">
					   <thead>
             <tr>
              <th>
               Image preview
               </th>
                <th>
                 Image url
                  </th>
                                                   
                  <th>
                   Actions
                     </th>
                     </tr>
                     </thead> 
_END;
				
					                   

$dir = "../inventory_images";
//open dir
if ($opendir = opendir($dir)){
	//read dir
	while(($file = readdir($opendir)) !== FALSE)
	{
		if ($file !="." && $file!="..")
		{
		$href = "display_images.php?delete-image=$dir/$file";					
		$img = "<td><img src='$dir/$file' height = '100px' width = '100px'></td>";
		$input = "<td><input type='text' class='form-control' disabled value='$file'></td>";

					
					
					echo "<tr>";
                     echo"$img";
					 echo"$input";
                     echo"<td><a href='$href' class='btn btn-white'><i class='fa fa-trash'></i></a></td>";
                     echo"</tr>";	
                     echo"</tbody>";  
						}
					
					}
					
}
			
				
				echo <<<_END
				</table>
                                   </div>
                                    </div>
                                </div>
								</form>
_END;
						
				?>

            
                             	
                                 
	
           <div class="footer">
           
            <div>
                <strong>Copyright</strong> Longrich UK &copy; 2017
            </div>
        </div>



<!-- Mainly scripts -->
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../js/inspinia.js"></script>
<script src="../js/plugins/pace/pace.min.js"></script>

<!-- SUMMERNOTE -->
	<script src="../js/plugins/summernote/summernote.min.js"></script>

<!-- Data picker -->
<script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function(){

        $('.summernote').summernote();

        $('.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });
</script>

</body>

</html>

