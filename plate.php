<?php 
$page_title = "Browse by Plate";
include 'includes/header.html'; 
require_once 'includes/funcs.inc';
?>

<div class="col_2">
</div>

<div class="col_10">
<h2> Browse by Plate </h2> 


<?php  
function printPlateForm($defaultPlate) {
    echo '<form  id="plate-form" action="" method="post">';
    echo '<label for="plate">  Select a Plate:   </label>';
    echo '<select id="plate" name="plate" default=2100>';
    if ($defaultPlate) {
        echo "<option value='" . $defaultPlate . "'>" . $defaultPlate . " </option>";
    }
    echo '<option value="0">-- Choose --</option>';
    $dbconn = dbconnect();
    $queryStr = "SELECT distinct plate from qsos order by plate";
    $result = pg_query($dbconn, $queryStr);
    while ($row = pg_fetch_array($result)) {
        echo "<option value='" . $row['plate'] . "'>" . $row['plate'] . " </option>";
    }
    echo "	</select>";
    echo "  <input type='submit' value='Search' name='submit'>";
    echo "</form>";
    echo "<hr />";
}

printPlateForm($_REQUEST['plate']);
 
if ($_POST){
    $plate  = $_REQUEST['plate'];
    echo '<table class="sortable tight striped" cellspacing="0" cellpadding="0">';
    echo '<col align="right"><col align="right"><col align="right"><col align="right"><col align="right">
    <col align="right"><col align="right"><col align="right"><col align="left">';

    echo '<thead><tr><th>Fiber</th>';
    echo '<th><i class="icon-sort"></i> Plate</th>';
    echo '<th><i class="icon-sort"></i> MJD</th>';
    echo '<th><i class="icon-sort"></i> SDSS Name (J) </th>';
    echo '<th><i class="icon-sort"></i> RA</th>';
    echo '<th><i class="icon-sort"></i> Dec.</th>';
    echo '<th><i class="icon-sort"></i> Redshift</th>';
    echo '<th><i class="icon-sort"></i> i Mag </th>';
    echo '<th><i class="icon-sort"></i> System Grades </th></tr></thead>';

    $queryStr = 'SELECT q.sdssname, q.specid,  q.mjd, q.plate, q.fiber, q.redshift, q.ra, q.decl, q.psfmag_i, ';
    $queryStr .= 'grades.systemgrade from qsos q ';
    $queryStr .= 'LEFT JOIN (SELECT specid, array_agg(grade) systemgrade FROM cat_sys s INNER JOIN cat_qso q ON s.qid = q.qid  GROUP BY q.specid) grades  ';
    $queryStr .= 'ON (q.specid = grades.specid) WHERE q.plate = ' . $plate;
    $dbconn = dbconnect();

    $result = pg_query($dbconn, $queryStr);
    #$result = pg_query_params($dbconn, $queryStr, Array(strval($plate)));
    while ($row = pg_fetch_array($result)) {
         $grades =  str_getcsv(trim($row['systemgrade'], '{}'));
         sort($grades);
         $gradesSorted = implode(', ', $grades);
         echo "<tr><td style='text-align:right'><a href=fiber.php?specid=" .$row['specid'] . "> ".$row['fiber'] . "</a> </td>";
         echo "<td>" . $row['plate']. "</td>";
         echo "<td>" . $row['mjd']. "</td>";
         echo "<td>". $row['sdssname']. "</td>";
         echo "<td style='text-align:right'>" . $row['ra']. "</td>";
         echo "<td style='text-align:right'>" . $row['decl']. "</td>";
         echo "<td>" .$row['redshift']. "</td>";
         echo "<td>" . $row['psfmag_i']. "</td>";
         echo "<td>" . $gradesSorted . "</td></tr>";
         
    }
    print '</table>';
}

	
    ?>

