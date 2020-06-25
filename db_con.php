<?php
// create database connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "toor";
$db_name = "goods-price";
$db_con = new mysqli($db_host, $db_user, $db_pass, $db_name) ;

// check connection to database
if ($db_con -> connect_errno) {
	echo "Database connection Error : " . $db_con -> ct_error;
	exit();
}
 ?>