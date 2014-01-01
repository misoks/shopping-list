<?php 
    $page_title = "Favorites";
    $page_class = "page page--favorites";
    include_once("header.php");
?>

<div class="button-bank button-bank--top">
    <button class="button button--add-new">Add New Favorite</button>
</div>
<form method="post" enctype="multipart/form-data" action="favoritesprocessor.php" class="form--new-item">
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
    <form method="post" enctype="multipart/form-data" action="favoritesprocessor.php">
        <input type="submit" name="delete" value="Remove selected from favorites" class="button button--clear">
    </form>
</div>

<?php 
    include_once("footer.php");
?>