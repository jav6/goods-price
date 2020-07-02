<?php 
if (isset($_GET["submit"])) {

$username = $_GET["username"];
$password = $_GET["password"];

include 'db_con.php';

if ($username = "admin" && $password = "secret") {
	echo "true";
}

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
</head>
<body>
	<center>
	<form action="" method="_GET">
		<table>
			<tr>
				<td>User name :</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Sign In" /></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>