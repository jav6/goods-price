<?php
// include database connection file
include 'db_con.php';

if (isset($_GET["submit"])) {

    $id = $_GET["id"];
    $name = $_GET["name"];
    $price = $_GET["price"];
    $unit = $_GET["unit"];
    
    if(!empty($id)){
    	$update_qu = "UPDATE goods ";
    	$update_qu .="SET ";
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
        <form action=""  method="_POST">
            <table>
                <tr>
                    <td>ID :</td>
                    <td><input name="id" type="text" /></td>
                </tr>
                <tr>
                    <td>Name :</td>
                    <td><input name="name" type="text"></td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input name="price" type="text"></td>
                </tr>
                <tr>
                    <td>Unit :</td>
                    <td><input name="unit" type="text"></td>
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