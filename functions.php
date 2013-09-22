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
        echo "<h4>$category</h4>";
        list_contents($table, $id);
    }
}

// Lists contents of any list
function list_contents($table, $cat_id) {
    if ($cat_id === FALSE) {
        $sql = "SELECT name, id, marked FROM $table ORDER BY name ASC";
    }
    else {
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
        $fav = (htmlentities($row[4]));
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
              $class = $class." fav";
        }
        echo   "<li class='item item--$oddeven $class'>
                    <input type='checkbox' name='marked' class='check--$table marked-input' id='item-$id' value='$id' $status>
                    <label for='item-$id' class='item__label'>$item";
                if ( strlen($notes) > 0 ) {
                    echo " ($notes)";
                }
                echo "</label>";
        if ($table == "Items" or $table == "Favorites") {
            echo "<button class='button button--edit' id='$id'>Edit</button>
            <form method='post' enctype='multipart/form-data' id='form-$id' class='form--edit-item'>
            <table class='edit-item form'>
                <tr>
                <td class='field-label'><input type='text' name='item-id' class='field field--id' value='$id'>
                <label for='item-notes'>Notes</label></td>";
                
                echo '<td><input type="text" name="notes" id="item-notes" class="field field--notes" value="'.$notes.'"></td>
                <td><input type="submit" name="edit-save" value="Save" class="button button--small button--save-item"></td>
                </tr>
            </table>
            </form>';
        }
        echo "</li>";
        if ( $oddeven == "odd" ) { $oddeven = "even"; }
        else { $oddeven = "odd"; }
    }
}


//  ===============   List-Specific Functions   =============== 

// Adds favorite items to grocery list
function add_favs() {
    $sql = "INSERT INTO Items (name, category, notes, favorite) SELECT name, category, notes, favorite FROM Favorites";
    mysql_query($sql);
}

function edit_item($id, $notes, $category, $table) {
    $sql = "UPDATE $table SET notes = '$notes', category = '$category' WHERE id = '$id'";
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