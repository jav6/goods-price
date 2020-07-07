<?php
$title = "Delete Data - (Record)";
//include database connection file
include 'include/db_con.php';

//check access
include 'include/check_access.php';

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
<?php include 'include/layout/htmlstart.php'; ?>
    <center>
        <form method="_GET">
            ID : <input name="id" type="text" <?php if(isset($_GET["id"])){echo "value=\"".$_GET["id"]."\" style=\"pointer-events:none;\"";}?>><br>
            <input name="submit" type="submit" value="Delete"><br>
        </form>
    </center>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>