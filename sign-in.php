<?php
//page info tag
$title = "SignIn";
$header = "For login";

//include requirement
//-database connection
include 'include/db_con.php';
//-include function
include 'include/function.php';

//start (enable) session
session_start();

if (!isset($_GET["submit"])){

	if (isset($_SESSION["admin"])){
		//get session and value
		$seession = $_SESSION["admin"];

		//session checker
		check_session($seession);
	}
?>
<?php include 'include/layout/htmlstart.php'; ?>
<?php include 'include/layout/header.php';?>
	<?php if($is_admin === true){ //is admin?>

<?php include 'include/layout/admin_ui.php'; //admin gui ?>

	<?php }else{ //is other ?>

<?php include 'include/layout/login_ui.php'; //login form ?>

	<?php } ?>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>

<?php
}elseif (isset($_GET["submit"])){
	if ($is_admin === null){
	    
	    //rec - username and password
		$username = $_GET["username"];
		$password = $_GET["password"];
		
		if (isset($username) && isset($password)) {

			$sql_query_select = "SELECT username, password ";
			$sql_query_select .= "FROM user ";
			$sql_query_select .= "WHERE username = '{$username}' AND password = '{$password}';";
			
			$result = mysqli_query($db_con, $sql_query_select);
    			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0){
				while($row = mysqli_fetch_assoc($result)){
					if ($row["username"] = $username && $row["password"] = $password){

						//create encryption session
						create_token();

						$_SESSION["admin"]=$str_last_result;

                				$sql_query_update = "UPDATE user SET ";
                				$sql_query_update .= "token = '{$str_last_result}' ";
                				$sql_query_update .= "WHERE username = '{$username}';";

						if (mysqli_query($db_con, $sql_query_update) === true){
							//echo "You are Logged in";
							header("Location: /");
						}
						break;
					}
				}
			}else{
				echo "<center>";
				echo "Access denied";
				echo "<br><a href=\"sign-in.php\"><img src=\"media/authentication.png\"></a>";
				echo "</center>";
			}
		}elseif (!isset($username) && !isset($password)){
			echo "<center>";
			echo "Access denied Warning !!!";
			echo "<br><a href=\"sign-in.php\"><img src=\"media/authentication.png\"></a>";
			echo "</center>";
			}
	}
}
$db_con->close();
?>
