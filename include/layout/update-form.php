<center>
    <form method="_GET" action="">
        <table>
            <tr>
                <td>ID :</td>
                <td><input name="id" type="text" <?php if(isset($_GET["id"])){echo "value=\"".$_GET["id"]."\" style=\"pointer-events:none;\"";}?>/></td>
            </tr>
            <tr>
                <td>Name :</td>
                <td><input name="name" type="text" value="<?php if(isset($_GET["name"])){echo $_GET["name"];}?>" ></td>
            </tr>
            <tr>
                <td>Price :</td>
                <td><input name="price" type="text" value="<?php if(isset($_GET["price"])){echo $_GET["price"];}?>" ></td>
            </tr>
            <tr>
                <td>Unit :</td>
                <td><input name="unit" type="text" value="<?php if(isset($_GET["unit"])){echo $_GET["unit"];}?>" ></td>
            </tr>
            <tr>
                <td>New ID:</td>
                <td><input name="new_id" type="text"></td>
                <td>(Optional)</td>
            </tr>
            <tr>
                <td></td>
                <td><input name="submit" type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php include 'include/layout/global_link.php'; ?>
</center>