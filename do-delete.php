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


// include database connection file
//include 'db_con.php';

if (isset($_GET["submit"])) {

    $id = $_GET["id"];

    if (!empty($id)) {
        $delete_qu = "DELETE FROM goods WHERE id = '{$id}';";

        if ($db_con->query($delete_qu) === TRUE) {
            echo "Recor Delete Successfully.";
        } else {
            echo "Error  Delete Record :".$db_con -> error();
        }
    } else {
        echo 'Please Enter ID';
    }
    $db_con -> close();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Data - (Record)</title>
    </head>
    <body>
    <center>
        <form action=""  method="_POST">
            ID : <input name="id" type="text" <?php if(isset($_GET["id"])){echo "value=\"".$_GET["id"]."\" style=\"pointer-events:none;\"";}?> /><br />
            <input name="submit" type="submit" value="Delete"><br />
        </form>
    </center>
</body>
</html>