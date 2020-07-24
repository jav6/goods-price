<center>
	<form method="_GET">
		ID : <input name="id" type="text" <?php if(isset($_GET["id"]) && !empty($_GET["id"])){echo "value=\"".$_GET["id"]."\" style=\"pointer-events:none;\"";}?>><br>
		<input name="submit" type="submit" value="Delete"><br>
	</form>
	<?php include 'include/layout/global_link.php'; ?>
</center>