<?php

include 'db_con.php';
session_start();
if (isset($_SESSION["admin"])){
$sql_query_check_token = "SELECT token from user WHERE token = '{$_SESSION["admin"]}';";
$sql_qu_tok_result = mysqli_query($db_con, $sql_query_check_token);
$sql_qu_tok_result_num = mysqli_num_rows($sql_qu_tok_result);
if ($sql_qu_tok_result_num > 0){
    while ($row = mysqli_fetch_assoc($sql_qu_tok_result)){
        if ($row["token"] === $_SESSION["admin"]){
            echo "You are Admin";
        }else{
            header("Location: http://s.s/goods-price/index");
        }
    }
}
}else{
    header("Location: http://s.s/goods-price/index");
}

?>


<?php //include "db_con.php"; // include database connection ?>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Insert Data</title>
</head>
<body>
	<center>
		<form method="_GET" action="" >
			<table>
				<tr>
					<td>Name :</td>
					<td><input name="goods_name" type="text"></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td><input name="goods_price" type="text"></td>
				</tr>
				<tr>
					<td>Unit :</td>
					<td><input name="goods_unit" type="text"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>