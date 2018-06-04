<?php
require 'connect_to_mysql.php';

$query ="CREATE TABLE transactions(
	id int(11)NOT NULL AUTO_INCREMENT,
	product_id_arrary varchar(255) NOT NULL,
	payer_email varchar(255) NOT NULL,
	first_name varchar(255) NOT NULL,
	last_name varchar(255) NOT NULL,
	payment_date varchar(255) NOT NULL,
	mc_gross varchar(255) NOT NULL,
	payment_currency varchar(255) NOT NULL,
	txn_id varchar(255) NOT NULL,
	receiver_email varchar(255) NOT NULL,
	payment_type varchar(255) NOT NULL,
	payment_status varchar(255)NOT NULL,
	txn_type varchar(255) NOT NULL,
	payer_status varchar(255) NOT NULL,
	address_street varchar(255) NOT NULL,
	address_city varchar(255) NOT NULL,
	address_county varchar(255) NOT NULL,
	address_postcode varchar(255) NOT NULL,
	address_country varchar(255) NOT NULL,
	address_status varchar(255) NOT NULL,
	notify_version varchar(255) NOT NULL,
	verify_sign varchar(255) NOT NULL,
	payer_id varchar(255) NOT NULL,
	mc_currency varchar(255) NOT NULL,
	mc_fee varchar(255)NOT NULL,
	PRIMARY KEY(id),
	UNIQUE KEY txn_id(txn_id)
	)";
$create = $conn->query($query);
if(!$create)
{
	echo"CRITICAL ERROR: transaction table has not been created." . $conn->error;
}

else 
{
	echo"Your transactions table has been created successfully!.";
}
?>