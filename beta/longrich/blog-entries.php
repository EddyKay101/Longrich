<?php
error_reporting(E_ALL);
	ini_set('display_error', '1');

?>

<?php
include_once('../../connect_to_mysql.php');
	
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.ui.totop.js" type="text/javascript"></script>	
	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
  	<!--[if lt IE 9]>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
  <![endif]-->
</head>

<body>
<!--==============================header=================================-->
<header>
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="index.php"><img src="img/logo.png" alt=""></a><span>UK & Ireland</span></h1>
                        
                        <span class="contacts">E-mail: <a href="#">admin@longrichukandireland.co.uk</span>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>                                                   
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                      <li class="li-first"><a href="index.php"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                      <li><a href="shop.php">Shop</a></li>
                                      <li><a href="about.html">about</a></li>
                                      <li><a href="opportunity.html">opportunity</a></li>
                                      <li><a class="active" href="blog.php">blog</a></li>
                                      <li><a href="contact.php">contact</a></li>
                                      <li><a href="cart.php">Cart</a></li>
                                    </ul>
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><img src="img/icon-1.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon-2.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon-3.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon-4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                     </div>   
                </div>
            </div>
       </div>     
    </div>
</header>
<section id="content">
<div class="sub-content">
  <div class="container">
    <div class="row">
    <div class="span12">
            <h4 class="indent-2">Blog</h4>
    <?php
		if(isset($_GET['yesdelete'])){
	//Remove item from inventory and delete image
	//delete from database first
	$id_to_delete = $_GET['yesdelete'];
	$query = "DELETE FROM entry WHERE entry_id='$id_to_delete' LIMIT 1";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	//unlink the image from server
	$pictodelete=("../inventory_images/$id_to_delete.jpg");
	if(file_exists($pictodelete)){
		unlink($pictodelete);
	}
		}
									
	//This block grabs the whole list for display
	if(isset($_GET['id'])){
//This block grabs the whole list for display
$targetID = $_GET['id'];	
$entry_list = "";
$query = "SELECT * FROM entry WHERE entry_id='$targetID' LIMIT 1";
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
    
    
    	echo <<<_END
		<h5 class="blog-title">$title</h5>
        	<article id = 'blogarticle'>
			<figure class="blog-img img-indent"><img src ='../../LongrichAdmin/inventory_images/$targetID.jpg' class="img-radius"></figure>

<p>$entry</p>

</article>
_END;
		
		?>
			
            </div>
        </div>    
    </div>        
  </div>
</div>  
</section>
<footer>
   <div class="container">
    <div class="row">
    <div class="span12 float">
      	<ul class="footer-menu">
        	<li><a href="index.php">Home Page</a>|</li>
                <li><a href="shop.php">Shop</a>|</li>
                <li><a href="about.html">about</a>|</li>
                <li><a href="opportunity.html">opportunity</a>|</li>
                <li><a class="current" href="blog.php">blog</a>|</li>
                <li><a href="contact.php">contact</a>|</li>
                <li><a href="cart.php">Cart</a>|</li>
        </ul>
      	Longrich   &copy;  2017  |  Powered by <a href="http://www.edandilk.com" target="_blank">Ed & Ilk</a>
      </div>
    </div>
   </div>
</footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>