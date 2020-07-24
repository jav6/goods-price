<?php
//page info tag
$title = "Insert Data";
$header = "For insert goods";

//include database connection
include 'include/db_con.php';
//include function
include 'include/function.php';

//enable session
session_start();

if (isset($_SESSION["admin"])){
	//get session
	$session = $_SESSION["admin"];

	//session checker
	check_session($session);
	
	if ($is_admin === TRUE){
		//echo "<p style=\"text-align:center; background-color: greenyellow;\">Admin</p>";
	}else{
		header("Location: /");
	}
}else{
    header("Location: /");
}

?>
<?php
if (isset($_GET["goods_name"])) {
	$goods_name = $_GET["goods_name"];
	$goods_price = $_GET["goods_price"];
	$goods_unit = $_GET["goods_unit"];

	// insert data to mysql
	$sql_qu = "INSERT INTO goods"; 
	$sql_qu .= "(name, price, unit)"; 
	$sql_qu .= " VALUE"; 
	$sql_qu .= "('{$goods_name}', '{$goods_price}', '{$goods_unit}');";

		// get result
        if ($db_con -> query($sql_qu) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error ".$sql_qu."<br />".$db_con -> connect_error;
        }

        $db_con -> close();
}
?>
<?php include 'include/layout/htmlstart.php'; ?>
<?php include 'include/layout/header.php';?>
<?php include 'include/layout/insert-form.php'; ?>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>