<?php 
$page_title = "Find by Coordinates";
include 'includes/header.html'; 
require_once 'includes/funcs.inc';
?>

<div class="col_2">
</div>

<div class="col_10">
<h2> Join on R.A./Dec coordinates </h2> 
    

<?php

if ($_POST['uploaded'] || $_POST['searched']) {
    //get $lines from file:
    if ($_POST['uploaded']){
    define("UPLOAD_DIR", "/tmp/");
    if (!empty($_FILES["myFile"])) {
        $myFile = $_FILES["myFile"];

        if ($myFile["error"] !== UPLOAD_ERR_OK) {
            echo "<p>No file uploaded.</p>";
            exit;
        }
        $lines = file($myFile["tmp_name"], FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        }
    }
    
    elseif($_POST['searched']){
        //get lines from text box
        $lines = explode("\n",$_POST['radeclist']);
    }
        ?>
        <hr/>
        <h3>Results</h3>
                <table class="sortable tight striped" cellspacing="0" cellpadding="0">
                <thead><tr>
                        <th><i class="icon-sort"></i>Coord Id</th>
                        <th><i class="icon-sort"></i>Input R.A.</th>
                        <th><i class="icon-sort"></i>Input Dec.</th>
                        <th><i class="icon-sort"></i>Fiber Page</th>
                        <th><i class="icon-sort"></i>match RA</th>
                        <th><i class="icon-sort"></i>match Dec</th>
                        <th><i class="icon-sort"></i>Name</th>
                        <th><i class="icon-sort"></i>Plate</th>
                        <th><i class="icon-sort"></i>Fiber</th>
                        <th><i class="icon-sort"></i>MJD</th>
                        <th><i class="icon-sort"></i>Redshift</th>
                        <th><i class="icon-sort"></i>i-mag</th>
                        <th><i class="icon-sort"></i>specid</th>
                    </tr></thead> <tbody>

        <?php
        $dbconn = dbconnect();

        $radius = $_POST["radiusArcsec"];
        foreach ($lines as $line_num => $line) {
            if (startsWith($line, '#')) { //Comment
                continue; 
            }
            if (trim($line) == '') { // Empty line.
                continue;
            }
            $arrLine = preg_split("/[\s,]+/",ltrim($line));
            $lat = floatval($arrLine[1]);
            $lon = ra2lon(floatval($arrLine[0]));
            $radMeter = $radius * $ARCSECONDS2METERS;
            $queryStr = "SELECT ROUND(CAST(ra AS numeric),5), ROUND(CAST(decl AS numeric),4), ";
            $queryStr .= "sdssname, plate,  fiber, mjd, ROUND(CAST(redshift as numeric),2), ROUND(CAST(psfmag_i as numeric),2) , specid ";
            $queryStr .= "from qsos WHERE geopoint && ";
            $queryStr .= "ST_Buffer(ST_GeographyFromText('SRID=4035;POINT(" . $lon . " " . $lat . ")'), ";
            $queryStr .= " " . $radMeter . ")";
            //htmlspecialchars
            $coord_id = "";
            if ($arrLine[2]) {
                $coord_id = $arrLine[2];
            }
            $result = pg_query($dbconn, $queryStr);
                
            $numRows = pg_num_rows($result);
            if ($numRows > 0){
                  while ($row = pg_fetch_row($result)) {
                    echo "<tr><td>" . $coord_id . "</td><td>" . floatval($arrLine[0]) . "</td><td>" . floatval($arrLine[1]) . "</td>";
                    echo "<td> <a href=./fiber.php?specid=" . $row[8] . ">Info.</a></td>";
                    print2row($row);
                    echo "</tr>";
            }
            }
            else{
                  echo "<tr><td>" . $coord_id . "</td><td>" . floatval($arrLine[0]) . "</td><td>" . floatval($arrLine[1]) . "</td>";
                  echo "<td> no match </td>";
            }
        }
        echo '	</tr> </tbody>   </table>';

}


?>


<!--Default text with instructions and form-->
<hr />
Enter text or upload a file with <b>tab, comma or space</b> delimited RA and Dec positions. 
You may include an optional identifier in the 3rd column. 
Rows that start with "#" will be ignored. 
Coordinates should be provided in degrees. 
For example:<br>

<div class="col_4">
<h4> Example </h4>
<pre>
#RA,  Dec
0.0, 0.0, comma1
20.00, 45.0, comma2
186.444, 30.563, comma3
185.695089  26.659033   tab
 22.3227 -8.6099  fixedWidth
122.9037 10.8009  fixedWidth
</pre>
</div>

<div class="col_8">

<!--Defaults-->
<?php 
 $defaultRadius = ($_POST['radiusArcsec']) ? $_POST['radiusArcsec'] :  3.0;
 $defaultText = ($_POST['radeclist']) ? $_POST['radeclist'] :  "#RA, Dec, Id"; 
?>

<ul class="tabs left">
    <li><a href="#upload-file">Upload File</a></li>
    <li><a href="#enter-text">Enter Text</a></li>
</ul>

<div id="upload-file" class="tab-content">

    <form id="upload-form" class="vertical" action="upload.php" method="post" enctype="multipart/form-data"> 
        <label for="radisArcsec">Search Radius (in arcseconds)</label>
        <input name="radiusArcsec" type="text" value="<?PHP echo $defaultRadius; ?>"  />
        <input class="button" type="file" name="myFile">
        <br>
        <input type="submit" name="uploaded" value="Upload">
        <input type='reset' name='reset'>
    </form>
</div>

<div id="enter-text" class="tab-content">
    <form  id="list-form" class="vertical" action="upload.php" method="post">
         <label for="radisArcsec">Search Radius (in arcseconds)</label>
        <input name="radiusArcsec" type="text" value="<?PHP echo $defaultRadius; ?>" />       
        <textarea name="radeclist"><?PHP echo $defaultText; ?></textarea>

      
        <input type='submit' value='Search' name='submit'>
        <input type='reset' name='reset'>
        <input type='hidden' name='searched' value='searched'> </form>
</div>
</div>
    