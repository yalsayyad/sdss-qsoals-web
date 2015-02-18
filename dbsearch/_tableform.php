<?php
    echo "<div id = '{$table}_form'>";
    echo "<h3>{$tables[$table]}</h3>";
?>
    <form method=get action='search.php'>
        <fieldset>
            <legend>Select attribute(s) to search</legend>
            <?php
                    foreach($table_attributes[$table] as $category => $attributes){
                      echo "<div id='{$category}_category_a' class='checkboxes'>";
                      echo "<br><h3>$category</h3>";
                      echo "<input type='button' value='Expand/collapse category' onclick='javascript:toggleHideElement(\"{$category}_extcategory_a\");'><br>";
                      echo "<div id ='{$category}_extcategory_a' class='optional'>";
                      echo '<ul class="checkbox-grid">';
                      foreach($attributes as $attribute){
                        $info = array(
                          'attribute' => $attribute,
                          'name' => $all_attributes[$attribute]['name'],
                          'type' => $all_attributes[$attribute]['type'],
                          'table' => $table,
                        );
                        if ($info['type'] == 'options'){
                          $info['options'] =
                            $all_attributes[$attribute]['options'];
                        }
                        $json_info = json_encode($info);
                        echo "<li><input type='checkbox'; onclick='javascript:fieldCheck($json_info);' id='$attribute' name='attribute[]' value='$attribute' />";
                        echo "<label for='$attribute' class='inline'> {$all_attributes[$attribute]['name']}</label></li>";
                      }
                    echo '</ul>';
                    echo '</div></div>';
                    }
            ?>
        </fieldset>
        <fieldset>
          <legend>Run search on</legend>
          <select name='search_space' id='search_space_dropdown'
          onchange='javascript:spaceDropdown(document.getElementById("search_space_dropdown").value);'>
            <option value='full'>Full table (default)</option>
            <option value='lid'>Specific Lines</option>
            <option value='qid'>Specific Quasars</option>
            <option value='sid'>Specific Systems</option>
          </select>
          <br>
          <div id='search_space_info' class='optional'>
            <label for='search_space_textarea' display="block">
              Enter a comma-seperated list of the IDs (QIDs, SIDs or LIDs, depending on choice above):
            </label>
            <textarea name='search_space_values' id='search_space_textarea'></textarea>
          </div>
        </fieldset>
        <div id = 'form_fields'></div>
        <fieldset>
          <legend>Join options</legend>
          <ul class="checkbox-grid">
            <li>
              <input type='radio' value='none' name='join_option' id='none_join' checked />
              <label for='none_join' class='inline'> None</label>
            </li>
            <li>
              <input type='radio' value='sid' name='join_option' id='systems_join' />
              <label for='systems_join' class='inline'>
                 Systems inner join
               </label>
            </li>
            <li>
              <input type='radio' value='qid' name='join_option' id='quasars_join' />
              <label for='quasars_join' class='inline'>
                  Quasars inner join
               </label>
            </li>
          </ul>
        </fieldset>
        <fieldset>
            <legend>Select column(s) to return in result</legend>
            <?php
                foreach($table_attributes[$table] as $category => $attributes){
                  echo "<div id='{$category}_category_b' class='checkboxes'>";
                  echo "<br><h3>$category</h3>";
                  echo "<input type='button' value='Expand/collapse category' onclick='javascript:toggleHideElement(\"{$category}_extcategory_b\");'><br>";
                  echo "<div id ='{$category}_extcategory_b' class='optional'>";
                  echo '<ul class="checkbox-grid">';
                  foreach($attributes as $attribute){
                    echo "<li><input type='checkbox' id='$attribute' name='column[]' value='$attribute'/>";
                    echo "<label for='$attribute' class='inline'> {$all_attributes[$attribute]['name']}</label></li>";
                  }
                  echo '</ul>';
                  echo '</div></div>';
                }
            ?>
        </fieldset>
        <?php echo "<input type='hidden' name='table' value='$table'/>"; ?>
        <input type='submit' value='Search'>
    </form>
</div>
