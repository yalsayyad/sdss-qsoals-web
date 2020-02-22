<?php
$page_title = "Catalog";
include 'includes/header.html';
require_once 'includes/funcs.inc';
?>

<ul class="breadcrumbs">
<li><a href="./index.php">Home</a></li>
<li><a href="./catalog.php">Catalog</a></li>
</ul>

<!-- This sets up the floating navigation bar to the left -->
<style type="text/css">
.column{padding:20px;}
</style>

<div class="col_2">
<div id="navWrap">
 <div id="nav">
	<ul  class="alt1">
	<li> <a href="#download"> Download </a></li>
	<li> <a href="#description">Description </a></li>
	<li> <a href="#examples">Code Examples </a></li>
	</ul>
	 <br class="clearLeft" />
    </div>
    </div>
</div>



<div class="col_10" data-spy="scroll" data-target=".navbar">
<h2> <em>Catalog Access</em> </h2>
<!--  <p> Include as many sections and as much info as we need: -->
<section id="download">
<h3> Download</h3>
<p>
	The FITS table containing the full output from our DR7 QSOALS
        pipeline can be downloaded here:<br>
        <a href="data/DR7_QSOALS_catalog_071614.tar.gz"> DR7
        Master Catalog (Last updated July 16, 2014)</a>



<section id="description">
<h3> Catalog Data Model </h3>

<p>Tables to list the columns and data types. For example:
<p>
<!-- Table -->
<table class="tight striped">
<thead><tr>
	<th>Name</th>
	<th>Type</th>
	<th>Description</th>
</tr></thead>
<tbody><tr>
	<td>plate</td>
	<td>int</td>
	<td>SDSS spectroscopic plate number</td>
</tr><tr>
<tbody><tr>
	<td>fiber</td>
	<td>int</td>
	<td>SDSS spectroscopic fiber number</td>
</tr><tr>
<tbody><tr>
	<td>mjd</td>
	<td>int</td>
	<td>Modified Julian Date of observation</td>
</tr><tr>
<tbody><tr>
	<td>z_qso</td>
	<td>float</td>
	<td>Quasar redshift (Hewett & Wild 2010)</td>
</tr><tr>
<tbody><tr>
	<td>imag</td>
	<td>float</td>
	<td>Quasar i-band PSF magnitude</td>
</tr><tr>

<tbody><tr>
	<td>ra_deg</td>
	<td>float</td>
	<td>Right ascension of quasar (degrees)</td>
</tr><tr>
	<td>dec_deg</td>
	<td>float</td>
	<td>Declination of quasar (degrees)</td>
</tr><tr>
<tbody><tr>
	<td>ra_hex</td>
	<td>float</td>
	<td>Right ascension of quasar (hexigesimal)</td>
</tr><tr>
	<td>dec_hex</td>
	<td>float</td>
	<td>Declination of quasar (hexigesimal)</td>
</tr><tr>
	<td>BAL_flag</td>
	<td>int</td>
	<td>Broad Absorption Line (BAL) quasar flag: </td>
</tr><tr>
	<td></td>
	<td></td>
	<td>0 = not identified as a BALQSO </td>
</tr><tr>
	<td></td>
	<td></td>
	<td>1 = BAL identified </td>	
</tr><tr>
	<td></td>
	<td></td>
	<td>10 = BAL identified (D. VandenBerk, private comm.) </td>	
</tr><tr>
	<td></td>
	<td></td>
	<td>20 = Ambiguous BAL candidate (D. VandenBerk) </td>	
</tr><tr>
	<td>BAL_flag2</td>
	<td>int</td>
	<td>Alternate BALQSO flag: </td>
</tr><tr>
	<td></td>
	<td></td>
	<td>0 = not identified as a BALQSO </td>
</tr><tr>
	<td></td>
	<td></td>
	<td>1 = BAL identified by Gibson et al. 2009</td>	
</tr><tr>
	<td></td>
	<td></td>
	<td>2 = BAL identified by Y. Shen et al. 2011 only </td>	
</tr><tr>
	<td></td>
	<td></td>
	<td>3 = BAL identified by S. Wesolowski only </td>	
</tr><tr>
	<td></td>
	<td></td>
	<td>4 = BAL identified by both S. Wesolowski and Y. Shen </td>	
</tr><tr>
	<td>target_FIRST</td>
	<td>int</td>
	<td>FIRST target flag: </td>
</tr><tr>
	<td></td>
	<td></td>
	<td>0 = not targeted</td>
</tr><tr>
	<td></td>
	<td></td>
	<td>1 = targeted</td>
</tr><tr>
	<td>20cm_flux</td>
	<td>float</td>
	<td>FIRST 20cm flux</td>
</tr><tr>
	<td>20cm_snr</td>
	<td>float</td>
	<td>FIRST 20cm signal to noise</td>
</tr><tr>
	<td>...</td>
	<td>...</td>
	<td>...</td>
</tr></tbody>
</table>


<section id="examples">
<h3> Code Examples </h3>

	<p> Britt, lots of options for code formatting. 
<pre>
from astropy.io import fits
data = fits.open('DR7_QSOALS_catalog_071614.fits')
</pre>

There's also an inline tag <code> data = pyfits.open('DR7_QSOALS_catalog_071614.fits')</code>

	<p>
		<ul class="tabs left">
		<li><a href="#tabr1">Tab1</a></li>
		<li><a href="#tabr2">Tab2</a></li>
		<li><a href="#tabr3">Tab3</a></li>
		</ul>

		<div id="tabr1" class="tab-content">Tab1</div>
		<div id="tabr2" class="tab-content">Tab2</div>
		<div id="tabr3" class="tab-content">Tab3</div>
</p
</div>

