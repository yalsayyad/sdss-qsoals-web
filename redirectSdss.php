<?php

$page_title = "Fiber Page";
include 'includes/header.html';
require_once 'includes/funcs.inc';
?>


<style> 
    h3{
font-size:1.0em;
margin:10px 0 10px 0;
line-height:130%;
    }

table{border:1px solid #ddd;}
        table td{padding:2px 5px;font-size:0.8em}
	table thead th{cursor: pointer;position:relative;top:0;left:0;border-right:1px solid #ddd;}
	table thead th:hover{background:#efefef;}
	table span.arrow{border-style:solid;border-width:5px;
	display:block;position:absolute;top:50%;right:5px;font-size:0;
	border-color:#ccc transparent transparent transparent;
	line-height:0;height:0;width:0;margin-top:-2px;}
	table span.arrow.up{border-color:transparent transparent #ccc transparent;margin-top:-7px;}

</style>
<?php
$url = 'http://cas.sdss.org/dr7/en/tools/search/x_sql.asp';
$radius = $_REQUEST['radius'];
$ra = $_REQUEST['ra'];
$dec =  $_REQUEST['dec'];

 $format =  "html";
 $cmd  = " SELECT ' <a target=INFO href=http://cas.sdss.org/dr7/en/tools/explore/obj.asp?id=' ";
 $cmd  .= " + cast(p.objId as varchar(20)) + '>' + cast(p.objId as varchar(20)) + '</a>' as objID, ";
 $cmd  .= " p.run, p.rerun, p.camcol, p.field, p.obj, p.type, dbo.fPhotoTypeN(p.type) as type,  ";
 $cmd  .= " p.ra, p.dec, pz.z, pz.zerr, pz2.photozcc2, pz2.photozerrcc2, ";
 $cmd  .= " p.u,p.g,p.r,p.i,p.z, p.Err_u, p.Err_g, p.Err_r,p.Err_i,p.Err_z ";
 $cmd  .= " FROM fGetNearbyObjEq(" .  $ra . ", " . $dec . " , " . $radius . ") n ";
 $cmd  .= " INNER JOIN PhotoPrimary as p on n.objid = p.objid ";
 $cmd  .= " LEFT OUTER JOIN Photoz as pz on p.objid = pz.objid  ";
 $cmd  .= " LEFT OUTER JOIN Photoz2 as pz2 on p. objid = pz2.objID ";
 
$postdata = 'format=html&cmd=' . rawurlencode($cmd);
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
curl_setopt ($ch, CURLOPT_REFERER, $url); 

curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
curl_setopt ($ch, CURLOPT_POST, 2); 
$result = curl_exec ($ch); 

echo $result;  
curl_close($ch);

?>
