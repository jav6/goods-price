<?php
//page info tag
$title = "Updtate Data";
$header = "For login";

//include requirement
//-database connection
include 'include/db_con.php';
//-include function
include 'include/function.php';

//start (enable) session
session_start();

$session = $_SESSION["admin"];
//session checker
check_session($session);

if ($is_admin === TRUE){
        //echo "<p style=\"text-align:center; background-color: greenyellow;\">Admin</p>";
    }else{
        header("Location: /");
    }

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
<?php include 'include/layout/htmlstart.php';?>
<?php include 'include/layout/header.php';?>
<?php include 'include/layout/update-form.php';?>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>