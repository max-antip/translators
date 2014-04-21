<?php

include "../config.php";
require "login.php";

$query = "insert into order_bags (translater_id,order_id,status)
 values (" . $_SESSION['user_id'] . "," . $_GET['order_id'] . "," . 0 . ")";

if (mysql_query($query)) {

    mysql_query("update orders set status=1 where id=" . $_GET['order_id'] . " ");
    header("Location: cabinet.php");
} else {
    echo mysql_error();
}



