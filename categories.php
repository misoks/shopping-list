<?php 
    $page_title = "Categories";
    $page_class = "page page--categories";
    include_once("header.php");
?>

<?php
    
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
    
?>

<form method="post" enctype="multipart/form-data" action="categories.php">
    <table class="add-category">
        <tr>
            <td class="label field-label">Category</td>
            <td class="field-cell"><input type="text" name="cat" class="field field--name"></td>
            <td><input type="submit" name="add" value="Add" class="button button--small button--add"></td>
        </tr>
    </table>
</form>


<ul class="list list--categories">
    <?php
        list_contents('Categories', FALSE);
    ?>
</ul>
<div class="button-bank button-bank--bottom">
    <form method="post" enctype="multipart/form-data" action="categories.php">
        <input type="submit" name="delete" value="Remove selected categories" class="button button--clear">
    </form>
</div>

<?php 
    include_once("footer.php");
?>