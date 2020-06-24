<?php

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
        
        if ($db_con->query($update_qu) === TRUE) {
            echo "Record Update Successfully.";
            }else {
                echo "Error Updating Record :" . $db_con->error();
                }
                }else {
                    echo 'Please Enter ID';
                    }
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
            ID : <input name="id" type="text" /><br />
            Name : <input name="name" type="text"><br />
            Price : <input name="price" type="text"><br />
            Unit : <input name="unit" type="text"><br />
            <input name="submit" type="submit" value="Submit"><br />
        </form>
    </center>
</body>
</html>