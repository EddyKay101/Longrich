<?php 
$hn = 'edandilk.com.mysql';
$db = 'edandilk_com';
$un = 'edandilk_com';
$pw = 'eddyilker';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error)
{
	die($conn->connect_error);
	
}

else
{
    echo "<p>success</p>";
}

?>