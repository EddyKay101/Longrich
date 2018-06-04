




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
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
                        <h1 class="brand"><a href="index.html"><img src="img/logo.png" alt=""></a></h1>
                        <form id="search-form" action="search.php" method="GET" accept-charset="utf-8" class="navbar-form" >
                            <input type="text" name="s" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''"  >
                            <a href="#" onClick="document.getElementById('search-form').submit()"></a>
                        </form>
                        <span class="contacts">E-mail: <a href="#">company@demolink.org</a></span>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>                                                   
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                      <li class="active li-first"><a href="index.html"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                      <li><a href="shop.html">Shop</a></li>
                                      <li><a href="about.html">about</a></li>
                                      <li><a href="blog.html">blog</a></li>
                                      <li><a href="contact.html">contact</a></li>
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
        <ul class="thumbnails">
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-1.png" alt="">
                <h5>Lorem</h5>
                <h3>Ipsum</h3>
              </div>  
              <div class="thumbnail-pad">
                  <p>Praesent vestibulum molestie lacus. Aenean noy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. </p>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-2.png" alt="">
                <h5>Lorem</h5>
                <h3>Ipsum</h3>
              </div>  
              <div class="thumbnail-pad">
                  <p>Praesent vestibulum molestie lacus. Aenean my hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. </p>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-3.png" alt="">
                <h5>Lorem</h5>
                <h3>Ipsum</h3>
              </div>  
              <div class="thumbnail-pad">
                  <p>Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suipit varius mi. Cum sociis natoque penatibus et.</p>
              </div>
            </div>
          </li>
          <li class="span3">
            <div class="thumbnail">
              <div class="caption">
              	<img src="img/img-4.png" alt="">
                <h5>Lorem</h5>
                <h3>Ipsum</h3>
              </div>
              <div class="thumbnail-pad">  
                  <p>Nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis.</p>
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
                  <p class="lead">Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. </p>
                  <figure class="img-indent"><img src="img/page1-img1.jpg" alt="" class="img-radius"></figure>
                  Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
              </div>
              <div class="span4">
                  <h4 class="indent-2">What We Do</h4>
                  <p class="lead">Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. </p>
                  <figure class="img-indent"><img src="img/page1-img2.jpg" alt="" class="img-radius"></figure>
                  Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
              </div>
          </div>
      </div>    
      <div class="span4">
      	<h4 class="indent-2">Latest News:</h4>
          <ul class="list-news">
          	<li>
              	<a href="#" class="btn btn_">Apr 21, 2012</a>
                  <p class="text-info">Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta.</p>
                  Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. <a href="#" class="underline"></a>
              </li>
              <li>
              	<a href="#" class="btn btn_">Apr 21, 2012</a>
                  <p class="text-info">Aenean nonummy hendrerit mauris</p>
                  Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.<a href="#" class="underline"></a>
              </li>
              <li>
              	<a href="#" class="btn btn_">Apr 21, 2012</a>
                  <p class="text-info">Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturien.</p>
                  Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes.  <a href="#" class="underline"></a>
              </li>
          </ul>
      </div>
    </div> 
    <div class="row">
      <div class="span12">
        <h4 class="indent-2">our Capabilities</h4>
          <p class="lead">Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturien.</p>
          <a href="#" class="link">More Info</a>
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
                      <div class="item active">
                          <div class="carousel-content">
                              <div class="blockquote-upper">
                                  <blockquote>Sapiente, ducimus, voluptas, mollitia voluptatibus nemo explicabo sit blanditiis laborum dolore illum fuga veniam quae expedita libero accusamus quas harum ex numquam necessitatibus provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</blockquote>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="carousel-content">
                              <div class="blockquote-upper">
                                  <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sint fuga temporibus nam saepe delectus expedita vitae magnam necessitatibus dolores tempore consequatur dicta cumque repellendus eligendi ducimus placeat! </blockquote>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="carousel-content">
                              <div class="blockquote-upper">                          
                                  <blockquote>Sapiente, ducimus, voluptas, mollitia voluptatibus nemo explicabo sit blanditiis laborum dolore illum fuga veniam quae expedita libero accusamus quas harum ex numquam necessitatibus provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</blockquote>
                              </div>
                          </div>
                      </div>
                      
                  </div>
              </div>
          <!-- Controls --> 
        <a class="left carousel-control" href="#text-carousel" data-slide="prev">
          <p class="carousel-arrow"></p>
        </a>
        <a class="right carousel-control" href="#text-carousel" data-slide="next">
          <p class="carousel-arrow"></p>
        </a>
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
          	<li><a href="index.html" class="current">Home Page</a>|</li>
              <li><a href="index-1.html">about</a>|</li>
              <li><a href="index-2.html">Services</a>|</li>
              <li><a href="index-3.html">collections</a>|</li>
              <li><a href="index-4.html">styles</a>|</li>
              <li><a href="index-5.html">Contacts</a></li>
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