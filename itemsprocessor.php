<?php
require_once "_setup/db.php";
@include("functions.php");
session_start();


    if (isset($_POST['add'])) {
        $name = $_POST['item'];
        $category = $_POST['category'];
        
        if ( strlen($name) >= 1 )
            {
                add_item("Items");
            }
        else { 
            echo "Please type in the item's name.";
        }
    }
    if (isset($_POST['clear'])) {
       delete_marked('Items'); 
    }
    if (isset($_POST['addfavs'])) {
        add_favs();
    }
    if (isset($_POST['selectall'])) {
        select_all();
    }
    if (isset($_POST['edit-save'])) {
        $category = $_POST['category'];
        $notes = $_POST['notes'];
        $id = $_POST['item-id'];
        edit_item($id, $notes, $category, 'Items');
    }
    unset($_POST);
    header( 'Location: index.php' ) ;

?>