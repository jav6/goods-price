<?php

// include database connection file
include 'db_con.php';

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
            ID : <input name="id" type="text" /><br />
            <input name="submit" type="submit" value="Delete"><br />
        </form>
    </center>
</body>
</html>