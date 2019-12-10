<?php
require_once "db.php";

    $marked = $_POST['marked'];
    $id = $_POST['id'];
    $table = $_POST['table'];
    $sql  = "UPDATE $table SET marked = '$marked' WHERE id = '$id'";
    mysql_query($sql) or die(mysql_error());


?>
