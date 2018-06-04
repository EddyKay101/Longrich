<?php
//Run a select query to get my latest 3 items
include_once('../../connect_to_mysql.php');
$dynamiclist = "";
$query = "SELECT * FROM products where category = 'Oral Care' ORDER BY date_added DESC LIMIT 3";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows =$result->num_rows;
if($rows > 0){
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$id = $row['id'];
		$product_name = $row['product_name'];
		$details = $row['details'];
		$price = $row['price'];
		$date_added = strftime("%d/%m/%Y", strtotime($row['date_added']));
		$dynamiclist.='<div class="span3">
                <div class="thumbnail thumbnail_4">  
                    <figure style="width:270px; height:270px; overflow:hidden;">
                       <img class ="shop-image" src="../../LongrichAdmin/inventory_images/'.$id.'.jpg" class="img-radius" alt="' . $product_name .'"  >
                        <p class="price">£'.$price.'</p>
                    </figure>
                    <p class="lead p2"><a href="#" class="lead shop-product-title">'.$product_name.'</a></p>
                    '.$details.'
					
                </div>
				<a href="product_detail.php?id='.$id.'" class="btn btn_">View Product</a>
            </div>';
		$img = '';
	}
}
	else{
		$dynamiclist = "We have no products listed in our store yet";
	}

	$conn->close()
?>	


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Longrich - Shop</title>
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
                        <h1 class="brand"><a href="index.php"><img src="img/logo.png" alt=""></a><span>UK & Ireland</span></h1>>
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
                                      <li class="active"><a href="shop.php">Shop</a></li>
                                      <li><a href="about.html">about</a></li>
                                      <li><a href="blog.php">blog</a></li>
                                      <li><a href="contact.php">contact</a></li>
                                      <li class="active" ><a href="cart.php">Cart</a></li>
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
          <h4 class="indent-2">Oral Care Products</h4>
      </div>
    </div>
    <div class="row"> 
        <div class="thumbnails_4">
           
            <?php echo $dynamiclist;?>
      		
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
                <li><a class="current" href="shop.php">Shop</a></li>
                <li><a href="about.html">about</a></li>
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