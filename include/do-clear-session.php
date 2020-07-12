<?php
session_start();
if (isset($_SESSION["admin"])) {
    $_SESSION["admin"] = null;
    header("Location: /goods-price");
}else {
    header("Location: /goods-price");
}
?>