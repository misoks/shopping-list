<?php 
    $page_title = "Shopping List";
    $page_class = "page page--master";

    include_once("header.php");
    gen_add_form("items");
    include_once("nav.php");
    $item = '';
    $marked = '0';
    
?>
    
<div class="container">

<div class="button-bank">
    <button class="button button--add-new" id="add-button"></button>
    <form method="post" enctype="multipart/form-data" action="itemsprocessor.php" class="form form--add-favs">
        <input type="submit" name="addfavs" value="+ Add Favorites" class="button button--add-favs button--flat button--flat--faux">
    </form>
</div>

   
<ul class="list list--master">
<?php
    list_category('Items');
    echo "<h4 class='list__category-header'>Other</h4>";
    list_contents('Items', '0');
?>
</ul>

<div class="button-bank">

    <form method="post" enctype="multipart/form-data" action="itemsprocessor.php">
        <input type="submit" name="clear" value="Remove checked" class="button button--clear">
    </form>
</div>



<?php 
    include_once("footer.php");
?>