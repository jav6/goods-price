<?php
//page info tag
$title = "Delete Data - (Record)";
$header = "For insert goods";

//include database connection file
include 'include/db_con.php';
//include function
include 'include/function.php';

session_start();

$session = $_SESSION["admin"];
check_session($session);

if ($is_admin === true) {
}else{
    header("Location : /");
}

if (isset($_GET["submit"])) {

    $id = $_GET["id"];

    if (!empty($id)) {

        $delete_qu = "DELETE FROM goods WHERE id = '{$id}';";

        if ($db_con->query($delete_qu) === TRUE) {
            echo "Recor Delete Successfully.";
        }else {
            echo "Error  Delete Record :".$db_con -> error();
        }

    }else {
        echo 'Please Enter ID';
    }

    $db_con -> close();
}
?>
<?php include 'include/layout/htmlstart.php'; ?>
<?php include 'include/layout/header.php';?>
<?php include 'include/layout/delete.php' ?>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>