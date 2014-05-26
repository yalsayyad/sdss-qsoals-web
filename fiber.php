<?php
$page_title = "Fiber Page";
include 'includes/header.html';
require_once 'includes/funcs.inc';

$specid = $_REQUEST['specid'];

$dbconn = dbconnect();
$queryStr =  "SELECT oldname, name, specid, objid, mjd, plate, fiber, redshift, ";
$queryStr .= " cra, cdec, umag, gmag, rmag, imag, zmag, sng, snr, sni, morphologyFlag ";
$queryStr .= "FROM qso where specid = $1";
$result = pg_query_params($dbconn, $queryStr, Array($specid));
$row = pg_fetch_array($result);

$queryStr = "SELECT balcode FROM bal WHERE specid = $1";
$result = pg_query_params($dbconn, $queryStr, Array($specid));
$bal = pg_fetch_array($result);

$queryStr = "SELECT balcode FROM minibal WHERE specid = $1";
$result = pg_query_params($dbconn, $queryStr, Array($specid));
$balauto = pg_fetch_array($result);

$plusOrMinus = substr($row['name'],9,1);
$nedObjName=$row['name'];
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
            <tr><th>SDSS Name:</th><td><?php echo $row['name'] ?></td></tr>
            <tr><th>SDSS Spec ID:</th><td><?php echo $row['specid'] ?></td></tr>
            <tr><th>Right Ascension:</th><td><?php echo dec2hms($row['cra']) ?></td></tr>
            <tr><th>Declination:</th><td><?php echo dec2dms($row['cdec']) ?></td></tr>
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
    <tr><th>Right Ascension degrees:</th><td><?php echo $row['cra']?></td></tr>
    <tr><th>Declination degrees:</th><td><?php  echo $row['cdec'] ?></td></tr>
    <tr><th align="center">PSF Magnitudes</th></tr>
    <tr><th>u:</th><td><?php echo $row['umag']?></td></tr>
    <tr><th>g:</th><td><?php echo $row['gmag']?></td></tr>
    <tr><th>r:</th><td><?php echo $row['rmag']?></td></tr>
    <tr><th>i:</th><td><?php echo $row['imag']?></td></tr>
    <tr><th>z:</th><td><?php echo $row['zmag']?></td></tr>
    <tr><th align="center">Color Indices</th></tr>
	<tr><th>u - g:</th><td> <?php echo ROUND($row['umag']- $row['gmag'],3)?> </td></tr>
	<tr><th>g - r:</th><td> <?php echo ROUND($row['gmag']- $row['rmag'],3)?> </td></tr>
	<tr><th>r - i:</th><td> <?php echo ROUND($row['rmag']- $row['imag'],3)?> </td></tr>
        <tr><th>i - z:</th><td> <?php echo ROUND($row['imag']- $row['zmag'],3)?> </td></tr>
        </table>
        

</table>
</div>
 <div class="col_12">
<p>
<a class="button blue" href="http://nedwww.ipac.caltech.edu/cgi-bin/nph-objsearch?objname=SDSS+J<?php echo $nedObjName ?>&extend=yes&out_csys=Equatorial&out_equinox=J2000.0&obj_sort=RA+or+Longitude&of=pre_text&zv_breaker=30000.0&list_limit=5&img_stamp=YES">Ned References</a>
<a class='button blue' href='http://cas.sdss.org/astro/en/tools/chart/navi.asp?ra=<?php echo $row['cra'] ?>&dec=<?php echo $row['cdec'] ?>&opt=G' target="_blank">Sloan Navigate Page</a>
<p>
<form  id='searchNear' action="redirectSdss.php" method="post">
<input class='blue' type="submit" name="Submit" value="Search for galaxies within">
<input type="text" name="radius" value="1.0">
<label for="radius"> Arcminutes </label>  
<input type="hidden" name="ra" value="<?php  echo $row['cra'] ?>">
<input type="hidden" name="dec" value="<?php  echo $row['cdec'] ?>">
<input type="hidden" name="format" value="html">
</form>
<hr />

<h4>Identified Absorption Systems</h4>

To do.


<h4>Catalog data</h4>
<?php
$fileroot = str_pad($row['plate'], 4, '0', STR_PAD_LEFT);
$fileroot .= '_'.str_pad($row['fiber'], 3, '0', STR_PAD_LEFT);
$fileroot .= '_'.str_pad($row['mjd'], 3, '0', STR_PAD_LEFT);


$directory = 'data/' . str_pad($row['plate'], 4, '0', STR_PAD_LEFT). '/spec_' . $fileroot . '.dir/';


$fileList = array(
    'Catalog file'  => 'nspec_' . $fileroot. '.cat',
    'Raw spectrum'  => 'spec_' . $fileroot. '.dat',
    'Normalized spectrum' => 'nspec_' . $fileroot. '.dat',
    'Absorption Line List' => 'nspec_' . $fileroot. '.lines'
);

        
echo '<ul class="alt">';
foreach ($fileList as $key => $value){
    echo '<li><i class="icon-file-alt"></i> <a href="' . $directory . $value . '"> '. $key.' </a></li>';
}
echo '</ul>';
 