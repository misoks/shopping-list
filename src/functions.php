<?php

//  ===============   Universal Functions   =============== 

function current_page() {
    $current = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    return $current;
}

// Creates navigation links
function navLink($url, $linktext) {
    $tab = "\t\t\t";
    $current = current_page();
    if ($url == $current) {
        return "<h1 class='nav-link nav-link--$linktext current'>$linktext</h1>\n".$tab;
    }
    else {
        return "<a class='nav-link nav-link--$linktext' href='$url'>$linktext</a>\n".$tab;
    }
}

// Add items to any list
function add_item($table) {
    $item = mysql_real_escape_string($_POST['item']);
    if (isset($_POST['category'])) {
        $category = mysql_real_escape_string($_POST['category']);
    }
    else {
        $category = '0';
    }
    if ($table == "Favorites") {
        $sql = "INSERT INTO $table (name, category, favorite) 
              VALUES ('$item', $category, '1')";
    }
    else {
        $sql = "INSERT INTO $table (name, category) 
                  VALUES ('$item', $category)";
    }
	mysql_query($sql);
}

// Removes marked items from any list
function delete_marked($table) {
    $sql = "DELETE FROM $table WHERE marked = '1'";
    mysql_query($sql);
}

// Lists categories as headings
function list_category($table) {
    $result = mysql_query("SELECT name, id FROM Categories ORDER BY name ASC");
    while ( $row = mysql_fetch_row($result) ) {
        $category = (htmlentities($row[0]));
        $id = (htmlentities($row[1]));
        echo "<h4 class='list__category-header'>$category</h4>";
        list_contents($table, $id);
    }
}

//Drop-down list of all categories
function category_select($table, $item_id) {
    echo "<select name='category' id='item-cat'>
            <option value='0'>——</option>";
    $result = mysql_query("SELECT name, id FROM Categories ORDER BY name ASC");
    $result2 = mysql_query("SELECT category FROM $table WHERE id ='$item_id'");
    while ( $row = mysql_fetch_row($result2) ) {
        $current = (htmlentities($row[0]));
    }
    while ( $row = mysql_fetch_row($result) ) {
        $category = (htmlentities($row[0]));
        $cat_id = (htmlentities($row[1]));
        echo "<option value='$cat_id'";
        if ($cat_id == $current) {
            echo " selected";
        }
        echo ">$category</option>";
    }
echo "</select>";
}

// Lists contents of any list
function list_contents($table, $cat_id) {
    if ($cat_id === FALSE) { // For listing Favorites and Categories
        $sql = "SELECT name, id, marked FROM $table ORDER BY name ASC";
    }
    else { //For listing regular items, grouped by category
        $sql = "SELECT name, id, marked, notes, favorite FROM $table WHERE category = '$cat_id' ORDER BY name ASC";
    }
    $result = mysql_query($sql);
    $oddeven = "odd";
    while ( $row = mysql_fetch_row($result) ) {
        $status = '';
        $class = "unstruck";
        $item = (htmlentities($row[0]));
        $id = (htmlentities($row[1]));
        $marked = (htmlentities($row[2]));
        if ($table == "Categories") {
            $fav = FALSE;
        }
        else {
            $fav = (htmlentities($row[4]));
        }
        if ($cat_id === FALSE) {
            $notes = '';
        }
        else {
            $notes = (htmlentities($row[3]));
        }
        if ( $marked == '1' ) {
            $status = "checked";
            $class = "struck";
        }
        if ($fav == TRUE) {
              $class = $class." item--fav";
        }
        else {
            $class = $class." item--manual";
        }
        echo   "<li class='item item--$oddeven $class'>
                    <input type='checkbox' name='marked' class='check--$table marked-input' id='item-$id' value='$id' $status>
                    <label for='item-$id' class='item__label'>$item";
                if ( strlen($notes) > 0 ) {
                    echo " ($notes)";
                }
                echo "</label>";
        if ($table == "Items" or $table == "Favorites") {
            $list = strtolower($table);
            echo "<button class='button button--edit' id='$id'>Edit</button>
            <form method='post' enctype='multipart/form-data' id='form-$id' class='form--edit-item' style='display: none;' action='".$list."processor.php'>";
            echo "<table class='edit-item form'>
                <tr>
                    <td class='form__label'>
                        <label for='item-cat'>Category</label>
                    </td>
                    <td class='form__value'>";
                    category_select($table, $id);
                    echo "</td>
                </tr>
                <tr>
                    <td class='form__label'>
                        <input type='text' name='item-id' class='field field--id' value='$id'>
                        <label for='item-notes'>Notes</label>
                    </td>";
                
                echo '<td class="form__value">
                        <input type="text" name="notes" id="item-notes" class="field field--notes" value="'.$notes.'">
                    </td></tr><tr><td></td>
                    <td>
                        <input type="submit" name="edit-save" value="Save" class="button button--flat button--flat--faux button--flat--primary">
                    </td>
                </tr>
                
            </table>
            </form>';
        }
        echo "</li>";
        if ( $oddeven == "odd" ) { $oddeven = "even"; }
        else { $oddeven = "odd"; }
    }
}

function gen_add_form($page) {
    $processor = $page."processor.php";
    echo '<form method="post" enctype="multipart/form-data" action="'.$processor.'" class="form--new-item">';
    include_once('newitem.php');
    echo '</form>';
}


//  ===============   List-Specific Functions   =============== 

// Adds favorite items to grocery list
function add_favs() {
    $sql = "INSERT INTO Items (name, category, notes, favorite) SELECT name, category, notes, favorite FROM Favorites";
    mysql_query($sql);
}

function edit_item($id, $notes, $category, $table) {
    if ($table == 'Items') {
        $sql = "UPDATE $table SET notes = '$notes', category = '$category', favorite = '0' WHERE id = '$id'";
    }
    else {
        $sql = "UPDATE $table SET notes = '$notes', category = '$category' WHERE id = '$id'";
    }
    mysql_query($sql);
}

// Selects all items on the grocery list
function select_all() {
    $sql = "UPDATE Items SET marked = '1'";
    mysql_query($sql);
}

// Adds a new category to the category list
function add_cat() {
    $item = mysql_real_escape_string($_POST['cat']);
    $sql = "INSERT INTO Categories (name) 
              VALUES ('$item')";
	mysql_query($sql);
}

?>