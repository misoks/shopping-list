<?php 
    $page_title = "Shopping List";
    $page_class = "page page--master";
    include_once("header.php");

    $item = '';
    $marked = '0';
    
?>

<div class="button-bank button-bank--top">
    <button class="button button--add-new">Add New Item</button>
    <form method="post" enctype="multipart/form-data" action="itemsprocessor.php" class="form form--add-favs">
        <input type="submit" name="addfavs" value="+★" class="button button--add-favs">
    </form>

</div>
<form method="post" enctype="multipart/form-data" action="itemsprocessor.php" class="form--new-item">
    <?php include_once('newitem.php'); ?>
</form>

<ul class="list list--master">
<?php
    list_category('Items');
    echo "<h4>Other</h4>";
    list_contents('Items', '0');
?>
</ul>

<div class="button-bank button-bank--bottom">
    <form method="post" enctype="multipart/form-data" action="itemsprocessor.php">
        <input type="submit" name="selectall" value="Select All" class="button button--select-all">
    </form>

    <form method="post" enctype="multipart/form-data" action="itemsprocessor.php">
        <input type="submit" name="clear" value="Remove checked items" class="button button--clear">
    </form>
</div>



<?php 
    include_once("footer.php");
?>