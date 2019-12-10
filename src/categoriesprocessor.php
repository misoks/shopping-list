<?php
require_once "db.php";
@include("functions.php");


    if (isset($_POST['add'])) {
        if ( strlen($_POST['cat']) >= 1 ) {
            add_cat();
        }
        else {
            echo "Please type in the category's name.";
        }
    }
    if (isset($_POST['delete'])) {
        delete_marked('Categories');
    }
    unset($_POST);
    header( 'Location: categories.php' ) ;

?>
