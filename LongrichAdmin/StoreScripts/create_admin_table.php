<?php
require 'connect_to_mysql.php';

$query ="CREATE TABLE admin(
	id int(11)NOT NULL AUTO_INCREMENT,
	username varchar(255)NOT NULL,
	Password varchar(255)NOT NULL,
	last_log_date date NOT NULL,
	PRIMARY KEY(id),
	UNIQUE KEY username(username)
	)";
$create = $conn->query($query);
if(!$create)
{
	echo"CRITICAL ERROR: admin table has not been created." . $conn->error;
}

else 
{
	echo"Your admin table has been created successfully!.";
}
?>