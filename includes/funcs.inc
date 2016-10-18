<?php
require_once 'auth.php';
define("ARCSECONDS2METERS", 6371000.0/206265.0);
define("METERS2ARCSECONDS", 206265.0/6371000.0);

$ARCSECONDS2METERS =  6371000.0/206265.0;


function bool2YesNo($bool){
    if ($bool){
        return "Yes";
    }
    else{
        return "No";
    }
}
function dec2hms($d){
      $sign = (startsWith($d, "-")) ? '-' : '';
      $d = abs($d);
      $h = floor($d/15.0);
      $m = ($d/15.0 - $h)*60.0;
      $mFloor = floor($m);
      $s = ($m - $mFloor)*60.0;
      $hms  = $sign.str_pad($h,2,"0", STR_PAD_LEFT) . ":";
      $hms .= str_pad($mFloor,2,"0",STR_PAD_LEFT) . ":" . ROUND($s,4);
      return $hms;
}

function dec2dms($d){
    $sign = (startsWith($d, "-")) ? '-' : '';
    $d = abs($d);
    $deg = floor($d);
    $arcmin = ($d-$deg)*60.0;
    $arcminFloor = floor($arcmin);
    $arcsec = ($arcmin - $arcminFloor)*60;
    $dms  = $sign.str_pad($deg,2,"0", STR_PAD_LEFT) . ":";
    $dms .= str_pad($arcminFloor,2,"0",STR_PAD_LEFT) . ":" . ROUND($arcsec,4);    
    return $dms;
            
}

function dms2dec($dms){
    $dmsArr =  preg_split("/[:dmsDMS]+/", $dms);
    if (startsWith($dmsArr[0], "-")){
        $d = ($dmsArr[0]);
        $d -= ($dmsArr[1]) / 60.0;
        $d -= ($dmsArr[2]) / 3600.0;
    }
    else {
        $d = ($dmsArr[0]);
        $d += ($dmsArr[1]) / 60.0;
        $d += ($dmsArr[2]) / 3600.0;
    }
    return $d;    
}

function hms2dec($hms){
       $hmsArr =  preg_split("/[:hmsHMS]+/", $hms);
       print $hmsArr[0] . " " . $hmsArr[1] ." ". $hmsArr[2];
    if (startsWith($hmsArr[0], "-")){
        $d = ($hmsArr[0] * 15.0);
        $d -= ($hmsArr[1]) * 15.0 / 60.0;
        $d -= ($hmsArr[2]) * 15.0 / 3600.0;
    }
    else {
        $d = ($hmsArr[0] * 15.0);
        $d += ($hmsArr[1]) * 15.0 / 60.0;
        $d += ($hmsArr[2]) *15.0 / 3600.0;
    }
    return $d;   
    
}

function startsWith($haystack, $needle)
{
    return strpos($haystack, $needle) === 0;
}

function print2row($row){
    foreach($row as $k=>$v){
        echo "<td>". $v . "</td>";
    }
}


function ra2lon($ra){
    if ($ra > 180.0){
        
        return $ra - 360.0;
    }
    else{
        return $ra;
    }
}

function get_qso_info()
{
     
}

// converts boolean values to human-friendly format
function yesno($yn)
{
  if ($yn) return "Yes";
  return "No";
}

?>
