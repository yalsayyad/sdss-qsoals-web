<?php
$page_title = "Fiber Page";
include 'includes/header.html';
require_once 'includes/funcs.inc';

$specid = $_REQUEST['specid'];

$dbconn = dbconnect();
$queryStr =  "SELECT oldname_type || ' ' || oldname_desig oldname, sdssname, specid, objid, mjd, plate, fiber, redshift, ";
$queryStr .= " ra, decl, psfmag_u, psfmag_g, psfmag_r, psfmag_i, psfmag_z,";
$queryStr .= " psfmag_g/psfmagerr_g sng, psfmag_r/psfmagerr_r snr, psfmag_i/psfmagerr_i sni, morphology";
$queryStr .= " FROM qsos where specid = $1";

$result = pg_query_params($dbconn, $queryStr, Array($specid));
$row = pg_fetch_array($result);

$queryStr = "SELECT balcode FROM bal WHERE specid = $1";
$result = pg_query_params($dbconn, $queryStr, Array($specid));
$bal = pg_fetch_array($result);

$queryStr = "SELECT balcode FROM minibal WHERE specid = $1";
$result = pg_query_params($dbconn, $queryStr, Array($specid));
$balauto = pg_fetch_array($result);

$plusOrMinus = substr($row['sdssname'],9,1);
$nedObjName=$row['sdssname'];
if ($plusOrMinus == '+'){
    $nedObjName = substr($nedObjName,0,9) . '%2B' . substr($nedObjName,10,18);
}

$morphologyStatus = ($row['morphologyFlag']==0) ? "Point Source" : "Extended Source";
?>



<div class="col_2">
</div>

<div class="col_10">
    <div class="col_6">
        <table class="striped tight">
            <tr><th>SDSS Name:</th><td><?php echo $row['sdssname'] ?></td></tr>
            <tr><th>SDSS Spec ID:</th><td><?php echo $row['specid'] ?></td></tr>
            <tr><th>Right Ascension:</th><td><?php echo dec2hms($row['ra']) ?></td></tr>
            <tr><th>Declination:</th><td><?php echo dec2dms($row['decl']) ?></td></tr>
            <tr><th>Redshift:</th><td><?php echo $row['redshift'] ?></td></tr>
            <tr><th>S/N in g:</th><td><?php echo $row['sng'] ?></td></tr>
            <tr><th>S/N in r:</th><td><?php echo $row['snr'] ?></td></tr>
            <tr><th>S/N in i:</th><td><?php echo $row['sni'] ?></td></tr>
            <tr><th>Photometric Morphology:</th><td><?php echo $morphologyStatus  ?></td> </tr>
            <tr><th>Plate:</th><td><?php echo $row['plate'] ?></td></tr>
            <tr><th>Fiber:</th><td><?php echo $row['fiber'] ?></td></tr>
            <tr><th>MJD:</th><td><?php echo $row['mjd'] ?></td></tr>
            <tr><th>BAL FLAG: <br> Gibson et al. 2008, <br> Shen private comm. (March 2010):</th><td><?php echo bool2YesNo($bal['balcode']) ?></td></tr>         
            <tr><th>Mini CIV BAL:</th><td><?php echo bool2YesNo($balauto['balcode']) ?></td></tr>
        </table>
    </div>

    <div class="col_6">

<table class="striped tight">
    <tr><th>Previous Designation:</th><td><?php echo $row['oldname'] ?></td></tr>
    <tr><th>SDSS Obj ID:</th><td><?php echo $row['objid'] ?></td></tr>
    <tr><th>Right Ascension degrees:</th><td><?php echo $row['ra']?></td></tr>
    <tr><th>Declination degrees:</th><td><?php  echo $row['decl'] ?></td></tr>
    <tr><th align="center">PSF Magnitudes</th></tr>
    <tr><th>u:</th><td><?php echo $row['psfmag_u']?></td></tr>
    <tr><th>g:</th><td><?php echo $row['psfmag_g']?></td></tr>
    <tr><th>r:</th><td><?php echo $row['psfmag_r']?></td></tr>
    <tr><th>i:</th><td><?php echo $row['psfmag_i']?></td></tr>
    <tr><th>z:</th><td><?php echo $row['psfmag_z']?></td></tr>
    <tr><th align="center">Color Indices</th></tr>
	<tr><th>u - g:</th><td> <?php echo ROUND($row['psfmag_u']- $row['psfmag_g'],3)?> </td></tr>
	<tr><th>g - r:</th><td> <?php echo ROUND($row['psfmag_g']- $row['psfmag_r'],3)?> </td></tr>
	<tr><th>r - i:</th><td> <?php echo ROUND($row['psfmag_r']- $row['psfmag_i'],3)?> </td></tr>
        <tr><th>i - z:</th><td> <?php echo ROUND($row['psfmag_i']- $row['psfmag_z'],3)?> </td></tr>
        </table>


</table>
</div>
 <div class="col_12">
<form  id='searchNear' action="redirectSdss.php" method="post">
<a class='button blue'
   href="http://nedwww.ipac.caltech.edu/cgi-bin/nph-objsearch?objname=SDSS+J<?php echo $nedObjName ?>&extend=yes&out_csys=Equatorial&out_equinox=J2000.0&obj_sort=RA+or+Longitude&of=pre_text&zv_breaker=30000.0&list_limit=5&img_stamp=YES">NED References</a>
<a class='button blue'
   href='http://skyserver.sdss.org/dr16/en/tools/chart/Navi.aspx?ra=<?php echo $row['ra'] ?>&dec=<?php echo $row['decl'] ?>&opt=G' target="_blank">Sloan Navigate</a>
<input class='blue' type="submit" name="Submit" value="Search for galaxies">
 within 
<input type="text" name="radius" value="1.0">
<label for="radius"> Arcminutes </label>
<input type="hidden" name="ra" value="<?php  echo $row['ra'] ?>">
<input type="hidden" name="dec" value="<?php  echo $row['decl'] ?>">
<input type="hidden" name="format" value="html">
</form>
<hr />



<h4>Identified Absorption Systems</h4>
    <table class="sortable tight" cellspacing="0" cellpadding="0">
    <thead><tr><th><i class="icon-sort"></i> System Redshift</th>
    <th><i class="icon-sort"></i> System Grade</th>
    <th><i class="icon-sort"></i> Rest Frame Wavelength Range </th>
    <th><i class="icon-sort"></i> Ions Present </th></tr></thead>

<?php 
$queryStr =  'SELECT sys_zab, sys_grade, sys_lam_low, 
              sys_lam_high, agg_line_ion_name from cat_join_sys_mv';
              $queryStr.=  " WHERE specid = $1";
$result = pg_query_params($dbconn, $queryStr, Array($specid));

while ($rowSys = pg_fetch_array($result)) {
     $ionLines =  str_getcsv(str_replace('0','',str_replace('-','',trim($rowSys['agg_line_ion_name'], '{}'))));
     sort($ionLines);
     $ionLinesSorted = implode(', ', array_unique($ionLines));
     echo "<td>" . $rowSys['sys_zab']. "</td>";
     echo "<td>" . $rowSys['sys_grade']. "</td>";
     echo "<td>" . $rowSys['sys_lam_low'] . " - " . $rowSys['sys_lam_high'] . "</td>";
     echo "<td>" . $ionLinesSorted . "</td></tr>";
    }
    echo '</table>';
?>

<h4>Catalog Data</h4>

<?php
$fileroot = str_pad($row['plate'], 4, '0', STR_PAD_LEFT);
$fileroot .= '_'.str_pad($row['fiber'], 3, '0', STR_PAD_LEFT);
$fileroot .= '_'.str_pad($row['mjd'], 3, '0', STR_PAD_LEFT);

$directory = 'data/dr7/' . str_pad($row['plate'], 4, '0', STR_PAD_LEFT). '/spec_' . $fileroot . '.dir/';

$fileList = array(
    'Catalog file'  => 'cat_' . $fileroot. '.dat',
    'Raw spectrum'  => 'spec_' . $fileroot. '.dat',
    'Normalized spectrum' => 'nspec_' . $fileroot. '.dat',
    'Absorption Line List' => 'lines_' . $fileroot. '.dat'
);

$imageList = array(
    'Spectrum w/ Continuum Overplot' => 'spec_' . $fileroot. '_overlay.png',
    'Normalized Spectrum Plot' => 'nspec_' . $fileroot. '_overlay.png',
    );
echo '<div class="col_3"> <ul class="alt">';

foreach ($fileList as $key => $value){
    echo '<li><i class="icon-file-alt"></i> <a href="' . $directory . $value . '"> '. $key.' </a></li>';
}
echo '</ul>';

echo '</div>
<div class="col_9">';

foreach($imageList as $key => $value){
    echo '<a href="' . $directory . $value . '">
    <img  class="caption" title="'. $key .'" src="'. $directory . 'thumb_' . $value . '" alt = " '. $key . ' plot"/></a>';
}
echo '</div>';