<?php
include 'db_con.php';
session_start();
$is_admin = null;
if (isset($_SESSION["admin"])){
$sql_query_check_token = "SELECT token from user WHERE token = '{$_SESSION["admin"]}';";
$sql_qu_tok_result = mysqli_query($db_con, $sql_query_check_token);
$sql_qu_tok_result_num = mysqli_num_rows($sql_qu_tok_result);
if ($sql_qu_tok_result_num > 0){
    while ($row = mysqli_fetch_assoc($sql_qu_tok_result)){
        if ($row["token"] === $_SESSION["admin"]){
            $is_admin = true;
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
</head>
<body>
	<center>
	<img src='media/safety.png' width="100" height="100"><br>
        <p>You are Admin</p><br>
        <a href="do-clear-session.php">Log Out</a>
    </center>
</head>
</html>
            <?php
        }
    }
}
}

if ($is_admin === null){
if (isset($_GET["submit"])) {

$username = $_GET["username"];
$password = $_GET["password"];

if (isset($username) && isset($password)) {

    $str_source = "qa69zw13sxedcrfv2t4gbyhn5ujm78ikolp0";
    $str_result = "@UT-";
    $str_lenght = strlen($str_result);
    while ($str_lenght <= 10){
        $number = rand(1, 36);
        $str_result .= substr($str_source, $number, 1);
        $str_lenght = strlen($str_result);

        if ($str_lenght == 10){
            global $str_last_result;
            $str_last_result = $str_result;
            break;
        }
    }

    $sql_query_select = "SELECT username, password ";
    $sql_query_select .= "FROM user ";
    $sql_query_select .= "WHERE username = '{$username}' AND password = '{$password}';";

    $result = mysqli_query($db_con, $sql_query_select);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            if ($row["username"] = $username && $row["password"] = $password){
                $_SESSION["admin"]=$str_last_result;

                $sql_query_update = "UPDATE user SET ";
                $sql_query_update .= "token = '{$str_last_result}' ";
                $sql_query_update .= "WHERE username = '{$username}';";
                if (mysqli_query($db_con, $sql_query_update) === true){
                    echo "You are Logged in";
                    header("Location: http://s.s/goods-price/index");
                }
                break;
            }
        }
    }
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
<?php
}
$db_con->close();
?>