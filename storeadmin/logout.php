<?php
session_start();
session_destroy();
header("location: login.php"); 
//echo 'you have been looged out <a href="../index.php">Click Here to log back in</a>';

/*echo <<<_END
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Logout</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>
<div>
  <h1 class="logout-logo-name">You have been logged out </h1><br><br>
  <a href="../index.php" class="logout_link">Click Here to log back in</a>

</div>

</html>

_END;*/
?>
