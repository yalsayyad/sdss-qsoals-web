<?php 
require_once 'includes/funcs.inc';
$dbconn = dbconnect();
$dollar = '$';

$queryStr =  "SELECT DISTINCT c.column_name, ";
$queryStr .= " CASE WHEN a.aliasName IS NULL THEN c.column_name ELSE a.aliasName END as aliasname, ";
$queryStr .= " CASE WHEN a.formtype IS NULL THEN 'numeric' ELSE a.formtype END as formtype, ";
$queryStr .= " pgd.description  ";
$queryStr .= " FROM pg_catalog.pg_statio_all_tables as st ";
$queryStr .= " INNER JOIN information_schema.columns c ";
$queryStr .= " ON (c.table_schema=st.schemaname and c.table_name=st.relname) ";
$queryStr .= " LEFT JOIN pg_catalog.pg_description pgd on (pgd.objoid=st.relid and pgd.objsubid=c.ordinal_position)";
$queryStr .= " LEFT JOIN column_alias a ON c.column_name = a.columnName ";
$queryStr .= "     WHERE c.table_schema = 'public'";

echo "<!--This is a machine created file.\n";
echo " Do not edit. Edit getAliases and run like:\n";
echo " php getAliases.php > searchvars.php\n-->";

$result = pg_query($dbconn, $queryStr);

echo "<?php \n {$dollar}all_attributes = array( \n ";

while ($row = pg_fetch_array($result)) {
    echo "'{$row['column_name']}' => array('type' => '{$row['formtype']}', 'name' => '{$row['aliasname']}', 'description' => '{$row['description']}'), \n ";
}
echo ");";


$tables = array('cat_sys' => 'Systems', 'cat_line' => 'Lines', 
    'cat_qso' => 'Quasars', 'cat_join_all_mv' => 'Join Table (All)',
     'cat_join' => 'Join Table');

echo "\n {$dollar}tables = array('cat_sys' => 'Systems', 'cat_line' => 'Lines', ";
echo "'cat_qso' => 'Quasars', 'cat_join_all_mv' => 'Join Table (All)', ";
echo "'cat_join' => 'Join Table'); ";


$queryStr = " SELECT DISTINCT c.ordinal_position, c.column_name ";
$queryStr .= " FROM information_schema.columns c ";
$queryStr .= " WHERE c.table_name = $1";
$queryStr .= " ORDER BY c.ordinal_position";

echo  "\n{$dollar}table_attributes = array(\n";

foreach($tables as $key => $value){
   # echo $key . "\n" ;
    echo "'{$key}' => array('all' => array(";
    $result = pg_query_params($dbconn, $queryStr, Array($key));
    while ($row = pg_fetch_array($result)) {
        echo "'{$row[column_name]}', "; 
    }
    echo ")), \n";
}
echo ");\n";


echo "?>";

?>