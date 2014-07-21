<?php 
    $page_title = "Categories";
    $page_class = "page page--categories";
    include_once("header.php");
    gen_add_form("categories");
    include_once("nav.php");
?>
<div class="container">
<form method="post" enctype="multipart/form-data" action="categoriesprocessor.php">
    <table class="add-category">
        <tr>
            <td class="label field-label">Category</td>
            <td class="field-cell"><input type="text" name="cat" class="field field--name"></td>
            <td><input type="submit" name="add" value="Add" class="button button--flat button--flat--faux"></td>
        </tr>
    </table>
</form>


<ul class="list list--categories">
    <?php
        list_contents('Categories', FALSE);
    ?>
</ul>
<div class="button-bank button-bank--bottom">
    <form method="post" enctype="multipart/form-data" action="categoriesprocessor.php">
        <input type="submit" name="delete" value="Remove checked" class="button button--clear">
    </form>
</div>

<?php 
    include_once("footer.php");
?>