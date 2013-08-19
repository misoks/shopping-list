<?php
    
 /* ==========================================================================
    
    Use this file to set up the connection to your database. Duplicate it and
    change the filename to 'db.php', enter the information below, and save it.
    
    ========================================================================== */
    
    $host = 'localhost'; //Change this if you're not using localhost
    $database = ''; // Database name
    $user = ''; // User with all privileges on your database
    $password = ''; // The user's password

    $db = mysql_connect($host, $user, $password) or die('Fail message');
    mysql_select_db($database) or die("Fail message");
    
?>
