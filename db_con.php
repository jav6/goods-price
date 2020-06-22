<?php
//database connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "goods-price";
$db_con = new mysqli($db_host, $db_user, $db_pass, $db_name) ;

//check con db
if ($db_con -> connect_errno) {
	echo "Database connec Error : " . $db_con->connect_error;
	exit();
}
 ?>