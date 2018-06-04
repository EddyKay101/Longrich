<?php
  if(isset($_POST["submit"])) {
    $recipient="admin@longrichukandireland.co.uk";
    $subject="Email from website contact form";
    $name=$_POST["name"];
    $mail=$_POST["mail"];
    $msg=$_POST["msg"];

    $mailBody="Name: $name\nEmail: $mail\n\n$msg";

    if (empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["msg"])) {
      $errMsg = "<p id = contactErrorMessage>Please fill in all fields.</p>";
    } 
    else {
      mail($recipient, $subject, $mailBody, "From: $name <$mail>");
        $thankYou="<p class='thankyou'>Thank you! Your message has been sent.</p>";
    }
  }
?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact - Longrich UK & Ireland</title>
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
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.ui.totop.js" type="text/javascript"></script>	
  <!-- <script type="text/javascript" src="js/forms.js"></script>		 -->
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
                        <h1 class="brand"><a href="index.html"><img src="img/logo.png" alt=""></a><span>UK & Ireland</span></h1>
                        <span class="contacts">E-mail: <a href="#">admin@longrichukandireland.co.uk</a></span>
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
                                      <li><a href="opportunity.html">Opportunity</a></li>
                                      <li><a href="blog.php">blog</a></li>
                                      <li><a class="active" href="contact.php">contact</a></li>
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
        	<h4 class="indent-2">Get in touch</h4>
            <div class="contact-form">
              <form action = "contact.php" method = "post">
                  <?=$thankYou ?>
                  <label class="name" for = "name">Your Name:</label>
                  <input type = "text" name = "name" placeholder = "Joe Bloggs"/>
                  <label for = "mail">Email:</label>
                  <input type = "email" name = "mail" placeholder = "example@longrich.com"/>
                  <label for = "msg">Message:</label>
                  <textarea type = "text" name = "msg"></textarea>
                  <?=$errMsg ?>
                <button class="btn btn_" type = "submit" name = "submit" value = "send"><i class="fa fa-share" aria-hidden="true"></i> Send</button>
                
              </form>
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
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="opportunity.html">Opportunity</a></li>
                <li><a href="blog.php">blog</a></li>
                <li><a class="current" href="contact.php">contact</a></li>
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