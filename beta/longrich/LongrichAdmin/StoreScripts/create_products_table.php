<?php
require 'connect_to_mysql.php';

$query ="CREATE TABLE products(
	id int(11)NOT NULL AUTO_INCREMENT,
	product_name varchar(255)NOT NULL,
	price varchar(16) NOT NULL,
	details text NOT NULL,
	category varchar(16) NOT NULL,
	subcategory varchar(16) NOT NULL,
	date_added date NOT NULL,
	PRIMARY KEY(id),
	UNIQUE KEY product_name(product_name)
	)";
$create = $conn->query($query);
if(!$create)
{
	echo"CRITICAL ERROR: product table has not been created." . $conn->error;
}

else 
{
	echo"Your product table has been created successfully!.";
}
?>