<?php
if (isset($_GET["submit"])) {
    $goods_name = $_GET["goods_name"];

    // include database connection file
    include 'db_con.php';

    // search goods on database
    $search_sql = "SELECT * FROM goods";

    //for show all data (record)
    if ($goods_name === "/all/") {
        $search_sql .= ";";
    } else {
        $search_sql .= " WHERE name like '%{$goods_name}%';";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Goods Price</title>
        <link rel="stylesheet" href="script/style.css">
    </head>
    <body>
    <center>
        <p style="text-align: center; background-color: aqua;">Search for find Price</p>
        <form method="_GET" action="">
            <table>
                <tr>
                    <td>Goods name :</td>
                    <td>
                        <input name="goods_name" type="text" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input name="submit" class="margin" type="submit" value="Search">
                    </td>
                </tr>
            </table>
        </form>
        <br />
        <?php
        // check the field status
        if (isset($_GET["submit"]) && !empty($goods_name)) {
            
            // get and print sql query result
            if ($result = $db_con -> query($search_sql)) {
                
                // loop for print sql query
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Name</th>";
                echo "<th>Price</th>";
                echo "<th>Unit</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";
                echo "</tr>";
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["price"]."</td>";
                    echo "<td>".$row["unit"]."</td>";
                    echo "<td><a target=\"_blank\" href=\"do-update?id=".$row["id"]."&name=".$row["name"]."&price=".$row["price"]."&unit=".$row["unit"]."\"><img src=\"media/pen.png\"></a></td>";

                    echo "<td><a target=\"_blank\" href=\"do-delete?id=".$row["id"]."\"><img src=\"media/delete.png\"></a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            $db_con -> close();
        }elseif (isset($_GET["submit"]) && empty($goods_name)) {
            echo "Please Enter Goods name";
        }
        echo "<br />";
        echo "<br />";
        echo "<a href=\"do-insert\" target=\"_blank\"><img src=\"media/add.png\"></a>";
        ?>
    </center>
    <br />
    <footer style="text-align: center; background-color: aqua;">v1.1</footer>
</body>
</html>