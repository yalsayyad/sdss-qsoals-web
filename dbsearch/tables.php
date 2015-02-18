<?php
    $page_title = "Browse/Query Database";
    include '../includes/header.html';
    include_once '../auth.php';
    include_once 'searchvars.php';
    require_once '../includes/funcs.inc';
?>
<div class="col_2">
</div>

<div class="col_10">
<h2> Browse Query/Database </h2>
<?php
    $table = 'cat_join_all_mv';
    include '_tableform.php';
?>
<script type="text/javascript" src="../js/form.js"></script>
<?php
    pg_close($dbconn);
?>
