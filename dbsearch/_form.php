<?php
    include_once '../auth.php';
    $attribute = $_REQUEST['attribute'];
    $name = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    echo '<fieldset>';
    echo "<legend>$name</legend>";
    // Make sure there's nothing funny in attribute value to prevent injection 
    if (preg_match('/^\w+$/', $attribute)){
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
      else if ($type == 'options'){
        $options = pg_query_params($dbconn, "SELECT DISTINCT($attribute) FROM cat_join_all_mv ORDER BY $attribute ASC", array());
        echo '<ul class="checkbox-grid">';
        $choices = explode(',',$_REQUEST['options']);
        while ($row = pg_fetch_row($options)) {
            $value = $choices[intval($row[0])];
            echo "<li><input type='checkbox' id='{$attribute}_{$row[0]}' name='{$attribute}[]' value='$row[0]' />";
            echo "<label for='{$attribute}_{$row[0]}' class='inline'> $value</label></li>";
        }
        echo '</ul>';
      }
      else if ($type == 'similar'){
        //TODO: Add functionality to searchfunctions
        echo "Note: functionality not yet implemented";
        echo "<select name='{$attribute}_m' id='{$attribute}_drop'>";
        echo "<option value='begins_with'>begins with</option>";
        echo "<option value='ends_with'>ends with</option>";
        echo "<option value='equal'>is</option>";
        echo "<option value='contains'>contains</option>";
        echo "<input name='{$attribute}_val' type='text' />";
        echo "</select>";
      }
      else {
        $options = pg_query_params($dbconn, "SELECT DISTINCT($attribute) FROM cat_join_all_mv ORDER BY $attribute ASC", array());
        echo '<ul class="checkbox-grid">';
        while ($row = pg_fetch_row($options)) {
            echo "<li><input type='checkbox' id='{$attribute}_{$row[0]}' name='{$attribute}[]' value='$row[0]' />";
            echo "<label for='{$attribute}_{$row[0]}' class='inline'> $row[0]</label></li>";
        }
        echo '</ul>';
      }
    }
    else {
      echo "Looks like there was a problem. Are you sure $attribute is actually in the table?";
    }
    echo '</fieldset>';
?>
