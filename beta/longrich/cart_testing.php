<?php
session_start();
//session_destroy();
$page = 'cartindex.php';

if (isset($_GET['add']))
{
	
	include_once('../Static_Full_Version/storescripts/connect_to_mysql.php');
	$query = "SELECT id, quantity FROM products WHERE id= ".$_GET['add'];
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	$rows =$result->num_rows;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		if($row['quantity']!=$_SESSION['cart_'.$_GET['add']]){
	$_SESSION['cart_'.$_GET['add']]+='1';
		}
		   }
		   }
		   
		   

function products()
{
	include_once('../Static_Full_Version/storescripts/connect_to_mysql.php');
	$query = "SELECT id, product_name, details, price FROM products WHERE quantity > 0 ORDER BY id DESC";
	$result = $conn->query($query);
	if (!$result) die ("Database access failed: " . $conn->error);
	$rows =$result->num_rows;
	
									
	//read dir
	
		
									if($rows == 0){
echo "There are no products to display!";
}
else 
{
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
	echo '<p>'.$row['product_name'].'<br>'.$row['details'].'<br>'.number_format($row['price'], 2).'<a href="cart_testing.php?add='.$row['id'].'">Add</a>'.'</p>';
		
	}

}
	
	
}
	
function cart()
{
	foreach($_SESSION as $name => $value){
		if($value>0){
			if(substr($name, 0, 5)=='cart_'){
				$id = substr($name, 5, (strlen($name)-5));
				include_once('../Static_Full_Version/storescripts/connect_to_mysql.php');
	$query = "SELECT id, product_name, price FROM products WHERE id='.$id";
				$result = $conn->query($query);
				if (!$result) die ("Database access failed: " . $conn->error);
	           // $rows =$result->num_rows;
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					$sub = $row['price']*$value;
					echo $row['product_name'].' x '.$value.' @ '.$row['price'].' = '.$sub.'<br>';
				}
			}
		}
		else{
			echo"Your cart is empty";
		}
	}
}

?>