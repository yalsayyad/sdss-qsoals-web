<?php
    include_once '../auth.php';
    include_once 'searchfunctions.php';
    $values = $_REQUEST['column'];
    $query_info = renderQuery($_REQUEST, 0);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=output.csv');
    header('Cache-Control: max-age=0');
    $output = fopen('php://output', 'w');
    fputcsv($output, $values);
    $result = pg_query_params($dbconn, $query_info['query'], $query_info['params']);
    while ($row = pg_fetch_row($result)){
        fputcsv($output, $row);
    }
    fclose($out);
?>
