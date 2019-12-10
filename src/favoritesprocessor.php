<?php
require_once "db.php";
@include("functions.php");


    if (isset($_POST['add'])) {
        $name = $_POST['item'];
        $category = $_POST['category'];

        if ( strlen($_POST['item']) >= 1 )
            {
                add_item('Favorites');
            }
        else {
            echo "Please type in the item's name.";
        }
    }
    if (isset($_POST['delete'])) {
        delete_marked('Favorites');
    }
    if (isset($_POST['edit-save'])) {
        $category = $_POST['category'];
        $notes = $_POST['notes'];
        $id = $_POST['item-id'];
        edit_item($id, $notes, $category, 'Favorites');
    }
    unset($_POST);
    header( 'Location: favorites.php' ) ;

?>
