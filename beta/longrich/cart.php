<?php
session_start(); // Start session first thing in script
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Connect to the MySQL database
include "../../connect_to_mysql.php";
?>
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $wasFound = false;
        $i = 0;
        // If the cart session variable is not set or cart array is empty
        if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
            // RUN IF THE CART IS EMPTY OR NOT SET
            $_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
        } else {
            // RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
            foreach ($_SESSION["cart_array"] as $each_item) {
                $i++;
                while (list($key, $value) = each($each_item)) {
                    if ($key == "item_id" && $value == $pid) {
                        // That item is in cart already so let's adjust its quantity using array_splice()
                        array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
                        $wasFound = true;
                    } // close if condition
                } // close while loop
            } // close foreach loop
            if ($wasFound == false) {
            array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
            }
        }
        header("location: cart.php");
        exit();
    }
?>
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
        unset($_SESSION["cart_array"]);
    }
?>
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
        // execute some code
        $item_to_adjust = $_POST['item_to_adjust'];
        $quantity = $_POST['quantity'];
        $quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
        if ($quantity >= 100) { $quantity = 99; }
        if ($quantity < 1) { $quantity = 1; }
        if ($quantity == "") { $quantity = 1; }
        $i = 0;
        foreach ($_SESSION["cart_array"] as $each_item) {
            $i++;
            while (list($key, $value) = each($each_item)) {
                if ($key == "item_id" && $value == $item_to_adjust) {
                    // That item is in cart already so let's adjust its quantity using array_splice()
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
                } // close if condition
            } // close while loop
        } // close foreach loop
    }
?>
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
// Access the array and run code to remove that array index
$key_to_remove = $_POST['index_to_remove'];
if (count($_SESSION["cart_array"]) <= 1) {
unset($_SESSION["cart_array"]);
} else {
unset($_SESSION["cart_array"]["$key_to_remove"]);
sort($_SESSION["cart_array"]);
}
}
?><!--good-->
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Section 5 (render the cart for the user to view on the page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
$cartEnquire = "";
$productNames = array();//To store the product names in the cart
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
$cartOutput = "<h3 class='empty-cart'>Your shopping cart is empty</h3>";
} else {
// Start the For Each loop
$i = 0;
foreach ($_SESSION["cart_array"] as $each_item) {
$item_id = $each_item['item_id'];
$query ="SELECT * FROM products WHERE id='$item_id'";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows =$result->num_rows;
if($rows > 0){
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
$product_name = $row["product_name"];
array_push($productNames, $product_name);
$price = $row["price"];
$details = $row["details"];
}
}
$pricetotal = $price * $each_item['quantity'];
$cartTotal = $pricetotal + $cartTotal;
setlocale(LC_MONETARY, "en_US");
$pricetotal = number_format( $pricetotal, 2);
// Dynamic Checkout Btn Assembly
$x = $i + 1;
$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
<input type="hidden" name="amount_' . $x . '" value="' . $price . '">
<input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
// Create the product array variable
$product_id_array .= "$item_id-".$each_item['quantity'].",";
// Dynamic table row assembly
$cartOutput.='<div class="span12 cart-holder">';
$cartOutput.='<div class="span2">
<div class="cart-product-imitation">
<img src="../../LongrichAdmin/inventory_images/' . $item_id . '.jpg" alt="' . $product_name. '" width="80" height="80" border="1" />
</div></div>';
$cartOutput.='<div class="span6">
<p class="cart-product-title"><a href="product_detail.php?id=' . $item_id . '">' . $product_name . '</a>
</p>

</div>';
$cartOutput .= '<div class="span2"><form class="cart-form" action="cart.php" method="post">
<input name="quantity" type="text" value="' . $each_item['quantity'] . '"  class="form-control product-quantity-field"/>
<span class="product-quantity-button"><input name="adjustBtn' . $item_id . '" type="submit" value="      " class="product-quantity-button"/></span>
<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
</form>
<form class="cart-form" action="cart.php" method="post"><span class="product-remove-button"><input name="deleteBtn' . $item_id . '" type="submit" value="      " class="product-remove-button"/></span><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></div>';
$cartOutput .= '<div class="span1">'.'<p class="cart-product-total">£'.$pricetotal.'</p></div>';
$cartOutput .= '</div>';
$i++;
}
$productsString= "";
$i=0;
foreach($productNames as $prodName){
if($i>0)
$productsString.="\r";              // Change this to any kinda seperator you want
$productsString.=$prodName;
$i++;
}

$cartEnquire .= '<div class="contact-form">
<form action="cart.php" id="contact-form" method="post">
<div class="success">Contact form submitted!<strong><br>We will be in touch soon.</strong> </div>
<fieldset>
<label class="name">
<input type="text" value="" placeholder="Name" name="fullname">
<span class="error">*This is not a valid name.</span> <span class="empty">*This field is required.</span>
</label>
<label class="email">
<input type="email" value="" placeholder="Email" name="email">
<span class="error">*This is not a valid email address.</span> <span class="empty">*This field is required.</span>
</label>
<label class="phone">
<input type="text" value="" placeholder="Phone" name="phone">
<span class="error">*This is not a valid phone number.</span> <span class="empty">*This field is required.</span>
</label>
<label class="message">
<textarea name="msg">'.$productsString.'</textarea>
<span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span>
</label>
</fieldset>
<button class="btn btn_" name="new-msg" onclick ="x()"><i class="fa fa-share" value="Enquire"></i> Enquire </button>
</form></div>';
if (isset($_POST['new-msg']))
{
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['msg'];
$to      = 'eddy.kalu@edandilk.com';
$subject = 'Product Enquiry';
$message = 'From: '.$fullname."\n".
'Email:'.$email."\n".
'Phone Number: '.$phone."\n".
'Message:'."\n".$msg."\n";
$headers = 'From: Longrich Cart Enquiry'."\r\n" .
'X-Mailer: PHP/'. phpversion();
mail($to, $subject, $message, $headers);
unset($_SESSION["cart_array"]);
$cartOutput = "<h4 align='center'>Thank you for your enquiry, we will get back to you as soon as possible</h2>";
$cartEnquire = " ";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Longrich - Cart</title>
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.ui.totop.js" type="text/javascript"></script>
    <!--<script type="text/javascript" src="js/forms.js"></script>-->
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
                                        <li><a href="contact.php">contact</a></li>
                                        <li><a class="active" href="cart.php">Cart</a></li>
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
        <div class="container cart-section">
            <div class="row">
                <div class="span12">
                    <h4 class="indent-2">Cart</h4>
                   
                        <?php
                            $itemcount = "";
                                if(isset($_SESSION['cart_array']) > 0) {
                                    $itemcount = count($_SESSION['cart_array']);
                                } else {
                                    $itemcount = 0;
                            }
                        ?>
                        <span class="pull-right">(<strong><?php echo $itemcount;?></strong>) items</span>
                        <div class="span12 left-0">
                            <?php echo $cartOutput;?>
                            <a href="shop.php"><i class="fa fa-arrow-left"></i> Continue shopping</a>
                        </div>

                        <!--<button class="btn btn_" style="display:none;"><i class="fa fa fa-shopping-cart"></i> Checkout</button>-->
                        
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <?php echo $cartEnquire;?>
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
                    <li><a href="opportunity.html">opportunity</a></li>
                    <li><a href="blog.php">blog</a></li>
                    <li><a href="contact.php">contact</a></li>
                    <li><a class="current" href="cart.php">Cart</a></li>
                </ul>
                Longrich   &copy;  2017  |  Powered by <a href="http://www.edandilk.com" target="_blank">Ed & Ilk</a>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>function x() { 
  console.log("button clicked")
  setTimeout(function(){ 
      window.location.reload();
    }, 5000);
}</script>
</body>
</html>
