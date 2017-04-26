<?php
session_start();

$loginfailure = "";
//if not manager or who ever has the right to access this page, don't allow log in, else if role is manager allow log in
if(isset($_SESSION['manager'])){
	header("location: ../index.php");
	exit();
}

//Be sure to check that this manager SESSION value is in fact in the database
//Parse the log in form if the user has filled it out and pressed "log In"
if(isset($_POST['username']) && isset($_POST['password'])){
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); //filter everything but numbers and letters
$password = md5(preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]));//filter everything but numbers and letters
//Connect to the database
include_once('../../connect_to_mysql.php');
	
$query="SELECT * FROM admin_user WHERE username='$manager' AND password='$password' LIMIT 1";
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
	header("location: ../index.php");
	
	exit();
} else{
	/*echo'That information is incorrect, try again <a href="login.php">Click Here</a>';*/
	//exit();
	$loginfailure = "Username/Password Invalid!";
	
}
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Longrich| Login</title>
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
              <h1 class="logo-name">Longrich</h1>

            </div>
            <h3>Welcome to Longrich</h3>
            <p>Please log in to access Admin Area
              <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            
          <form class="m-t" role="form" action="login.php" method="post">
                <div class="form-group">
                    <input name="username" type="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
				<p class = "warning" id="login-warning"><?php echo $loginfailure;?></p>
                
               
          </form>
            <p class="m-t"> <small>Powered by ED & ILK &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="Static_Full_Version/js/jquery-3.1.1.min.js"></script>
    <script src="Static_Full_Version/js/bootstrap.min.js"></script>

</body>

</html>
				
