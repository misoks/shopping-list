<?php 
    $page_title = "Favorites";
    $page_class = "page page--favorites";
    include_once("header.php");
?>

<?php
    
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
    
?>
<div class="button-bank button-bank--top">
    <button class="button button--add-new">Add New Favorite</button>
</div>
<form method="post" enctype="multipart/form-data" action="favorites.php" class="form--new-item">
    <?php include_once('newitem.php'); ?>
</form>



<ul class="list list--favorites">
<?php
    list_category('Favorites');
    echo "<h4>Other</h4>";
    list_contents('Favorites', '0');
?>
</ul>

<div class="button-bank button-bank--bottom">
    <form method="post" enctype="multipart/form-data" action="favorites.php">
        <input type="submit" name="delete" value="Remove selected from favorites" class="button button--clear">
    </form>
</div>

<?php 
    include_once("footer.php");
?>