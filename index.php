<?php
if (isset($_GET["submit"]) && !empty($goods_name)) {
    $goods_name = $_GET["goods_name"];

    //connect and test database
    include 'db_con.php';

    $search_qu = "SELECT * FROM goods WHERE name like '%{$goods_name}%';";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Goods Price</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <center>
        <p style="text-align: center; background-color: aqua;">Search for find Price</p>
        <form action="">
            Goods name : <input name="goods_name" type="text" />
            <br />
            <input name="submit" class="margin" type="submit" value="Submit">
        </form>
        <br />
        <?php
        if (isset($_GET["submit"]) && !empty($goods_name)) {
            if ($result = $db_con->query($search_qu)) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<hr />"."ID : " . $row["id"] . " - Name : " . $row["name"] . " - Price : " . $row["price"] . "<hr />";
                }
            }
        }
        ?>
    </center>
    <footer style="text-align: center; background-color: aqua;">v0.0 Starter</footer>
</body>
</html>