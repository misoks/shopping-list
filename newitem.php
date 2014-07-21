<?php
?>
<div id="add-item" class="add-modal" style="display: none;">

        <div class="add-modal--box">
            <h3>New Item</h3>
        <table class="add-item">
            <tr>
                <td class="field-label"><label for="item-name">Item</label></td>
                <td class="field-cell"><input type="text" name="item" id="item-name" class="field field--name"></td>
            </tr>
            <tr>
                <td class="field-label"><label for="category-list">Category</label></td>
                <td class="field-cell">
                    <select name="category" id="category-list" class="field field--category">
                        <option value="0">——</option>
                        <?php
                            $result = mysql_query("SELECT name, id FROM Categories ORDER BY name ASC");
                            while ( $row = mysql_fetch_row($result) ) {
                                $category = (htmlentities($row[0]));
                                $cat_id = (htmlentities($row[1]));
                                echo "<option value='$cat_id'>$category</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
            <tr>
        <div class="button-bank button-bank--right">
            <button class="button button--flat button--cancel" type="button" id="new-item-cancel">Cancel</button>
            <input type="submit" name="add" value="Add" class="button button--flat button--flat--primary">
        </div>
    </div>

</div>
