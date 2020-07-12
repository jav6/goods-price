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
    $name = $_GET["name"];
    $price = $_GET["price"];
    $unit = $_GET["unit"];
    $new_id = $_GET["new_id"];
    
    if(!empty($id)){
    	$update_qu = "UPDATE goods ";
    	$update_qu .="SET ";
    	if(!empty($new_id)){$update_qu .="id = '{$new_id}', ";}
        if(!empty($name)){$update_qu .="name = '{$name}', ";}
    	if(!empty($price)){$update_qu .="price = '{$price}', ";}
    	if(!empty($update_qu)){$update_qu .="unit = '{$unit}' ";}
    	$update_qu .="WHERE id = '{$id}';";
        
        // get result sql query
        if ($db_con->query($update_qu) === TRUE) {
            echo "Record Update Successfully.";
            }else {
                echo "Error Updating Record :" . $db_con->error();
                }
                }else {
                    echo 'Please Enter ID';
                    }
                    $db_con -> close();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Updtate Data</title>
    </head>
    <body>
    <center>
        <form action="">
            <table>
                <tr>
                    <td>ID :</td>
                    <td><input name="id" type="text" <?php if(isset($_GET["id"])){echo "value=\"".$_GET["id"]."\" style=\"pointer-events:none;\"";}?>/></td>
                </tr>
                <tr>
                    <td>Name :</td>
                    <td><input name="name" type="text" value="<?php if(isset($_GET["name"])){echo $_GET["name"];}?>" ></td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input name="price" type="text" value="<?php if(isset($_GET["price"])){echo $_GET["price"];}?>" ></td>
                </tr>
                <tr>
                    <td>Unit :</td>
                    <td><input name="unit" type="text" value="<?php if(isset($_GET["unit"])){echo $_GET["unit"];}?>" ></td>
                </tr>
                <tr>
                    <td>New ID:</td>
                    <td><input name="new_id" type="text"></td>
                    <td>(Optional)</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>