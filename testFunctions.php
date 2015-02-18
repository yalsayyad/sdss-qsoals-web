<?php
include 'includes/header.html';
require_once 'includes/funcs.inc';

echo "Test functions";

print dms2dec("-00:00:40.43") . "=? -0.01123 <br>";
print dms2dec("-00d00m40.43s") . "<br>";
print dms2dec("-00D00M40.43S") . "<br>";

print hms2dec("-10:10:10") . " ?= -147.45833 <br> ";
print hms2dec("-10H10M10S") . "?= -147.45833 <br>"; 
print hms2dec("20:20:20") . "?=305.0833  <br>";


print "<p>". dms2dec(dec2dms(-0.01123));
print "<p>". dms2dec(dec2dms(12.345));

print "<p>". dec2hms(305.0833);
print "<p>". dec2hms(-152.54166666667);
print "<p>". dec2hms(hms2dec('20:20:20'));
print "<p>". hms2dec(dec2hms(305.0833));
?>
