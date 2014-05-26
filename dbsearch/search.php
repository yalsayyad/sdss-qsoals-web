<?php
    $page_title = "Browse/Query Database";
    include '../includes/header.html';
    include_once '../auth.php';
    require_once '../includes/funcs.inc';
    include_once 'searchfunctions.php';
?>
<div class="col_2">
</div>

<div class="col_10">
<h2> Results </h2>
<?php
    if (!isset($_REQUEST['page'])){
        $_REQUEST['page'] = 1;
    }
    $current_page = $_REQUEST['page'];
    $offset = 30 * ($current_page - 1);
    $query = renderQuery($_REQUEST, 1);
    echo $query;
    $result = pg_query($dbconn, $query);
    $assoc_row = pg_fetch_assoc($result);
    $record_count = $assoc_row['count'];
    unset($assoc_row['count']);
    $columns = array_keys($assoc_row);
    $total_pages = $record_count/30;
    $pages = array();
    if ($total_pages <= 5){
        for ($i = 1; $i < $total_pages; $i++){
            $pages[] = $i;
        }
    }
    else if($current_page <= 5){
        for ($i = 1; $i <= 5; $i++){
            $pages[] = $i;
        }
    }
    else if($total_pages - $current_page < 5){
        for ($i = $total_pages - 4; $i <= $total_pages; $i++){
            $pages[] = $i;
        }
    }
    else{
        $pages[] = $current_page - 2;
        $pages[] = $current_page - 1;
        $pages[] = $current_page;
        $pages[] = $current_page + 1;
        $pages[] = $current_page + 2;
    }
    echo "<h4>Total results: $record_count</h4>";
    $download_url = 'output.php?' . http_build_query($_REQUEST);
    echo "<a class='button blue medium' href='$download_url'>
        <i class='icon-download-alt'></i> Download as CSV
      </a>";
    echo "<h5>Displaying results $offset ";
    echo ' through ';
    echo $offset + 30;
    echo '</h5>';
    echo '<div class="pagination"><ul class="button-bar">';
    echo "<li><a href='#'><i class='icon-caret-left'></i></a></li>";
    for ($i = 0; $i < count($pages); $i++){
        $url = 'search.php?' . http_build_query(array_merge($_REQUEST, array('page' => $pages[$i])));
        echo "<li><a href='$url'>";
        echo $pages[$i];
        echo "</a></li>";
    }
    echo "<li><a href='#'><i class='icon-caret-right'></i></a></li>";
    echo "</ul></div>";
    echo '<table class="tight striped">';
    echo '<thead><tr>';
    for($i = 0; $i < count($columns); $i++){
        echo '<th>';
        echo $columns[$i];
        echo '</th>';
    }
    echo '</tr></thead>';
    echo '<tbody>';
    while($assoc_row){
        echo '<tr>';
        for($i = 0; $i < count($columns); $i++){
            echo '<td>';
            echo $assoc_row[$columns[$i]];
            echo '</td>';
        }
        echo '</tr>';
        $assoc_row = pg_fetch_assoc($result);
    }
    echo '</tbody></table>';
?>
<?php
    pg_close($dbconn);
?>
