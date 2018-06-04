<?php
	error_reporting(E_ALL);
	ini_set('display_error', '1');
?>

<?php
  include_once('../../connect_to_mysql.php');
  if(isset($_GET['title'])){
  		$title = $conn->real_escape_string($_GET['title']);
  		//Parse the form data and add inventory item to the system
  		
  		//See if the product name is an identical match to another product in the system.
  		$query = "SELECT entry_id FROM entry WHERE title='$title'LIMIT 3 DESC";
  		$result = $conn->query($query);
  		if (!$result) die ("Database access failed: " . $conn->error);
  		$titleMatch = $result->num_rows;
  		if($titleMatch > 0){
  			echo'Sorry you tried to place a duplicate "Product Name" into the system,<a href="entries-html.php">click here</a>';
  			exit();
  		}
  }	
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Longrich UK and Ireland - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/camera.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css">
  	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  	<script type="text/javascript" src="js/camera.js"></script>
    <script src="js/jquery.ui.totop.js" type="text/javascript"></script>
    <script>
  		$(document).ready(function(){   
          	jQuery('.camera_wrap').camera();
        });    
    </script>			
	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
  
  <!--[if (gt IE 9)|!(IE)]><!-->
  <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
  <!--<![endif]-->
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
<header class="p0">
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="index.php"><img src="img/logo.png" alt=""></a><span>UK & Ireland</span></h1>
                        <span class="contacts">E-mail: <a href="#">admin@longrichukandireland.co.uk</a></span>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_"><i class="fa fa-bars" aria-hidden="true"></i></a>                                                   
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                      <li class="active li-first"><a href="index.php"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                      <li><a href="shop.php">Shop</a></li>
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
    <div class="slider">
	    <div class="camera_wrap">
	        <div data-src="img/slide1.jpg"></div>
	        <div data-src="img/slide2.jpg"></div>
	        <div data-src="img/slide3.jpg"></div>
	    </div>
	</div>
</header>

<section id="content" class="main-content">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h4 class="moto">Living Healthier, Happier and Longer</h4>
      </div>
    </div>
    <div class="row">
      <div class="span12">        
        <ul class="thumbnails">
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-1.png" alt="">
                <h5>Longrich</h5>
                <h3>Healthcare</h3>
              </div>  
              <div class="thumbnail-pad">
                  <p>Nature's essentials for optimal health and a strong immune system.</p>
                  <a href="healthcare.php" class="btn btn_">All Healthcare Products</a>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-2.png" alt="">
                <h5>Longrich</h5>
                <h3>Oral Care</h3>
              </div>  
              <div class="thumbnail-pad">
                  <p>Long lasting fresh breathe and strong dentition.</p>
                  <a href="oralcare.php" class="btn btn_">All Oral Care Products</a>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-3.png" alt="">
                <h5>Longrich</h5>
                <h3>Body & Haircare</h3>
              </div>  
              <div class="thumbnail-pad">
                  <p>All that you require for a healthy, radiant and youthful skin.</p>
                  <a href="body&haircare.php" class="btn btn_">All Body & Haircare Products</a>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-4.png" alt="">
                <h5>Longrich</h5>
                <h3>Feminine Care</h3>
              </div>
              <div class="thumbnail-pad">  
                  <p>Comfortable, Durable and Energising.</p>
                  <a href="femininecare.php" class="btn btn_">All Feminine Care Products</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
    	<div class="span8">
      	<div class="clearfix cols-1">
              <div class="span4 left-0">
                  <h4 class="indent-2">Welcome</h4>
                  <!--<p class="lead">Founded in 1986, Longrich is a leading Chinese cosmetic company.</p>-->
                  <figure class="img-indent"><img src="img/page1-img1.jpg" alt="" class="img-radius"></figure>
                  Longrich UK and Ireland is a leading Biosciences Company which leverages on proprietary technology to develop a wide variety of excellent innovative products including healthcare, oral care, body &hair care, feminine care, cosmetics and household products. We have 8 advanced Research and Development centres across three continents and over 20,000 employees worldwide.
              </div>
              <div class="span4">
                  <h4 class="indent-2">What We Do</h4>
                  <!--<p class="lead">A leader in the Chinese cosmetics sector and daily care industry.</p>-->
                  <figure class="img-indent"><img src="img/page1-img2.jpg" alt="" class="img-radius"></figure>
                  Founded in 1986, our company specialises in using the power of nature through advanced technologies to develop specially formulated breakthrough products designed to preserve and promote health. Our trademarks have been registered in over 183 countries and our products are being sold by direct selling  in more than 50 countries and regions around the world. 
              </div>
          </div>
      	</div>    
		<div class="span4">
      	<h4 class="indent-2">Blog</h4>
    		<?php						
				//This block grabs the whole list for display
				$entry_id = "entry_id";
					  
				//$query = "SELECT * FROM entry  ORDER BY date_created DESC LIMIT 3";
				$query = "SELECT entry_id, title, date_created, substring(entry_text, 1, 459) FROM entry Order by $entry_id DESC LIMIT 3";
				$result = $conn->query($query);
			  	$id ="";
				if (!$result) die ("Database access failed: " . $conn->error);
				$rows =$result->num_rows;
	
									
				//read dir
				if($rows > 0){
					while($row = $result->fetch_array(MYSQLI_NUM)){
						$id = $row[0];
						
						$title = strtoupper($row[1]);
						//$date_added = strftime("%d/%m/%Y", strtotime($row['date_added']));
						//$price = $row['price'];
						//$category = $row['category'];
						$format = "F j, Y ";
						$date_added = date($format, strtotime($row[2]));
						$details  = $row[3];
    					echo <<<_END
						<ul class="list-news">
							<li>

								<p class="text-info">$title</p>
								$details... <a href="blog-entries.php?id=$id" class="underline">>></a>
								<p >$date_added</p>
							</li>
						</ul>
_END;
					}

				}
		  	?>
  		</div>
    </div> 
    <div class="row">
      <div class="span12">
        <h4 class="indent-2">testimonials</h4>
      </div>
     <div class="span12">
        <div id="text-carousel" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
              <div class="col-xs-offset-3 col-xs-6">
                  <div class="carousel-inner">
               		<?php	
     					$query = "select * from testimonials order by entry_id desc limit 3";
       					$result = $conn->query($query);
          				$counter = 0;
						if (!$result) die ("Database access failed: " . $conn->error);
						$rows =$result->num_rows;
					   
        				while($c = $result->fetch_array(MYSQLI_ASSOC)){
                
         					$entry  = $c['entry_text'];
							if($counter==0) {
								echo"<div class='item active'>"; 
								echo"<div class='carousel-content'>";
								echo"<div class='blockquote-upper'>";
								echo"<blockquote>$entry</blockquote>";
								echo"</div>"; 
								echo"</div>";
								echo"</div>";
							} else {
								echo"<div class='item'>"; 
								echo"<div class='carousel-content'>";
								echo"<div class='blockquote-upper'>";
								echo"<blockquote>$entry</blockquote>";
								echo"</div>"; 
								echo"</div>";
								echo"</div>"; 
							}
							$counter++;
						}
		  			?>
                  </div>
              </div>
          <!-- Controls --> 
        <a class="left carousel-control" href="#text-carousel" data-slide="prev">
          <p class="carousel-arrow"><</p>
        </a>
        <a class="right carousel-control" href="#text-carousel" data-slide="next">
          <p class="carousel-arrow">></p>
        </a>
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
<div id="toTop"></div>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>