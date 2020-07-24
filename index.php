<?php
//page info
$title = "Goods Price Index";
$header = "Search for find Price";

// include database connection file
include 'include/db_con.php';

if (isset($_GET["submit"])) {

    $goods_name = $_GET["goods_name"];

    // search goods on database
    $search_sql = "SELECT * FROM goods";

    //for show all data (record)
    if ($goods_name === "/all/") {
        $search_sql .= ";";
    }else {
        $search_sql .= " WHERE name like '%{$goods_name}%';";
    }
}
?>
<?php include 'include/layout/htmlstart.php'; ?>
<?php include 'include/layout/search.php' ?>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>