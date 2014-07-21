<?php 
    $page_title = "Favorites";
    $page_class = "page page--favorites";
    include_once("header.php");
    gen_add_form("favorites");
    include_once("nav.php");
?>

<div class="container">

<div class="button-bank button-bank--top">
    <button class="button button--add-new">+</button>
</div>




<ul class="list list--favorites">
<?php
    list_category('Favorites');
    echo "<h4>Other</h4>";
    list_contents('Favorites', '0');
?>
</ul>

<div class="button-bank">
    <form method="post" enctype="multipart/form-data" action="favoritesprocessor.php">
        <input type="submit" name="delete" value="Remove checked" class="button button--clear">
    </form>
</div>

<?php 
    include_once("footer.php");
?>