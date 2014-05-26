<?php
    include_once '../auth.php';
    $attribute = $_REQUEST['attribute'];
    $table = $_REQUEST['table'];
    $name = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    echo '<fieldset>';
    echo "<legend>$name</legend>";
    if ($type == 'numeric'){
        echo "<select name='{$attribute}_m' id='{$attribute}_drop' onChange='displayFields(\"$attribute\")' >";
        echo "<option value='less_than'>&lt;</option>";
        echo "<option value='less_than_equal'>&lt;=</option>";
        echo "<option value='equal'>=</option>";
        echo "<option value='greater_than'>&gt;</option>";
        echo "<option value='greater_than_equal'>&gt;=</option>";
        echo "<option value='between'>between</option>";
        echo "<input name='{$attribute}_val' type='text' /><span id='{$attribute}_extra' style='visibility:hidden;'> and <input name='{$attribute}_val2' type='text' /></span>";
        echo "</select>";
    }
    else {
        $options = pg_query($dbconn, "SELECT DISTINCT($attribute) FROM $table ORDER BY $attribute ASC");
        echo '<ul class="checkbox-grid">';
        while ($row = pg_fetch_row($options)) {
            echo "<li><input type='checkbox' id='{$attribute}_{$row[0]}' name='{$attribute}[]' value='$row[0]' />";
            echo "<label for='{$attribute}_{$row[0]}' class='inline'> $row[0]</label></li>";
        }
        echo '</ul>';
    }
    echo '</fieldset>';
?>
