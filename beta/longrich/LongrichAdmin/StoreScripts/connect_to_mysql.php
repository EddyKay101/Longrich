<?php 
$hn = 'edandilk.com';
$db = 'eedandilk_com';
$un = 'edandilk_com';
$pw = 'eddyilker';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error)
{
	die($conn->connect_error);
	echo "<p>not exist</p>";
}

?>