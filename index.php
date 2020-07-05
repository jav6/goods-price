<?php
$title = "Goods Price Index";
if (isset($_GET["submit"])) {

    $goods_name = $_GET["goods_name"];

    // include database connection file
    include 'include/db_con.php';

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
    <center>
        <p style="text-align: center; background-color: #00ffff;">Search for find Price</p>
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
                
                //table Subject
                ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Unit</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

    // loop for print sql query
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        <td><?php echo $row["unit"]; ?></td>
        <td><a href="do-update?id=<?php echo $row["id"]."&name=".$row["name"]."&price=".$row["price"]."&unit=".$row["unit"]; ?>"><img src="media/pen.png"></a></td>
        <td><a href="do-delete?id=<?php echo $row["id"]; ?>"><img src="media/delete.png"></a></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
            }
        }elseif (isset($_GET["submit"]) && empty($goods_name)) {
            echo "Please Enter Goods name";
        }
        ?>
        
        <br>
        <br>
        <a href="do-insert" ><img src="media/add.png"></a>
        &nbsp;
        <a href="sign-in" ><img src="media/authentication.png"></a>
    </center>
<?php include 'include/layout/footer.php';?>
<?php include 'include/layout/htmlend.php';?>