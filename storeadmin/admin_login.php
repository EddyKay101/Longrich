<?php
session_start();
//if not manager or who ever has the right to access this page, don't allow log in, else if role is manager allow log in
if(isset($_SESSION['manager'])){
	header("location: index.php");
	exit();
}

//Be sure to check that this manager SESSION value is in fact in the database
//Parse the log in form if the user has filled it out and pressed "log In"
if(isset($_POST['username']) && isset($_POST['password'])){
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); //filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);//filter everything but numbers and letters
//Connect to the database
include_once('../storescripts/connect_to_mysql.php');
$query="SELECT * FROM admin WHERE username='$manager' AND password='$password' LIMIT 1";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
$rows = $result->num_rows;
if($rows == 1){
	while($fetchData = $result->fetch_array(MYSQLI_ASSOC)){
		$id = $fetchData["id"];
	}
	$_SESSION['id'] = $id;
	$_SESSION['manager'] = $manager;
	$_SESSION['password'] = $password;
	header("location: index.php");
	exit();
} else{
	echo'That information is incorrect, try again<a href="index.php">Click Here</a>';
	exit();
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
<link rel="stylesheet" href="../style/style.css"type="text/css"media="screen"/>
</head>

<body>
<div align="center" id="mainWrapper">
 <?php include_once('../template_header.php');?>
  <div id="pageContent"><br>
	  <div align="left" style="margin-left:24px;">
	    <h2>Please Log In To Manage the Store</h2>
	    <form id="form1" name="form1" method = "post" action="admin_login.php">
	    	User Name:<br>
	    	 <input name="username" type="text" id="username" size="40">
	    	 <br><br>
	    	Password:<br>
	    	 <input name="password" type="password" id="password" size="40">
	    	 <br>
	    	 <br>
	    	 <br>
	    	 <label>
	    	  <input type="submit" name="button" is="button" value="Log In">
			</label>
		  </form>
		  <p>&nbsp;</p>
	  </div>
	  <br>
	  <br>
	  <br>
  </div>
  <?php include_once('../template_footer.php');?>
</div>
</body>
</html>