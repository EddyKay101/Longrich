<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
	// Connect to the MySQL database  
    include "../../connect_to_mysql.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
	$result = $conn->query($query);
	$rows =$result->num_rows;
    if ($rows > 0) {
		// get all the product details
		while($row = $result->fetch_array(MYSQLI_ASSOC)){ 
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $details = $row["details"];
			 $category = $row["category"];
		
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			$quantity = $row["quantity"];
			$img = '<img src="../../LongrichAdmin/inventory_images/'.$id.'.jpg" class="img-radius product-image" alt="' . $product_name . '" height="400" width="400">';
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $product_name;?></title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" href="css/bootstrap1.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <!--
    Inspinia
    -->
 	
	<link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
  
    
    <!--
    Inspinia
    -->
    
    
    
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.ui.totop.js" type="text/javascript"></script>	
    <script type="text/javascript" src="js/forms.js"></script>		
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
                        <form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form" >
                            <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''"  >
                            <a href="#" onClick="document.getElementById('search-form').submit()"></a>
                        </form>
                        <span class="contacts">E-mail: <a href="#">admin@longrichukandireland.co.uk</a></span>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>                                                   
                                <div class="nav-collapse nav-collapse_ collapse">
                                   <ul class="nav sf-menu">
                                      <li class="li-first"><a href="index.php"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                      <li><a class="active" href="shop.php">Shop</a></li>
                                      <li><a href="about.html">about</a></li>
                                      <li><a href="opportunity.html">Opportunity</a></li>
                                      <li><a href="blog.php">blog</a></li>
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
               <!--<div class="span12">-->
                    <div class="span4">
                        <div class="product-images">
                            <div>
                               <?php echo $img; ?>
                            </div>
                            <a class="view_image" href="../../LongrichAdmin/inventory_images/<?php echo $id; ?>.jpg" >View Full Size Image</a>
                        </div>
                    </div>
                    <div class="span8">
                        <h2 class="font-bold m-b-xs">
                            <?php echo $product_name; ?>   
                        </h2>
                            
                        <div class="m-t-md">
                            <h2 class="product-main-price">£<?php echo number_format($price, 2); ?></h2>
                        </div>
                        <hr>

                        <h3>Product  description</h3>

                        <div>
                            <?php echo $details; ?> 
                        </div>
                            
                        <hr>

                        <div class="btn-group">
                            <form id="form1" name="form1" method="post" action="cart.php">
                                <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
                                <button class="btn btn_"><i class="fa fa-shopping-cart" value="Add to Shopping Cart"></i>  Add to cart </button>
                            </form>
                        </div>
                    </div>
                <!--</div>-->
           </div>
        </div>
    </div>
</section>
<footer>
   <div class="container">
    <div class="row">
    <div class="span12 float">
      	<ul class="footer-menu">
        	<li><a href="index.php" class="current">Home Page</a>|</li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.html">about</a></li>
            <li><a href="opportunity.html">Opportunity</a></li>
            <li><a href="blog.php">blog</a></li>
            <li><a href="contact.php">contact</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
      	Longrich   &copy;  2017  |  Powered by <a href="http://www.edandilk.com" target="_blank">Ed & Ilk</a>
      </div>
    </div>
   </div>
</footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>