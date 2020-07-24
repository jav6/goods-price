<center>
        <?php include 'include/layout/header.php' ?>
        <form method="_GET">
            <table>
                <tr>
                    <td>Goods name :</td>
                    <td><input name="goods_name" type="text" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="submit" class="margin" type="submit" value="Search"></td>
                </tr>
            </table>
        </form>
        <br>
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
                $db_con->close();
            }
        }elseif (isset($_GET["submit"]) && empty($goods_name)) {
            echo "Please Enter Goods name";
        }
?>
            <?php include 'include/layout/global_link.php'; ?>
</center>